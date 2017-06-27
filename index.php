<?php
require_once("lib/user.php");
if ($user->cekLogin()) {
	header("location: pemilihan.php");	
}
$error = "";
if (isset($_POST['nis']) && isset($_POST['password'])) {
	$nis = $_POST['nis'];
	$password = $_POST['password'];
	$login = $user->login($nis,$password);
	if ($login) {
		header("location: pemilihan.php");
	}
	else{
		$error = $user->error();
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Pemilihan Ketua OSIS Online</title>
</head>
<body>
<center>
<h3>Pemilihan Ketua OSIS Online 2018</h3>
<form action="" method="POST">
	<p>Masukan NIS</p>
	<input type="text" name="nis"></input>
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