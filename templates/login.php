<?php

require 'layout.php';

_header('Login');

?>

<center>
<h1>Login</h1>

<form action="login" method="post">
<div class="row">
<label for="username">Username</label></br>
<input required name="username" type="text">
</div>
<div class="row">
<label for="password">Password</label></br>
<input required name="password" type="password">
</div>
<div class="row">
<input type="submit">
</form>
<a class="button error" href="register">Register</a>
</div>
<?php banners(); ?>
</center>

<?php
footer();
?>
