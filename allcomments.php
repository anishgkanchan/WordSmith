<?php

$dbc=mysqli_connect('mysql13.000webhost.com','a3831866_root','password69','a3831866_test')
      or die("error connecting to the database");
$query = 'SELECT * FROM comments WHERE articleid="'.$_POST['articleid'].'"';

		// Do Search
		$result = mysqli_query($dbc,$query)or die('no query');
$message='';
while($row = mysqli_fetch_array($result)){    
        
   	 	$message.='<div class="molly"><h3>'.$row["content"].'</h3></div>';
		
}
echo $message;

?>