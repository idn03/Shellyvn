<?php

namespace Config\db;

use PDO;
use PDOException;

class PDOFactory {
	static public function connect(): PDO {
		$host = "localhost";
		$dbname = "shelly";
		$user = "root";
		$password = "";

		$dsn = "mysql:host=$host;port=3306;dbname=$dbname;charset=utf8";
		try {
			return new PDO($dsn, $user, $password);
		}
		catch(PDOException $e) {
			echo $e->getMessage();
		}
	}
}