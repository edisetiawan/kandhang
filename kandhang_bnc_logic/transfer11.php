<?php
session_start();
require_once('admin/inc-db.php');
$basket=$_SESSION['basket']; 
$date=date("Y-m-d, H:i");
 //$var_nama=$_SESSION['member'];
 //$var_email=$_SESSION['email'];   
//---------------------------------------- variabel nama pembeli dan email 
$var_nama=$_POST['frm_nama'];
$var_email=$_POST['frm_email1'];
$_SESSION['email']=$var_email;
//---------------------------------------- variabel alamat pengiriman
$var_penerima=$_POST['frm_penerima'];
$var_hp=$_POST['frm_no_hp'];
$var_provinsi=$_POST['propinsi'];
$var_kota=$_POST['kota'];
$var_kec=$_POST['kec'];
$var_alamat=$_POST['frm_alamat'];
$status="Baru";
//---------------------------------------------

/*echo "  Nama =".$var_nama."<br>
        email =".$var_email."|<br><br>";
//-----------------------------------------------alamat pengiriman
echo "  Nama Penerima =".$var_penerima."<br>
        No Handphone ".$var_hp."<br>
        Provinsi = ".$var_provinsi."<br>
        Kota = ".$var_kota."<br>
        kecamatan = ".$var_kec."<br>
        alamat = ".$var_alamat; */
//-------------------------------" simpan ke tb_tanpa_akun"-----------------
$sql_insert_tampa_akun="INSERT 
                            INTO tb_tanpa_akun 
                                    VALUES ('',
                                            '$var_email',
                                            '$var_nama'
                                            )";

$result=mysql_query($sql_insert_tampa_akun);
$tanpa_akun_id=mysql_insert_id();
//echo $sql_insert_tampa_akun."|".$tanpa_akun_id;
//exit;
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
                                                    '$tanpa_akun_id',
                                                    '')";
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
//------------------------------------------------------------------------
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
<br />
<br />
Tranfer Bank
MANDIRI BCA BNI BANK BRI
<br>
Jumlah yang harus dibayar : Rp. <?php echo $_SESSION['total']; ?>,00<br>
1. Melunasi tagihan pembayaran setelah melakukan pemesanan.<br>
2. Transaksi diaggap batal jika sampai dengan pukul 20.34 WIB hari Sabtu, <br>
   05 juni 2014 (1x12 jam) pembayaran belum dilunasi<br>
3. Pastikan anda membayar sama persis dengan total ynag tertera diatas.<br>
4. Pembayaran dengan angka yang tidak tepat menyebabkan proses verivikasi terhambat.<br>
<br><br><br>
Klik <code>"bayar melalui tranfer bank"</code> untuk mengetahui nomor rekening pembayaran, melanjutkan transaksi serta<br>
sebagai konfirmasi bahwa anda telah memahami dan menyetujui ketentuan transaksi diatas, Kandhang akan<br>
mengirimkan tagian pembayaran <b><?php echo $_SESSION['email']; ?></b><br><br><br>
<a href="transfer2.php"><button>bayar melaluin tranfer bank</button></b></a>
