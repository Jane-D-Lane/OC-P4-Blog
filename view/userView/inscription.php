<?php $title = "Page d'inscription"; ?>

<?php $titlePage = "S'inscrire"; ?>

<?php ob_start(); ?>
<div class="loginPage">
	<p>Veuillez vous inscrire :</p>
	<form action="index.php?action=register" method="post">
		<div>
			<label for="pseudo">Pseudo</label>
			<input type="text" name="pseudo" />
		</div>
		<div>
			<label for="pass">Mot de passe</label>
			<input type="password" name="pass" />	
		</div>
		<div>
			<label for="passAgain">Retapez votre mot de passe</label>
			<input type="password" name="passAgain" />
		</div>
		<div>
			<label for="email">Adresse email</label>
			<input type="email" name="email" />
		</div>
		<div>
			<input type="submit" name="inscription" value="S'inscrire">
		</div>
	</form>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>