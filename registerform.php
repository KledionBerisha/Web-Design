<?php 
    include("database.php");
    include("user.php");

    $dbConnection = new dbConnect();
    $conn = $dbConnection->connectDB();
    $user = new User($conn);

    $message=null;
    $success=false;
    if($_SERVER["REQUEST_METHOD"]==="POST" && isset($_POST["submit"])){

        $username=filter_input(INPUT_POST,"username",FILTER_SANITIZE_SPECIAL_CHARS);
        $email=filter_input(INPUT_POST,"email",FILTER_SANITIZE_EMAIL);
        $password=filter_input(INPUT_POST,"password",FILTER_SANITIZE_SPECIAL_CHARS);

        if (empty($username) || empty($email) || empty($password)){
            $message= "Username, email and password are required!";
        } else {
            $registerationResult=$user->register($username, $email, $password);
            if($registerationResult==="User registered successfully"){
                $success=true;
                $message="Registration successful! You will  be redirected to the login page.";
            }else{
                $message = $registerationResult;
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Form</title>
    <link rel="stylesheet" href="registerform.css">
    <script>
        function showAlert(message, isSuccess=false){
            if(message){
                alert(message);
                if(isSuccess){
                    window.location.href="login.php";
                }
            }
        }
    </script>
    
</head>
<body onload="<?php if (isset($_POST['submit']) && !empty($message)) echo "showAlert('" . addslashes($message) . "'," . ($success ? 'true':'false') . ")"; ?>">    
    <div class="container">
        <header>Register</header>
        <form action="registerform.php" method="POST" id="registerForm" class="form">
            <div class="input-box">
                <label>Username</label>
                <input type="text" placeholder="Enter a valid Username" name="username" id="username" required/>
            </div>

            <div class="input-box">
                <label>Email-Address</label>
                <input type="text" placeholder="Enter a valid email address" name="email" id="email" required/>
            </div>

            <div class="column">
                <div class="input-box">
                    <label>Phone Number</label>
                    <input type="number" placeholder="Enter phone number" id="phone"/>
                </div>

                <div class="input-box">
                    <label>Birth Date</label>
                    <input type="date" placeholder="Enter birth date" id="birthdate"/>
                </div>
            </div>

            <div class="gender-box">
                <h3>Gender</h3>
                <div class="gender-option">
                    <div class="gender">
                        <input type="radio" id="check-male" name="gender"/>
                        <label for="check-male">Male</label>
                    </div>
                    <div class="gender">
                        <input type="radio" id="check-female" name="gender"/>
                        <label for="check-female">Female</label>
                    </div>
                </div>
            </div>

            <div class="input-box password">
                <label>Password</label>
                <input type="password" placeholder="Enter a strong password" name="password" id="password" required />
            </div>
            
            <button type="submit" name="submit" id="submit">Submit</button>
            <a href="login.php" class="goBack">Go back to login</a>
        </form>
    </div>
    <script src="RegisterScript.js"></script>
</body>
</html>
<?php

?>