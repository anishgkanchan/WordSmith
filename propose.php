<?php
session_start();
$dbc=mysqli_connect('mysql13.000webhost.com','a3831866_root','password69','a3831866_test')
      or die("error connecting to the database");//$hire=$_GET['hire'];
if($_SESSION['login_user']==$_GET['hire'])
	header("location:profile.php?view={$_GET['hire']}");
$query="select * from creator where creatorid={$_GET['hire']}";
    $result=mysqli_query($dbc,$query);
    $row=mysqli_fetch_array($result);
    $name="{$row['fname']} {$row['lname']}";
    $username=$row['username'];
    $about=$row['about'];

    $error="";
    $success='';
if(isset($_POST['submit']))
{
  if(isset($_POST['exclusive']))
  	$exc='yes';
  else
  	$exc='no';
  
  $query="insert into hiredeal(creator1,creator2,duration,amount,exclusive) values('{$_SESSION['login_user']}','{$_GET['hire']}','{$_POST['duration']}','{$_POST['amount']}','{$exc}')";
  $result=mysqli_query($dbc, $query)or die("kjfjf");
  //echo $query;
  //$success="Your proposal has been sent.";
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
        <link rel="stylesheet" type="text/css" href="css/search-bar.css" />
        <link rel="stylesheet" media="all" href="css/slider.css" />
        <link rel="stylesheet" type="text/css" href="css/profile-links.css" />
        <link rel="stylesheet" type="text/css" href="css/menu.css" />
    
        <script src="js/modernizr.custom.js"></script>
    </head>
<body style="background-color:#eee;">
        <div class="container">
           

            	
            	<div>

                <ul class="ch-grid">
                    <li>
                        <div class="ch-item ch-img"  style="top:-40px;background-image:url(<?php echo calculateimage();?>)">
                            <div class="ch-info">
                                <h3><?php echo $name; ?></h3>
                                <p style="margin: -25px 20px;font-size: 13px; border-top: 2px solid rgba(255,255,255,0.8);"><?php echo $about; ?><a href="profile.php?view=<?php echo $_GET['view']?>">@<?php echo $username; ?></a></p>
                            </div>
                        </div>
                   </li>
               </ul>
               </div>
         
           
            


             <form class="form-signin " action="<?php echo "{$_SERVER['PHP_SELF']}?hire={$_GET['hire']}"?>" method="post" align='center'>
        <h2 class="form-signin-heading"><b>hire</b></h2>
        <p class="help-block"><?php echo $error ?></p>
        <input type="integer" class="form-control" placeholder="duration(in months)" name="duration" pattern="[0-9]*" required autofocus/>
 
        <p class="help-block">Only numbers allowed</p>
        <input type="integer" class="form-control" placeholder="amount" name="amount" pattern="[0-9]*" required autofocus/>
        
        <p class="help-block">Only numbers allowed</p>
        <label class="checkbox-inline">
  		<input type="checkbox" id="inlineCheckbox1" value="Exclusive" name="exclusive">Exclusive
		</label>
		<br>
        <a href="profile.php?view={$_GET['hire']}"><button class="btn btn-lg btn-primary" name="backt" type="button">back</button></a>
 
        <input type="submit" class="btn btn-lg btn-primary" name="submit" value="Submit">
        <br>
      </form>
      	<p class="help-block" align='center'><?php echo $success ?></p>

                  <?php include "basiclayout.php"; ?>
             
      







