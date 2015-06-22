<?php

$dbc=mysqli_connect('mysql13.000webhost.com','a3831866_root','password69','a3831866_test')
      or die("error connecting to the database");
$query="update hiredeal set status=\"accept\" where dealid={$_GET['dealid']}";
    $result=mysqli_query($dbc,$query);

header("location:portal.php");

?>