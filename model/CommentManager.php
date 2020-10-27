<?php 

require_once('model/Manager.php');

class CommentManager extends Manager 
{
	// Récupère tous les commentaires
	public function getAllComments() {
		$db = $this->dbConnect();
		$allComments = $db->query('SELECT id, pseudo_user, comment, flag, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%i\') AS comment_date_fr FROM commentsBlog ORDER BY flag DESC, comment_date DESC');
		return $allComments;
	}
	
	// Récupère les commentaires d'un billet
	public function getComments($postId) {
		$db = $this->dbConnect();
		$comments = $db->prepare('SELECT id, pseudo_user, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%i\') AS comment_date_fr FROM commentsBlog WHERE post_id = ? ORDER BY comment_date DESC');
		$comments->execute(array($postId));
		return $comments;
	}

	// Ajoute un commentaire dans la bdd
	public function postComments($postId, $userId, $author, $comment) {
		$db = $this->dbConnect();
		$comments = $db->prepare('INSERT INTO commentsBlog(post_id, user_id, pseudo_user, comment, comment_date) VALUES (?, ?, ?, ?, NOW())');
		$affectedLines = $comments->execute(array($postId, $userId, $author, $comment));
		return $affectedLines;
	}

	// Supprimer un commentaire
	public function deleteComment($commentId) {
		$db = $this->dbConnect();
		$req = $db->prepare('DELETE FROM commentsBlog WHERE id = ?');
		$req->execute(array($commentId));
		return $req;
	}

	// Signaler un commentaire 
	public function flag($commId) {
		$db = $this->dbConnect();
		$req = $db->prepare('UPDATE commentsBlog SET flag = true WHERE id = ?');
		$req->execute(array($commId));
		return $req;
	}

	// Annuler le signalement d'un commentaire
	public function unFlag($commId) {
		$db = $this->dbConnect();
		$req = $db->prepare('UPDATE commentsBlog SET flag = false WHERE id = ?');
		$req->execute(array($commId));
		return $req;
	}
}