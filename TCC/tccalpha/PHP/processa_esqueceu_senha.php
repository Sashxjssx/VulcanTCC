<?php
session_start();
$conn = new mysqli("localhost", "root", "", "jogo_store");

// Verificar a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Obter os dados do formulário
$email = $_POST['email'];
$palavrapass = $_POST['palavrapass'];

// Prevenir SQL Injection
$email = $conn->real_escape_string($email);
$palavrapass = $conn->real_escape_string($palavrapass);

// Verificar se o email e a palavrapass estão corretos
$sql = "SELECT * FROM usuarios WHERE email = '$email' AND palavrapass = '$palavrapass'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Login bem-sucedido
    $usuario = $result->fetch_assoc();
    $_SESSION['user_id'] = $usuario['id']; // Salva o ID do usuário na sessão
    header("Location: config.php"); // Redireciona para a página de configurações
    exit;
} else {
    // Login falhou
    echo "E-mail ou Palavra de Segurança incorretos!";
}
?>
