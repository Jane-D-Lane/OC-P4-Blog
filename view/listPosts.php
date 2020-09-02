<?php $title = "Chapitres - Blog de Jean Forteroche"; ?>

<?php $titlePage = "Un billet simple pour l'Alaska"; ?>

<?php ob_start(); ?>
<h2>Derniers chapitres :</h2>

<section id="postsList">
<?php
//affichage de chaque post
while($post = $posts->fetch()) {
?>
	<div class="news">
		<h3>
			<?= htmlspecialchars($post['title']) ?>
			<em>le <?= $post['creation_date_fr'] ?></em>
		</h3> 
		<p>
			<?= nl2br(htmlspecialchars($post['content'])) ?>
			<br />
			<br />
			<em><a href='#'>Commentaires</a></em>
		</p>
	</div>
<?php
}
$posts->closeCursor();
?>
</section>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
