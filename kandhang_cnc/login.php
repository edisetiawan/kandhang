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
   
      <div class="row">
      
        <div class="col-lg-12">
          <h1 class="page-header">Login</h1>
         
        </div>
      </div><!-- /.row -->
      <div class="row">
	 	  
        <div class="col-sm-8">
        <b style="color: red;">
         <?php
if($_GET['action']=='gagal'){
    echo "<b>Login gagal gan...!!!!!!</b>";
}
?></b>
            <form role="form" method="POST" action="login_check.php">
	          
	              
	             <table border='0'>
				 <tr>
				 <th>Email</th><th>&nbsp;</th><th><input type="text" name="frm_username" class="form-control" id="input1"></th>
				 </tr>				 
				 <tr>
				 <th>Password</td><td>&nbsp;</td><td><input type="password" name="frm_password" class="form-control" id="input1"></th>
				 </tr>
				 <tr>
				 <td></td><td></td>&nbsp;<td><input type="checkbox" name="checkbox" value="checkbox"> Ingat Saya</td>
				 </tr>
				 <tr>
				 <td></td><td></td><td align="reigth"> <button type="submit" class="btn btn-primary">Login</button></td>
				 </tr>
				<!-- <tr>
				 <td></td><td></td><td align="reigth"> <button type="submit" class="btn btn-primary"><i class="fa fa-facebook"></i> Login dengan facebook</button></td>
				 </tr>-->
				 <td>
				  <td colspan="3">Lupa Passwrd ? <a href="password_reset.php">Reset Password</a></td>
				 </tr>
					</table>
            </form>
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
