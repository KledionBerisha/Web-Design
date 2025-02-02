<?php
require 'database.php';
$db = new dbConnect();
$conn = $db->connectDB();

$sql = "SELECT id, email, message, created_at FROM messages";
$stmt = $conn->query($sql);
?>

<h2>Messages</h2>
<table class="message-table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Email</th>
            <th>Message</th>
            <th>Time</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = $stmt->fetch()) : ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['email'] ?></td>
                <td><?= $row['message'] ?></td>
                <td><?= $row['created_at'] ?></td>
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>
