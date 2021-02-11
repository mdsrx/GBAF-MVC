<?php

require_once ("model/ConnectionManager.php");

function homepage() {
	require('view/frontend/connectionView.php');
}

function register () {
	require ('view/frontend/inscriptionView.php');
}

function forgotten () {
	require ('view/frontend/forgottenView.php');
}

function login ($username, $password) {
	$connectManager = new ConnectionManager();
	
	$user = $connectManager->getUser($username, $password);
	if ($user) {
		$isPasswordCorrect = $connectManager->checkPassword($password, $user);
		if ($isPasswordCorrect) {
			$connectManager->connectUser($username, $user);
			header('Location: index.php?action=listpartners');
		} else {
			throw new Exception("Wrong password");			
		}
	} else {
		throw new Exception("No entry for this user.");
	}
}

function listPartners() {
	require ('view/frontend/listPartnersView.php');
}

function partnerDisplay() {
	
}

function profile() {
	
}

?>