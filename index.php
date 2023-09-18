<?php 
include_once("templates/header.php");
require("data/conn.php")
?>
<main>

<div id="titulo">
	<h2>Nossa Rádio</h2>
	<h5>Papo Reto</h5>
</div>

<div id="index-conteiner">
	<?php


	try {
		// Consulta SQL para selecionar todas as notícias do banco de dados
		$sql = "SELECT * FROM post";
		$stmt = $pdo->query($sql);

		// Início do HTML
		?>
		<!DOCTYPE html>
		<html>
		<head>
			<title>Notícias</title>
		</head>
		<body>
			<h2>Notícias</h2>
		<?php

		// Loop para exibir as notícias em forma de cards
		foreach ($stmt as $row) {
			?>
			<div style='border: 1px solid #ccc; padding: 10px; margin: 10px;'>
				<h3><a href="post.php?id=<?= $row['id'] ?>"><?= htmlspecialchars($row['title']) ?></a></h3>
				<p>Autor: <?= htmlspecialchars($row['author']) ?></p>
				<p><?= htmlspecialchars($row['notice']) ?></p>
			</div>
			<?php
		}

		// Fim do HTML
		?>
		</body>
		</html>
		<?php
	} catch (PDOException $e) {
		echo "Erro ao buscar notícias: " . $e->getMessage();
	}
	?>

</div>
</main>
<?php 
include_once("templates/rodape.php");
?>