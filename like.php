<html>
<head>
<script type="text/javascript" src="jquery.min.js"></script>
</head>
<body>






<script>
function ilike() {
		var user= $('#hiddenuser').val();
		var article=$('#hiddenarticle').val();
		
		
			$.ajax({
				type: "POST",
				url: "calculatelike.php",
				data: { user:user ,article:article },
				cache: false,
				success: function(html){
					$("#like").disabled=true;
				}
			});
		return false;    
	}
</script>
<input type="hidden" value="<?php echo $_SESSION['login_user']?>" id="hiddenuser"/>
<input type="hidden" value="<?php echo $_GET['articleid']?>" id="hiddenarticle"/>
<input type="button" id="like" value="like" onclick="ilike()" />

</body>
</html>