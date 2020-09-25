<?php $title = "Page de connexion"; ?>

<?php $titlePage = "Se connecter"; ?>

<?php ob_start(); ?>

<p>Veuillez vous connecter :</p>
<form action="index.php?action=getConnect" method="post">
	<div>
		<label for="pseudo">Votre identifiant</label>
		<input type="text" name="pseudo" />
	</div>
	<div>
		<label for="password">Votre mot de passe</label>
		<input type="password" name="password" />	
	</div>
	<div>
		<input type="submit" name="goConnect">
	</div>
</form>

<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>