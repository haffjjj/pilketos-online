<?php
require_once("lib/class.php");
if (!($pilketos->cekLogin())) {
	header("location: index.php");	
}
if ($pemilihan->cekpemilih()) {
	echo "Maaf anda sudah memilih";
	echo "<p><a href='logout.php'>Logout</a>";
	die;
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Pemilihan Ketua OSIS Online</title>
</head>
<body>
	<form action="kirimsuara.php" method="POST">
		<?php
		$rowKanidat1 = $pemilihan->kanidat(1);
		echo "<p>NIS : ".$rowKanidat1['nis']."</p>";
		echo "<p>Nama : ".$rowKanidat1['nama']."</p>";
		echo "<p>Kelas : ".$rowKanidat1['kelas']."</p>";
		echo "<p>Jurusan : ".$rowKanidat1['jurusan']."</p>";
		// echo "<p>Imgpath : ".$rowKanidat1['imgpath']."</p>";
		// echo "<p>Visi : ".$rowKanidat1['visi']."</p>";
		// echo "<p>Misi : ".$rowKanidat1['misi']."</p>";
		echo "pilih <input type='radio' name='kanidat' value='1'>";
		echo "<hr>";

		$rowKanidat2 = $pemilihan->kanidat(2);
		echo "<p>NIS : ".$rowKanidat2['nis']."</p>";
		echo "<p>Nama : ".$rowKanidat2['nama']."</p>";
		echo "<p>Kelas : ".$rowKanidat2['kelas']."</p>";
		echo "<p>Jurusan : ".$rowKanidat2['jurusan']."</p>";
		// echo "<p>Imgpath : ".$rowKanidat2['imgpath']."</p>";
		// echo "<p>Visi : ".$rowKanidat2['visi']."</p>";
		// echo "<p>Misi : ".$rowKanidat2['misi']."</p>";
		echo "pilih <input type='radio' name='kanidat' value='2'>";
		echo "<hr>";

		$rowKanidat3 = $pemilihan->kanidat(3);
		echo "<p>NIS : ".$rowKanidat3['nis']."</p>";
		echo "<p>Nama : ".$rowKanidat3['nama']."</p>";
		echo "<p>Kelas : ".$rowKanidat3['kelas']."</p>";
		echo "<p>Jurusan : ".$rowKanidat3['jurusan']."</p>";
		// echo "<p>Imgpath : ".$rowKanidat3['imgpath']."</p>";
		// echo "<p>Visi : ".$rowKanidat3['visi']."</p>";
		// echo "<p>Misi : ".$rowKanidat3['misi']."</p>";
		echo "pilih <input type='radio' name='kanidat' value='3'>";
		echo "<hr>";
		?>
		<input type="submit" value="Kirim Suara">
		<small>*suara tidak bisa diganti bila sudah terkirim, bijaklah dalam memilih!</small>
	</form>
	<p><a href="logout.php">Logout</a>
	</body>
	</html>