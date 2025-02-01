<?php
    session_start();
    include('database.php');
    include('message.php');

    $dbConnection = new dbConnect();
    $conn = $dbConnection->connectDB();
    $message=new Message($conn);

    $msg=null;
    if($_SERVER['REQUEST_METHOD']==="POST"){

        $email=filter_input(INPUT_POST,"email",FILTER_SANITIZE_EMAIL);
        $user_message=filter_input(INPUT_POST,"message",FILTER_SANITIZE_SPECIAL_CHARS);
        $date = new DateTime();
        $time = $date->format("Y-m-d H:i:s");

        if(empty($email) || empty($user_message)){
            $msg="Please fill in both the email and the message!"; 
        }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $msg="Please fill in a valid email!";
        }else{
            $msg=$message->registerMsg($email,$user_message,$time);
        }
        echo $msg;
        exit();
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        #form-message {
            margin-top: 10px;
            padding: 10px;
            border-radius: 5px;
            text-align: center;
        }
        #form-message.success {
            background-color: #d4edda;
            color: #155724;
        }
        #form-message.error {
            background-color: #f8d7da;
            color: #721c24;
        }
    </style>
    <!-- <script>
        function showAlert(msg){
            if(msg){
                alert(msg);
            }
        }
    </script> -->
</head>

<body>    
<div class="popup-container" id="popup">
        <div class="popup-content">
            <span class="close-btn" onclick="closePopup()">&times;</span>
            <h2>Write Us a Message</h2>
            <form id="messageForm" action="popup.php" method="POST">
                <input type="email" id="email" name="email" placeholder="Enter your email" required>
                <textarea id="message" name="message" placeholder="Write your message..." required></textarea>
                <button type="submit" class="btn-submit" name="submit">Submit</button>
            </form>
        </div>
    </div>
</body>
</html>