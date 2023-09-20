<?php
require_once("data/conn.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST["title"];
    $notice = $_POST["notice"];
    $author = $_POST["author"];
    $category = $_POST["category"]; // Adiciona a coleta da categoria

    // Verifica se um arquivo de imagem foi enviado
    if (isset($_FILES["image"])) {
        $uploadDir = "img/"; // Pasta 'img' na raiz do sistema
        $uploadFile = $uploadDir . basename($_FILES["image"]["name"]);

        // Move o arquivo para a pasta de destino
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $uploadFile)) {
            try {
                // Prepara a instrução SQL para inserção de dados
                $sql = "INSERT INTO post (title, notice, author, img, category) VALUES (:title, :notice, :author, :img, :category)";
                $stmt = $pdo->prepare($sql);

                // Associa os valores aos parâmetros da consulta
                $stmt->bindParam(':title', $title);
                $stmt->bindParam(':notice', $notice);
                $stmt->bindParam(':author', $author);
                $stmt->bindParam(':img', $uploadFile); // Armazena o caminho relativo
                $stmt->bindParam(':category', $category); // Insere a categoria

                // Executa a consulta
                $stmt->execute();

                echo "Notícia inserida com sucesso!";
            } catch (PDOException $e) {
                echo "Erro ao inserir notícia: " . $e->getMessage();
            }
        } else {
            echo "Erro ao fazer upload do arquivo.";
        }
    }
}
?>
