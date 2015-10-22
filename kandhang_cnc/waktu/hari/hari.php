<?php
$tanggal= mktime(date("m"),date("d"),date("Y"));
echo "Tanggal : <b>".date("d-M-Y", $tanggal)."</b> ";
date_default_timezone_set('Asia/Jakarta');
$jam=date("H:i:s");
echo "| Pukul : <b>". $jam." "."</b>";
$a = date ("H");
echo $a;
exit;
if (($a>=6) && ($a<=11)){
echo "<b>, Selamat Pagi !!</b>";
}
else if(($a>11) && ($a<=15))
{
echo ", Selamat Pagi !!";}
else if (($a>15) && ($a<=18)){
echo ", Selamat Siang !!";}
else { echo ", <b> Selamat Malam </b>";}
exit;
/* menampilkan nama hari pada 2 hari ke depan 
$m=08;
$d=22;
$y=2014;
$x  = mktime(0, 0, 0, date("m"), date("d")+1,  date("Y")); 
*///echo date("l", $x);

// menampilkan nama hari pada 5 hari sebelumnya 
//$x  = date("m d Y"); 
$x  = mktime(0, 0, 0, date("m"), date("d")+1,  date("Y")); 
echo $x;
echo "<br>";
echo date("l", $x);
echo "<hr>";
exit;
echo date("l"); 
echo "<br>";
echo "m :".date("m");
echo "<br>";
echo "d : ".date("d");
echo "<br>";
echo "Y :".date("Y");
echo "<br>";
$namahari=date("l"); 
if ($namahari == "Sunday") $namahari = "Minggu"; 
else if ($namahari == "Monday") $namahari = "Senin"; 
else if ($namahari == "Tuesday") $namahari = "Selasa"; 
else if ($namahari == "Wednesday") $namahari = "Rabu"; 
else if ($namahari == "Thursday") $namahari = "Kamis"; 
else if ($namahari == "Friday") $namahari = "Jum'at"; 
else if ($namahari == "Saturday") $namahari = "Sabtu";

echo $namahari;
exit;
?>
<code>//menentukan hari<br>
$a_hari = array(1=>"Senin","Selasa","Rabu","Kamis","Jumat", "Sabtu","Minggu");<br>
$hari = $a_hari[date("N")];<br>

//menentukan tanggal</br>
<b>1</b> $tanggal = date ("j");<br>

//menentukan bulan<br>
$a_bulan = array(1=>"Januari","Februari","Maret", "April", "Mei",<br> 
"Juni","Juli","Agustus","September","Oktober", "November","Desember");<br>
<b>2</b>$bulan = $a_bulan[date("n")];<br>

//menentukan tahun<br>
<b>3</b>$tahun = date("Y");<br>

//dan untuk menampilkan nya dengan format contoh Jumat, 22 Februari 2013<br>
echo $hari . ", " . $tanggal ." ". $bulan ." ". $tahun;<br>
</code>
<br>
<h3>tampil :</h3>
<?php
//menentukan hari
$a_hari = array(1=>"Senin","Selasa","Rabu","Kamis","Jumat", "Sabtu","Minggu");
$hari = $a_hari[date("N")];

//menentukan tanggal
$tanggal = date ("j");

//menentukan bulan
$a_bulan = array(1=>"Januari","Februari","Maret", "April", "Mei", "Juni","Juli","Agustus","September","Oktober", "November","Desember");
$bulan = $a_bulan[date("n")];

//menentukan tahun
$tahun = date("Y");

//dan untuk menampilkan nya dengan format contoh Jumat, 22 Februari 2013
echo $hari . ", " . $tanggal ." ". $bulan ." ". $tahun;

?>


