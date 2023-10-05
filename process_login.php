<?php
session_start(); // Inicia a sessão

// Inclua o arquivo de conexão com o banco de dados usando PDO
require("data/conn.php");

// Variáveis para armazenar erros
$errors = array();

// Verificação do formulário de login
if (isset($_POST['login_user'])) {
    // Obtém os dados do formulário
    $username = $_POST['username'];
    $password = $_POST['pass'];

    // Validação do formulário
    if (empty($username)) {
        array_push($errors, "Nome de usuário é obrigatório");
    }
    if (empty($password)) {
        array_push($errors, "Senha é obrigatória");
    }

    // Se não houver erros de validação, proceda com a autenticação usando PDO
    if (count($errors) == 0) {
        // Consulta SQL usando PDO para verificar o usuário e a senha
        $query = "SELECT * FROM user WHERE email = :username AND senha = :password";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->execute();

        if ($stmt->rowCount() == 1) {
            // O usuário foi autenticado com sucesso
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            $_SESSION['username'] = $username;
            $_SESSION['success'] = "Login bem-sucedido!";
            $_SESSION['nome_usuario'] = $user['nome'];
            header('location: home_gestNews.php'); // Redireciona para a página de destino
        } else {
            array_push($errors, "Credenciais inválidas. Tente novamente.");
        }
    }
}
?>
