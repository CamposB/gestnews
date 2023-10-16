<!DOCTYPE html>
<html>
<head>
    <title>Inserir Notícia</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        label {
            display: block;
            margin-top: 10px;
        }

        input[type="text"],
        textarea,
        select {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="file"] {
            width: 100%;
            margin-top: 5px;
        }

        input[type="submit"] {
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
            margin-top: 10px;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
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