<?php 
include_once("templates/header.php");
require("data/conn.php");
require("data/process.php")
?>

<!DOCTYPE html>
<html>
<head>
    <title>Inserir Notícia</title>
</head>
<body>
    <h2>Inserir Notícia</h2>
    <form method="POST" action="data/process.php">
        <label for="title">Título:</label>
        <input type="text" name="title" id="title" required><br><br>

        <label for="notice">Notícia:</label><br>
        <textarea name="notice" id="notice" required></textarea><br><br>

        <label for="author">Autor:</label>
        <input type="text" name="author" id="author" required><br><br>

        <input type="submit" value="Inserir Notícia">
    </form>
</body>
</html>
<?php 
include_once("templates/rodape.php");
?>