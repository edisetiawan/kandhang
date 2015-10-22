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
$var_id=$_POST['frm_id'];
//----------------------------
$var_no_reg=$_POST['frm_no_reg'];
$var_bank=$_POST['frm_bank'];
$var_cabang=$_POST['frm_cabang'];

/*
echo "Id :".$var_id."<br>";
echo "no reg :".$var_no_reg."<br>";
echo "naba bank: ".$var_bank."<br>";
echo "cabang".$var_cabang;
exit;
*/

$sql_update="update tb_bank 
            set bank_nama='$var_bank',
                bank_cabang='$var_cabang',
                bank_no_rekening='$var_no_reg' where bank_id='".$var_id."'";
$result=mysql_query($sql_update);
if($result){
    header('location: index.php?page=34');
}


?>