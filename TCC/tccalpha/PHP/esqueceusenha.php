<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/loginx.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Vulcan</title>
</head>

<body>
    <header class="header">
        <a href="../HTML/home.html" class="logo">V U L C A N</a>
        <nav class="navbar">
            <a href="../HTML/home.html">Página Inicial</a>
            <a href="../HTML/store.html">Loja</a>
            <a href="../PHP/register.php">Conta</a>
        </nav>
    </header>

    <div class="credentials">

<form action="processa_esqueceu_senha.php" method="POST">
    <h1>RECUPERAR</h1>

    <div class="input-box">
        <input type="email" name="email" placeholder="E-mail" required>
        <i class='bx bxs-user'></i>
    </div>

    <div class="input-box">
        <input type="text" name="palavrapass" placeholder="Palavra de Segurança" required>
        <i class='bx bxs-lock-alt'></i>
    </div>

    <input type="submit" class="btn-login" name="submit" value="ENTRAR">

</form>

</div>
    
</body>
</html>