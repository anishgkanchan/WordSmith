
<?php
session_start();
if(!isset($_SESSION['reg2']))
  header("location:register2.php");
$error="";
if(isset($_POST['submit3']))
{
  
 $dbc=mysqli_connect('mysql13.000webhost.com','a3831866_root','password69','a3831866_test')
      or die("error connecting to the database");
  $query="select * from creator where username='{$_POST['username']}'";
  $result=mysqli_query($dbc, $query)or die("kjfjf");
  $count=mysqli_num_rows($result);
  if($count!=0)
  {
    $error="please select a different username";
  }
  else
  {
    $query="insert into creator(fname,lname,username,password,email) values('{$_SESSION['fname']}','{$_SESSION['lname']}','{$_POST['username']}','{$_POST['password']}','{$_SESSION['email']}')";
    $result=mysqli_query($dbc, $query)or die("dead");
    $_SESSION['username']=$_POST['username'];
    $_SESSION['reg3']="set";
    header("location:register4.php");
  }
}
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

  </head>

  <body id="index-page" >
    <div class="container">
<div align="center">
<h2 align="center" style="background-color: rgba(238,238,238,0.7); font-size: 48px; height: 75px; width: 520px;">Register in just 4 steps!</h2>
<br>
</div>
<form class="form-signin " method="post" action="<?php echo $_SERVER['PHP_SELF']?>" align='center'>
        <h2 class="form-signin-heading"><b>Two</b></h2>

        <input type="text" class="form-control" placeholder="username" name="username" required autofocus>
        <div id='usernameerror'><?php echo $error?></div>
        <br>
        <input type="password" class="form-control" placeholder="password" name="password" required autofocus>
        <br>
        
<div class="progress progress-striped active">
  <div class="progress-bar progress-bar-success"  role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 75%">
    <span class="sr-only">45% Complete</span>
  </div>
</div>
        <a href="register2.html" class="btn btn-lg btn-primary" type="button">Back &laquo;</a>
        <input type="submit" class="btn btn-lg btn-primary" name="submit3" value="Next &raquo;">
        <br>
      </form>
</div>
</div>
</div>
</div>


    </body>
    </html>