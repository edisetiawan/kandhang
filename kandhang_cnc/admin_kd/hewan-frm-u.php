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
$action=$_GET['action'];

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

<h2>Update data hewan</h2>
<form  enctype="multipart/form-data" method="post" action="hewan-update.php">
<input type="hidden" name="frm_hewan_id" value="<?php echo $data['hewan_id']; ?>"/>
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
        <img src="../images/<?php echo $data1['foto_nama']; ?>" width="100" height="80"/><br />
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