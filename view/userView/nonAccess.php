<?php $title = "Page de connexion"; ?>

<?php $titlePage = "Se connecter"; ?>

<?php ob_start(); ?>
<div class="nonAccess">
	<p>Accès réservé !</p>
	<p>Veuillez vous <a href="index.php?action=connection">connecter</a>.</p>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>