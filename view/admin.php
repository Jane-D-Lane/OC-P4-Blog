<?php $title = "Espace administrateur"; ?>

<?php $titlePage = "Espace administrateur"; ?>

<?php ob_start(); ?>

<h2>Bienvenue sur l'espace administrateur !</h2>
<p>Liste des billets :</p>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>