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
//exit;
$sql_delete="delete from tb_hewan where hewan_id='".$action."'";
$result=mysql_query($sql_delete);
if($result){
    $sql_del="delete from tb_foto where hewan_id='".$action."'";
    $result1=mysql_query($result1);
    header('location: index.php?page=5');
}

?>