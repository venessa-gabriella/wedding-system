<?php
include 'db.php';

$result = $conn->query("SELECT * FROM weddings ORDER BY id DESC");
$total = $conn->query("SELECT COUNT(*) AS total FROM weddings")->fetch_assoc()['total'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Wedding Planning Management System</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

    <h1>Wedding Planning Management System</h1>
    <p class="subtitle">Plan your special day with ease!</p>

    <div class="stats">
        Total Weddings Registered: <strong><?php echo $total; ?></strong>
    </div>

    <h2>Register a Wedding</h2>

    <form action="save.php" method="POST">

        <input type="text" name="couple_names"
        placeholder="Couple Names" required>

        <label>Wedding Date</label>
        <input type="date" name="wedding_date" required>

        <input type="text" name="venue"
        placeholder="Wedding Venue" required>

        <input type="text" name="wedding_theme"
        placeholder="Wedding Theme">

        <input type="number" step="0.01" name="budget"
        placeholder="Wedding Budget (KSh)">

        <input type="text" name="contact"
        placeholder="Contact Number">

        <button type="submit">Save Wedding</button>

    </form>

    <h2>Wedding Records</h2>

    <div class="table-container">
    <table>
        <tr>
            <th>ID</th>
            <th>Couple</th>
            <th>Date</th>
            <th>Venue</th>
            <th>Theme</th>
            <th>Budget</th>
            <th>Contact</th>
            <th>Actions</th>
        </tr>

        <?php while($row = $result->fetch_assoc()) { ?>

        <tr>
            <td><?php echo $row['id']; ?></td>

            <td><?php echo htmlspecialchars($row['couple_names']); ?></td>

            <td><?php echo $row['wedding_date']; ?></td>

            <td><?php echo htmlspecialchars($row['venue']); ?></td>

            <td><?php echo htmlspecialchars($row['wedding_theme']); ?></td>

            <td>KSh <?php echo number_format($row['budget'], 2); ?></td>

            <td><?php echo htmlspecialchars($row['contact']); ?></td>

            <td>
                <a class="edit"
                href="edit.php?id=<?php echo $row['id']; ?>">Edit</a>

                <form action="delete.php" method="POST"
                class="delete-form"
                onsubmit="return confirm('Are you sure you want to delete this wedding?');">

                    <input type="hidden" name="id"
                    value="<?php echo $row['id']; ?>">

                    <button class="delete" type="submit">Delete</button>
                </form>
            </td>
        </tr>

        <?php } ?>

    </table>
    </div>

</div>

<script>
const params = new URLSearchParams(window.location.search);

if (params.get('message') === 'added') {
    alert('Wedding details successfully added!');
}

if (params.get('message') === 'updated') {
    alert('Wedding details successfully updated!');
}

if (params.get('message') === 'deleted') {
    alert('Wedding record successfully deleted!');
}
</script>

</body>
</html>