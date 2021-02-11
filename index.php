<?php

/*
** Routeur
*/

require('controller/Controller.php');

session_start();

try {
	if (isset($_GET['action'])) {
		if (isset($_SESSION['id_user'])) {
			// utilisateur connecté
			if ($_GET['action'] == "listpartners") {
				listPartners();
			} else if ($_GET['action'] == "partner") {
				if (isset($_GET['id']) && $_GET['id'] > 0) {
					partnerDisplay($_GET['id']);
				} else {
					throw new Exception("No partner called.");
				}
			} else if ($_GET['action'] == "profile") {
					profile();
			} else if ($_GET['action'] == "profileupdate") {
				if (isset($_POST['lastname']) && isset($_POST['firstname']) && isset($_POST['username']) && isset($_POST['pass']) && isset($_POST['question']) && isset($_POST['answer'])) {
					profileUpdate($_SESSION['id_user'], $_POST['lastname'], $_POST['firstname'], $_POST['username'], $_POST['pass'], $_POST['question'], $_POST['answer']);
				} else {
					throw new Exception("All fields not complete.");
				}
			} else if ($_GET['action'] == "logout") {
				logout();
			} else {
				listPartners();
			}
		} else {
			// utilisateur non connecté
			if ($_GET['action'] == 'register') {
				register();
			} else if ($_GET['action'] == 'registeruser') {
				if (isset($_POST['lastname']) && isset($_POST['firstname']) && isset($_POST['username']) && isset($_POST['pass']) && isset($_POST['passconfirm']) && isset($_POST['question']) && isset($_POST['answer'])) {
					registerUser($_POST['lastname'], $_POST['firstname'], $_POST['username'], $_POST['pass'], $_POST['passconfirm'], $_POST['question'], $_POST['answer']);
				} else {
					throw new Exception("All fields not complete.");
				}
			} else if ($_GET['action'] == "forgotten") {
				forgotten();
			} else if ($_GET['action'] == "login") {
				if (isset($_POST['username']) && isset($_POST['pass'])) {
					login($_POST['username'], $_POST['pass']);
				} else {
					throw new Exception("No login or password.");
				}
			} else {
				homepage();
			}
		}
	} else {
		if (isset($_SESSION['id_user'])) {
			listPartners();
		} else {
			homepage();
		}
	}
} catch (Exception $e) {
	echo 'Erreur : ' . $e->getMessage();
}

?>