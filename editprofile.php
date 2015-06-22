<?php
session_start();
$dbc=mysqli_connect('mysql13.000webhost.com','a3831866_root','password69','a3831866_test')
      or die("error connecting to the database");
$query="select * from creator where creatorid={$_SESSION['login_user']}";
    $result=mysqli_query($dbc,$query);
    $row=mysqli_fetch_array($result);
    $name="{$row['fname']} {$row['lname']}";
    $username=$row['username'];
    $about=$row['about'];
function calculateimage()
    {
        //$imagearray=getimagesize("upload_pic/thumbnail_{$_SESSION['login_user']}.jpg");
        if(file_exists("upload_pic/thumbnail_{$_SESSION['login_user']}.jpg"))
        {
         echo "upload_pic/thumbnail_{$_SESSION['login_user']}.jpg";
        }
        else
            echo "upload_pic/usericon.jpg";
    }
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>wordsmith | categories</title>
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link rel="shortcut icon" href="../favicon.ico">
		<link rel="stylesheet" type="text/css" href="css/default.css" />
		<link rel="stylesheet" type="text/css" href="css/profile-image.css" />
        
		<link rel="stylesheet" type="text/css" href="css/categories.css" />
		<link rel="stylesheet" type="text/css" href="css/search-bar.css" />
		<link rel="stylesheet" type="text/css" href="css/bootstap.css" />
		<link rel="stylesheet" type="text/css" href="css/core.css" />
		<link rel="stylesheet" media="all" href="css/slider.css" />
		 <link rel="stylesheet" type="text/css" href="css/profile-links.css" />
     <link rel="stylesheet" type="text/css" href="css/menu.css" />
       
		<link rel="stylesheet" type="text/css" href="css/articledisplay.css" />
		<script src="js/modernizr.custom.js"></script>
	</head>
	<body style="background-color:#eee;">
		<div class="container">
			  

            		<section>
            	<div>
                <ul class="ch-grid">
                    <li>
                        <div class="ch-item ch-img"  style="top:-40px;background-image:url(<?php echo calculateimage();?>)">
                            <div class="ch-info">
                                <h3><?php echo $name; ?></h3>
                                <p style="margin: -25px 20px;font-size: 13px; border-top: 2px solid rgba(255,255,255,0.8);"><?php echo $about; ?>@<?php echo $username; ?></p>
                            </div>
                        </div>
                   </li>
               </ul>
               </div>
         
           
            </section>
            <div align="center">
          	<p><span align="center" style="padding-top:0;text-align:center; font-size:50px; color:#333"><a href="usernamechange.php">change your username</a></span></p>
          	<p><span align="center" style="padding-top:0;text-align:center; font-size:50px; color:#333"><a href="passwordchange.php">change your password</span></a></p>
          	<p><span align="center" style="padding-top:0;text-align:center; font-size:50px; color:#333"><a href="upload_crop_v1.2.php">change your profile picture</a></span></p>
          	<p><span align="center" style="padding-top:0;text-align:center; font-size:50px; color:#333"><a href="biochange.php">change your bio</a></span></p>
          	</div>

          	</div>


         <?php include "basiclayout.php";?>
	