<?php
session_start();
require_once "admin_kd/inc-db.php";
error_reporting(0);
require_once "function.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Kandhang</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="css/modern-business.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
<?php
require_once('navigasi_cp.php');
?>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Cart Hewan
                </h1>
                <ol class="breadcrumb">
                    <li><a href="index.php">Home</a>
                    </li>
                    <li class="active">Cart Hewan</li>
                </ol>
            </div>
        </div>
    <table class="table table-striped" >
<thead>
<tr>
<th>No</th>
<th>Foto</th>
<th>Berat</th>
<th>Harga</th>
<th></th>

</tr>
</thead>

<tbody>
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
<td><img src="images/<?php echo $data['hewan_foto']; ?>" width="100" height="100"></td>
<td><?php echo $data['hewan_bobot'];  ?> Kg</td>
<td>Rp. <?php echo number_format($data['hewan_harga_jual'],2,",",".");  ?></td>
<td><a href="order_hewan.php?action=delete&id=<?php echo $key; ?>"><img src="images/delete.png"> delete</a></td>
</tr>
<?php               }
                                            } 
?>
<tr>
<td colspan="3"><h1>Total Harga</h1></td>
<td colspan="2"><h1>Rp.<?php echo number_format($total_harga,2,",","."); ?></h1></td>
</tr>
</tbody>
    </table>
	<?php

//echo 'Ada <strong>'.$total.'</strong> barang di keranjang<br />';
} else {
echo "<tr><td colspan='6'><b>Tidak ada data dipembelian</b></td></tr>
</table>
</FORM>";
//echo 'Ada <strong>'.$total.'</strong> barang di keranjang<br />';
}
if(!empty($total_harga)){
?>
<form method="post" action="transactions.php">
      <div class="form-actions">
            <a href="transactions.php"><button type="button" class="btn btn-success"><i class="fa fa-shopping-cart"></i> Checkout</button></a>
          </div>
</form>
<?php
}else {
//echo "kerenjang anda masih kosong";
}
?>
<form method="post" action="transactions.php">
      <div class="form-actions">
            <a href="pilih_hewan.php"><button type="button" class=""><i class="fa fa-shopping-cart"></i> Tambah Pembelian</button></a>
          </div>
</form>
    </div>
    <!-- /.container -->
<?php
require_once('footer.php');

?>
    <!-- /.container -->
    <!-- JavaScript -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/modern-business.js"></script>

</body>

</html>
