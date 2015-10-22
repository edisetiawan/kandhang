<?php
session_start();
error_reporting(0);
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
      <!-- /.row -->
      
      <div class="row">

        <div class="col-sm-8">
       <br>
	   <br>
	   <br>
	   <br>
	   <br>
	   <br><br>
	   <br>
	            <div class="row">
<?php
/*error_reporting(0);
if($_GET['action']=='sukses'){
     echo"password tidak terkirim ke email anda";
} */
?>
	           <b> Terimaksih untuk email dan password sudah kami kirim ke email anda.</b><br />
               <h4></h4>silahkan login <a href="login.php">disini </a></h4>
	        
              </div>
      
        </div>

      </div><!-- /.row -->

    </div><!-- /.container -->

    <div class="container">

      <hr>

      <footer>
        <div class="row">
          <div class="col-lg-12">
            <p>Copyright &copy; Company 2013</p>
          </div>
        </div>
      </footer>

    </div><!-- /.container -->

    <!-- JavaScript -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/modern-business.js"></script>

  </body>
</html>
