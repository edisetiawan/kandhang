<?php
session_start();
error_reporting(0);
//echo "ini adalah session: ".$_SESSION['userpass'];
//exit;
if(empty($_SESSION['userpass'])){
    header('location:error-404.php');
    exit;
}
    //error_reporting(0);
require_once('inc-db.php');
    $_SESSION['action']=$_GET['action'];
    //echo $_SESSION['action'];
    //exit;
$sql_show="SELECT *
FROM
    tb_order
    INNER JOIN tb_order_detail 
        ON (tb_order.order_id = tb_order_detail.order_id)
    INNER JOIN tb_alamat_kirim 
        ON (tb_alamat_kirim.kirim_id = tb_order.kirim_id)
    INNER JOIN tb_hewan 
        ON (tb_hewan.hewan_id = tb_order_detail.hewan_id)
    INNER JOIN tb_tanpa_akun 
        ON (tb_tanpa_akun.tanpa_akun_id = tb_alamat_kirim.tanpa_akun_id) WHERE tb_order.order_id='".$_SESSION['action']."'";
$result=mysql_query($sql_show);
$sql_showw="SELECT *
FROM
    tb_order
    INNER JOIN tb_order_detail 
        ON (tb_order.order_id = tb_order_detail.order_id)
    INNER JOIN tb_alamat_kirim 
        ON (tb_alamat_kirim.kirim_id = tb_order.kirim_id)
    INNER JOIN tb_hewan 
        ON (tb_hewan.hewan_id = tb_order_detail.hewan_id)
    INNER JOIN ktb_tanpa_akun 
        ON (tb_tanpa_akun.tanpa_akun_id = tb_alamat_kirim.tanpa_akun_id) WHERE tb_order.order_id='".$_SESSION['action']."'";
$result1=mysql_query($sql_showw);
$data1=mysql_fetch_array($result1);
$kecamatan=$data1['kirim_kecamatan'];

$sql_alamat="SELECT *
FROM
    kabkot
     JOIN kec 
        ON kabkot.id_kabkot = kec.id_kabkot
     JOIN prov 
        ON prov.id_prov = kabkot.id_prov where kec.id_kec='".$kecamatan."'";
$result12=mysql_query($sql_alamat);
$data12=mysql_fetch_array($result12);
    
    ?>

     <h2>Detail Order Tanpa Akun</h2>
            
      
               <br /> 
     <form method="post" action="order-t-ubah-status.php">
              <table  border="0">
    
                  
                   <tr> <td>No ID</td><td>:</td><td><?php echo $data1['order_id'];  ?></td></tr>
                   <tr><td>Tanggal Order</td><td>:</td><td><?php  echo $data1['date']; ?></td></tr>
                   <tr><td>Status Order</td><td>:</td><td>
                   <select name="frm_ubah_status">
                        <option value="Pembelian Baru">Pembelian Baru</option>
                        <option value="Hewan Belum dikirim">Hewan Belum dikirim</option>
                        <option value="Hewan sedang dikirim">Hewan sedang dikirim</option>
                        <option value="Selesai">Selesai</option>
                   </select>
                   
                   
                   </td></tr>
                   <tr> <td>&nbsp;</td><td>&nbsp;</td><td><input type="submit" value="Ubah Status"/></td></tr>        
                  
              </table>
    </form>
 <h3>Table pesanan</h3>             
              <table  border="1">
                  <tr>
                  <td>No </td>
                  <td>Foto hewan</td>
                  <td>Jumlah</td> 
                  <td>Harga</td>
                  <td>Subtotal</td> 
                  </tr> 
                  <?php
                  $no=0;
                  $total=0;
                  while($data=mysql_fetch_array($result)){
                  $no++;
                  $total+=$data['hewan_harga_jual'];
                  ?>
                  <tr>
                  <td><?php echo $no; ?></td>
                  <td><img src="../images/<?php echo $data['hewan_foto']; ?>" width="50" height="50"/></td>
                  <td><?php echo $data['jum_ekor']; ?></td> 
                  <td>Rp. <?php echo number_format($data['hewan_harga_jual'],2,",","."); ?></td>
                  <td>Rp. <?php echo number_format($data['hewan_harga_jual'],2,",","."); ?></td>
                  </tr> 
                  <?php
                  }
                  ?>
                  <tr>
                  <td colspan="4">Total Harga</td>
                  
                  <td>Rp. <?php echo number_format($total,2,",","."); ?></td> 
                  </tr>       
                  
              </table>
              
              <table  border="0">
<h3>Data Penerima </h3>  
                  
                   <tr><td>Nama Penerima</td><td>:</td><td><?php echo $data1['kirim_nama_penerima']; ?></td></tr>
                   <tr><td>No Telepon</td><td>:</td><td><?php echo $data1['kirim_telepon']; ?></td></tr>
                   <tr><td>Email</td><td>:</td><td><?php echo $data1['tanpa_akun_email']; ?></td></tr>
                   
                   <tr><td>Provinsi</td><td>:</td><td><?php echo $data12['nama_prov']; ?></td></tr>
                   <tr><td>Kota</td><td>:</td><td><?php echo $data12['nama_kabkot']; ?></td></tr>
                   <tr><td>Kecamatan</td><td>:</td><td><?php echo $data12['nama_kec']; ?></td></tr>
                   <tr><td>Alamat</td><td>:</td><td><?php echo $data1['kirim_almt_lengkap']; ?></td></tr>
                  
              </table>
              
                           <table  border="0">
<h3>Data Pemesan Tanpa Akun </h3>  
                  
                   <tr><td>Nama Penerima</td><td>:</td><td><?php echo $data1['tanpa_akun_nama']; ?></td></tr>
                   <tr><td>Email</td><td>:</td><td><?php echo $data1['tanpa_akun_email']; ?></td></tr>
 
              </table>
            

  </h2>