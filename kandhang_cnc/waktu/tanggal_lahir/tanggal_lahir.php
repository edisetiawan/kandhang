


Tanggal <select name="tanggal" id="tanggal">
   <?php
for($n=1; $n<=31; $n++){ #melakukan perulangan angka 1 s.d 31
?>
   <option value="<?php $n;?>"><?php echo $n;?></option>
   <?php } ?>
 </select>
 -

 <select name="bulan" id="bulan">
   <?php
$bln = array('Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
for($n=0; $n<=11; $n++){
?>
   <option value="<?php $bln[$n];?>"><?php echo  $bln[$n];?></option>
   <?php } ?>
 </select>
 -
 
  <select name="tahun" id="tahun">
   <?php
for($n=1920; $n<=2020; $n++){ #melakukan perulangan angka 1920 s.d 2020
	if($n == 1990){ #menunjuk 1990 sebagai default pilihan
?>
   <option value="<?php $n;?>" selected><?php echo $n;?></option>
   <?php
	}else{
?>
   <option value="<?php $n;?>"><?php echo $n;?></option>
   <?php	}
} 
?>
 </select>