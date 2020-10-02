<?php $title = "Page de connexion"; ?>

<?php $titlePage = "Se connecter"; ?>

<?php ob_start(); ?>

<p class="loginPage">Veuillez vous connecter :</p>
<form action="index.php?action=connection" method="post">
	<div>
		<label for="pseudo">Votre identifiant</label>
		<input type="text" name="pseudo" />
	</div>
	<div>
		<label for="password">Votre mot de passe</label>
		<input type="password" name="pass" />	
	</div>
	<div>
		<input type="submit" name="goConnect" value="Se connecter">
	</div>
</form>
<p class="loginPage">Pas encore inscrit ? <a href="index.php?action=register">Inscrivez-vous !</a></p>
<?php
if(isset($_SESSION['id']) AND isset($_SESSION['pseudo'])) {
	echo 'Bonjour ' . $_SESSION['pseudo'];
}
?>

<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>