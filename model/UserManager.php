<?php

require_once('model/Manager.php');

class UserManager extends Manager 
{
	// Enregistre un nouveau membre dans la bdd
	public function userRegister($pseudo, $pass, $email) {
		$db = $this->dbConnect();
		$req = $db->prepare('INSERT INTO users(pseudo, pass, email, date_inscription) VALUES (?, ?, ?, NOW())');
		$userData = $req->execute(array($pseudo, $pass, $email));
		return $userData;
	}
}