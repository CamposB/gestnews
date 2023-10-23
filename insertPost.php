<!DOCTYPE html>
<html>
<head>
    <title>Inserir Notícia</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        * {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            margin: 0;
            padding: 0;
        }

        body {
            width: 100%;
            min-height: 100vh;
            background-color: #f9bb74;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        h2 {
            margin-top: 20px;
            text-align: center;
            color: white;
        }

        .container-dois {
            width: 80%;
            min-height: 80vh;
            display: flex;
            box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.212);
            margin: 50px;
            background: white;
            border-radius: 15px;
            overflow: hidden;
        }

        .form-image {
            width: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #6c63ff;
            padding: 1rem;
        }

        .form-image img {
            width: 80%;
            max-width: 300px;
        }

        .form {
            width: 50%;
            display: flex;
            flex-direction: column;
            padding: 2rem;
        }

        .input-group {
            display: flex;
            flex-wrap: wrap;
        }

        .input-box {
            flex: 1;
            display: flex;
            flex-direction: column;
            margin: 1.1rem;
        }

        .input-box label {
            font-weight: bold;
        }

        .input-box input, .input-box textarea, .input-box select {
            margin: 0.6rem 0;
            padding: 0.8rem 1.2rem;
            border: none;
            border-radius: 10px;
            box-shadow: 1px 1px 6px #0000001c;
        }

        input[type="file"] {
            padding: 0;
        }

        input[type="submit"] {
            border: none;
            background-color: #6c63ff;
            padding: 0.62rem;
            cursor: pointer;
            border-radius: 10px;
            color: #fff;
            width: 100%;
            margin-top: 2.5rem;
        }

        input[type="submit"]:hover {
            background-color: #f9bb74;
        }

        @media screen and (max-width: 1330px) {
            .form-image {
                display: none;
            }

            .container-dois {
                width: 80%;
            }

            .form {
                width: 100%;
            }
        }

        @media screen and (max-width: 1064px) {
            .container-dois {
                width: 90%;
                min-height: auto;
            }

            .input-group {
                flex-direction: column;
            }
        }

        @media screen and (max-width: 768px) {
            .container-dois {
                flex-direction: column;
                width: 100%;
            }

            .form {
                width: 100%;
                padding: 2rem; /* Aumente o preenchimento do formulário */
            }

            .input-box input,
            .input-box textarea,
            .input-box select {
                width: 100%;
                padding: 1rem; /* Aumente o preenchimento dos elementos do formulário */
                margin: 0.5rem 0; /* Aumente a margem entre os elementos do formulário */
            }
        }

    </style>
</head>
<body>
    <h2>Inserir Notícia</h2>
    <div class="container-dois">
        <div class="form-image">
            <img src="images/undraw_businessman_e7v0.svg">
        </div>
        <div class="form">
            <form method="POST" action="process.php" enctype="multipart/form-data">
                <div class="input-group">
                    <div class="input-box">
                        <label for="title">Título:</label>
                        <input type="text" name="title" id="title" required>
                    </div>

                    <div class="input-box">
                        <label for="notice">Notícia:</label>
                        <textarea name="notice" id="notice" rows="4" cols="50" style="resize: none" required></textarea>
                    </div>

                    <div class="input-box">
                        <label for="author">Autor:</label>
                        <input type="text" name="author" id="author" required>
                    </div>

                    <div class="input-box">
                        <label for="category">Categoria:</label>
                        <select name="category" id="category" required>
                            <option value="Politica">Política</option>
                            <option value="Policial">Policial</option>
                            <option value="Entretenimento">Entretenimento</option>
                            <option value="Outras">Outras</option>
                        </select>
                    </div>

                    <div class="input-box">
                        <label for="image">Imagem:</label>
                        <input type="file" name="image" id="image" accept="image/*" required>
                    </div>

                    <div class="input-box">
                        <label for="video">Código HTML do Vídeo:</label>
                        <textarea id="video" name="video" rows="2"></textarea>
                    </div>

                    <input type="submit" value="Inserir Notícia">
                </div>
            </form>
        </div>
    </div>
</body>
</html>
