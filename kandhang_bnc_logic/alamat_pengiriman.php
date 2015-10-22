<?php
session_start();
require_once('admin/inc-db.php');
if(!empty($_SESSION['username']) and ($_SESSION['email'])){
    //header('location: login.php');
	echo "anda berhak akses";
} else {

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>


<script type="text/javascript" src="js/jquery.js"></script>
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

<a href="index.php">Lanjut</a>
<p>Alamat Pengiriman<select name="select">
        <option>alamat baru</option>
        <option>alamat lama</option>
      </select></p>
<form id="form5" name="form5" method="post" action="transfer1.php">
<table width="200" border="1">
  <tr>
    <td>Nama Penerima </td>
    <td>:</td>
    <td><input type="text" name="frm_penerima" /></td>      
  </tr>
  <tr>
    <td>Telepon/Handpone</td>
    <td>:</td>
    <td><input type="text" name="frm_hp" /></td>
  </tr>
  <tr>
    <td>Provinsi</td>
    <td>:</td>
    <td><select name="propinsi" id="propinsi">
<option>--Pilih Provinsi--</option>
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
    <td>Kota/Kabupaten</td>
    <td>:</td>
    <td><select name="kota" id="kota">
<option>--Pilih Kabupaten/Kota--</option>
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
    <td>Kecamatan</td>
    <td>:</td>
    <td><select name="kec" id="kec">
<option>--Pilih Kecamatan--</option>
</select></td>
  </tr>
  <tr>
    <td>Alamat Lengkap </td>
    <td>:</td>
    <td><textarea name="frm_alamat"></textarea></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>
      <label>
        <input type="submit" name="Submit2" value="Submit" />
        </label>
    </td>
  </tr>
</table>
</form>
</body>
</html>
<?php
}
?>