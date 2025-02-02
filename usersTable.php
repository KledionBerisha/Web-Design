<?php
    require 'database.php';
    $db=new dbConnect();
    $conn=$db->connectDB();

    $sql="SELECT ID,username,email FROM users";
    $stmt=$conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .btn-delete {
    background-color: #d9534f;
    color: white;
    border: none;
    padding: 8px 12px;
    border-radius: 8px;
    cursor: pointer;
    font-size: 14px;
    transition: background-color 0.3s ease, transform 0.2s ease;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .btn-delete:hover {
        background-color: #c9302c;
        transform: scale(1.05);
    }

    .btn-delete:active {
        background-color: #b52b26;
        transform: scale(0.98);
    }

    </style>
</head>
<body>
<h2>Users</h2>
    <table class="user-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = $stmt->fetch()) : ?>
                <tr>
                    <td><?=$row['ID']?></td>
                    <td><?=$row['username']?></td>
                    <td><?=$row['email']?></td>
                    <td>
                        <form action="delete_user.php" method="POST">
                            <input type="hidden" name="userID" value="<?=$row['ID']?>">
                            <button type="submit" name="delete-user" id="btn-delete" onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endWhile;?>
        </tbody>
</table>

</body>
</html>
