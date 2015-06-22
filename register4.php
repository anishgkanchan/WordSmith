<?php
session_start();
if(!isset($_SESSION['reg3']))
  header("location:register3.php");
  if(isset($_POST['submit4']))
  {
    
    $dbc=mysqli_connect('mysql13.000webhost.com','a3831866_root','password69','a3831866_test')
      or die("error connecting to the database");
    $query="select * from creator where username='{$_SESSION['username']}'";
    $result=mysqli_query($dbc,$query);
    $row=mysqli_fetch_array($result);
    $id=$row['creatorid'];
    echo $id;
    for($i=1;$i<=30;$i++)
    {
      //echo 'cat'.$i.'';
      if(isset($_POST['cat'.$i]))
      {
        $query="insert into creatorcategory(creatorid,categoryid) values('{$id}',{$i})";
        //echo $query;
        $result=mysqli_query($dbc,$query);
      }
    }
    header("location:sliders.php?user={$id}");
  }

else{
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
<form class="form-signin " action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" align='center'>
        <h2 class="form-signin-heading"><b>Four</b></h2>
        <label for="exampleInputEmail1">Tell us your interests!</label>
        <div style="line height: 2;">
        <label class="checkbox-inline">
  <input type="checkbox" id="inlineCheckbox1" value="option1" name="cat1"> Art
</label>
<label class="checkbox-inline">
  <input type="checkbox" id="inlineCheckbox1" value="option1" name="cat2"> Books
</label>
<label class="checkbox-inline">
  <input type="checkbox" id="inlineCheckbox1" value="option1" name="cat3"> Business
</label>
<label class="checkbox-inline">
  <input type="checkbox" id="inlineCheckbox1" value="option1" name="cat4"> Culture
</label>
       </div>
       <div style="line height: 2;">
        <label class="checkbox-inline">
  <input type="checkbox" id="inlineCheckbox1" name="cat5" value="option1"> Design
</label>
<label class="checkbox-inline">
  <input type="checkbox" id="inlineCheckbox1" name="cat6" value="option1"> Education
</label>
<label class="checkbox-inline">
  <input type="checkbox" id="inlineCheckbox1" name="cat7" value="option1"> Entertainment
</label>

       </div>
       <div>

       <label class="checkbox-inline">
  <input type="checkbox" id="inlineCheckbox1" name="cat8" value="option1"> Fashion
<label class="checkbox-inline">
  <input type="checkbox" id="inlineCheckbox1" name="cat9" value="option1"> Fiction
</label>
<label class="checkbox-inline">
  <input type="checkbox" id="inlineCheckbox1" value="option1" name="cat10"> Food
</label>
<label class="checkbox-inline">
  <input type="checkbox" id="inlineCheckbox1" value="option1" name="cat11"> God
</label>
       </div>
       <tr style="height:10px"></tr>
       <div>
        <label class="checkbox-inline">
  <input type="checkbox" id="inlineCheckbox1" value="option1" name="cat12"> History
</label>
<label class="checkbox-inline">
  <input type="checkbox" id="inlineCheckbox1" value="option1" name="cat13"> Humour
</label>
<label class="checkbox-inline">
  <input type="checkbox" id="inlineCheckbox1" value="option1" name="cat14"> Life
</label>
<label class="checkbox-inline">
  <input type="checkbox" id="inlineCheckbox1" value="option1" name="cat15"> Lifestyle
</label>
       </div>
       <div>
        <label class="checkbox-inline">
  <input type="checkbox" id="inlineCheckbox1" value="option1" name="cat16"> Movies
</label>
<label class="checkbox-inline">
  <input type="checkbox" id="inlineCheckbox1" value="option1" name="cat17"> Music
</label>
<label class="checkbox-inline">
  <input type="checkbox" id="inlineCheckbox1" value="option1" name="cat18"> News
</label>
<label class="checkbox-inline">
  <input type="checkbox" id="inlineCheckbox1" value="option1" name="cat19"> People
</label>
       </div>
       <div>
        <label class="checkbox-inline">
  <input type="checkbox" id="inlineCheckbox1" value="option1" name="cat20"> Philosophy
</label>
<label class="checkbox-inline">
  <input type="checkbox" id="inlineCheckbox1" value="option1" name="cat21"> Photography
</label>
<label class="checkbox-inline">
  <input type="checkbox" id="inlineCheckbox1" value="option1" name="cat22"> Poetry
</label>

       </div>
       <label class="checkbox-inline">
  <input type="checkbox" id="inlineCheckbox1" value="option1" name="cat23"> Politics
</label>
<label class="checkbox-inline">
  <input type="checkbox" id="inlineCheckbox1" value="option1" name="cat24"> Relationships
</label>
<label class="checkbox-inline">
  <input type="checkbox" id="inlineCheckbox1" value="option1" name="cat25"> Religion
</label>
       <div>
        <label class="checkbox-inline">
  <input type="checkbox" id="inlineCheckbox1" value="option1" name="cat26"> Science
</label>
<label class="checkbox-inline">
  <input type="checkbox" id="inlineCheckbox1" value="option1" name="cat27"> Sport
</label>
<label class="checkbox-inline">
  <input type="checkbox" id="inlineCheckbox1" value="option1" name="cat28"> Tech
</label>
<label class="checkbox-inline">
  <input type="checkbox" id="inlineCheckbox1" value="option1" name="cat29"> TV
</label>
<label class="checkbox-inline">
  <input type="checkbox" id="inlineCheckbox1" value="option1" name="cat30"> Travel
</label>

       </div>
       <br>
        <div class="progress progress-striped active">
  <div class="progress-bar progress-bar-success"  role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 99%">
    <span class="sr-only">45% Complete</span>
  </div>
</div>
        <a href="reg2.html" class="btn btn-lg btn-primary" type="button">Back &laquo;</a>

        <input type="submit" name="submit4" class="btn btn-lg btn-primary" value="Register!">
        <br>
      </form>
</div>
</div>
</div>
</div>
x x

    </body>
    </html>
<?php } ?>