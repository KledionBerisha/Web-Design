<?php
    include("database.php");
    include("user.php");
    
    $db = new dbConnect();
    $conn = $db->connectDB();
    $user = new User($conn);

    session_start();

    if(isset($_SESSION['ID'])){
        header("Location: homepage.php");
        exit();
    }

    if(isset($_COOKIE['remember'])){
        $token=$_COOKIE['remember'];
        $sql="SELECT * FROM users WHERE remember_token = :token";
        $stmt=$conn->prepare($sql);
        $stmt->bindParam(":token",$token);
        $stmt->execute();
        $userRow = $stmt->fetch(PDO::FETCH_ASSOC);

        if($userRow){
            $_SESSION['ID']=$userRow['ID'];
            $_SESSION['username']=$userRow['username'];
            header("location: homepage.php");
            exit();
        }
    }

    if($_SERVER["REQUEST_METHOD"]=="POST"){

        $emailOrUsername=$_POST["email"];
        $password=$_POST["password"];

        $sql="SELECT * FROM users WHERE email= :email OR username = :username";
        $stmt=$conn->prepare($sql);
        $stmt->bindParam(":email",$emailOrUsername);
        $stmt->bindParam(":username",$emailOrUsername);
        $stmt->execute();
        $userRow=$stmt->fetch(PDO::FETCH_ASSOC);

        if($userRow){
            if(password_verify($password, $userRow['password'])){
                session_start();
                $_SESSION['ID']=$userRow['ID'];
                $_SESSION['username'] = $userRow['username'];

                if(!empty($_POST['remember'])){
                    $token = bin2hex(random_bytes(32));
                    setcookie("remember",$token, time()+(86400 * 30),"/","", true, true);
                    $sql = "UPDATE users SET remember_token = :token WHERE id = :id";
                    $stmt = $conn->prepare($sql);
                    $stmt->bindParam(":token",$token);
                    $stmt->bindParam(":id",$userRow['id']);
                    $stmt->execute();
                }
                if($userRow['username']==='admin'||$userRow['ID']==1){
                    header("Location: dashboardAdmin.php");
                }
                else{
                   header("Location: homepage.php"); 
                }
                // print_r($_COOKIE);
                exit();
            }else{
                $error="Incorrect password";
            }
        }else{
            $error="User not found!";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <title>Login Form</title>
   <link rel="stylesheet" href="loginStyle.css">
   <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div class="flex">
        <form action="login.php" method="POST" >
            <h1> DailySync / Login</h1>
            <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"?>
            <div class="input-box">
                <input type="text" placeholder="Email / Username" id="email" name="email">
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box">
                <input type="password" placeholder="Password" id="password" name="password">
                <i class='bx bxs-lock-alt' ></i>
            </div>
            <div class="remember-forgot">
                <label><input type="checkbox" name="remember" id="">Remember me</label>
                <a href="#">Forgot password?</a>
            </div>
            <a href="homepage.html"><button type="submit" class="btn" id="submit">Login</button></a>
            <div class="register-link">
                <p>Don't have an account?
                    <a href="registerform.php">Register</a>
                </p>
            </div>
        </form>
    </div>
    <!-- <script src="loginScript.js"></script> -->
</body>
</html>