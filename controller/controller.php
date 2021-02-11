<?php

//require_once ("model/ConnectionManager.php");

function homepage() {
	//$connectManager = new ConnectManager();

	require('view/frontend/connectionView.php');
}

function register () {

	require ('view/frontend/inscriptionView.php');
}

function login () {

}

?>