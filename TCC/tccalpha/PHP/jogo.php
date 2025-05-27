<?php
session_start();
$conn = new mysqli("localhost", "root", "", "jogo_store");

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

$jogoId = $_GET['id'];
$jogo = $conn->query("SELECT * FROM jogos WHERE id = $jogoId")->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vulcan - <?php echo $jogo['nome']; ?></title>
    <link rel="stylesheet" href="../CSS/gamesphpo.css">
</head>
<body>


    <div class="header">
        <a href="index.php" class="logo">V U L C A N</a>
        <nav class="navbar">
            <a href="index.php">Página Inicial</a>
            <a href="store.php">Loja</a>
            <a href="biblioteca.php">Biblioteca</a>
            <a href="carrinho.php">Carrinho</a>
            <a href="perfil.php">Perfil</a>
            <a href="logout.php">Sair</a>
        </nav>
    </div>

    <div class="small-container">
        <div class="row">
            <div class="col-4">
                <img src="<?php echo $jogo['imagem_banner']; ?>" alt="<?php echo $jogo['nome']; ?>" class="game-img"/>
                <p class="description"><?php echo $jogo['descricao']; ?></p> <!-- Adicione a descrição aqui -->
                <p class="price">R$ <?php echo $jogo['preco']; ?></p>
                <button onclick="addToCart(<?php echo $jogo['id']; ?>)" class="add-carrinho">ADICIONAR AO CARRINHO</button>
            </div>
        </div>

    </div>

    <script>
        function addToCart(jogoId) {
            fetch('add_to_cart.php?id=' + jogoId)
                .then(response => response.text())
                .then(data => alert(data));
        }

    </script>
</body>
</html>
