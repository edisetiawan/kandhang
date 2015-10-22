<?php
require_once('admin_kd/inc-db.php');
$var_email=$_POST['frm_email'];
error_reporting(0);
$error=0;
if(empty($var_email)){
    $error=1;
}
if($error !=0){
    switch($error){
        case '1':
        $error_msg="email tidak boleh kosong";
        break;
    }
    header("location:forget-password.php?error=".$error."");
    exit;
}
$sql_check="SELECT * FROM tb_member WHERE member_email='".$var_email."'";
//echo $sql_check;
//exit;
$result=mysql_query($sql_check);
$rows=mysql_num_rows($result);
//echo $rows;
//exit;

if($rows > 0 ){
    $data=mysql_fetch_array($result);
    $kepada=$var_email;
   /*
    $dari="from : joker@edi091.hol.es";
    $subject="Tes Email";  //judul email
    $pesan="Halo Gan ".$data['admin_username'].", <br>

Seperti permintaan, password Agan telah direset. Berikut password barunya: <br>

Username: ".$data['admin_username']." <br>
Password: ".$data['admin_password']."

Agan bisa mengganti password ini. Jika ingin menggantinya, lakukan di pengaturan profil: http://www.kaskus.co.id/user/editprofile


Terima Kasih, 
Developer Code - The Largest Indonesian Community ";
   // $pesan="Password anda  ".$data['admin_password']; //pesan
    mail($kepada,$subject,$pesan,$dari);  //fungsi untuk kirim email
    //if($kirim_email){  */
    header('location: forget-sukses.php?action=sukses');
    /*
    echo "Username: ".$data['member_username']." <br>
            Password: ".$data['member_password']."<br>";
    
    echo"password berhasil terkirim ke email anda"; */
    }else{
   header('location: forget-password.php?action=gagal');
}

?>