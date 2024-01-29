<?php

class Database {
	public function get(string $query) {
		$conn = $this->connect_database();
		$get = $conn->prepare($query);
		$get->execute();
		$result = $get->fetchAll();
		$conn = null;

		return $result;
	}

	public function insert(string $query) {
		$conn = $this->connect_database();
		$insert = $conn->prepare($query);
		$insert->execute();
	}

	private function connect_database() {
		require 'model/config/db_config.php';

		try {
			$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
			return $conn;
		} catch (PDOException $e) {
			echo "Une erreur est survenue : " . $e->getMessage();
			return false;
		}
	}
}
