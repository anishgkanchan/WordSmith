<?php 










$id=$_POST['id'];

$title=$_POST['title'];
$dbc=mysqli_connect('mysql13.000webhost.com','a3831866_root','password69','a3831866_test')
      or die("error connecting to the database");
      $query="insert into article(title,creatorid)values('{$title}','{$id}')";

$result=mysqli_query($dbc,$query);
$articleid=mysqli_insert_id($dbc);



define ('SITE_ROOT', realpath('C:\xampp\htdocs\final'));

$allowedExts = array("gif", "jpeg", "jpg", "png");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);

if(($_FILES["file"]["type"] == "image/jpg")
 && in_array($extension, $allowedExts))
  {
				  if ($_FILES["file"]["error"] > 0)
				    {
				    echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
				    }
				  else
				    {
										    echo "Upload: " . $_FILES["file"]["name"] . "<br>";
										    echo "Type: " . $_FILES["file"]["type"] . "<br>";
										    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
										    echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";

// 

									    if (file_exists(SITE_ROOT."Articleimage/" . $_FILES["file"]["name"]))
									      {
									      	echo $_FILES["file"]["name"] . " already exists. ";
									      }
									    else
									      {
										      move_uploaded_file($_FILES["file"]["tmp_name"],SITE_ROOT.'/Articleimage/'. $articleid.'.jpg');
										      echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
									      }
				    }
  }
 else
   {
   echo "Invalid file in save";
   }






















$my_file = "{$articleid}.txt";
$handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file);
$data = $_POST['thread'];
fwrite($handle, $data);
fclose($handle);
foreach ($_POST['taglist'] as $tagname)
{  
	$tagquery='select * from tags where tagname="'.$tagname.'"';
	$result=mysqli_query( $dbc,$tagquery);
	
	if(mysqli_num_rows($result)==0)//check if tag already exists
	{
		$query="insert into tags(tagname)values('{$tagname}')";
		$result=mysqli_query($dbc,$query);
		$query="select * from tags";
		$result=mysqli_query($dbc,$query);

		$tagid = mysqli_num_rows($result);
		$query="insert into tagarticlemapping(tagid,articleid)values('{$tagid}','{$articleid}')";
		$result=mysqli_query($dbc,$query);
	}
	else
	{
		$tagquery='select * from tags where tagname="'.$tagname.'"';
		$result=mysqli_query( $dbc,$tagquery);
	
		$row = mysqli_fetch_array($result);
	
		$tagid=$row["tagid"];
		$query="insert into tagarticlemapping(tagid,articleid)values('{$tagid}','{$articleid}')";
	
		$result=mysqli_query($dbc,$query);
		
	}
}



foreach ($_POST['category'] as $selectedOption)
    {
    	$query="insert into articlecategory(articleid,categoryid)values('{$articleid}','{$selectedOption}+1')";
    	$result=mysqli_query($dbc,$query);
    }

header("location:homepage.php");
/*
$dbc=mysqli_connect('localhost','root','','test')or die('df');
$query="insert into test.articles(ArticleName,CreatorId)values('{$title}','{$id}')";
$result=mysqli_query($dbc,$query);
*/


?>



