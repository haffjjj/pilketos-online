<?php
require_once("lib/class.php");
if (!($pilketos->cekLogin())) {
	header("location: index.php");	
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Pemilihan Ketua OSIS Online</title>
</head>
<body>
<p>Id : <?php echo $_SESSION['id']; ?></p>
<p>NIS : <?php echo $_SESSION['nis']; ?></p>
<p>Nama : <?php echo $_SESSION['nama']; ?></p>
<p>Kelas : <?php echo $_SESSION['kelas']; ?></p>
<p>Jurusan : <?php echo $_SESSION['jurusan']; ?></p>
<br>
<p><a href="logout.php">Logout</a>
</body>
</html>