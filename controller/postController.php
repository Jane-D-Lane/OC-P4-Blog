<?php

require_once('model/PostManager.php');
require_once('model/CommentManager.php');

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



