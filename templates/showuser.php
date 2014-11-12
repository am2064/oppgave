<?php

require 'layout.php';

_header($user["username"]);
?>

<center>
<div class="row">
<h1><?php echo $user["username"];?></h1>
</div>

<div class="row">
<p><?php echo $user["email"];?></p>
</div>

<div class="row">
<p><?php echo $user["website"];?></p>
</div>

<?php if($_SESSION['user']['username'] == $user['username']){

?>
<div class="row">
<a href="/profile" class="button">Edit My Profile</a>
</div>
<?php
}
?>
</center>

<?php
footer();
?>
