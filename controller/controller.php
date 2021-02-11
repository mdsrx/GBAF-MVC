<?php

require_once ("model/ConnectionManager.php");
require_once ("model/PartnersManager.php");

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

function logout () {
	$connectManager = new ConnectionManager();

	$connectManager->logout();
	header('Location: index.php');
}

function listPartners() {
	$partnersManager = new PartnersManager();

	$partners = $partnersManager->getPartners();

	require ('view/frontend/listPartnersView.php');
}

function partnerDisplay($id) {
	
}

function profile() {
	require('view/frontend/profileView.php');
}

?>