<?php $title = "Espace administrateur"; ?>

<?php $titlePage = "Espace administrateur"; ?>

<?php ob_start(); ?>

<h2>Bienvenue sur l'espace administrateur !</h2></br>
<p>Liste des billets :</p>
<?php
//affichage liste des billets 
while($eachPost = $posts->fetch()) {
?>
	<table>
		<tr>
			<td class="titlePost"><h3><a href="#"><?= htmlspecialchars($eachPost['title']) ?></a></h3></td>
			<td><a href="#">Voir commentaires</a></td>
			<td><a href="#">Modifier</a></td>
			<td><a href="#">Supprimer</a></td>
		</tr>
	</table>
<?php
}
$posts->closeCursor();
?> 
</br>
<div id="postCreation"><a href="#">Créer un nouveau billet</a></div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>