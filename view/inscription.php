<?php $title = "Page d'inscription"; ?>

<?php $titlePage = "S'inscrire"; ?>

<?php ob_start(); ?>

<p>Veuillez vous inscrire :</p>
<form action="index.php?action=register" method="post">
	<div>
		<label for="pseudo">Pseudo</label>
		<input type="text" name="pseudo" />
	</div>
	<div>
		<label for="password">Mot de passe</label>
		<input type="password" name="password" />	
	</div>
	<div>
		<label for="passwordAgain">Retapez votre mot de passe</label>
		<input type="password" name="passwordAgain" />
	</div>
	<div>
		<label for="email">Adresse email</label>
		<input type="email" name="email" />
	</div>
	<div>
		<input type="submit" name="S'inscrire">
	</div>
</form>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>