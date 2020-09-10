<?php

require_once('model/Manager.php');

class UserManager extends Manager 
{
	public function userConnect($user) {
		$db = $this->dbConnect();
		$req = $db->prepare('SELECT id, user, password FROM users WHERE user = ?');
		$req->execute(array($user));
		$connect = $req->fetch();
		return $connect;
	}
}