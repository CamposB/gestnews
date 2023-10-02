
<?php 
		$sql = "SELECT * FROM post ORDER BY date_create DESC LIMIT 5";
		$stmt = $pdo->query($sql);
		// Verifique se há resultados
		if ($stmt->rowCount() > 0) {
			// Inicie a saída HTML
			echo '<div class="widget widget-latest-post">';
			echo '<div class="widget-title">';
			echo '<h3>Últimas notícias</h3>';
			echo '</div>';
			echo '<div class="widget-body">';

			// Itere pelos resultados e crie o HTML para cada notícia
			while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
				echo '<div class="latest-post-aside media">';
				echo '<div class="lpa-left media-body">';
				echo '<div class="lpa-title">';
				echo '<h5><a href="#">' . $row["title"] . '</a></h5>';
				echo '</div>';
				echo '<div class="lpa-meta">';
				echo '<a class="name" href="#">' . $row["author"] . '</a>';
				echo '<a class="date" href="#">' . date("d M Y", strtotime($row["date_create"])) . '</a>';
				echo '</div>';
				echo '</div>';
				echo '</div>';
			}

			// Feche a saída HTML
			echo '</div>';
			echo '</div>';
		} else {
			echo "Nenhuma notícia encontrada.";
		}
?>
<?php 
		$sql = "SELECT * FROM post ORDER BY clicks DESC LIMIT 5";
		$stmt = $pdo->query($sql);
		// Verifique se há resultados
		if ($stmt->rowCount() > 0) {
			// Inicie a saída HTML
			echo '<div class="widget widget-latest-post">';
			echo '<div class="widget-title">';
			echo '<h3>Mais acessadas</h3>';
			echo '</div>';
			echo '<div class="widget-body">';

			// Itere pelos resultados e crie o HTML para cada notícia
			while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
				echo '<div class="latest-post-aside media">';
				echo '<div class="lpa-left media-body">';
				echo '<div class="lpa-title">';
				echo '<h5><a href="#">' . $row["title"] . '</a></h5>';
				echo '</div>';
				echo '<div class="lpa-meta">';
				echo '<a class="name" href="#">' . $row["author"] . '</a>';
				echo '<a class="date" href="#">' . date("d M Y", strtotime($row["date_create"])) . '</a>';
				echo '</div>';
				echo '</div>';
				echo '</div>';
			}

			// Feche a saída HTML
			echo '</div>';
			echo '</div>';
		} else {
			echo "Nenhuma notícia encontrada.";
		}
?>
