<?php
session_start();
error_reporting(0);
//echo "ini adalah session: ".$_SESSION['userpass'];
//exit;
if(empty($_SESSION['userpass'])){
    header('location:error-404.php');
    exit;
}
//error_reporting(0);
require_once('inc-db.php');
$var_ubah=$_POST['frm_ubah_status'];
$var_id=$_SESSION['action'];

//echo $var_id."<br>";
//echo $var_ubah;
//exit;


$sql_update="update tb_order 
            set status_order='".$var_ubah."' where order_id='".$var_id."'";
$result=mysql_query($sql_update);
if($result){
header('location: index.php?page=62');
}else{
    echo "gagal update";
}
?>