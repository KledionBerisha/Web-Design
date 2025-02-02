<?php
    require 'database.php';
    $db = new dbConnect();
    $conn = $db->connectDB();

    if(isset($_POST['delete-user']) && !empty($_POST['userID'])){
        $userID = intval($_POST['userID']);

        $stmt = $conn->prepare("DELETE FROM users WHERE ID = :userID");
        $stmt->bindParam(':userID', $userID, PDO::PARAM_INT);
        $stmt->execute();
        
        header('Location: dashboardAdmin.php');
        exit();
    }else{
        echo"Invalid request.";
    }
?>