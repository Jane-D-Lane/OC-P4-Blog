<?php

class Manager 
{
	protected function connectDb() {
		$db = new PDO('mysql:host=localhost;dbname=blogJF;charset=utf8','root', 'root');
		return $db;
	}
}