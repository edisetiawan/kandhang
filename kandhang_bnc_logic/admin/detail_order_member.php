<?php
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
$profil_id=$_GET['detail'];
//echo $profil_id;
//exit;
$sql_order="SELECT
    order_id
    , tb_order.date
    , tb_order.status_order
FROM
    kandhang_bnc.tb_alamat_kirim
    INNER JOIN kandhang_bnc.tb_order 
        ON (tb_alamat_kirim.kirim_id = tb_order.kirim_id)
    INNER JOIN kandhang_bnc.tb_profil 
        ON (tb_profil.profil_id = tb_alamat_kirim.profil_id) AND tb_profil.profil_id=".$profil_id;
$result=mysql_query($sql_order);
$data_order=mysql_fetch_array($result);
?>
  <tr>
    <td width="160">No. Order </td>
    <td width="171"><?php echo $data_order['order_id']; ?></td>
  </tr>
  <tr>
    <td>tgl order </td>
    <td><?php echo $data_order['date']; ?></td>
  </tr>
  <tr>
    <td>status order </td>
    <td><form id="form1" name="form1" method="post" action="cc.php">
        <select name="select">
          <option><?php echo $data_order['status_order']; ?></option>
          <option>dikirim</option>
          <option>lunas</option>
        </select><input type="submit" value="Ubah Status" />    
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
$sql_hewan="SELECT
    tb_hewan.hewan_nama
    , tb_hewan.hewan_bobot
    , tb_order_detail.jum_ekor
    , tb_hewan.hewan_harga_jual
FROM
    kandhang_bnc.tb_profil
    INNER JOIN kandhang_bnc.tb_alamat_kirim 
        ON (tb_profil.profil_id = tb_alamat_kirim.profil_id)
    INNER JOIN kandhang_bnc.tb_order 
        ON (tb_alamat_kirim.kirim_id = tb_order.kirim_id)
    INNER JOIN kandhang_bnc.tb_order_detail 
        ON (tb_order.order_id = tb_order_detail.order_id)
    INNER JOIN kandhang_bnc.tb_hewan 
        ON (tb_hewan.hewan_id = tb_order_detail.hewan_id) AND tb_profil.profil_id=".$profil_id;
$result1=mysql_query($sql_hewan);
$no=0;
while($data2=mysql_fetch_array($result1)){
$no++;
?>
    <tr>
    <td><?php echo $no; ?></td>
    <td><?php echo $data2['hewan_nama']; ?></td>
    <td><?php echo $data2['hewan_bobot']; ?></td>
    <td><?php echo $data2['jum_ekor']; ?></td>
    <td><?php echo $data2['hewan_harga_jual']; ?></td>
  </tr>
<?php
} 
?>
</table>
<p>&nbsp;</p>

<table width="400" border="1">
<?php
$sql_alamat="SELECT
    tb_profil.profil_nama
    , tb_member.member_email
    , tb_alamat_kirim.kirim_nama_penerima
    , tb_alamat_kirim.kirim_telepon
    , tb_alamat_kirim.kirim_provinsi
    , tb_alamat_kirim.kirim_kota
    , tb_alamat_kirim.kirim_kecamantan
    , tb_alamat_kirim.kirim_almt_lengkap
FROM
    kandhang_bnc.tb_profil
    INNER JOIN kandhang_bnc.tb_alamat_kirim 
        ON (tb_profil.profil_id = tb_alamat_kirim.profil_id)
    INNER JOIN kandhang_bnc.tb_member 
        ON (tb_member.member_id = tb_profil.member_id) AND tb_profil.profil_id=".$profil_id;
$resultt=mysql_query($sql_alamat);
$data_alamat=mysql_fetch_array($resultt);
$_SESSION['kec']=$data_alamat['kirim_kecamantan'];
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
    <td width="156"><?php echo $data_alamat['profil_nama']; ?></td>
  </tr>
  <tr>
    <td>Email Pembeli </td>
    <td><?php echo $data_alamat['member_email']; ?></td>
  </tr>
  <tr>
    <td width="175">Nama Penerima </td>
    <td width="209"><?php echo $data_alamat['kirim_nama_penerima']; ?></td>
  </tr>
   <tr>
    <td>No Telepon/HP</td>
    <td><?php echo $data_alamat['kirim_telepon']; ?></td>
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
    <td><?php echo $data_alamat['kirim_almt_lengkap']; ?></td>
  </tr>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>
