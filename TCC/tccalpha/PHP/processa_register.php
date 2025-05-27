<?php
session_start();
$conn = new mysqli("localhost", "root", "", "jogo_store");

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
$palavrapass = $_POST['palavrapass'];

$conn->query("INSERT INTO usuarios (nome, email, senha, palavrapass) VALUES ('$nome', '$email', '$senha','$palavrapass')");
header("Location: login.php");
?>
