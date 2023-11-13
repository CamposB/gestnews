<?php
        try {
            // Consulta SQL para selecionar as últimas 4 notícias do banco de dados
            $sql = "SELECT * FROM post ORDER BY id DESC LIMIT 4";
            $stmt = $pdo->query($sql);

        try {
            require_once("data/conn.php");

            // Verifica se o parâmetro "category" está presente na URL
            if (isset($_GET['category'])) {
                $category = $_GET['category'];

                // Consulta SQL para selecionar as notícias com base na categoria
                $sql = "SELECT * FROM post WHERE category = :category ORDER BY date_create DESC";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':category', $category);
                $stmt->execute();
            } else {
                // Se o parâmetro "category" não estiver presente, consulta todas as notícias
                $sql = "SELECT * FROM post ORDER BY date_create DESC";
                $stmt = $pdo->prepare($sql);
                $stmt->execute();
            }

            // Exibe as notícias encontradas
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $title = htmlspecialchars($row['title']);
                $id = $row['id'];
                ?>
                        <div class="card-container">
                            <div class="card" style='border: 1px solid #ccc; padding: 10px; margin: 10px;'>
                            <img src="<?= htmlspecialchars($row['img']) ?>" alt="Imagem da Notícia" width="500" height="auto" style="display: block; margin: 0 auto; margin-top: 60px;">
                            <hr>
                                <div style="overflow: hidden;">
                                <h3><a href="post.php?id=<?= $id ?>"><?= htmlspecialchars($row['title']) ?></a></h3>

                                    <hr>
                                    <br>
                                    <p><?= strlen($row['notice']) > 100 ? substr(htmlspecialchars($row['notice']), 0, 100) . '... <a href="post.php?id=' . $id  . '">Leia Mais</a>' : htmlspecialchars($row['notice']) ?></p>
                                    <p>Autor: <?= htmlspecialchars($row['author']) ?></p>
                                    <p>Data de criação: <?= date('d/m/Y H:i', strtotime($row['date_create'])) ?></p>

                                </div>
                                <div style="clear: both;"></div>
                            </div>
                            </div>
                <?php
            }
        } catch (PDOException $e) {
            echo "Erro ao buscar notícias: " . $e->getMessage();
        }

        ?>

        </section>

            </body>
            </html>
            <?php
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
        }
        
    ?>