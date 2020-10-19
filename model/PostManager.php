<?php

require_once("model/Manager.php");

class PostManager extends Manager
{
	// Récupère la liste des articles 
	public function getPosts() {
		$db = $this->dbConnect();
		$posts = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y\') AS creation_date_fr FROM postsBlog ORDER BY creation_date DESC LIMIT 0, 6');
		return $posts;
	}

	// Récupère un article selon son Id
	public function getPost($postId) {
		$db = $this->dbConnect();
		$req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y\') AS creation_date_fr FROM postsBlog WHERE id = ?');
		$req->execute(array($postId));
		$post = $req->fetch();
		return $post;	
	}

	// Créer un article
	public function createPost($title, $content) {
		$db = $this->dbConnect();
		$req = $db->prepare('INSERT INTO postsBlog(title, content, creation_date) VALUES (?, ?, NOW())');
		$newPost = $req->execute(array($title, $content));
		return $newPost;
	}

	// Modifier un article
	public function updatePost($title, $content, $postId) {
		$db = $this->dbConnect();
		$req = $db->prepare('UPDATE postsBlog SET title = ?, content = ? WHERE id = ?');
		$req->execute(array($title, $content, $postId));
		return $req;
	}

	// Supprimer un article
	public function deletePost($postId) {
		$db = $this->dbConnect();
		$req = $db->prepare('DELETE FROM postsBlog WHERE id = ?');
		$req->execute(array($postId));
		return $req;
	}
}