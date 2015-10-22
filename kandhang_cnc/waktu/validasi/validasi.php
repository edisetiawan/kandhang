<html>
<head>
<title>JQuery Form Validation</title>
<!--<link rel="stylesheet" href="val.css" type="text/css" />-->
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript" src="jquery.validate.js"></script>
<script type="text/javascript">
$(document).ready(function() {
$("#form1").validate({
	rules:{	nama:"required",
			umur:{required:true,number: true},		
			username:"required",
			password:{required: true,minlength:5},		
		    cpassword:{required: true,equalTo: "#password"},
			email:{required:true,email:true},
			website:{required:true,url:true}
		  },
	messages:{ 
		    nama:{required:'Nama harus di isi'},
			umur:{
			    required:'Umur harus di isi',
			    number  :'Hanya boleh di isi Angka'},
			username: {
			    required:'Username harus di isi'},
		    password: {
			    required :'Password harus di isi',
			    minlength:'Password minimal 5 karakter'},
		    cpassword: {
			    required:'Ulangi Password harus di isi',
			    equalTo :'Isinya harus sama dengan Password'},
		    email: {
			    required:'Email harus di isi',
			    email   :'Email harus valid'},
		    website: {
			    required:'Website harus di isi',
			    url     :'Alamat website harus valid'}
			},
     success: function(label) {
        label.text('OK!').addClass('valid');}
	});
});
</script>
</head>
<body>
<div class="form-div">
<form id="form1" method="post" action="save.php">
	<div class="form-row">
    <span class="label">Nama *</span>
    <input name="nama" type="text">
  	</div>
	<div class="form-row">
	<span class="label">Umur *</span>
	<input name="umur" id="umur" type="text">
	</div>
	<div class="form-row">
	<span class="label">Username *</span>
	<input name="username" id="username" type="text">
	</div>
	<div class="form-row">
	<span class="label">Password *</span>
	<input name="password" id="password" type="password">
	</div> 		
	<div class="form-row">
	<span class="label">Ulangi Password *</span>
	<input name="cpassword" id="cpassword" type="password">
	</div>
	<div class="form-row">
	<span class="label">E-Mail *</span>
	<input name="email" id="email" type="text">
	</div>
	<div class="form-row">
	<span class="label">Website *</span>
	<input name="website" id="website" type="text">
	</div>
	<div class="form-row">
	<input class="submit" value="Proses" type="submit">
	</div>
</form>
</div>
</body>
</html>