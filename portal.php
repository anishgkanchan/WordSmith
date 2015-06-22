<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <title>wordsmith | sliding menu demo</title>
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        <link rel="shortcut icon" href="../favicon.ico">
        <link rel="stylesheet" type="text/css" href="css/default.css" />
        <link rel="stylesheet" media="all" href="css/feed.css" />
        <link rel="stylesheet" type="text/css" href="css/search-bar.css" />
        <link rel="stylesheet" type="text/css" href="css/bootstap.css" />
        <link rel="stylesheet" type="text/css" href="css/core.css" />
        <link rel="stylesheet" type="text/css" href="css/profile-image.css" />
        <link rel="stylesheet" type="text/css" href="css/menu.css" />
        
        <link rel="stylesheet" media="all" href="css/slider.css" />
        <script src="js/modernizr.custom.js"></script>
    </head>
<body style="background-color:#eee;">
        <div class="container">
            
           
            <div class="title">
                <img src="images/portal.png" align="center"><br>
                <p>Portal</P>
            </div>
            <div>
            <div class="title3">
                <p><img src="images/requests.png"><a href="portal-request.php">View</a> Requests</p>
            </div>
            <div class="title3">
                <p><img src="images/pending.png"><a href="portal-pending.php"><span style="color=#3c6">View</span> </a>Pending Deals</p>
            </div>
            <div class="title3">
                <p><img src="images/accepted.png"><a href="portal-accepted.php"><span style="color=#3c6">View</span> </a>Accepted Deals</p>
            </div>
            <div class="title3">
                <p><img src="images/rejected.png"><a href="portal-declined.php"><span style="color=#3c6">View</span> </a>Rejected Deals</p>
            </div>
            <?php include "basiclayout.php"; ?>
        </div>
    </body>
    </html>
