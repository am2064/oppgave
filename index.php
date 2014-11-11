<?php
require 'vendor/autoload.php';

$app = new \Slim\Slim(array(
	'debug'=>true
)
);

//Return displays

$app->get('/register', function() use ($app){
	$app->render('register.php');
});

$app->get('/profile', function() use ($app){
	//create user
	$app->render('register.php');
});

$app->get('/login', function() use ($app){
	$app->render('login.php');
});

$app->get('/showuser', function() use ($app){
	$app->render('register.php');
});

$app->get('/showuser/:id', function($id) use ($app){
	//create user
	$app->render('register.php');
});

//Do stuff

$app->post('/profile', function() use ($app){
	//edit user
	$app->redirect("/profile/$id");
});

$app->post('/register', function() use ($app){
	//create user
	$app->redirect('/login');
});

$app->post('/login', function() use ($app){
	//login user
	$app->redirect("/profile/$id");
});

$app->run();
