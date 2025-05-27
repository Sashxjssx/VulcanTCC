<?php

    if(isset($_POST["submit"]))
    {
       // print_r($_POST['nome']);
       // print_r($_POST['email']);
       // print_r($_POST['senha']);
        
       include_once('config.php');

       $nome = $_POST['nome'];
       $email = $_POST['email'];
       $senha = $_POST['senha'];

       $result = mysqli_query($conexao, "INSERT INTO usuarios(nome,email,senha) VALUES('$nome','$email','$senha')");
       header('Location: login.php');
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/registerk.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="../JVSC/senhax.js" defer></script>
    <title>Vulcan</title>
</head>

<body>
    <header class="header">
        <a href="../HTML/home.html" class="logo">V U L C A N</a>
        <nav class="navbar">
            <a href="../HTML/home.html">Página Inicial</a>
            <a href="../HTML/store.html">Loja</a>
            <a href="../PHP/login.php">Conta</a>
        </nav>
    </header>

    <div class="credentials">

        <form action="processa_register.php" method="POST">
            <h1>CADASTRAR</h1>

            <div class="input-box">
                <input type="text" name="nome" placeholder="Nome de Usuário" required>
                <i class='bx bxs-user'></i>
            </div>

            <div class="input-box">
                <input type="email" name="email" placeholder="E-mail" required>
                <i class='bx bxs-envelope'></i>
            </div>

            <div class="input-box">
                <input type="password" id="password" name="senha" placeholder="Senha" required>
                <i class='bx bxs-show' id="togglePassword"></i>
            </div>

            <div class="input-box">
                <input type="text" name="palavrapass" placeholder="Palavra de Segurança" required>
                <i class='bx bxs-lock-alt'></i>
            </div>

            <div class="accept-me">
                <label><input type="checkbox" required> Eu aceito os Termos</label>
                <a href="../INFOS/TermosDeUso.docx" download>Ver Termos</a>
            </div>

            <input type="submit" class="btn-register" name="submit" value="CADASTRAR">

            <div class="login-link">
                <p>Já possui uma conta? <a href="../PHP/login.php">ENTRAR</a></p>
            </div>

        </form>

    </div>
    
</body>

</html>