<html>
<head>
<title>JQuery Form Validation</title>
<!--<link rel="stylesheet" href="val.css" type="text/css" />-->
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript" src="jquery.validate.js"></script>
<script type="text/javascript">
$(document).ready(function() {
$("#form1").validate({
	rules:{	
	frm_nama:"required",
	frm_email:{ required: true,email: true},
	frm_cpemail:{required: true,equalTo: "#frm_email"},
	frm_penerima:{required: true},
	frm_hp:{required: true,number: true},
	frm_propinsi: {required: true},
	frm_kota: {required: true},
	frm_kecamatan: {required: true},
	frm_alamat: {required: true}
		  },
	messages:{ 
		    frm_nama:{		
					required:'Nama harus di isi'},
			frm_email:{		
					required:'Email tidak boleh kosong',
					email   :'email harus valid'},
			frm_cpemail: {	
					required:'Email tidak boleh kosong',
					equalTo :'email harus sama'},
			frm_penerima:{
					required:'penerima harus disi'},
			frm_hp:{
					required:'no hp harus disi',
					number  :'Hanya boleh di isi Angka'},
			frm_propinsi: {
					required: 'propinsi harus disi'},
			frm_kota: {
					required: 'kota harus disi'},
			frm_kecamatan: {
					required: 'kecamatan harus disi'},
			frm_alamat: {
					required: 'alamat harus disi'}
			},
     success: function(label) {
        label.text('OK!').addClass('valid');}
	});
});
</script>
</head>
<body>
<div class="form-div">
<form id="form1" method="post" action="save_lat_ujian.php">
  Nama  <input type="text" name="frm_nama" id="frm_nama"><br>
  Email <input type="text" name="frm_email" id="frm_email"><br>
  Konfirmasi E-Mail <input type="text" name="frm_cpemail" id="frm_cpemail"><br>
  <hr>
  Nama Penerima <input type="text" name="frm_penerima" id="frm_penerima"><br>
  Telepon/Handpone <input type="text" name="frm_hp" id="frm_hp"><br>
  Propinsi <select name="frm_propinsi" id="frm_propinsi">
				<option value="">--Pilih Provinsi--</option>
				<option value="1">Jawa Tengan</option>
				<option value="2">Jawa Barat</option>
				<option value="3">Jawa Timur</option>
			</select><br>
	Kota <select name="frm_kota" id="frm_kota">
				<option value="">--Pilih Kota--</option>
				<option value="1">Bandung</option>
				<option value="2">Surabaya</option>
				<option value="3">Jakarta</option>
		</select><br>
	Kecamatan <select name="frm_kecamatan" id="frm_kecamatan">
				<option value="">--Pilih Kecamayan--</option>
				<option value="1">Jawa Tengan</option>
				<option value="2">Jawa Barat</option>
				<option value="3">Jawa Timur</option>
				</select><br>
	Alamat <textarea name="frm_alamat"> </textarea><br>
	<input type="submit" name="submit" value="Lanjut">
	
</form>
</div>
</body>
</html>