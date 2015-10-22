<?php
require_once('inc-db.php');
error_reporting(0);
?>
<html>
<head>
<title>
administrator
</title>
<style>
#container {
    
}
#navigasi{
    
}
</style>
</head>
<body><div id="container">
Administrator<br><br>
<a href="index.php?page=kategori">Kategori</a><br>
<a href="index.php?page=data_hewan">Data Hewan</a><br>
<a href="index.php?page=order_member">Order Member</a><br>
<a href="index.php?page=order_tanpa_akun">Order Tanpa Akun</a><br>

<?php
if($_GET['page'] == "kategori"){
require_once('kategori.php');
}
if($_GET['page'] == "data_hewan"){
require_once('data_hewan.php');
}
if($_GET['page'] == "order_member"){
include('order_member.php');
}
if($_GET['page'] == "order_tanpa_akun"){
include('order_tanpa_akun.php');
}
?>
</div>
</body>
</html>