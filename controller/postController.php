<?php

require_once('model/PostManager.php');

// Affiche la liste des billets
function listPosts() {
	$postManager = new PostManager();
	$posts = $postManager->getPosts();

	require('view/listPosts.php');
}

// Affiche un billet 
function post() {
	$postManager = new PostManager();
	$post = $postManager->getPost($_GET['id']);

	require('view/postComm.php');
}



