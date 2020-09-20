<?php

require_once('model/PostManager.php');

// Affiche la page admin
function adminPage() {
	$postManager = new PostManager();
	$posts = $postManager->getPosts();
	
	require('view/admin.php');
}