<?php
$var_nama=$_POST['frm_nama'];
$var_email1=$_POST['frm_email1'];
$var_email2=$_POST['frm_email2'];
//--------------------------------------------------------------
$var_penerima=$_POST['frm_penerima'];
$var_hp=$_POST['frm_no_hp'];
$var_provinsi=$_POST['propinsi'];
$var_kota=$_POST['kota'];
$var_kec=$_POST['kec'];
$var_alamat=$_POST['frm_alamat'];

echo "Nama : ".$var_nama."<br>";
echo "Email :".$var_email1."<br>";
echo "Email :".$var_email2."<br>";
echo "<hr>";
echo "Nama Penerima :".$var_penerima."<br>";
echo "No hp :".$var_hp."<br>";
echo "Provinsi :".$var_provinsi."<br>";
echo "Kota : ".$var_kota."<br>";
echo "Kecamatan : ".$var_kec."<br>";
echo "Alamat :".$var_alamat."<br>";

?>