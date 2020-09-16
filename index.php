<?php

require('controller/postController.php');
require('controller/commentController.php');
require('controller/userController.php');

try {
	if(isset($_GET['action'])) {
		if($_GET['action'] == 'listPosts') {
			listPosts();
		} elseif($_GET['action'] == 'postComm') {
			if(isset($_GET['id']) && $_GET['id'] > 0) {
				post();
			} else {
				throw new Exception("Aucun identifiant de billet envoyé");
			}
		} elseif($_GET['action'] == 'addComment') {
			commentCheck($postId, $author, $comment);
		} elseif($_GET['action'] == 'register') {
			if(empty($_POST['pseudo'])) {
				registerForm();
			} else {
				logCheck($pseudo, $password, $email);
			}
		}
	} else {
		listPosts();
	}
}
catch(Exception $e) {
	die('Erreur : ' .$e->getMessage());
}



