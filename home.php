<?php 

require("data/conn.php")
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minha Página Inicial</title>   
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:opsz,wght@6..12,200&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <div class="navbar-top">
            <a href="#">YouTube</a>
            <a href="#">Facebook</a>
            <a href="#">Instagram</a>
            <a href="#">TikTok</a>
        </div>

        <!-- Conteúdo da página -->

        <div class="navbar-bottom">
            <a href="#">Categoria 1</a>
            <a href="#">Categoria 2</a>
            <a href="#">Categoria 3</a>
        </div>

    </header>
    <!--FIM DO HEADER-->
    <br/>
    <div class="center">
        <div class="menu-main">
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
                    $id = 0;
                    // Consulta SQL para buscar todas as notícias a partir do ID 5 em diante
                    $sql = "SELECT * FROM post WHERE id > 5";
                    $stmt = $pdo->query($sql);

                    // Verifique se há resultados
                    if ($stmt->rowCount() > 0) {
                        // Exiba as notícias em forma de cards
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            $id = $row['id'];
                            ?>  
                                <div class="card-container">
                                <div class="card" style='border: 1px solid #ccc; padding: 10px; margin: 10px;'>
                                    <img src="<?= htmlspecialchars($row['img']) ?>" alt="Imagem da Notícia" width="300" height="auto" style="float: left; margin-right: 10px; margin-top: 60px">
                                    <div style="overflow: hidden;">
                                        <h3><?= htmlspecialchars($row['title']) ?></h3>
                                        <hr>
                                        <br>
                                        <p><?= strlen($row['notice']) > 1100 ? substr(htmlspecialchars($row['notice']), 0, 900) . '... <a href="post.php?id=' . $id  . '">Leia Mais</a>' : htmlspecialchars($row['notice']) ?></p>
                                        <p>Autor: <?= htmlspecialchars($row['author']) ?></p>
                                        <p>Data de criação: <?= date('d/m/Y H:i', strtotime($row['date_create'])) ?></p>

                                    </div>
                                    <div style="clear: both;"></div>
                                </div>
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
    <?php include("mostreader.php") ?>

</body>
</html>
