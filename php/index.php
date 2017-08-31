<!DOCTYPE html>
<html>
<head>
	<title> Blog journalier de la formation </title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/index.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://fonts.googleapis.com/css?family=Droid+Sans" rel="stylesheet"> 
</head>
<body>

	<?php include("nav.php"); ?>
	<h1> Articles journaliers </h1>

	<main>
		<div class="all_articles">
			<ul class="liste_articles">
				<?php $dir = "../articles";
				$articles = scandir($dir, SCANDIR_SORT_DESCENDING);
				$articles = array_diff($articles, array(".", "..")); /* pour supprimer les "." et ".." qui désignent respectivement le dossier actuel et le dossier parent */

				foreach ($articles as $article) {
					$day = basename($article, ".php");
					echo '<li><a href="index.php?dossier='. $article .' "> '. $day .' </a> </li>';
				}

				
				?>
			</ul>
		</div>

		<div class="article">
			<?php include "../articles/" . $_GET['dossier']; ?>

			<?php
			$current_page = array_search($_GET['dossier'], $articles);
			$previous_page = $current_page + 1;
			$next_page = $current_page - 1;
			?>
			

			<ul>
				<?php
				

				if ($previous_page < count($articles)) {
					$previous_article = basename($articles[$previous_page]);
					echo "<li><a href=\"?dossier=$previous_article\"> Précédent </a></li>";
				}

				if ($next_page >= 0) {
					$next_article = basename($articles[$next_page]);
					echo "<li><a href=\"?dossier=$next_article\"> Suivant </a></li>";
				}

				?>
			</ul>
		</div>

	</main>

</body>
</html>