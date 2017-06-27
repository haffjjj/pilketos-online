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
?>