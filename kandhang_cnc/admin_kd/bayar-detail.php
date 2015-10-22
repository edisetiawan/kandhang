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
  $sql_check="SELECT * FROM tb_confirm  where confirm_id_order='".$action."'";// JOIN tb_confirm ON tb_order.order_id = tb_confirm.confirm_id_order";
  $result=mysql_query($sql_check);
  $data=mysql_fetch_array($result);


?>
<h2>Detail Konfirmasi Pembayaran</h2>
<a href="index.php?page=7"><h4>BACK</h4></a>
<table>
              <tr>  <td>No ID</td><td>:</td><td><?php echo $data['confirm_id_order']; ?></td></tr>  
              <tr>  <td>Bukti</td><td>:</td><td><img src="../images_bukti/<?php echo $data['confirm_foto']; ?>"/></td></tr>  
              <tr>  <td>Nama</td><td>:</td><td><?php echo $data['confirm_nama']; ?></td></tr>  
              <tr>  <td>Email</td><td>:</td><td><?php echo $data['confirm_email']; ?></td></tr>  
              <tr>  <td>Tanggal Tranfer</td><td>:</td><td><?php echo $data['confirm_tanggal']; ?></td></tr>  
              <tr>  <td>Nila Tranfer</td><td>:</td><td>Rp. <?php echo number_format($data['confirm_nilai'],2,",",".");  ?></td></tr>  


</table>