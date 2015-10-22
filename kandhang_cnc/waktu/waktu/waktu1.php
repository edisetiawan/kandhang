<?php
/*
date_default_timezone_get('Asia/Jakarta');
 $tanggal_now = date('Y-m-d');
 $tambah_tanggal = mktime(0,0,0,date('m')+2,date('d')+7,date('Y')+1); // angka 2,7,1 yang dicetak tebal bisa dirubah rubah
 $tambah = date('Y-m-d',$tambah_tanggal);
echo "Tanggal Sekarang : ".$tanggal_now."<br>";
 echo "Setelah ditambah 2 bulan, 7 hari dan 1 tahun menjadi :".$tambah;
 
 echo"<hr>";
 // cara 1 Menambah jam di php
if(function_exists('date_default_timezone_set')) date_default_timezone_set('Asia/Jakarta');
$date = date_create('20-02-2012 9:30:20');
echo 'Waktu awal: 20-02-2012 9:30:20'; 
echo "<br>";
date_add($date, date_interval_create_from_date_string('12 hours'));
echo 'Ditambahkan 6 jam: '.date_format($date, 'd-m-Y H:i:s').'';
echo "<hr>";
 // cara 2 Menambah jam di php
if(function_exists('date_default_timezone_set')) date_default_timezone_set('Asia/Jakarta');
$date = date_create('20-02-2012 9:38:20');
echo 'Waktu awal: 20-02-2012 9:38:20<br/>';
date_add($date, date_interval_create_from_date_string('720 minutes'));
echo 'Tambahkan 30 menit: '.date_format($date, 'd-m-Y H:i:s').'<br/><b>';*/
//uji

//Array Hari 
$array_hari = array(1=>"Senin","Selasa","Rabu","Kamis","Jumat", 
"Sabtu","Minggu"); 
$hari = $array_hari[date("N")]; 
//Format Tanggal 
$tanggal = date ("j"); 
//Array Bulan 
$array_bulan = array(1=>"Januari","Februari","Maret", "April", "Mei", 
"Juni","Juli","Agustus","September","Oktober", "November","Desember"); 
$bulan = $array_bulan[date("n")]; 
//Format Tahun 
$tahun = date("Y"); 
//Menampilkan hari dan tanggal 
echo $hari . ", " . $tanggal."&nbsp". $bulan ."&nbsp". $tahun; 
exit;
$bulann = date("F");
echo $bulann;
echo date('d-m-Y H:i:s');
exit;
//
$bulan=date("m");
function bulan($bulan)
{
Switch ($bulan){
    case 1 : $bulan="Januari";
        Break;
    case 2 : $bulan="Februari";
        Break;
    case 3 : $bulan="Maret";
        Break;
    case 4 : $bulan="April";
        Break;
    case 5 : $bulan="Mei";
        Break;
    case 6 : $bulan="Juni";
        Break;
    case 7 : $bulan="Juli";
        Break;
    case 8 : $bulan="Agustus";
        Break;
    case 9 : $bulan="September";
        Break;
    case 10 : $bulan="Oktober";
        Break;
    case 11 : $bulan="November";
        Break;
    case 12 : $bulan="Desember";
        Break;
    }
return $bulan;
}

$bln=date("m");
echo bulan($bln);
exit;

echo "<br><b>".date('d-m-Y H:i:s')."</b><br>";
if(function_exists('date_default_timezone_set')) date_default_timezone_set('Asia/Jakarta');
$tg=39;
$date = date_create(date('d-m-Y H:i:s'));
//$date = date_create('20-02-2012 9:'.$tg.':20');
//$date = date('d-m-Y H:i:s');
echo "Waktu awal: <b>".date('d-m-Y H:i:s')."</b><br/>";
date_add($date, date_interval_create_from_date_string('720 minutes'));
echo 'Tambahkan 30 menit: '.date_format($date, 'd-m-Y H:i:s').'<br/><b>';
?>