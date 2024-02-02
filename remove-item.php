<?php
	session_start();
	if (!empty($_SESSION['username'])) {
		require 'model/config/db_config.php';
		$id = $_GET['id'];
		try {
			$mysqlClient = new PDO("mysql:host={$db_config['host']};dbname={$db_config['database']};charset=utf8", "{$db_config['user']}", "{$db_config['password']}");
		} catch (Exception $e) {
			die('Erreur : ' . $e->getMessage());
			// Mettre page d'erreur
		};

		$sqlQuery = "DELETE FROM stock WHERE id = :id";
		$statement = $mysqlClient->prepare($sqlQuery);
		$statement->bindParam(':id', $id, PDO::PARAM_STR);
		$statement->execute();
		header('Location: index.php?p=home&cat=freezer');
	}
?>