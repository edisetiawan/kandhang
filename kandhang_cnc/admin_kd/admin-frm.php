<?php
session_start();
error_reporting(0);
//echo "ini adalah session: ".$_SESSION['userpass'];
//exit;
if(empty($_SESSION['userpass'])){
    header('location:error-404.php');
    exit;
}

?>
<h1>Input data admin</h1><br />
<form method="post" action="admin-save.php">
<label>Username</label>
<input type="text" name="frm_username"/><br />
<label>Password</label>
<input type="password" name="frm_password"/><br />
<label>Level</label>
<select name="frm_level">
<option>admin</option>
<option>user</option>
</select><br />
<input type="submit" value="SINPAN"/>
</form>