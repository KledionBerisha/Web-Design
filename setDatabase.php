<?php

include("database.php"); 

try {
    $db = new dbConnect();
    $conn = $db->connectDB();

    
    $query = "CREATE TABLE IF NOT EXISTS tasks (
        id INT AUTO_INCREMENT PRIMARY KEY,
        task_name VARCHAR(255) NOT NULL,
        status ENUM('Pending', 'In Progress', 'Completed') NOT NULL,
        due_date DATE NOT NULL,
        priority ENUM('Low', 'Medium', 'High') NOT NULL
    )";

    $conn->exec($query);
    echo "Table 'tasks' created successfully!";
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}
?>