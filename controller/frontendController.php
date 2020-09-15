<?php

require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/UserManager.php');

function listPosts() {
	$postManager = new PostManager();
	$posts = $postManager->getPosts();

	require('view/listPosts.php');
}

function post() {
	$postManager = new PostManager();
	$commentManager = new CommentManager();

	$post = $postManager->getPost($_GET['id']);
	$comments = $commentManager->getComments($_GET['id']);

	require('view/postComm.php');
}

function addComments($postId, $author, $comment) {
	$commentManager = new CommentManager();
	$affectedLines = $commentManager->postComments($postId, $author, $comment);
	if($affectedLines === false) {
		die('Impossible d\'ajouter le commentaire !');
	} else {
		header('Location: index.php?action=postComm&id=' . $postId);
	}
}

function registerForm() {
	require('view/inscription.php');
}

function register($pseudo, $password, $email) {
	$userManager = new UserManager();
	$userData = $userManager->userRegister($pseudo, $password, $email);
	if($userData === false) {
		die('Inscription impossible !');
	} else {
		header('Location: inscription.php');
	};
}


