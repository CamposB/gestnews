<?php 

require("data/conn.php")
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minha Página Inicial</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <div class="center">
            <div class="about-header">
                <p>Sejam Bem-Vindos</p>
            </div>
            <div class="header-content">
                <div class="logo">
                    <h2><span>Radio</span> Papo Reto</h2>
                </div>
                <div class="banner-ads">
                    <h2><span style="font-size: 23px;">Radio PAPORETO</span><br>INSIRA UM ANUNCIO AQUI</h2>
                </div>
            </div>
        </div>
    </header>
    <!--FIM DO HEADER-->
    <div class="center">
        <div class="menu-main">
            <a href="#">Home</a>
            <a href="#">Sobre</a>
            <a href="#">Contato</a>
        </div>
    </div>
    <?php
        try {
            // Consulta SQL para selecionar as últimas 4 notícias do banco de dados
            $sql = "SELECT * FROM post ORDER BY id DESC LIMIT 4";
            $stmt = $pdo->query($sql);

            // Início do HTML
            ?>
            <!DOCTYPE html>
            <html>
            <head>
                <title>Notícias</title>
            </head>
            <body>

                <section class="noticias 1">
                    <div class="center">
                        <div class="noticias-wraper-1">
                            <div class="noticia-destaque">
                                <div style="background-image: url(images/embreve.png);" class="noticia-destaque-single">
                                    <h3>A radio papo reto começou</h3>
                                </div>
                            </div>
                            <div class="outra-noticia-1">
                                <?php

                                // Loop para exibir as notícias em forma de cards
                                foreach ($stmt as $row) {
                                    ?>
                                    <div class="outra-noticia-1-single">
                                        <?php
                                        $id = $row['id'];
                                        $title = htmlspecialchars($row['title']);
                                        ?>
                                        <h3><a href="post.php?id=<?= $id ?>"><?= $title ?></a></h3>
                                        <p>Autor: <?= htmlspecialchars($row['author']) ?></p>
                                        <p><?= strlen($row['notice']) <= 3 ? $row['notice'] : substr($row['notice'], 0, 10) . '...' ?></p>

                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </section>
                <section> 
                <?php
                    // Consulta SQL para buscar todas as notícias a partir do ID 5 em diante
                    $sql = "SELECT * FROM post WHERE id > 5";
                    $stmt = $pdo->query($sql);

                    // Verifique se há resultados
                    if ($stmt->rowCount() > 0) {
                        // Exiba as notícias em forma de cards
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            ?>
                            <div style='border: 1px solid #ccc; padding: 10px; margin: 10px;'>
                                <h3><?= htmlspecialchars($row['title']) ?></h3>
                                <p>Autor: <?= htmlspecialchars($row['author']) ?></p>
                                <p><?= htmlspecialchars($row['notice']) ?></p>
                            </div>
                            <?php
                        }
                    } else {
                        echo "Nenhuma notícia encontrada a partir do ID 5.";
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

</body>
</html>
