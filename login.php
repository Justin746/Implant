<!DOCTYPE html>
<html>
<title>Login</title>
<meta charset="utf-8">
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<?php
require('gpt.php');
session_start();
if (isset($_POST['username'])){
    $username = stripslashes($_REQUEST['username']);
    $username = mysqli_real_escape_string($con,$username); 
    $password = stripslashes($_REQUEST['password']);
	$password = mysqli_real_escape_string($con,$password);
	$query = "SELECT *FROM `users` WHERE username='$username' password='".md5($password)."'";
    $result = mysqli_query($con,$query) or die(mysql_error());
	$rows=mysqli_num_rows($result);
    if($rows==1){
	$_SESSION['username']=$username;
	header("Location:login.php");
	}else{
	echo "<div class='form'>
<h3>Username/Password is incorrect.</h3>
<br/>Click here to <a href='login.php'>Login</a></div>";
    }
	}else{
?>
<div class="form">
<h1>Log In</h1>
<form  name="Login action="" method="post">
<input type="text" name="username" placeholder="Username" required />
<input type="password" name="password" placeholder="Password" required />
<input type="submit" name="submit" value="Login" />
</form>
</div>
<?php } ?>
</body>
</html>
