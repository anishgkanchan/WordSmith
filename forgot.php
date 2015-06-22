<?php
$error="";
if(isset($_POST['submit']))
{
  $error="";
    $dbc=mysqli_connect('mysql13.000webhost.com','a3831866_root','password69','a3831866_test')
      or die("error connecting to the database");
  $query="select * from creator where email='{$_POST['emailid']}'";
  $result=mysqli_query($dbc,$query);
  $count=mysqli_num_rows($result);
  if($count!=1)
  {
    $error="invalid email...Enter again";
  }
  else
  {
    $row=mysqli_fetch_array($result);
    $msgbody="Username : {$row[username]} and Password: {$row[password]}";
    $email=$_POST['emailid'];
    include "mail.php";
    header("location:index.php");      
  }
  }


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">l.
    <link rel="shortcut icon" href="../../assets/ico/favicon.png">

    <title>wordsmith | registeration</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
   
    <!-- Custom styles for this template -->
<link href="css/core.css" rel="stylesheet">

  </head>

  <body id="index-page" >
    <div class="container">
<div align="center">
<h2 align="center" style="background-color: rgba(238,238,238,0.7); font-size: 48px; height: 75px; width: 520px;">Register in just 4 steps!</h2>
<br>
</div>
<form class="form-signin " action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" align='center'>
        <p class="help-block">Please enter your email address </p>
        <input type="text" name="emailid"  class="form-control" placeholder="email" required autofocus>
        <br>  
        <p class="help-block"><?php echo $error ?> </p>
        <input type="submit" name="submit" class="btn btn-lg btn-primary" value="Submit">
        <br>
      </form>
</div>
</div>
</div>
</div>
x x

    </body>
    </html>