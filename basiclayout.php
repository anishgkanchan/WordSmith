<ul id="gn-menu" class="gn-menu-main">
                <li class="gn-trigger">
                    <a class="gn-icon gn-icon-menu"><span></span></a>
                    <li><span class="sitetitle"><a href="index.html">word<span style="color:#555;">smith.</span></a></span></li>
                    <li><span id="crw">craft your <span style="color:#3c6"><b>words</b><span></li>
                    <nav class="gn-menu-wrapper">
                        <div class="gn-scroller">
                            <ul class="gn-menu">
                                    <li class="gn-search-item">
                                         <form action="searchresults.php?" method="GET" autocomplete="off">

                            <input id="searchinput" class="gn-search" placeholder="Enter your search term..." type="search" value="" name="search" id="search">
                            
                            <input type="hidden" name="page" value="1" />
                            <input type="hidden" name="type" value="posts" />
                             <a class="gn-icon gn-icon-search"><span>Search</span></a>
                        </form>

                                </li>
                                <li>
                                    <a href="homepage.php" class="gn-icon glyphicon-home">Home</a>
                                </li>
                                <li><a href="viewmessage.php" class="gn-icon glyphicon-envelope">Messages</a></li>
                                <li><a href="createarticle.php" class="gn-icon glyphicon-edit">Write</a></li>
                                <li><a href="portal.php" class="gn-icon glyphicon-briefcase">Portal</a></li>
                                <li><a href="categories.php" class="gn-icon glyphicon-th-large">Categories</a></li>
                                <li><a href="featured.php" class="gn-icon glyphicon-star">Featured</a></li>
                                <li><a href="profile.php?view=<?php echo $_SESSION['login_user']?>" class="gn-icon glyphicon-user">Profile</a></li>
                                <li><a href="editprofile.php" class="gn-icon glyphicon-cog">Settings</a></li>
                                <li><a href="logout.php" class="gn-icon glyphicon-exclamation-sign">Logout</a></li>
                                
                            </ul>
                        </div><!-- /gn-scroller -->
                    </nav>
                    <?php
                       $dbc=mysqli_connect('localhost','root','','test')
      or die("error connecting to the database");
                        $q="select * from creator where creatorid={$_SESSION['login_user']}";
                        $res=mysqli_query($dbc,$q);
                        $r=mysqli_fetch_array($res);
                    ?>  
            <li id="usrnam"> <a href="profile.php?view=<?php echo $_SESSION['login_user']?>">@<?php echo $r['username']?></a></li>
        </ul>
        </div><!-- /container -->
        <!--search-->
        <script src="js/classie.js"></script>
		<script src="js/gnmenu.js"></script>
		<script>
			new gnMenu( document.getElementById( 'gn-menu' ) );
		</script>
		<script src="js/classie.js"></script>
        <script src="js/uisearch.js"></script>

        <script>
            new UISearch( document.getElementById( 'sb-search' ) );
       </script>       
</html>
    </body>
</html>