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
		<script src="js_d/jquery-1.6.1.min.js"></script>
	<script>
$(document).ready(function() {
	$("aside.preview nav").show();
	var previewImg = $("img#main");
	$("a:first").addClass("active");
	$("nav a img").click(function(){
		var link = $(this).parent();	
		var linkHref = link.attr("href");			
		var linkAlt = link.attr("alt");			
		if( $(link).hasClass("active") == false)
		{
			$("a").removeClass("active");
			link.addClass("active");											
			$(previewImg).animate({
				opacity: 0.8,
			}, 300, function() {
				previewImg.attr("src", linkHref);
				previewImg.attr("alt", linkAlt);				
				$(this).animate({
					opacity: 1,
					}, 300
				);							
			});			
		}
		return false;
	});
	$("input").click(function(){
		$("p.more").fadeIn("slow");
	})
});
	</script>
</head>

<body>

<?php
require_once('navigasi_cp.php');
?>

    <div class="container">
	
<!------------------------ edit start--------------------->
<article class="item">
<aside class="preview">


	<!-- ------------------row 1----------------------- -->
        <div class="row">

            <div class="col-lg-12">
                <h1 class="page-header">Detail Hewan
                    
                </h1>
                <ol class="breadcrumb">
                    <li><a href="index.php">Home</a>
                    </li>
                    <li class="active">Foto detail</li>
                </ol>
            </div>

        </div>
	<!-- ---------------row 1-------------------------- -->
			<!-- --------------------row 2--------------------- -->
        <div class="row">

            <div class="col-md-8">
               <!-- <img class="img-responsive" src="images/img00367-20121004-0853.jpg"> -->
<?php
//$hewan_id=(int)$_GET['detail'];
//echo $hewan_id;
//exit;
$hewan_id=$_SESSION['id'];
$sqlShow="SELECT * FROM tb_hewan WHERE hewan_id=".$hewan_id;
$result=mysql_query($sqlShow);
$data=mysql_fetch_array($result);
?>		   
				<img id="main" src="images/<?php echo $data['hewan_foto']; ?>" width="700" height="520" alt="Alt title of image">
				
            </div>

			<div class="col-md-4">
                
                <p>
				Jenis Kelamin: <?php echo $data['hewan_jns_kel']; ?> <br>
				Bobot : <?php echo $data['hewan_bobot']; ?> Kg<br>
				Harga : <h2>Rp. <?php echo number_format($data['hewan_harga_jual'],2,",",".");  ?></h2>
				
			
				<br>
			    <a href="order_hewan.php?action=add&id=<?php echo $data['hewan_id'] ?>">
    <button class="btn btn-primary" type="submit"><i class="fa fa-shopping-cart"></i>  Beli    </button>
 </a>

 <i class="icon-book"></i>
				</p>
	
                <h3><i class="fa fa-facebook"></i>  Temukan Kami di Facebook</h3>
				<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
				<div class="fb-share-button" data-href="http://kandhang.com"></div>
				<!--suka-->
                <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div class="fb-like-box" data-href="https://www.facebook.com/kandhangdotcom" data-colorscheme="light" data-show-faces="true" data-header="true" data-stream="false" data-show-border="true"></div>
            </div>

		<!-- -------------------row 2---------------------- -->		
<!-- -------------------row 4------------------- -->

        <div class="row">
<nav>
            <div class="col-lg-12">
                <h3 class="page-header">Foto Hewan</h3>
            </div>
<?php 
//$a=1;
$sqlGambar="SELECT * FROM tb_foto WHERE hewan_id='".$hewan_id."'";
$result1=mysql_query($sqlGambar);
//echo "Query : ".$sqlGambar;
//echo "image : ".$data['foto_nama'];
//exit;
while($data=mysql_fetch_array($result1)){
?>
            <div class="col-sm-3 col-xs-6">
                <a href="images/<?php echo $data['foto_nama']; ?>">
                    <img class="img-responsive img-customer" src="images/<?php echo $data['foto_nama']; ?>">
                </a>
            </div>
<?php
}  
?>
</nav>
        </div>

	</aside>
</article>

<!-- ---------------------- edit end------------------- -->
  
  </div>
    
    <!-- /.container -->

   <?php
require_once('footer.php');

?>
    <!-- /.container -->



</body>
</html>