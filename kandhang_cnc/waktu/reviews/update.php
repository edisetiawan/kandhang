<?php  
session_start();
mysql_connect('localhost','root','');
mysql_select_db('kandhang_bnc');
//---------------------------------------------------
$_SESSION['id']=$_GET['detail'];
//echo "ID -->".$_SESSION['id'];
//exit;
$sql_select="select * from tb_hewan where hewan_id=".$_SESSION['id'];
//echo $sql_select;
//exit;
$result=mysql_query($sql_select);
$data=mysql_fetch_array($result);
$reviews=$data['reviews'];
$ilusi=0;
$jum_klik=($ilusi != 0) ? 'serius amat lo' : $reviews+1;
//echo "Juml reviews :".$reviews."<br>";
//echo "Juml reviews :".$jum_klik;
//exit;
$update="UPDATE tb_hewan SET reviews=".$jum_klik." WHERE hewan_id=".$_SESSION['id'];
$result=mysql_query($update);
header('location: detail.php');
exit;
?>