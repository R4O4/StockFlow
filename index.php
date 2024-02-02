<?php
require "controller/Pages.php";

if (isset($_GET['p'])) {
	$p = $_GET['p'];
	switch ($p) {
		case 'home':
			Pages::switchPage('home');
		break;

		case 'category':
			Pages::switchPage('category');
		break;

		case 'item':
			Pages::switchPage('item');
		break;

		case 'addItem':
			Pages::switchPage('addItem');
		break;

		default:
			Pages::switchPage('login');
		break;
	}

} else {
	Pages::switchPage('login');
}

?>
