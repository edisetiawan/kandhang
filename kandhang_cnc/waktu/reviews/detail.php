<?php
session_start();
mysql_connect('localhost','root','');
mysql_select_db('kandhang_bnc');
$id=$_SESSION['id'];
$sql_select="select * from tb_hewan where hewan_id=".$id;
//echo $sql_select;
//exit;
$result=mysql_query($sql_select);
$data=mysql_fetch_array($result);
echo $data['reviews'];
echo "<a href='index.php'>menu awal</a>";
exit;
?>