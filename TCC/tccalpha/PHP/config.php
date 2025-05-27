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
    if (isset($_POST['submit'])) {
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
            $user['email'] = $email;
            $user['bio'] = $bio;
            header("Location: perfil.php");
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
    <link rel="stylesheet" href="../CSS/configx.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="../JVSC/senhax.js" defer></script>
    <title>Vulcan - Configurações</title>
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
        <form method="POST">
            <h1>CONFIGURAÇÕES</h1>

            <?php if ($message): ?>
                <p class="message"><?= htmlspecialchars($message); ?></p>
            <?php endif; ?>

            <div class="user-photo">
                <img src="../ASSETS/userpfp.png" class="profile-photo">
            </div>

            <div class="input-box">
                <input type="text" name="nome" value="<?= htmlspecialchars($user['nome']); ?>" placeholder="Usuário" required>
                <i class='bx bxs-user'></i>
            </div>

            <div class="input-box">
                <input type="email" name="email" value="<?= htmlspecialchars($user['email']); ?>" placeholder="E-mail" required>
                <i class='bx bxs-envelope'></i>
            </div>

            <div class="input-box">
                <input type="password" id="password" name="senha" placeholder="Senha (Opcional)">
                <i class='bx bxs-show' id="togglePassword"></i>
            </div>

            <div class="input-box">
                <textarea name="bio" class="bio-usuario" rows="4" placeholder="Sua biografia..."><?= htmlspecialchars($user['bio']); ?></textarea>
            </div>

            <input type="submit" class="btn-register" name="submit" value="ATUALIZAR DADOS">

            <div class="login-link">
                <p><a href="logout.php">SAIR DA CONTA</a></p>
            </div>
        </form>
    </div>

</body>
</html>
