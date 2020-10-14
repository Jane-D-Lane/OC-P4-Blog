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
			require('view/userView/inscription.php');
			echo '<script>alert(\'Pseudonyme et/ou email déjà utilisé.\')</script>';
		} else {
			if($_POST['pass'] == $_POST['passAgain']) {
				register($_POST['pseudo'], password_hash($_POST['pass'], PASSWORD_DEFAULT), $_POST['email']);
				
			} else {
				require('view/userView/inscription.php');
				echo '<script>alert(\'Erreur : Retapez votre mot de passe\')</script>';
			}
		}
	} else {
		require('view/userView/inscription.php');
		echo '<script>alert(\'Erreur : Tous les champs ne sont pas remplis !\')</script>';
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
		echo '<script>alert(\'Mauvais identifiant ou mot de passe.\')</script>';
	} else {
		if($isPassValid) {
			session_start();
			$_SESSION['id'] = $userData['id'];
			$_SESSION['pseudo'] = $_POST['pseudo'];
			require('view/userView/login.php');
			echo '<script>alert(\'Vous êtes connecté !\')</script>';
		} else {
			require('view/userView/login.php');
			echo '<script>alert(\'Mauvais identifiant ou mot de passe.\')</script>';
		}
	}
}

// Se déconnecte
function logOut() {
	session_start();
	$_SESSION = array();
	session_destroy();
	require('view/userView/login.php');
	echo '<script>alert(\'Déconnexion !\')</script>';
}

// Affiche la page d'accès interdit
function access() {
	require('view/userView/nonAccess.php');
}

