<?php
error_reporting(0);
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html" />
	<meta name="author" content="lolkittens" />

	<title>Untitled 1</title>
</head>

<body>

<h2>Login</h2>
<?php
if($_GET['action']=='gagal'){
    echo "<b>Login gagal gan...!!!!!!</b>";
}
?>
<form method="post" action="login_check.php">
<table width="200" border="0">
  <tr>
    <td>Username</td>
    <td>:</td>
    <td>
        <input type="text" name="frm_username" />
    </td>
  </tr>
  <tr>
    <td>Password</td>
    <td>:</td>
    <td>
        <input type="password" name="frm_password" />
    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>
      <label>
        <input type="submit" name="Submit" value="Login" />
        </label>
   
    </td>
  </tr>
</table>
 </form>

</body>
</html>