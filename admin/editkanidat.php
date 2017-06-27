<?php
require_once ('lib/admin.php');

if (isset($_POST['id'])) {
	$id = $_POST['id'];
	$nis = $_POST['nis'];
	$nama = $_POST['nama'];
	$kelas = $_POST['kelas'];
	$jurusan = $_POST['jurusan'];
	$imgpath = $_POST['imgpath'];
	$visi = $_POST['visi'];
	$misi = $_POST['misi'];

	$data = array(
		':nis' => $nis,
		':nama'=> $nama,
		':kelas' => $kelas,
		':jurusan'=> $jurusan,
		':imgpath'=> $imgpath,
		':visi' => $visi,
		':misi' => $misi,
		':id' => $id
		);

	// var_dump($data);
	$result = $actionkanidat->update($data);

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
	$rows = $dashboard->tampildataedit('kanidat',$id);
	foreach ($rows as $value) {
		$nis = $value['nis'];
		$nama = $value['nama'];
		$kelas = $value['kelas'];
		$jurusan = $value['jurusan'];
		$imgpath = $value['imgpath'];
		$visi = $value['visi'];
		$misi = $value['misi'];
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
		<p>Imgpath</p>
		<input type="text" name="imgpath" value="<?php echo $imgpath ?>">
		<p>Visi</p>
		<textarea name="visi" rows="8" cols="50"><?php echo $visi ?></textarea>
		<p>Misi</p>
		<textarea name="misi" rows="8" cols="50"><?php echo $misi ?></textarea><br>
		<input type="submit" value="Update">
	</form>
</body>
</html>