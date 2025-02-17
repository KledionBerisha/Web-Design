<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link rel="stylesheet" type="text/css" href="aboutusStilizimi.css" />
    <script>
        var i = 0;
        var imgArray = [
            'TaskPhoto.webp',
            "img6.png",
            "img3.jpg",
            "img5.jpg",
            "img7.jpg"
        ];

        function ndrroImg(){
            document.getElementById('slideshow').src= imgArray[i];
                if (i < imgArray.length - 1) {
                    i++;
                }else {
                    i= 0;
                }
        }
        
        window.onload = function(){
            document.getElementById('slideshow').src = imgArray[0];
        };
    </script>
</head>
<body>
    
    <div class="header">
        <h1>About Us</h1>
        <p>Organize tasks, collaborate seamlessly, and meet deadlines with ease. Our app simplifies planning and prioritization, keeping you and your team productive and on track.</p>
    </div>

    <div class="container">
    <div class="photo">
        <div class="slider-container">
            <img id="slideshow" src="" alt="Slideshow Image"/>
            <button onclick="ndrroImg()">Next</button>
        </div>
    </div>

    <div class="aboutC">
        
        <h2>Productivity Made Easy</h2>

        <p>Maximize your productivity and manage your time effortlessly with our all-in-one task management app. Designed to help you stay organized and focused, the app empowers you to plan smarter, prioritize tasks, and meet deadlines with ease. Whether you're working solo or collaborating with a team, it provides the tools you need to streamline workflows, track progress, and achieve your goals. Take charge of your day and accomplish more without the stress!</p>

        <a href="homepage.php" class="read-more">Go back</a>

    </div>

    </div>
</body>
</html>