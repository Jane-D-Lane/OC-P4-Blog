<?php

require_once("model/Manager.php");

class PostsManager extends Manager
{
	public function getPosts() {
		//récupère les posts 
		$db = $this->dbConnect();
		$posts = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y\') AS creation_date_fr FROM postsBlog ORDER BY creation_date DESC LIMIT 0, 6');
		return $posts;
	}
}