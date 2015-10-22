<?php
session_start();
mysql_connect('localhost','root','');
mysql_select_db('kandhang_bnc');
$sql_select="select * from tb_hewan";
$result=mysql_query($sql_select);
?>
<table>
<tr><td><b>no</b></td><td><b>harga</b></td><td><b>reviews</b></td><td><b>detail</b></td></tr>
<?php
$no=0;
while($data=mysql_fetch_array($result)){
$_SESSION['harga_jual']=$data['hewan_harga_jual'];
$no++;
?>
<tr>
<td><?php echo $no; ?></td><td><?php echo $_SESSION['harga_jual']  ?></td><td><?php echo $data['reviews']; ?></td>
<td>
<a href="update.php?detail=<?php echo $data['hewan_id']; ?>">DETAIL</a></td>
<tr>
<?php
}
?>
</table>
<br>
<br>
