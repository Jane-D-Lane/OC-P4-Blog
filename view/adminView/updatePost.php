<?php $title = "Espace administrateur"; ?>

<?php $titlePage = htmlspecialchars($post['title']); ?>

<?php ob_start(); ?>

<p class="retour"><a href="index.php?action=admin">Retour à la page principale</a></p>

<section id="creationSection">
	<form action="index.php?action=updatePost&amp;id=<?= $post['id'] ?>" method="post">
		<div>
			<label for="title">Titre</label><br>
			<input size="50" type="text" name="title" id="title" value="<?= $post['title'] ?>">
		</div>
			<label for="mytextarea">Contenu</label><br>
		<div class="textarea">		
			<textarea id="mytextarea" name="content"><?= $post['content'] ?></textarea> 
		</div>
		<div>
			<input type="submit" name="modification" value="Modifier">
		</div>
	</form>
</section>

<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>