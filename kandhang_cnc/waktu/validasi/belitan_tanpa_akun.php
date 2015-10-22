<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Services - Modern Business - Start Bootstrap Template</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="css/modern-business.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<!--validasi -->
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
			//-----------------------------------------------------------------------------------
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
//exit;
//require_once('navigasi.php');
?>
   <div class="container">
     <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Services
                    <small>What We Do</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="index.php">Home</a>
                    </li>
                    <li class="active">Services</li>
                </ol>
            </div>
        </div>
         <div class="row">

            <div class="col-lg-12">
                <ul id="myTab" class="nav nav-tabs">
                    <li class="active"><a href="#service-one" data-toggle="tab"><h2>Beli Tanpa Akun</h2></a>
                    </li>                 
                </ul>
                <div id="myTabContent" class="tab-content">
                    <div class="tab-pane fade in active" id="service-one">
				
					<form id="form1" method="post" action="choose_payment.php">
					
					<!--
					Nama  <input type="text" name="frm_nama" id="frm_nama"><br>
				    Email <input type="text" name="frm_email" id="frm_email"><br>
				    Konfirmasi E-Mail <input type="text" name="frm_cpemail" id="frm_cpemail"><br> 
					-->
					
			-------------------------------------------------------------------------------------------------------------------------------		
					<p>Beli Tanpa Akun</p>
<table width="359" border="0">
  <tr>
    <td width="169">Nama Pembeli </td>
    <td width="12">:</td>
    <td width="156">
        <input type="text" name="frm_nama" id="frm_nama"/>
     </td>
  </tr>
  <tr>
    <td>Email Pembeli </td>
    <td>:</td>
    <td>
    <input type="text" name="frm_email" id="frm_email"/>
    <br />
    </td>
  </tr>
  <tr>
    <td>konfirmasi email pembeli </td>
    <td>:</td>
    <td><input type="text" name="frm_cpemail" id="frm_cpemail" /></td>
  </tr>
</table>
<!-- ............................................................... -->
----------------------------------------------------------------------------------------------
<p>Alamat Pengiriman</p>
<table width="200" border="0">
  <tr>
    <td>Nama Penerima </td>
    <td>:</td>
    <td>
      <input type="text" name="frm_penerima" />
       </td>
  </tr>
  <tr>
    <td>Telepon/Handpone</td>
    <td>:</td>
    <td><input type="text" name="frm_hp" id="frm_hp"/>
   </td>
  </tr>
  <tr>
    <td width="359">Provinsi</td>
    <td width="359">:</td>
    <td width="359"><select name="frm_propinsi" id="frm_propinsi">
      <option value="">--Pilih Provinsi--</option>
      <?php
/*mengambil nama-nama propinsi yang ada di database
$propinsi = mysql_query("SELECT * FROM prov ORDER BY nama_prov");
while($p=mysql_fetch_array($propinsi)){
echo "<option value=\"$p[id_prov]\">$p[nama_prov]</option>\n";
} */
?>
    </select>
    </td>
  </tr>
  <tr>
    <td>Kota/Kabupaten</td>
    <td>:</td>
    <td><select name="frm_kota" id="frm_kota">
<option value="">--Pilih Kabupaten/Kota--</option>
<?php
/*mengambil nama-nama propinsi yang ada di database
$kota = mysql_query("SELECT * FROM kabkot ORDER BY nama_kabkot");
while($p=mysql_fetch_array($propinsi)){
echo "<option value=\"$p[id_kabkot]\">$p[nama_kabkot]</option>\n";
}  */
?>
</select>
      </td>
  </tr>
  <tr>
    <td>Kecamatan</td>
    <td>:</td>
    <td  width="359"><select name="frm_kecamatan" id="frm_kecamatan">
<option value="">--Pilih Kecamatan--</option>
</select>
</td>
  </tr>
  <tr>
    <td>Alamat Lengkap </td>
    <td>:</td>
    <td><textarea name="frm_alamat"></textarea>
      </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>
      <label>
        <input type="submit" name="Submit2" value="Lanjut" />
        </label>    </td>
  </tr>
</table> 

					</form>
					
					
                    </div>
					
                </div>
            </div>

        </div>
  <!--container-->
  </div>
    <!-- /.container -->

    <div class="container">

        <hr>

        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Company 2013</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- JavaScript -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/modern-business.js"></script>

</body>

</html>
