<?php
session_start();
error_reporting(0);
require_once('admin_kd/inc-db.php');
$basket=$_SESSION['basket']; 
//$profil_nama=$_SESSION['profil_nama'];
$profil_id=$_SESSION['profil_id'];
$date=date("Y-m-d, H:i");
//-----------------------------------
 $var_nama=$_SESSION['profil_nama'];
 $var_email=$_SESSION['member_email'];   
//$var_nama=$_POST['frm_nama'];
//$var_email=$_POST['frm_email1'];
//$_SESSION['email']=$var_email;
//----------------------------------------alamat pengiriman
$var_penerima=htmlentities($_POST['frm_penerima']);
$var_hp=htmlentities($_POST['frm_hp']);
$var_provinsi=htmlentities($_POST['propinsi']);
$var_kota=htmlentities($_POST['kota']);
$var_kec=htmlentities($_POST['kec']);
$var_alamat=htmlentities($_POST['frm_alamat']);
$status="Baru";
//-------------------------------------
	/*
echo "  
		Nama 			= ".$var_nama."<br>
        email 			= ".$var_email."|<br><br><hr>";
//---------------------------------------------------
echo "  Profil_id       =".$profil_id."<br>
        Nama Penerima	= ".$var_penerima."<br>
        Provinsi		= ".$var_provinsi."<br>
        Kota 			= ".$var_kota."<br>
        kecamatan 		= ".$var_kec."<br>
        alamat 			= ".$var_alamat; */
	
//------------------------------" simpan ke tb_alamat_kirim "------------------
$sql_insert_alamat_kirim="INSERT 
                            INTO 
                            tb_alamat_kirim 
                                            VALUES ('',
                                                    '$var_penerima',
                                                    '$var_hp',
                                                    '$var_provinsi',
                                                    '$var_kota',
                                                    '$var_kec',
                                                    '$var_alamat',
                                                    '',
                                                    '$profil_id')";
$result=mysql_query($sql_insert_alamat_kirim);
$alamat_kirim_id=mysql_insert_id();

//echo $sql_insert_alamat_kirim;
//exit;
//---------------------------- "simpan ke tb_order" --------------------------------------------

$sql_insert_order="INSERT 
                        INTO 
                        tb_order VALUES ('',
                                         '$date',
                                         '$alamat_kirim_id','$status')";
$result=mysql_query($sql_insert_order);
$order_id=mysql_insert_id();
//echo $sql_insert_order;

foreach ($basket as $key => $val) { 
//--------------------------------"tampilkan isi session tb_hewan"---------------------------------------
$query="SELECT * FROM tb_hewan WHERE hewan_id=".$key;
$hasil=mysql_query($query);
if ($hasil) {
$data=mysql_fetch_array($hasil);

$hewan_id=$data['hewan_id'];
$harga_hewan=$data['hewan_harga_jual'];

//echo $hewan_id."|".$harga_hewan;
//-----------------------------------"simpan ke order detail"-------------------------------------
$sql_insert_order_detail="INSERT 
                            INTO tb_order_detail 
                            VALUES ('',
                                    '$val',
                                    '$harga_hewan',
                                    '$order_id',
                                    '$hewan_id'
                                    )";
$result=mysql_query($sql_insert_order_detail); 
//echo $sql_insert_order_detail."<br>";
//exit;


//--------------------------------------------------------------------------
}
}
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
                <h1 class="page-header">Konfirmasi Pembayaran
              
                </h1>
                <ol class="breadcrumb">
                    <li><a href="index.php">Home</a>
                    </li>
                    <li class="active">Konfirmasi Pembayaran</li>
                </ol>
            </div>

        </div>

        

 <table class="table table-striped" >
<thead>
<tbody>
<tr>
<th><img src="images/bank/logo-bca.gif" ></th>
<th><img src="images/bank/logo-bni.gif" ></th>
<th><img src="images/bank/logo-mandiri.gif" ></th>
<th><img src="images/bank/logo-bri.gif" ></th>
</tr>
<tr>
<th>Jumlah yang harus dibayar : <h3>Rp. <?php echo number_format($_SESSION['total'],2,",",".");  ?></h3></th><th colspan="2">&nbsp;</th>
</tr>
</tbody>
<?php
$array_hari = array(1 => "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu", "Minggu");
$array_bulan = array(1 => "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

$tanggal_pesan = date('Y-m-d H:i:s');
$tanggal_bayar = date('Y-m-d H:i:s', strtotime("+11 hours", strtotime($tanggal_pesan)));
$tanggal_bayar_print = $array_hari[date('N', strtotime($tanggal_bayar))].', '.date('d', strtotime($tanggal_bayar)).' '.$array_bulan[date('n', strtotime($tanggal_bayar))].' '.date('Y', strtotime($tanggal_bayar));
?>
</thead>
    </table>
<h3>Ketentuan pembayaran dengan transfer bank:</h3>
<ol><b>
    <li>Melunasi tagihan pembayaran setelah melakukan pemesanan.</li>
    <li>Transaksi dianggap batal jika sampai dengan pukul <b style="color: blue;"><?php echo date('H:i', strtotime($tanggal_bayar)) ?> WIB </b>   hari <b style="color: blue;"><?php echo $tanggal_bayar_print;?> (1×12 jam)</b> pembayaran belum dilunasi.</li>
    <li>Pastikan Anda membayar sama persis dengan angka total yang tertera di atas.</li>
    <li>Pembayaran dengan angka yang tidak tepat menyebabkan proses verifikasi terhambat.</li>
</ol>
Klik "bayar melalui transfer bank" untuk mengetahui nomor rekening pembayaran, melanjutkan transaksi serta sebagai 
konfirmasi bahwa Anda telah memahami dan menyetujui ketentuan transaksi di atas. Kandhang akan mengirim tagihan pembayaran ke <b style="color: blue;"><?php echo $var_email; ?></b>
</b><br>
<form method="post" action="selesai.php">
      <div class="form-actions">
            <button type="submit" class="btn btn-danger">bayar meleui tranfer bank</button>          
          </div>
</form>
    </div>
    <!-- /.container -->
<?php
unset($_SESSION['basket']); 
require_once('footer.php');

?>
    <!-- /.container -->

    <!-- JavaScript -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/modern-business.js"></script>

</body>

</html>
