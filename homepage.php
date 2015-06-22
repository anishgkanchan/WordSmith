<?php
session_start();
$dbc=mysqli_connect('localhost','root','','test')
      or die("error connecting to the database");
    //$query="select * from category where categoryid='{$_GET['cat']}'";
    //$result=mysqli_query($dbc,$query);
    //$row=mysqli_fetch_array($result);
    //$catname=$row['categoryname'];
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
		<title>wordsmith | home</title>
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link rel="shortcut icon" href="../favicon.ico">
		<link rel="stylesheet" type="text/css" href="css/default.css" />
		<link rel="stylesheet" type="text/css" href="css/categories.css" />
		<link rel="stylesheet" type="text/css" href="css/search-bar.css" />
		<link rel="stylesheet" type="text/css" href="css/bootstap.css" />
		<link rel="stylesheet" type="text/css" href="css/core.css" />
		<link rel="stylesheet" media="all" href="css/feed.css" />
		<link rel="stylesheet" type="text/css" href="css/menu.css" />
		<link rel="stylesheet" media="all" href="css/slider.css" />
		<script src="js/modernizr.custom.js"></script>
	</head>
	<body style="background-color:#eee;">
		<div class="container">
			
            
          	<!--<p align="center"><img src="images/<?php echo $catname ?>.jpg"><br> <span align="center" style="padding-top:0;text-align:center; font-size:50px; color:#333"><?php echo $catname; ?></span></p>
			-->
			<div class="title">
                <img src="images/news2.png" align="center"><br>
                <p style="margin-bottom:-50px;"> Feed </P>
            </div>
            


<?php
		$cid=$_SESSION['login_user'];
		$dbc=mysqli_connect('localhost','root','','test')
      or die("error connecting to the database");
		$query1 = "SELECT * FROM creatorcategory WHERE creatorid='{$cid}'";
		$result = mysqli_query($dbc,$query1)or die('no query1');
		
				$outputstring='';
		while($row = mysqli_fetch_array($result))
		{ 
			$catid=$row['categoryid'];
			//echo $catid;

			//$query2 = 'SELECT * FROM category WHERE categoryid="'.$catid.'"';
    		//$result1 = mysqli_query($dbc,$query2)or die('no query2');
        	//$categoryname=mysqli_fetch_array($result1);
        	//$categoryname=$categoryname['categoryname'];
        	$query3 = "SELECT * FROM articlecategory where categoryid={$catid}";        	;
    		$result2 = mysqli_query($dbc,$query3)or die('no query3');
        	while($row1 = mysqli_fetch_array($result2))
			{
				$id=$row1['articleid'];
				$sql2 = mysqli_query($dbc,'SELECT * from article WHERE articleid="'.$id.'"'); 
				$articledetails=mysqli_fetch_array($sql2);
				$postedon=$articledetails['timestamp'];
				$creatorid=$articledetails["creatorid"];
				$q="select * from creator where creatorid={$creatorid}";
				$r=mysqli_fetch_array(mysqli_query($dbc,$q));
				$username=$r['username'];	
				$title=$articledetails["title"];
				$myfile=fopen("{$articledetails["articleid"]}.txt","r");
				$content="";
				$currentRow=0;
				$numRows=20;
				$id=$articledetails["articleid"];
				$url=calculatearticleimage($id);
				while (!feof($myfile) && $currentRow <= $numRows) 
				{
   					$currentRow++;
   					$content.=fgets($myfile, 10);

				}
				
					$outputstring.="<div class=\"divid\">
                <img src=\"{$url}\" alt=\"img01\" />                
                <h1>{$title}</h1>
                <p id=\"gist\">{$content}..</p>
                <p><a id=\"username\" href=\"profile.php?view={$creatorid}\">@{$username}</a></p>
                <p id=\"timestamp\">posted on {$postedon}</p>
                <p><a id=\"butt\" href=\"articles.php?article={$id}\">Read &raquo;</a></p>
                
            </div>";	echo $outputstring;
			}


   	 			
		}

?>

<?php include "basiclayout.php";?>
</div>
		</body>
		</html>