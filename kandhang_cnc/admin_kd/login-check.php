<?php
require_once('inc-db.php');
error_reporting(0);
$var_username=$_POST['frm_username'];
$var_password=$_POST['frm_password'];
/*
echo $var_username."<br>";
echo $var_password;
exit;
*/

$sql_check="select * from tb_admin  
            where admin_username='".$var_username."' 
            and admin_password='".$var_password."'";
$result=mysql_query($sql_check);
$rows=mysql_num_rows($result);
//echo $rows;
if($rows > 0){
    session_start();
    $data=mysql_fetch_array($result);
    $_SESSION['userpass']=$data['admin_username'];
    header('location:index.php');
}else {
    header('location: login.php?action=gagal');
    exit;
}
?>