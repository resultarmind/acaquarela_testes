<?php
include_once("config/conection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id"]) && isset($_POST["status"])) {
    $id = $_POST["id"];
    $status = $_POST["status"];

    $sql = "UPDATE produtos SET status = $status WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        echo "Status updated successfully";
    } else {
        echo "Error updating status: " . $conn->error;
    }

    $conn->close();
}
?>
