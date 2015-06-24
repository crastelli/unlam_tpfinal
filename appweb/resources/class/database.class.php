<?php
Abstract Class Database
{
	private $host;
	private $user;
	private $pw;
	private $db;

	function Database()
	{
		$this->host = "localhost";
		$this->user = "root";
		// $this->pw 	= ""; 
		$this->pw 	= "1234"; 
		$this->db 	= "db_milugar";
	}

	private function connectMySQL()
	{
		$mysqli = @new mysqli($this->host, $this->user, $this->pw, $this->db);
		if ($mysqli->connect_errno){
		  die('Connect Error: ' . $mysqli->connect_errno);
		}
		$mysqli->set_charset("utf8");
		return $mysqli;
	}

	function query($qry)
	{
		$mysqli = $this->connectMySQL();
		$query = $mysqli->query($qry);
		$arr = Array();
		if($query){
			while ($result = $query->fetch_object()) {
				$arr[] = $result;
			}
			$query->free();
		}
		$mysqli->close();
		return $arr;
	}

	function queryOne($qry)
	{
		$mysqli = $this->connectMySQL();
		$query = $mysqli->query($qry);
		$arr = Array();
		if($query){
			$result = $query->fetch_object();
			$arr = $result;
			$query->free();
		}
		$mysqli->close();
		return $arr;
	}

	/*
	*	$accion:
	*			1. insert
	*			2. update
	*			3. delete
	*/
	function execute($qry, $accion)
	{
		$mysqli = $this->connectMySQL();
		$mysqli->query($qry);
		$err = false;
		if($mysqli->connect_errno) $err = true;

		switch ($accion) {
			case 'insert': return ($err)? 0 : $mysqli->insert_id; break;
			case 'update': return !$err; break;
			case 'delete': return !$err; break;
			default 	 : break;
		}
		$mysqli->close();
	}
}
