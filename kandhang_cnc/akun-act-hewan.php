<?php
session_start();
error_reporting(0);
require_once('admin_kd/inc-db.php');
$member_id=$_SESSION['member_id'];
$page=$_GET['page'];
$act=$_GET['act'];
$hewan_id=$_GET['id'];
//-------------------------------------------------------------------------------------------
$type_file= $_FILES['fupload']['type'];
$lokasi_file=   $_FILES['fupload']['tmp_name'];
$nama_file=     $_FILES['fupload']['name'];
$ukuran_file=   $_FILES['fupload']['size'];
//-------------------------------------------foto----
$var_kategori=htmlentities($_POST['frm_kategori']);
$var_nama_hewan=htmlentities($_POST['frm_nama_hewan']);
$var_jenis_kelamin=htmlentities($_POST['frm_jenis_kelamin']);
$var_bobot=htmlentities($_POST['frm_bobot']);
$var_harga_beli=htmlentities($_POST['frm_harga_beli']);
$var_harga_jual=htmlentities($_POST['frm_harga_jual']);
$var_deskripsi=htmlentities($_POST['frm_deskripsi']);
$date=date("Y-m-d, H:i");

if($page == 'hewan' and $act == 'insert-hewan'){
    
foreach($type_file as $index =>$isi){
    //echo $isi."<br>";
    $_SESSION['isi']=$isi;
    

    //echo "maaf hanya type file GIF,JPG dan PNG yang boleh di upload <br>";
   // echo "klik <a href='akun.php?page=jualhewan&act=frm-insert'><b>disini</b></a> untuk kembali";

}
//echo $isi;

//exit;  
if($isi != 'image/jpeg' AND $isi != 'image/gif' AND $isi != 'image/pjpeg' AND $isi !='image/png'){
    echo "maaf hanya type file GIF,JPG dan PNG yang boleh di upload <br>";
    echo "klik <a href='akun.php?page=jualhewan&act=frm-insert'><b>disini</b></a> untuk kembali";
}else {

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
                '$var_kategori','','$member_id')";
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
        $derektori="images/".$nama_file[$i];
        move_uploaded_file($lokasi_file[$i],"$derektori");   
       // echo "Nama file <b>".$nama_file[$i]."</b><br>";
       $sql_insert="INSERT INTO tb_foto VALUES ('','$nama_file[$i]','$hewan_id')";
       $result=mysql_query($sql_insert);    
    }
    $i++;
} 
 echo "simpan sukses";     
  }  
}elseif($page == 'hewan' and $act == 'update-hewan'){
    
    
    
    
}elseif($page == 'hewan' and $act == 'delete-hewan'){
    
    $sql_delete="delete from tb_hewan where hewan_id='".$hewan_id."'";
    $result_del=mysql_query($sql_delete);
    if($result_del){
        $sql_del_foto="delete from tb_foto where hewan_id='".$hewan_id."'";
        $result1=mysql_query($sql_del_foto);
        header('location: akun.php?page=hewandijual');
    }
    
}

?>