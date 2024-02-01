<?php
session_start();

if (!empty($_SESSION['username'])) {
	?>
	<html lang="fr">
	<head>
		<?php include "components/head.php" ?>
		<title>Ajout - StockFlow</title>
		<link rel="stylesheet" href="view/src/css/style.css">
		<meta name="description" content="Page d'accueil à StockFlow">
	</head>

	<body>
	<section class="add-item-content">
		<section class="add-item-container glass">
			<form action="addItem-treatment.php" class="add-item-form" method="post">
				<div class="modify-form-header">
					<button class="previous-page" onclick="window.location.href = 'index.php?p=home&cat=fridge'"><img src="view/src/img/arrow-left.svg"></button>
					<input type="text" value="Nom du produit" id="name" name="name" autocomplete="none">
				</div>
				<div class="modify-form-body">
					<div class="enter-date">
						<label for="enter-date">Date d'entrée</label>
						<input type="date" value="" id="enter-date" name="enter-date">
					</div>
					<div class="dlc">
						<label for="dlc">DLC</label>
						<input type="date" value="" id="dlc" name="dlc">
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
						<input type="range" name="quantity" onchange="refreshQuantityValue()" class="quantity-selector" value="" id="quantity" min="1" max="15">
					</div>

					<div class="modify-form-footer">
						<a href="index.php?p=home&cat=fridge">Annuler</a>
						<input type="submit" value="Ajouter" class="save-item-submit">
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