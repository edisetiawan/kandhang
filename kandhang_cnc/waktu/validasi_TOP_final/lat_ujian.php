<?php
//session_start();
mysql_connect('localhost','root','');
mysql_select_db('kandhang_bnc');
?>
<html>
<head>
<title>JQuery Form Validation</title>
<!--<link rel="stylesheet" href="val.css" type="text/css" />-->
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript" src="jquery.validate.js"></script>
<script type="text/javascript">
var htmlobjek;
$(document).ready(function(){
  //apabila terjadi event onchange terhadap object <select id=propinsi>
  $("#propinsi").change(function(){
    var propinsi = $("#propinsi").val();
    $.ajax({
        url: "ambilkota.php",
        data: "propinsi="+propinsi,
        cache: false,
        success: function(msg){
            //jika data sukses diambil dari server kita tampilkan
            //di <select id=kota>
            $("#kota").html(msg);
        }
    });
  });
  $("#kota").change(function(){
    var kota = $("#kota").val();
    $.ajax({
        url: "ambilkecamatan.php",
        data: "kota="+kota,
        cache: false,
        success: function(msg){
            $("#kec").html(msg);
        }
    });
  });
});

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
  Propinsi  <select name="propinsi" id="propinsi" class="required propinsi">
						<option value="">--Pilih Provinsi--</option>
						<?php
						//mengambil nama-nama propinsi yang ada di database
						$propinsi = mysql_query("SELECT * FROM prov ORDER BY nama_prov");
						while($p=mysql_fetch_array($propinsi)){
						echo "<option value=\"$p[id_prov]\">$p[nama_prov]</option>\n";
						}
						?>
					</select><br> 

	Kota 		<select name="kota" id="kota" class="required kota">
						<option value="">--Pilih Kabupaten/Kota--</option>
						<?php
						//mengambil nama-nama propinsi yang ada di database
						$kota = mysql_query("SELECT * FROM kabkot ORDER BY nama_kabkot");
						while($p=mysql_fetch_array($propinsi)){
						echo "<option value=\"$p[id_kabkot]\">$p[nama_kabkot]</option>\n";
						}
						?>
				</select>
				<br>
	Kecamatan <select name="kec" id="kec" class="required kec">
						<option value="">--Pilih Kecamatan--</option>
				</select>
	<br>
	Alamat <textarea name="frm_alamat"> </textarea><br>
	<input type="submit" name="submit" value="Lanjut">
	
</form>
</div>
</body>
</html>