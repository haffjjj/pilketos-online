<?php
require_once("lib/admin.php");
if ($admin->cekLogin()) {
	header("location: admin.php");	
}
$error = "";
if (isset($_POST['username']) && isset($_POST['password'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];
	$login = $admin->login($username,$password);
	if ($login) {
		header("location: admin.php");
	}
	else{
		$error = $admin->error();
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Page</title>
</head>
<body>
<center>
<h3>Admin Page</h3>
<form action="" method="POST">
	<p>Masukan Username</p>
	<input type="text" name="username"></input>
	<p>Masukan Password</p>
	<input type="text" name="password"></input>
	<br>
	<input type="submit" value="Login">
</form>
<br>
<?php
echo $error;
?>
</center>
</body>
</html>