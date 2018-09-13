<?php

class Connect
{ 
	public $host ="localhost";
	public $username ="root";
	public $pass ="";
	public $db ="onlineexam";
	public $conn;

	
	function __construct()
	{
		$this->conn = new mysqli($this->host,$this->username,$this->pass,$this->db);
		if($this->conn->connect_error)
	{
		echo "error".$this->conn->connect_error;
	}
	
	}
	
}

//
?>