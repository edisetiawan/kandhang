<?php
session_start();
require_once('admin/inc-db.php');
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
$var_penerima=$_POST['frm_penerima'];
$var_hp=$_POST['frm_hp'];
$var_provinsi=$_POST['propinsi'];
$var_kota=$_POST['kota'];
$var_kec=$_POST['kec'];
$var_alamat=$_POST['frm_alamat'];
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

?> <!--
<br />
<br />
Tranfer Bank
MANDIRI BCA BNI BANK BRI
<br> <kla>

Jumlah yang harus dibayar : Rp. ,00<br>
1. Melunasi tagihan pembayaran setelah melakukan pemesanan.<br>
2. Transaksi diaggap batal jika sampai dengan pukul 20.34 WIB hari Sabtu, <br>
   05 juni 2014 (1x12 jam) pembayaran belum dilunasi<br>
3. Pastikan anda membayar sama persis dengan total ynag tertera diatas.<br>
4. Pembayaran dengan angka yang tidak tepat menyebabkan proses verivikasi terhambat.<br>
<br><br><br>
Klik <code>"bayar melalui tranfer bank"</code> untuk mengetahui nomor rekening pembayaran, melanjutkan transaksi serta<br>
sebagai konfirmasi bahwa anda telah memahami dan menyetujui ketentuan transaksi diatas, Kandhang akan<br>
mengirimkan tagian pembayaran <b><?php echo $_SESSION['email']; ?></b><br><br><br>-->
<a href="transfer2.php"><button>bayar melaluin tranfer bank</button></b></a>
