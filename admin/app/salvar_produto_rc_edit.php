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
        $nomeProduto = $_POST['nomeProduto'];
        $categoriaProduto = $_POST['categoriaProduto'];
        $linkProduto = $_POST['linkProduto'];
        $descricaoProduto = $_POST['descricaoProduto'];
        $precoAnterior = $_POST['precoAnterior'];
        $precoAtual = $_POST['precoAtual'];

        // Handle file upload for the new image (if any)
        $newImage = $_FILES['imagem'];

        if ($newImage['size'] > 0) {
            // Define the destination folder for the uploaded image
            $uploadPath = '../../images/BD/'; // Adjust this path

            // Generate a unique filename for the uploaded image
            $newImageName = uniqid() . '_' . $newImage['name'];

            // Move the uploaded image to the destination folder
            if (move_uploaded_file($newImage['tmp_name'], $uploadPath . $newImageName)) {
                // Update the database with the new image name
                $sql = "UPDATE produtos_recomendados SET nome = ?, categoria = ?, link = ?, descricao = ?, preco_anterior = ?, preco_atual = ?, imagem = ? WHERE id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ssssddsi", $nomeProduto, $categoriaProduto, $linkProduto, $descricaoProduto, $precoAnterior, $precoAtual, $newImageName, $id);

                if ($stmt->execute()) {
                    // Redirect back to the view.php page
                    header("Location: view_produto_rc.php?success=true");
                } else {
                    echo "Error updating product: " . $stmt->error;
                }
            } else {
                echo "Error uploading the image.";
            }
        } else {
            // Update the database without changing the image
            $sql = "UPDATE produtos_recomendados SET nome = ?, categoria = ?, link = ?, descricao = ?, preco_anterior = ?, preco_atual = ? WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssssddi", $nomeProduto, $categoriaProduto, $linkProduto, $descricaoProduto, $precoAnterior, $precoAtual, $id);

            if ($stmt->execute()) {
                // Redirecionamento e exibição do SweetAlert
                echo '<script>
                window.location.href = "view_produto_rc.php?success=true";
            </script>';
            } else {
                echo "Error updating product: " . $stmt->error;
            }
        }

    }

}
