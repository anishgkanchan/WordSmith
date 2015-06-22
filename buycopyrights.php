<?php
session_start();
$dbc=mysqli_connect('mysql13.000webhost.com','a3831866_root','password69','a3831866_test')
      or die("error connecting to the database");
//$hire=$_GET['hire'];
$query="select * from article where articleid={$_GET['article']}";
    $result=mysqli_query($dbc,$query);
    $row=mysqli_fetch_array($result);
    $title=$row['title'];
    $creatorid=$row['creatorid'];
    $postedon=$row['timestamp'];
    //$about=$row['about'];
    $query="select * from creator where creatorid={$creatorid}";
    $result=mysqli_query($dbc,$query);
    $row=mysqli_fetch_array($result);
    $username=$row['username'];
    $error="";
    $success='';
if(isset($_POST['submit']))
{
  
  
  $query="insert into copyrightdeal(creator1,creator2,amount) values('{$_SESSION['login_user']}','{$creatorid}','{$_POST['amount']}')";
  $result=mysqli_query($dbc, $query)or die("kjfjf");
  //echo $query;
    header("location:portal-pending.php");
}

 function calculateimage()
    {
        //$imagearray=getimagesize("upload_pic/thumbnail_{$_SESSION['login_user']}.jpg");
        if(file_exists("upload_pic/thumbnail_{$_GET['hire']}.jpg"))
        {
         echo "upload_pic/thumbnail_{$_GET['hire']}.jpg";
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
        <title>wordsmith | sliding menu demo</title>
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        <link rel="shortcut icon" href="../favicon.ico">
         <link rel="stylesheet" type="text/css" href="css/bootstap.css" />
        <link rel="stylesheet" type="text/css" href="css/core.css" />
        <link rel="stylesheet" type="text/css" href="css/feed.css" />
        <link rel="stylesheet" type="text/css" href="css/profile-image.css" />
                <link rel="stylesheet" type="text/css" href="css/menu.css" />
        <link rel="stylesheet" type="text/css" href="css/search-bar.css" />
        <link rel="stylesheet" media="all" href="css/slider.css" />
        <link rel="stylesheet" type="text/css" href="css/profile-links.css" />
        <script src="js/modernizr.custom.js"></script>
    </head>
<body style="background-color:#eee;">
        <div class="container">
            
            	
            	 <div class="divid">
                <img src="images/header.jpg" alt="img01" />                
                <h1><?php echo $title;?></h1>
                <p><a id="username" href="profile.php?view=<?php echo $creatorid?>">@<?php echo $username?></a></p>
                <p id="timestamp">posted on <?php echo $postedon?></p>
                <br>
                <br><br>
                
            </div>
            


             <form class="form-signin " action="buycopyrights.php?article=<?php echo $_GET['article']?>" method="post" align='center'>
        <h2 class="form-signin-heading"><b>buy</b></h2>
        <p class="help-block"><?php echo $error ?></p>
        
        <input type="integer" class="form-control" placeholder="amount" name="amount" pattern="[0-9]*" required autofocus/>
        <br> 
        
		
        <a href="articles.php?article={$_GET['article']}"><button class="btn btn-lg btn-primary" name="backt" type="button">back</button></a>
 
        <input type="submit" class="btn btn-lg btn-primary" name="submit" value="Submit">
        <br>
      </form>
      	<p class="help-block" align='center'><?php echo $success ?></p>

                  <?php include "basiclayout.php"; ?>
             
            
        











