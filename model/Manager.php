<?php

class Manager
{
	protected function dbConnect()
	{
		$sqlHost     = 'localhost';
		$sqlUser     = 'root';
		$sqlPassword = '';	
		$dbName      = 'gbaf';

		$db = new PDO('mysql:host='.$sqlHost.';dbname='.$dbName.';charset=utf8',$sqlUser,$sqlPassword) or die($bdd->errorInfo());

		return $db;
	}
}

?>