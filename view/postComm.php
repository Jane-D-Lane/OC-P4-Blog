<?php $title = htmlspecialchars($post['title']); ?>

<?php $titlePage = htmlspecialchars($post['title']); ?>

<?php ob_start(); ?>

<p><a href="index.php">Retour à la liste des chapitres</a></p>

<section id="postPage">
	<div class="new">
		<h3>
			<?= htmlspecialchars($post['title']) ?>
			<em>le <?= $post['creation_date_fr'] ?></em>
		</h3>
		<p>
			<?= nl2br(htmlspecialchars($post['content'])) ?>
		</p>
	</div>
</section>

<section id="commentsSection">
<?php
while($comment = $comments->fetch()) {
?>
		<p>
			<strong><?= htmlspecialchars($comment['author']) ?></strong>
			<em>le <?= $comment['comment_date_fr'] ?></em>
		</p>
		<p>
			<?= nl2br(htmlspecialchars($comment['comment'])) ?>
		</p>
<?php
}
?>
</section>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>