<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $couple = trim($_POST['couple_names']);
    $date = $_POST['wedding_date'];
    $venue = trim($_POST['venue']);
    $theme = trim($_POST['wedding_theme']);
    $budget = $_POST['budget'] !== '' ? $_POST['budget'] : 0;
    $contact = trim($_POST['contact']);

    $stmt = $conn->prepare(
        "INSERT INTO weddings
        (couple_names, wedding_date, venue, wedding_theme, budget, contact)
        VALUES (?, ?, ?, ?, ?, ?)"
    );

    $stmt->bind_param(
        "ssssds",
        $couple, $date, $venue, $theme, $budget, $contact
    );

    if ($stmt->execute()) {
        header("Location: index.php?message=added");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>