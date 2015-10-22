<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>
<body>
<a href="index.php">back</a>
<form  enctype="multipart/form-data" method="post" action="save_data_hewan.php">
<table width="551" border="1">
  <tr>
    <td width="91">kategori</td>
    <td width="11">:</td>
    <td width="427" colspan="4">
      <select name="frm_kategori">
      <option value="1">Sapiiiii</option>
       <option value="2">Kambiiiing</option>
      </select>
      </td>
  </tr>
  <tr>
    <td>nama</td>
    <td>:</td>
    <td colspan="4"><input type="text" name="frm_nama_hewan"/></td>
  </tr>
  <tr>
    <td>foto</td>
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
    <td>jenis kelamin </td>
    <td>:</td>
    <td colspan="4">
        <select name="frm_jenis_kelamin">
        <option>Penjantan</option>
        <option>Betina</option>
        </select>
      </td>
  </tr>
  <tr>
    <td>bobot</td>
    <td>:</td>
    <td colspan="4"><input type="text" name="frm_bobot"/> Kg</td>
  </tr>
  <tr>
    <td>harga beli </td>
    <td>:</td>
    <td colspan="4">
        <input type="text" name="frm_harga_beli" />
      </td>
  </tr>
  <tr>
    <td>harga jual </td>
    <td>:</td>
    <td colspan="4">
        <input type="text" name="frm_harga_jual" />
      </td>
  </tr>
  <tr>
    <td>deskripsi</td>
    <td>:</td>
    <td colspan="4">
        <textarea name="frm_deskripsi"></textarea>
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
</body>
</html>
