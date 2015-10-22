<?php
session_start();
error_reporting(0);
//echo "ini adalah session: ".$_SESSION['userpass'];
//exit;
if(empty($_SESSION['userpass'])){
    header('location:error-404.php');
    exit;
}
require_once('inc-db.php');
$action=$_GET['action'];
$sql_update="select * from tb_admin where admin_id='".$action."'";
$result=mysql_query($sql_update);
$data=mysql_fetch_array($result);

?>
<h2>Update data admin</h2><br />
<form method="post" action="admin-update.php">
<input type="hidden" name="frm_id" value="<?php echo $data['admin_id']; ?>"/>
<label>Username</label>
<input type="text" name="frm_username" value="<?php echo $data['admin_username']; ?>"/><br />
<label>Password</label>
<input type="password" name="frm_password" value="<?php echo $data['admin_password']; ?>"/><br />
<label>Level</label>
<select name="frm_level">
<option>admin</option>
<option>user</option>
</select><br />
<input type="submit" value="UPDATE"/>
</form>