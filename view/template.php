<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="public/blog.css">
		<link rel="stylesheet" type="text/css" href="public/admin.css">
		<title><?= $title ?></title>
	</head>
	<body>
		<nav>
			<ul>
				<li><a href="index.php">Accueil</a></li>
				<li><a href="index.php">Chapitres</a></li>
				<li><a href="index.php?action=connection">Espace membre</a></li>
				<li><a href="index.php?action=admin">Espace admin</a></li>
				<li><a href="#">Contact</a></li>
<?php
if(isset($_SESSION['id']) AND isset($_SESSION['pseudo'])) {
?>
				<li>Bonjour <?= $_SESSION['pseudo'] ?></li>
<?php
}
?>
			</ul>
		</nav>
		<header>
			<h1><?= $titlePage ?></h1>
		</header>
		<?= $content ?>
	</body>
</html>