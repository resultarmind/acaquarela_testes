<?php

session_start();

// Verifique se o usuário está autenticado
if (!isset($_SESSION["username"])) {
    header("Location: login/login.php"); // Redirecione para a página de login se o usuário não estiver autenticado
    exit();
}

include_once "config/conection.php";

if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtenha o ID do slide a ser excluído do POST
    $slideId = $_POST["id"];

    // Execute a consulta SQL para excluir o slide
    $query = "DELETE FROM slides WHERE id = $slideId";
    $resultado = $conn->query($query);

    if (!$resultado) {
        // Lida com erros na consulta, se houver algum
        die("Erro na exclusão do slide: " . $conn->error);
    }

    // Feche a conexão com o banco de dados
    $conn->close();
} else {
    // Redirecione para a página de lista de slides se a solicitação não for POST
    header("Location: view.php");
}
