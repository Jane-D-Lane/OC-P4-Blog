<?php

require_once('model/PostManager.php');
require_once('model/CommentManager.php');

// Contrôle les champs d'un commentaire
function commentCheck() {
	if(isset($_GET['id']) && $_GET['id'] > 0) {
		if(!empty($_POST['pseudo_user']) && !empty($_POST['comment'])) {
			addComments($_GET['id'], $_SESSION['id'], $_POST['pseudo_user'], $_POST['comment']);
		} else {
			echo '<script>alert(\'Erreur : Tous les champs ne sont pas remplis.\')</script>';
		}
	} else {
		echo '<script>alert(\'Erreur : Aucun identifiant de billet envoyé.\')</script>';
	}
}

// Ajoute un commentaire 
function addComments($postId, $userId, $author, $comment) {
	$commentManager = new CommentManager();
	$affectedLines = $commentManager->postComments($postId, $userId, $author, $comment);
	if($affectedLines === false) {
		die('Impossible d\'ajouter le commentaire.');
	} else {
		header('Location: index.php?action=postComm&id=' . $postId);
	}
}

// Signaler un commentaire pour l'admin
function addFlag() {
	$commentManager = new CommentManager();
	$flagComm = $commentManager->flag($_GET['id']);
	echo '<script>alert(\'Commentaire signalé !\')</script>';
}
