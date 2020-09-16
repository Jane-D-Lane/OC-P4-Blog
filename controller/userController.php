<?php

require_once('model/UserManager.php');

// Affiche la page d'inscription
function registerForm() {
	require('view/inscription.php');
}

// Contrôle les champs de l'inscription
function logCheck($pseudo, $password, $email) {
	if(!empty($_POST['pseudo']) && !empty($_POST['password']) && !empty($_POST['passwordAgain']) && !empty($_POST['email'])) {
		register($_GET['id'], $_POST['pseudo'], $_POST['password'], $_POST['email']);
		require('view/inscription.php');
		echo 'Inscription validée !';
	} else {
			echo 'Erreur : Tous les champs ne sont pas remplis !';
	}
}

// Enregistre un nouveau membre
function register($pseudo, $password, $email) {
	$userManager = new UserManager();
	$userData = $userManager->userRegister($pseudo, $password, $email);
}
