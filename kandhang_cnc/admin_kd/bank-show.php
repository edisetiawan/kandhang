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
  $sql_check="SELECT * FROM tb_bank ";
  $result=mysql_query($sql_check);
  
  ?>
  <h2>Data Hewan</h2>
        <div class="table-responsive">  
               <br /> 
                  
              <table  class="table table-bordered table-hover table-striped tablesorter">
                
                  <tr>
                    <th colspan="1">No</th>
                    <th>Icon</th>
                    <th>Bank</th>
                    <th>Cabang</th>
                    <th>No Rekening</th>
                    <th>Action</th>
                  </tr>
                  <?php
                  $no=0;
                  while($data=mysql_fetch_array($result)){
                  $no++;
                  ?>
                  <tr>
                    <td colspan="1"><?php echo $no; ?></td>
                    <td><img src="../images/<?php echo $data['bank_icon']; ?>"/></td>
                    <td><?php echo $data['bank_nama']; ?></td>
                    <td><?php echo $data['bank_cabang']; ?></td>
                    <td><?php echo $data['bank_no_rekening']; ?></td>
                    <td>
                    <a href="bank-frm-u.php?action=<?php echo $data['bank_id'] ?>"><img src="icon/edit.png" /> edit</a>
                    </td>
                  </tr>
                  <?php
                  }
                  ?>
              </table>
              
            </div>
  </h2>