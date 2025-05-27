<?php
session_start();
$conn = new mysqli("localhost", "root", "", "jogo_store");

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Verificar se o usuário está logado
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];
$message = "";

// Obter dados do usuário
$sql = "SELECT nome, email, bio FROM usuarios WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc(); // Nome, email e bio do usuário

// Atualizar dados do usuário
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['update'])) {
        $nome = $conn->real_escape_string($_POST['nome']);
        $email = $conn->real_escape_string($_POST['email']);
        $bio = $conn->real_escape_string($_POST['bio']);
        $senha = !empty($_POST['senha']) ? password_hash($_POST['senha'], PASSWORD_DEFAULT) : null;

        $sql = "UPDATE usuarios SET nome = ?, email = ?, bio = ?" . ($senha ? ", senha = ?" : "") . " WHERE id = ?";
        $stmt = $conn->prepare($sql);

        if ($senha) {
            $stmt->bind_param("ssssi", $nome, $email, $bio, $senha, $user_id);
        } else {
            $stmt->bind_param("sssi", $nome, $email, $bio, $user_id);
        }

        if ($stmt->execute()) {
            $message = "Dados atualizados com sucesso!";
            $user['nome'] = $nome;
            $user['bio'] = $bio; // Atualizar localmente
        } else {
            $message = "Erro ao atualizar os dados!";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/perfilx.css">
    <title>Vulcan - Meu Perfil</title>
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

    <div class="credentials">
        <h1>MEU PERFIL</h1>

        <div class="user-photo">
            <img src="../ASSETS/userpfp.png" class="profile-photo">
        </div>

        <div class="user-alias">
            <!-- Exibe o nome do usuário -->
            <h5 class="nickname"><?= htmlspecialchars($user['nome']); ?></h5>
            
        </div>

        <div class="user-aboutme">
            <h6 class="aboutme-title">SOBRE MIM</h6>
            <!-- Exibe a biografia do usuário -->
            <h7 class="aboutme"><?= htmlspecialchars($user['bio'] ?: "Sem informações no momento."); ?></h7>
        </div>

        <?php if ($message): ?>
            <p class="message"><?= htmlspecialchars($message); ?></p>
        <?php endif; ?>

        <a href="../PHP/config.php"><button class="btn-config">CONFIGURAÇÕES</button></a>

    </div>

</body>
</html>
