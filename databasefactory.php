<?php

class databaseFactory {
	protected $dbAccess;

	function __construct() {
		$dbuser = "root";
		$dbpass = "";
		$db = "logo";
		$dburl = "localhost";

		try {
			$this->dbAccess = new PDO('mysql:host=' . $dburl . ';dbname=' . $db, $dbuser, $dbpass);
			$this->dbAccess->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch(PDOException $e) {
			echo "An error has occured when trying to connect to the database.";
		}
	}

	protected function insertNewUser($deviceid, $hex, $ip) {
		$query = $this->dbAccess->prepare("INSERT INTO accounts (deviceid, hex, num_logins, create_date, last_ip) VALUES (:deviceid, :hex, 0, NOW(), :ip)");
		$query->execute(array(
			':deviceid' => $deviceid,
			':hex' => $hex,
			':ip' => $ip,
		));

		return $query;
	}
}