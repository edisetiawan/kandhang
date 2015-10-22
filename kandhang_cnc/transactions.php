<?php
session_start();
require_once('admin_kd/inc-db.php');
//echo $_SESSION['member_id'];
//exit;
error_reporting(0);
if(empty($_SESSION['member_id'])){
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
	<!--validasi -->
	<script type="text/javascript" src="waktu/validasi/jquery.js"></script>
<script type="text/javascript" src="waktu/validasi/jquery.validate.js"></script>	
</head>
<body>
<?php
//exit;
require_once('navigasi_cp.php');
?>

   <div class="container">
     <div class="row">

            <div class="col-lg-12">
                <h1 class="page-header">Isi Data Pembelian
                    <small></small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="index.php">Home</a>
                    </li>
                    <li class="active">Isi Data Pembelian</li>
                </ol>
            </div>
        </div>
		 <div class="row">
		 <div class="col-lg-12">
  </div>
  </div>
  
  
         <div class="row">

            <div class="col-lg-12">
                <ul id="myTab" class="nav nav-tabs">
                    <li class="active"><a href="#service-one" data-toggle="tab"><h2>Login</h2></a>
                    </li>
                    <li><a href="#service-two" data-toggle="tab"><h2>Beli Tanpa Akun</h2></a>
                    </li>                       
                </ul>
                <div id="myTabContent" class="tab-content">
				
                    <div class="tab-pane fade in active" id="service-one">
					<form id="form1" method="post" action="login_checkk.php">
					<table><tr><td>
				    Email </td><td> </td><td><input type="text" name="frm_username" id="frm_username"></td></tr><tr><td>
				    Password </td><td> </td><td><input type="password" name="frm_password" id="frm_password"></td></tr><tr><td></td><td></td><td>
				    <input type="submit" name="submit" value="Login"></td></tr>
					</table>
					</form>
                    </div>			
                    <div class="tab-pane fade" id="service-two">
			
			<!--<form id="form1" method="post" action="choose_payment.php"> -->
			
					<a href="beli_tanpa_akun.php"><img src="images/klik.png"></a>
					
			<!--</form>-->
                    </div>
                </div>
            </div>

        </div>
  <!--container-->
  </div>
  
  
     <script src="js/bootstrap.js"></script>
   
  <?php
  exit;

} else {
    header('location: alamat_pengiriman.php');
}
?>