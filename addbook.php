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
				<form action = "addbook.php" method = "post" enctype = "multipart/form-data">
                    Book ID: <br><input type = "text" name = "bid"> <br/>
                    ISBN: <br><input type = "text" name = "isbn"> <br/>
                    Book Title: <br><input type = "text" name = "title"> <br/>
                    Book Edition: <br><input type = "text" name = "edition"> <br/>
                    Book Description: <br><textarea class = "desc" type = "text" name = "desc"></textarea> <br/>
                    Book Total Page: <br><input type = "text" name = "page"> <br/>
                    Book Publish Date: <br><input type = "text" name = "pub_date"> <br/>
                    Book Publisher ID: <br><input type = "text" name = "pid"><br><br> <br/>

                    <label for = "">Choose PDF file</label><br><br/>
                    <input id = "pdf" type = "file" name = "pdf" value = "" required><br> <br>
                    <input id = "upload" type = "submit" name = "submit" value = "Upload">             
                    <?php
                    if (isset($_POST['submit']) && isset($_POST['bid']) && isset($_POST['isbn']) && isset($_POST['title']) && isset($_POST['edition'])
                    && isset($_POST['desc']) && isset($_POST['page']) && isset($_POST['pub_date']) && isset($_POST['pid'])) {
                        $bid = $_POST['bid'];
                        $isbn = $_POST['isbn'];
                        $title = $_POST['title'];
                        $edition = $_POST['edition'];
                        $desc = $_POST['desc'];
                        $page = $_POST['page'];
                        $pub_date = $_POST['pub_date'];
                        $pid = $_POST['pid'];

                        $pdf = $_FILES['pdf']['name'];
                        $pdf_type = $_FILES['pdf']['type'];
                        $pdf_size = $_FILES['pdf']['size'];
                        $pdf_tem_loc = $_FILES['pdf']['tmp_name'];
                        $pdf_store = "pdf/".$pdf;

                        move_uploaded_file($pdf_tem_loc, $pdf_store);

                        $sql = "INSERT INTO book(BID, ISBN, TITLE, EDITION, DESCRIPTION, TOTAL_PG, PUB_DATE, PID, PDF) 
                        values ('$bid', '$isbn', '$title', '$edition', '$desc', '$page', '$pub_date', '$pid', '$pdf')";
                        $query = mysqli_query($conn, $sql);

                        echo "<script>alert('Book added')</script>";
                    }
                    
                    ?>
                </form>
			</div>

           
			<div class="footer">
				<div class="connect">

				</div>
			</div>
		</div>
	</body>
</html>  

<style type = "text/css">
    textarea.desc {
        
        width: 350px;
        height: 150px;
    }

</style>