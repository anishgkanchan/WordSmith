

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
        <link rel="stylesheet" type="text/css" href="css/default.css" />
        <link rel="stylesheet" media="all" href="css/feed.css" />
        <link rel="stylesheet" type="text/css" href="css/search-bar.css" />
        <link rel="stylesheet" type="text/css" href="css/bootstap.css" />
        <link rel="stylesheet" type="text/css" href="css/core.css" />
        <link rel="stylesheet" type="text/css" href="css/menu.css" />
        
        <link rel="stylesheet" type="text/css" href="css/profile-image.css" />
        <link rel="stylesheet" media="all" href="css/slider.css" />
        <script src="js/modernizr.custom.js"></script>
    </head>
<body style="background-color:#eee;">
        <div class="container">
            
           
            <div class="title">
                <img src="images/pending.png" align="center"><br>
                <p>Pending</P>
            </div>
            <div>
            <div class="title2">
                <p style="margin-bottom:0px; margin-top:-100px;"><img src="images/people.png">New Hire Requests By</p>
            </div>
            <ul class="ch-grid">
                   
               <?php echo $hire ;?>    
                    
        </div>
        <div >
            <div class="title2">
                <p><img src="images/articles.png">New Buy Requests For</p>
            </div>
                <?php echo $buy ?>
        </div>

</div>
</body>
</html>

        <?php 
session_start();

$current=$_SESSION['login_user'];
$dbc=mysqli_connect('mysql13.000webhost.com','a3831866_root','password69','a3831866_test')
      or die("error connecting to the database");
    $query="select * from hiredeal where creator1='{$_SESSION['login_user']}' and status=''";
    $result=mysqli_query($dbc,$query);
    $hire='';
    while($row=mysqli_fetch_array($result))
    {
        $dealid=$row['dealid'];
        $creatorid=$row['creator2'];
        $query1="select * from creator where creatorid={$creatorid}";
    $result1=mysqli_query($dbc,$query1);
    $row1=mysqli_fetch_array($result1);
        $name="{$row1['fname']} {$row1['lname']}";
    $username=$row1['username'];
    $about=$row1['about'];
        $duration=$row['duration'];
        $amount=$row['amount'];
        $url=calculateimage1($creatorid);
        $hire.="
                <li>
                        <div class=\"ch-item ch-img\" style=\"background-image:url({$url})\">
                            <div class=\"ch-info\">
                                <h3>{$name}</h3>
                                <p style=\"margin: -25px 20px;font-size: 13px; border-top: 2px solid rgba(255,255,255,0.8);\">{$about}
                                    <a id=\"usernane\" href=\"profile.php?view={$creatorid}\">@{$username}</a></p>
                            </div>
                        </div>
                        </li> 
                        <p>duration:{$duration} months</p><p>amount:{$amount}</p>
                           
                
                ";
    }
    $query="select * from copyrightdeal where creator1='{$_SESSION['login_user']}' and status=''";
    $result=mysqli_query($dbc,$query);
    $buy='';
    while($row=mysqli_fetch_array($result))
    {
        $articleid=$row['articleid'];
        $dealid=$row['dealid'];
        $amount=$row['amount'];
        $creatorid=$row['creator1'];
        $query1="select * from creator where creatorid={$creatorid}";
        $result1=mysqli_query($dbc,$query1);
        $row1=mysqli_fetch_array($result1);
        $username=$row1['username'];
        $query2="select * from article where articleid={$articleid}";
        $result2=mysqli_query($dbc,$query2);
        $row2=mysqli_fetch_array($result2);
        $title=$row2['title'];
        $postedon=$row2['timestamp'];


        $buy.="<div class=\"divid\" style=\"margin-top:-50px\">
                <img src=\"images/default.jpg\" alt=\"img01\" />                
                <h1>{$title}</h1>
                <p>Request sent to <a id=\"username\" href=\"profile.php?view={$creatorid}\">@{$username}</a></p>
                <p id=\"timestamp\">posted on {$postedon}</p>
                <p id=\"timestamp\">amount: {$amount}</p>
                <p><a id=\"butt\" href=\"articles.php?article={$articleid}\">Read &raquo;</a></p>
                </div>";
    }


function accept($dealid)
{
    echo "accept";
    $query="update hiredeal set status=\"accept\" where dealid={$dealid}";
    $result=mysqli_query($dbc,$query);
}
function calculateimage1($id)
    {
        //$imagearray=getimagesize("upload_pic/thumbnail_{$_SESSION['login_user']}.jpg");
        if(file_exists("upload_pic/thumbnail_{$id}.jpg"))
        {
         return "upload_pic/thumbnail_{$id}.jpg";
        }
        else
            return "upload_pic/usericon.jpg";
    }

?>

            <?php include "basiclayout.php"; ?>
             
            
        