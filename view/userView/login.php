<?php $title = "Page de connexion"; ?>

<?php $titlePage = "Se connecter"; ?>

<?php ob_start(); ?>
<div class="loginPage">
	<p>Veuillez vous connecter :</p>
	<form action="index.php?action=connection" method="post">
		<div>
			<label for="pseudo">Votre identifiant</label>
			<input type="text" name="pseudo" id="pseudo" />
		</div>
		<div>
			<label for="password">Votre mot de passe</label>
			<input type="password" name="pass" id="password" />	
		</div>
		<div>
			<input type="submit" name="goConnect" value="Se connecter">
		</div>
	</form>
	<p>Pas encore inscrit ? <a href="index.php?action=register">Inscrivez-vous !</a></p>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>