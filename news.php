<?php
session_start();
include_once 'user/dbconnect.php';
$select_query = "SELECT * from user_video natural join users WHERE cat='news'";
$select_query_result = mysqli_query($con, $select_query) or die(mysqli_error($con));
$row = mysqli_fetch_array($select_query_result);
?>



<!DOCTYPE HTML>
<html>
<head>
<title>UnitedTube</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap -->
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' media="all" />
<!-- //bootstrap -->
<link href="css/dashboard.css" rel="stylesheet">
<!-- Custom Theme files -->
<link href="css/style.css" rel='stylesheet' type='text/css' media="all" />
<script src="js/jquery-1.11.1.min.js"></script>
<!--start-smoth-scrolling-->
<!-- fonts -->
<link href='//fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css'>
<!-- //fonts -->
</head>
  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php"><h1><img src="images/logo.png" alt="" /></h1></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
			<div class="top-search">
				<form class="navbar-form navbar-right">
					<input type="text" class="form-control" placeholder="Search...">
					<input type="submit" value=" ">
				</form>
			</div>
			<div class="header-top-right">
				<div class="file">
					<?php if (isset($_SESSION['usr_id'])) { ?>
					<a href="upload.php">Upload</a>
					<?php } ?>
				</div>	
				<div class="signin">
					<?php if (isset($_SESSION['usr_id'])) { ?>
					<li style="list-style-type: none;"><p class="navbar-text btn btn-default">Signed in as <?php echo $_SESSION['usr_name']; ?></p></li>
				    <li style="list-style-type: none;"><a href="user/logout.php">Log Out</a></li>
				    <?php } else { ?>
					<a href="user/register.php" >Sign Up</a>
									
				</div>
				<div class="signin">
					<a href="user/login.php">Sign In</a>
					<?php } ?>
				</div>
				<div class="clearfix"> </div>
			</div>
        </div>
		<div class="clearfix"> </div>
      </div>
    </nav>
	
        <div class="col-sm-3 col-md-2 sidebar">
			<div class="top-navigation">
				<div class="t-menu">MENU</div>
				<div class="t-img">
					<img src="images/lines.png" alt="" />
				</div>
				<div class="clearfix"> </div>
			</div>
				<div class="drop-navigation drop-navigation">
				  <ul class="nav nav-sidebar">
					<li class="active"><a href="index.php" class="home-icon"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
					<li class="active"><a href="index.php" class="home-icon"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
					<li><a href="movies.php"><span class="glyphicon glyphicon-film" aria-hidden="true"></span>Movies</a></li>
					<li><a href="songs.php" class="song-icon"><span class="glyphicon glyphicon-music" aria-hidden="true"></span>Songs</a></li>
					<li><a href="news.php" class="news-icon"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>News</a></li>
					<?php if (isset($_SESSION['usr_id'])) { ?>
					<li><a href="urvideo.php" class="news-icon"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>Your Videos</a></li>
					<?php } ?>
				  </ul>
				  <!-- script-for-menu -->
						<script>
							$( ".top-navigation" ).click(function() {
							$( ".drop-navigation" ).slideToggle( 300, function() {
							// Animation complete.
							});
							});
						</script>
					<div class="side-bottom">
						<div class="side-bottom-icons">
							<ul class="nav2">
								<li><a href="#" class="facebook"> </a></li>
								<li><a href="#" class="facebook twitter"> </a></li>
								<li><a href="#" class="facebook chrome"> </a></li>
								<li><a href="#" class="facebook dribbble"> </a></li>
							</ul>
						</div>
						<div class="copyright">
							<p>Copyright © 2017 UnitedTube. All Rights Reserved</p>
						</div>
					</div>
				</div>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
			<div class="main-grids">
				<div class="top-grids">
					<div class="recommended-info">
						<h3>News</h3>
					</div>
					<?php while ($row = mysqli_fetch_array($select_query_result)) { ?>
					<div class="col-md-4 resent-grid recommended-grid slider-top-grids">
						<div class="resent-grid-img recommended-grid-img">
							<div style="text-align:center"> 
								<video width="420" controls>
								<source src="<?php echo $row['v_dir']; ?>" type="video/mp4">
								<source src="<?php echo $row['v_dir']; ?>" type="video/ogg">
								Your browser does not support HTML5 video.
								</video>
								
							</div> 
							<!--<a href="single.html"><img src="images/t1.jpg" alt="" /></a> -->
							<div class="time">
								<p>3:04</p>
							</div>
							<div class="clck">
								<span class="glyphicon glyphicon-time" aria-hidden="true"></span>
							</div>
						</div>
						<div class="resent-grid-info recommended-grid-info">
							<h3><a href="single.html" class="title title-info"><?php echo $row['v_name']; ?></a></h3>
							<ul>
								<li><p class="author author-info"><a href="#" class="author"></a><?php echo $row['name']; ?></p></li>
								<li class="right-list"><p class="views views-info">2,114,200 views</p></li>
							</ul>
						</div>
					</div>
					<?php } ?>
					<div class="clearfix"> </div>
				</div>
			</div>
		</div>
		<div class="clearfix"> </div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
	
    <script src="js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
  </body>
</html>