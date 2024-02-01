<?php
// show error
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

if (!empty($_SESSION['username'])) {
	require 'model/config/db_config.php';
	$place = $_POST['place'];
	$quantity = $_POST['quantity'];
	$enterDate = $_POST['enter-date'];
	$dlc = $_POST['dlc'];
	$category = $_POST['category'];
	$subCategory = $_POST['sub-category'];
	$id = $_GET['id'];
	$name = $_POST['name'];

	foreach ($_POST as $key => $value) {
	 	echo $key . ' => ' . $value . '<br>';
	}


	try {
		$mysqlClient = new PDO("mysql:host={$db_config['host']};dbname={$db_config['database']};charset=utf8", "{$db_config['user']}", "{$db_config['password']}");
	} catch (Exception $e) {
		die('Erreur : ' . $e->getMessage());
		// Mettre page d'erreur
	};

	$sqlQuery = "UPDATE stock SET name = :name, count = :quantity, dlc = :dlc, category = :category, sub_category = :subCategory, enter_time = :enterDate, place = :place WHERE id = :id";
	$statement = $mysqlClient->prepare($sqlQuery);
	$statement->bindParam(':name', $name, PDO::PARAM_STR);
	$statement->bindParam(':quantity', $quantity, PDO::PARAM_STR);
	$statement->bindParam(':dlc', $dlc, PDO::PARAM_STR);
	$statement->bindParam(':category', $category, PDO::PARAM_STR);
	$statement->bindParam(':subCategory', $subCategory, PDO::PARAM_STR);
	$statement->bindParam(':enterDate', $enterDate, PDO::PARAM_STR);
	$statement->bindParam(':place', $place, PDO::PARAM_STR);
	$statement->bindParam(':id', $id, PDO::PARAM_STR);
	$statement->execute();
	header('Location: index.php?p=home');
} else {
	//header('Location: index.php');
	echo "error";
}


