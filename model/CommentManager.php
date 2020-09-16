<?php 

require_once('model/Manager.php');

class CommentManager extends Manager 
{
	// Récupère les commentaires
	public function getComments($postId) {
		$db = $this->dbConnect();
		$comments = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%i\') AS comment_date_fr FROM commentsBlog WHERE post_id = ? ORDER BY comment_date DESC');
		$comments->execute(array($postId));
		return $comments;
	}

	// Ajoute un commentaire dans la bdd
	public function postComments($postId, $author, $comment) {
		$db = $this->dbConnect();
		$comments = $db->prepare('INSERT INTO commentsBlog(post_id, author, comment, comment_date) VALUES (?, ?, ?, NOW())');
		$affectedLines = $comments->execute(array($postId, $author, $comment));
		return $affectedLines;
	}
}