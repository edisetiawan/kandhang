<html>
<head>
<title>Kandhang</title>

<!--<link rel="stylesheet" href="val.css" type="text/css" />-->
<!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="css/modern-business.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
	
<script type="text/javascript" src="waktu/validasi/jquery.js"></script>

<script type="text/javascript" src="waktu/validasi/jquery.validate.js"></script>

<script type="text/javascript">

$(document).ready(function() {

$("#form1").validate({

	rules:{	

	frm_ID:{required: true,number:true},   //1
    
    frm_nama:{required: true},  //2

	frm_email:{ required: true,email: true},  //3
    
    frm_nilai:{required: true,number:true,minlength:10},
    
    fupload:{required: true}

		  },

	messages:{ 

		    frm_ID:{		

					required:'Id tidak boleh kosong',
                    number:'Hanya boleh di isi Angka'},
                    
            frm_nama:{
                
                    required:'Nama tidak boleh kosong'},

			frm_email:{		

					required:'Email tidak boleh kosong',
					email   :'email harus valid'},
            
            frm_nilai:{		

					required:'Nilai Transfer tidak boleh kosong',
                    number:'Hanya boleh di isi Angka',
                    minlength:'No rekening minimal 10 digit'},
                    
            fupload:{
                    required:'bukti tidakboleh kosong'
            }

			},

     success: function(label) {

        label.text('OK!').addClass('valid');}

	});

});

</script>

</head>

<body>
<?php
//require_once('navigasi_cp.php');
?>
   <div class="container">
     <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Konfirmasi Pembayaran
                    <small></small>
                </h1>   
            </div>
        </div>
	<div class="row">
		<div class="col-lg-12">		
        <b style="color: red;">
        <?php
        if($_GET['action']=='failed'){
            echo "ID Pembelian tidak ditemukan dalam database kami. Mohon periksa ulang ID Pesanan Anda.";
        }
        ?>
        </b>	
<form enctype="multipart/form-data" id="form1" method="post" action="konfirmasi-save.php">

 <table>
  
	<tr>
		<td>ID Pembelian</td><td>:</td><td><input type="text" name="frm_ID" id="frm_ID"><td>
    </tr>
 
    
	<tr>
		<td>Nama</td><td>:</td><td><input type="text" name="frm_nama" id="frm_nama"><td>
    </tr>
	<tr>
		<td>Email </td><td>:</td><td><input type="text" name="frm_email" id="frm_email"></td>
	</tr>
	<tr>
		<td>Tanggal Transfer</td><td>:</td><td>
        <select name="frm_tanggal">
   <?php
for($n=1; $n<=31; $n++){ 
?>
   <option value="<?php echo $n;?>"><?php echo $n;?></option>
   <?php } ?>
 </select>
 -
 <select name="frm_bulan" >
   <?php
$bln = array('','Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
for($n=1; $n<=12; $n++){
?>
   <option value="<?php echo $n;?>"><?php echo  $bln[$n];?></option>
   <?php } ?>
 </select>
 -
  <select name="frm_tahun" >
   <?php
for($n=2013; $n<=2015; $n++){ #melakukan perulangan angka 1920 s.d 2020
	if($n == 2014){ #menunjuk 1990 sebagai default pilihan
?>
   <option value="<?php echo $n;?>" selected><?php echo $n;?></option>
   <?php
	}else{
?>
   <option value="<?php echo $n;?>"><?php echo $n;?></option>
   <?php	}
} 
?>
 </select></td>
	</tr>
 </table>
  <hr>
<table>
	<tr>
		<td>Nilai Transfer</td><td>:</td><td> <input type="text" name="frm_nilai" id="frm_nilai"></td>
	</tr>
	<tr>  
    
		<td>Bukti Tansfer</td><td>:</td>
			<td><input type="file" name="fupload" id="fupload" size="20" /></td>
	</tr>

	<tr>
		<td>&nbsp;</td><td>&nbsp;</td><td><input type="submit" name="submit" value="Konfirmasi Pembayaran"></td>
	</tr>
</table>
</form>	
			</div>
		</div>
	</div>
</body>

</html>