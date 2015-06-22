<?php
session_start();
$dbc=mysqli_connect('mysql13.000webhost.com','a3831866_root','password69','a3831866_test')
      or die("error connecting to the database");
    $query="select * from category where categoryid='{$_GET['cat']}'";
    $result=mysqli_query($dbc,$query);
    $row=mysqli_fetch_array($result);
    $catname=$row['categoryname'];

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
   ?>



<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>wordsmith | categories</title>
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link rel="shortcut icon" href="../favicon.ico">
		<link rel="stylesheet" type="text/css" href="css/menu.css" />
		
		<link rel="stylesheet" type="text/css" href="css/default.css" />
		<link rel="stylesheet" type="text/css" href="css/categories.css" />
		<link rel="stylesheet" type="text/css" href="css/search-bar.css" />
		<link rel="stylesheet" type="text/css" href="css/bootstap.css" />
		<link rel="stylesheet" type="text/css" href="css/core.css" />
		<link rel="stylesheet" media="all" href="css/slider.css" />
		<link rel="stylesheet" type="text/css" media="all" href="css/feed.css" />
		<script src="js/modernizr.custom.js"></script>
	</head>
	<body style="background-color:#eee;">
		<div class="container">
			



           <div class="title1" style="margin-bottom:100px">
                <p><img src="images/grid.png">
               <?php echo $catname?></p> <hr>
            </div>


          	<?php
          		$query="select * from articlecategory where categoryid={$_GET['cat']}";
          		$result=mysqli_query($dbc,$query);

	        	while($row1 = mysqli_fetch_array($result))
				{
					$id=$row1['articleid'];
					$sql2 = mysqli_query($dbc,'SELECT * from article WHERE articleid="'.$id.'"'); 
					$articledetails=mysqli_fetch_array($sql2);
					$postedon=$articledetails['timestamp'];
					$title=$articledetails["title"];
					$creatorid=$articledetails["creatorid"];
					$q="select * from creator where creatorid={$creatorid}";
					$r=mysqli_fetch_array(mysqli_query($dbc,$q));
					$username=$r['username'];
					$myfile=fopen("{$articledetails["articleid"]}.txt","r");
					$content="";
					$currentRow=0;
					$numRows=18;
					$id=$articledetails["articleid"];
					 $address=calculatearticleimage($id);


					while (!feof($myfile) && $currentRow <= $numRows) 
					{
	   					$currentRow++;
	   					$content.=fgets($myfile, 10);

					}
					$outputstring='';

					$outputstring.="<div class=\"divid\">
                <img src=\"{$address}\" alt=\"img01\" />                
                <h1>{$title}</h1>
                <p id=\"gist\">{$content}..</p>
                <p><a id=\"username\" href=\"profile.php?view={$creatorid}\">@{$username}</a></p>
                <p id=\"timestamp\">posted on {$postedon}</p>
                <p><a id=\"butt\" href=\"articles.php?article={$id}\">Read &raquo;</a></p>
                
            </div>";

					//$outputstring.="<div class=\"divid\"><h1><a href=\"articles.php?article={$id}\">{$title}</a></h1><p>{$content}...</p><p class=\"timestamp\"><i><a href=\"profile.php?view={$creatorid}\">@{$username}</a></i></p><p class=\"timestamp\"><i>posted on {$postedon}</i></p></div>";
					echo $outputstring;
				}

			?>






		<?php include "basiclayout.php";?>
		