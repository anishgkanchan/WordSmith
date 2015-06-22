<?php
session_start();
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
         <link rel="stylesheet" type="text/css" href="css/default.css" />
        <link rel="stylesheet" type="text/css" href="css/bootstap.css" />
        <link rel="stylesheet" type="text/css" href="css/core.css" />
        <link rel="stylesheet" media="all" href="css/feed.css" />
         <link rel="stylesheet" type="text/css" href="css/profile-image.css" />
        <link rel="stylesheet" type="text/css" href="css/search-bar.css" />
        <link rel="stylesheet" media="all" href="css/slider.css" />
        <script src="js/modernizr.custom.js"></script>
	    <link rel="stylesheet" type="text/css" href="jquery-ui.css" />
		<link rel="stylesheet" type="text/css" href="jquery.multiselect.css" />
		<link rel="stylesheet" type="text/css" href="css/menu.css" />
		<script type="text/javascript" src="jquery 1.6.4.min.js"></script> 
		<script type="text/javascript" src="jquery-ui.min.js"></script> 
		<script type="text/javascript" src="jquery.multiselect.min.js"></script> 
		<style>
			#results,#results-text
			{
			display:none;
			}

			button,.submit
			{
				font-size:1em;
				background-color: #3c6;
				color:#fff;
				
				
			}
     	</style>   
 </head>

<body>
        <div class="container">
               
            <div class="title">
                <img src="images/write.png" align="center"><br>
                <p style="margin-bottom:0px;">Write</P>
            </div>

<div style="width:70%; margin:0 auto; background-colour:rgba(51,51,51,1)" >
<form method="post" action="article.php"  onsubmit="return check();" class="editorholder"  enctype="multipart/form-data" >
					<input type="text" class="textbox" id="articletitle" name="title" style="border: 1px solid #3c6;margin-bottom:20px;outline:0;height:40px; width:100%;margin:0 auto;padding:10px" placeholder="Title.."/>
					<br /><br />
					<div style="margin-left: auto;margin-right: auto;width: 100px%; margin-bottom:20px; color:#333;font-style:italic;font-size:1.1em; padding-right:5px;">
						Choose Header Image
					    <input type="file" name="file" id="file"/>
				 	 </div>
					<select id="mc" name="category[]" multiple="multiple" >
					<option value="1">Arts</option>
					<option value="2">Books</option>
					<option value="3">Business</option>
					<option value="4">Culture</option>
					<option value="5">Design</option>
					<option value="6">Education</option>
					<option value="7">Entertainment</option>
					<option value="8">Fashion</option>
					<option value="9">Fiction</option>
					<option value="10">Food</option>
					<option value="11">God</option>
					<option value="12">History</option>
					<option value="13">Humour</option>
					<option value="14">Life</option>
					<option value="15">Lifestyle</option>
					<option value="16">Movies</option>
					<option value="17">Music</option>
					<option value="18">News</option>
					<option value="19">People</option>
					<option value="20">Philosophy</option>
					<option value="21">Photography</option>
					<option value="22">Poetry</option>
					<option value="23">Politics</option>
					<option value="24">Relationships</option>
					<option value="25">Religion</option>
					<option value="26">Science</option>
					<option value="27">Sport</option>
					<option value="28">TV</option>
					<option value="29">Tech</option>
					<option value="30">Travel</option>
					</select>


					<br /> 
					<br />
					<div >
					<textarea  rows="20" cols="40" class="ckeditor" id="editor1" name="thread" style="width:100%;margin:0 auto;" >
					</textarea>
					</div>
					<br/>

					<div id="tags" style="width:100%;background-color:#dddddd;margin-top:10px;margin-bottom:10px;padding:20px" ></div>

					
					
					<div >
						<input type="text" id="searchtag" autocomplete="off" style="border: 1px solid #999;margin-bottom:20px;outline:0;height:40px;padding:10px;width:70%;margin-right:9%" placeholder="Type the tag and click on Set Tag"></input>
						<button id="addcat" type="button" style="width:20%;height:40px">Set tag</button>
					</div>
					
				<!--	<?php //echo $_SESSION['login_user']?>

				-->	
				<?php $id=$_SESSION['login_user'];?>
				<input type="hidden" name="id" value="<?php echo $id ?>"></input>

		<h4 id="results-text" style="width:100%;background-color:#dddddd;margin-top:10px;margin-bottom:10px;padding:20px">Existing tags: <b id="search-string"></b></h4>
		
		<div id="tagresults" style="width:100%;background-color:#dddddd;margin-top:10px;margin-bottom:10px;padding:20px"></div>
			<p style="width:100px;margin:0 auto;">
			<input type="submit" class="submit" name="submit" style="width:100px;height:40px;margin-bottom:20px" />
			</p>
		</form>


	</div>
      <script type="text/javascript">
      function check()
				{
					alert(NaN==NaN);
				//	return false;
				//alert("hello");
				var s="";
					if($("#articletitle").val()=="")
					{
						s="Title can not be left empty";
						alert(s);
						flag="false";
					}
					else if (!$(".acceptedtags")[0])
					{
						s="atleast one tag\n";
						alert(s);
						flag="false";
					}
					else if($("#editor1").val()=="")
					{
						s="Content can not be left empty";
						alert(s);
						flag="false";
					}
					else if($("#mc").val()==null)
					{
						s="atleast one category";
						alert(s);
						flag="false";
					}
					if(flag=="false")
					{
						alert(s);
						return false;
					}
					return true;
				}
			$(document).ready(function() {
				

				

			    $("#mc").multiselect();
//$(document).scrollTop($(document).height());
//$('html, body').animate({scrollTop:$(document).height()}, 'slow');


				function search() {
					var query_value = $('#searchtag').val();
					
					$('b#search-string').html(query_value);
					if(query_value !== ''){

						$.ajax({
							type: "POST",
							url: "search.php",
							data: { query: query_value,pagination:"false" },
							cache: false,
							success: function(a){
								$("#tagresults").html(a);

							}
						});
					}return false; 
				}
				
				$("input#searchtag").live("keyup", function(e) {
					
					// Set Timeout
					clearTimeout($.data(this, 'timer'));

					// Set Search String
					var search_string = $(this).val();
					// Do Search

					if (search_string == '') {
						
						$("div#tagresults").fadeOut();
						$('h4#results-text').fadeOut();
					}else{
						
						$("div#tagresults").fadeIn();
						$('h4#results-text').fadeIn();

						$(this).data('timer', setTimeout(search, 100));
					};
				});
				

				$(".link").live("click",function(event){
				
					var query_value = $('input#searchtag').val();
					
					$('b#search-string').html(query_value);
						$.ajax({
							type: "POST",
							url: "search.php",
							data: { page: $(this).attr("id"),pagination:"true",query:query_value},
							cache: false,
							success: function(html){

								$("div#tagresults").html(html);
							}
						});					
					
				});


				$(".addtaglink").live("click",function(event){
					
					var flag="true";

						var a=$('.acceptedtags').map(function(index) 
						{
						    return $(this).clone().children().remove().end().text(); 
						});


					//var a=["Saab","Volvo","BMW"];

					for(var i=0;i<a.length;i++){
    					if(a[i]==$(this).text())	
    					{
    						flag="false";
    						alert("Already added!");
    				//		break;
    					}
    				
					};
						if(flag!="false")
							$( "#tags" ).append( "<span class='acceptedtags'>"+$(this).text()+"<button class='removecat'>remove</button><input type='hidden' name='taglist[]' value='"+$(this).text()+"' /><br /></span>" );			
						
				});




				$(".removecat").live("click",function(event){
					$(this).parent().remove();
				});


				$("#addcat").live("click",function(event)
				{

					var s=$('input#searchtag').val();
					if(s!='')
					{	

							var flag="true";

							var a=$('.acceptedtags').map(function(index) 
							{
							    return $(this).clone().children().remove().end().text(); 
							});


							//var a=["Saab","Volvo","BMW"];

							for(var i=0;i<a.length;i++)
							{
		    					if(a[i]==s)	
		    					{
		    						flag="false";
		    						alert("Already added!");
		    						break;
		    					}
		    				
							}

						if(flag!="false")
							$( "#tags" ).append( "<span class='acceptedtags'>"+s+"<button class='removecat'>remove</button><input type='hidden' name='taglist[]' value='"+s+"' /><br /></span>" );			
				


						$("#searchtag").val("");

					}




					$("div#tagresults").fadeOut();
						$('h4#results-text').fadeOut();

				});


			});

		</script>

<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="ckeditor/samples/sample.js"></script>
<?php include "basiclayout.php";?>
       