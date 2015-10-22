<?php
session_start();
error_reporting(0);
//echo "ini adalah session: ".$_SESSION['userpass'];
//exit;
if(empty($_SESSION['userpass'])){
    header('location:error-404.php');
    exit;
}
error_reporting(0);
require_once('inc-db.php');
//exit;
$lokasi_file=   $_FILES['fupload']['tmp_name'];
$nama_file=     $_FILES['fupload']['name'];
$ukuran_file=   $_FILES['fupload']['size'];
//-------------------------------------------foto----
$var_kategori=$_POST['frm_kategori'];
$var_nama_hewan=$_POST['frm_nama_hewan'];
$var_jenis_kelamin=$_POST['frm_jenis_kelamin'];
$var_bobot=$_POST['frm_bobot'];
$var_harga_beli=$_POST['frm_harga_beli'];
$var_harga_jual=$_POST['frm_harga_jual'];
$var_deskripsi=$_POST['frm_deskripsi'];
$date=date("Y-m-d, H:i");


/*

foreach($nama_file as $index =>$foto_name){
    echo $index.".".$foto_name."<br>";
    $_SESSION['s']=$foto_name;
}
echo "<hr>";
echo "isi :".$_SESSION['s'];

exit;
*/


foreach($nama_file as $index =>$foto_name){
    if($index==1){
    $foto_name."<br>";
    $_SESSION['foto_name']=$foto_name;
    }
}
/*echo $_SESSION['foto_name'];
//exit;
echo "<b>foto : </b>".$_SESSION['foto_name']."<br><b>nama : </b> ".$var_nama_hewan."<br><b>kategori : </b> ".$var_kategori."<br> <b>jenis kelamin : </b>
".$var_jenis_kelamin."<br><b>bobot : </b>".$var_bobot."<br><b>harga beli : </b>".$var_harga_beli.
"<br><b>harga jual : </b>".$var_harga_jual."<br><b>var deskripsi : </b>".$var_deskripsi."<br>"; 

echo "<br>file-file yang berhasil diupload <br>";
exit; */
//hitung jumlah file yang diuploud
$sql_Insert="INSERT INTO tb_hewan VALUES 
            ('',
                '".$_SESSION['foto_name']."',
                '$var_nama_hewan',
                '$var_jenis_kelamin',
                '$var_bobot',
                '$var_harga_beli',
                '$var_harga_jual',
                '$var_deskripsi',
                '$date',
                '$var_kategori','')";
//echo $sql_Insert;
//exit;
$result=mysql_query($sql_Insert);
$hewan_id=mysql_insert_id();
//exit;
$jml_file=count($nama_file);
$i=0;

//lakukan perulangan selama $i < julah file yang diupload
while($i < $jml_file){
    if($nama_file !=""){
        $derektori="../images/".$nama_file[$i];
        move_uploaded_file($lokasi_file[$i],"$derektori");   
       // echo "Nama file <b>".$nama_file[$i]."</b><br>";
       $sql_insert="INSERT INTO tb_foto VALUES ('','$nama_file[$i]','$hewan_id')";
       $result=mysql_query($sql_insert);    
    }
    $i++;
}
header('location:index.php?page=5');
?>