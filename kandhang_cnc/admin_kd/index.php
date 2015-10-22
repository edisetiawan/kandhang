<?php
session_start();
error_reporting(0);
//echo "ini adalah session: ".$_SESSION['userpass'];
//exit;
if(empty($_SESSION['userpass'])){
    header('location:error-404.php');
    exit;
}
require_once('inc-db.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Administator kandhang.com</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <!-- Page Specific CSS -->
    <link rel="stylesheet" href="http://cdn.oesmith.co.uk/morris-0.4.3.min.css">
  </head>

  <body>

    <div id="wrapper">

      <!-- Sidebar -->
      <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Administrator kandhang.com</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav side-nav">
            
            
            <li><a href="index.php?page=1"><i class="fa fa-user"></i> Profil</a></li>
            <li><a href="index.php?page=2"><i class="fa fa-folder-open"></i> Data Admin</a></li>
            <li><a href="index.php?page=3"><i class="fa fa-folder-open"></i> Data Member</a></li>
            <li><a href="index.php?page=34"><i class="fa fa-folder-open"></i> Data Bank</a></li>
            <li><a href="index.php?page=4"><i class="fa fa-folder-open"></i> Kategori</a></li>
            <li><a href="index.php?page=5"><i class="fa fa-folder-open"></i> Data Hewan</a></li>
            <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-shopping-cart">
            </i>  Order Hewan<b class="caret"></b></a>
                <ul class="dropdown-menu">
                <li><a href="index.php?page=61">Order Member</a></li>
                <li><a href="index.php?page=62">Order Non Member</a></li>            
                </ul>
            </li>
            <li><a href="index.php?page=7"><i class="fa fa-envelope"></i> Konfirmasi Bayar</a></li>
            <li><a href="index.php?page=8"><i class="fa fa-envelope"></i> Contact</a></li>
            <li><a href="index.php?page=9"><i class="fa fa-envelope"></i> Hubungi Kami</a></li>
                                     
          </ul>
            
          <ul class="nav navbar-nav navbar-right navbar-user">

            <li class="dropdown user-dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> John Smith <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="#"><i class="fa fa-user"></i> Profile</a></li>
                <li><a href="#"><i class="fa fa-envelope"></i> Inbox <span class="badge">7</span></a></li>
                <li><a href="#"><i class="fa fa-gear"></i> Settings</a></li>
                <li class="divider"></li>
                <li><a href="logout.php"><i class="fa fa-power-off"></i> Log Out</a></li>
              </ul>
            </li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </nav>

      <div id="page-wrapper">

        <div class="row">
          <div class="col-lg-12">
         <!--   <h1>Dashboard </h1>-->
            <?php
$p=$_GET['page'];
switch($p){
    case '1':
    require_once('profil.php');  //profil
    break;
    case '2':
    require_once('admin-show.php');  //data admin
    break;
    case '21':
    require_once('admin-frm.php');  //tambah admin
    break;
    case '22':
    require_once('admin-save.php');  //update admin
    break;
    case '23':
    require_once('admin-delete.php');  //delete admin
    break;
	case '24':
    require_once('admin-frm-u.php');  //delete admin
    break;
    case '3':
    require_once('member-show.php');  //data member
    break;
    case '34':
    require_once('bank-show.php');  //data member
    break;
    case '4':
    require_once('kategori-show.php');  //kategori
    break;
    case '41':
    require_once('kategori-frm.php');  //kategori
    break;
    case '5':
    require_once('hewan-show.php');  //data hewan
    break;
    case '51':
    require_once('hewan-frm.php');  //data hewan
    break;
    case '61':
    require_once('order-m-show.php');  //order member
    break;
    case '62':
    require_once('order-t-show.php');   //order tanpa akun
    break;
    case '7':
    require_once('bayar-show.php');  //konfirmasi bayar
    break;
    case '8':
    require_once('contact-show.php');  //contak
    break;
    case '9':
    require_once('hub-kam-show.php');  //hubungi kami
    break;
    
}

?>
            
            
          </div>
        </div><!-- /.row -->
    

      </div><!-- /#page-wrapper -->

    </div><!-- /#wrapper -->

    <!-- JavaScript -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>

    <!-- Page Specific Plugins -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="http://cdn.oesmith.co.uk/morris-0.4.3.min.js"></script>
    <script src="js/morris/chart-data-morris.js"></script>
    <script src="js/tablesorter/jquery.tablesorter.js"></script>
    <script src="js/tablesorter/tables.js"></script>

  </body>
</html>
