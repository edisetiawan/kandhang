<?php
session_start();
error_reporting(0);
require_once('admin_kd/inc-db.php');
?><!DOCTYPE html>
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
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-theme.min.css">
	<script src="js/bootstrap.min.js"></script>
	
</head>
<body>
<?php
error_reporting(0);
require_once('navigasi_cp.php');
//require_once('coba.php');
if($_GET['page'] == "pilih_hewan"){
require_once('pilih_hewan.php');
}
if($_GET['page'] == "daftar_harga"){
include('daftar_harga.php');
}
if($_GET['page'] == "order_hewan"){
include('order_hewan.php');
}
if($_GET['page'] == "konfirmasi"){
include('konfirmasi-bayar.php');
}
if($_GET['page'] == "hubungi_kami"){
include('contact.php');
}
if($_GET['page'] == "login"){
include('login.php');
}
else if (empty($_GET['page'])){

require_once('slide_show.php');
?>
    </div>
    <!-- /.section -->
    <div class="section-colored text-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-12"> 
					<h2>Kandhang Business: Pilih &amp; Lansung di Beli</h2>
					<p>Kandang.com menyediakan berbagai macam hewan untuk kebutuhan manusia yang akan menyembelihnya, dan bisa dibeli melalui website resmi kami</p>
                    <hr>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /.section-colored -->

    <div class="section">

        <div class="container">
		 <div class="row">

		<!-- show image start-->
<?php
$batas=6;
$sqlShow="select * from tb_hewan order by  hewan_id desc limit ".$batas;
//$sqlShow="SELECT * FROM  tb_hewan"; 
$result=mysql_query($sqlShow);
while($data=mysql_fetch_array($result)){
//echo $data['hewan_nama'];
?>
		<div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                           <a href="update.php?detail=<?php echo $data['hewan_id']; ?>"> <img src="images/<?php echo $data['hewan_foto']; ?>" alt=""></a> <!-- http://placehold.it/320x150 -->
                            <div class="caption">
                                <h4 class="pull-right">Rp. <?php echo number_format($data['hewan_harga_jual'],2,",",".");  ?></h4>
                                <h4><a href="update.php?detail=<?php echo $data['hewan_id']; ?>"><button type="button" class="">DETAIL</button></a>
                                </h4>
                                <p>Kambing jawa dengan warna cocleat dengan panjang badan kira-kira 3 meter </p>
                            </div>
                            <div class="ratings">
                                <p class="pull-right"><?php echo $data['reviews']; ?> reviews</p>
                                <p>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star-empty"></span>
                                    <span class="glyphicon glyphicon-star-empty"></span>
                                </p>
                            </div>
                        </div>
        </div>
		<?php
		}
		
		?>
		
	<!--sow image END-->	
        </div>
        <!-- /.container -->

    </div>
    <!-- /.section -->

    <div class="section-colored">

        <div class="container">

            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                <?php
                $sql_judul="select * from tb_depan";
                $result_depan=mysql_query($sql_judul);
                $data_depan=mysql_fetch_array($result_depan);                
                ?>
                    <h2><?php echo $data_depan['depan_judul']; ?></h2>
                    
            <b> <?php echo $data_depan['depan_deskripsi']; ?>
      </b>
                    
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <img class="img-responsive" src="images/<?php  echo $data_depan['depan_foto']; ?>">
                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container -->

    </div>
    <!-- /.section-colored -->

	<div class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <h3><i class="fa fa-facebook"></i>  Facebook</h3>
                    <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div class="fb-like-box" data-href="https://www.facebook.com/kandhangdotcom" data-colorscheme="light" data-show-faces="true" data-header="true" data-stream="true" data-show-border="true"></div>
                </div>
                <div class="col-lg-4 col-md-4">				
                    <h3><i class="fa fa-twitter"></i>  Twitter</h3>
					<p>
					<a class="twitter-timeline" href="https://twitter.com/kandhangdotcom" data-widget-id="505977903226441728">Tweets by @kandhangdotcom</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>


					</p>

                </div>
                <div class="col-lg-4 col-md-4">
                <h3>Hubungi Kami</h3>
		  <?php
		  $sqlShow="select * from tb_info";
		  $result=mysql_query($sqlShow);
		  $data1=mysql_fetch_array($result);
		  ?>
          
         <p>
            <?php echo $data1['info_alamat']; ?>
          </p>
          <p><img src="images/bbm.jpg" width="30" height="30">BBM : Ac123F</p>
          <p><i class="fa fa-phone"></i> <abbr title="Phone"> P</abbr>: <?php echo $data1['info_phone']; ?></p>
          <p><i class="fa fa-envelope-o"></i> <abbr title="Email"> E</abbr>: <a href="cs@kandhang.com"><?php echo $data1['info_email']; ?></a></p>
          <p><i class="fa fa-clock-o"></i> <abbr title="Hours"> H</abbr>: <?php echo $data1['info_jam']; ?></p>
          <ul class="list-unstyled list-inline list-social-icons">
            <li class="tooltip-social facebook-link"><a href="https://facebook.com/kandhangdotcom" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="fa fa-facebook-square fa-2x"></i></a></li>
            <li class="tooltip-social linkedin-link"><a href="#linkedin-company-page" data-toggle="tooltip" data-placement="top" title="LinkedIn"><i class="fa fa-linkedin-square fa-2x"></i></a></li>
            <li class="tooltip-social twitter-link"><a href="https://twitter.com/kandhangdotcom" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="fa fa-twitter-square fa-2x"></i></a></li>
            <li class="tooltip-social google-plus-link"><a href="#google-plus-page" data-toggle="tooltip" data-placement="top" title="Google+"><i class="fa fa-google-plus-square fa-2x"></i></a></li>
          </ul>
               
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    <!-- /.container -->
<div class="container">

        <hr>

        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Kandhang 2014</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- JavaScript -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/modern-business.js"></script>

</body>

</html>
<?php
}
?>
