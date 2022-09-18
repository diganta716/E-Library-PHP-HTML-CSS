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
					    <p class = "back"><a href="editbook.php"><- Go Back</a></p>
					</body>
					<?php
					
					$bookid = $_GET['bookid'];
                    $query = "DELETE FROM book WHERE BID = '$bookid'";

                    $data = mysqli_query($conn, $query);

                    if($data) {
                        echo "<script>alert('Book deleted')</script>";
                        header("Location: editbook.php");
                    
                    }

                    else {
                        echo "<script>alert('Failed to delete book')</script>";
                        header("Location: editbook.php");
                        
                    }

                    ?>
			</div>
           
			<div class="footer">

				<div class="connect">
					
				</div>
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

	
	.table {
		border-collapse: collapse;
		width: 100%
		color: #f78117;
		font-size: 16px;
		text-align: left;
		margin: 25px 0;
		min_width: 400px;
	}
	.table tr th {
		background-color: teal;
		color: white;
		text-align: left;
		padding: 12px 15px;
	}
	.table tr td {
		padding: 12px 15px;
		text-align: left;
		border-bottom: 1px solid #bababa;
	}
	.table tr:nth-of-type(even) {
		background-color: #f5f5f5;
	}

	.table tr:last-of-type {
		border-bottom: 2px solid teal;
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

	h2.bl {
		position: relative;
		border-bottom: 3px solid teal;
		background-color: #c2c2c2;
		text-align: center;
		padding: 12px 15px;
		max-width: 400px;
	}
	

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
	li {
		height: 30px;
		line-height: 30px;
	}
    /* p.back {
        padding: 6px 10px;
        background-color: #fcc8bb;
        border: 3px solid #ed7253;
        border-radius: 15px;
        text-align: center;
        color: white;
        width: 100px;
    } */



</style>