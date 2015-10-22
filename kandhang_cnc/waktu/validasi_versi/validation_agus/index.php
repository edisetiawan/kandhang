<html>
 <head>
    <style type="text/css">
     .error{
     	color: red;
     }
    </style>

    <script type="text/javascript" src="jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="jquery.validate.min.js"></script>

    <script type="text/javascript">
       $(document).ready(function(){
          $("#formMahasiswa").validate();
       });
    </script>
 </head>
 <body>
  <form id="formMahasiswa" method="post" action="save.php">	
 	<table>
         <tr>
       	  <td>Nama</td>
       	  <td><input type="text" name="nama" id="nama" class="required" title="Nama Harus Diisi"/></td>
       	  <td><label for="nama" class="error"></label></td>
         </tr>
         <tr>
       	  <td>Nim</td>
       	  <td><input type="text" name="nim" id="nim" class="required" title="Nim Harus Diisi" /></td>
       	  <td><label for="nim" class="error"></label></td>
         </tr>
         <tr>
       	  <td>Alamat</td>
       	  <td><input type="text" name="alamat" id="alamat" class="required" title="Alamat Harus Diisi" /></td>
       	  <td><label for="alamat" class="error"></label></td>
         </tr>
         <tr>
       	  <td>Agama</td>
       	  <td><input type="text" name="agama" id="agama" class="required" title="Agama Harus Diisi" /></td>
       	  <td><label for="agama" class="error"></label></td>
         </tr>
         <tr>
       	  <td>Jenis Kelamin</td>
       	  <td><input type="radio" name="jenis_kelamin" id="jenis_kelamin" value="Laki-Laki" class="required" title="Jenis Kelamin Harus Diisi" />Laki-Laki
              <input type="radio" name="jenis_kelamin" id="jenis_kelamin" value="Perempuan" class="required" title="Jenis Kelamin Harus Diisi" />Perempuan
       	  </td>
       	  <td><label for="jenis_kelamin" class="error" ></label></td>
         </tr>
         <tr>
         	<td></td>
         	<td><input type="submit" value="Submit"/></td>
         </tr>
 	</table>
   </form>
 </body>
</html>