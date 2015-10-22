<?php
session_start();
require_once('admin/inc-db.php');
//-----------------------------------------------------
$id_username=$_SESSION['username'];
$basket=$_SESSION['basket'];
//-----------------------------------------------------
//require_once('menu.php');
//$id_username=1;
//echo $id_username."<br>";
$date=date("Y-m-d, H:i");//  date("Y-m-d"); 
//exit;
/*

echo $id_username." | ".$date." pm";
$sqlInsert_Order="insert into tb_order values ('','$id_username','$date','','')";
$orderid=mysql_insert_id();

//$result=mysql_query($sqlInsert_Order);
echo $orderid;
exit; */

?>
<table border='1'>
<tr><td>No</td><td>Nama</td><td>Harga per ekor</td><td>total ekor</td><td>sub total</td></tr>

<?php

$sqlInsert_Order="insert into tb_order values('','$id_username','$date','','')"; //2  ini yang jadi
$result=mysql_query($sqlInsert_Order);
$order_id=mysql_insert_id(); 
if(empty($basket)){

echo"<tr>
    <td colspan='5' align='center'>Keranjang nada masih kosong...</td>
  </tr>";
}else {
foreach ($basket as $key => $val) { //menuliskan tabel
//echo "<h3>".$val."</h3>";
$no_urut++;
$query="SELECT * FROM tb_product WHERE product_id=".$key;
$hasil=mysql_query($query);
if ($hasil) {
$data=mysql_fetch_array($hasil);

$total+=$val; //jumlah barang
$subtotal=$data['product_harga']*$val; //sub total
$total_harga += ($val * $data['product_harga']); //total harga
$total_item=$val * $data['product_harga'];

echo "<tr><td>".$no_urut."</td><td>".$data['product_title']."</td><td>".$data['product_harga']."</td><td>".$val."</td>";
echo "<td>".$subtotal."<td></tr>";

$sql_insert_order_detail="insert into tb_order_detail values ('','$order_id','$key','$val','$subtotal')"; ini ynag jadi
$result=mysql_query($sql_insert_order_detail);

}
}
}
?>
</table>
<?php
echo "Jumlah : ".$total;
echo "<br> Total Harga beli : ".$total_harga;
?>