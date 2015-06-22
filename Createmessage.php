<?php session_start();
$current=$_SESSION['login_user'];
$user2=$_GET['to'];
$dbc=mysqli_connect('mysql13.000webhost.com','a3831866_root','password69','a3831866_test')
      or die("error connecting to the database");
    $query="select * from creator where creatorid={$user2}";
    $result=mysqli_query($dbc,$query);
    $row=mysqli_fetch_array($result);
    $username=$row['username'];

    if(isset($_POST['submit']))
    {
        $query="insert into pm(user1,user2,message) values({$current},{$user2},'{$_POST['thread']}')";
        $result=mysqli_query($dbc,$query);
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
        <link rel="stylesheet" type="text/css" href="css/categories.css" />
        <link rel="stylesheet" type="text/css" href="css/search-bar.css" />
        <link rel="stylesheet" type="text/css" href="css/bootstap.css" />
        <link rel="stylesheet" type="text/css" href="css/menu.css" />
        
        <link rel="stylesheet" type="text/css" href="css/core.css" />
        <link rel="stylesheet" media="all" href="css/slider.css" />
        <script src="js/modernizr.custom.js"></script>
        <style>
        #message
        {font-size:1em;
				background-color: #3c6;
				color:#fff;
				border-radius: 5px;
				border-bottom: 10px thick solid #3c6;
        }
        </style>
    </head>
<body style="background-color:#eee;">
        <div class="container">
           
















<div style="width:100%">
	<form action="Createmessage.php?to=<?php echo $_GET['to'] ?>" method="post">
<h1 style="">Message <?php echo $username?></h1>
<textarea rows="20" cols="40" class="ckeditor" id="editor1" name="thread" style="width:100%;margin:0 auto; required"></textarea>
<div style="width:20%;margin-top:10px;border:0;"><input id="message" type="submit" name="submit" style="width:100%;height:40px"/></div>
</form>
</div>






















<?php include "basiclayout.php";?>