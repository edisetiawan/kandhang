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
require_once('admin_kd/inc-db.php');
error_reporting(0);
require_once('navigasi_cp.php');
?>
    <div class="container">

        <div class="row">

            <div class="col-lg-12">
                <h1 class="page-header">Pilih Hewan
                    <small></small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="index.html">Home</a>
                    </li>
                    <li class="active"></li>
                </ol>
            </div>

        </div>
        <!-- /.row -->

        <div class="row">

        <!-- START-->
      <?php
$batas=9;
$sqlShow="select * from tb_hewan order by  hewan_id desc limit $batas";
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
				
					<!--END-->
        </div>

        <hr>

        <div class="row text-center">

            <div class="col-lg-12">
                <ul class="pagination">
                    <li><a href="#">&laquo;</a>
                    </li>
					<?php
					$sqlShow="select * from tb_hewan";
					$result=mysql_query($sqlShow);
					$jmldata=mysql_num_rows($result);
					$jmlhalaman=ceil($jmldata/$batas);
					for($i=1;$i<=$jmlhalaman;$i++)
					if($i !=$halaman){
					//echo"<a href='$PHP_SELF?halaman=$i'>$i</a> |";
					}else {
					//echo "<b>$i</b>";
					}  

                    echo"<li class='active'><a href='#'>1</a>
                    </li>
                    <li><a href=''>2</a>
                    </li>
					<li><a href=''>3</a>
                    </li>
					<li><a href=''>4</a>
                    </li>";
                
					?>
					
					
                    <li><a href="#">&raquo;</a>
                    </li>
                </ul>
            </div>

        </div>

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
