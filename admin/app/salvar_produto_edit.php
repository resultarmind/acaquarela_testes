<?php

session_start();

// Verifique se o usuário está autenticado
if (!isset($_SESSION["username"])) {
    header("Location: login/login.php"); // Redirecione para a página de login se o usuário não estiver autenticado
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Include the database connection
    include_once "config/conection.php";

    // Check if 'id' is present in the POST data
    if (isset($_POST['id']) && !empty($_POST['id'])) {
        // Get the ID from the form
        $id = $_POST['id'];

        // Sanitize and collect data from the form
        $titulo = mysqli_real_escape_string($conn, $_POST['titulo']);
        $desconto = mysqli_real_escape_string($conn, $_POST['desconto']);
        $tamanhos = isset($_POST['tamanho']) ? implode(",", $_POST['tamanho']) : '';
        $valorSemDesconto = mysqli_real_escape_string($conn, $_POST['valorSemDesconto']);
        $valorComDesconto = mysqli_real_escape_string($conn, $_POST['valorComDesconto']);
        $material = mysqli_real_escape_string($conn, $_POST['material']);
        $solado = mysqli_real_escape_string($conn, $_POST['solado']);
        $referencia = mysqli_real_escape_string($conn, $_POST['referencia']);
        $codigoPix = mysqli_real_escape_string($conn, $_POST['codigoPix']);
        $marca = mysqli_real_escape_string($conn, $_POST['marca']);
        $categoria = mysqli_real_escape_string($conn, $_POST['categoria']);

        // Handle file upload for the new images (if any)
        $newImageProduto = $_FILES['imagemProduto'];
        $newImagePix = $_FILES['imagemPix'];

        // Define the destination folder for the uploaded images
        $uploadPathProduto = '../../images/BD/'; // Adjust this path
        $uploadPathPix = '../../images/BD/'; // Adjust this path

        // Check if new images were uploaded for Produto
        if ($newImageProduto['size'] > 0) {
            // Generate a unique filename for the uploaded image
            $newImageProdutoName = uniqid() . '_' . $newImageProduto['name'];

            // Move the uploaded image to the destination folder
            if (move_uploaded_file($newImageProduto['tmp_name'], $uploadPathProduto . $newImageProdutoName)) {
                // Update the database with the new image name
                $sql = "UPDATE produtos SET imagemProduto = ? WHERE id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param('si', $newImageProdutoName, $id);
                $stmt->execute();
            } else {
                echo "Error uploading the image for Produto.";
            }
        }

        // Check if new images were uploaded for PIX
        if ($newImagePix['size'] > 0) {
            // Generate a unique filename for the uploaded image
            $newImagePixName = uniqid() . '_' . $newImagePix['name'];

            // Move the uploaded image to the destination folder
            if (move_uploaded_file($newImagePix['tmp_name'], $uploadPathPix . $newImagePixName)) {
                // Update the database with the new image name
                $sql = "UPDATE produtos SET imagemPix = ? WHERE id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param('si', $newImagePixName, $id);
                $stmt->execute();
            } else {
                echo "Error uploading the image for PIX.";
            }
        }

        // Prepare and execute a query to update the product
        $sql = "UPDATE produtos SET titulo = ?, desconto = ?, tamanhos = ?, valorSemDesconto = ?, valorComDesconto = ?, material = ?, solado = ?, referencia = ?, codigoPix = ?, marca = ?, categoria = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ssssdssssssi', $titulo, $desconto, $tamanhos, $valorSemDesconto, $valorComDesconto, $material, $solado, $referencia, $codigoPix, $marca, $categoria, $id);
        
        if ($stmt->execute()) {
            // Redirecionamento e exibição do SweetAlert
            echo '<script>
            window.location.href = "view_produto.php?success=true";
        </script>';
        } else {
            echo "Error updating product: " . $stmt->error;
        }
    }

}
