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
        $titulo = $_POST['titulo'];

        // Check if a new image was uploaded
        if ($_FILES['imagem']['size'] > 0) {
            // Handle file upload for the new image
            $newImage = $_FILES['imagem'];

            // Define the destination folder for the uploaded image
            $uploadPath = '../../images/BD/'; // Adjust this path

            // Generate a unique filename for the uploaded image
            $newImageName = uniqid() . '_' . $newImage['name'];

            // Move the uploaded image to the destination folder
            if (move_uploaded_file($newImage['tmp_name'], $uploadPath . $newImageName)) {
                // Update the database with the new image name and title
                $sql = "UPDATE slides SET titulo = ?, imagem = ? WHERE id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ssi", $titulo, $newImageName, $id);

                if ($stmt->execute()) {
                    // Redirect back to the view.php page with a success message
                    header("Location: view_slide.php?success=true");
                    exit();
                } else {
                    $errorMessage = "Error updating product: " . $stmt->error;
                }
            } else {
                $errorMessage = "Error uploading the image.";
            }
        } else {
            // No new image was uploaded, update only the title
            $sql = "UPDATE slides SET titulo = ? WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("si", $titulo, $id);

            if ($stmt->execute()) {
                // Redirect back to the view.php page with a success message
                header("Location: view_slide.php?success=true");
                exit();
            } else {
                $errorMessage = "Error updating product: " . $stmt->error;
            }
        }
    } else {
        $errorMessage = "Invalid or missing 'id' parameter.";
    }
}

// Se ocorrer um erro, você pode fazer algo com a mensagem de erro aqui, como exibi-la para o usuário.
if (isset($errorMessage)) {
    // Por exemplo, redirecione para a página anterior com uma mensagem de erro
    header("Location: view_slide.php?error=" . urlencode($errorMessage));
    exit();
}
