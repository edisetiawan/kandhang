<?php
require_once('inc-db.php');
?>
<h1>Kategori</h1>
<a href="add_kategori.php"><input type="button" value="Tambah Kategori"/></a>
<table border="1">
<tr>
<th>No</th><th>Nama Kategori</th><th>Aksi</th>
</tr>
<?php
$sqlShow="SELECT * FROM tb_kategori";
$result=mysql_query($sqlShow);
$no=0;
while($data=mysql_fetch_array($result)){
$no++;
?>
<tr>
<td><?php echo $no; ?></td><td><?php echo $data['kategori_name']?></td><td><a href="edit_kategoru.php">edit</a> | <a href="delete_kategori.php">delete</a></td>
</tr>
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