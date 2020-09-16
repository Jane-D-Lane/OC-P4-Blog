<?php

require_once('model/Manager.php');

class UserManager extends Manager 
{
	public function userRegister($pseudo, $password, $email) {
		$db = $this->dbConnect();
		$req = $db->prepare('INSERT INTO users(pseudo, password, email, date_inscription) VALUES(?, ?, ?, NOW())');
		$userData = $req->execute(array($pseudo, $password, $email));
		return $userData;
	}
}