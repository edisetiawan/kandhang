<?php
session_start();
error_reporting(0);
require_once('admin_kd/inc-db.php');
$var_nama=htmlentities($_POST['frm_nama']);
$var_email=htmlentities($_POST['frm_email']);
$var_no_hp=htmlentities($_POST['frm_no_hp']);
$var_pesan=htmlentities($_POST['frm_pesan']);

$error=0;

if(empty($var_nama)){
    $error=1;
}
if(empty($var_email)){
    $error=2;
}
if(empty($var_no_hp)){
    $error=3;
}
if(empty($var_pesan)){
    $error=4;
}
if(!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $var_email)){
    $error=5;
}
if($error !=0){
    switch($error){
        case '1':
        $error_msg="Nama tidak boleh kosong";
        break;
        case '2':
        $error_msg="Email tidak boleh kosong";
        break;
        case '3':
        $error_msg="No telepon tidak boleh kosong";
        break;
        case '4':
        $error_msg="Pesan tidak boleh kosong";
        break;
        case '5':
        $error_msg="email harus valid";
        break;
    }
    $_SESSION['error']=$error_msg;
    header("location: contact.php?error=".$error."");
    exit;
}

$sql_insert="insert into tb_contact values ('','{$var_nama}',
            '{$var_email}','{$var_no_hp}','{$var_pesan}')";
$result=mysql_query($sql_insert);
//echo $sql_insert;
header("location:index.php");
    
exit;





?>