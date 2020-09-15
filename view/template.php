<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="public/blog.css">
		<title><?= $title ?></title>
	</head>
	<body>
		<nav>
			<ul>
				<li><a href="index.php">Accueil</a></li>
				<li><a href="index.php">Chapitres</a></li>
				<li><a href="index.php?action=register">Espace membre</a></li>
				<li><a href="#">Contact</a></li>
			</ul>
		</nav>
		<header>
			<h1><?= $titlePage ?></h1>
		</header>
		<?= $content ?>
	</body>
</html>