<?php $title = "Espace administrateur"; ?>

<?php $titlePage = "Nouveau chapitre"; ?>

<?php ob_start(); ?>

<p><a href="index.php?action=admin">Retour à la page principale</a></p>

<section id="creationSection">
	<form action="index.php?action=createPost" method="post">
		<div>
			<label for="title">Titre</label></br>
			<input size="50" type="text" name="title" id="title">
		</div>
			<label for="content">Contenu</label></br>
		<div class="textarea">
			<textarea id="mytextarea" name="content"></textarea>
		</div>
		<div>
			<input type="submit" name="creation" value="Valider">
		</div>
	</form>
</section>
    <form method="post">
      
    </form>

<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>