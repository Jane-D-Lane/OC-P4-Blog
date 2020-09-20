<?php

require_once('model/Manager.php');

class UserManager extends Manager 
{
	public function userRegister($pseudo, $pass, $email) {
		$db = $this->dbConnect();
		$req = $db->prepare('INSERT INTO users(pseudo, pass, email, date_inscription) VALUES (?, ?, ?, NOW())');
		$userData = $req->execute(array($pseudo, $pass, $email));
		var_dump($userData);
		return $userData;
	}
}