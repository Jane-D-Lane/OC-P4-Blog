<?php

require_once('model/Manager.php');

class UserManager extends Manager 
{
	// Vérifie les données des membres existants
	public function userCheck() {
		$db = $this->dbConnect();
		$req = $db->prepare('SELECT pseudo, email FROM users WHERE pseudo = ? OR email = ?');
		$req->execute(array($_POST['pseudo'], $_POST['email']));
		return $req;
	}

	// Enregistre un nouveau membre dans la bdd
	public function userRegister($pseudo, $pass, $email) {
		$db = $this->dbConnect();
		$req = $db->prepare('INSERT INTO users(pseudo, pass, email, date_inscription) VALUES (?, ?, ?, NOW())');
		$userData = $req->execute(array($pseudo, $pass, $email));
		return $userData;
	}
}