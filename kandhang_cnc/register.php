<?php
session_start();
error_reporting(0);
?>
<html>
<head>
<title>Kandhang</title>
<?php
require_once('navigasi_cp.php');
?>
	<!--<link rel="stylesheet" href="val.css" type="text/css" />-->
	<!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <!-- Add custom CSS here -->
    <link href="css/modern-business.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
	
<script type="text/javascript" src="waktu/validasi/jquery.js"></script>
<script type="text/javascript" src="waktu/validasi/jquery.validate.js"></script>
<script type="text/javascript">
$(document).ready(function() {

$("#form1").validate({

	rules:{	

	frm_email:{ required: true,email: true},

	frm_password: {required: true,minlength:5},
    
    frm_cpassword:{required: true,equalTo:"#frm_password"}

		  },

	messages:{ 


			frm_email:{		

					required:'email tidak boleh kosong',

					email   :'email harus valid'},

			frm_password: {

					required: 'password tidak boleh kosong',
                    minlength:'Password minimal 5 karakter'},
     
            frm_cpassword: {

				required:'password tidak boleh kosong',
			    equalTo :'password harus sama'}


			},

     success: function(label) {

        label.text('OK!').addClass('valid');}

	});

});
</script>
</head>
<body>
   <div class="container">
     <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Pendaftaran User Baru
                    <small></small>
                </h1>   
            </div>
        </div>
	<div class="row">
		<div class="col-lg-12">	 
        <?php
        error_reporting(0);
        if($_GET['action']=="gagal"){
            echo "email sudah digunakan";
        }
        ?> 
        <h4 style="color: red;"><?php echo $_SESSION['register']; ?></h4>   		
<form id="form1" method="post" action="register-sukses.php">
 <table>
	<tr>
        <td><b>Email</b> </td><td>:</td><td><input type="text" name="frm_email" id="frm_email"></td>
	</tr>
	<tr>
        <td><b>Password</b></td><td>:</td><td><input type="password" name="frm_password" id="frm_password"></td>
	</tr>
    <tr>
        <td><b>Konfirm Password</b></td><td>:</td><td><input type="password" name="frm_cpassword" id="frm_cpassword"></td>
	</tr>
	<tr>
		<td>&nbsp;</td><td>&nbsp;</td><td><input type="submit" name="submit" value="Daftar"></td>
	</tr>
</table>
</form>	
			</div>
		</div>
	</div>
</body>

</html>