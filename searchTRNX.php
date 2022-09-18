<?php
	session_start();
	require_once('DBconnect.php');
	if(!empty($_SESSION['UID'])){
?>
<?php
if(count($_POST)>0) {
    if(!empty($_POST['tid'])) {
        $tid=$_POST['tid'];
        $result = mysqli_query($conn,"SELECT * FROM sub_stat where TRXID=".$tid." ");
    }
    if(!empty($_POST['rid'])) {
        $rid=$_POST['rid'];
        $result = mysqli_query($conn,"SELECT * FROM sub_stat where RID=".$rid." ");
    }
	if (mysqli_num_rows($result) != 0) {

?>

// <?php
// require_once('DBconnect.php');
// if(count($_POST)>0) {
	// $tid=$_POST['tid'];
	// $result = mysqli_query($conn,"SELECT * FROM sub_stat where TRXID=".$tid."");
	// if (mysqli_num_rows($result) != 0) {

// ?>
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
					<p class = "back"><a href="sub_stat.php"><- Go Back</a></p>
				</body>
				<table class = "trnx">
						<tr>
							<th>TRXID</th>
							<th>RID</th>
							<th>TRX DATE</th>
							<th>SUBSCRIPTION END</th>
							<th>BKASH</th>
							<th>NAGAD</th>
							<th>ROCKET</th>
						</tr>
				<?php
				while($row = mysqli_fetch_array($result)) {
						echo "<tr><td>". $row[0]."</td><td>". $row[1]."</td><td>". $row[2]."</td><td>". $row[3]."</td><td>"
						. $row[4]."</td><td>". $row[5]."</td><td>". $row[6]."</td></tr>"; 
					}?>
				</table>
				<?php
	}
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
	
</style>