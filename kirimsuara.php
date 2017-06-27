<?php
if (isset($_POST['id'])) {
	$id = $_POST['id'];
	require_once('lib/user.php');
	if ($pemilihan->masukanSuara($id)) {
		echo "Suara berhasil dikirim";
		echo "<p><a href='logout.php'>Logout</a>";
	}
}
else{
	echo "ACCESS FORBINDEN";
}
?>