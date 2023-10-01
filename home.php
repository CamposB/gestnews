<?php 

require("data/conn.php");
require("templates/header.php");
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
    <link rel="stylesheet" type="text/css" href="fontawesome/fontawesome/css/all.min.css">

    <style>
        /* Estilos para o elemento .container-news */
        .container-news {
            background-color: #f9f9f9;
            padding: 20px;
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.2); /* Sombra */
            font-family: Arial, sans-serif; /* Escolha uma fonte legível */
        }

        /* Estilos para os elementos h2 e ul dentro de .container-news */
        .container-news h2 {
            color: #333;
            font-size: 28px; /* Aumente um pouco o tamanho do título */
            margin-bottom: 10px; /* Um espaçamento maior entre o título e a lista */
        }

        .container-news ul {
            margin-left: 20px;
            margin-bottom: 5px;
            transition: color 0.3s ease; /* Transição de cor suave */
            list-style-type: none; /* Remover marcadores padrão */
            padding-left: 0;
        }

        .container-news li {
            margin-bottom: 10px;
            padding: 10px;
            border-radius: 5px; /* Cantos arredondados */
        }

        .container-news li:hover {
            color: rgb(170, 11, 11); /* Cor diferente ao passar o mouse */
        }

        .container-news li:before {
            content: "\2713"; /* Símbolo de marca de seleção como marcador */
            margin-right: 5px;
            color: #ff5733; /* Cor para o marcador */
        }

    </style>
    
</head>

<body>
<<<<<<< HEAD
=======
    <header>
        <div class="navbar-top">
                <a href="https://www.youtube.com/seucanal" target="_blank" rel="noopener noreferrer"><i class="fab fa-youtube icon-red"></i></a>
                <a href="https://www.instagram.com/seuinstagram" target="_blank" rel="noopener noreferrer"><i class="fab fa-instagram icon-red"></i></a>
                <a href="https://www.tiktok.com/seutiktok" target="_blank" rel="noopener noreferrer"><i class="fab fa-tiktok icon-red"></i></a>
                <a href="https://www.facebook.com/seufacebook" target="_blank" rel="noopener noreferrer"><i class="fab fa-facebook icon-red"></i></a>
        </div>

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

        <div class="navbar-bottom">
            <a href="#">Categoria 1</a>
            <a href="#">Categoria 2</a>
            <a href="#">Categoria 3</a>
        </div>

    </header>
>>>>>>> c1fdb809c28ddc7d2409b4c904bd910469e9bc7b
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
