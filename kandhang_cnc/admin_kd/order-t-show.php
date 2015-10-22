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
 $sql_show="SELECT *
FROM
    tb_tanpa_akun
    INNER JOIN tb_alamat_kirim 
        ON (tb_tanpa_akun.tanpa_akun_id = tb_alamat_kirim.tanpa_akun_id)
    INNER JOIN tb_order 
        ON (tb_alamat_kirim.kirim_id = tb_order.kirim_id) ORDER BY tb_order.order_id  DESC";
  $result=mysql_query($sql_show);
 
 ?>

   <h2>Order tanpa akun</h2>
            <div class="table-responsive">
               <br /> 
                  
              <table  class="table table-bordered table-hover table-striped tablesorter">
                
                  <tr>
                    <td colspan="1">No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Status</th>
                    <th>Tanggal</th>
                    <th>Action</th>
                  </tr>
 <?php
 $no=0;
 while($data=mysql_fetch_array($result)){
 $no++;
 ?>
                  <tr>
                    <td colspan="1"><?php echo $no; ?></td>
                    <td><?php echo $data['tanpa_akun_nama']; ?></td>
                    <td><?php echo $data['tanpa_akun_email']; ?></td>
                    <td><?php echo $data['kirim_telepon']; ?></td>
                    <td><?php echo $data['status_order']; ?></td>
                    <td><?php echo $data['date']; ?></td>
                    <th><a href="order-t-detail.php?action=<?php echo $data['order_id'];  ?>"><img src="icon/detail.png" /> detail</a><a href="order-t-delete.php?action=<?php echo $data['kirim_id'] ?>"><img src="icon/delete.png" /> delete</a></th>
                  </tr>
  <?php
  }
  ?>      
                  
              </table>
            </div>
  </h2>