<?php
session_start();
error_reporting(0);
//echo "ini adalah session: ".$_SESSION['userpass'];
//exit;
if(empty($_SESSION['userpass'])){
    header('location:error-404.php');
    exit;
}
?>
<h2>Input Kategori</h2>
<form method="post" action="kategori-save.php">
Nama Kategori <input type="text" name="frm_kategori" />
<input type="submit" value="SAVE"/>
</form>