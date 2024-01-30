<?php

include '../model/database.php';

try {
	$mysqlClient = new Database();
} catch (Exception $e) {
	die('Erreur : ' . $e->getMessage());
	// Mettre page d'erreur
};



session_start();

if (isset($_POST['email']) && isset($_POST['password'])) {
	function validate($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	$email = validate($_POST['email']);
	$pass = validate($_POST['password']);
	if (empty($email)) {
		echo "Email is required";
		header("Location: login.php?lang=fr&error=Email is required");
		exit();
	} else if (empty($pass)) {
		echo "Password is required";
		header("Location: login.php?lang=fr&error=Password is required");
		exit();
	} else {
		$sqlQuery = "SELECT * FROM admin_users WHERE email=:email AND password=:password";
		$statement = $mysqlClient->prepare($sqlQuery);
		$statement->bindParam(':email', $email, PDO::PARAM_STR);
		$statement->bindParam(':password', $pass, PDO::PARAM_STR);
		$statement->execute();
		$res = $statement->fetchAll();
		// Vérification du nombre de lignes retournées par la requête
		if (count($res) === 1) {
			$row = $res[0];
			if ($row['email'] === $email && $row['password'] === $pass) {
				echo "Logged in!";
				$_SESSION['email'] = $row['email'];
				$_SESSION['id'] = $row['id'];
				header("Location: admin_home.php");
				exit();
			} else {
				echo "invalid email or password";
				header("Location: login.php?lang=fr&e=403");
				exit();
			}
		} else {
			echo "invalid email or password";
			header("Location: login.php?lang=fr&e=403");
			exit();
		}
	}
} else {
	header("Location: login.php?lang=fr");
	exit();
}