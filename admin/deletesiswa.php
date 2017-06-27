<?php
require_once ('lib/admin.php');
if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$data = array(':id' => $id);
	$result = $actionsiswa->delete($data);
	if ($result) {
		echo "Data Berhasil di DELETE";
		echo "<br>Kembali ke <a href='admin.php'>dashboard</a>";
		die;
	}
	else{
		echo "Data gagal di DELETE";
	}
}
header('location: admin.php');
?>