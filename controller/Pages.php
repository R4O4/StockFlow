<?php
class Pages {
	public static function switchPage($page) {
		switch ($page) {
			default:
				include "view/$page.php";
				break;
		}
	}
}

?>