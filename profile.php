<?php 
session_start();
$view=$_GET['view'];
$current=$_SESSION['login_user'];
$dbc=mysqli_connect('mysql13.000webhost.com','a3831866_root','password69','a3831866_test')
      or die("error connecting to the database");
    $query="select * from article where creatorid={$view}";
    $result=mysqli_query($dbc,$query);
    //$row=mysqli_fetch_array($result);
    $noofarticles=mysqli_num_rows($result);
    $query="select * from follower where creator2={$view}";
    $result=mysqli_query($dbc,$query);
    //$row=mysqli_fetch_array($result);
    $nooffollowers=mysqli_num_rows($result);
    $query="select * from follower where creator1={$view}";
    $result=mysqli_query($dbc,$query);
    //$row=mysqli_fetch_array($result);
    $nooffollowings=mysqli_num_rows($result);
    $query="select * from creator where creatorid={$view}";
    $result=mysqli_query($dbc,$query);
    $row=mysqli_fetch_array($result);
    $name="{$row['fname']} {$row['lname']}";
    $username=$row['username'];
    $about=$row['about'];


    function latest()
    {
       $dbc=mysqli_connect('mysql13.000webhost.com','a3831866_root','password69','a3831866_test')
      or die("error connecting to the database");
      $query="select * from creator where creatorid={$_GET['view']}";
    $result=mysqli_query($dbc,$query);
    $row=mysqli_fetch_array($result);
    $username=$row['username'];
        $query="select * from article where creatorid={$_GET['view']}";
        $result=mysqli_query($dbc,$query);
        $outputstring='';
        
        while($row = mysqli_fetch_array($result)) 
                {
                    
                    $id=$row['articleid'];
                    
                    $title=$row["title"];
                    $myfile=fopen("{$row["articleid"]}.txt","r");
                    $content="";
                    $currentRow=0;
                    $numRows=20;
                    $postedon=$row['timestamp'];
                    $address=calculatearticleimage($id);

                    while (!feof($myfile) && $currentRow <= $numRows) 
                    {
                        $currentRow++;
                        $content.=fgets($myfile, 10);

                    }
                    
                    
                    $outputstring.="<div class=\"divid\">
                <img src=\"{$address}\" alt=\"img01\" />                
                <h1>{$title}</h1>
                <p id=\"gist\">{$content}..</p>
                <p><a id=\"username\" href=\"profile.php?view={$_GET['view']}\">@{$username}</a></p>
                <p id=\"timestamp\">posted on {$postedon}</p>
                <p><a id=\"butt\" href=\"articles.php?article={$id}\">Read &raquo;</a></p>
                
            </div>";
                    
                }

                echo $outputstring;
        //$row=mysqli_fetch_array($result);
        //$outputstring="<div class=\"divid\"><h1>{$row['title']}</h1><p>{$row['title']}</p><p class="timestamp"><i>@anishgkanchan</i></p><p class="timestamp"><i>posted on Nov' 26</i></p></div>"
    }
    
    function calculateimage()
    {
        //$imagearray=getimagesize("upload_pic/thumbnail_{$_SESSION['login_user']}.jpg");
        if(file_exists("Creatorimage/{$_GET['view']}.jpg"))
        {
         echo "Creatorimage/{$_GET['view']}.jpg";
        }
        else
            echo "Creatorimage/default.jpg";
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

?>
<!DOCTYPE html>
<html lang="en" class="no-js">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <title>wordsmith | sliding menu demo</title>
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        <link rel="shortcut icon" href="../favicon.ico">
         <link rel="stylesheet" type="text/css" href="css/bootstap.css" />
        <link rel="stylesheet" type="text/css" href="css/core.css" />
        <link rel="stylesheet" type="text/css" href="css/profile-image.css" />
        <link rel="stylesheet" type="text/css" href="css/default.css" />
        <link rel="stylesheet" type="text/css" href="css/feed.css" />
        <link rel="stylesheet" type="text/css" href="css/search-bar.css" />
        <link rel="stylesheet" media="all" href="css/slider.css" />
        <link rel="stylesheet" type="text/css" href="css/profile-links.css" />
        <link rel="stylesheet" type="text/css" href="css/menu.css" />
        
        <script src="js/modernizr.custom.js"></script>
        <script type="text/javascript" src="jquery.min.js"></script>
        <script>
function follow() {
        var user= $('#hiddenuser').val();
        var view=$('#hiddenview').val();
        //alert("hello");
        if(user==view)
            alert("you cannot follow yourself:P");
        
            $.ajax({
                type: "POST",
                url: "calculatefollow.php",
                data: { user:user ,view:view },
                cache: false,
                
                success: function(html){
                    alert(html);
                    if($(html).val==false)
                    alert("you are already following the user");
                    else
                    alert("added as a follower");
                }
            });
            
        return false;    
    }
</script>
    </head>
<body style="background-color:#eee;">
        <div class="container">
            
               <input type="hidden" value="<?php echo $_SESSION['login_user']?>" id="hiddenuser"/>
                <input type="hidden" value="<?php echo $_GET['view']?>" id="hiddenview"/>
            <section>

                <ul class="ch-grid">
                    <li>
                        <div class="ch-item ch-img"  style="top:-40px;background-image:url(<?php echo calculateimage();?>);background-size:contain">
                            <div class="ch-info">
                                <h3><?php echo $name; ?></h3>
                                <p style="margin: -25px 20px;font-size: 13px; border-top: 2px solid rgba(255,255,255,0.8);"><?php echo $about; ?><a href="profile.php?view=<?php echo $_GET['view']?>">@<?php echo $username; ?></a></p>
                            </div>
                        </div>
                   </li>
               </ul>
               
           <p align="center" style="margin-top:-180px;">
            <section class="color-5" id="linksa"> 
                <br>
            <p style="padding-top:30px;">
                <span style="padding-left:1em; font-size:1.9em;color:#eee">
                    <?php echo $nooffollowers ?> <a href="followers.php?of=<?php echo $_GET['view']?>" style="color:#3c6;">followers</a>
                </span>
                       <span style="position:absolute; right:4em; font-size:1.9em;color:#eee">
                    <?php echo $noofarticles ?> <a  style="color:#3c6;">articles</a>
                </span>
                <br>
             
                <span style="padding-left:1em; font-size:1.9em;color:#eee">
                    <?php echo $nooffollowings ?> <a href="following.php?of=<?php echo $_GET['view']?>" style="color:#3c6;"> following </a>
                </span>
                    
                     <hr>
</p>
                    <nav class="cl-effect-12" id="links">
                    <a id="follow" onclick="follow()" >Follow</a>
                    <a href="propose.php?hire=<?php echo $_GET['view'] ?>">Hire</a>
                    <a href="Createmessage.php?to=<?php echo $_GET['view'] ?>">Contact</a>
                   
                </nav>
            
            </section>   </p>
            </section>
            <div>
                <div style="font-size:45px; padding-left:10px; color:rgba(20,20,20,1);background-color:rgba(51,204,102,0.7);margin-bottom:10px">
                <span >Latest</span>
                
                </div>
                   <?php latest(); ?> 
            </div>
           

            <?php include "basiclayout.php"; ?>
       