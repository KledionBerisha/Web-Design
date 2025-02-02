<?php

include("database.php");

try {
    $db = new dbConnect();
    $conn = $db->connectDB();

    $query = "INSERT INTO tasks (task_name, status, due_date, priority) VALUES
            ('Finish Dashboard UI', 'In Progress', '2025-02-05', 'High'),
            ('Prepare Presentation', 'Completed', '2025-01-28', 'Low'),
            ('Update Task System', 'Pending', '2025-02-12', 'Medium'),
            ('Bug Fixing', 'In Progress', '2025-02-11', 'High'),
            ('Optimize Database', 'Pending', '2025-02-19', 'Medium')";

    $conn->exec($query);
    echo "Donee!";
} catch (PDOException $e) {
    die("Error:" . $e->getMessage());
}
?>