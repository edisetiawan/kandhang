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
  $sql_check="SELECT * FROM tb_confirm ";// JOIN tb_confirm ON tb_order.order_id = tb_confirm.confirm_id_order";
  $result=mysql_query($sql_check);
  
  ?>
  <h2>Konfirmasi Pembayaran</h2>
        <div class="table-responsive">  
               <br /> 
                  
              <table  class="table table-bordered table-hover table-striped tablesorter">
                
                  <tr>
                    <th colspan="1">No</th>
                    <th>Bukti</th>
                    <th>Id Beli</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Tanggal Tranfer</th>
                    <th>Nila Tranfer</th>
                    <th>Action</th>
                  </tr>
        <?php
        $no=0;
        while($data=mysql_fetch_array($result)){
        $no++;
        ?>
                  <tr>
                    <td colspan="1"><?php echo $no; ?></td>
                    <td><img src="../images_bukti/<?php echo $data['confirm_foto']; ?>" width="50" height="50"/></td>
                    <td><?php echo $data['confirm_id_order']; ?></td>
                    <td><?php echo $data['confirm_foto']; ?></td>
                    <td><?php echo $data['confirm_email']; ?></td>
                    <td><?php echo $data['confirm_tanggal']; ?></td>
                    <td>Rp. <?php echo number_format($data['confirm_nilai'],2,",",".");  ?></td>
                    <td><a href="bayar-detail.php?action=<?php echo $data['confirm_id_order']; ?>"><img src="icon/detail.png" />detail</a> <a href="bayar-delete.php?action=<?php echo $data['confirm_id']; ?>"><img src="icon/delete.png" /> delete</a></td>
                  </tr>      
          <?php
          }
          ?>        
                  
                  
              </table>
            </div>
  </h2>