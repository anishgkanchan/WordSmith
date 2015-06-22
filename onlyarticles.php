<?php

$aid=$_GET['article'];
$dbc=mysqli_connect('mysql13.000webhost.com','a3831866_root','password69','a3831866_test')
      or die("error connecting to the database");
$query = 'SELECT * FROM article WHERE articleid="'.$_GET['article'].'"';
$result = mysqli_query($dbc,$query)or die('no query');
$row = mysqli_fetch_array($result);
 $title=$row["title"];
 $post=$row['timestamp'];
 $creator=$row['creatorid'];
$query1 = "SELECT * FROM creator WHERE creatorid={$creator}";
$result1 = mysqli_query($dbc,$query1)or die('no query');
$row1 = mysqli_fetch_array($result1);
 $name="{$row1['fname']} {$row1['lname']}";
    $username=$row1['username'];
    $about=$row1['about'];
//$author=$row[""];
	//	$id=$row["articleid"];
		$query='select*from creator where creatorid="{$id}"';
		$content=file_get_contents("{$_GET['article']}.txt");
//////////////  QUERY THE MEMBER DATA INITIALLY LIKE YOU NORMALLY WOULD
function likedisabled()
{
    $user=$_SESSION['login_user'];
    $article=$_GET['article'];
    $dbc=mysqli_connect('localhost','root','','test')
  or die("error connecting to the database");
  $query="select * from liketable where creatorid={$user} and articleid={$article}";
  $result=mysqli_query($dbc,$query);
  
  $count=mysqli_num_rows($result);
  if($count==0)
    return "";
    else
        return "disabled";
}

 function calculatearticleimage($id)
    {
        //$imagearray=getimagesize("upload_pic/thumbnail_{$_SESSION['login_user']}.jpg");
        if(file_exists("Articleimage/{$id}.jpg"))
        {
         return "Articleimage/{$id}.jpg";
        }
        else
            return "Articleimage/header.jpg";
    }

         function calculateimage1()
    {
        $id=$creator;
        //$imagearray=getimagesize("upload_pic/thumbnail_{$_SESSION['login_user']}.jpg");
        if(file_exists("upload_pic/thumbnail_{$id}.jpg"))
        {
         echo "upload_pic/thumbnail_{$id}.jpg";
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
		<title>Image article-mains with Pseudo-Elements</title>
		<meta name="description" content="Image article-mains with Pseudo-Elements: (Ab)using data attributes and pseudo-elements" />
		<meta name="keywords" content="data attribute, image article-main, pseudo-element, css3, tutorial" />
		<link rel="shortcut icon" href="../favicon.ico">
        <link rel="stylesheet" type="text/css" href="css/articles-profile.css" />
		<link rel="stylesheet" type="text/css" href="css/articles.css" />
		<link rel="stylesheet" type="text/css" href="css/menu.css" />
		<link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/core.css" rel="stylesheet">
		<script src="js/modernizr.custom.js"></script>
		<script src="jquery1.6.4.min"></script>
	</head>
	<body>
		<div class="container">
			 <input type="hidden" value="<?php echo $_SESSION['login_user']?>" id="hiddenuser"/>
<input type="hidden" value="<?php echo $_GET['article']?>" id="hiddenarticle"/>

			<div class="article-image">
				<h1><?php echo $title;?></h1>
				<p><a id="un">@<?php echo $username;?> </a>|<span id="cat"> under Entertainment Art Design </span> |<span id="ts"> posted on <?php echo $post;?></span></p>
			</div>						 
          	<div class="article">
          		<?php echo $content;?>
			</div>
			<div class="line">	</div>
			

	       </div></body></html>