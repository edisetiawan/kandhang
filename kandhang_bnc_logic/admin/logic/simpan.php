
<?php

  $judul_gambar=$_POST['judul_gambar'];
  
  $lokasi_file = $_FILES['nama_file']['tmp_name'];
  $nama_file = $_FILES['nama_file']['name'];
  $ukuran_file = $_FILES['nama_file']['size'];
  $direktori = "gambar/$nama_file";
   
  //apabila file berhasil diupload
  if (move_uploaded_file($lokasi_file,"$direktori"))
	  {
   // echo "Nama File : <b>$nama_file</b> sukses diupload<br>";
    //echo "Ukuran File : <b>$ukuran_file</b> bytes";
    //masukan informasi ke dalam database
	include('koneksi.php');
    $sql = "insert into tb_hewan values ('$judul_gambar','$nama_file','3','4','5','6','7','8','9','10')";
    mysql_query($sql);
  }else{
    echo "File gagal diupload.";
  } 
	  ?>