<html lang="fr">
<head>
	<?php include "components/head.php" ?>
	<title>Connexion - StockFlow</title>
	<link rel="stylesheet" href="view/src/css/style.css">
	<meta name="description" content="Page de connexion à stockFlow">
</head>

<body class="finisher-header">
<section class="login-content" >
    <section class="login-container glass">
        <img src="view/src/img/StockFlow.png" alt="StockFlow Logo" class="login-logo">
        <h1 class="login-title">Connexion</h1>
        <p>Connectez vous pour accéder à la gestion des stocks.</p>
        <form action="login-treatment.php" method="post" class="login-form">
            <input type="text" name="username" placeholder="Nom d'utilisateur" class="login-input" maxlength="20" required autocomplete="username" id="username">
            <input type="password" name="password" placeholder="Mot de passe" class="login-input" maxlength="100" required autocomplete="current-password" id="password">
            <input type="submit" value="Connexion" class="login-submit">
        </form>
    </section>
</section>


<!-- Scripts -->
<script src="view/src/js/finisher-header.es5.min.js"></script>
<script src="view/src/js/background.js"></script>


</body>
</html>