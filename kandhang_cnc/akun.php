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

    <title>Sidebar Page - Modern Business - Start Bootstrap Template</title>

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
            <div class="col-md-3 col-sm-4 sidebar">
                <ul class="nav nav-stacked nav-pills">
                    <li><a href="akun.php?page=profil">Profil</a>
                    </li>
                    <li><a href="akun.php?page=jualhewan&act=frm-insert">Jual Hewan</a>
                    </li>
                    <li><a href="akun.php?page=hewandijual">Hewan Dijual</a>
                    </li>
                    <li><a href="akun.php?page=transaksi">Transaksi</a>
                    </li>
                    <li><a href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>

            <div class="col-md-9 col-sm-8">
            <!-- <h1 class="page-header">Sidebar Page
                    <small>For Deeper Customization</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="index.html">Home</a>
                    </li>
                    <li class="active">Full Width Page</li>
                </ol>
                <p>-->
                <?php
                switch($_GET['page']){
                    default:
                    ?>
                    <h1 class="page-header">Selamat datang di Haman Admin anda</h1>
                    <?php
                    break;
                    case 'profilupdate':
                    require_once('profil-frm.php');
                    break;
                    case 'profil':
                    require_once('profil-show.php');
                    break;
                    case 'jualhewan':
                    require_once('akun-frm-hewan.php');
                    break;
                    case 'hewandijual':
                    require_once('akun-frm-hewan.php');
                    break;
                }
                ?>
               
               </p>
            </div>

        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->

    <div class="container">

        <hr>

        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Company 2013</p>
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
