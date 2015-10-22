<?php
require_once('inc-db.php');
$sqlShow="SELECT
    tb_hewan.hewan_id
    , tb_hewan.hewan_nama
    , tb_hewan.hewan_bobot
    , tb_hewan.hewan_harga_jual
    , tb_hewan.tanggal
FROM
    tb_hewan
    INNER JOIN tb_foto 
        ON (tb_hewan.hewan_foto = tb_foto.foto_nama)
    INNER JOIN tb_kategori 
        ON (tb_kategori.kategori_id = tb_hewan.kategori_id);";
$result=mysql_query($sqlShow);

?>
<h2>Data Hewan</h2>
<a href="add_data_hewan.php"><input type="button" value="Tambah Data"/></a>
<table border="1">
<tr><th>No</th><th>Jenis hewan</th><th>Berat</th><th>Harga</th><th>tanggal</th><th>action</th></tr>
<?php
$no=0;
while($data=mysql_fetch_array($result)){
    $no++;
?>
<tr><td><?php echo $no; ?></td><td><?php echo $data['hewan_nama']; ?></td><td><?php echo $data['hewan_bobot']; ?></td>
<td><?php echo $data['hewan_harga_jual']; ?></td><td><?php echo $data['tanggal']; ?></td>
<td><a href="edit_data_hewan.php?action=<?php echo $data['hewan_id']; ?>">edit</a> | <a href="delete_data_hewan.php">delete</a></td></tr>
<?php
}
?>
</table>
<?php

/**
 * @author lolkittens
 * @copyright 2014
 */



?>