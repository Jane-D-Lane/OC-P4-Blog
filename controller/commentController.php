<?php

require_once('model/CommentManager.php');

// Affiche les commentaires
function comment() {
	$commentManager = new CommentManager();
	$comments = $commentManager->getComments($_GET['id']);

	require('view/postComm.php');
}

// Contrôle les champs d'un commentaire
function commentCheck($postId, $author, $comment) {
	if(isset($_GET['id']) && $_GET['id'] > 0) {
		if(!empty($_POST['author']) && !empty($_POST['comment'])) {
			addComments($_GET['id'], $_POST['author'], $_POST['comment']);
		} else {
		echo 'Erreur : tous les champs ne sont pas remplis.';
		}
	} else {
		echo 'Erreur : aucun identifiant de billet envoyé.';
	}
}

// Ajoute un commentaire 
function addComments($postId, $author, $comment) {
	$commentManager = new CommentManager();
	$affectedLines = $commentManager->postComments($postId, $author, $comment);
	if($affectedLines === false) {
		die('Impossible d\'ajouter le commentaire !');
	} else {
		header('Location: index.php?action=postComm&id=' . $postId);
	}
}