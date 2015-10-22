<?php		
//include kelas captcha!
		session_start();
		require_once ('captcha.php');
?>
<!DOCTYPE HTML>
<html>
	<body>
		<!--buat form dan tambahkan image captcha-->
		<div style='background-color:#F1F1E3'>
		<form method="post" action="" >
			Name:
			<br />
			<input id="nama" name="nama" type="text"  maxlength="75"  />
			<br />
			Pesan:
			<br />
			<textarea name='pesan' > 
</textarea>
<br />			Captcha*:
			<br />
			<img alt="captcha" src="<?php
			//kode untuk menampilkan captcha!
		echo captcha::image_url('pesan');
		?>">
			<br />
			<input id="captcha" name="captcha" type="text"  />
			<br />
			<input type="submit"  />
		</form>
		</div>
		<?php
//cara mengecek apakah input capthca user
//benar atau salah
if($_POST) {

	if(captcha::check('pesan')) {
		echo ' captcha! OK! <br>';
		/*Di bagian ini bisa anda ganti
		dengan code untuk menyimpan data kedatabase
		atau pemrosesan lainnya sesuai kebutuhan */
		echo "Nama :" . $_POST['nama'] . "<br/>";
		echo "<p>Pesan :" . $_POST['pesan'] . "<br/>";

	} else
		echo "captcha salah, silahkan ulangi!";
}?>
	</body>
</html>
