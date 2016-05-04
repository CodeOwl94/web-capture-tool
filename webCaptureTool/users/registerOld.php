<?php
session_start();
if(isset($_SESSION['user'])!="")
{
	header("Location: ./index.php");
}
include_once '../openDB.php';

if(isset($_POST['btn-signup']))
{
	$uname = mysqli_real_escape_string($link,$_POST['uname']);
	$email = mysqli_real_escape_string($link,$_POST['email']);
	$upass = password_hash((mysqli_real_escape_string($link,$_POST['pass'])), PASSWORD_BCRYPT);
	
	$uname = trim($uname);
	$email = trim($email);
	$upass = trim($upass);
	
	// email exist or not
	$query = "SELECT email FROM users WHERE email='$email'";
	$result = mysqli_query($link,$query);
	
	$count = mysqli_num_rows($result); // if email not found then register
	
	if($count == 0){
		
		if(mysqli_query($link,"INSERT INTO users(username, email, password) VALUES('$uname','$email','$upass')"))
		{
			?>
			<script>alert('successfully registered ');</script>
			<?php
		}
		else
		{
			?>
			<script>alert('error while registering you...');</script>
			<?php
		}		
	}
	else{
			?>
			<script>alert('Sorry Email ID already taken ...');</script>
			<?php
	}
	
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Coding Cage - Login & Registration System</title>
<link rel="stylesheet" href="style.css" type="text/css" />

</head>
<body>
<center>
<div id="login-form">
<form method="post">
<table align="center" width="30%" border="0">
<tr>
<td><input type="text" name="uname" placeholder="User Name" required /></td>
</tr>
<tr>
<td><input type="email" name="email" placeholder="Your Email" required /></td>
</tr>
<tr>
<td><input type="password" name="pass" placeholder="Your Password" required /></td>
</tr>
<tr>
<td><button type="submit" name="btn-signup">Sign Me Up</button></td>
</tr>
<tr>
<td><a href="index.php">Sign In Here</a></td>
</tr>
</table>
</form>
</div>
</center>
</body>
</html>