<?php

require_once('model/PostManager.php');
require_once('model/CommentManager.php');

// Affiche la page admin
function adminPage() {
	$postManager = new PostManager();
	$commentManager = new CommentManager();

	$posts = $postManager->getPosts();
	$allComments = $commentManager->getAllComments();
	
	require('view/adminView/admin.php');
}

// Affiche le contenu d'un billet
function postAdminView() {
	$postManager = new PostManager();
	$post = $postManager->getPost($_GET['id']);

	require('view/adminView/postAdminView.php');
}

// Affiche la page de création de billet
function creationForm() {
	require('view/adminView/createPost.php');
}

// Créer un billet 
function postCreation() {
	if(!empty($_POST['title']) && !empty($_POST['content'])) {
		$postManager = new PostManager();
		$newPost = $postManager->createPost($_POST['title'], $_POST['content']);
		if($newPost === false) {
			die('Impossible de créer le chapitre');
		} else {
			header('Location: index.php?action=admin');
		}
	} else {
		require('view/adminView/createPost.php');
		echo 'Erreur : Tous les champs ne sont pas remplis.';
	} 
}

// Afficher un billet pour le modifier
function postUpdateView() {
	$postManager = new PostManager();
	$post = $postManager->getPost($_GET['id']);

	require('view/adminView/updatePost.php');
}

// Modifier un billet
function postUpdate() {
	$postManager = new PostManager();
	$updatePost = $postManager->updatePost($_POST['title'], $_POST['content'], $_GET['id']);
	if($updatePost === false) {
		die('Impossible de modifier le chapitre');
	} else {
		header('Location: index.php?action=admin');
	}
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