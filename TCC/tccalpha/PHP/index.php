<?php
// Conexão com o banco de dados
$host = 'localhost';
$dbname = 'jogo_store';
$username = 'root';
$password = '';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erro ao conectar: " . $e->getMessage();
    exit;
}

// Categorias de jogos (Exemplo: grupos definidos manualmente com IDs)
$grupos = [
    "Jogos Novos" => [1, 20, 15, 16], // IDs dos jogos da categoria "Mais Vendidos"
    "Mais Populares" => [15, 12, 17, 8],    // IDs dos jogos da categoria "Novidades"
    "Jogos Gratuitos" => [6, 7, 14, 18],    // IDs dos jogos da categoria "Promoções"
];

// Função para buscar jogos por IDs
function buscarJogosPorIds($conn, $ids) {
    if (empty($ids)) return [];
    $placeholders = implode(',', array_fill(0, count($ids), '?'));
    $sql = "SELECT id, nome, preco, imagem FROM jogos WHERE id IN ($placeholders)";
    $stmt = $conn->prepare($sql);
    $stmt->execute($ids);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/indexphpk.css">
    <title>Vulcan - Início</title>
</head>

<body>
<header class="header">
    <a href="index.php" class="logo">V U L C A N</a>
    <nav class="navbar">
        <a href="index.php">Página Inicial</a>
        <a href="store.php">Loja</a>
        <a href="biblioteca.php">Biblioteca</a>
        <a href="carrinho.php">Carrinho</a>
        <a href="perfil.php">Perfil</a>
        <a href="logout.php">Sair</a>
    </nav>
</header>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

<div class="games-container">
    <?php foreach ($grupos as $titulo => $ids): ?>
        <div class="game-section">
            <h2 class="section-title"><?= htmlspecialchars($titulo) ?></h2>
            <div class="games-row">
                <?php
                $jogos = buscarJogosPorIds($conn, $ids);
                foreach ($jogos as $jogo): ?>
                    <a href="jogo.php?id=<?= htmlspecialchars($jogo['id']) ?>" class="game-card">
                        <img src="<?= htmlspecialchars($jogo['imagem']) ?>" alt="<?= htmlspecialchars($jogo['nome']) ?>">
                        <div class="game-title"><?= htmlspecialchars($jogo['nome']) ?></div>
                        <div class="game-price">R$ <?= number_format($jogo['preco'], 2, ',', '.') ?></div>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endforeach; ?>
</div>

</body>
</html>
