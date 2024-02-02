<div class="home-categories-header">
    <h2>Résultat</h2>
</div>

<?php
require "model/config/db_config.php";
try {
	$mysqlClient = new PDO("mysql:host={$db_config['host']};dbname={$db_config['database']};charset=utf8", "{$db_config['user']}", "{$db_config['password']}");
} catch (Exception $e) {
	die('Erreur : ' . $e->getMessage());
	// Mettre page d'erreur
};

$sqlQuery = "SELECT * FROM stock WHERE name LIKE :name";
$statement = $mysqlClient->prepare($sqlQuery);
$statement->bindParam(':name', $_GET['search'], PDO::PARAM_STR);
$statement->execute();
$res = $statement->fetchAll();

?>
