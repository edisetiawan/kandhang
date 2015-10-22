<?php
$var_nama=$_POST['frm_nama'];
$var_telepon=$_POST['frm_telepon'];
$var_propinsi=$_POST['frm_propinsi'];
$var_alamat=$_POST['frm_alamat'];
if($var_nama==''){
header('location:vlidasi_php_edi.php?action=n');
}
if ($var_telepon==''){
header('location:vlidasi_php_edi.php?actionn=t');
}




exit;
//validasi string
//http://www.kaskus.co.id/thread/51316596e974b4f62700000b/ask-cara-validasi-form-php-yang-hanya-memperbolehkan-huruf-dan-spasi-aja
/*
//email
if (!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $email)){
$error.="Email tidak valid";
}

//angka minimal 5
if (!is_numeric($telp) && strlen($telp)<5){
$error.="No telp tidak valid";
}

*/

//http://www.aaezha.com/2012/11/php-validasi-angka-pada-form.html  validasi numerik
//if(!empty($var_nama)){

 /*$pattern = "[^a-zA-Z ]"; // karakter selain a-z A-Z & spasi

  if(preg_match($pattern,$var_nama)) {

    //match, berarti ada karakter selain alpha & spasi

    echo "salah";

  } else {

    echo "benar";

  } */

//}

//echo "<br>$var_nama";

//exit;

if(is_numeric($var_nama)){
	echo" hanya bisa diisi dengan karakter<br>"; //jika benar
	}else {
	echo "jalakan anda sudah benar<br>"; //jika salah
	}
	
exit;

if(!is_numeric($var_nama)){
	echo"hanya bisa diisi dengan angka <br>"; //jika benar
	}else {
	echo "jalakan anda sudah benar <br>"; //jika salah
	}
exit;
echo "Nama : ".$var_nama."<br>";
echo "Telepon :".$var_telepon."</br>";
echo "Propinsi :".$var_propinsi."</br>";
echo "Alamat :".$var_alamat."</br>";



?>