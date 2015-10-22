<?php
session_start();
error_reporting(0);
require_once('admin_kd/inc-db.php');
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

</thead>
<tbody>
<?php
$sqlShow="select * from tb_bank";
$result=mysql_query($sqlShow);
while($data=mysql_fetch_array($result)){
?>
<tr>
<th><img src="images/<?php echo $data['bank_icon']; ?>" ></th><th>
Bank  <?php echo $data['bank_nama'].", ".$data['bank_cabang']."/n : "; ?>Kandhang.com
<h4>Nomor Rekening:</h4>
<h3><?php echo $data['bank_no_rekening']; ?></h3></th><th >&nbsp;</th>
</tr> 
<?php
}
?>
<tr>
<th></th><th><form method="post" action="index.php">
      <div class="form-actions">
            <button type="submit" class="btn btn-success"><i class="fa fa-icon-ok"></i> SELESAI</button>
          
          </div>
</form></th>
</tr>
</tbody>
    </table>

    </div>
    <!-- /.container -->
<?php
require_once('footer.php');

?>
    <!-- /.container -->

    <!-- JavaScript -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/modern-business.js"></script>

</body>

</html>
