<?php
session_start();
$conn = new mysqli("localhost", "root", "", "jogo_store");
$userId = $_SESSION['user_id'];
$jogoId = $_GET['id'];

// Verificar se o jogo já está no carrinho
$result = $conn->query("SELECT * FROM carrinho WHERE usuario_id = $userId AND jogo_id = $jogoId");
if ($result->num_rows == 0) {
    $conn->query("INSERT INTO carrinho (usuario_id, jogo_id) VALUES ($userId, $jogoId)");
    echo "Jogo adicionado ao carrinho!";
} else {
    echo "O jogo já está no carrinho!";
}
?>
