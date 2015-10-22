<?php
$var_username=$_POST['frm_username'];
$var_password=$_POST['frm_password'];
/*
echo $var_username."<br>";
echo $var_password;
exit;
*/

if(($var_username == 'joker') && ($var_password=='123')){
    header('location: admin_area.php');
} else {
    header('location: index.php?action=gagal');
}


?>