


<!DOCTYPE html>

<?php 
session_start();
$user=$_SESSION['login_user'];
$unread="";
$dbc=mysqli_connect('mysql13.000webhost.com','a3831866_root','password69','a3831866_test')
      or die("error connecting to the database");
    $query="select * from pm where user2={$user} and user2read='no'";
    $result=mysqli_query($dbc,$query);
    if($result!=false)
    while($row=mysqli_fetch_array($result))
    {
        $id=$row['id'];
        $user1=$row['user1'];
        $time=$row['timestamp'];
        $message=$row['message'];
        $query1="select * from creator where creatorid={$user1}";
        $row=mysqli_fetch_array(mysqli_query($dbc,$query1));
        $username=$row['username'];
        $unread.="<div class=\"message\">
    <h2>from @{$username}</h2>
    {$message}
    <p><i>{$time}</i></p>
</div>";   
        //$r="update pm set user2.read='yes' where id={$id}";
        //$t=mysqli_query($dbc,$r);
    }
    else
    	$unread="<div class=\"message\">No messages</div>";



    $read="";
        $query="select * from pm where user2='".$user."' and user2read='yes'";
    $result=mysqli_query($dbc,$query);
    if($result!=false)
    while($row=mysqli_fetch_array($result))
    {
        $user1=$row['user1'];
        $time=$row['timestamp'];
        $query1="select * from creator where creatorid={$user1}";
        $row=mysqli_fetch_array(mysqli_query($dbc,$query1));
        $username=$row['username'];
        $read.="<div class=\"message\">
    <h2>from @{$username}</h2>
    <p><i>{$time}</i></p>
</div>";   

    } else
    	$read="<div class=\"message\">No messages</div>";




$sent="";
        $query="select * from pm where user1={$user}";
    $result=mysqli_query($dbc,$query);
      if($result!=false)
    while($row=mysqli_fetch_array($result))
    {
        $user1=$row['user1'];
        $time=$row['timestamp'];
        $query1="select * from creator where creatorid={$user1}";
        $row=mysqli_fetch_array(mysqli_query($dbc,$query1));
        $username=$row['username'];
        $sent.="<div class=\"message\">
    <h2>to @{$username}</h2>
    <p><i>{$time}</i></p>
</div>";   

    }
     else
    	$sent="<div class=\"message\">No messages</div>";







?>


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
        <link rel="stylesheet" type="text/css" href="css/core.css" />
        <link rel="stylesheet" type="text/css" href="css/menu.css" />
        
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
            
            













<div style="width:80%;margin:0 auto">
<div style="width:100%;background-color:#ddd;margin-top:20px;margin-bottom:20px;padding:10px;padding-left:30px">
	
<h1 style="color:#555">Unread Messages</h1>
<?php echo $unread;?>
</div>
<div style="width:100%;background-color:#ddd;margin-top:20px;margin-bottom:20px;padding:10px;padding-left:30px">

<h1 style="color:#555">Read Messages</h1>
<?php echo $read;?>

</div>
<div style="width:100%;background-color:#ddd;margin-top:20px;margin-bottom:20px;padding:10px;padding-left:30px">

<h1 style="color:#555">Sent Messages</h1>
<?php echo $sent;?>
</div>
</div>








           <?php include "basiclayout.php" ?>
</body>
</html>











