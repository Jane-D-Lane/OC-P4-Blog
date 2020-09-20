<?php

require_once('model/UserManager.php');

// Affiche la page d'inscription
function registerForm() {
	require('view/inscription.php');
}

// Contrôle les champs de l'inscription
function logCheck($pseudo, $pass, $email) {
	if(!empty($_POST['pseudo']) && !empty($_POST['pass']) && !empty($_POST['email'])) {
		register($_POST['pseudo'], $_POST['pass'], $_POST['email']);
	} else {
		echo 'Erreur : Tous les champs ne sont pas remplis !';
	}
}

// Enregistre un nouveau membre
function register($pseudo, $pass, $email) {
	$userManager = new UserManager();
	$userData = $userManager->userRegister($pseudo, $pass, $email);

	header('Location: index.php?action=register');
}
