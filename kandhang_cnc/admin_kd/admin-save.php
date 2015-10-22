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
$var_username=$_POST['frm_username'];
$var_password=$_POST['frm_password'];
$var_level=$_POST['frm_level'];
/*
echo $var_username."<br>";
echo $var_password."<br>";
echo $var_level;
*/
$sql_insert="insert into tb_admin values ('','$var_username','$var_password','$var_level')";
//echo $sql_insert;
$result=mysql_query($sql_insert);
//exit;
if($result){
header('location: index.php?page=2');
}
?>