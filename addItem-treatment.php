<?php
session_start();

if (!empty($_SESSION['username'])) {
	require 'model/config/db_config.php';

	$name = $_POST['name'];
	$quantity = $_POST['quantity'];
	$enterDate = $_POST['enter-date'];
	$dlc = $_POST['dlc'];
	$category = $_POST['category'];
	$subCategory = $_POST['sub-category'];
	$place = $_POST['place'];

	try {
		$mysqlClient = new PDO("mysql:host={$db_config['host']};dbname={$db_config['database']};charset=utf8", "{$db_config['user']}", "{$db_config['password']}");
	} catch (Exception $e) {
		die('Erreur : ' . $e->getMessage());
		// Mettre page d'erreur
	};

	$sqlQuery = "INSERT INTO stock (name, count, dlc, category, sub_category, enter_time, place) VALUES (:name, :quantity, :dlc, :category, :subCategory, :enterDate, :place)";
	$statement = $mysqlClient->prepare($sqlQuery);
	$statement->bindParam(':name', $name, PDO::PARAM_STR);
	$statement->bindParam(':quantity', $quantity, PDO::PARAM_STR);
	$statement->bindParam(':dlc', $dlc, PDO::PARAM_STR);
	$statement->bindParam(':category', $category, PDO::PARAM_STR);
	$statement->bindParam(':subCategory', $subCategory, PDO::PARAM_STR);
	$statement->bindParam(':enterDate', $enterDate, PDO::PARAM_STR);
	$statement->bindParam(':place', $place, PDO::PARAM_STR);
	$statement->execute();
	header('Location: index.php?p=home&cat=freezer');


} else {
	header("Location: index.php?p=login");
	exit();
}