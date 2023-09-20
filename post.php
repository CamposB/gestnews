
<main id="posts-conteiner">
	<?php
	require_once("data/conn.php");

	// Verifica se o parâmetro "id" está presente na URL
	if (isset($_GET['id'])) {
		$id = $_GET['id'];

		try {
			// Consulta SQL para selecionar a notícia com base no ID
			$sql = "SELECT * FROM post WHERE id = :id";
			$stmt = $pdo->prepare($sql);
			$stmt->bindParam(':id', $id);
			$stmt->execute();

			// Exibe o conteúdo completo da notícia
			if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
				$clicks = $row['clicks'];
				$updateClicksSql = "UPDATE post SET clicks = clicks + 1 WHERE id = :id";
				$updateClicksStmt = $pdo->prepare($updateClicksSql);
				$updateClicksStmt->bindParam(':id', $id);
				$updateClicksStmt->execute();
				?>
				<!DOCTYPE html>
				<html>
				<head>
					<title><?= htmlspecialchars($row['title']) ?></title>
				</head>
				<body>
					<h1><?= htmlspecialchars($row['title']) ?></h1>
					<p><?= htmlspecialchars($row['notice']) ?></p>
					<hr>
					<p>Autor: <?= htmlspecialchars($row['author']) ?></p>
					<p>Data de criação: <?= date('d/m/Y H:i', strtotime($row['date_create'])) ?></p>

				</body>
				</html>
				<?php
			} else {
				echo "Notícia não encontrada.";
			}
		} catch (PDOException $e) {
			echo "Erro ao buscar notícia: " . $e->getMessage();
		}
	} else {
		echo "ID da notícia não especificado.";
	}
	?>

</main>
<?php
include "templates/rodape.php";
?>