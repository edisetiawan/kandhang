<?php
session_start();
error_reporting(0);
require_once "admin/inc-db.php";
require_once "function.php";
?>

<FORM method="POST" action="?action=update">
<h3>Isi keranjang belanja:</h3>
<table border="1">
<tr>
<td>No.</td>
<td>Nama produk</td>
<td>Jumlah</td>
<td>Berat</td>
<td>Harga</td>
<td>Hapus</td>
</tr>
<?php
if (!empty($_SESSION['basket'])) {
$basket=$_SESSION['basket'];
$no_urut=0;
$total=0;
$total_harga=0;
        foreach (   $basket as $key => $val) { 
                    $no_urut++;
                    $query="SELECT * FROM tb_hewan WHERE hewan_id=".$key;
                    $hasil=mysql_query($query);
        if ($hasil) {
            $data=mysql_fetch_array($hasil);
            $total+=$val; //jumlah barang
            $total_harga += ($val * $data['hewan_harga_jual']); //total harga
            $_SESSION['total']=$total_harga;
?>
<tr>
<td><?php echo $no_urut?></td>
<td><?php echo $data['hewan_nama']?></td>
<td><?php echo $val?></td>
<td><?php echo $data['hewan_bobot']; ?> Kg</td>
<td><?php echo $data['hewan_harga_jual']; ?></td>
<td><a href="?action=delete&id=<?php echo $key; ?>">Hapus</a></td>
</tr>
<?php               }
                                            } 
?>
<tr>
<td colspan="4"><strong>Total</strong></td>
<td colspan="2"><?php echo 'Rp. '.$total_harga?></td>
</tr>
</table>
</FORM><br />
<?php

echo 'Ada <strong>'.$total.'</strong> barang di keranjang<br />';
} else {
echo "<tr><td colspan='6'>Tidak ada barang dikeranjang</td></tr>
</table>
</FORM>";
echo 'Ada <strong>'.$total.'</strong> barang di keranjang<br />';
}
?>
<a href="index.php">Belanja Lagi</a><br>
<a href="lengkapi_data.php">Checkout</a>
</body>
</html>
