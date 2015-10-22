<?php
session_start();
require_once('admin/inc-db.php');
error_reporting(0);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>
<body>
<?php
require_once('menu.php');
?>
<div id="isi">
<p>
<?php
if($_GET['page'] == "home"){
require_once('index.php');
}
if($_GET['page'] == "logout"){
include('logout.php');
}
if($_GET['page'] == "login"){
include('login.php');
}
else if (empty($_GET['page'])){
//selamat datang di kandhang com <br />
$sqlShow="select * from tb_hewan";
//$sqlShow="SELECT * FROM  tb_hewan"; 
$result=mysql_query($sqlShow);
while($data=mysql_fetch_array($result)){
//echo $data['hewan_nama'];

?>
<img src="admin/foto/<?php echo $data['hewan_foto']; ?>" width="200" height="200"> <br>
<a href="detail_hewan.php?detail=<?php echo $data['hewan_id']; ?>">detail</a><br>
<?php

echo $data['hewan_harga_jual']."<br>";
echo $data['hewan_deskripsi']."<br>";

}
}
?>
</p>
</div>
</body>
</html>
