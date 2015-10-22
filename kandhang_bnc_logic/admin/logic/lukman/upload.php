<?php 
error_reporting(0);
$lokasi_file=   $_FILES['fupload']['tmp_name'];
$nama_file=     $_FILES['fupload']['name'];
$ukuran_file=   $_FILES['fupload']['size'];

echo "file-file yang berhasil diupload <br>";
//hitung jumlah file yang diuploud
$jml_file=count($nama_file);
$i=0;
echo "nama File:<h2>".$nama_file."</h2>";
//lakukan perulangan selama $i < julah file yang diupload
while($i < $jml_file){
    if($nama_file !=""){
        $derektori="foto/".$nama_file[$i];
        move_uploaded_file($lokasi_file[$i],"$derektori");
        //echo "<b>".$nama_file[$i]."</b><br>";
        
        //masukan information ke daatabase
        mysql_connect("localhost","root","");
        mysql_select_db("kandhang_bnc");
        
        echo "Nama file <b>".$nama_file[$i]."</b><br>";
     //   $sql_insert="INSERT INTO tb_foto VALUES ('','$nama_file','')";
       // $result=mysql_query($sql_insert);
        
    }
    $i++;
}

?>