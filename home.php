<?php 

require("data/conn.php");

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
                    <img src="img/GestNews.png" alt="Anúncio" style="max-width: 100%; height: auto;">
                </div>
            </div>

        </div>

        <div class="navbar-bottom">
            <a href="?category=Politica">Política</a> |
            <a href="?category=Policial">Policial</a> |
            <a href="?category=Entretenimento">Entretenimento</a> |
            <a href="?category=Diversos">Diversos</a> |
            <a href="?category=Todas">Todas</a>
        </div>

    </header>

    <div>
        <?php
            require("listanoticias.php")
            
        ?>
    </div>
    
    <?php include("mostreader.php") ?>

    

</body>
</html>
