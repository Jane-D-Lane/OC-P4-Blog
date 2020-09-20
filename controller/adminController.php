<?php

require_once('model/PostManager.php');
require_once('model/CommentManager.php');

// Affiche la page admin
function adminPage() {
	$postManager = new PostManager();
	$commentManager = new CommentManager();

	$posts = $postManager->getPosts();
	$allComments = $commentManager->getAllComments();
	
	require('view/admin.php');
}

// Supprimer un billet
function postDelete() {
	$postManager = new PostManager();
	$delete = $postManager->deletePost($_GET['id']);

	header('Location: index.php?action=admin');
} 

// Supprimer un commentaire
function commDelete() {
	$commentManager = new CommentManager();
	$delete = $commentManager->deleteComment($_GET['id']);

	header('Location: index.php?action=admin');
}