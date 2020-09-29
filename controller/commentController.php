<?php

require_once('model/PostManager.php');
require_once('model/CommentManager.php');

// Contrôle les champs d'un commentaire
function commentCheck($postId, $author, $comment) {
	if(isset($_GET['id']) && $_GET['id'] > 0) {
		if(!empty($_POST['author']) && !empty($_POST['comment'])) {
			addComments($_GET['id'], $_POST['author'], $_POST['comment']);
		} else {
			echo 'Erreur : Tous les champs ne sont pas remplis.';
		}
	} else {
		echo 'Erreur : Aucun identifiant de billet envoyé.';
	}
}

// Ajoute un commentaire 
function addComments($postId, $author, $comment) {
	$commentManager = new CommentManager();
	$affectedLines = $commentManager->postComments($postId, $author, $comment);
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
	echo 'Commentaire signalé !';
}