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
$sql_delete="delete from tb_contact where contact_id='".$action."'";
$result=mysql_query($sql_delete);
if($result){
    header('location: index.php?page=9');
}

?>