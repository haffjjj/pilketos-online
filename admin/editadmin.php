<?php
require_once ('lib/admin.php');

if (isset($_POST['username'])) {
	$id = $_POST['id'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$password = password_hash($password,PASSWORD_DEFAULT);
	$data = array(':username' => $username,
		':password' => $password,
		':id' => $id);
	$update = $actionadmin->update($data);
	if ($update) {
		echo "Data Berhasil di UPDATE";
		echo "<br>Kembali ke <a href='admin.php'>dashboard</a>";
		die;
	}
	else{
		echo "Data Gagal di update";
	}
}

if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$rows = $dashboard->tampildataedit('admin',$id);
	foreach ($rows as $value) {
		$username = $value['username'];
		$password = $value['password'];
	}
}
else{
	header('location:admin.php');
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit Admin</title>
</head>
<body>
	<form method="POST" action="">
		<input type="hidden" name="id" value="<?php echo $id ?>"
		<p>Username</p>
		<input type="text" name="username" value="<?php echo $username ?>">
		<p>Password</p>
		<input type="text" name="password" value="<?php echo $password ?>">
		<input type="submit" value="Update">
	</form>
</body>
</html>