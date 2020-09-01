<?php

require_once('model/postsManager.php');

function listPosts() {
	$postManager = new PostsManager();
	$posts = $postManager->getPosts();

	require('view/listPosts.php');
}

