<?php
require_once("conn.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST["title"];
    $notice = $_POST["notice"];
    $author = $_POST["author"];

    try {
        // Prepara a instrução SQL para inserção de dados
        $sql = "INSERT INTO post (title, notice, author) VALUES (:title, :notice, :author)";
        $stmt = $pdo->prepare($sql);

        // Associa os valores aos parâmetros da consulta
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':notice', $notice);
        $stmt->bindParam(':author', $author);

        // Executa a consulta
        $stmt->execute();

        echo "Notícia inserida com sucesso!";
    } catch (PDOException $e) {
        echo "Erro ao inserir notícia: " . $e->getMessage();
    }
}
?>
