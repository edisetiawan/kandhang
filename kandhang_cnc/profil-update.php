<?php
session_start();
error_reporting(0);
require_once('admin_kd/inc-db.php');
//exit;
$id_member=$_SESSION['member_id'];
$var_tanggal=$_POST['frm_tanggal'];
$var_bulan=$_POST['frm_bulan'];
$var_tahun=$_POST['frm_tahun'];
//---------------------------------------------------
$anu=$var_tahun."-".$var_tanggal."-".$var_bulan;
//------------------------------------------------------

$var_nama=$_POST['frm_nama'];
$var_lahir=$anu;
$var_telepon=$_POST['frm_telepon'];
$var_email=$_SESSION['email'];
//-----------------------------------------------------------------------
$var_provinsi=$_POST['propinsi'];
$var_kota=$_POST['kota'];
$var_kec=$_POST['kec'];
$var_alamat=$_POST['frm_alamat'];

$sql_update="update tb_profil
            set profil_nama='".$var_nama."',
                profil_tgl_lahir='".$var_lahir."', 
                profil_telepon='".$var_telepon."', 
                profil_provinsi='".$var_provinsi."', 
                profil_kabupaten='".$var_kota."', 
                profil_kecamatan='".$var_kec."', 
                profil_alamat='".$var_alamat."'
                where member_id='".$id_member."'";
//echo $sql_update;
//exit;

$result=mysql_query($sql_update);
if($result){
    header('location:akun.php?page=profil');
}else{
    echo "gagal";
}

?>