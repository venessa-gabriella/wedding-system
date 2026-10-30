<?php
include 'db.php';

$id = intval($_GET['id']);

$stmt = $conn->prepare("SELECT * FROM weddings WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();

$result = $stmt->get_result();
$row = $result->fetch_assoc();

if (!$row) {
    die("Wedding record not found.");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Wedding</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

    <h1>Update Wedding Details</h1>

    <form action="update.php" method="POST">

        <input type="hidden" name="id"
        value="<?php echo $row['id']; ?>">

        <input type="text" name="couple_names"
        value="<?php echo htmlspecialchars($row['couple_names']); ?>" required>

        <label>Wedding Date</label>
        <input type="date" name="wedding_date"
        value="<?php echo $row['wedding_date']; ?>" required>

        <input type="text" name="venue"
        value="<?php echo htmlspecialchars($row['venue']); ?>" required>

        <input type="text" name="wedding_theme"
        value="<?php echo htmlspecialchars($row['wedding_theme']); ?>">

        <input type="number" step="0.01" name="budget"
        value="<?php echo $row['budget']; ?>">

        <input type="text" name="contact"
        value="<?php echo htmlspecialchars($row['contact']); ?>">

        <button type="submit">Update Wedding</button>

        <a href="index.php" class="back">Cancel</a>

    </form>

</div>

</body>
</html>