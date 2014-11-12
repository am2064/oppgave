<?php

require 'layout.php';

_header('Register');
?>

<center>
<h1>Login</h1>

<form action="register" method="post">

<div class="row">
<label for="username">Username</label></br>
<input required name="username" type="text">
</div>

<div class="row">
<label for="password">Password</label></br>
<input required name="password" type="password">
</div>

<div class="row">
<label for="email">Email</label></br>
<input required name="email" type="email">
</div>

<div class="row">
<label for="website">Website</label></br>
<input required name="website" type="url">
</div>

<div class="row">
<input type="submit">
</div>
</form>
</center>

<?php
footer();
?>
