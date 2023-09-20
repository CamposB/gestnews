<?php
            // Seção para exibir as 5 notícias mais acessadas
            require_once("data/conn.php");
            try {
                require_once("data/conn.php");

                // Consulta SQL para selecionar as 5 notícias mais acessadas
                $topNewsSql = "SELECT * FROM post ORDER BY clicks DESC LIMIT 5";
                $topNewsStmt = $pdo->prepare($topNewsSql);
                $topNewsStmt->execute();

                // Exibe as notícias mais acessadas
                echo '<section class="top-news">';
                echo '<h2>Notícias mais acessadas:</h2>';
                echo '<ol>';

                while ($topNewsRow = $topNewsStmt->fetch(PDO::FETCH_ASSOC)) {
                    $topNewsTitle = htmlspecialchars($topNewsRow['title']);
                    $topNewsId = $topNewsRow['id'];
                    echo '<li><a href="post.php?id=' . $topNewsId . '">' . $topNewsTitle . '</a></li>';
                }

                echo '</ol>';
                echo '</section>';
            } catch (PDOException $e) {
                echo "Erro ao buscar notícias mais acessadas: " . $e->getMessage();
            }

            include "templates/rodape.php";
        ?>  