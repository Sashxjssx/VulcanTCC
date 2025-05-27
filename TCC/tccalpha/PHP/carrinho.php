<?php
session_start();
$conn = new mysqli("localhost", "root", "", "jogo_store");
$userId = $_SESSION['user_id'];

// Query para buscar os itens no carrinho do usuário
$carrinho = $conn->query("SELECT jogos.*, carrinho.quantidade FROM carrinho JOIN jogos ON carrinho.jogo_id = jogos.id WHERE carrinho.usuario_id = $userId");
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/carrinhox.css">
    <title>Vulcan - Carrinho</title>
</head>
<body>
<header class="header">
    <a href="index.php" class="logo">V U L C A N</a>
    <nav class="navbar">
        <a href="index.php">Página Inicial</a>
        <a href="../PHP/index.php">Loja</a>
        <a href="biblioteca.php">Biblioteca</a>
        <a href="carrinho.php">Carrinho</a>
        <a href="perfil.php">Perfil</a>
        <a href="logout.php">Sair</a>
    </nav>
</header>

<main class="cart-container">
    <h2 class="cart-title">CARRINHO</h2>
    <ul class="cart-items">
        <?php 
        $total = 0; 
        while ($row = $carrinho->fetch_assoc()): 
        ?>
        <li class="cart-item">
            <div class="item-details">
                <img src="<?= htmlspecialchars($row['imagem']) ?>" alt="<?= htmlspecialchars($row['nome']) ?>" class="item-image">
                <div class="item-info">
                    <h3 class="item-name"><?= htmlspecialchars($row['nome']) ?></h3>
                    <p class="item-price">R$<?= number_format($row['preco'], 2, ',', '.') ?></p>
                </div>
            </div>
            <form action="remover_do_carrinho.php" method="POST" class="remove-form">
                <input type="hidden" name="jogo_id" value="<?= htmlspecialchars($row['id']) ?>">
                <button type="submit" class="remove-button">REMOVER</button>
            </form>
        </li>
        <?php 
        $total += $row['preco'] * $row['quantidade']; 
        endwhile; 
        ?>
    </ul>
    <div class="cart-summary">
        <h2>Total: R$<?= number_format($total, 2, ',', '.') ?></h2>
        <div class="payment-options">
            <a href="caminho/para/pix.ext" download><button class="pix-button">CARTÃO</button></a>
            <a href="caminho/para/boleto.ext" download><button class="boleto-button">BOLETO</button></a>
        </div>
        <form action="processa_compra.php" method="POST" class="checkout-form">
            <input type="hidden" name="total" value="<?= htmlspecialchars($total) ?>">
            <label><input type="checkbox" required> Confirmar Pagamento</label>
            <button type="submit" class="checkout-button">FINALIZAR COMPRA</button>
        </form>
    </div>
</main>

</body>
</html>
