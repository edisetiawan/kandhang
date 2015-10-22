<?php
session_start();
error_reporting(0);
//echo "ini adalah session: ".$_SESSION['userpass'];
//exit;
if(empty($_SESSION['userpass'])){
    header('location:error-404.php');
    exit;
}
//exit;
require_once('inc-db.php');
$action=$_GET['action'];
//echo $action;
$sql_delete="delete from tb_admin where admin_id='".$action."'";
$result=mysql_query($sql_delete);
//exit;
if($result){
header('location:index.php?page=2');
}else {
    echo "gagal";
}
?>