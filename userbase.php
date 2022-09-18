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
					<li><a href="homepage.php">Home</a></li>
					<?php if(!empty($_SESSION['UID'])){ ?>
					<li class="selected"><a href="dashboard.php">Dashboard</a></li>
					<li><a href="logout.php">Logout</a></li>
					<?php }else { ?>
					<li><a href="login.php">Login</a></li>
					<?php }?>
				</ul>
			</div>
			<div class="body">
				<body>
					<p class = "back"><a href="dashboard.php"><- Go Back</a></p>
				</body>
				<div class="container">
				  <form class="form-inline" method="post" action="searchUser.php">
					<input type="text" name="uid" class="form-control" placeholder="Search UID..">
					<button type="submit" name="save" class="btn btn-primary">Search</button>
				  </form>
				</div>

            <?php
            require_once("DBconnect.php");
			$uid = $_SESSION["UID"];

			$result = mysqli_query($conn, "SELECT ADMIN_FLAG FROM userbase WHERE UID = '$uid'");
			$frow = mysqli_fetch_array($result);
			$flag = $frow["ADMIN_FLAG"];
			
			if ($flag == 1) {?>
				<table class = "user_table">
				<tr>
					<th>EMAIL</th>
					<th>UNAME</th>
					<th>BIRTHDATE</th>
					<th>GENDER</th>
					<th>AGE</th>
					<th>UID</th>
					<th>ADMIN FLAG</th>

				</tr>
				<?php
				$sql = "SELECT * FROM userbase";
				$result = mysqli_query($conn, $sql);
            	if (mysqli_num_rows($result) != 0) {
                	while($row = mysqli_fetch_array($result)) {
						echo "<tr><td>". $row[0]."</td><td>". $row[1]."</td><td>". $row[2]."</td><td>". $row[3]."</td><td>"
						. $row[4]."</td><td>". $row[5]."</td><td>". $row[6]."</td></tr>"; 
					}
					echo "</table>";
                
            	}else {
					echo "0 result";
				}
			}?>
            
			
			</div>
			<div class="footer">
                <!--
				<ul>
					<li><a href="index.html">Home</a></li>
					<li><a href="about.html">About</a></li>
					<li><a href="blog.html">Blog</a></li>
					<li><a href="services.html">Gallery</a></li>
				</ul>
				<p>&#169; Copyright &#169; 2011. Company name all rights reserved</p>
-->
				<!-- <div class="connect">
					<a href="http://facebook.com" id="facebook">facebook</a>
					<a href="http://twitter.com" id="twitter">twitter</a>
					<a href="http://www.youtube.com" id="vimeo">vimeo</a>
				</div> -->
			</div>



		</div>
	</body>
</html>  

<style type = "text/css">
	.user_table {
		border-collapse: collapse;
		width: 100%
		color: #f78117;
		font-size: 16px;
		text-align: left;
		margin: 25px 0;
		min_width: 400px;
	}
	.user_table tr th {
		background-color: #ed7253;
		color: white;
		text-align: left;
		padding: 12px 15px;
	}
	.user_table tr td {
		padding: 12px 15px;
		text-align: left;
		border-bottom: 1px solid #bababa;
	}
	.user_table tr:nth-of-type(even) {
		background-color: #f5f5f5;
	}

	.user_table tr:last-of-type {
		border-bottom: 2px solid #ed7253;
	}

	
	.trnx {
		border-collapse: collapse;
		width: 100%
		color: #f78117;
		font-size: 16px;
		text-align: left;
		margin: 25px 0;
		min_width: 400px;
	}
	.trnx tr th {
		background-color: #7fc26d;
		color: white;
		text-align: left;
		padding: 12px 15px;
	}
	.trnx tr td {
		padding: 12px 15px;
		text-align: left;
		border-bottom: 1px solid #bababa;
	}
	.trnx tr:nth-of-type(even) {
		background-color: #f5f5f5;
	}

	.trnx tr:last-of-type {
		border-bottom: 2px solid #7fc26d;
	}

	h2.userinfo {
		position: relative;
		border-bottom: 3px solid #ed7253;
		background-color: #c2c2c2;
		text-align: center;
		padding: 12px 15px;
		max-width: 400px;
	}

	table.userinfo {
		position: relative;
		width: 100%;
		max-width: 400px;
	}

	tr.userinfo {
		
		text-align: left;
	
	}

	td.title {
		background-color: #ed7253;
		
		color: #f0f0f0;
		text-align: left;
		padding: 12px 20px;
		
	}
	td.oddinfo {
		background-color: white;
		
		color: #212121;
		text-align: left;
		padding: 12px 20px;
		
	}
	td.eveninfo {
		background-color: #f5f5f5;
		
		color: #212121;
		text-align: left;
		padding: 12px 20px;
		

	}

	h2.trx {
		position: relative;
		border-bottom: 3px solid #7fc26d;
		background-color: #c2c2c2;
		text-align: center;
		padding: 12px 15px;
		max-width: 400px;
	}



</style>