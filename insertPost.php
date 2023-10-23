<!DOCTYPE html>
<html>
<head>
    <title>Inserir Notícia</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        * {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            margin: 0px;
            padding: 0px;
        }

        body{
            width: 100%;
            height: 100vh;
            background-color: #f9bb74;
        }

        h2 {
            margin-top: 20px;
            text-align: center;
            color: white;
        }

        input[type="submit"] {
            border: none;
            background-color: #6c63ff;
            padding: 0.62rem;
            cursor: pointer;
            border-radius: 5px;
            color: #fff;
            width: 100%;
            margin-top: 2.5rem;
            border: none;
            
        }

        input[type="submit"]:hover {
            background-color: #f9bb74;
        }

        .container-dois{
            width: 80%;
            height: 80vh;
            display: flex;
            box-shadow: 5px 5px 10px rgba(0, 0, 0, .212);
            margin: 50px;
            
        }

        .form-image{
            width: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #6c63ff;
            padding: 1rem;
        }

        .form-image img{
            width: 31rem;
        }

        .form{
            width: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            background-color: #fff;
            padding: 3rem;
        }

        .input-group{
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            padding: 1rem 0;
        }

        .input-box{
            display: flex;
            flex-direction: column;
            margin-bottom: 1.1rem;
        }


        .input-box input{
            margin: 0.6rem 0;
            padding: 0.8rem 1.2rem;
            border: none;
            border-radius: 10px;
            box-shadow: 1px 1px 6px #0000001c;
            size: 500px;
        }
        
        @media screen and (max-width: 1330px) {
            .form-image{
                display: none;
            }    
            
            .container-dois{
                width: 50%;
            }

            .form {
                width: 100%;
            }
        }

        @media screen and (max-width: 1064px){

            .container-dois{
                width: 90%;
                height: auto;
            }

            .input-group{
                flex-direction:column;
                overflow-y: scroll;
                flex-wrap: nowrap;
                max-width: 10rem;
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
                        <input type="text" name="title" id="title" required><br><br>
                    </div>

                    <div class="input-box">
                        <label for="notice">Notícia:</label><br>
                        <textarea name="notice" id="notice" rows="4" cols="100" required></textarea><br><br>
                    </div>

                    <div class="input-box">
                        <label for="author">Autor:</label>
                        <input type="text" name="author" id="author" required><br><br>
                    </div>

                    <div class="input-box">
                        <label for="category">Categoria:</label>
                        <select name="category" id="category" required>
                            <option value="Politica">Política</option>
                            <option value="Policial">Policial</option>
                            <option value="Entretenimento">Entretenimento</option>
                            <option value="Outras">Outras</option>
                        </select><br><br>
                    </div>

                    <div class="input-box">
                        <label for="image">Imagem:</label>
                        <input type="file" name="image" id="image" accept="image/*" required><br><br>
                    </div>

                    <div class="input-box">
                        <label for="video">Código HTML do Vídeo:</label>
                        <textarea id="video" name="video" rows="2" cols="50"></textarea>
                    </div>

                    <div class="continue-button">
                        <input type="submit" value="Inserir Notícia">
                    </div>
                </div>
                </form>
            </div>
        </div>
</body>
</html>



<?php 
include_once("templates/rodape.php");
?>