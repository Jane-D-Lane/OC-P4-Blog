<?php

require('controller/sendPosts.php');

try {
	if(isset($_GET['action'])) {
		if($_GET['action'] == 'listPosts') {
			listPosts();
		} elseif($_GET['action'] == 'postComm') {
			if(isset($_GET['id']) && $_GET['id'] > 0) {
				post();
			} else {
				throw new Exception("Erreur : aucun identifiant de billet envoyé");
			}
		} else {
			throw new Exception("Erreur : aucun identifiant de billet envoyé");
		}
	} else {
		listPosts();
	}
}
catch(Exception $e) {
	die('Erreur : ' .$e->getMEssage());
}



