
<h2>Order tanpa akun</h2>

<table border="1">
<tr>
<th>No</th><th>Nama Pembeli</th><th>Tanggal Order</th><th>Status</th><th>Aksi</th>
</tr>
<?php
$sql_Show="SELECT
	tb_tanpa_akun.tanpa_akun_id
    , tb_alamat_kirim.kirim_nama_penerima
    , tb_order.date
    , tb_order.status_order
FROM
    tb_alamat_kirim
    INNER JOIN tb_order 
        ON (tb_alamat_kirim.kirim_id = tb_order.kirim_id)
    INNER JOIN tb_tanpa_akun 
        ON (tb_tanpa_akun.tanpa_akun_id = tb_alamat_kirim.tanpa_akun_id)";
$result=mysql_query($sql_Show);
$no=0;
while($data=mysql_fetch_array($result)){
$no++;
?>
<tr>
<td><?php echo $no; ?></td><td><?php echo $data['kirim_nama_penerima']; ?></td>
<td><?php echo $data['date']; ?></td><td><?php  echo $data['status_order']; ?></td>
<td><a href="detail_order_tanpa_akun.php?detail=<?php echo $data['tanpa_akun_id']; ?>">detail</a></td>
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