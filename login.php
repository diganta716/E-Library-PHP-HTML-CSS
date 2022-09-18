<?php session_start()?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UFT-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login Page</title>
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
	<section>
	<div class = "imgBx">
		<img src = "loginBG.jpg">
	</div>
	<div class="contentBx">
		<div class="formBx">
			<a href="homepage.php"><img src="images/logo.png" alt=""/></a>
			<h2>Login</h2>
			<form action="signin.php" method = "POST">
				<div class ="inputBx">
					<span>Username</span>
					<input type="text" name="uname">
				</div>
				<div class ="inputBx">
					<span>Password</span>
					<input type="password" name="pass">
				</div>
				<div class ="inputBx">
					<input type="submit" value="Sign in">
				</div>
				<div class ="inputBx">
					<p>Don't have an account? <a href="signup.php">Sign Up</a>
				</div>
			</form>
		</div>
	</div>
	</section>
</body>
</html>