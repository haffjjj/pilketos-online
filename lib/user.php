<?php
require_once ("dbConfig.php");

class user extends dbConfig{
	public function __construct(){
		parent::__construct();
		session_start();
	}

	public function login($nis,$password){
		try{
			$query = "SELECT * FROM siswa where nis = :nis";
			$data = array(':nis' => $nis);
			$result = $this->connection->prepare($query);
			$result->execute($data);
			$data = $result->fetch(PDO::FETCH_ASSOC);

			if ($result->rowCount() > 0) {
				if (password_verify($password,$data['password'])) {
					$_SESSION['idsiswa'] = $data['id'];
					$_SESSION['nis'] = $data['nis'];
					$_SESSION['nama'] = $data['nama'];
					$_SESSION['kelas'] = $data['kelas'];
					$_SESSION['jurusan'] = $data['jurusan'];

					return true;
				}
				else{
					$this->error = "Password yang anda masukan tidak cocok";
					return false;
				}
			}
			else{
				$this->error = "NIS yang anda masukan tidak terdaftar, silahkan hubungi panitia";
				return false;

			}
		}
		catch (PDOException $e){
			die("Koneksi error: " . $e->getMessage());
		}
		
	}

	public function cekLogin(){
		if (isset($_SESSION['idsiswa'])) {
			return true;
		}
	}

	public function logout(){
		session_destroy();
		session_unset();
		return true;
	}

	public function error()
	{
		return $this->error;
	}
}

class pemilihan extends dbConfig{
	public function __construct(){
		parent::__construct();
	}
	public function cekpemilih(){
		try{
			$idsiswa = $_SESSION['idsiswa'];
			$query = "SELECT * FROM pemilihan where idsiswa = :idsiswa";
			$data = array(':idsiswa' => $idsiswa);
			$result = $this->connection->prepare($query);
			$result->execute($data);
			if ($result->rowCount() > 0) {
				return true;
			}
		}
		catch (PDOException $e){
			die("Koneksi error: " . $e->getMessage());
		}
	}

	public function kanidat($id){
		try{
			$query = "SELECT * FROM kanidat where id = :id";
			$result = $this->connection->prepare($query);
			$data = array(':id' => $id);
			$result->execute($data);
			$row = $result->fetch(PDO::FETCH_ASSOC);
			return $row;
		}
		catch (PDOException $e){
			die("Koneksi error: " . $e->getMessage());
		}
	}

	public function masukanSuara($id){
		try{
			$idsiswa = $_SESSION['idsiswa'];
			$datetime = date("Y-m-d H:i:s");
			$query = "INSERT INTO pemilihan VALUES('',:idsiswa,:idkanidat,:dtime)";
			$result = $this->connection->prepare($query);
			$data = array(":idsiswa" => $idsiswa,":idkanidat" =>$id,":dtime" =>$datetime);
			$result->execute($data);
			return true;
		}
		catch (PDOException $e){
			die("Koneksi error: " . $e->getMessage());
		}
	}

	public function hasil($id){
		try{
			$query = "SELECT * FROM pemilihan where idkanidat = :id";
			$data = array(':id' => $id);
			$result = $this->connection->prepare($query);
			$result->execute($data);
			$hasil = $result->rowCount();
			return $hasil;
		}
		catch (PDOException $e){
			die("Koneksi error: " . $e->getMessage());
		}
	}
}
$user = new user();
$pemilihan = new pemilihan();
?>