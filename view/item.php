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

	$sqlQuery = "SELECT * FROM stock WHERE id = :id";
	$statement = $mysqlClient->prepare($sqlQuery);
	$statement->bindParam(':id', $_GET['id'], PDO::PARAM_STR);
	$statement->execute();
	$res = $statement->fetchAll();

	foreach ($res as $row) {
		$id = $row['id'];
		$name = $row['name'];
		$quantity = $row['count'];
		$dlc = $row['dlc'];
		$category = $row['category'];
		$subCategory = $row['sub_category'];
		$enterDate = $row['enter_time'];
		$place = $row['place'];
	}

	?>
	<html lang="fr">
	<head>
		<?php include "components/head.php" ?>
		<title><?php echo $name ?> - StockFlow</title>
		<link rel="stylesheet" href="view/src/css/style.css">
		<meta name="description" content="Page d'accueil à StockFlow">
	</head>

	<body>
	<section class="item-content">
		<section class="item-container glass">
        <form action="modify-item.php?id=<?php echo $id ?>" class="modify-item-form" method="post">
            <div class="modify-form-header">
                <button class="previous-page" onclick="window.history.back()"><img src="view/src/img/arrow-left.svg"></button>
                <input type="text" value="<?php echo $name ?>" id="name" name="name">
            </div>
            <div class="modify-form-body">
                <div class="enter-date">
                    <label for="enter-date">Date d'entrée</label>
                    <input type="date" value="<?php echo $enterDate ?>" id="enter-date" name="enter-date">
                </div>
                <div class="dlc">
                    <label for="dlc">DLC</label>
                    <input type="date" value="<?php echo $dlc ?>" id="dlc" name="dlc">
                </div>
                <div class="category">
                    <label for="category">Catégorie</label>
                    <select name="category" id="category" class="category-selector">
                        <option value="fridge">Réfrigérateur</option>
                        <option value="freezer">Congélateur</option>
                    </select>
                </div>
                <div class="sub-category">
                    <label for="sub-category">Sous-catégorie</label>
                    <select name="sub-category" id="sub-category" class="subcat-selector">
                        <option value="viandes_rouge">Viandes rouge</option>
                        <option value="volailles">Volailles</option>
                        <option value="poissons">Poissons</option>
                        <option value="autre">Autre</option>
                    </select>
                </div>

                <div class="place">
                    <label for="place">Emplacement</label>
                    <select name="place" id="place" class="place-selector">
                        <option value="left-top" class="left-top">Tiroir à gauche en haut</option>
                        <option value="left-middle" class="left-middle" >Tirroir à gauche au milieu</option>
                        <option value="left-bottom" class="left-bottom">Tiroir à gauche en bas</option>
                        <option value="right-top" class="right-top">Tiroir à droite en haut</option>
                        <option value="right-middle" class="right-middle">Tiroir à droite au milieu</option>
                        <option value="right-bottom" class="right-bottom">Tiroir à droite en bas</option>
                    </select>
                </div>

                <div class="quantity">
                    <label for="quantity">Quantité</label>
                    <p class="quantity-p"></p>
                    <input type="range" name="quantity" onchange="refreshQuantityValue()" class="quantity-selector" value="<?php echo $quantity ?>" id="quantity" min="1" max="15">
                </div>

                <div class="modify-form-footer">
                    <a href="../remove-item.php?id=<?php echo $id ?>">Supprimer</a>
                    <input type="submit" value="Sauvegarder" class="save-item-submit">
                </div>

            </div>
        </form>
		</section>
	</section>

    <script src="view/src/js/item.js"></script>

	</body>
	</html>
	<?php
} else {
	header("Location: index.php?p=login");
	exit();
}