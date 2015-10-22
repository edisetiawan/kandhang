<?php
//session_start();
if(empty($_SESSION['password'])){
   header('location: index.php');
} else {
require_once('admin_kd/inc-db.php');
error_reporting(0);
//require_once('navigasi_cp.php');

//$ambil_email=$_GET['action'];
$id_profil=$_SESSION['member_id'];

//echo "id profil :".$id_profil;
//exit;
/*$sql_Show="SELECT
    tb_member
FROM
    tb_member
    INNER JOIN tb_profil 
        ON (tb_member.member_id = tb_profil.member_id) WHERE tb_member.member_id='".$id_profil."'"; */
        //echo $sql_Show;
        //exit;
$sql_Show="select * from tb_member join tb_profil on tb_member.member_id = tb_profil
.member_id where tb_member.member_id='".$id_profil."'";
$result=mysql_query($sql_Show);
$data=mysql_fetch_array($result);
//echo $sql_Show;
//exit;

$result=mysql_query($sql_Show);
$data=mysql_fetch_array($result);

$sql_Show1="SELECT
    prov.nama_prov
    , kabkot.nama_kabkot
    , kec.nama_kec
FROM
    kabkot
    INNER JOIN kec 
        ON (kabkot.id_kabkot = kec.id_kabkot)
    INNER JOIN prov 
        ON (prov.id_prov = kabkot.id_prov) where kec.id_kec='".$data['profil_kecamatan']."'";
$result1=mysql_query($sql_Show1);
$data1=mysql_fetch_array($result1);


?>

    <!-- Page Content -->

    <div class="container">
   
      <div class="row">
      
        <div class="col-lg-12">
          <h1 class="page-header">Profil</h1>
         
        </div>
      </div><!-- /.row -->
      <div class="row">
	 	  
        <div class="col-sm-8">

            <form role="form" method="POST" action="akun.php?page=profilupdate">
            	  
	             <table border='0'>
                  <tr>
				 <th>Nama </th><th>:</th><th><?php echo $data['profil_nama']; ?></th>
				 </tr>					 
				  <tr>
				 <th>Tanggal Lahir </th><th>:</th><th><?php echo $data['profil_tgl_lahir']; ?></th>
				 </tr>	
                  <tr>
				 <th>Telepon </th><th>:</th><th><?php echo $data['profil_telepon']; ?></th>
				 </tr>
                   <tr>
				 <th>Email </th><th>:</th><th><?php echo $data['member_email']; ?></th>
				 </tr>	
                  <tr>
				 <th>Provinsi </th><th>:</th><th><?php echo $data1['nama_prov']; ?></th>
				 </tr>	
                  <tr>
				 <th>Kota </th><th>:</th><th><?php echo $data1['nama_kabkot']; ?></th>
				 </tr>
                  <tr>
				 <th>Kecamatan </th><th>:</th><th><?php echo $data1['nama_kec']; ?></th>
				 </tr>
                  <tr>
				 <th>Alamat </th><th>:</th><th><?php echo $data['profil_alamat']; ?></th>
				 </tr>	
                  <tr>
				 <th>&nbsp;</th><th>&nbsp;</th><th><input type="submit" value="Update" name="Update"/></th>
				 </tr>				
					</table>
            </form>
        </div>

      </div><!-- /.row -->

    </div><!-- /.container -->
<?php
//require_once('footer.php');
}
?>