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
  <h2>Data Member</h2>
            <div class="table-responsive">
             
               <br /> 
                
  <?php
  $sql_show="select * from tb_member join tb_profil on tb_member.member_id=tb_profil.member_id";
  $result=mysql_query($sql_show);
  
  ?>
                  
              <table  class="table table-bordered table-hover table-striped tablesorter">
                
                  <tr>
                    <th colspan="1">No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Telepon</th>
                    <th>Action</th>
                  </tr>
    <?php
    $no=0;
    while($data=mysql_fetch_array($result)){
    $no++;
    ?>
                  <tr>
                    <td colspan="1"><?php echo $no; ?></td>
                    <td><?php echo $data['profil_nama'] ?></td>
                    <td><?php echo $data['member_email'] ?></td>
                    <td><?php echo $data['profil_telepon'] ?></td>
                    <th><a href="member-detail.php?action=<?php echo $data['member_id']; ?>">
                    <img src="icon/detail.png" /> views</a>  | <a href="member-delete.php?action=<?php echo $data['member_id'] ?>">
                    <img src="icon/delete.png" /> delete</a></th>
                  </tr>
                  
    <?php
      }
    ?>          
                  
              </table>
            </div>
  </h2>