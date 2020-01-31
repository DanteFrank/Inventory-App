<?php

/*

*/

class Database  
{
	private $conn;

	public function connect() {
		include_once("constants.php");
		$this->conn = new Mysqli(HOST, USER, PASS, DB);

		if ($this->conn) {
			return $this->conn;
		} else {
			return "DATABASE_CONNECTION_FAILED";
		}

	}

}

//$db = new Database();
//$db->connect();

?>