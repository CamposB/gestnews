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
    <style>
        /* Adicione estilos CSS aqui */
        body {
            font-family: 'Nunito Sans', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .navbar-top {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px 0;
        }

        .navbar-top a {
            color: #fff;
            text-decoration: none;
            margin: 0 10px;
        }

        .navbar-bottom {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px 0;
        }

        .navbar-bottom a {
            color: #fff;
            text-decoration: none;
            margin: 0 10px;
        }

        .content {
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 8px;
            margin: 20px 0;
            padding: 20px;
        }

        .content h1 {
            font-size: 28px;
            margin-top: 0;
        }

        .content p {
            font-size: 16px;
            line-height: 1.5;
            margin-bottom: 20px;
        }

        .content iframe {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>
<body>
    <header>
        <!-- Conteúdo da página -->
        <div class="container">
            <?php
            require_once("data/conn.php");
            require("templates/header.php");
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
                        <div class="">
                            <h1><?= htmlspecialchars($row['title']) ?></h1>
                            <?php
                            // Verifica se a notícia possui um campo "video" preenchido
                            if (!empty($row['video'])) {
                                // Exibe o vídeo incorporado usando o código HTML do iframe
                                echo $row['video'];
                            }
                            ?>
                            <p><?= htmlspecialchars($row['notice']) ?></p>
                            <hr>
                            <p>Autor: <?= htmlspecialchars($row['author']) ?></p>
                            <p>Data de criação: <?= date('d/m/Y H:i', strtotime($row['date_create'])) ?></p>
                        </div>
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
        </div> <!-- Fim do container -->
    </header>
</body>
</html>
