<html>
<head>
<title>Validasi Form</title>
<style type="text/css">
<!--
.style1 {
	font-size: 10px;
	color: #FF0000;
}
-->
</style>
<body>

<div style="font-family:cambria">
<?php
mysql_connect('localhost','root','');
mysql_select_db('kandhang_siap');
if($_POST["tombol"]=="Kirim Komentar"){
//registrasi variable
	$Nama		= $_POST["nama"];
	$var_telepon=$_POST['frm_telepon'];
	$Email		= $_POST["email"];
	$cpemail	= $_POST['cpemail'];
	$Web		= $_POST["web"];
	$Komentar	= $_POST["komentar"];
//validasi form tidak boleh kosong
	if($Nama == ""){$errorNama="Nama tidak boleh kosong...";}
	if($var_telepon==""){$errorTelepon="No telepon tidak boleh kosong";}
	if($Email == ""){$errorEmail="Email tidak boleh kosong...";}
	if($cpemail == ""){$errorCpemail="Email tidak boleh kosong";}
	if($Web == ""){$errorWeb="Web/Blog tidak boleh kosong...";}
	if($Komentar == ""){$errorKomen="Silahkan masukkan komentar anda...";}
	if($cpemail != $Email ){$errorEmailCon="Email harus sama";}
//validasi angka tidak diperkenankan	
	if(is_numeric($Nama)){$errorNumericNama="Karakter angka tidak diperkenankan...";}
	if(!is_numeric($var_telepon)){$errorCharTelepon="inputan harus angka....";}
	if(is_numeric($Email)){$errorNumericEmail="Karakter angka tidak diperkenankan...";}
	if(is_numeric($Web)){$errorNumericWeb="Karakter angka tidak diperkenankan...";}
//validasi penulisan email
	if(!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $Email)){
		$errorEmail_2="Penulisan Email salah, ex : user@example.com";
	}
	$sql_insert="insert into tb_palsu values ('$Nama','$var_telepon','$Email','$cpemail','$Web','$Komentar')";
	$result=mysql_query($sql_insert);
	//echo $sql_insert;
	//header('location: ss.php');
	if($result){
	header('location: vlidasi_php_edi.php');
	}
}
?>

<form method="post" name="form_bukutamu" action="" enctype="multipart/form-data">
<table align="center">
<tr>
	<td colspan="2" height="50"><strong>Tinggalkan Komentar Anda</strong></td>
</tr>
<tr>
	<td>Nama</td>
	<td><input name="nama" type="text" size="25" value="<?php echo"$Nama"; ?>"><span style="color:red">*</span>
		<?php
        if($errorNama){
			echo"<div style='color:red; font-size:10pt'>$errorNama</div>";
		}else{
			echo"<div style='color:red; font-size:10pt'>$errorNumericNama</div>";
			}
		?>
	</td>
</tr>
<tr>
	<td>Nomor Hp</td>
	<td><input name="frm_telepon" type="text" size="25" value="<?php echo"$var_telepon"; ?>"><span style="color:red">*</span>
		<?php
        if($errorTelepon){
			echo"<div style='color:red; font-size:10pt'>$errorTelepon</div>";}
		else{
			echo"<div style='color:red; font-size:10pt'>$errorCharTelepon</div>";
		}
		?>
	</td>
</tr>
<tr>
	<td>Email</td>
	<td><input name="email" type="text" size="25" value="<?php echo"$Email"; ?>"><span style="color:red">*</span>
		<?php
        if($errorEmail){echo"<div style='color:red; font-size:10pt'>$errorEmail</div>";}else if($errorNumericEmail){echo"<div style='color:red; font-size:10pt'>
			$errorNumericEmail</div>";
		}else{echo"<div style='color:red; font-size:10pt'>$errorEmail_2</div>";}
		?>
	</td>
</tr>
<tr>
	<td>Konfrim Email</td>
	<td><input name="cpemail" type="text" size="25" value="<?php echo"$cpemail"; ?>"><span style="color:red">*</span>
		<?php
        if($errorCpemail){
			echo"<div style='color:red; font-size:10pt'>$errorCpemail</div>";}
		else{
			echo"<div style='color:red; font-size:10pt'>$errorEmailCon</div>";
		}
		?>
	</td>
</tr>
<tr>
	<td>Propinsi</td>
	<td><select name="frm_name">
			<option value="">--Pilihan--</option>
			<option value="1">Yogyakarta</option>
			<option value="2">Bandung</option>
			<option value="3">Jakartan</option>
		</select>
		<?php
        //if($errorWeb){echo"<div style='color:red; font-size:10pt'>$errorWeb</div>";}else{echo"<div style='color:red; font-size:10pt'>$errorNumericWeb</div>";}
		?>
	</td>
</tr>
<tr>
	<td>Web/Blog</td>
	<td><input name="web" type="text" size="25" value="<?php echo"$Web"; ?>">
		<?php
        if($errorWeb){echo"<div style='color:red; font-size:10pt'>$errorWeb</div>";}else{echo"<div style='color:red; font-size:10pt'>$errorNumericWeb</div>";}
		?>
	</td>
</tr>
<tr>
	<td>Komentar</td>
	<td><textarea name="komentar" cols="35" rows="4"><?php echo"$Komentar"; ?></textarea>
	<?php
        if($errorKomen){echo"<div style='color:red; font-size:10pt'>$errorKomen</div>";}
		?>
	</td>
</tr>
<tr>
	<td colspan="2" align="center"><input type="submit" name="tombol" value="Kirim Komentar"></td>
</tr>
<tr>
	<td colspan="2"><div style="font-size:10pt; color:red">* Harus diisi</div></td>
</tr>
</table>
</form>
</div>

</body>
</head>
</html>