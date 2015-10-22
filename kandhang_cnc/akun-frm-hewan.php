<?php
session_start();
error_reporting(0);
require_once('admin_kd/inc-db.php');
//$act=
switch ($_GET['act']){
    default:
    $sql_show="SELECT *
FROM
    tb_member
    INNER JOIN tb_hewan 
        ON (tb_member.member_id = tb_hewan.member_id) WHERE tb_member.member_id=53";
    $result=mysql_query($sql_show);
    ?>
    <h2 class="page-header">Data Hewan</h2>
            <div class="table-responsive">  
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
                    <td><img src="images/<?php echo $data['hewan_foto']; ?>" width="50" height="50"/></td>
                    <td><?php echo $data['hewan_nama']; ?></td>
                    <td><?php echo $data['hewan_jns_kel']; ?></td>
                    <td><?php echo $data['hewan_bobot']; ?> Kg</td>
                    <td>Rp. <?php echo number_format($data['hewan_harga_jual'],2,",",".");  ?></td>
                    <td><?php echo $data['tanggal']; ?></td>
                    <td><a href="akun.php?page=jualhewan&act=frm-update&id=<?php echo $data['hewan_id']; ?>"><img src="admin_kd/icon/edit.png" />edit</a>  
                        <a href="akun-act-hewan.php?page=hewan&act=delete-hewan&id=<?php echo $data['hewan_id']; ?>"><img src="admin_kd/icon/delete.png" /> delete</a></td>
                  </tr>
                  
    <?php
      }   
    ?>         
                  
              </table>
            </div>
  </h2>
    
    <?php
    break;
   // exit;
    case 'frm-insert':
    ?>
    
    <h2  class="page-header">Input data hewan</h2>
<form  enctype="multipart/form-data" method="post" action="akun-act-hewan.php?page=hewan&act=insert-hewan">
<table width="551" border="0">
  <tr>
    <td width="91"><label>kategori</label></td>
    <td width="11">:</td>
    <td width="427" colspan="4">
      <select name="frm_kategori" class="form-control">
      <option value="1">Sapiiiii</option>
       <option value="2">Kambiiiing</option>
      </select>
      </td>
  </tr>
  <tr>
    <td><label>nama</label></td>
    <td>:</td>
    <td colspan="4">
    <input type="text" name="frm_nama_hewan" size="10" class="form-control" placeholder="nama hewan"/></td>
  </tr>
  <tr>
    <td><label>foto</label></td>
    <td>:</td>
    <td>
      <p>Foto 1 :
        <input type="file" name="fupload[]" />
        </p>
      <p>Foto 2 :
        <input type="file" name="fupload[]" />
      </p>
      <p>
        Foto 3 :
        <input type="file" name="fupload[]" />
      </p>
      <p>
        Foto 4 :
        <input type="file" name="fupload[]" />
        </p></td>
  </tr>
  <tr>
    <td><label>jenis kelamin</label> </td>
    <td>:</td>
    <td colspan="4">
        <select name="frm_jenis_kelamin" class="form-control">
        <option>Penjantan</option>
        <option>Betina</option>
        </select>
      </td>
  </tr>
  <tr>
    <td><label>bobot</label></td>
    <td>:</td>
    <td colspan="4"><input type="text" name="frm_bobot" class="form-control" placeholder="bobot" size="3"/></td>
  </tr>
  <tr>
    <td><label>harga beli </label></td>
    <td>:</td>
    <td colspan="4">
                <input type="text"  name="frm_harga_beli" class="form-control" placeholder="harga beli">    
      </td>
  </tr>
  <tr>
    <td><label>harga jual</label> </td>
    <td>:</td>
    <td colspan="4">
        <input type="text" name="frm_harga_jual" class="form-control" placeholder="harga jual" />
      </td>
  </tr>
  <tr>
    <td><label>deskripsi</label></td>
    <td>:</td>
    <td colspan="4">
        <textarea name="frm_deskripsi" class="form-control" rows="3" placeholder="deskripsi"></textarea>
      </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="4">
        <input type="submit" name="Submit" value="SIMPAN" />
      </td>
  </tr>
</table>
</form>
    
    
    
    <?php
    break;
    case 'frm-update':

    $action=$_GET['id'];

    //echo $action;
    //exit;

    $sql_show="select * from tb_hewan where hewan_id='".$action."'";
    $result=mysql_query($sql_show);
    $data=mysql_fetch_array($result);

    $sql_foto="select foto_nama from tb_foto where hewan_id='".$action."'";
    //echo $sql_show_f;
    //exit;
    $result1=mysql_query($sql_foto);
?>

<h2 class="page-header">Update data hewan</h2>
<form  enctype="multipart/form-data" method="post" action="hewan-update.php">
<input type="hidden" name="frm_hewan_id" value="<?php echo $data['hewan_id']; ?>"/>
<table width="551" border="0">
  <tr>
    <td width="91"><label>kategori</label></td>
    <td width="11">:</td>
    <td width="427" colspan="4">
      <select name="frm_kategori" class="form-control">
      <option value="1">Sapi</option>
       <option value="2">Kambing</option>
      </select>
      </td>
  </tr>
  <tr>
    <td><label>nama</label></td>
    <td>:</td>
    <td colspan="4"><input type="text" name="frm_nama_hewan" value="<?php echo $data['hewan_nama']; ?>"/></td>
  </tr>
  <?php
    $no=0;  
    while($data1=mysql_fetch_array($result1)){
    $no++;
  ?>
  <tr>
    <td><label>foto  <?php echo $no;  ?></label></td>
    <td>:</td>
    <td>
        <img src="images/<?php echo $data1['foto_nama']; ?>" width="100" height="80"/><br />
        <input type="file" name="fupload[]" />
        </p>
       
    </td>
  </tr>
   <?php
     }
   ?>
  <tr>
    <td><label>jenis kelamin</label> </td>
    <td>:</td>
    <td colspan="4">
        <select name="frm_jenis_kelamin" class="form-control">
        <option>Penjantan</option>
        <option>Betina</option>
        </select>
      </td>
  </tr>
  <tr>
    <td><label>bobot</label></td>
    <td>:</td>
    <td colspan="4"><input type="text" name="frm_bobot" value="<?php echo $data['hewan_bobot']; ?>"/></td>
  </tr>
  <tr>
    <td><label>harga beli </label></td>
    <td>:</td>
    <td colspan="4">
                <input type="text" name="frm_harga_beli" value="<?php echo $data['hewan_harga_beli']; ?>">    
      </td>
  </tr>
  <tr>
    <td><label>harga jual</label> </td>
    <td>:</td>
    <td colspan="4">
        <input type="text" name="frm_harga_jual" value="<?php echo $data['hewan_harga_jual']; ?>" />
      </td>
  </tr>
  <tr>
    <td><label>deskripsi</label></td>
    <td>:</td>
    <td colspan="4">
        <textarea name="frm_deskripsi"  rows="3"><?php echo $data['hewan_deskripsi']; ?></textarea>
      </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="4">
        <input type="submit" name="Submit" value="Update" />
      </td>
  </tr>
</table>
</form>
    <?php
    break;
}
?>