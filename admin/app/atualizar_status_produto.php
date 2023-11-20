<?php

// Obter os dados da solicitação AJAX
$id = $_POST["id"];
$status = $_POST["status"];

// Conectar ao banco de dados
include_once("config/conection.php");
// Atualizar o status do produto
$sql = "UPDATE produtos SET status = $status WHERE id = $id";
$conn->query($sql);

// Fechar a conexão com o banco de dados
$conn->close();

// Retornar o status atualizado
echo $status;

?>
