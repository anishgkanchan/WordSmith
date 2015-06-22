<?php

$dbc=mysqli_connect('mysql13.000webhost.com','a3831866_root','password69','a3831866_test')
      or die("error connecting to the database");
	$tutorial_db=get_my_db();

	// Get Search
	$search_string = preg_replace("/[^A-Za-z0-9]/", " ", $_POST['query']);
	$search_string = $tutorial_db->real_escape_string($search_string);
	
	$paging = $_POST['pagination'];
    if($paging=="true")
	{	
		$pn=(int)preg_replace("/[^A-Za-z0-9]/", " ", $_POST['page']);
	}
	else
	{
		$pn=1;
	}
		
	// Check Length More Than One Character
	if ((strlen($search_string) >= 1 && $search_string !== ' ')||$pn!=1) 
	{
		// Build Query
		$query = "SELECT * FROM tags WHERE tagname LIKE '%{$search_string}%'";

		// Do Search
		$result = mysqli_query($dbc,$query)or die('no query');


		//$pn=1;

		//newcodestart********

		$nr = mysqli_num_rows($result);
	
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

		if ($pn == 1) 
		{
    			$centerPages .= '&nbsp; <span class="pagNumActive">' . $pn . '</span> &nbsp;';
    			$centerPages .= '&nbsp; <span class="link" id="'.$add1.'">' . $add1 . '</span> &nbsp;';
		} else if ($pn == $lastPage) 
		{
    			$centerPages .= '&nbsp; <span class="link" id="'.$sub1.'">' . $sub1 . '</span> &nbsp;';
    			$centerPages .= '&nbsp; <span class="pagNumActive">' . $pn . '</span> &nbsp;';
		} else if ($pn > 2 && $pn < ($lastPage - 1)) 
		{
    			$centerPages .= '&nbsp; <span class="link" id="'.$sub2.'">' . $sub2 . '</span> &nbsp;';
    			$centerPages .= '&nbsp; <span class="link" id="'.$sub1.'">' . $sub1 . '</span> &nbsp;';
    			$centerPages .= '&nbsp; <span class="pagNumActive">' . $pn . '</span> &nbsp;';
    			$centerPages .= '&nbsp; <span class="link" id="'.$add1.'">' . $add1 . '</span> &nbsp;';
    			$centerPages .= '&nbsp; <span class="link" id="'.$add2.'">' . $add2 . '</span> &nbsp;';
		} else if ($pn > 1 && $pn < $lastPage) 
		{
    			$centerPages .= '&nbsp; <span class="link" id="'.$sub1.'">' . $sub1 . '</span> &nbsp;';
    			$centerPages .= '&nbsp; <span class="pagNumActive">' . $pn . '</span> &nbsp;';
    			$centerPages .= '&nbsp; <span class="link" id="'.$add1.'">' . $add1 . '</span> &nbsp;';
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

        				$paginationDisplay .=  '&nbsp; <span class="link" id="'.$previous.'">  Previous</span> ';
        					} 

    				// Lay in the clickable numbers display here between the Back and Next links

   				$paginationDisplay .= '<span class="paginationNumbers">' . $centerPages . '</span>';
   				 // If we are not on the very last page we can place the Next button
    				if ($pn != $lastPage) 
				{
        			
        				$nextPage = $pn + 1;
        				$paginationDisplay .=  '&nbsp; <span class="link" id="'.$nextPage.'">  Next</span> ';
   				} 
			}
			else
			{
				$paginationDisplay .= 'Page <strong>1</strong> of 1';


			}			
			$outputstring="";
			$outputstring.='<div style="margin 0 auto; padding:6px; background-color:#FFF; border:#999 1px solid; width:100%">'.$paginationDisplay.'</div>';

			$limit = 'LIMIT ' .($pn - 1) * $itemsPerPage .','.$itemsPerPage; 

			$sql2 = mysqli_query($dbc,"SELECT * from tags WHERE tagname LIKE '%{$search_string}%' $limit"); 
			
			while($row = mysqli_fetch_array($sql2))
			{ 

    
        
			
				$tag=$row["tagname"];
				
				$outputstring.="<div ><p class='addtaglink'>$tag</p></div>";
			}

			echo ($outputstring);



		}
		else
		{
			echo ("<div><p>No result</p></div>");
		}
	}




function get_my_db()
{
    static $db;

    if (!$db) {
       $db=mysqli_connect('mysql13.000webhost.com','a3831866_root','password69','a3831866_test')
      or die("error connecting to the database");
    }

    return $db;
}

?>