<?php
    
$showAlert = false; 
$showError = false; 
$exists=false;
    
if($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once('DBconnect.php');  
    $username = $_POST["username"]; 
    $password = $_POST["password"]; 
    $cpassword = $_POST["cpassword"];
	$email = $_POST["email"];
	$gender = $_POST["gender"];
	$year = $_POST['year'];
	$month = $_POST['month'];
	$day = $_POST['day'];
	
    $sql1 = "Select * from userbase where UNAME='$username'";
	$sql2 = "Select * from userbase where EMAIL='$email'";
	
    $result = mysqli_query($conn, $sql1);
    $num1 = mysqli_num_rows($result);
	$result = mysqli_query($conn, $sql2);
    $num2 = mysqli_num_rows($result);
	
	if($num1>0) {
      $exists="Username not available"; 
	}
	if($num2>0) {
      $exists="Email not available"; 
	}
    if(($num1 == 0) and ($num2 == 0)) {
        if(($password == $cpassword) && $exists==false) {
    
            $hash = password_hash($password, 
                                PASSWORD_DEFAULT);
            if($gender == "Male"){
				$g="M";
			} else{
				$g="F";
			}
			$date = $year.'-'.$month.'-'.$day;
			$age = floor((time() - strtotime($date)) / 31556926);
            
            $sql = "INSERT INTO `userbase`(`EMAIL`, `UNAME`, `BIRTHDATE`, `GENDER`, `AGE`, `ADMIN_FLAG`, `PASSWORD`)
				VALUES ('$email','$username','$date','$g','$age','0','$password')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                $showAlert = true; 
            }
        } 
        else { 
            $showError = "Passwords do not match"; 
        }      
    }// end if 
    
}//end if   
    
?>
    
<!doctype html>
    
<html lang="en">
  
<head>
    
	<meta charset="UFT-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Signup Page</title>
<style>
*
{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Poppins",sans-serif;
}
section
{
    position: relative;
    width: 100%;
    height: 100vh;
    display: flex;
}
section .headerImg
{
    position:  relative;
    width: 25%;
    height: 25%;
}
section .headerImg img
{
    position: absolute;
    top: 0;
    right: 0;
    width: 50%;
    height: 25%;
}
section .imgBx
{
    position:  relative;
    width: 50%;
    height: 100%;
}
section .imgBx img
{
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
}
section .contentBx
{
    display: flex;
    justify-content: center;
    align-items: center;
    width: 50%;
    height: 100%;
}
section .contentBx .formBx
{
    width: 50%;
}
section .contentBx .formBx img
{
    position:absolute;
	top:0;
	width:25%;
}
section .contentBx .formBx h2
{
    color: #966F33 ;
    font-weight: 600;
    font-size: 1.5em;
    text-transform: uppercase;
    margin-bottom: 20px;
    border-bottom: 4px solid #A9A9A9;
    display: inline-block;
    letter-spacing: 1px;
}
section .contentBx .formBx .inputBx
{
    margin-bottom: 20px;
}
section .contentBx .formBx .inputBx span
{
    font-size: 20px;
    margin-bottom: 5px;
    display: inline-block;
    color: #556B2F;
    font-weight: 300;
    font-size: 16px;
    letter-spacing: 1px;
}
section .contentBx .formBx .inputBx input
{
    width: 100%;
    padding: 10 px 20px;
    outline: none;
    font-weight: 400px;
    border: 1.6px solid #556B2F;
    font-size: 20px;
    letter-spacing: 1px;
    color: #556B2F;
    background: transparent;
    border-radius: 30px;
}
section .contentBx .formBx .inputBx input[type="submit"]
{
	background: #DEB886;
	color: #966F33;
    width: 50%;
    height: 50px;
    border: none;
	outline: none;
	cursor: pointer;
    border-radius: 25px;
    font-weight: 800;
    letter-spacing: 2;

}
section .contentBx .formBx .inputBx input[type="submit"]:hover
{
    background: #966F33;
	color: #DEB886;
}
section .contentBx .formBx .inputBx p
{
		color:#6f432a;
}
section .contentBx .formBx .inputBx p a
{
	color:#DEB886
}
@media (max-width: 768px)
{
	section .imgBx
	{
		position:  absolute;
		top:0;
		left:0;
		width: 100%;
		height: 100%;
	}
	section .contentBx
	{
		display: flex;
		justify-content: center;
		align-items: center;
		width: 100%;
		height: 100%;
		z-index: 1;
	}
	section .contentBx .formBx
	{
		width: 100%;
		padding: 40px;
		background: #fff;
		opacity: 0.85;
		margin: 40px;
	}
	section .contentBx .formBx img {
		position: relative;
		width: 100%;
		height: 100%;
	}
}
</style>
</head>
    
<body>
    
<?php
    
    if($showAlert) {
    
        echo ' <div class="alert alert-success 
            alert-dismissible fade show" role="alert">
    
            <strong>Success!</strong> Your account is 
            now created and you can login. 
            <button type="button" class="close"
                data-dismiss="alert" aria-label="Close"> 
                <span aria-hidden="true">×</span> 
            </button> 
        </div> '; 
    }
    
    if($showError) {
    
        echo ' <div class="alert alert-danger 
            alert-dismissible fade show" role="alert"> 
        <strong>Error!</strong> '. $showError.'
    
       <button type="button" class="close" 
            data-dismiss="alert aria-label="Close">
            <span aria-hidden="true">×</span> 
       </button> 
     </div> '; 
   }
        
    if($exists) {
        echo ' <div class="alert alert-danger 
            alert-dismissible fade show" role="alert">
    
        <strong>Error!</strong> '. $exists.'
        <button type="button" class="close" 
            data-dismiss="alert" aria-label="Close"> 
            <span aria-hidden="true">×</span> 
        </button>
       </div> '; 
     }
   
?>
    
<div class="contentBx">
    
    <section>
	<div class = "imgBx">
		<img src = "loginBG.jpg">
	</div>
	<div class="contentBx">
		<div class="formBx">
			<a href="homepage.php"><img src="images/logo.png" alt=""/></a>
			<h2>Sign Up</h2>
			<form action="signup.php" method = "POST">
				<div class ="inputBx">
					<span>Username</span>
					<input type="text" name="username">
				</div>
				<div class ="inputBx">
					<span>Password</span>
					<input type="password" name="password">
				</div>
				<div class ="inputBx">
					<span>Confirm Password</span>
					<input type="password" name="cpassword">
				</div>
				<div class ="inputBx">
					<span>Enter Email</span>
					<input type="text" name="email">
				</div>
				<div class ="inputBx">
					<span>Gender</span>
				</div>
				<select name="gender">
				  <option value="">Select Gender</option>
				  <option value="Male">Male</option>
				  <option value="Female">Female</option>
				</select>
				<div class ="inputBx">
					<span>Date of Birth</span>
				</div>
				<select name="year">
				  <option value="">Select year</option>
				  <?php for ($i = 1970; $i < date('Y'); $i++) : ?>
				  <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
				  <?php endfor; ?>
				</select>
				<select name="month">
				  <option value="">Select month</option>
				  <?php for ($i = 1; $i <= 12; $i++) : ?>
				  <option value="<?php echo ($i < 10) ? '0'.$i : $i; ?>"><?php echo $i; ?></option>
				  <?php endfor; ?>
				</select>
				<select name="day">
				  <option value="">Select day</option>
				  <?php for ($i = 1; $i <= 31; $i++) : ?>
				  <option value="<?php echo ($i < 10) ? '0'.$i : $i; ?>"><?php echo $i; ?></option>
				  <?php endfor; ?>
				</select>
				<div class ="inputBx">
					<input type="submit" value="Sign up">
				</div>
				<div class ="inputBx">
					<p>Already have an account? <a href="login.php">Sign in</a>
				</div>
			</form>
		</div>
	</div>
	</section>
</div>
    
<!-- Optional JavaScript --> 
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
    
<script src="
https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="
sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous">
</script>
    
<script src="
https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity=
"sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" 
    crossorigin="anonymous">
</script>
    
<script src="
https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" 
    integrity=
"sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
    crossorigin="anonymous">
</script> 
</body> 
</html>