<?php $title = "Chapitres - Blog de Jean Forteroche"; ?>

<?php ob_start(); ?>
<h1>Un billet simple pour l'Alaska</h1>
<p>Derniers chapitres :</p>

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

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
