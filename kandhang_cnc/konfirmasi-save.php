<?php
include "admin_kd/inc-db.php";
error_reporting(0);
$lokasi_file=   $_FILES['fupload']['tmp_name'];
$nama_file=     $_FILES['fupload']['name'];
$ukuran_file=   $_FILES['fupload']['size'];
//-------------------------------------------
$tgl=$_POST['frm_tanggal'];
$bln=$_POST['frm_bulan'];
$thn=$_POST['frm_tahun'];
//-------------------------------------------
$var_id_Order=$_POST['frm_ID'];
//echo $var_id_Order;
//exit;
$var_nama=$_POST['frm_nama'];
$var_email=$_POST['frm_email'];
$jam=date("H:i");
$var_tgl=$thn."-".$bln."-".$tgl.",".$jam;
$var_nilai=$_POST['frm_nilai'];

/*
echo $var_id_Order."<br>";
echo $var_nama."<br>";
echo $var_email."<br>";
echo $var_nama."<br>";
echo $var_tgl."<br>";
echo $var_nilai."<br>";
echo $nama_file;
exit; */

$sql_check="select * from tb_order where order_id='".$var_id_Order."'";
$eresult=mysql_query($sql_check);
$rows=mysql_num_rows($eresult);
//echo $rows;
//exit;
if($rows > 0){
$derektori="images_bukti/".$nama_file;
move_uploaded_file($lokasi_file,"$derektori");   

$sql_insert="INSERT INTO tb_confirm 
                    VALUES ('','$var_id_Order',
                                '$var_nama',
                                '$var_email',
                                '$var_tgl',
                                '$var_nilai',
                                '$nama_file')
                                     ";  
//echo $sql_insert;
$result=mysql_query($sql_insert);   
header('location: konfirmasi-sukses.php');
} else {
   header('location: konfirmasi-bayar.php?action=failed');
    exit;
}



?>
