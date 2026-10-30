<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = intval($_POST['id']);

    $stmt = $conn->prepare("DELETE FROM weddings WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: index.php?message=deleted");
        exit();
    } else {
        echo "Error deleting record: " . $stmt->error;
    }
}
?>