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
  $sql_show="select * from tb_contact";
  $result=mysql_query($sql_show);
  ?>
  
  <h2>Pesan Masukan dari User</h2>
            <div class="table-responsive">   
               <br /> 
                  
              <table  class="table table-bordered table-hover table-striped tablesorter">
                
                  <tr>
                    <th colspan="1">No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Pesan</th>
                  </tr>
    <?php
    $no=0;
    while($data=mysql_fetch_array($result)){
    $no++;        
    ?>
                  <tr>
                    <td colspan="1"><?php echo $no; ?></td>
                    <td><?php echo $data['contact_nama'] ?></td>
                    <td><?php echo $data['contact_email'] ?></td>
                    <td><?php echo $data['contact_telepon'] ?></td>
                    <td><?php echo $data['contact_pesan'] ?></td>
                    <td><a href="hub-kam-delete.php?action=<?php echo $data['contact_id']; ?>"><img src="icon/delete.png" /> delete</a></td>
                  </tr> 
     <?php
     }
     ?>                          
              </table>
            </div>
  </h2>