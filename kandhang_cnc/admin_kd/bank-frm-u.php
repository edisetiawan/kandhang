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
$sql_select="select * from tb_bank where bank_id='".$action."'";
$result=mysql_query($sql_select);
$data=mysql_fetch_array($result);
?>
<h1>Update data bank</h1>
<form method="post" action="bank-update.php">
<table>
<input type="hidden" name="frm_id" value="<?php echo $data['bank_id']; ?>"/>
<tr><td>Icon</td><td>:</td><td><img src="../images/<?php echo $data['bank_icon']; ?>"/></td></tr>
<tr><td>No Rekening</td><td>:</td><td><input type="text" name="frm_no_reg" value="<?php echo $data['bank_no_rekening']; ?>"/></td></tr>
<tr><td>Bank</td><td>:</td><td><input type="text" name="frm_bank" value="<?php echo $data['bank_nama']; ?>"/></td></tr>
<tr><td>Cabang</td><td>:</td><td><input type="text" name="frm_cabang" value="<?php echo $data['bank_cabang']; ?>"/></td></tr>
<tr><td></td><td></td><td><input type="submit" value="Update"/></td></tr>


</table>


</form>