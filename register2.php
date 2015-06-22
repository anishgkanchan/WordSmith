<?php
session_start();
echo $_SESSION['code'];
if(!isset($_SESSION['reg1']))
  header("location:registeration.php");
if(isset($_POST['submit1']))
{
  
    //session_start();

   if( $_SESSION['code']==$_POST['code2'])
   {
      $_SESSION['reg2']="set";
        header("location:register3.php");
    }

}

?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
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
<form class="form-signin " action="<?php echo $_SERVER['PHP_SELF']?>" method="post" align='center'>
        <h2 class="form-signin-heading"><b>Two</b></h2>
        <p class="help-block">We've sent you a code for verification.Please check your mail</p>
        <input type="text" class="form-control" placeholder="code" name="code2" required autofocus>
        <br>
        
        
<div class="progress progress-striped active">
  <div class="progress-bar progress-bar-success"  role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 50%">
    <span class="sr-only">45% Complete</span>
  </div>
</div>
        <a href="registeration.php" class="btn btn-lg btn-primary" type="button">Back &laquo;</a>
        <input type="submit" class="btn btn-lg btn-primary" name="submit1" value="Next &raquo;">
        <br>
      </form>
</div>
</div>
</div>
</div>


    </body>
    </html>