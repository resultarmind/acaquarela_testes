<?php
session_start();

// Inclua o arquivo de configuração do banco de dados
include_once "../config/conection.php";

// Verifique se o formulário de login foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["pass"]; // O nome do campo de senha deve corresponder ao 'name' no formulário

    // Consulta para verificar as credenciais do usuário
    $sql = "SELECT id, username, password FROM usuarios WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            $hashedPassword = $row["password"];

            // Verifique se a senha fornecida corresponde à senha hashizada
            if (password_verify($password, $hashedPassword)) {
                // Autenticação bem-sucedida, crie uma sessão para o usuário
                $_SESSION["username"] = $username;
                header("Location: ../index.php"); // Redirecione para a página do painel após o login
                exit();
            }
        }
    }

    // Se as credenciais não forem válidas, redirecione de volta para a página de login com uma mensagem de erro
    header("Location: login.php?error=1");
}
