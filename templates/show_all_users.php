<?php

require 'layout.php';

_header('Users');
?>
<center>
<h1>All Users</h1>
<table>
<tr>
<th>Username</th>
<th>Email</th>
<th>Website</th>
</tr>
<?php
foreach($users as $user){
?>
<tr>
<td><a href="/showuser/<?php echo $user["username"]; ?>"><?php echo $user["username"]; ?></a></td>
<td><a href="mailto:<?php echo $user["email"]; ?>"><?php echo $user["email"]; ?></a></td>
<td><a href="<?php echo $user["website"]; ?>"><?php echo $user["website"]; ?></a></td>
</tr>
<?php
}
?>
</table>
</center>
<?php
footer();
?>
