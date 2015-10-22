<?php
session_start();
?>
<div id="menu">

<a href="index.php">Home |</a>


<?php
if(empty($_SESSION['password'])){
?>
<a href="index.php?page=login">Login</a></div>
<?php
}
//echo"</div";
else {
?>
<a href="index.php?page=logou">Order |</a>
<a href="index.php?page=logou">Profil |</a>
<a href="logout.php">Logout</a>

<?php
//echo"</div>";
}

?>
