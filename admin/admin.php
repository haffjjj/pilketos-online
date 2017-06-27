<?php
require_once("lib/admin.php");

if (!($admin->cekLogin())) {
	header("location: index.php");	
}

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<center>
<h3>Admin Page</h3>
<hr>
<p><a href="logout.php">Logout</a>
<?php
echo "<h4>Data Admin</h4> <a href='addadmin.php'>Buat</a>";
echo "<table border='1'><tr><th>ID</><th>Username</th><th>Password</th><th>Action</th></tr>";
foreach ($dashboard->tampildata('admin') as $rows) {
	echo "<tr><td>".$rows['id']."</td><td>".$rows['username']."</td><td>".$rows['password']."</td><td><a href='editadmin.php?id=".$rows['id']."'>Edit</a> <a href='deleteadmin.php?id=".$rows['id']."'>Delete</a></td></tr>";
}

echo "</table>";
echo "<br>";
echo "<hr>";
echo "<h4>Data Siswa</h4>  <a href='addsiswa.php'>Buat</a>";
echo "<table border='1'><tr><th>ID</><th>NIS</th><th>Nama</th><th>Kelas</th><th>Jurusan</th><th>Password</th><th>Action</th></tr>";
foreach ($dashboard->tampildata('siswa') as $rows) {
	echo "<tr><td>".$rows['id']."</td><td>".$rows['nis']."</td><td>".$rows['nama']."</td><td>".$rows['kelas']."</td><td>".$rows['jurusan']."</td><td>".$rows['password']."</td><td><a href='editsiswa.php?id=".$rows['id']."'>Edit</a> <a href='deletesiswa.php?id=".$rows['id']."'>Delete</a></td></tr>";
}
echo "</table>";
echo "<br>";
echo "<hr>";
echo "<h4>Data Kanidat</h4>  <a href='addkanidat.php'>Buat</a>";
echo "<table border='1'><tr><th>ID</><th>Nama</th><th>Kelas</th><th>Jurusan</th><th>Imgpath</th><th>Visi</th><th>Misi</th><th>Action</th></tr>";
foreach ($dashboard->tampildata('kanidat') as $rows) {
	echo "<tr><td>".$rows['id']."</td><td>".$rows['nama']."</td><td>".$rows['kelas']."</td><td>".$rows['jurusan']."</td><td>".$rows['imgpath']."</td><td>".$rows['visi']."</td><td>".$rows['misi']."</td><td><a href='editkanidat.php?id=".$rows['id']."'>Edit</a> <a href='deletekanidat.php?id=".$rows['id']."'>Delete</a></td></tr>";
}
echo "</table>";
echo "<br>";
echo "<hr>";
echo "<h4>Data Pemilihan</h4>";
echo "<table border='1'><tr><th>ID</><th>Siswa</th><th>Kanidat</th><th>Date Time</th></tr>";
foreach ($dashboard->tampildata('pemilihan') as $rows) {
	echo "<tr><td>".$rows['id']."</td><td>".$getname->siswa($rows['idsiswa'])."</td><td>".$getname->kanidat($rows['idkanidat'])."</td><td>".$rows['datetime']."</td></tr>";
}

echo "</table>";
echo "<br>";
echo "<hr>";

echo "<h4>Hasil Pemilihan</h4>";
$hasil1 = $dashboard->hasil(1);
$hasil2 = $dashboard->hasil(2);
$hasil3 = $dashboard->hasil(3);
$totalsuara = $hasil1+$hasil2+$hasil3;
$persen1 = $hasil1/$totalsuara*100;
$persen2 = $hasil2/$totalsuara*100;
$persen3 = $hasil3/$totalsuara*100;

$totalsiswa = $dashboard->totalsiswa();

echo $getname->kanidat(1)." : ".$hasil1." (".$persen1."%)"."<br>";
echo $getname->kanidat(2)." : ".$hasil2." (".$persen2."%)"."<br>";
echo $getname->kanidat(3)." : ".$hasil3." (".$persen3."%)"."<br><br>";
echo "Total Suara Masuk = ".$totalsuara."<br>";
echo "Total Pemilih = ".$totalsiswa;
?>
</center>
</body>
</html>