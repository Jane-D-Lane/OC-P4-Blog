<?php

require_once('model/UserManager.php');

// Affiche la page d'inscription
function registerForm() {
	require('view/userView/inscription.php');
}

// Contrôle les champs de l'inscription
function logCheck() {
	$userManager = new UserManager();
	$isValid = $userManager->userCheck();

	if(!empty($_POST['pseudo']) && !empty($_POST['pass']) &&!empty($_POST['passAgain']) && !empty($_POST['email'])) {
		if($isValid->fetch()) {
			require("view/userView/inscription.php");
			echo "Pseudonyme et/ou email déjà utilisé.";
		} else {
			if($_POST['pass'] == $_POST['passAgain']) {
				register($_POST['pseudo'], password_hash($_POST['pass'], PASSWORD_DEFAULT), $_POST['email']);
				
			} else {
				require("view/userView/inscription.php");
				echo 'Erreur : Retapez votre mot de passe';
			}
		}
	} else {
		require("view/userView/inscription.php");
		echo 'Erreur : Tous les champs ne sont pas remplis !';
	}
}

// Enregistre un nouveau membre
function register($pseudo, $pass, $email) {
	$userManager = new UserManager();
	$userData = $userManager->userRegister($pseudo, $pass, $email);

	require("view/userView/inscription.php");
	echo "Inscription valide !";
}

// Affiche la page de connexion 
function connectionForm() {
	require('view/userView/login.php');
}

// Se connecte à une session
function getConnect() {
	$userManager = new UserManager();
	$userData = $userManager->userToConnect($_POST['pseudo']);
	$isPassValid = password_verify($_POST['pass'], $userData['pass']);
	if(!$userData) {
		require('view/userView/login.php');
		echo 'Mauvais identifiant ou mot de passe.';
	} else {
		if($isPassValid) {
			session_start();
			$_SESSION['id'] = $userData['id'];
			$_SESSION['pseudo'] = $_POST['pseudo'];
			require('view/userView/login.php');
			echo 'Vous êtes connecté !';
		} else {
			require('view.userView/login.php');
			echo 'Mauvais identifiant ou mot de passe.';
		}
	}
}

// Se déconnecte
function logOut() {
	session_start();
	$_SESSION = array();
	session_destroy();
	echo 'Déconnexion !';
}

// Affiche la page d'accès interdit
function access() {
	require('view/userView/nonAccess.php');
}

