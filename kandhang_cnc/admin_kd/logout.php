<?php
session_start();
error_reporting(0);
unset($_SESSION['userpass']);
session_destroy();
header('location: login.php?action=tank');
?>