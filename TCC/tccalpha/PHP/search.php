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

// Receber a consulta da URL
$query = isset($_GET['q']) ? $_GET['q'] : '';

// Consultar jogos com base na pesquisa
$sql = "SELECT id, nome, preco, imagem FROM jogos WHERE nome LIKE ? LIMIT 10";
$stmt = $conn->prepare($sql);
$searchTerm = "%" . $query . "%";
$stmt->bind_param('s', $searchTerm);
$stmt->execute();
$result = $stmt->get_result();

// Criar array de resultados
$games = [];
while ($row = $result->fetch_assoc()) {
    $games[] = $row;
}

// Retornar os resultados em formato JSON
header('Content-Type: application/json');
echo json_encode($games);

$stmt->close();
$conn->close();
?>
