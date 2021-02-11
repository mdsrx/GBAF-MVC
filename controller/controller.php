<?php

require_once ("model/ConnectionManager.php");
require_once ("model/PartnersManager.php");

function homepage() {
	require('view/frontend/connectionView.php');
}

function register () {
	require ('view/frontend/inscriptionView.php');
}

function registerUser ($lastname, $firstname, $username, $pass, $passconfirm, $question, $answer) {
	$registerManager = new ConnectionManager();

	$lname = htmlspecialchars($lastname);
	$fname = htmlspecialchars($firstname);
	$uname = htmlspecialchars($username);
	$pwd = htmlspecialchars($pass);
	$pwdconfirm = htmlspecialchars($passconfirm);
	$qstion = htmlspecialchars($question);
	$aswr = htmlspecialchars($answer);

	$verifPass = $registerManager->verifyPassword($pwd, $pwdconfirm);
	$userExists = $registerManager->verifyUsername($uname);
	if ($verifPass) {
		if (!$userExists) {
			$registerManager->register($lname, $fname, $uname, $pwd, $qstion, $aswr);
			header('Location: index.php');
		} else {
			throw new Exception("User already exists.", 1);
		}
	} else {
		throw new Exception("Passwords aren't the same.");
	}
}

function forgotten () {
	/*
	** TO DO
	*/
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
	/*
	** TO DO
	*/
	require ('view/frontend/partnerView.php');
}

function profile() {
	$profileManager = new ConnectionManager();

	$user = $profileManager->getUserInfos($_SESSION['id_user']);
	require('view/frontend/profileView.php');
}

function profileUpdate($id_user, $lname, $fname, $uname, $password, $question, $answer) {
	$profileManager = new ConnectionManager();

	$lastname = htmlspecialchars($lname);
	$firstname = htmlspecialchars($fname);
	$username = htmlspecialchars($uname);
	$pass = htmlspecialchars($password);
	$qstion = htmlspecialchars($question);
	$answr = htmlspecialchars($answer);

	$passHash = $profileManager->getPasswordHash($pass);
	$profileManager->updateUserInfos($id_user, $lastname, $firstname, $username, $passHash, $qstion, $answr);
	$profileManager->updateUserSession($lastname, $firstname, $username);
	header('Location: index.php?action=profile');
}

?>