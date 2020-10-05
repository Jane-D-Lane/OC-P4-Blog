<?php
session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="public/blog.css">
		<link rel="stylesheet" type="text/css" href="public/admin.css">
		<script src="https://cdn.tiny.cloud/1/32ttkup4u4fx1o9d6fjnucjqug3uriest95tajwl7mg06dt3/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
		<script>
      		tinymce.init({
        		selector: '#mytextarea',
        		width: 600,
    			height: 300,
      		});
    	</script>
		<title><?= $title ?></title>
	</head>
	<body>
		<div id="main">
			<nav>
				<ul>
					<li><a href="index.php">Accueil</a></li>
					<li><a href="index.php">Chapitres</a></li>
					<li><a href="index.php?action=connection">Espace membre</a></li>
					<li><a href="index.php?action=admin">Espace admin</a></li>
					<li><a href="#">Contact</a></li>
<?php
if(isset($_SESSION['id'])) {
?>
					<li id="userMessage">Bonjour <?= $_SESSION['pseudo'] ?></li>
					<li><a href="index.php?action=logOut">Deconnexion</a></li>
<?php
}
?>
				</ul>
			</nav>
			<header>
				<h1><?= $titlePage ?></h1>
			</header>	
			<?= $content ?>
			<footer>
				<div id="footer">
					<p><a href="#">Mentions légales</a></p>
					<p><a href="#">Politique de confidentialité</a></p>
					<p>© 2020 GwenaëllePoirier</p>
				</div>
			</footer>
		</div>
	</body>
</html>