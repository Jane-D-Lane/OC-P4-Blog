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
			<td class="titlePost"><h3><a href="index.php?action=postAdminView&amp;id=<?= $eachPost['id'] ?>"><?= htmlspecialchars($eachPost['title']) ?></a></h3></td>
			<td><a href="index.php?action=updatePost&amp;id=<?= $eachPost['id'] ?>">Modifier</a></td>
			<td><a href="index.php?action=deletePost&amp;id=<?= $eachPost['id'] ?>">Supprimer</a></td>
		</tr>
	</table>
<?php
}
$posts->closeCursor();
?> 
</br>
<div id="postCreation"><a href="index.php?action=createPost">Créer un nouveau billet</a></div></br>

<p>Liste des commentaires :</p>
<?php
//affichage liste des commentaires
while($eachComment = $allComments->fetch()) {
?>
	<table>
		<tr>
			<td><?= htmlspecialchars($eachComment['author']) ?></td>
			<td class="commentContent"><?= nl2br(htmlspecialchars($eachComment['comment'])) ?></td>
			<td><?= $eachComment['comment_date_fr'] ?></td>
			<td><a href="index.php?action=deleteComm&amp;id=<?= $eachComment['id'] ?>">Supprimer</a></td>
<?php
if($eachComment['flag'] == true) {
	?><td class="flag" style="color:red"><a href="index.php?action=removeFlag&amp;id=<?= $eachComment['id'] ?>">Signalé !</a></td>
<?php
}
?>		
		</tr>
	</table>
<?php
}
$allComments->closeCursor();
?>

<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>