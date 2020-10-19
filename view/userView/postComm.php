<?php session_start() ?>

<?php $title = htmlspecialchars($post['title']); ?>

<?php $titlePage = htmlspecialchars($post['title']); ?>

<?php ob_start(); ?>

<p class="retour"><a href="index.php">Retour à la liste des chapitres</a></p>

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

<?php
if(isset($_SESSION['pseudo'])) {	
?>
<section id="commentSection">
	<form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">
		<div>
			<label for="author">Votre nom</label><br />
			<input type="text" name="author" id="author">
		</div>
		<div>
			<label for="comment">Votre commentaire</label><br />
			<textarea name="comment" id="comment" cols="40" rows="8"></textarea>
		</div>
		<div>
			<input type="submit" name="Envoyer">
		</div>
	</form>
	<div class="commentsList">
</section>
<?php
}
?>

<section id="commentSection">
<?php
while($comment = $comments->fetch()) {
?>
		<p>
			<strong><?= htmlspecialchars($comment['author']) ?></strong>
			<em>le <?= $comment['comment_date_fr'] ?></em>
			<span>(<a href="index.php?action=addFlag&amp;id=<?= $comment['id'] ?>" class="warningLink">Signaler</a>)</span>
		</p>
		<p>
			<?= nl2br(htmlspecialchars($comment['comment'])) ?>
		</p>
<?php
}
?>
</section>

<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>