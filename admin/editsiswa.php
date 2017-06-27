<?php
require_once ('lib/admin.php');

if (isset($_POST['id'])) {
	$id = $_POST['id'];
	$nis = $_POST['nis'];
	$nama = $_POST['nama'];
	$kelas = $_POST['kelas'];
	$jurusan = $_POST['jurusan'];
	$password = $_POST['password'];
	$password = password_hash($password,PASSWORD_DEFAULT);
	$data = array(
		':nis' => $nis,
		':nama'=> $nama,
		':kelas' => $kelas,
		':jurusan'=> $jurusan,
		':password'=> $password,
		':id' => $id
		);

	// var_dump($data);
	$result = $actionsiswa->update($data);

	if ($result) {
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
	$rows = $dashboard->tampildataedit('siswa',$id);
	foreach ($rows as $value) {
		$nis = $value['nis'];
		$nama = $value['nama'];
		$kelas = $value['kelas'];
		$jurusan = $value['jurusan'];
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
	<title>Edit Siswa</title>
</head>
<body>
	<form method="POST" action="">
		<input type="hidden" name="id" value="<?php echo $id ?>">
		<p>NIS</p>
		<input type="text" name="nis" value="<?php echo $nis ?>">
		<p>Nama</p>
		<input type="text" name="nama" value="<?php echo $nama ?>">
		<p>Kelas</p>
		<input type="text" name="kelas" value="<?php echo $kelas ?>">
		<p>Jurusan</p>
		<input type="text" name="jurusan" value="<?php echo $jurusan ?>">
		<p>Password</p>
		<input type="text" name="password" value="<?php echo $password ?>">
		<input type="submit" value="Update">
	</form>
</body>
</html>