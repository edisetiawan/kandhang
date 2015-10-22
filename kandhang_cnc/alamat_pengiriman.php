<?php
session_start();
error_reporting(0);
require_once('admin_kd/inc-db.php');
$id_member=$_SESSION['member_id'];
$sql_show="select * from tb_member join tb_profil on tb_member.member_id=tb_profil.member_id where tb_profil.member_id='".$id_member."'";
$result=mysql_query($sql_show);
$data=mysql_fetch_array($result);
//---------------------------------------------------------
$var_nama=$data['profil_nama'];
$var_lahir=$data['profil_tgl_lahir'];
$var_telepon=$data['profil_telepon'];
//----------------------------------------------------------
$var_email=$data['member_email'];
//----------------------------------------------------------
$var_prov=$data['profil_provinsi'];
$var_kota=$data['profil_kabupaten'];
$var_kec=$data['profil_kecamatan'];
$var_alamat=$data['profil_alamat'];

$error=0;
if(empty($var_nama)){
    $error=1;
}
if(empty($var_email)){
    $error=2;
}
if(empty($var_lahir)){
    $error=3;
}
if(empty($var_telepon)){
    $error=4;
}
if(empty($var_prov)){
    $error=5;
}
if(empty($var_kota)){
    $error=6;
}
if(empty($var_kec)){
    $error=7;
}
if(empty($var_alamat)){
    $error=7;
}
if($error !=0){
 header('location: profil.php?action=failed');
}







?>
<html>
<head>
<title>Kandhang</title>

<!--<link rel="stylesheet" href="val.css" type="text/css" />-->
<!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="css/modern-business.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
	
<script type="text/javascript" src="js_validasi/jquery.js"></script>

<script type="text/javascript" src="js_validasi/jquery.validate.js"></script>

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
<?php
require_once('navigasi_cp.php');
?>
   <div class="container">
     <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Alamat Pengiriman
                    <small></small>
                </h1>
               
            </div>
        </div>
	<div class="row">
		<div class="col-lg-12">
			
			
<form id="form1" method="post" action="choose_payment_m.php">

 
<table>
	<tr>
		<td>Nama Penerima</td><td>:</td><td> <input type="text" name="frm_penerima" id="frm_penerima"></td>
	</tr>
	<tr>
		<td>Telepon/Handpone</td><td>:</td><td><input type="text" name="frm_hp" id="frm_hp"></td>
	</tr>
	<tr>
		<td>Propinsi</td><td>:</td>
			<td>
			
			<select name="propinsi" id="propinsi" class="required propinsi">
						<option value="">--Pilih Provinsi--</option>
						<?php
						//mengambil nama-nama propinsi yang ada di database
						$propinsi = mysql_query("SELECT * FROM prov ORDER BY nama_prov");
						while($p=mysql_fetch_array($propinsi)){
						echo "<option value=\"$p[id_prov]\">$p[nama_prov]</option>\n";
						}
						?>
					</select>
			</td>
	</tr>
	<tr>
		<td>Kota</td><td>:</td>
			<td>
			
			<select name="kota" id="kota" class="required kota">
						<option value="">--Pilih Kabupaten/Kota--</option>
						<?php
						//mengambil nama-nama propinsi yang ada di database
						$kota = mysql_query("SELECT * FROM kabkot ORDER BY nama_kabkot");
						while($p=mysql_fetch_array($propinsi)){
						echo "<option value=\"$p[id_kabkot]\">$p[nama_kabkot]</option>\n";
						}
						?>
				</select>
		
		</td>
	</tr>
	<tr>
	<td>Kecamatan </td><td>:</td>
			<td>
			<select name="kec" id="kec" class="required kec">
						<option value="">--Pilih Kecamatan--</option>
				</select>
				
				</td>
	</tr>
	<tr>
		<td>Alamat</td><td>:</td><td><textarea name="frm_alamat"> </textarea></td>
	</tr>
	<tr>
		<td>&nbsp;</td><td>&nbsp;</td><td><input type="submit" name="submit" value="Lanjut"></td>
	</tr>
</table>
</form>
			</div>
		</div>
	</div>
</body>

</html>