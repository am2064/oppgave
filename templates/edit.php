<?php

require 'layout.php';

_header('Update Profile');
?>

<center>
<h1>Update Profile</h1>

<form action="profile" method="post">

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
