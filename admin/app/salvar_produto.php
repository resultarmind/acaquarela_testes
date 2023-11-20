<?php

session_start();

// Verifique se o usuário está autenticado
if (!isset($_SESSION["username"])) {
    header("Location: login/login.php"); // Redirecione para a página de login se o usuário não estiver autenticado
    exit();
}

include_once 'config/conection.php';

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Check the database connection
    if ($conn->connect_error) {
        die("Erro na conexão com o banco de dados: " . $conn->connect_error);
    }

    // Retrieve form data
    $nome = $_POST['nomeProduto'];
    $categoria = $_POST['categoriaProduto'];
    $link = $_POST['linkProduto'];
    $descricao = $_POST['descricaoProduto'];
    $preco_anterior = $_POST['precoAnterior'];
    $preco_atual = $_POST['precoAtual'];

    // Generate a unique file name for the image
    $imagemName = uniqid() . '_' . $_FILES['imagemProduto']['name'];
    $uploadDir = '../../images/BD/';
    $imagemPath = $uploadDir . $imagemName;

    // Move the uploaded image to the destination directory
    if (move_uploaded_file($_FILES['imagemProduto']['tmp_name'], $imagemPath)) {
        // Insert data into the database
        $sql = "INSERT INTO produtos_recomendados (nome, categoria, link, descricao, preco_anterior, preco_atual, imagem) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssdds", $nome, $categoria, $link, $descricao, $preco_anterior, $preco_atual, $imagemName);

        if ($stmt->execute()) {
            echo "Produto adicionado com sucesso.";
        } else {
            echo "Erro ao adicionar o produto: " . $stmt->error;
        }

        // Close the prepared statement
        $stmt->close();
    } else {
        echo "Erro ao fazer upload da imagem.";
    }

    // Close the database connection
    $conn->close();
} else {
    // If the form was not submitted, redirect to the form page
    header("Location: view.php");
    exit;
}
