<?php

require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/UserManager.php');

// Affiche la liste des billets
function listPosts() {
	$postManager = new PostManager();
	$posts = $postManager->getPosts();

	require('view/listPosts.php');
}

// Affiche un billet et ses commentaires
function post() {
	$postManager = new PostManager();
	$commentManager = new CommentManager();

	$post = $postManager->getPost($_GET['id']);
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

// Affiche la page d'inscription
function registerForm() {
	require('view/inscription.php');
}

// Enregistre un nouveau membre
function register($pseudo, $password, $email) {
	$userManager = new UserManager();
	$userData = $userManager->userRegister($pseudo, $password, $email);
	if($userData === false) {
		die('Inscription impossible !');
	} else {
		header('Location: inscription.php');
	};
}


