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
  ?>
  <h2>Data Admin</h2>
            <div class="table-responsive">
            <a href="index.php?page=21">
            <button type="button" >
            Tambah Admin
            </button></a>   
               <br /> 
    <?php
    $sql_show="select * from tb_admin";
    $result=mysql_query($sql_show);
    
    ?>
                  
              <table  class="table table-bordered table-hover table-striped tablesorter">
                
                  <tr>
                    <th colspan="1">No</th>
                    <th>Username</th>
                    <th>Level</th>
                    <th>Action</th>
                  </tr>
       <?php
       $no=0;
       while($data=mysql_fetch_array($result)){
       $no++;
       ?>       
                  <tr>
                    <td colspan="1"><?php echo $no; ?></td>
                    <td><?php echo $data['admin_username']; ?></td>
                    <td><?php echo $data['admin_level']; ?></td>
                    <td><a href="admin-frm-u.php?action=<?php echo $data['admin_id']; ?>">
                    <img src="icon/edit.png" />edit</a>  | <a href="admin-delete.php?action=<?php echo $data['admin_id']; ?>">
                    <img src="icon/delete.png" /> delete</a></td>
                  </tr>
         <?php
  
         }
         ?>       
                 
                  
              </table>
            </div>
  </h2>