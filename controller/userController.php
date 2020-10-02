<?php

require_once('model/UserManager.php');

// Affiche la page d'inscription
function registerForm() {
	require('view/userView/inscription.php');
}

// Contrôle les champs de l'inscription
function logCheck($pseudo, $pass, $passAgain, $email) {
	$userManager = new UserManager();
	$isValid = $userManager->userCheck();

	if(!empty($_POST['pseudo']) && !empty($_POST['pass']) &&!empty($_POST['passAgain']) && !empty($_POST['email'])) {
		if($isValid->fetch()) {
			require("view/userView/inscription.php");
			echo "Pseudonyme et/ou email déjà utilisé.";
		} else {
			if($_POST['pass'] == $_POST['passAgain']) {
				register($_POST['pseudo'], password_hash($_POST['pass'], PASSWORD_DEFAULT), $_POST['email']);
				echo 'Inscription valide !';
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

	header('Location: index.php?action=register');
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
		echo 'Mauvais identifiant ou mot de passe.';
	} else {
		if($isPassValid) {
			session_start();
			$_SESSSION['id'] = $userData['id'];
			$_SESSION['pseudo'] = $_POST['pseudo'];
			echo 'Vous êtes connecté !';
		} else {
			echo 'Mauvais identifiant ou mot de passe.';
		}
	}


}
