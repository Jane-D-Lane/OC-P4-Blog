<?php

require('controller/postController.php');
require('controller/commentController.php');
require('controller/userController.php');
require('controller/adminController.php');

try {
	if(isset($_GET['action'])) {
		if($_GET['action'] == 'listPosts') {
			listPosts();

		} elseif($_GET['action'] == 'postAdminView') {
			postAdminView();

		} elseif($_GET['action'] == 'createPost') {
			if(isset($_POST['creation'])) {
				postCreation();
			} else {
				creationForm();
			}

		} elseif($_GET['action'] == 'updatePost') {
			if(isset($_POST['modification'])) {
				postUpdate();
			} else { 
				postUpdateView();
			}
		} elseif($_GET['action'] == 'deletePost') {
			if(isset($_GET['id']) && $_GET['id'] > 0) {
				postDelete();
			} else {
				throw new Exception("Aucun identifiant de billet envoyé");
			}

		} elseif($_GET['action'] == 'postComm') {
			if(isset($_GET['id']) && $_GET['id'] > 0) {
				post();
			} else {
				throw new Exception("Aucun identifiant de billet envoyé");
			}

		} elseif($_GET['action'] == 'addComment') {
			commentCheck($postId, $author, $comment);

		} elseif($_GET['action'] == 'deleteComm') {
			if(isset($_GET['id']) && $_GET['id'] > 0) {
				commDelete();
			} else {
				throw new Exception("Aucun identifiant de billet envoyé");
			}

		} elseif($_GET['action'] == 'addFlag') {
			addFlag();

		} elseif($_GET['action'] == 'register') {
			if(isset($_POST['inscription'])) {
				logCheck($pseudo, $pass, $email);
			} else {
				registerForm();
			}

		} elseif($_GET['action'] == 'admin') {
			adminPage();
		}
	} else {
		listPosts();
	}
}
catch(Exception $e) {
	die('Erreur : ' .$e->getMessage());
}



