<?php
require_once('admin/inc-db.php');
$var_username=$_POST['frm_username'];
$var_password=$_POST['frm_password'];

//echo $var_username."|".$var_password;
//exit;
$sqlCheck="SELECT * FROM tb_member WHERE member_username='".$var_username."' AND member_password='".$var_password."'";
$result=mysql_query($sqlCheck);
//echo $sqlCheck;
//exit;
$rows=mysql_num_rows($result);
//echo $rows;
//exit;
if($rows > 0){
    session_start();
    $data=mysql_fetch_array($result);
    $_SESSION['member']=$data['member_username'];
    $_SESSION['member_email']=$data['member_email'];
    $_SESSION['password']=$data['member_password'];
	$sql_profil="SELECT * FROM tb_profil WHERE member_id=".$data['member_id'];
	$result1=mysql_query($sql_profil);
	$data1=mysql_fetch_array($result1);
	$_SESSION['profil_id']=$data1['profil_id'];
	$_SESSION['profil_nama']=$data1['profil_nama'];
	//echo $_SESSION['nama'];
	header('location: alamat_pengiriman.php');
    //echo "berhasil";
}else {
//echo "gagal";
   header('location: login.php?action=gagal');
}

?>