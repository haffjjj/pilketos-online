<?php
class dbConfig
{
	private $dbDriver = "mysql";
	private $host = "localhost";
	private $username = "root";
	private $password = "";
	private $database = "db_pilketos";

	protected $connection;
	protected $error;

	public function __construct(){
		try{
			$this->connection = new PDO($this->dbDriver.':host='.$this->host.';dbname='.$this->database,$this->username,$this->password);
			$this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
		catch (PDOException $e){
			die("Koneksi error: " . $e->getMessage());
		}
	}
}

class pilketos extends dbConfig{
	public function __construct(){
		parent::__construct();
		session_start();
	}

	public function login($nis,$password){
		try{
			$query = "SELECT * FROM siswa where nis = :nis";
			$bindparam = array(':nis' => $nis);
			$result = $this->connection->prepare($query);
			$result->execute($bindparam);
			$data = $result->fetch();

			if ($result->rowCount() > 0) {
				if (password_verify($password,$data['password'])) {
					$_SESSION['id'] = $data['idsiswa'];
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
		if (isset($_SESSION['id'])) {
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

$pilketos = new pilketos();
?>