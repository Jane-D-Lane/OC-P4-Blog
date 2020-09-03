<?php

require_once('model/postsManager.php');

function listPosts() {
	$postManager = new PostsManager();
	$posts = $postManager->getPosts();

	require('view/listPosts.php');
}

function post() {
	$postsManager = new PostsManager();
	$post = $postsManager->getPost($_GET['id']);

	require('view/postComm.php');
}

