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
$var_id=$_POST['frm_id'];
$var_username=$_POST['frm_username'];
$var_password=$_POST['frm_password'];
$var_level=$_POST['frm_level'];
/*
echo $var_id."<br>";
echo $var_username."<br>";
echo $var_password."<br>";
echo $var_level."<br>";
*/
$sql_update="update tb_admin 
            set admin_username='$var_username',
                admin_password='$var_password',
                admin_level='$var_level' where admin_id='".$var_id."'";
$result=mysql_query($sql_update);
if($result){
header('location:index.php?page=2');
}

?>