<?php
	session_start();
	require_once('DBconnect.php');
?>
<!DOCTYPE html>
<!-- Website template by freewebsitetemplates.com -->
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<title>E LIBRARY</title>
		<link rel="stylesheet" href="css/style_home.css" type="text/css" />
		<!--[if IE 7]>
			<link rel="stylesheet" href="css/ie7.css" type="text/css" />
		<![endif]-->

	</head>
	<body>
		<div class="page">
			<div class="header">
				<a href="homepage.php" id="logo"><img src="images/logo.png" alt=""/></a>
				<ul>
					<li class="selected"><a href="homepage.php">Home</a></li>
					<?php if(!empty($_SESSION['UID'])){ ?>
					<li><a href="dashboard.php">Dashboard</a></li>
					<li><a href="logout.php">Logout</a></li>
					<?php }else { ?>
					<li><a href="login.php">Login</a></li>
					<li><a href="signup.php">Sign up</a></li>
					<?php }?>
				</ul>
			</div>
			<div class="body">
				<div id="featured">
					<h3><a href="search.php">ADVANCED SEARCH</a></h3>
				</div>
			</div>
           
			<div class="footer">
				<div class="connect">
					<a href="http://facebook.com" id="facebook">facebook</a>
					<a href="http://twitter.com" id="twitter">twitter</a>
					<a href="http://www.youtube.com" id="vimeo">vimeo</a>
				</div>
			</div>
		</div>
	</body>
</html>  