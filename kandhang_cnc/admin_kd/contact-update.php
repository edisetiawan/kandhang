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
$id=1;
$var_alamat=$_POST['frm_alamat'];
$var_phone=$_POST['frm_phone'];
$var_email=$_POST['frm_email'];
$var_jam=$_POST['frm_jam'];
/*
echo "alamat : ".$var_alamat."<br>";
echo "phone : ".$var_phone."<br>";
echo "email : ".$var_email."<br>";
echo "jam : ".$var_jam."<br>";
exit; */

$sql_update="update tb_info
            set info_alamat='$var_alamat',
                info_phone='$var_phone',
                info_email='$var_email',
                info_jam='$var_jam' where info_id='".$id."'";
//echo $sql_update;
//exit;
$result=mysql_query($sql_update);
if($result){
    header('location: index.php?page=8');
}else {
    echo "gagal";
}

?>