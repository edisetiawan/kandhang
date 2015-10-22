<?php
error_reporting(0);
$pesan='';
if (isset($_GET['action'])) {
if (isset($_GET['id'])) { //cek variabel id
$id=(int)$_GET['id'];
} else {
$id=0;
}
$action=$_GET['action'];
switch($_GET['action']) {
        case 'add':
                    if (!empty($_SESSION['basket'][$id])) {
                    $pesan="hewan wes ono keranjang";
                    } else {
                    $_SESSION['basket'][$id]=1;
            }
        break;
        case 'update' :
            $produk=$_POST['produk'];
            foreach ($produk as $key => $val) {
            if (!empty($_SESSION['basket'][$key])) {
            $_SESSION['basket'][$key]=$val;
        }  //jika barang memang ada, baru di-update
        }
        break;
        case 'delete' :
            if (!empty($_SESSION['basket'][$id])) {
            unset($_SESSION['basket'][$id]);
        } else {
            $pesan="hewan yang dimaksud tidak ada";
        }
        break;
}
}
?>