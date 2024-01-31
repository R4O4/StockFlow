<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'model/config/db_config.php';

try {
	$mysqlClient = new PDO("mysql:host={$db_config['host']};dbname={$db_config['database']};charset=utf8", "{$db_config['user']}", "{$db_config['password']}");
} catch (Exception $e) {
	die('Erreur : ' . $e->getMessage());
	// Mettre page d'erreur
};


session_start();

if (isset($_POST['username']) && isset($_POST['password'])) {
	function validate($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	$email = validate($_POST['username']);
	$pass = validate($_POST['password']);
	if (empty($email)) {
		echo "Username is required";
		header("Location: login.php&error=Email is required");
		exit();
	} else if (empty($pass)) {
		echo "Password is required";
		header("Location: login.php?lang=fr&error=Password is required");
		exit();
	} else {
		$sqlQuery = "SELECT * FROM users WHERE username=:username AND password=:password";
		$statement = $mysqlClient->prepare($sqlQuery);
		$statement->bindParam(':username', $email, PDO::PARAM_STR);
		$statement->bindParam(':password', $pass, PDO::PARAM_STR);
		$statement->execute();
		$res = $statement->fetchAll();
		// Vérification du nombre de lignes retournées par la requête
		if (count($res) === 1) {
			$row = $res[0];
			if ($row['username'] === $email && $row['password'] === $pass) {
				echo "Logged in!";
				$_SESSION['username'] = $row['username'];
				$_SESSION['id'] = $row['id'];
				header("Location: admin_home.php");
				exit();
			} else {
				echo "invalid email or password";
				header("Location: login.php?e=404");
				exit();
			}
		} else {
			echo "invalid email or password";
			header("Location: login.php?e=405");
			exit();
		}
	}
} else {
	header("Location: index.php?e=406");
	exit();
}