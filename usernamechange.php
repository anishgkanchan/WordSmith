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

    $error="";
    $success='';
if(isset($_POST['submit']))
{
  
  
  $query="select * from creator where username='{$_POST['username']}'";
  $result=mysqli_query($dbc, $query)or die("kjfjf");
  $count=mysqli_num_rows($result);
  if($count!=0)
  {
    $error="please select a different username";
    $success="";
  }
  else
  {
    $query="update creator set username='{$_POST['username']}' where creatorid={$_SESSION['login_user']}";
    $result=mysqli_query($dbc, $query)or die("dead");
   	$success="username changed successfully";
  }
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
			  

            <form class="form-signin " action="<?php echo $_SERVER['PHP_SELF']?>" method="post" align='center'>
        <h2 class="form-signin-heading"><b>Change your username</b></h2>
        <p class="help-block"><?php echo $error ?></p>
        <input type="text" class="form-control" placeholder="username" name="username" required autofocus/>
        <br> 
        <a href="editprofile.php"><button class="btn btn-lg btn-primary" name="backt" type="button">back</button></a>
 
        <input type="submit" class="btn btn-lg btn-primary" name="submit" value="Change">
        <br>
      </form>
      	<p class="help-block" align="center"><?php echo $success ?></p>






        <?php include "basiclayout.php";?>
	