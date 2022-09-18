<?php
session_start();
require_once('DBconnect.php');

if(isset($_POST['uname']) && isset($_POST['pass'])){
	$u = $_POST['uname'];
	$p = $_POST['pass'];
	$sql = "SELECT * FROM userbase WHERE UNAME ='$u' AND PASSWORD='$p'";
	
	
	$result = mysqli_query($conn, $sql);
	if(mysqli_num_rows($result) !=0){
		foreach($result as $r){
			$_SESSION['UID'] = $r['UID'];
		}
		header("Location: homepage.php");
	}else{
        echo '<div>Your Login credentials are wrong. <a href="login.php">Return to login page?</a></div>'; 
    }
}
?>