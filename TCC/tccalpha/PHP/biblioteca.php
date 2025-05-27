<?php
session_start();
$conn = new mysqli("localhost", "root", "", "jogo_store");
$userId = $_SESSION['user_id'];

// Query para buscar os itens no carrinho do usuário
$biblioteca = $conn->query("SELECT jogos.* FROM biblioteca JOIN jogos ON biblioteca.jogo_id = jogos.id WHERE biblioteca.usuario_id = $userId");
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/libraryx.css">
    <title>Vulcan - Biblioteca</title>
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

<div class="small-container">
    <div class="endoskeleton">
        <!-- Cabeçalho -->

        <!-- Container dos jogos -->
        <div class="row">
            <?php while ($row = $biblioteca->fetch_assoc()): ?>
                <div class="col-4">
                    <div class="card">
                        <div class="imgBx">
                            <img src="<?php echo $row['imagem']; ?>" alt="Imagem do produto">
                        </div>
                        <h4><?php echo $row['nome']; ?></h4>
                        <h1>Adquirido</h1>
                        <a href="download.php?id=<?php echo $row['id']; ?>" class="btn-download">BAIXAR</a>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</div>

</body>
</html>
