<?php
include_once ('dbconfig.php');

class admin extends dbConfig{
	public function __construct(){
		parent::__construct();
		session_start();
	}

	public function login($username,$password){
		try{
			$query = "SELECT * FROM admin where username = :username";
			$data = array(':username' => $username);
			$result = $this->connection->prepare($query);
			$result->execute($data);
			$data = $result->fetch(PDO::FETCH_ASSOC);

			if ($result->rowCount() > 0) {
				if (password_verify($password,$data['password'])) {
					$_SESSION['idadmin'] = $data['id'];
					$_SESSION['usernameadmin'] = $data['username'];
					return true;
				}
				else{
					$this->error = "Password yang anda masukan tidak cocok";
					return false;
				}
			}
			else{
				$this->error = "Username tidak dikenal :(";
				return false;

			}
		}
		catch (PDOException $e){
			die("Koneksi error: " . $e->getMessage());
		}
		
	}

	public function cekLogin(){
		if (isset($_SESSION['idadmin'])) {
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

class dashboard extends dbConfig{
	public function __construct() {
		parent::__construct();
	}
	public function tampildata($table){
		try{
			$query = "SELECT * FROM $table";
			$result = $this->connection->query($query);
			$rows = array();

			while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
				$rows[] = $row;
			}
			return $rows;
		}	
		catch (PDOException $e){
			die("Koneksi error: " . $e->getMessage());
		}
	}
	public function tampildataedit($table,$id){
		try{
			$query = "SELECT * FROM $table where id = :id";
			$result = $this->connection->prepare($query);
			$data = array(':id' => $id);
			$result->execute($data);
			$rows = array();

			while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
				$rows[] = $row;
			}
			return $rows;
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

	public function totalsiswa(){
		try{
			$query = "SELECT * FROM siswa";
			$result = $this->connection->prepare($query);
			$result->execute();
			$hasil = $result->rowCount();
			return $hasil;
		}
		catch (PDOException $e){
			die("Koneksi error: " . $e->getMessage());
		}
	}
}

class actionadmin extends dashboard{
	public function __construct() {
		parent::__construct();
	}
	public function add($data){
		try{
			$query = "INSERT INTO admin VALUES('', :username, :password)";
			$result = $this->connection->prepare($query);
			$result->execute($data);
		}
		catch (PDOException $e){
			die("Koneksi error: " . $e->getMessage());
		}
		return true;
	}

	public function update($data){
		try{
			$query = "UPDATE admin set username = :username, password = :password where id = :id";
			$result = $this->connection->prepare($query);
			$result->execute($data);
		}
		catch (PDOException $e){
			die("Koneksi error: " . $e->getMessage());
		}
		return true;
	}

	public function delete($data){
		try{
			$query = "DELETE FROM admin where id = :id";
			$result = $this->connection->prepare($query);
			$result->execute($data);

		}
		catch (PDOException $e){
			die("Koneksi error: " . $e->getMessage());
		}
		return true;
	}
}

class actionsiswa extends dashboard{
	public function __construct() {
		parent::__construct();
	}
	public function add($data){
		try{
			$query = "INSERT INTO siswa VALUES('', :nis, :nama, :kelas, :jurusan, :password)";
			$result = $this->connection->prepare($query);
			$result->execute($data);
		}
		catch (PDOException $e){
			die("Koneksi error: " . $e->getMessage());
		}
		return true;
	}

	public function update($data){
		try{
			$query = "UPDATE siswa set nis = :nis, nama = :nama, kelas = :kelas, jurusan = :jurusan, password = :password where id = :id";
			$result = $this->connection->prepare($query);
			$result->execute($data);
		}
		catch (PDOException $e){
			die("Koneksi error: " . $e->getMessage());
		}
		return true;
	}

	public function delete($data){
		try{
			$query = "DELETE FROM siswa where id = :id";
			$result = $this->connection->prepare($query);
			$result->execute($data);

		}
		catch (PDOException $e){
			die("Koneksi error: " . $e->getMessage());
		}
		return true;
	}
}

class actionkanidat extends dashboard{
	public function __construct() {
		parent::__construct();
	}
	public function add($data){
		try{
			$query = "INSERT INTO kanidat VALUES('', :nis, :nama, :kelas, :jurusan, :imgpath, :visi, :misi)";
			$result = $this->connection->prepare($query);
			$result->execute($data);
		}
		catch (PDOException $e){
			die("Koneksi error: " . $e->getMessage());
		}
		return true;
	}

	public function update($data){
		try{
			$query = "UPDATE kanidat set nis = :nis, nama = :nama, kelas = :kelas, jurusan = :jurusan, imgpath = :imgpath, visi = :visi, misi = :misi where id = :id";
			$result = $this->connection->prepare($query);
			$result->execute($data);
		}
		catch (PDOException $e){
			die("Koneksi error: " . $e->getMessage());
		}
		return true;
	}

	public function delete($data){
		try{
			$query = "DELETE FROM kanidat where id = :id";
			$result = $this->connection->prepare($query);
			$result->execute($data);

		}
		catch (PDOException $e){
			die("Koneksi error: " . $e->getMessage());
		}
		return true;
	}
}

class getname extends dashboard{
	public function siswa($id){
		try{
			$query = "SELECT * FROM siswa WHERE id = $id";
			$result = $this->connection->prepare($query);
			$result->execute();
			while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
				$nama = $row['nama'];
			}
			return $nama;
		}
		catch (PDOException $e){
			die("Koneksi error: " . $e->getMessage());
		}
	}
	public function kanidat($id){
		try{
			$query = "SELECT * FROM kanidat WHERE id = $id";
			$result = $this->connection->prepare($query);
			$result->execute();
			while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
				$nama = $row['nama'];
			}
			return $nama;
		}
		catch (PDOException $e){
			die("Koneksi error: " . $e->getMessage());
		}
	}
}

$admin = new admin();
$dashboard = new dashboard();
$actionadmin = new actionadmin();
$actionsiswa = new actionsiswa();
$actionkanidat = new actionkanidat();
$getname = new getname();
?>