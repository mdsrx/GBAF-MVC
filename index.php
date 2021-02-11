<?php

/*
** Routeur
*/

require('controller/Controller.php');

try {
	if (isset($_GET['action'])) {
		if (isset($_SESSION['id_user'])) {
			// utilisateur connecté
			//
			//
			//
		} else {
			// utilisateur non connecté
			if ($_GET['action'] == 'inscription') {

			} else {
				homepage();
			}
		}
	} else {
		homepage();
	}
} catch (Exception $e) {
	echo 'Erreur : ' . $e->getMessage();
}

?>