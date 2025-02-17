<?php
    session_start();
    include("database.php");

    if(!isset($_SESSION['ID']) && isset($_COOKIE['remember'])){
        $db=new dbConnect();
        $conn=$db->connectDB();

        $sql="SELECT * FROM users WHERE remember_token = :token";
        $stmt=$conn->prepare($sql);
        $stmt->bindParam(":token",$_COOKIE['remember']);
        $stmt->execute();
        $userRow=$stmt->fetch(PDO::FETCH_ASSOC);

        if($userRow){
            $_SESSION['ID']=$userRow['ID'];
            $_SESSION['username']=$userRow['username'];
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="homepageStyle.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>

    <title>Document</title>
</head>
<body>
    <header class="navbar">
        <div class="logo">
            <h1>DailySync</h1>
        </div>
        <nav>
            <ul>
                <li><a href="pricing.php">Pricing</a></li>
                <li><a href="AboutUs.php">About Us</a></li>
                <!-- <li><a href="login.php" class="btn">Login</a></li> -->
                    <?php if(isset($_SESSION['ID'])): ?>
                        <?php if($_SESSION['username']==='admin'||$_SESSION['ID']==1): ?>
                            <li class="user-dropdown">
                                <a href="#" id="user-btn"><?php echo $_SESSION['username']; ?> ▼</a>
                                <ul class="dropdown-menu" id="dropdown-menu">
                                    <li><a href="tasks.php">My Tasks</a></li>
                                    <li><a href="dashboardAdmin.php">Manage</a></li>
                                    <li><a href="logout.php">Log Out</a></li>
                                </ul>
                            </li>
                        <?php else:?>
                            <li class="user-dropdown">
                                <a href="#" id="user-btn"><?php echo $_SESSION['username']; ?> ▼</a>
                                <ul class="dropdown-menu" id="dropdown-menu">
                                    <li><a href="tasks.php">My Tasks</a></li>
                                    <li><a href="logout.php">Log Out</a></li>
                                </ul>
                            </li>
                        <?php endif; ?>
                <?php else: ?>
                    <li><a href="login.php" class="btn">Login</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>
    <div class="body">
        <div class="body-text">
            <h1>Organize Your Day Effortlessly</h1>
            <p>Plan, prioritize and execute tasks seamlessly with out all-in-one task management tool.</p>
            <a href="login.php"><button class="btn1">Get Started</button></a>
            <h2>Never miss a thing.</h2>
            <p>Everything gets imported in our <strong>Universal Inbox</strong> from 3000+ apps.</p>
        </div>
        <!-- <div class="video">
            <video src="dailysync.mp4" autoplay muted loop></video>
        </div> -->
    </div>
    <div class="task-section">
        <h2>Manage Your Tasks Efficiently With <strong>DailySync</strong></h2>
        <div class="dashboard">
            <div class="task-board">
                <h3>To-Do</h3>
                <ul>
                    <li>Online Meeting</li>
                    <li>Submit your work</li>
                    <li>Lunch with Sarah</li>
                </ul>
                <h3>In Progress</h3>
                <ul>
                    <li>Create Comments Section</li>
                </ul>
                <h3>Completed</h3>
                <ul>
                    <li>Morning work out</li>
                </ul>
            </div>
        </div>
        <div class="calendar-section">
            <h3>Task Calendar</h3>
            <div id="calendar"></div>
        </div>
        <div class="progress-container">
            <div class="progress-bar" style="width: 25%;">
              <span class="progress-text">25%</span>
            </div>
        </div>
    </div>
    <div class="comments-container">
        <h1 class="title">What our <strong>customers</strong> are saying</h1>
        <div class="comments" id="comments">
            <div class="stars" id="stars">
                <!-- ★★★★★ -->
            </div>
            <h3 id="name">
                <!-- Emma Carter -->
            </h3>
            <p id="comment">
                <!-- DailySync is <strong>Get Things Done on steroids</strong>. I can easily manage my to-do items, schedule 
                them or leave them in the Someday bucket if they are not tied to a deadline. I love that I 
                can see my calendar and my to-do items on one screen so I can also evaluate how many 
                calls I can add to my day based on the items in my backlog. It also integrates with Slack 
                perfectly, so I can save items and send them to my inbox instead of relying on Slack 
                reminders. Well done.  -->
            </p>
        </div>
        <div class="profiles" id="profiles">
            <!-- <div class="profile1">
                <h4>Laim Mitchell</h4>
                <p>Full Stack Engineer</p>
            </div>
            <div class="profile2">
                <h4>Sophia Bennet</h4>
                <p>Proffesional Writer</p>
            </div>
            <div class="profile3">
                <h4>Emma Carter</h4>
                <p>Associate Director</p>
            </div> -->
        </div>
    </div>
    <div class="saving-section">
        <div class="saving-container">
            <h1>Save up to 2 hours / day</h1>
            <p>Sign up for <strong>DailySync</strong> today</p>
            <a href="login.php"><button class="btn2">Get Started</button></a>
            <a href="javascript:void(0)"><button class="btn3" onclick="openPopup()">Contact Us</button></a>
            <div id="popup-container"></div>
        </div>
    </div>
    
    <footer>
        <div class="footer">
            <h4>Product</h4>
            <ul>
                <li><a href="#">Method</a></li>
                <li><a href="#">How to use guide</a></li>
                <li><a href="pricing.php">Pricing</a></li>
                <li><a href="#">Reviews</a></li>
            </ul>
        </div>

        <div class="footer">
            <h4>Use cases</h4>
            <ul>
                <li><a href="#">Developers</a></li>
                <li><a href="#">Marketers</a></li>
                <li><a href="#">Sales</a></li>
                <li><a href="#">Founders</a></li>
            </ul>
        </div>
        <div class="footer">
            <h4>Company</h4>
            <ul>
                <li><a href="aboutus.php">About us</a></li>
                <li><a href="#">Privacy Policy</a></li>
                <li><a href="javascript:void(0)" onclick="openPopup()">Contact us</a></li>
                <li><a href="#">Terms of Service</a></li>
            </ul>
        </div>
        <div class="footer">
            <h4>Community</h4>
            <div class="link">
                <ul>
                    <li><a href="https://www.linkedin.com/">LinkedIn</a></li>
                    <li><a href="https://www.facebook.com/">Facebook</a></li>
                    <li><a href="https://x.com/">X</a></li>
                    <li><a href="https://www.instagram.com">Instagram</a></li>
                </ul>    
            </div>
        </div>
    </footer>
<script src="homepageScript.js"></script>
</body>
</html>