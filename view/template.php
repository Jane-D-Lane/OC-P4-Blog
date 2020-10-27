<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="public/blog.css">
		<link rel="stylesheet" type="text/css" href="public/admin.css">
		<link rel="stylesheet" type="text/css" href="public/responsive.css">
		<script src="https://cdn.tiny.cloud/1/32ttkup4u4fx1o9d6fjnucjqug3uriest95tajwl7mg06dt3/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
		<script>
      		tinymce.init({
        		selector: '#mytextarea',
        		width: 800,
    			height: 500,
      		});
    	</script>
		<title><?= $title ?></title>
	</head>
	<body>
		<div id="main">
			<nav>
				<div id="nav">
					<ul>
						<li><a href="index.php">Chapitres</a></li>
						<li><a href="index.php?action=connection">Espace membre</a></li>
					</ul>
					
<?php
if(isset($_SESSION['id'])) {
?>
					<ul>
						<li class="userMessage">Bonjour <?= htmlspecialchars($_SESSION['pseudo']) ?></li>
						<li><a href="index.php?action=logOut" class="userMessage">Deconnexion</a></li>
					</ul>

<?php
}
?>
				</div>	
			</nav>
			<header>
				<h1><?= $titlePage ?></h1>
			</header>	
			<?= $content ?>
			<footer>
				<div id="footer">
					<p><a href="#">Mentions légales</a></p>
					<p><a href="#">Politique de confidentialité</a></p>
					<p><a href="index.php?action=admin">Espace admin</a></p>
					<p>© 2020 GwenaëllePoirier</p>
				</div>
			</footer>
		</div>
	</body>
</html>