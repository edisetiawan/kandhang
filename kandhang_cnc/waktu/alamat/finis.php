<?php
//session_start();
mysql_connect('localhost','root','');
mysql_select_db('kandhang_bnc');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<script src="jquery.js"></script>
		<script type="text/javascript" src="jquery.validate.js"></script>
		<script type="text/javascript" src="messages_id.js"></script>
	<!--	<script type="text/javascript" src="js/jqueryy.js"></script>-->
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

</script>
   <link href="bootstrap.min.css" rel="stylesheet">
		<style type="text/css">label {
				width:20em;
				float: left;
			}
			label.error {
				font-family: verdana;
				float: right;
				color: red;
				padding-left: .1em;
			
			}
</style>
		<script>$(document).ready(function() {
				$("#form1").validate();
			});
</script>
	</head>
	<body>
		<div id='container'>
		<div class='span10'>
		<form id="form1" method="get" action="save_finis.php">
			<fieldset>
				<legend>
					 Form pendaftaran
				</legend>
				<p>
					<!--perhatikan antara label for ="name",id="name",name='nama'
					semua harus sama -->
					<label for="nama">Name</label>
				     <!--perhatikan class="required" dan minlength="2" ini 
				     	adalah format cek validasi gaya jquery 
				     	validasi apa saja yang didukung lihat lengkapnya diwebsite -->
					<input id="nama" name="nama" size="25" class="required" minlength="2" />
				</p>
				<p>
				<label for="umur">umur</label>
			
				<input id="umur" name="umur" size="25" class="required number" />
				</p>
				<p>
					<label for="email">E-Mail</label>
				
					<input id="email" name="email" size="25"  class="required email" />
				</p>
				<p>
					<label for="propinsi">E-Mail</label>
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
				</p>
				<p>
					<label for="kota">Kota/Kabupaten</label>
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
				</p>
						<p>
					<label for="kec">Kota/Kabupaten</label>
					<select name="kec" id="kec" class="required kec">
						<option value="">--Pilih Kecamatan--</option>
					</select>
				</p>
				<p>
					<label for="url">URL</label>
					<em> </em>
					<input id="url" name="url" size="25"  class="url" value="" />
				</p>
				<p>
					<label for="ccomment">Your comment</label>
								<textarea id="comment" name="comment" cols="20"  class="required" minlength="10"></textarea>
				</p>
				<p>
					<input class="submit" type="submit" value="Daftar"/>
				</p>
			</fieldset>
		</form>
		</div>
		</div>
	</body>
</html>