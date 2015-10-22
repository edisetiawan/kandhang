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
  $sql_show="select * from tb_kategori";
  $result=mysql_query($sql_show);
  ?>
  
  <h2>Kategori</h2>
            <div class="table-responsive">
            <a href="index.php?page=41">
            <button type="button" >
            Tambah Kategori
            </button></a>   
               <br /> 
                  
              <table  class="table table-bordered table-hover table-striped tablesorter">
                
                  <tr>
                    <th colspan="1">No</th>
                    <th>Nama</th>
                    <th>Action</th>
                  </tr>
  <?php
  $no=0;
  while($data=mysql_fetch_array($result)){
  $no++;
  ?>
                  <tr>
                    <td colspan="1"><?php echo $no; ?></td>
                    <td><?php echo $data['kategori_name']; ?></td>
                    <td><a href="kategori-delete.php?action=<?php echo $data['kategori_id'] ?>"><img src="icon/delete.png" /> delete</a></td>
                  </tr>
   <?php
   }
   ?>             
                  
                </table>
            </div>
  </h2>