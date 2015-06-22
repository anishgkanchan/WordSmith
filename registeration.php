<?php
if(isset($_POST['submit']))
{
   $random_string = "";

    // count the number of chars in the valid chars string so we know how many choices we have
   $valid_chars="abcdefghijklmnopqrstuvwxyz";
    $num_valid_chars = strlen($valid_chars);
    $length=30;
    // repeat the steps until we've created a string of the right length
    for ($i = 0; $i < $length; $i++)
    {
        // pick a random number from 1 up to the number of valid chars
        $random_pick = mt_rand(1,$num_valid_chars);

        // take the random character out of the string of valid chars
        // subtract 1 from $random_pick because strings are indexed starting at 0, and we started picking at 1
        $random_char = $valid_chars[$random_pick-1];

        // add the randomly-chosen char onto the end of our string so far
        $random_string .= $random_char;
    }

    // return our finished random string
    $code=$random_string;
    $msgbody="enter this code to complete your registration {$code}";
    $email=$_POST["email"];
    include "mail.php";
    session_start();
    $_SESSION['code']=$code;
    $_SESSION['fname']=$_POST['fname'];
    $_SESSION['lname']=$_POST['lname'];
    $_SESSION['email']=$_POST['email'];
    $_SESSION['reg1']="set";
    header("location:register2.php");
  
  
}
else
{
?>

<!DOCTYPE html>
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

    

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="../../assets/js/html5shiv.js"></script>
      <script src="../../assets/js/respond.min.js"></script>
    <![endif]-->
  </head>

  <body id="index-page" >
    <div class="container">
<div align="center">
<h2 align="center" style="background-color: rgba(238,238,238,0.7); font-size: 48px; height: 75px; width: 520px;">Register in just 4 steps!</h2>
<br>
</div>
<form class="form-signin " action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" align='center'>
  
        <h2 class="form-signin-heading"><b>One</b></h2>
        <input type="text" class="form-control" name="fname" placeholder="First Name" pattern="[a-zA-Z ]*" required autofocus>
        <p class="help-block">Only alphabets allowed </p>
        <input type="text" class="form-control" name="lname" placeholder="Last Name" pattern="[a-zA-Z ]*" required autofocus>
        <p class="help-block">Only alphabets allowed</p>
        <input type="email" class="form-control" name="email" placeholder="Email" pattern="^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$" required autofocus>
        <p class="help-block">example:abc@example.com</p>
<div class="progress progress-striped active">
  <div class="progress-bar progress-bar-success"  role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 25%">
    <span class="sr-only">45% Complete</span>
  </div>
</div>
        <input type="submit" class="btn btn-lg btn-primary btn-block" value="Next >>" name="submit"></input>
        <br>

      </form>
</div>
</div>
</div>
</div>


    </body>
    </html>
    <?php } ?>