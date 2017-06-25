<?php
if (isset($_POST['kanidat'])) {
	$kanidat = $_POST['kanidat'];
	require_once('lib/class.php');
	if ($pemilihan->masukanSuara($kanidat)) {
		echo "Suara berhasil dikirim";
		echo "<p><a href='logout.php'>Logout</a>";
	}
}
else{
	echo "ACCESS FORBINDEN";
}
?>