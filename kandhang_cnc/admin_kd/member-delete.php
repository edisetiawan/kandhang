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

//echo $action;
$sql_delete_m="delete from tb_member where member_id='".$action."'";
$result=mysql_query($sql_delete_m);
if($result){
    $sql_delete_p="delete from tb_profil where member_id='".$action."'";
    $result1=mysql_query($sql_delete_p);
    header('location: index.php?page=3');
}
?>