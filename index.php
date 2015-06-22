<?php
$error="";
$dbc=mysqli_connect('localhost','root','','test')
      or die("error connecting to the database");
session_start();
if(isset($_POST['submit']))
{ $error="";
// username and password sent from Form 
$myusername=addslashes($_POST['username']); 
$mypassword=addslashes($_POST['password']); 

$sql="SELECT * FROM creator WHERE username='{$_POST['username']}' and password='{$_POST['password']}'";
$result=mysqli_query($dbc,$sql);
$row=mysqli_fetch_array($result);

$count=mysqli_num_rows($result);
// If result matched $myusername and $mypassword, table row must be 1 row
if($count==1)
{

//setcookie( "userlogin", $row["creatorid"], time() + 60*60 ,"/");
session_start();

$_SESSION['login_user']=$row["creatorid"];

header("location:homepage.php");
}
else 
{
$error="Your Login Name or Password is invalid";
}
}
?>




















<!DOCTYPE html>
<html Learng="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../assets/ico/favicon.png">
    <title>Welcome to wordsmith</title>
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/core.css" rel="stylesheet">
     <link rel="stylesheet" type="text/css" href="css/featured.css" />
     <script type="text/javascript" src="js/modernizr.custom.26633.js"></script>
    <noscript>
      <link rel="stylesheet" type="text/css" href="css/fallback.css" />
    </noscript>
      
  </head>

  <body id="index-page" >
    <div class="container">
        <div class="row" style="margin-top:120px;">
          <div class="col-lg-4" id="Main">
            <h1 id="title"> <span id="smith">word</span>smith</h1>
        <p id="cyw">craft your <span id="words">words</span></p>
        <p align=center><a class="btn btn-primary btn-lg">View Featured Articles &raquo;</a> 
          <a href="registeration.php" class="btn btn-primary btn-lg btn-block">Sign Up&raquo;</a></p>
          </div>
          <div class=" col-lg-offset-8">
      
      <form class="form-signin " action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
        <h2 class="form-signin-heading">Please Log In</h2>
        <input type="text" class="form-control" name="username" placeholder="Username" autofocus>
        <input type="password" class="form-control" name="password" placeholder="Password">
        <p class="help-block"><?php echo $error ?></p>
        <!--<label class="checkbox">
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      -->
        <a href="forgot.php">Forgot Password??</a>
        <input type="submit" class="btn btn-lg btn-primary btn-block" value="Sign in" name="submit">
        <br>
      </form>
    </div>
    </div>
  </div>

    <section class="main">

        <div id="ri-grid" class="ri-grid ri-grid-size-3">
          
          <ul>
            <li><a href="onlyarticles.php?article=1"><img src="images/medium/1.jpg"/>Time to reflect upon ourselves<p>@sohamkanade</p></a></a></li>
            <li><a href="onlyarticles.php?article=2"><img src="images/medium/2.jpg"/>Time to reflect upon ourselves<p>@sohamkanade</p></a></a></li>
            <li><a href="onlyarticles.php?article=3"><img src="images/medium/3.jpg"/>Time to reflect upon ourselves<p>@sohamkanade</p></a></a></li>
            <li><a href="onlyarticles.php?article=4"><img src="images/medium/4.jpg"/>Time to reflect upon ourselves<p>@sohamkanade</p></a></a></li>
            <li><a href="onlyarticles.php?article=5"><img src="images/medium/5.jpg"/>Time to reflect upon ourselves<p>@sohamkanade</p></a></a></li>
            <li><a href="onlyarticles.php?article=6"><img src="images/medium/6.jpg"/>Time to reflect upon ourselves<p>@sohamkanade</p></a></a></li>
            <li><a href="onlyarticles.php?article=7"><img src="images/medium/7.jpg"/>Time to reflect upon ourselves<p>@sohamkanade</p></a></a></li>
            <li><a href="onlyarticles.php?article=8"><img src="images/medium/8.jpg"/>Time to reflect upon ourselves<p>@sohamkanade</p></a></a></li>
            <li><a href="onlyarticles.php?article=9"><img src="images/medium/9.jpg"/>Time to reflect upon ourselves<p>@sohamkanade</p></a></a></li>
            <li><a href="onlyarticles.php?article=10"><img src="images/medium/10.jpg"/>Time to reflect upon ourselves<p>@sohamkanade</p></a></a></li>
            <li><a href="onlyarticles.php?article=11"><img src="images/medium/11.jpg"/>Time to reflect upon ourselves<p>@sohamkanade</p></a></a></li>
            <li><a href="onlyarticles.php?article=12"><img src="images/medium/12.jpg"/>Time to reflect upon ourselves<p>@sohamkanade</p></a></a></li>
            <li><a href="onlyarticles.php?article=13"><img src="images/medium/13.jpg"/>Time to reflect upon ourselves<p>@sohamkanade</p></a></a></li>
            <li><a href="onlyarticles.php?article=14"><img src="images/medium/header.jpg"/>Time to reflect upon ourselves<p>@sohamkanade</p></a></li>
            <li><a href="onlyarticles.php?article=15"><img src="images/medium/default.jpg"/>Time to reflect upon ourselves<p>@sohamkanade</p></a></a></li>
            <li><a href="onlyarticles.php?article=16"><img src="images/medium/16.jpg"/>Time to reflect upon ourselves<p>@sohamkanade</p></a></a></li>
            <li><a href="onlyarticles.php?article=17"><img src="images/medium/17.jpg"/>Time to reflect upon ourselves<p>@sohamkanade</p></a></a></li>
            <li><a href="onlyarticles.php?article=18"><img src="images/medium/18.jpg"/>Time to reflect upon ourselves<p>@sohamkanade</p></a></a></li>
            <li><a href="onlyarticles.php?article=19"><img src="images/medium/19.jpg"/>Time to reflect upon ourselves<p>@sohamkanade</p></a></a></li>
            <li><a href="onlyarticles.php?article=20"><img src="images/medium/20.jpg"/>Time to reflect upon ourselves<p>@sohamkanade</p></a></a></li>
            <li><a href="onlyarticles.php?article=1"><img src="images/medium/21.jpg"/>Time to reflect upon ourselves<p>@sohamkanade</p></a></a></li>
            <li><a href="onlyarticles.php?article=2"><img src="images/medium/22.jpg"/>Time to reflect upon ourselves<p>@sohamkanade</p></a></a></li>
            <li><a href="onlyarticles.php?article=3"><img src="images/medium/23.jpg"/>Time to reflect upon ourselves<p>@sohamkanade</p></a></a></li>
            <li><a href="onlyarticles.php?article=4"><img src="images/medium/24.jpg"/>Time to reflect upon ourselves<p>@sohamkanade</p></a></a></li>
            <li><a href="onlyarticles.php?article=5"><img src="images/medium/25.jpg"/>Time to reflect upon ourselves<p>@sohamkanade</p></a></a></li>
            <li><a href="onlyarticles.php?article=6"><img src="images/medium/26.jpg"/>Time to reflect upon ourselves<p>@sohamkanade</p></a></a></li>
            <li><a href="onlyarticles.php?article=7"><img src="images/medium/27.jpg"/>Time to reflect upon ourselves<p>@sohamkanade</p></a></a></li>
            <li><a href="onlyarticles.php?article=8"><img src="images/medium/28.jpg"/>Time to reflect upon ourselves<p>@sohamkanade</p></a></a></li>
            <li><a href="onlyarticles.php?article=9"><img src="images/medium/29.jpg"/>Time to reflect upon ourselves<p>@sohamkanade</p></a></a></li>
            <li><a href="onlyarticles.php?article=10"><img src="images/medium/30.jpg"/>Time to reflect upon ourselves<p>@sohamkanade</p></a></a></li>
            <li><a href="onlyarticles.php?article=11"><img src="images/medium/31.jpg"/>Time to reflect upon ourselves<p>@sohamkanade</p></a></a></li>
            <li><a href="onlyarticles.php?article=12"><img src="images/medium/32.jpg"/>Time to reflect upon ourselves<p>@sohamkanade</p></a></a></li>
            <li><a href="onlyarticles.php?article=13"><img src="images/medium/33.jpg"/>Time to reflect upon ourselves<p>@sohamkanade</p></a></a></li>
            <li><a href="onlyarticles.php?article=14"><img src="images/medium/34.jpg"/>Time to reflect upon ourselves<p>@sohamkanade</p></a></a></li>
            <li><a href="onlyarticles.php?article=15"><img src="images/medium/35.jpg"/>Time to reflect upon ourselves<p>@sohamkanade</p></a></a></li>
            <li><a href="onlyarticles.php?article=16"><img src="images/medium/36.jpg"/>Time to reflect upon ourselves<p>@sohamkanade</p></a></a></li>
            <li><a href="onlyarticles.php?article=17"><img src="images/medium/37.jpg"/>Time to reflect upon ourselves<p>@sohamkanade</p></a></a></li>
            <li><a href="onlyarticles.php?article=18"><img src="images/medium/38.jpg"/>Time to reflect upon ourselves<p>@sohamkanade</p></a></a></li>
            <li><a href="onlyarticles.php?article=19"><img src="images/medium/39.jpg"/>Time to reflect upon ourselves<p>@sohamkanade</p></a></a></li>
            <li><a href="onlyarticles.php?article=20"><img src="images/medium/40.jpg"/>Time to reflect upon ourselves<p>@sohamkanade</p></a></a></li>
            <li><a href="#"><img src="images/medium/41.jpg"/>Time to reflect upon ourselves<p>@sohamkanade</p></a></a></li>
            <li><a href="#"><img src="images/medium/42.jpg"/>Time to reflect upon ourselves<p>@sohamkanade</p></a></a></li>
            <li><a href="#"><img src="images/medium/43.jpg"/>Time to reflect upon ourselves<p>@sohamkanade</p></a></a></li>
            <li><a href="#"><img src="images/medium/44.jpg"/>Time to reflect upon ourselves<p>@sohamkanade</p></a></a></li>
            <li><a href="#"><img src="images/medium/45.jpg"/>Time to reflect upon ourselves<p>@sohamkanade</p></a></a></li>
            <li><a href="#"><img src="images/medium/46.jpg"/>Time to reflect upon ourselves<p>@sohamkanade</p></a></a></li>
            <li><a href="#"><img src="images/medium/47.jpg"/>Time to reflect upon ourselves<p>@sohamkanade</p></a></a></li>
            <li><a href="#"><img src="images/medium/48.jpg"/>Time to reflect upon ourselves<p>@sohamkanade</p></a></a></li>
            <li><a href="#"><img src="images/medium/49.jpg"/>Time to reflect upon ourselves<p>@sohamkanade</p></a></a></li>
            <li><a href="#"><img src="images/medium/50.jpg"/>Time to reflect upon ourselves<p>@sohamkanade</p></a></a></li>
            <li><a href="#"><img src="images/medium/51.jpg"/>Time to reflect upon ourselves<p>@sohamkanade</p></a></a></li>
            <li><a href="#"><img src="images/medium/52.jpg"/>Time to reflect upon ourselves<p>@sohamkanade</p></a></a></li>
            <li><a href="#"><img src="images/medium/53.jpg"/>Time to reflect upon ourselves<p>@sohamkanade</p></a></a></li>
            <li><a href="#"><img src="images/medium/54.jpg"/>Time to reflect upon ourselves<p>@sohamkanade</p></a></a></li>
          </ul>
        </div>
        
      </section>
           
    </div> <!-- /container -->
  <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery.gridrotator.js"></script>
    <script type="text/javascript"> 
      $(function() {
      
        $( '#ri-grid' ).gridrotator( {
          rows : 4,
          columns : 8,
          maxStep : 2,
          interval : 2500,
          w1024 : {
            rows : 5,
            columns : 6
          },
          w768 : {
            rows : 5,
            columns : 5
          },
          w480 : {
            rows : 6,
            columns : 4
          },
          w320 : {
            rows : 7,
            columns : 4
          },
          w240 : {
            rows : 7,
            columns : 3
          },
          preventClick : false
        } );
      
      });
    </script>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  </body>
</html>
