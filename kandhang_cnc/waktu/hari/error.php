<?php
$a=12;
$b=01;
$x = mktime(0, 0, 0, date("m"), date("d")+0,  date("Y")); 
$hari_tetap= date("l", $x);
//echo $x;
//echo "<br>";
//echo date("l", $x);
//echo "<hr>";
$y = mktime(0, 0, 0, date("m"), date("d")+1,  date("Y")); 
echo $y;
echo "<br>";
//echo date("l", $y);
$ganti_hari=date("l", $y);

$ketentuan=(($a >= 12) &&($b > 0 )) ? $ganti_hari : $hari_tetap;
echo $ketentuan;
?>