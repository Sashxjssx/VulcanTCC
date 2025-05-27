<?php
session_start();
$conn = new mysqli("localhost", "root", "", "jogo_store");

$email = $_POST['email'];
$senha = $_POST['senha'];

$result = $conn->query("SELECT * FROM usuarios WHERE email = '$email'");

if ($result->num_rows > 0) {
    $usuario = $result->fetch_assoc();
    if (password_verify($senha, $usuario['senha'])) {
        $_SESSION['user_id'] = $usuario['id'];
        header("Location: index.php");
    } else {
        echo "Senha incorreta!";
    }
} else {
    echo "Usuário não encontrado!";
}
?>
