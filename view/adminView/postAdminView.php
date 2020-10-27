<?php $title = htmlspecialchars($post['title']); ?>

<?php $titlePage = htmlspecialchars($post['title']); ?>

<?php ob_start(); ?>

<p class="retour"><a href="index.php?action=admin">Retour à la page admin</a></p>

<section id="postPage">
	<div class="new">
		<h3>
			<?= htmlspecialchars($post['title']) ?>
			<em>le <?= $post['creation_date_fr'] ?></em>
		</h3>
		<p>
			<?= nl2br($post['content']) ?>
		</p>
	</div>
</section>

<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>