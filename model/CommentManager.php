<?php 

require_once('model/Manager.php');

class CommentManager extends Manager 
{
	public function getComments($postId) {
		$db = $this->dbConnect();
		$comments = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%i\') AS comment_date_fr FROM commentsBlog WHERE post_id = ? ORDER BY comment_date DESC');
		$comments->execute(array($postId));
		return $comments;
	}

}