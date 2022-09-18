<?php
require_once('DBconnect.php');
if(count($_POST)>0) {
	$uid=$_POST['uid'];
	$result = mysqli_query($conn,"SELECT * FROM userbase where UID=".$uid." ");
	if (mysqli_num_rows($result) != 0) {

?>
<!DOCTYPE html>
<html>
<head>
<title> Search Result</title>
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
					<p class = "back"><a href="userbase.php"><- Go Back</a></p>
				</body>
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
				while($row = mysqli_fetch_array($result)) {
					echo "<tr><td>". $row[0]."</td><td>". $row[1]."</td><td>". $row[2]."</td><td>". $row[3]."</td><td>"
						. $row[4]."</td><td>". $row[5]."</td><td>". $row[6]."</td></tr>"; 
				}?>
				</table>
				<?php
	}
	else{
		echo '<div>UID does not exist. <a href="userbase.php">Return to userbase page?</a></div>';
	}
}
		?>
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
</style>