<?php
require_once ("lib/admin.php");

if (isset($_POST['nis'])) {
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
				  ':misi' => $misi
				 );
	// var_dump($data);
	$result = $actionkanidat->add($data);
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
	<title>Add Siswa</title>
</head>
<body>
	<form method="POST" action="">
		<input type="hidden" name="id" value="">
		<p>NIS</p>
		<input type="text" name="nis" value="">
		<p>Nama</p>
		<input type="text" name="nama" value="">
		<p>Kelas</p>
		<select name="kelas">
			<option value="10">10</option>
			<option value="11">11</option>
			<option value="12">12</option>
		</select>
		<p>Jurusan</p>
		<select name="jurusan">
			<option value="RPL">RPL</option>
			<option value="TKJ">TKJ</option>
			<option value="TJA">TJA</option>
		</select>
		<p>Imgpath</p>
		<input type="text" name="imgpath" value="">
		<p>Visi</p>
		<textarea name="visi" rows="8" cols="50"></textarea>
		<p>Misi</p>
		<textarea name="misi" rows="8" cols="50"></textarea><br>
		<input type="submit" value="Insert">
	</form>
</body>
</html>