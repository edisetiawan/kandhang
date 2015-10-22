<?php
$var_nama=$_POST['frm_nama'];
$var_email=$_POST['frm_cemail'];
//-------------------------------------------------
$var_penerima=$_POST['frm_penerima'];
$var_hp=$_POST['frm_hp'];
$var_provinsi=$_POST['frm_provinsi'];
$var_kota=$_POST['frm_kota'];
$var_kecamatan=$_POST['frm_kecamatan'];
$var_alamat=$_POST['frm_alamat'];

echo "Nama  :".$var_nama."<br>";
echo "Email  :".$var_email."<br>";
//---------------------------------------------
echo "Penerima  :".$var_penerima."<br>";
echo "No Hanphone  :".$var_hp."<br>";
echo "Provinsi  :".$var_provinsi."<br>";
echo "Kota  :".$var_kota."<br>";
echo "Kecamatan  :".$var_kecamatan."<br>";
?>