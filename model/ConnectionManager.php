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

	public function logout() {
		$_SESSION = array();
		session_destroy();
	}

	public function verifyPassword($pass, $passconfirm) {
		if ($pass == $passconfirm)
			$verifPass = true;
		else
			$verifPass = false;
		return $verifPass;
	}

	public function verifyUsername($username) {
		$db = $this->dbConnect();
		$userExists = false;

		$requestUser = $db->query("SELECT username FROM membres WHERE username ='". $username . "'");
		while ($user = $requestUser->fetch()) {
			$userExists = true;
		}
		return $userExists;
	}

	public function register($lastname, $firstname, $username, $password, $question, $answer) {
		$db = $this->dbConnect();

		$passHash = password_hash($password, PASSWORD_DEFAULT);

		$requestUser = $db->prepare('INSERT INTO membres(nom, prenom, username, password, question, reponse) VALUES (:lastname, :firstname, :username, :pass, :question, :answer)');
		$requestUser->execute(array(
			'lastname' => $lastname,
			'firstname' => $firstname,
			'username' => $username,
			'pass' => $passHash,
			'question' => $question,
			'answer' => $answer
		));
	}

	public function getUserInfos($id_user) {
		$db = $this->dbConnect();

		$requestUser = $db->prepare('SELECT id_user, nom, prenom, username, password, question, reponse FROM membres WHERE id_user = :id_user');
		$requestUser->execute(array(
			'id_user' => $id_user
		));

		$user = $requestUser->fetch();
		$requestUser->closeCursor();

		return $user;
	}

	public function getPasswordHash($pass) {
		$passHash = password_hash($pass, PASSWORD_DEFAULT);
		return $passHash;
	}

	public function updateUserInfos($id_user, $lname, $fname, $username, $password, $question, $answer) {
		$db = $this->dbConnect();

		$updateUser = $db->prepare('UPDATE membres SET nom = :nom, prenom = :prenom, username = :username, password = :password, question = :question, reponse = :reponse WHERE id_user = :id_user');
		$updateUser->execute(array(
			'nom' => $lname,
			'prenom' => $fname,
			'username' => $username,
			'password' => $password,
			'question' => $question,
			'reponse' => $answer,
			'id_user' => $id_user
		));
	}

	public function updateUserSession($lastname, $firstname, $username) {
		$_SESSION['firstname'] = $firstname;
		$_SESSION['lastname'] = $lastname;
		$_SESSION['username'] = $username;
	}
}

?>