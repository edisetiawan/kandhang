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
$id_ambil=$_GET['action'];
$sql_delete="delete from tb_alamat_kirim where kirim_id='".$id_ambil."'";
$result=mysql_query($sql_delete);
if ($result){
    $sql_delete1="delete from tb_order where order_id='".$id_ambil."'";
    $result1=mysql_query($sql_delete1);
    header('location: index.php?page=62');
}

?>