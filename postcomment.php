<?php

$dbc=mysqli_connect('mysql13.000webhost.com','a3831866_root','password69','a3831866_test')
      or die("error connecting to the database");
$comment = $_POST['comment'];
$articleid=$_POST['articleid'];
$query='INSERT INTO comments (content, articleid) VALUES("'.$comment.'","'.$articleid.'")';

$result = mysqli_query($dbc,$query) or die('no query');
echo $result;

?>