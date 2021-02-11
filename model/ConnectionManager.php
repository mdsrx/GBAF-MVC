<?php

require_once("Manager.php");

class ConnectionManager extends Manager
{
	public function getUser ($username) {
		$db = $this->dbConnect();

		$usrname = htmlspecialchars($username);

		$requestUser = $db->prepare('SELECT id_user, password, prenom, nom FROM membres WHERE username = :username');
		$requestUser->execute(array(
			'username' => $usrname
		));
		$user = $requestUser->fetch();

		return $user;
	}

	public function checkPassword($password, $user) {
		$pass = htmlspecialchars($password);
		$isPasswordCorrect = password_verify($pass, $user['password']);

		return $isPasswordCorrect;
	}

	public function connectUser($username, $user) {
		$usrname = htmlspecialchars($username);

		$_SESSION['id_user'] = $user['id_user'];
		$_SESSION['firstname'] = $user['prenom'];
		$_SESSION['lastname'] = $user['nom'];
		$_SESSION['username'] = $usrname; 
	}
}

?>