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
$var_kategori=$_POST['frm_kategori'];
//echo $var_kategori;
//exit;

$sql_insert="insert into tb_kategori values ('','$var_kategori')";
$result=mysql_query($sql_insert);

header('location: index.php?page=4');
?>