<?php
session_start();
error_reporting(0);
require_once('admin_kd/inc-db.php');
$kode_acak=md5(uniqid(rand()));
$var_email=htmlentities($_POST['frm_email']);
$var_password=htmlentities($_POST['frm_password']);
$var_cpanssword=htmlentities($_POST['frm_cpassword']);

$sql_check="select * from tb_member where member_email='".$var_email."'";
//echo $sql_check;
//exit;
$result1=mysql_query($sql_check);
$rows=mysql_num_rows($result1);
//echo "ketemu :".$rows;
//exit;
$error=0;

if(empty($var_email)){
    $error=1;
}
if(!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $var_email)){
		$error=2;
	}
if(empty($var_password)){
    $error=3;
}
if($var_password != $var_cpanssword){
    $error=4;
}
if($rows > 0 ){
    $error=5;
}


if($error !=0){
    switch($error){
        case '1':
        $error_msg="email tidak boleh kosong";
        break;
        case '2':
        $error_msg="password tidak boleh kosong";
        break;
        case '3':
        $error_msg="email harus valid";
        break;
        case '4':
        $error_msg="password harus sama";
        break;
        case '5':
        $error_msg="email sudah terdaftar";
        break;
    }
    $_SESSION['register']=$error_msg;
    header("location: register.php?error=".$error."");
    exit;
}


/*
echo "email :".$var_email."<br>";
echo "email :".$var_password."<br>";
echo "email :".$var_username."<br>";
exit; */
$sql_insert="INSERT INTO tb_temp VALUES ('$kode_acak','$var_username','$var_email','$var_password')";
//echo $sql_insert;

$result=mysql_query($sql_insert);
if ($result){
    session_destroy();
    
    $sql_check="SELECT temp_verifikasi FROM tb_temp";
    $result=mysql_query($sql_check);
    $data=mysql_fetch_array($result);
    $kode=$data['temp_verifikasi'];
    //------------------------------------  
    $tujuan=$var_email;
    $subject="Kandhang";
    $pesan="
    Klik 
    http://kandhang.com/confirm.php?kode=$kode_acak
    untuk konfirmasi
    ";
    $dari="from : cs@kandhang.com";
    mail($tujuan,$subject,$pesan,$dari);  
    /*echo "<br>berhasil daftar silahkan cek email anda untuk konfirmasi";
    echo "<a href='confirm.php?kode=".$kode_acak."'>http://localhost/acak/kandhang_siap/confirm.php?kode=$kode_acak</a>";   */
}
//header("location: profil.php?action=".$kode_acak."");
//exit;       
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

    <!-- Page Content -->

    <div class="container">
   
      <div class="row">
      
        <div class="col-lg-12">
          <h1 class="page-header">Pendaftaran User Baru</h1>
         
        </div>
      </div><!-- /.row -->
      <div class="row">
	 	  
        <div class="col-sm-8">
        Terima kasih <br />
Namun, Anda belum selesai. Lakukan konfirmasi akun Anda.<br />
Kami telah mengirim pesan konfirmasi ke alamat email <b><?php echo $var_email; ?> </b>
    
        </div>

      </div><!-- /.row -->

    </div><!-- /.container -->
<?php
require_once('footer.php');
?><!-- /.container -->

    <!-- JavaScript -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/modern-business.js"></script>

  </body>
</html>
