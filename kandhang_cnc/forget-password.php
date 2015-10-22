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
error_reporting(0);
if($_GET['error']==1){
     echo"<p style='color:red'>email tidak boleh kosong</p>";
}

if($_GET['action']=='gagal'){
     echo"<p style='color:red'>Maaf, keanggotaan Anda belum terdaftar, silakan melakukan registrasi terlebih dahulu.
Klik di <a href='register.php'>sini</a> untuk registrasi.</p>";
}

?>
	              <form method="post" action="forget-check.php">
				  <table>
				  <tr>
	                <td><label for="input2">Email Address</label></td><td>&nbsp;</td><td>
	                <input type="email" name="frm_email" class="form-control" id="input2"></td>
					<td> <b>&nbsp;&nbsp;Cek dua kali alamat email Anda. pastikan semuanya benar </b></td>
					</tr>
				
					<tr>
	                <td><label for="input2">&nbsp;</label></td><td>&nbsp;</td><td>
	                <button type="submit" class="btn btn-success"> Kirim&nbsp;&nbsp;&nbsp;</button></td><td>&nbsp;</td>
					</tr>
					</table>
	             </form>
	        
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
