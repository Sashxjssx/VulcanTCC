<?php
session_start();
$conn = new mysqli("localhost", "root", "", "jogo_store");

// Verificar se a requisição foi feita por POST
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['jogo_id'])) {
    $jogo_id = $_POST['jogo_id'];
    $userId = $_SESSION['user_id'];

    // Preparar a query para remover o item do carrinho
    $query = "DELETE FROM carrinho WHERE jogo_id = ? AND usuario_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ii", $jogo_id, $userId);

    // Executar a query
    if ($stmt->execute()) {
        // Redirecionar de volta para a página do carrinho
        header("Location: carrinho.php");
        exit();
    } else {
        echo "Erro ao remover o item do carrinho!";
    }

    $stmt->close();
}

$conn->close();
?>
