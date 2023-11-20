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
    // Recupere os dados do formulário
    $titulo = $_POST["titulo"];
    // Verifique se um arquivo de imagem foi enviado
    if ($_FILES["imagem"]["error"] === 0) {
        $imagem_tmp = $_FILES["imagem"]["tmp_name"];
        $imagem_nome = $_FILES["imagem"]["name"];
        $imagem_tipo = $_FILES["imagem"]["type"];

        // Diretório onde a imagem será armazenada (ajuste conforme necessário)
        $diretorio_destino = "../../images/BD/";

        // Gere um nome único para a imagem
        $nome_imagem = uniqid() . "_" . $imagem_nome;

        // Movimente o arquivo para o diretório de destino
        if (move_uploaded_file($imagem_tmp, $diretorio_destino . $nome_imagem)) {
            // Insira os dados no banco de dados
            $sql = "INSERT INTO slides (titulo, imagem) VALUES ('$titulo', '$nome_imagem')";

            if ($conn->query($sql) === true) {
                echo "Slide adicionado com sucesso!";

                // Redirecione para a página "view_slide.php"
                header("Location: view_slide.php");
            } else {
                echo "Erro ao adicionar o slide: " . $conn->error;
            }
        } else {
            echo "Erro ao fazer o upload da imagem.";
        }
    } else {
        echo "Nenhum arquivo de imagem foi enviado.";
    }

    // Feche a conexão com o banco de dados
    $conn->close();
} else {
    // Redirecione para a página do formulário se o formulário não foi enviado
    header("Location: view_slide.php");
}
