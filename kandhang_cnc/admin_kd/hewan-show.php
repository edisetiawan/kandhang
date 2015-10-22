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
    $sql_show="select * from tb_hewan order by hewan_id desc";
    $result=mysql_query($sql_show);
    
    ?>

     <h2>Data Hewan</h2>
            <div class="table-responsive">
            <a href="index.php?page=51">
            <button type="button" >
            Tambah Data Hewan
            </button></a>   
               <br /> 
                  
              <table  class="table table-bordered table-hover table-striped tablesorter">
    
                  <tr>
                    <th colspan="1">No</th>
                    <th>Foto</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Bobot</th>
                    <th>Harga </th>
                    <th>Tanggal input</th>
                    <th>Action</th>
                  </tr>
    <?php
    $no=0;
    while($data=mysql_fetch_array($result)){
    $no++;
    ?>
                  <tr>
                    <td colspan="1"><?php echo $no; ?></td>
                    <td><img src="../images/<?php echo $data['hewan_foto']; ?>" width="50" height="50"/></td>
                    <td><?php echo $data['hewan_nama']; ?></td>
                    <td><?php echo $data['hewan_jns_kel']; ?></td>
                    <td><?php echo $data['hewan_bobot']; ?> Kg</td>
                    <td>Rp. <?php echo number_format($data['hewan_harga_jual'],2,",",".");  ?></td>
                    <td><?php echo $data['tanggal']; ?></td>
                    <td><a href="hewan-frm-u.php?action=<?php echo $data['hewan_id']; ?>"><img src="icon/edit.png" />edit</a>  
                     <a href="hewan-delete.php?action=<?php echo $data['hewan_id']; ?>"><img src="icon/delete.png" /> delete</a></td>
                  </tr>
                  
    <?php
      }   
    ?>         
                  
              </table>
            </div>
  </h2>