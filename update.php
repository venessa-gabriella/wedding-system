<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = intval($_POST['id']);
    $couple = trim($_POST['couple_names']);
    $date = $_POST['wedding_date'];
    $venue = trim($_POST['venue']);
    $theme = trim($_POST['wedding_theme']);
    $budget = $_POST['budget'] !== '' ? $_POST['budget'] : 0;
    $contact = trim($_POST['contact']);

    $stmt = $conn->prepare(
        "UPDATE weddings SET
        couple_names = ?,
        wedding_date = ?,
        venue = ?,
        wedding_theme = ?,
        budget = ?,
        contact = ?
        WHERE id = ?"
    );

    $stmt->bind_param(
        "ssssdsi",
        $couple, $date, $venue, $theme, $budget, $contact, $id
    );

    if ($stmt->execute()) {
        header("Location: index.php?message=updated");
        exit();
    } else {
        echo "Error updating record: " . $stmt->error;
    }
}
?>