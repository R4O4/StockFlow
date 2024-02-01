<?php
session_start();

switch ($_GET["subcat"]) {
    case "viandes_rouge":
        $subCat = "Viandes rouge";
        break;
    case "volailles":
        $subCat = "Volailles";
        break;
    case "poissons":
        $subCat = "Poissons";
        break;
    case "autre":
        $subCat = "Autre";
        break;

}

if (!empty($_SESSION['username']) && !empty($_GET["cat"]) && !empty($_GET['subcat'])) {
	require 'model/config/db_config.php';
	session_start();

	try {
		$mysqlClient = new PDO("mysql:host={$db_config['host']};dbname={$db_config['database']};charset=utf8", "{$db_config['user']}", "{$db_config['password']}");
	} catch (Exception $e) {
		die('Erreur : ' . $e->getMessage());
		// Mettre page d'erreur
	};

	$sqlQuery = "SELECT * FROM stock WHERE sub_category = :subCat AND category = :cat";
	$statement = $mysqlClient->prepare($sqlQuery);
	$statement->bindParam(':subCat', $_GET['subcat'], PDO::PARAM_STR);
	$statement->bindParam(':cat', $_GET['cat'], PDO::PARAM_STR);
	$statement->execute();
	$res = $statement->fetchAll();

    ?>
	<html lang="fr">
	<head>
		<?php include "components/head.php" ?>
		<title><?php echo $subCat ?> - StockFlow</title>
		<link rel="stylesheet" href="view/src/css/style.css">
		<meta name="description" content="Page d'accueil à StockFlow">
	</head>

	<body>
	<section class="category-content">
		<section class="category-container glass">
			<h1><?php echo $subCat ?></h1>
			<div class="search-bar">
				<img src="view/src/img/search.svg" alt="search icon" class="search-icon">
				<input type="text" name="search" placeholder="Rechercher" class="search-input" maxlength="20" required
				       autocomplete="search" id="search">
			</div>
			<div class="category-items">
				<h2>Contenu</h2>
                <?php
                    foreach ($res as $row) {
                        $category = $row['category'];
                        $subCategory = $row['sub_category'];
                        $name = $row['name'];
                        $id = $row['id'];
                        echo "<a href='index.php?p=item&cat=$category&subcat=$subCategory&id=$id' class='category'>$name<img src='view/src/img/arrow-right.svg' alt='arrow'></a>";
                    }
                ?>
			</div>
			<?php include "components/nav.php" ?>
		</section>
	</section>

	<script src="view/src/js/nav.js"></script>
	</body>
	</html>
	<?php
} else {
    header("Location: index.php?p=login");
	exit();
}