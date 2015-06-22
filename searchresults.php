<?php
session_start();
?>
<!DOCTYPE html>

<html>
<head>
	<link rel="shortcut icon" href="../favicon.ico">
        <link rel="stylesheet" type="text/css" href="css/default.css" />
        <link rel="stylesheet" media="all" href="css/feed.css" />
        <link rel="stylesheet" type="text/css" href="css/search-bar.css" />
        <link rel="stylesheet" type="text/css" href="css/bootstap.css" />
        <link rel="stylesheet" type="text/css" href="css/core.css" />
        <link rel="stylesheet" type="text/css" href="css/profile-image.css" />
        <link rel="stylesheet" media="all" href="css/slider.css" />
        <link rel="stylesheet" type="text/css" href="css/menu.css" />
		
        <script src="js/modernizr.custom.js"></script>
		<link rel="stylesheet" media="all" href="css/feed.css" />
</head>
<body style="background-color:#eee;">
	<div class="container">
            
            
           
<?php

$searchstring=$_GET['search'];
$dbc=mysqli_connect('mysql13.000webhost.com','a3831866_root','password69','a3831866_test')
      or die("error connecting to the database");
$type=$_GET['type'];
$query='';
				$query1='';
				$query2='';
$arr=explode(' ',$searchstring);
if($type=="people")
{
				for($i=0;$i<sizeof($arr);$i++)
				{	
					$query2 .= "(SELECT creatorid,username,about FROM creator WHERE username LIKE '%{$arr[$i]}%')";
					if($i!=sizeof($arr)-1)
						{
							$query1.=" union all";
							$query2.=" union all";
							$query.=" union all";
						}
				}
				$query2="select creatorid,username,about,COUNT(*) as count from ({$query2})as temp group by creatorid order by count desc limit 0,10";
				$query2=mysqli_query($dbc,$query2);
				$nr = mysqli_num_rows($query2);	
}
else
{
				for($i=0;$i<sizeof($arr);$i++)
				{	
					$query.="(SELECT a.articleid as articleid, a.title as title,a.timestamp as timestamp,a.creatorid as id from tagarticlemapping m inner join article a on (m.articleid=a.articleid) inner join tags t on (m.tagid=t.tagid)WHERE t.tagname LIKE '%{$arr[$i]}%' or a.title LIKE '%{$arr[$i]}%')";		
					
					$query1 .= "(SELECT a.articleid as articleid, a.title as title,a.timestamp as timestamp,a.creatorid as id FROM article a WHERE a.title LIKE '%{$arr[$i]}%')";
					if($i!=sizeof($arr)-1)
						{
							$query1.=" union all";
							$query2.=" union all";
							$query.=" union all";
						}
				}
				$query="{$query} union all {$query1}";
				$query3="select articleid,title,timestamp,id, COUNT(*) as count from ({$query})as temp group by articleid order by count desc limit 0,10";
				$outputstring='';
				$query3=mysqli_query($dbc,$query3);
				$nr = mysqli_num_rows($query3);	
}













/*

				while($row = mysqli_fetch_array($query2))
			{

							$viewid=$row["creatorid"];
					$name=$row["username"];
					$description=$row["about"];
				//		echo $viewid;
					
					$outputstring.="<div  class=\"divid\"><span style='font-size:30px;color:rgba(51,204,102,1.0)'><a href='profile.php?view={$viewid}'>{$name}</a></span><span>people</span></div>";
				
			}

*/












	$pn=(int)preg_replace("/[^A-Za-z0-9]/", " ", $_GET['page']);
	

				
	
		$itemsPerPage = 5; 	
		$lastPage = ceil($nr / $itemsPerPage);

		if ($pn < 1) 
		{ // If it is less than 1
  		  $pn = 1; // force if to be 1
		} 
		else if ($pn > $lastPage)
		{ // if it is greater than $lastpage
  	 	 $pn = $lastPage; // force it to be $lastpage's value
		} 


		$centerPages = "";
		$sub1 = $pn - 1;
		$sub2 = $pn - 2;
		$add1 = $pn + 1;
		$add2 = $pn + 2;

		if ($pn == 1) {
    $centerPages .= '&nbsp; <span class="pagNumActive">' . $pn . '</span> &nbsp;';
    $centerPages .= '&nbsp; <a href="' . $_SERVER['PHP_SELF'] . '?page=' . $add1 . '&&search='.$searchstring.'&&type='.$type.'">' . $add1 . '</a> &nbsp;';
} else if ($pn == $lastPage) {
    $centerPages .= '&nbsp; <a href="' . $_SERVER['PHP_SELF'] . '?page=' . $sub1. '&&search='.$searchstring.'&&type='.$type.'">' .  $sub1 . '</a> &nbsp;';
    $centerPages .= '&nbsp; <span class="pagNumActive">' . $pn . '</span> &nbsp;';
} else if ($pn > 2 && $pn < ($lastPage - 1)) {
    $centerPages .= '&nbsp; <a href="' . $_SERVER['PHP_SELF'] . '?page=' . $sub2 . '&&search='.$searchstring.'&&type='.$type.'">' .  $sub2 . '</a> &nbsp;';
    $centerPages .= '&nbsp; <a href="' . $_SERVER['PHP_SELF'] . '?page=' . $sub1 . '&&search='.$searchstring.'&&type='.$type.'">' .  $sub1 . '</a> &nbsp;';
    $centerPages .= '&nbsp; <span class="pagNumActive">' . $pn . '</span> &nbsp;';
    $centerPages .= '&nbsp; <a href="' . $_SERVER['PHP_SELF'] . '?page=' . $add1 . '&&search='.$searchstring.'&&type='.$type.'">' .  $add1 . '</a> &nbsp;';
    $centerPages .= '&nbsp; <a href="' . $_SERVER['PHP_SELF'] . '?page=' . $add2 . '&&search='.$searchstring.'&&type='.$type.'">' .   $add2 . '</a> &nbsp;';
} else if ($pn > 1 && $pn < $lastPage) {
    $centerPages .= '&nbsp; <a href="' . $_SERVER['PHP_SELF'] . '?page=' . $sub1 . '&&search='.$searchstring.'&&type='.$type.'">' .  $sub1 . '</a> &nbsp;';
    $centerPages .= '&nbsp; <span class="pagNumActive">' . $pn . '</span> &nbsp;';
    $centerPages .= '&nbsp; <a href="' . $_SERVER['PHP_SELF'] . '?page=' . $add1 . '&&search='.$searchstring.'&&type='.$type.'">' .  $add1 . '</a> &nbsp;';
}

		//newcodeend********	
	

	

		// Check If We Have Results
		if ($nr!=0)
		{		//////// Originally result_name



			$paginationDisplay = ""; // Initialize the pagination output variable

			// This code runs only if the last page variable is ot equal to 1, if it is only 1 page we require no paginated links to display

			if ($lastPage != "1")
			{

    				// This shows the user what page they are on, and the total number of pages

    				$paginationDisplay .= 'Page <strong>' . $pn . '</strong> of ' . $lastPage. '&nbsp;  &nbsp;  &nbsp; ';

    				// If we are not on page 1 we can place the Back button

    				if ($pn != 1) 
				{
       				$previous = $pn - 1;
        				$paginationDisplay .=  '&nbsp;  <a href="' . $_SERVER['PHP_SELF'] . '?page=' . $previous . '&&search='.$searchstring.'&&type='.$type.'"> Back</a> ';
    				} 

    				// Lay in the clickable numbers display here between the Back and Next links

   				$paginationDisplay .= '<span class="paginationNumbers">' . $centerPages . '</span>';
   				 // If we are not on the very last page we can place the Next button
    				if ($pn != $lastPage) 
				{
        				$nextPage = $pn + 1;
        				$paginationDisplay .=  '&nbsp;  <a href="' . $_SERVER['PHP_SELF'] . '?page=' . $nextPage . '&&search='.$searchstring.'&&type='.$type.'">Next</a> ';
   				} 
			}
			else
			{
				$paginationDisplay .= 'Page <strong>1</strong> of 1';


			}			
			$outputstring="";
			$outputstring.='<div style="margin-left:58px; margin-right:58px; padding:6px; background-color:#FFF; border:#999 1px solid;">'.$paginationDisplay.'</div>';

			
			$posts =  '&nbsp; <a href="' . $_SERVER['PHP_SELF'] . '?page=1&&search='.$searchstring.'&&type=posts>Articles</a> &nbsp;';
			$people = '&nbsp; <a href="' . $_SERVER['PHP_SELF'] . '?page=1&&search='.$searchstring.'&&type=people>People</a> &nbsp;';
	

 $posts = '&nbsp; <a href="' . $_SERVER['PHP_SELF'] . '?page=1&&search='.$searchstring.'&&type=posts">Articles</a> &nbsp;';
	$people = '&nbsp; <a href="' . $_SERVER['PHP_SELF'] . '?page=1&&search='.$searchstring.'&&type=people">People</a> &nbsp;';

	echo '<div style="margin-left:58px; margin-right:58px; padding:6px; background-color:#FFF; border:#999 1px solid;">'.$posts.' </span><span>'.$people.'</div>';
	


			echo $outputstring;































































if($type=="posts")
{
				
				$arr=explode(' ',$searchstring);
				$query='';
				$query1='';
				$query2='';
				for($i=0;$i<sizeof($arr);$i++)
				{	
					$query.="(SELECT a.articleid as articleid, a.title as title,a.timestamp as timestamp,a.creatorid as id from tagarticlemapping m inner join article a on (m.articleid=a.articleid) inner join tags t on (m.tagid=t.tagid)WHERE t.tagname LIKE '%{$arr[$i]}%')";		
					
					$query1 .= "(SELECT a.articleid as articleid, a.title as title,a.timestamp as timestamp,a.creatorid as id FROM article a WHERE title LIKE '%{$arr[$i]}%')";
					if($i!=sizeof($arr)-1)
						{
							$query1.=" union all";
							$query.=" union all";
						}
				}
				$limit = 'LIMIT ' .($pn - 1) * $itemsPerPage .','.$itemsPerPage; 
				$query="{$query} union all {$query1}";
				$query3="select articleid,title,timestamp,id, COUNT(*) as count from ({$query})as temp group by articleid order by count desc $limit" ;
				$outputstring='';
			$query3=mysqli_query($dbc,$query3) or die("hello");


			while($row = mysqli_fetch_array($query3))
			{ 

					$viewid=$row["articleid"];
					$title=$row["title"];
					$postedon=$row["timestamp"];
					$id=$row["id"];
				$outputstring='';
				$myfile=fopen("{$viewid}.txt","r");
				$content="";
				$currentRow=0;
				$numRows=20;
				while (!feof($myfile) && $currentRow <= $numRows) 
				{
   					$currentRow++;
   					$content.=fgets($myfile, 10);

				}
				$q="select * from creator where creatorid={$id}";
				$r=mysqli_fetch_array(mysqli_query($dbc,$q));
				$username=$r['username'];	
					$outputstring.="<div class=\"divid\" >
                <img src=\"Articleimage/".$viewid.".jpg\" alt=\"Image not found\" onError=\"this.src='images/header.jpg';\"/>                
                <h1>{$title}</h1>
                <p id=\"gist\">{$content}..</p>
                <p><a id=\"username\" href=\"profile.php?view={$viewid}\">@{$username}</a></p>
                <p id=\"timestamp\">posted on {$postedon}</p>
                <p><a id=\"butt\" href=\"articles.php?article={$viewid}\">Read &raquo;</a></p>
                
            </div>";	

            echo $outputstring;
				
			}
}
else
{










				$arr=explode(' ',$searchstring);
				$query2='';
				$query3='';
				$query4='';
				for($i=0;$i<sizeof($arr);$i++)
				{	
					$query2 .= "(SELECT creatorid,about,username,fname,lname FROM creator WHERE username LIKE '%{$arr[$i]}%' or  fname LIKE '%{$arr[$i]}%' or  lname LIKE '%{$arr[$i]}%')";

			//		$query3 .= "(SELECT creatorid,about,username,fname,lname FROM creator WHERE fname LIKE '%{$arr[$i]}%')";

			//		$query4 .= "(SELECT creatorid,about,username,fname,lname FROM creator WHERE lname LIKE '%{$arr[$i]}%')";
					
					if($i!=sizeof($arr)-1)
						{
							$query2.=" union all";
				//			$query3.=" union all";
				//			$query4.=" union all";
						}
				}
				
			//	$query2="{$query2} union all {$query3} union all {query4}";
				$limit = 'LIMIT ' .($pn - 1) * $itemsPerPage .','.$itemsPerPage; 
			//	$query3="select creatorid,about,username,fname,lname,COUNT(*) as count from ({$query2})as temp group by creatorid order by count desc $limit" ;
				$outputstring='';
			//	$query3=mysqli_query($dbc,$query3) or die("hello");

				$query2="select creatorid,about,username,fname,lname,COUNT(*) as count from ({$query2})as temp group by creatorid order by count desc $limit";
				$query2=mysqli_query($dbc,$query2);


			while($row = mysqli_fetch_array($query2))
			{ 

					$creatorid=$row["creatorid"];
					$about=$row["about"];
					$username=$row["username"];
					$fname=$row["fname"];
					$lname=$row["lname"];
					$outputstring="<div class=\"divid\" >
	                <img src=\"Creatorimage/".$creatorid.".jpg\" alt=\"Image not found\" onError=\"this.src='images/header.jpg';\"/>                
                <h1>{$fname} {$lname}</h1>
	                <p id=\"gist\">{$about}..</p>
	                <p><a id=\"username\" href=\"profile.php?view={$creatorid}\">@{$username}</a></p>	                
	            	</div>";	

           			 echo $outputstring;
				
			}
}




































}
else
{    $posts = '&nbsp; <a href="' . $_SERVER['PHP_SELF'] . '?page=1&&search='.$searchstring.'&&type=posts">Articles</a> &nbsp;';
	$people = '&nbsp; <a href="' . $_SERVER['PHP_SELF'] . '?page=1&&search='.$searchstring.'&&type=people">People</a> &nbsp;';
	if($type=='people')
		$answer='People';
		else $answer='Articles';
	echo '<div style="margin-left:58px; margin-right:58px; padding:6px; background-color:#FFF; border:#999 1px solid;">'.$posts.' </span><span>'.$people.'</div>';
	echo "<div class='divid' style='border-left:0px'><h1 >Sorry, no results to display for $answer</h1><div>";
}

?>

<?php include "basiclayout.php" ?>