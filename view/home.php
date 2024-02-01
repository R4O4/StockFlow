<?php
session_start();

switch ($selectedCate) {
	case "fridge":
		$selectedCat = "Réfrigérateur";
		break;
	case "freezer":
		$selectedCat = "Congélateur";
		break;
}

if (!empty($_SESSION['username'])) { ?>
    <html lang="fr">
    <head>
			<?php include "components/head.php" ?>
        <title>Home - StockFlow</title>
        <link rel="stylesheet" href="view/src/css/style.css">
        <meta name="description" content="Page d'accueil à StockFlow">
    </head>

    <body>
    <section class="home-content">
        <section class="home-container glass">
            <h1><?php echo $selectedCat ?></h1>
            <div class="search-bar">
                <img src="view/src/img/search.svg" alt="search icon" class="search-icon">
                <input type="text" name="search" placeholder="Rechercher" class="search-input" maxlength="20" required
                       autocomplete="search" id="search">
            </div>
            <div class="category-items">
                <h2>Contenu</h2>
                <a href="index.php?p=category&cat=<?php echo $selectedCate ?>&subcat=viandes_rouge" class="category" style="border-radius: 16px 16px 0 0;">Viandes
                    rouge<img src="view/src/img/arrow-right.svg" alt="arrow"></a>
                <a href="index.php?p=category&cat=<?php echo $selectedCate ?>&subcat=volailles" class="category">Volailles<img
                            src="view/src/img/arrow-right.svg" alt="arrow"></a>
                <a href="index.php?p=category&cat=<?php echo $selectedCate ?>&subcat=poissons" class="category">Poissons<img
                            src="view/src/img/arrow-right.svg" alt="arrow"></a>
                <a href="index.php?p=category&cat=<?php echo $selectedCate ?>&subcat=autre" class="category"
                   style="border-radius: 0 0 16px 16px;">Autre<img src="view/src/img/arrow-right.svg" alt="arrow"></a>
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