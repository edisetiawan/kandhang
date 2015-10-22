<?php
session_start();
error_reporting(0);
//echo "ini adalah session: ".$_SESSION['userpass'];
//exit;
if(empty($_SESSION['userpass'])){
    header('location:error-404.php');
    exit;
}
//session_start();
require_once('inc-db.php');
$id=1;
$sql_show="select * from tb_depan where depan_id='".$id."'";
$result=mysql_query($sql_show);
$data=mysql_fetch_array($result);
?>
<h1>Profil</h1>
<form enctype="multipart/form-data" method="post" action="profil-update.php" >
Judul 
<br />
<input type="text" name="frm_judul" value="<?php echo $data['depan_judul']; ?>" />
Gambar<br />
<img src="../images/<?php echo $data['depan_foto']; ?>" width="400" height="300">
<br />
 <input type="file" name="frm_foto"/>

Deskripsi<br />
<textarea name="frm_dec" cols="50" rows="10">
<?php
echo $data['depan_deskripsi'];
?>
</textarea><br />
<input type="submit" value="Update"/>
</form>