<?php
session_start();
if(empty($_SESSION['password'])){
   header('location: index.php');
} else {
require_once('admin_kd/inc-db.php');
error_reporting(0);


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Kandhang</title>

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
</script>
  </head>
  <body>
<?php
require_once('navigasi_cp.php');
$ambil_email=$_GET['action'];
$id_member=$_SESSION['member_id'];
$sql_Show="SELECT *
FROM
        tb_member
    INNER JOIN tb_profil 
        ON (tb_member.member_id = tb_profil.member_id) 
        WHERE tb_member.member_email='".$ambil_email."' OR tb_member.member_id='".$id_member."'";
$result=mysql_query($sql_Show);
$data=mysql_fetch_array($result);
$var_nama=$data['profil_nama'];
$var_lahir=$data['profil_tgl_lahir'];
$var_telepon=$data['profil_telepon'];
$var_email=$data['member_email'];
//-----------------------------------------------------------------------
$var_provinsi=$data[''];
$var_kota=$data['profil_provinsi'];
$var_kec=$data['profil_kecamatan'];
$var_alamat=$data['profil_alamat'];
//echo $data['profil_id'];
//exit;
?>

    <!-- Page Content -->

    <div class="container">
   
      <div class="row">
      
        <div class="col-lg-12">
          <h1 class="page-header">Profil</h1>
         
        </div>
      </div><!-- /.row -->
      <div class="row">
	 	  
        <div class="col-sm-8">
<?php
if($_GET['action']=='failed'){
    echo "<b style='color: red;'>maaf Data profil anda belum lengkap harap anda melengkapi terlebih dahulu</b>";
}


?>
            <form role="form" method="POST" action="profil-update.php">
	          
	              
	             <table border='0'>				 
				 <tr>
				 <td><b>Nama</b></td><td>&nbsp;</td><td><input type="text" name="frm_nama" value="<?php echo $var_nama; ?>"/></td>
				 </tr>
                 <tr>
				 <td><b>Tanggal Lahir</b></td><td>&nbsp;</td><td>
                 
                 <select name="frm_tanggal">
   <?php
for($n=1; $n<=31; $n++){ 
?>
   <option value="<?php echo $n;?>"><?php echo $n;?></option>
   <?php } ?>
 </select>
 -

 <select name="frm_bulan" >
   <?php
$bln = array('','Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
for($n=1; $n<=12; $n++){
?>
   <option value="<?php echo $n;?>"><?php echo  $bln[$n];?></option>
   <?php } ?>
 </select>
 -
 
  <select name="frm_tahun" >
   <?php
for($n=1920; $n<=2020; $n++){ #melakukan perulangan angka 1920 s.d 2020
	if($n == 1990){ #menunjuk 1990 sebagai default pilihan
?>
   <option value="<?php echo $n;?>" selected><?php echo $n;?></option>
   <?php
	}else{
?>
   <option value="<?php echo $n;?>"><?php echo $n;?></option>
   <?php	}
} 
?>
 </select>
                 
                 </th>
				 </tr>
                 <tr>
				 <td><b>Telepon</b><td>&nbsp;</td><td><input type="text" name="frm_telepon" value="<?php echo $var_telepon; ?>"/></td>
				 </tr>
				 <tr>
				 <td><b>Email</b></td><td>&nbsp;</td>
                 <td><input type="text" name="frm_email"  value="<?php echo $var_email; ?>" disabled="disable"/></td>
				 </tr>
				 <tr>
				 <td><b>Propinsi</b></td><td>&nbsp;</td><td>	
			     <select name="propinsi" id="propinsi" class="required propinsi">
						<option value="">--Pilih Provinsi--</option>
						<?php
						//mengambil nama-nama propinsi yang ada di database
						$propinsi = mysql_query("SELECT * FROM prov ORDER BY nama_prov");
                 	    while($p=mysql_fetch_array($propinsi)){
						echo "<option value=\"$p[id_prov]\">$p[nama_prov]</option>\n";
						}
						?>
                 </select></td>
				 </tr>
                  <tr>
				 <td><b>Kab/Kota</b> <?php "id :".$prov; ?></td><td>&nbsp;</td><td>		
                <select name="kota" id="kota" class="required kota">
						<option value="">--Pilih Kabupaten/Kota--</option>
						<?php
						//mengambil nama-nama propinsi yang ada di database
						$kota = mysql_query("SELECT * FROM kabkot ORDER BY nama_kabkot");
						while($p=mysql_fetch_array($propinsi)){
						echo "<option value=\"$p[id_kabkot]\">$p[nama_kabkot]</option>\n";
						}
						?>
				</select></td>
				 </tr>
                 	<tr>
     	          <td><b>Kecamatan</b> </td><td>:</td>
		          	<td>
		      	<select name="kec" id="kec" class="required kec">
					<option value="">--Pilih Ke<strong></strong>camatan--</option>
				</select>
				</td>
            	</tr>
                  	<tr>
	               <td><b>Alamat</b> </td><td>:</td>
		          	<td>
		      	<textarea name="frm_alamat"><?php echo $var_alamat; ?></textarea>
				</td>
            	</tr>
				 <tr>
				 <td></td><td></td><td align="reigth"> <button type="submit" class="btn btn-primary">SIMPAN</button></td>
				 </tr>
				<!-- <tr>
				 <td></td><td></td><td align="reigth"> <button type="submit" class="btn btn-primary"><i class="fa fa-facebook"></i> Login dengan facebook</button></td>
				 </tr>-->
				 
					</table>
            </form>
        </div>

      </div><!-- /.row -->

    </div><!-- /.container -->
<?php
//require_once('footer.php');
?><!-- /.container -->

    <!-- JavaScript -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/modern-business.js"></script>

  </body>
</html>
<?php
}
?>