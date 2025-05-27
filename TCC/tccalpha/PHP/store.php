<?php
session_start();

// Verificar se o usuário está logado
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Conectar ao banco de dados
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'jogo_store';

$conn = new mysqli($host, $user, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

// Consulta inicial para exibir jogos
$sql = "SELECT id, nome, preco, imagem FROM jogos LIMIT 10";
$result = $conn->query($sql);

// Verificar se a consulta foi executada com sucesso
if ($result === false) {
    die("Erro na consulta SQL: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/storephpk.css">
    <script type="text/javascript" src="../JVSC/barrak.js"></script>
    <title>Vulcan - Loja</title>
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
        <div class="row">
            <div class="col-4">

                <!-- Barra de Pesquisa -->
                <center><input id="searchbar" class="searchBar" type="text" placeholder="Pesquisar" onkeyup="searchGames()"></center>

                <!-- Contêiner de resultados da busca -->
                <center><div id="resultsContainer" class="results-container"></div></center>
                
                <br>
                <br>

            </div>
        </div>
    </div>

</body>

</html>
