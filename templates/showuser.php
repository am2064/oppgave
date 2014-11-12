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
</center>

<?php
footer();
?>
