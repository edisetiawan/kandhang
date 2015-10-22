<?php
session_start();
error_reporting(0);
require_once('admin_kd/inc-db.php');
$var_kode=$_GET['kode'];
//echo $var_kode;
//exit;
$sql_check="SELECT * FROM tb_temp WHERE temp_kode='".$var_kode."'";  //SELECT
$result=mysql_query($sql_check);
$rows=mysql_num_rows($result);
//Apa bila kode verifikasi ditemukan
//echo $rows;
//exit;
if($rows > 0 ){
$data=mysql_fetch_array($result);
$tanggal_register = date('Y-m-d H:i:s');
$var_password=$data['temp_password'];
$var_email=$data['temp_email'];

//Masukan data user ke table tb_admin yang sah
$sql_insert="INSERT INTO tb_member VALUES ('','$var_email','$var_password','$tanggal_register')";  //INSERT
//echo $sql_insert;
//exit;
$result12=mysql_query($sql_insert);
$member_id=mysql_insert_id();
//echo "Member :".$member_id;
//exit;
$sql_insert_profil="INSERT INTO tb_profil VALUES ('','','','','','','','','$member_id')";

//echo $sql_insert_profil;
//exit;
$result_profil=mysql_query($sql_insert_profil);

if($result_profil){
    $sql_check1="SELECT * FROM tb_member WHERE member_email='".$var_email."'";
    $result3=mysql_query($sql_check1);
    $rows1=mysql_num_rows($result3);
    //echo $rows1;
    //exit;
    if($rows1 > 0 ){
        //echo "<h1>".$rows1."</h1>";
        $data=mysql_fetch_array($result3);
        $_SESSION['password']=$data['member_password'];
        $_SESSION['member_id']=$data['member_id'];
        //echo "member_id :".$_SESSION['member_id'];
        //exit;
        //$ulr="lengkapi_data.php?action=".$var_kode."'";
        header("location: profil.php?action=".$var_email."");
    } 
//echo "Account Anda Telah diaktifkan";

//hapus  data pendaftaran sementara tersebut di table tb_temp 
$sql_delete="DELETE FROM tb_temp WHERE temp_kode='".$var_kode."'";  //DELETE
$result1=mysql_query($sql_delete);
}
}else {
    echo "kode tidak ditemukan";
}


?>