<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<script type="text/javascript" src="js/jquery.js"></script>
</head>
<body>
<p>Beli Tanpa Akun</p>
<form id="form4" name="form4" method="post" action="transfer11.php">
<table width="359" border="0">
  <tr>
    <td width="169">Nama Pembeli </td>
    <td width="12">:</td>
    <td width="156">
        <input type="text" name="frm_nama" />
     </td>
  </tr>
  <tr>
    <td>Email Pembeli </td>
    <td>:</td>
    <td>
    <input type="text" name="frm_email1" />
    <br />
    </td>
  </tr>
  <tr>
    <td>konfirmasi email pembeli </td>
    <td>:</td>
    <td><input type="text" name="frm_email2" /></td>
  </tr>
</table>
<p>Alamat Pengiriman</p>
<table width="200" border="0">
  <tr>
    <td>Nama Penerima </td>
    <td>:</td>
    <td>
      <input type="text" name="frm_penerima" />
       </td>
  </tr>
  <tr>
    <td>Telepon/Handpone</td>
    <td>:</td>
    <td><input type="text" name="frm_no_hp" />
   </td>
  </tr>
  <tr>
    <td>Provinsi</td>
    <td>:</td>
    <td><select name="propinsi" id="propinsi">
      <option>--Pilih Provinsi--</option>
<option value=\"$p[id_prov]\">$p[nama_prov]</option>\n";
    </select>
    </td>
  </tr>
  <tr>
    <td>Kota/Kabupaten</td>
    <td>:</td>
    <td><select name="kota" id="kota">
<option>--Pilih Kabupaten/Kota--</option>
<option value=\"$p[id_kabkot]\">$p[nama_kabkot]</option>
</select>
      </td>
  </tr>
  <tr>
    <td>Kecamatan</td>
    <td>:</td>
    <td><select name="kec" id="kec">
<option>--Pilih Kecamatan--</option>
</select>
</td>
  </tr>
  <tr>
    <td>Alamat Lengkap </td>
    <td>:</td>
    <td><textarea name="frm_alamat"></textarea>
      </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>
      <label>
        <input type="submit" name="Submit2" value="Submit" />
        </label>    </td>
  </tr>
</table>
</form>
<hr />
<!-- batas -->
</body>
</html>