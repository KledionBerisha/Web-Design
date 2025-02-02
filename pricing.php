<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pricing</title>
    <link rel="stylesheet" href="pricing.css">
</head>
<body>
    <section>
        <div class="price">
            <div class="pricing-t">
                <h1>Choose your plan</h1>
                <p>
                    Stay on top of your goals effortlessly with our intuitive task manager, designed to keep you organized and productive every step of the way
                </p>
            </div>

            <div class="price-items">
                <div class="price-item">
                    <h3>Basic</h3>

                    <div class="priceitem">
                        <span class="dollar">$19.99/month</span>
                    </div>

                    <ul class="item-info">
                        <li>Unlimited boardsd</li>
                        <li>Advanced checklists</li>
                        <li>Saved searches</li>
                        <li>Single board guests</li>
                    </ul>

                    <a href="homepage.php"><button>Choose your plan</button></a>
                </div>

                <div class="price-item">
                    <h3>Standart</h3>

                    <div class="priceitem">
                        <span class="dollar">$49.99/month</span>
                    </div>

                    <ul class="item-info">
                        <li>Views: Calendar,Table</li>
                        <li>Collections</li>
                        <li>Admin and security features</li>
                        <li>Workspace-level templates</li>
                    </ul>

                    <a href="homepage.php"><button>Choose your plan</button></a>
                </div>

                <div class="price-item">
                    <h3>Premium</h3>

                    <div class="priceitem">
                        <span class="dollar">$99.99/month</span>
                    </div>

                    <ul class="item-info">
                        <li>Unlimited Workspaces</li>
                        <li>Organization-wide permissions</li>
                        <li>Attachment permissions</li>
                        <li>Multi-board guests</li>
                    </ul>

                    <a href="homepage.php"><button>Choose your plan</button></a>
                </div>
            </div>
        </div>
    </section>
</body>
</html>