<?php
session_start();
include "controller/pages.php";

if (isset($_GET['p'])) {
	$p = $_GET['p'];
	switch ($p) {
		case 'home':
			Pages::switchPage('home');
		break;

		case 'login-treatment':
			Pages::switchPage('login-treatment');
		break;

		default:
			Pages::switchPage('login');
		break;
	}

} else {
	Pages::switchPage('login');
}

?>
