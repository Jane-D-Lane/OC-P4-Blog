<?php

class Manager 
{
	protected function dbConnect() {
		try {
			$db = new PDO('mysql:host=localhost;dbname=blogJF;charset=utf8','root', 'root');
			return $db;
		}
		catch(Exception $e) {
			die('Erreur : ' .$e->getMessage());
		}
	}
}