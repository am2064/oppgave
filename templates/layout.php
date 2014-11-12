<?php
function _header($title){
?>
<!DOCTYPE html>
<html>

<head>
<title><?php echo $title ?></title>
<link href="http://picnicss.com/releases/v2.3.min.css" rel="stylesheet" type="text/css">
<meta charset="UTF-8">
</head>
<body>
<?php
}

function banners(){
	if(isset($_SESSION['slim.flash']['error'])){
?>
	<button class="error" disabled><?php echo $_SESSION['slim.flash']['error'];?></button>
<?php
	}
	if(isset($_SESSION['slim.flash']['info'])){
?>

	<button class="success" disabled><?php echo $_SESSION['slim.flash']['info'];?></button>
<?php
	}
}

function footer(){
?>
</body>
</head>
<?php
}
