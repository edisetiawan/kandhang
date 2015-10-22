<?php
error_reporting(0);
require_once('inc-db.php');

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<a href="index.php">back</a>
<p>Detail Order Tanpa Akun </p>
<table width="347" border="1">
<?php
$tanpa_akun_id=$_GET['detail'];
$sql_showw="SELECT
    tb_tanpa_akun.tanpa_akun_email
    , tb_order.date
    , order_id
    , tb_order.status_order
    , tb_alamat_kirim.kirim_id
FROM
    tb_tanpa_akun
    INNER JOIN tb_alamat_kirim 
        ON (tb_tanpa_akun.tanpa_akun_id = tb_alamat_kirim.tanpa_akun_id)
    INNER JOIN tb_order 
        ON (tb_alamat_kirim.kirim_id = tb_order.kirim_id) AND tb_tanpa_akun.tanpa_akun_id=".$tanpa_akun_id;
$resultt=mysql_query($sql_showw);
$data1=mysql_fetch_array($resultt);
$kirim_id=$data1['kirim_id'];
?>
  <tr>
    <td width="160">No. Order </td>
    <td width="171"><?php echo $data1['order_id']?></td>
  </tr>
  <tr>
    <td>tgl order </td>
    <td><?php echo $data1['date']?></td>
  </tr>
  <tr>
    <td>status order </td>
    <td><form id="form1" name="form1" method="post" action="">
        <select name="select">
          <option><?php echo $data1['status_order']; ?></option>
          <option>dikirim</option>
          <option>lunas</option>
        </select><input type="submit" name="tombol"  value="Ubah Status" />    
    </form>
    </td>
  </tr>
</table>
<p>&nbsp;</p>
<table width="300" border="1">
  <tr>
    <td width="93">No </td>
    <td width="93">Nama Hewan </td>
    <td width="49">berat</td>
    <td width="61">jumlah</td>
    <td width="69">harga</td>
  </tr>
  <?php

//echo $tanpa_akun_id;
//exit;
//echo $status_order=$_POST['select'];
//echo "<br>KIRIM :".$kirim_id;
//exit;
if ($_POST['tombol']=="Ubah Status"){
    $status_order=$_POST['select'];
    $sql_update="UPDATE tb_order SET status_order='$status_order' WHERE kirim_id=".$kirim_id;
    //echo $sql_update;
    $result=mysql_query($sql_update);
   
}
exit;
$sql_Show="SELECT
    tb_hewan.hewan_nama
    , tb_hewan.hewan_bobot
    , tb_order_detail.jum_ekor
    , tb_hewan.hewan_harga_jual
FROM
    tb_hewan
    INNER JOIN tb_order_detail 
        ON (tb_hewan.hewan_id = tb_order_detail.hewan_id)
    INNER JOIN tb_order 
        ON (tb_order.order_id = tb_order_detail.order_id)
    INNER JOIN tb_alamat_kirim 
        ON (tb_alamat_kirim.kirim_id = tb_order.kirim_id)
    INNER JOIN tb_tanpa_akun 
        ON (tb_tanpa_akun.tanpa_akun_id = tb_alamat_kirim.tanpa_akun_id) AND  tb_tanpa_akun.tanpa_akun_id=".$tanpa_akun_id;
$result=mysql_query($sql_Show);
$no=0;
while($data=mysql_fetch_array($result)){
$no++;
?>
  <tr>
    <td><?php echo $no; ?></td>
    <td><?php echo $data['hewan_nama']; ?></td>
    <td><?php echo $data['hewan_bobot']; ?></td>
    <td><?php echo $data['jum_ekor']; ?></td>
    <td><?php echo $data['hewan_harga_jual']; ?></td>
  </tr>
<?php
}
?>
</table>
<p>&nbsp;</p>

<table width="400" border="1">
<?php
$sql_Show1="SELECT
    tb_alamat_kirim.kirim_nama_penerima
    , tb_alamat_kirim.kirim_telepon
    , tb_tanpa_akun.tanpa_akun_email
    , tb_alamat_kirim.kirim_kecamantan
    , tb_tanpa_akun.tanpa_akun_nama
FROM
    tb_alamat_kirim
    INNER JOIN tb_order 
        ON (tb_alamat_kirim.kirim_id = tb_order.kirim_id)
    INNER JOIN tb_tanpa_akun 
        ON (tb_tanpa_akun.tanpa_akun_id = tb_alamat_kirim.tanpa_akun_id) AND  tb_tanpa_akun.tanpa_akun_id=".$tanpa_akun_id;
$result2=mysql_query($sql_Show1);
$data2=mysql_fetch_array($result2);
$_SESSION['kec']=$data2['kirim_kecamantan'];
$sql_show2="SELECT
    prov.nama_prov
    , kabkot.nama_kabkot
    , kec.nama_kec
    , kec.id_kec
FROM
    kabkot
    INNER JOIN kec 
        ON (kabkot.id_kabkot = kec.id_kabkot)
    INNER JOIN prov 
        ON (prov.id_prov = kabkot.id_prov) AND kec.id_kec=".$_SESSION['kec'];
$result3=mysql_query($sql_show2);
$data3=mysql_fetch_array($result3);
?>
  <tr>
    <td width="169">Nama Pembeli </td>
    <td width="156"><?php echo $data2['tanpa_akun_nama']; ?></td>
  </tr>
  <tr>
    <td>Email Pembeli </td>
    <td><?php echo $data2['tanpa_akun_email']; ?></td>
  </tr>
  <tr>
    <td width="175">Nama Penerima </td>
    <td width="209"><?php echo $data2['kirim_nama_penerima']; ?></td>
  </tr>
   <tr>
    <td>No Telepon/HP</td>
    <td><?php echo $data2['kirim_telepon']; ?></td>
  </tr>
   <tr>
    <td>Provinsi </td>
    <td><?php echo $data3['nama_prov']; ?></td>
  </tr>
   <tr>
    <td>Kota/Kabupaten </td>
    <td><?php echo $data3['nama_kabkot']; ?></td>
  </tr>
   <tr>
    <td>Kecamatan</td>
    <td><?php echo $data3['nama_kec']; ?></td>
  </tr>
  <tr>
    <td>Alamat Pengiriman </td>
    <td><?php echo $data3['nama_kabkot']; ?></td>
  </tr>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>
