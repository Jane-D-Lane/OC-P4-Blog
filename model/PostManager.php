<?php

require_once("model/Manager.php");

class PostManager extends Manager
{
	// Récupère les billets 
	public function getPosts() {
		$db = $this->dbConnect();
		$posts = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y\') AS creation_date_fr FROM postsBlog ORDER BY creation_date DESC LIMIT 0, 6');
		return $posts;
	}

	// Récupère un billet selon son Id
	public function getPost($postId) {
		$db = $this->dbConnect();
		$req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y\') AS creation_date_fr FROM postsBlog WHERE id = ?');
		$req->execute(array($postId));
		$post = $req->fetch();
		return $post;	
	}

	// Créer un billet
	public function createPost($title, $content) {
		$db = $this->dbConnect();
		$req = $db->prepare('INSERT INTO postsBlog(title, content, creation_date) VALUES (?, ?, NOW())');
		$newPost = $req->execute(array($title, $content));
		return $newPost;
	}

	// Supprimer un billet
	public function deletePost($postId) {
		$db = $this->dbConnect();
		$req = $db->prepare('DELETE FROM postsBlog WHERE id = ?');
		$req->execute(array($postId));
		return $req;
	}
}