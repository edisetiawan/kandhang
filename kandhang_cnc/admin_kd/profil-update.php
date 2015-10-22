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
$lokasi_file=   $_FILES['frm_foto']['tmp_name'];
$nama_foto=     $_FILES['frm_foto']['name'];
$ukuran_file=   $_FILES['frm_foto']['size'];
//--------------------------------------------------
$var_judul=$_POST['frm_judul'];
$var_deskripsi=$_POST['frm_dec'];
//--------------------------------------------------

/*
echo $var_judul;
echo $nama_foto;
echo $var_deskripsi;

exit; */

$derektori="../images/".$nama_foto;
move_uploaded_file($lokasi_file,"$derektori");

$id=1;
$sql_update="update tb_depan set depan_judul='$var_judul',depan_foto='$nama_foto',depan_deskripsi='$var_deskripsi'
                where depan_id='".$id."'";
$result=mysql_query($sql_update);
//echo $sql_update;
//exit;
if($result){
header('location: index.php?page=1');
}else {
    echo "gagal";
}
?>