<?php

session_start();

// Verifique se o usuário está autenticado
if (!isset($_SESSION["username"])) {
    header("Location: login/login.php"); // Redirecione para a página de login se o usuário não estiver autenticado
    exit();
}

// Include the database connection
include_once "config/conection.php";

if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtenha o ID do produto recomendado a ser excluído do POST
    $produtoId = $_POST["id"];

    // Execute a consulta SQL para excluir o produto recomendado
    $query = "DELETE FROM produtos_recomendados WHERE id = $produtoId";
    $resultado = $conn->query($query);

    if (!$resultado) {
        // Lida com erros na consulta, se houver algum
        die("Erro na exclusão do produto recomendado: " . $conn->error);
    }

    // Feche a conexão com o banco de dados
    $conn->close();
} else {
    // Redirecione para a página de lista de produtos recomendados se a solicitação não for POST
    header("Location: view.php");
}
