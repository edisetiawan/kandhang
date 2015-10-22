<?php
$array_hari = array(1 => "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu", "Minggu");
$array_bulan = array(1 => "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

$tanggal_pesan = date('2014-08-22 21:58:00');
$tanggal_bayar = date('Y-m-d H:i:s', strtotime("+12 hours", strtotime($tanggal_pesan)));
$tanggal_bayar_print = $array_hari[date('N', strtotime($tanggal_bayar))].', '.date('d', strtotime($tanggal_bayar)).' '.$array_bulan[date('n', strtotime($tanggal_bayar))].' '.date('Y', strtotime($tanggal_bayar));
?>

Tanggal Pesan = <?php echo $tanggal_pesan; ?><br/>
Tanggal Bayar (Tanggal Pesan + 12 jam) = <?php echo $tanggal_bayar; ?>
<ul>
    <li>Melunasi tagihan pembayaran setelah melakukan pemesanan.</li>
    <li>Transaksi dianggap batal jika sampai dengan pukul <b><?php echo date('H:i', strtotime($tanggal_bayar)) ?></b> WIB hari <b><?php echo $tanggal_bayar_print;?></b> (1x12 jam)</b> pembayaran belum dilunasi.</li>
    <li>Pastikan Anda membayar sama persis dengan angka total yang tertera di atas.</li>
<ul>