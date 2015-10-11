<?php
class Connection{
	
	private $hostname = "localhost";
	private $database = "temperature_readings";
	private $port = 3306;
	private $username = "root";
	private $password = "changeme";
	private $db;
	
	/*
	public function getParams(){
		$params = array ($this->hostname, $this->database, $this->port, $this->username, $this->password);
		return $params;
	}*/
	
	public function getDBConnection(){
		try{
			$dsn = "mysql:host=".$this->hostname.";dbname=".$this->database;
			$this->db = new PDO($dsn, $this->username, $this->password);
		} catch (PDOException $e){
			echo "<pre>";
			echo "Could not connect <br>".$e->getMessage();
		}
		return $this->db;
	}
}
?>
