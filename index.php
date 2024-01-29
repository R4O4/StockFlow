<?php
session_start();
include "controller/pages.php";

if (isset($_GET['p'])) {
	$p = $_GET['p'];
	switch ($p) {
		case 'home':
			Pages::switchPage('home');
			break;

		default:
			Pages::switchPage('login');
			break;
	}

} else {
	Pages::switchPage('home');
}

?>
