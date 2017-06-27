<?php
require_once("lib/user.php");

$urut1 =  $pemilihan->hasil(1);
$urut2 =  $pemilihan->hasil(2);
$urut3 =  $pemilihan->hasil(3);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Hasil Penghitungan Suara</title>
</head>
<body>
	<p>Nomor Urut 1 : <?php echo $urut1 ?></p>
	<p>Nomor Urut 2 : <?php echo $urut2 ?></p>
	<p>Nomor Urut 3 : <?php echo $urut3 ?></p>
</body>
</html>