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
            <a href="?category=Politica">Política</a> |
            <a href="?category=Policial">Policial</a> |
            <a href="?category=Entretenimento">Entretenimento</a> |
            <a href="?category=Diversos">Diversos</a> |
            <a href="?category=Todas">Todas</a>
        </div>

        <?php

            try {
                require_once("data/conn.php");

                // Verifica se o parâmetro "category" está presente na URL
                if (isset($_GET['category'])) {
                    $category = $_GET['category'];

                    // Consulta SQL para selecionar as notícias com base na categoria
                    $sql = "SELECT * FROM post WHERE category = :category";
                    $stmt = $pdo->prepare($sql);
                    $stmt->bindParam(':category', $category);
                    $stmt->execute();
                } else {
                    // Se o parâmetro "category" não estiver presente, consulta todas as notícias
                    $sql = "SELECT * FROM post";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute();
                }

                // Exibe as notícias encontradas
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $title = htmlspecialchars($row['title']);
                    $id = $row['id'];
                    ?>
                    <!DOCTYPE html>
                    <html>
                    <head>
                        <meta charset="UTF-8">
                        <title><?= htmlspecialchars($row['title']) ?></title>
                    </head>
                    <body>
                        <h3><a href="post.php?id=<?= $id ?>"><?= $title ?></a></h3>
                        <p>Autor: <?= htmlspecialchars($row['author']) ?></p>
                        <p><?= htmlspecialchars($row['notice']) ?></p>
                    </body>
                    </html>
                    <?php
                }
            } catch (PDOException $e) {
                echo "Erro ao buscar notícias: " . $e->getMessage();
            }

            include "templates/rodape.php";
        ?>


    </header>
</body>
</html>
