<?php

session_start();

// Verifique se o usuário está autenticado
if (!isset($_SESSION["username"])) {
    header("Location: login/login.php"); // Redirecione para a página de login se o usuário não estiver autenticado
    exit();
}

include_once 'config/conection.php';

if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

$titulo = $_POST['titulo'];
$marca = $_POST['marca'];
$categoria = $_POST['categoria'];
$desconto = $_POST['desconto'];
$tamanhos = !empty($_POST['tamanho']) ? implode(', ', $_POST['tamanho']) : null;
$valorSemDesconto = $_POST['valorSemDesconto'];
$valorComDesconto = $_POST['valorComDesconto'];
$material = !empty($_POST['material']) ? $_POST['material'] : null;
$solado = !empty($_POST['solado']) ? $_POST['solado'] : null;
$referencia = !empty($_POST['referencia']) ? $_POST['referencia'] : null;

// Verifique se a imagemPix está presente
if (!empty($_FILES['imagemPix']['name'])) {
    // Gere um nome único para a imagemPix usando uniqid()
    $imagemPixNomeUnico = uniqid() . '_' . $_FILES['imagemPix']['name'];
    $imagemPixPath = $uploadDir . $imagemPixNomeUnico;
    move_uploaded_file($_FILES['imagemPix']['tmp_name'], $imagemPixPath);
} else {
    // Caso a imagemPix esteja vazia, defina o nome único como nulo
    $imagemPixNomeUnico = null;
}

$imagemProduto = $_FILES['imagemProduto']['name'];
$imagemProdutoNomeUnico = uniqid() . '_' . $imagemProduto;

$uploadDir = '../../images/BD/';
$imagemProdutoPath = $uploadDir . $imagemProdutoNomeUnico;
move_uploaded_file($_FILES['imagemProduto']['tmp_name'], $imagemProdutoPath);

$sql = "INSERT INTO produtos (titulo, desconto, tamanhos, valorSemDesconto, valorComDesconto, material, solado, referencia, imagemPix, codigoPix, imagemProduto, marca, categoria)
        VALUES ('$titulo', '$desconto', '$tamanhos', '$valorSemDesconto', '$valorComDesconto', '$material', '$solado', '$referencia', '$imagemPixNomeUnico', '$codigoPix', '$imagemProdutoNomeUnico', '$marca', '$categoria')";

if ($conn->query($sql) === true) {
    // Redireciona para a página desejada
    header("Location: https://acaquarela.com.br/admin/app/view_produto.php");
    exit();
} else {
    echo "Erro ao salvar os dados: " . $conn->error;
}

$conn->close();
?>
