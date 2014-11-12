<?php
require 'vendor/autoload.php';

$app = new \Slim\Slim(array(
	'debug'=>true
)
);

session_cache_limiter(false);
session_start();
if(!isset($_SESSION['logged_in'])){
	$_SESSION['logged_in'] = false;
}
$user_file = fopen("users.dat",'a') or die("Could not open or create users.dat");
fclose($user_file);

//Return displays

$app->get('/register', function() use ($app){
	$app->render('registration.php');
});

$app->get('/login', function() use ($app){
	$app->render('login.php');
});

$app->get('/', function() use ($app){
	$app->render('login.php');
});

$app->get('/showuser', function() use ($app){
	$users=array();
	$user_file = fopen("users.dat",'r') or die("Could not open users.dat");
	while($user = fgets($user_file)){
		array_push($users,json_decode($user,true));
	}
	$app->render('show_all_users.php',array('users'=>$users));
});

$app->get('/showuser/:id', function($id) use ($app){
	$user_file = fopen("users.dat",'r') or die("Could not open users.dat");
	while($user = fgets($user_file)){
		$temp = json_decode($user, true); //json lets us not worry about anything too weird
		if($id == $temp["username"]){
			fclose($user_file);
			$app->render('showuser.php',array('user'=>$temp));
			break;
		}
	}
});

$app->get('/profile', function() use ($app){
	if($_SESSION['logged_in']){
		//create user
		$app->render('edit.php');

	}else{
		$app->redirect("/login");
	}
});



//Do stuff

$app->post('/profile', function() use ($app){
	$user = $_SESSION['user'];
	$new_user = json_encode(array(
		'username'=>$user['username'],
		'password'=>md5($_POST['password']), //md5 is actually bad practice, too easy to decrypt
		'email'=>$_POST['email'],
		'website'=>$_POST['website'],
	)); //json_encode returns a single line perfect for us
	$user_file = fopen("users.dat",'r') or die("Could not open users.dat");
	while($user_temp = fgets($user_file)){
		$temp = json_decode($user_temp,true); //json lets us not worry about anything too weird
		if($user['username'] == $temp['username']){
			$old_user = json_encode($temp);
			fclose($user_file);
			break;
		}
	}

	if(isset($old_user)){
		$user_file = file_get_contents("users.dat");
		$user_file = str_replace($old_user,$new_user,$user_file);

		file_put_contents("users.dat", $user_file);
		$app->flash('info','User data updated succesfully');
	}else{

		$app->flash('error','User data not updated succesfully');
	}

	$app->redirect("/showuser/".$user['username']);
});

$app->post('/register', function() use ($app){
	$user_file = fopen("users.dat",'a') or die("Could not open or create users.dat");
	$user = json_encode(array(
		'username'=>$_POST['username'],
		'password'=>md5($_POST['password']), //md5 is actually bad practice, too easy to decrypt
		'email'=>$_POST['email'],
		'website'=>$_POST['website'],
	))."\n"; //json_encode returns a single line perfect for us
	if(fwrite($user_file,$user) >= 0){
		fclose($user_file);
		$app->flash('info', 'User created succesfully');
		$app->redirect('/login');
	}else{
		fclose($user_file);
		$app->flash('error', 'Could not create User');
		$app->redirect('/register');
	}
});

$app->post('/login', function() use ($app){
	$user_file = fopen("users.dat",'r') or die("Could not open users.dat");
	$password = md5($_POST['password']);
	while($user = fgets($user_file) and !isset($_SESSION['user'])){
		$temp = json_decode($user, true); //json lets us not worry about anything too weird
		var_dump($temp);
		if($_POST['username'] == $temp["username"] &&
			$password == $temp["password"]){ //Don't want to be running md5 every line
				$_SESSION['user'] = $temp;
				$_SESSION['logged_in'] = true;
			}
	}
	fclose($user_file);
	if(isset($_SESSION['user'])){
		$app->redirect("/showuser/".$_SESSION['user']["username"]);
	}else{
		$app->flash('error','Could not login');
		$app->redirect('/login');
	}
});

$app->run();
