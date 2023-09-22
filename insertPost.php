

<!DOCTYPE html>
<html>
<head>
    <title>Inserir Notícia</title>
</head>
<body>
    <h2>Inserir Notícia</h2>
    <form method="POST" action="process.php" enctype="multipart/form-data">
        <label for="title">Título:</label>
        <input type="text" name="title" id="title" required><br><br>

        <label for="notice">Notícia:</label><br>
        <textarea name="notice" id="notice" required></textarea><br><br>

        <label for="author">Autor:</label>
        <input type="text" name="author" id="author" required><br><br>


        <label for="category">Categoria:</label>
        <select name="category" id="category" required>
            <option value="Politica">Política</option>
            <option value="Policial">Policial</option>
            <option value="Entretenimento">Entretenimento</option>
            <option value="Outras">Outras</option>
        </select><br><br>

        <label for="image">Imagem:</label>
        <input type="file" name="image" id="image" accept="image/*" required><br><br>
        <label for="video">Código HTML do Vídeo:</label>
        <textarea id="video" name="video" rows="4" cols="50"></textarea>


        <input type="submit" value="Inserir Notícia">
    </form>
</body>
</html>


<?php 
include_once("templates/rodape.php");
?>