<?php 
    
    include("database.php");

    try{
        $db = new dbConnect();
        $conn = $db->connectDB();

        $query = "SELECT * FROM tasks";
        $stmt = $conn->query($query);
        $tasks = $stmt->fetchAll();
    } catch(PDOException $e) {
        die("Error:" . $e->getMessage());
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="tasksStyle.css">
</head>
<body>
    <div class="container">
        <div class="leftside">
            <header>
                <div class="logo">
                    <h2>DailySync</h2>
                </div>
                <nav>
                    <ul>
                        <li>
                            <a href="#">
                                <span class="title">Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="title">Add Task</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="title">Calendar</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="title">Team</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="title">Settings</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </header>
            <div class="logout-button">
                <a href="homepage.html"><button>Logout</button></a>
            </div>
        </div>
        <div class="right">
            <div class="top">
                <div class="search">
                    <h2>Dashboard</h2>
                    <div class="input">
                        <span></span>
                        <input type="text" placeholder="Search">
                    </div>
                </div>
                <div class="user">
                    <div class="userImg">
                        <img src="user.avif" alt="user">
                    </div>
                    <h2>DailySync</h2>
                </div>
            </div>

            <div class="task-table">
                <h3>Task Overview</h3>
                <table>
                    <thead>
                        <tr>
                            <th>Task Name</th>
                            <th>Status</th>
                            <th>Due Date</th>
                            <th>Priority</th>
                        </tr>
                    </thead>
                    <tbody>                
                    <?php if (!empty($tasks)): ?>
                            <?php foreach ($tasks as $task): ?>
                                <tr>
                                    <td><?= htmlspecialchars($task['task_name']); ?></td>
                                    <td><?= htmlspecialchars($task['status']); ?></td>
                                    <td><?= htmlspecialchars($task['due_date']); ?></td>
                                    <td><?= htmlspecialchars($task['priority']); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="4">No tasks found.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>
</html>