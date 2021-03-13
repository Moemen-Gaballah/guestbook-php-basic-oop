<?php 
session_start();
require('../includes/config.php');
require('../includes/general.functions.php');
require('../includes/users.class.php');

if(checkLogin())
	header('LOCATION:index.php');
	// exit('you are already looged in');

// if(isset($_POST['submit'])) // if input type submit not button;
$error = '';
$success = '';
if(count($_POST)>0)
{
	$username = $_POST['username'];
	$password = $_POST['password'];

	$userObject = new users();
	$userData = $userObject->login($username, $password); 
	if($userData && count($userData)>0)
	{
		$_SESSION['user'] = $userData;
		// $success = 'login successful';
		header('LOCATION:index.php');
		// echo "logged in";
	}else {
		$error = "Invalid username and password";
	}
}

include('../templates/admin/login.html');
?> 

<!-- <form action="login.php" method="post">
	username: <input type="text" name="username"><br>
	passwordd: <input type="password" name="password"><br>
	<input type="submit" name="submit"><br>
</form> -->