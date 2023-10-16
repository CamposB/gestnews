<?php
    session_start(); // Inicia a sessão (se já não estiver iniciada)

    // Verifica se o usuário está logado
    if (isset($_SESSION['username'])) {
        // Destroi todas as variáveis de sessão
        session_destroy();
        
        // Redireciona para a página de login ou qualquer outra página de sua escolha após o logoff
        $_SESSION['unsuccess'] = "";
        header('Location: login.php'); // Altere "login.php" para a página desejada
        exit();
        
    } else {
        // Caso o usuário não esteja logado, você pode redirecioná-lo para a página inicial ou fazer outra ação apropriada
        header('Location: login.php'); // Altere "index.php" para a página desejada
        exit();
    }
?>
