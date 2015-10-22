<?php
session_start();
require_once('admin/inc-db.php');
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<h2>Detail Hewan</h2> 
<?php
$hewan_id=$_GET['detail'];
//echo $hewan_id;
//exit;

$sqlShow="SELECT * FROM tb_hewan WHERE hewan_id=".$hewan_id;
$result=mysql_query($sqlShow);
$data=mysql_fetch_array($result);
?>
<img src="admin/foto/<?php echo $data['hewan_foto']; ?>" width="200" height="200"/><a href="cart.php?action=add&id=<?php echo $data['hewan_id'] ?>">Beli</a> <br>

<?php 
//$a=1;
$sqlGambar="SELECT * FROM tb_foto WHERE hewan_id=".$hewan_id;
$result=mysql_query($sqlGambar);
//echo $sqlGambar;
//exit;

while($data=mysql_fetch_array($result)){
?>
<img src="admin/foto/<?php echo $data['foto_nama']; ?>" width="40" height="40"/>
<?php
}  
?>
</body>
</html>
