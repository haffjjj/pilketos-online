<?php
require_once ("lib/admin.php");

if (isset($_POST['username'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];
	$password = password_hash($password,PASSWORD_DEFAULT);
	$data = array(':username' => $username, ':password'=> $password);
	$result = $actionadmin->add($data);
	if ($result) {
		echo "Data Berhasil di ADD";
		echo "<br>Kembali ke <a href='admin.php'>dashboard</a>";
		die;
	}
	else{
		echo "Data gagal di ADD";
	}
	
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit Admin</title>
</head>
<body>
	<form method="POST" action="">
		<input type="hidden" name="id" value=""
		<p>Username</p>
		<input type="text" name="username" value="">
		<p>Password</p>
		<input type="text" name="password" value="">
		<input type="submit" value="Insert">
	</form>
</body>
</html>