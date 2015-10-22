<?php
session_start();
error_reporting(0);
//echo "ini adalah session: ".$_SESSION['userpass'];
//exit;
if(empty($_SESSION['userpass'])){
    header('location:error-404.php');
    exit;
}

?>

<h2>Input data hewan</h2>
<form  enctype="multipart/form-data" method="post" action="hewan-save.php">
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