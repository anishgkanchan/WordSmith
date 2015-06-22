<?php 
session_start();
$of=$_GET['of'];
$dbc=mysqli_connect('mysql13.000webhost.com','a3831866_root','password69','a3831866_test')
      or die("error connecting to the database");

 $query="select * from creator where creatorid={$of}";
    $result=mysqli_query($dbc,$query);
    $row=mysqli_fetch_array($result);
    $name1="{$row['fname']} {$row['lname']}";
    $username1=$row['username'];
    $about1=$row['about'];
$query="select * from follower where creator1={$of}";
    $result=mysqli_query($dbc,$query);
    $output='';
    while($row=mysqli_fetch_array($result))
    {
        $query1="select * from creator where creatorid={$row['creator2']}";
        $result1=mysqli_query($dbc,$query1);
        $row1=mysqli_fetch_array($result1);
        $name="{$row1['fname']} {$row1['lname']}";
        $username=$row1['username'];
        $about=$row1['about'];
        $url=calculateimage1($row['creator2']);
        $output.="<li>
                        <div class=\"ch-item ch-img \" style=\"background-image:url({$url});background-size:contain\">
                            <div class=\"ch-info\">
                                <h3>{$name}</h3>
                                <p style=\"margin: -25px 20px;font-size: 13px; border-top: 2px solid rgba(255,255,255,0.8);\">{$about}<a href=\"profile.php?view={$row['creator2']}\">
                                    @{$username}</a></p>
                            </div>
                        </div>
                    </li>";
        
    }
    function calculateimage1($id)
    {
        //$imagearray=getimagesize("upload_pic/thumbnail_{$_SESSION['login_user']}.jpg");
        if(file_exists("Creatorimage/{$id}.jpg"))
        {
         return "Creatorimage/{$id}.jpg";
        }
        else
            return "Creatorimage/default.jpg";
    }

    function calculateimage()
    {
        //$imagearray=getimagesize("upload_pic/thumbnail_{$_SESSION['login_user']}.jpg");
        if(file_exists("Creatorimage/{$_GET['of']}.jpg"))
        {
         echo "Creatorimage/{$_GET['of']}.jpg";
        }
        else
            echo "Creatorimage/default.jpg";
    }
     function calculatearticleimage($id)
    {
        //$imagearray=getimagesize("upload_pic/thumbnail_{$_SESSION['login_user']}.jpg");
        if(file_exists("Articleimage/{$id}.jpg"))
        {
         return "Articleimage/{$id}.jpg";
        }
        else
            return "Articleimage/header.jpg";
    }

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
        <link rel="stylesheet" type="text/css" href="css/bootstap.css" />
        <link rel="stylesheet" type="text/css" href="css/core.css" />
        <link rel="stylesheet" media="all" href="css/feed.css" />
         <link rel="stylesheet" type="text/css" href="css/profile-image.css" />
        <link rel="stylesheet" type="text/css" href="css/search-bar.css" />
        <link rel="stylesheet" media="all" href="css/slider.css" />
        <link rel="stylesheet" type="text/css" href="css/menu.css" />
        
        <script src="js/modernizr.custom.js"></script>
    </head>
<body style="background-color:#eee;">
        <div class="container">
            

            <div>
                <ul class="ch-grid">
                    <li>
                        <div class="ch-item ch-img"  style="top:-40px;background-image:url(<?php echo calculateimage();?>);background-size:contain">
                            <div class="ch-info">
                                <h3><?php echo $name1; ?></h3>
                                <p style="margin: -25px 20px;font-size: 13px; border-top: 2px solid rgba(255,255,255,0.8);"><?php echo $about1; ?><a href="profile.php?view=<?php echo $_GET['of']?>">@<?php echo $username1; ?></a></p>
                            </div>
                        </div>
                   </li>
               </ul>
               </div>
         


            <div class="sr-people">
            <div class="title2">
                <p style="margin-bottom:0px;"><img src="images/people.png">
               followings</p>
            </div>
            <ul class="ch-grid">
                    <?php echo $output;?>
               </ul>
            
        </div>

        <?php include "basiclayout.php"; ?>
