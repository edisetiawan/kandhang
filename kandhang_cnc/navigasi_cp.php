<?php
//session_start();
?> <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- You'll want to use a responsive image option so this logo looks good on devices - I recommend using something like retina.js (do a quick Google search for it and you'll find it) -->
                <a class="navbar-brand" href="index.php">KANDANG.COM</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav navbar-right">					
                    <li><a href="index.php">HOME</a>
                    </li>
                    <li><a href="index.php?page=pilih_hewan">PILIH HEWAN</a>
                    </li>
					<li><a href="index.php?page=order_hewan">ORDER</a>
                    </li>
					<li><a href="index.php?page=konfirmasi">KONFIRMASI</a>
                    </li>
					<li><a href="index.php?page=hubungi_kami">HUBUNGI KAMI</a>
                    </li>
					<?php 
                    error_reporting(0);
					if(empty($_SESSION['password'])){
					?>
					<li><a href="login.php">LOGIN</a>
                    </li>
                   	<li><a href="register.php">DAFTAR</a>
                    </li>
					<?php
			        }else {
					?>
				<!--	<li><a href="profil1.php">PROFIL</a></li>-->
        <ul class="nav navbar-nav navbar-right navbar-user">
            <li class="dropdown user-dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> My Account <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="akun.php?page=profil"><i class="fa fa-user"></i> Profile</a></li>
                <li><a href="akun.php?page=inbox"><i class="fa fa-envelope"></i> Inbox <span class="badge">7</span></a></li>
                <li><a href="akun.php?page=setting"><i class="fa fa-gear"></i> Settings</a></li>
                <li class="divider"></li>
                <li><a href="logout.php"><i class="fa fa-power-off"></i> Log Out</a></li>
              </ul>
            </li>
          </ul>
          
          
				<!--	<li><a href="logout.php">LOGOUT</a></li> -->
					<?php
					}
					?>
					
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>