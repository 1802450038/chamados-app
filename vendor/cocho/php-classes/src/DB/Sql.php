<?php 

namespace cocho\DB;

use PDO;

class Sql {

	const HOSTNAME = "www.gabrielbellagamba.com";
	const USERNAME = "gabr6180_tecnico";
	const PASSWORD = "info020";
	const DBNAME = "gabr6180_pref";
	// const HOSTNAME = "localhost";
	// const USERNAME = "root";
	// const PASSWORD = "";
	// const DBNAME = "gabr6180_pref";

	private $conn;

	public function __construct()
	{

		$this->conn = new \PDO(
			"mysql:dbname=".Sql::DBNAME.";host=".Sql::HOSTNAME, 
			Sql::USERNAME,
			Sql::PASSWORD
		);

		$this->conn->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);

	}

	private function setParams($statement, $parameters = array())
	{

		foreach ($parameters as $key => $value) {
			
			$this->bindParam($statement, $key, $value);
			
		}
	}

	private function bindParam($statement, $key, $value)
	{

		$statement->bindParam($key, $value);

	}

	public function query($rawQuery, $params = array())
	{

		$stmt = $this->conn->prepare($rawQuery);
		// $this->setParams($stmt, $params);

		if (!$stmt) {
			echo "\nPDO::errorInfo():\n";
			print_r($this->conn->errorInfo());
		} else {
			echo "good";

			$stmt->execute();
			return $this->conn->lastInsertId("returned_id");
		}
	}

	public function select($rawQuery, $params = array()):array
	{

		$stmt = $this->conn->prepare($rawQuery);
		// $this->setParams($stmt, $params);

		if (!$stmt) {
			echo "\nPDO::errorInfo():\n";
			print_r($this->conn->errorInfo());
		} else {
			$stmt->execute();
		}


		return $stmt->fetchAll(\PDO::FETCH_ASSOC);
	}

}

 ?>