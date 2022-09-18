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
            <?php
			$uid = $_SESSION["UID"];

			$result = mysqli_query($conn, "SELECT * FROM userbase WHERE UID = '$uid'");
			$frow = mysqli_fetch_array($result);
			$flag = $frow["ADMIN_FLAG"];
			
			if ($flag == 1) {
				echo 'Admin Name: '.$frow['UNAME'].'';
				?>
				<ul class = "admindash">
					<li class = "admindash1"><a href="userbase.php">Userbase</a></li>
					<li class = "admindash2"><a href="sub_stat.php">Subscription status</a></li>
					<li class = "admindash3"><a href="addbook.php">Upload Book</a></li>
					<li class = "admindash4"><a href="editbook.php">Book List</a></li>
				</ul>
				

				</tr>
				<?php
			
			} 
			else {
				$pcheck = mysqli_query($conn, "SELECT PID FROM publisher WHERE PID = '$uid'");
				if (mysqli_num_rows($pcheck) != 0) {
					$row = mysqli_fetch_array(mysqli_query($conn, "SELECT publisher.PID, userbase.UNAME, publisher.ADDRESS,userbase.EMAIL,userbase.BIRTHDATE
												FROM userbase, publisher
												WHERE userbase.UID=publisher.PID;"));
					?>
					<body>
						<h2 class = "userinfo">User Information</h2>
					</body>
					<table class = "userinfo">
							<tr class = "userinfo">
								<td class = "title">USER ID</td>
								<td class = "oddinfo"><?php echo $row["PID"] ?></td>
							</tr>
							<tr class = "userinfo">
								<td class = "title">PUBLISHER NAME</td>
								<td class = "eveninfo"><?php echo $row["UNAME"] ?></td>
							</tr>
							<tr class = "userinfo">
								<td class = "title">PUBLISHER ADDRESS</td>
								<td class = "oddinfo"><?php echo $row["ADDRESS"] ?></td>
							</tr>
							<tr class = "userinfo">
								<td class = "title">EMAIL</td>
								<td class = "eveninfo"><?php echo $row["EMAIL"] ?></td>
							</tr>
							<tr class = "userinfo">
								<td class = "title">FOUNDING DATE</td>
								<td class = "oddinfo"><?php echo $row["BIRTHDATE"] ?></td>
							</tr>
					</table>
					<ul class = "admindash">
						<li class = "admindash4"><a href="delete_request.php">Books</a></li>
					</ul>
					<?php
					
				}
				else {
					$sql = "SELECT * FROM userbase WHERE UID = '$uid'";
					$result = mysqli_query($conn, $sql);
					if (mysqli_num_rows($result) != 0) {
						$row = mysqli_fetch_array($result);
						
					?>
						<table class = "userinfo">
							<tr class = "userinfo">
								<td class = "title">EMAIL</td>
								<td class = "oddinfo"><?php echo $row["EMAIL"] ?></td>
							</tr>
							<tr class = "userinfo">
								<td class = "title">USERNAME</td>
								<td class = "eveninfo"><?php echo $row["UNAME"] ?></td>
							</tr>
							<tr class = "userinfo">
								<td class = "title">BIRTH DATE</td>
								<td class = "oddinfo"><?php echo $row["BIRTHDATE"] ?></td>
							</tr>
							<tr class = "userinfo">
								<td class = "title">GENDER</td>
								<td class = "eveninfo"><?php echo $row["GENDER"] ?></td>
							</tr>
							<tr class = "userinfo">
								<td class = "title">AGE</td>
								<td class = "oddinfo"><?php echo $row["AGE"] ?></td>
							</tr>
							<tr class = "userinfo">
								<td class = "title">USER ID</td>
								<td class = "eveninfo"><?php echo $row["UID"] ?></td>
							</tr>
							

						</table><br>
						<ul><li class = "admindash1"><a href="bookread.php">Booklist</a></li></ul>
						<ul><li class = "admindash2"><a href="transaction.php">Transaction Page</a></li></ul>
					<?php
					
					}
					else {
						echo "0 result";
					}
				}
			}

            ?>
            
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
	/* li.admindash a, li a:hover{
		color: white;
	} */

	ul.admindash {
		padding-top: 12px;
	}
	li.admindash1 a {
		background-color: #c2c2c2;
		color: black;
		font-size:16px;
		text-decoration:none;
		outline:none;
		padding: 12px 20px;
		border-bottom: 3px solid #ed7253;
		text-align: center;
		

	}

	li.admindash2 a {
		background-color: #c2c2c2;
		color: black;
		font-size:16px;
		text-decoration:none;
		outline:none;
		padding: 12px 20px;
		border-bottom: 3px solid #7fc26d;
		text-align: center;
		

	}

	li.admindash3 a {
		background-color: #c2c2c2;
		color: black;
		font-size:16px;
		text-decoration:none;
		outline:none;
		padding: 12px 20px;
		border-bottom: 3px solid purple;
		text-align: center;
		

	}
	li.admindash4 a {
		background-color: #c2c2c2;
		color: black;
		font-size:16px;
		text-decoration:none;
		outline:none;
		padding: 12px 20px;
		border-bottom: 3px solid teal;
		text-align: center;
		

	}
	li {
		height: 30px;
		line-height: 30px;
	}




</style>