<html>
<head>
<title>
validasi
</title>
</head>
<body>
<?php
if($_GET['action']=='n'){
$errorNama="nama tidak boleh ksong";
}
if($_GET['actionn']=='t'){
$errorTelepon= "telepon harap disi";
}
?>
<form method="post" action="save_alamat.php">
Nama Penerima <input type="text" name="frm_nama"><br>
<?php
if ($errorNama){
echo $errorNama;
}
?>
Telepon <input type="text" name="frm_telepon"><br>
<?php
if ($errorTelepon){
echo $errorTelepon;
}
?>

Propinsi <select name="frm_propinsi">
			<option value="">--Pilihan--</option>
			<option value="1">Yogyakarta</option>
			<option value="2">Jakarta</option>
			<option value="3">Bandung</option> 
		</select><br>
alamat lengkap <textarea name="frm_alamat"></textarea></br>
<input type="submit" name="kirim" value="Kirimkan">
</form>	
		</body>