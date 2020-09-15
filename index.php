<?php

require('controller/frontendController.php');

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
			if(!empty($_POST['pseudo']) && !empty($_POST['password']) && !empty($_POST['passwordAgain']) && !empty($_POST['email'])) {
					register($_GET['id'], $_POST['pseudo'], $_POST['password'], $_POST['email']);
					echo "Votre inscription est valide !";
			} else {
					registerForm();
			}
		}
	} else {
		listPosts();
	}
}
catch(Exception $e) {
	die('Erreur : ' .$e->getMEssage());
}



