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
$id=1;
$sql_show="select * from tb_info where info_id='".$id."'";
$result=mysql_query($sql_show);
$data=mysql_fetch_array($result);
?>
  <h2>Contact BBM,Alamat,Telepon,Email</h2>
<form method="post" action="contact-update.php">
<table>

<tr><td><label>phone</label></td><td>:</td><td><input type="text" name="frm_phone" class="form-control" value="<?php echo $data['info_phone']; ?>"/></td></tr>
<tr><td><label>email </label></td><td>:</td><td><input type="text" name="frm_email" class="form-control" value="<?php echo $data['info_email']; ?>"/></td></tr>
<tr><td><label>jam</label> </td><td>:</td><td><input type="text" name="frm_jam" class="form-control" value="<?php echo $data['info_jam']; ?>"/></td></tr>
<tr><td><label>alamat</label> </td><td>:</td><td><textarea name="frm_alamat" class="form-control" rows="3"><?php echo $data['info_alamat']; ?></textarea></td></tr>
<tr><td>&nbsp;</td><td>&nbsp;</td><td><input type="submit" value="Update"/></textarea></td></tr>
</table>
</form>