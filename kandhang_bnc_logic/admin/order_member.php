<?php
require_once('inc-db.php');
?>
<h2>Order Member</h2>
<table border="1">
<tr>
<th>No</th><th>Nama Pembeli</th><th>Tanggal OrderJam</th><th>Status</th><th>Aksi</th>
</tr>

<?php
$sql_show="SELECT
    tb_profil.profil_id
    , tb_profil.profil_nama
    , tb_order.date
    , tb_order.status_order
FROM
    kandhang_bnc.tb_profil
    INNER JOIN kandhang_bnc.tb_alamat_kirim 
        ON (tb_profil.profil_id = tb_alamat_kirim.profil_id)
    INNER JOIN kandhang_bnc.tb_order 
        ON (tb_alamat_kirim.kirim_id = tb_order.kirim_id)";
$result=mysql_query($sql_show);
$no=0;
while($data=mysql_fetch_array($result)){
$no++;
?>
<tr>
<td><?php echo $no; ?></td>
<td><?php echo $data['profil_nama']; ?></td>
<td><?php echo $data['date']; ?></td>
<td><?php echo $data['status_order']; ?></td>
<td><a href="detail_order_member.php?detail=<?php echo $data['profil_id']; ?>">detail</a></td>
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