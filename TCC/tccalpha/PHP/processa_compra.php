<?php
session_start();
$conn = new mysqli("localhost", "root", "", "jogo_store");
$userId = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $total = $_POST['total'];
    
    // Processar pagamento e gerar arquivo
    $file = fopen("recibo.txt", "w");
    fwrite($file, "Pagamento de R$$total realizado com sucesso!");
    fclose($file);
    
    // Adicionar jogos comprados à tabela de compras
    $conn->query("INSERT INTO compras (usuario_id, jogo_id) 
                   SELECT usuario_id, jogo_id 
                   FROM carrinho 
                   WHERE usuario_id = $userId");

    // Adicionar jogos à biblioteca
    $conn->query("INSERT INTO biblioteca (usuario_id, jogo_id) 
                   SELECT $userId, c.jogo_id 
                   FROM carrinho c 
                   WHERE c.usuario_id = $userId 
                   ON DUPLICATE KEY UPDATE jogo_id = c.jogo_id");

    // Limpar o carrinho após a compra
    $conn->query("DELETE FROM carrinho WHERE usuario_id = $userId");
    
    echo "Compra finalizada com sucesso!";
    header("Location: index.php");
}
?>
