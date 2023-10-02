<?php
// Configurações do banco de dados
$host = "154.49.247.204"; // Host do banco de dados (geralmente localhost)
$usuario = "u821734860_projacks"; // Nome de usuário do banco de dados
$senha = "Nossaradio@90"; // Senha do banco de dados (deixe em branco neste caso)
$banco_de_dados = "u821734860_nossaradio"; // Nome do banco de dados

try {
    // Cria uma conexão PDO com o banco de dados
    $pdo = new PDO("mysql:host=$host;dbname=$banco_de_dados", $usuario, $senha);
    // Configura o PDO para lançar exceções em caso de erros
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Outras configurações do PDO, se necessário
    // ...

} catch (PDOException $e) {
    // Em caso de erro na conexão, exibe uma mensagem de erro
    die("Erro na conexão com o banco de dados: " . $e->getMessage());
}
?>
