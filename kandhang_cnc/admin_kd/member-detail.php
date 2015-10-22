<?php
session_start();
error_reporting(0);
//echo "ini adalah session: ".$_SESSION['userpass'];
//exit;
if(empty($_SESSION['userpass'])){
    header('location:error-404.php');
    exit;
}
require_once('inc-db.php');
$action=$_GET['action'];
//echo $action;
//exit;

$sql_show="SELECT * FROM tb_member JOIN tb_profil ON tb_member.member_id = tb_profil.member_id WHERE tb_member.member_id='".$action."'";
//echo $sql_show;
//exit;
$result=mysql_query($sql_show);
$data=mysql_fetch_array($result);
$m=$data['profil_kecamatan'];

//echo $m;
//exit;
$sql_showp="SELECT
    prov.nama_prov
    , kabkot.nama_kabkot
    , kec.nama_kec
    FROM
    kabkot
    INNER JOIN kec 
        ON (kabkot.id_kabkot = kec.id_kabkot)
    INNER JOIN prov 
        ON (prov.id_prov = kabkot.id_prov) WHERE kec.id_kec='".$m."'";
//echo $sql_showp;
//exit;
$result1=mysql_query($sql_showp);
$data1=mysql_fetch_array($result1);
?>
<form>
<table>
<tr><td>Nama </td><td>:</td><td><?php echo $data['profil_nama']; ?></td></tr>
<tr><td>Email </td><td>:</td><td><?php echo $data['member_email']; ?></td></tr>
<tr><td>Tanggal Masuk </td><td>:</td><td><?php echo $data['member_tanggal']; ?></td></tr>
<tr><td>Tanggal Lahir </td><td>:</td><td><?php echo $data['profil_tgl_lahir']; ?></td></tr>
<tr><td>Telepon </td><td>:</td><td><?php echo $data['profil_telepon']; ?></td></tr>
<tr><td>Provinsi </td><td>:</td><td><?php echo $data1['nama_prov']; ?></td></tr>
<tr><td>Kabupaten </td><td>:</td><td><?php echo $data1['nama_kabkot']; ?></td></tr>
<tr><td>Kecamatan</td><td>:</td><td><?php echo $data1['nama_kec']; ?></td></tr>
<tr><td>Alamat</td><td>:</td><td><?php echo $data['profil_alamat']; ?></td></tr>
</table>
</form>