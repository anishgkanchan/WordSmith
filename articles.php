 <?php
session_start();
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
    $dbc=mysqli_connect('mysql13.000webhost.com','a3831866_root','password69','a3831866_test')
      or die("error connecting to the database");
  $query="select * from liketable where creatorid={$user} and articleid={$article}";
  $result=mysqli_query($dbc,$query);
  
  $count=mysqli_num_rows($result);
  if($count==0)
    return "";
    else
        return "disabled";
}
$url= calculatearticleimage($aid);
 function calculatearticleimage()
    {
        //$imagearray=getimagesize("upload_pic/thumbnail_{$_SESSION['login_user']}.jpg");
        if(file_exists("Articleimage/{$_GET['article']}.jpg"))
        {
         return "Articleimage/{$_GET['article']}.jpg";
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
	</head>
	<body>
		<div class="container">
			<div class="article-image" style="background-image: url(<?php echo  calculatearticleimage();?>)" >
				<h1><?php echo $title?></h1>
				<p><a id="un">@<?php echo $username?> </a>|<span id="cat"> under <a>Entertainment</a> <a>Art</a> <a>Design</a></span> |<span id="ts"> posted on october 01 at 02:00pm</span></p>
			</div>						 
          	<div class="article">
          		<?php echo $content?></div>
			<p> <a href="" id="butt-on" class="glyphicon glyphicon-thumbs-up"> Like</a> <a href="buycopyrights.php?article=<?php echo $aid?>" id="butt-on1" class="glyphicon glyphicon-briefcase"> Buy</a></p>
			
			<div id="display"  style="padding-top: 10px;background-color:#aaa; padding-left:10px;">
				<div style="width:100%; "><h2>Comments<hr></h2>
				<br>
				<button id="viewall">view all</button>
					<div id="showall">
					<br>
					<?php

						$dbc=mysqli_connect('mysql13.000webhost.com','a3831866_root','password69','a3831866_test')
      or die("error connecting to the database");
						$query='select * from comments where articleid="'.$_GET['article'].'" limit 0,5';
						$result = mysqli_query($dbc,$query) or die('no query');


						while($row = mysqli_fetch_array($result))
						{ 	    		        
						   	 	echo '<div class="molly"><h3>'.$row["content"].'</h3></div>';		
						}

					?>
					</div>
				</div>
			</div>
			<div class="molly"><h2>Post a comment</h2><input type="text" id="comment" ></input></div>
			<div class="line">	</div>
	        
		








<script type="text/javascript" src="jquery 1.6.4.min.js"></script> 
        <script type="text/javascript">
		$(document).ready(function() {

			$("#comment").keypress(function(e) {
				var code = (e.keyCode ? e.keyCode : e.which);
		 		if(code == 13)
		  		{
				
		  			var comment="<div><h3>"+$('#comment').val()+"</h3></div>";

					$("#showall").append(comment);

					$.ajax({
								type: "POST",
								url: "postcomment.php",
								data: { comment: $('#comment').val(),articleid:$('#articleid').val()},
								cache: false,
								success: function(html){
									$("div#temporary").html(html);
								}
							});

		  		}
			});


			$("#viewall").click(function(e) {
				
				$.ajax({
							type: "POST",
							url: "allcomments.php",
							data: {articleid:$('#articleid').val()},
							cache: false,
							success: function(html){
								$("div#showall").html(html);
							}
						});

			});
		});
		</script>









   
       <input type="hidden" id="articleid" value="<?php echo $_GET['id']?>" />
	<?php include "basiclayout.php"?>