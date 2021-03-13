<?php 

session_start();

require('../includes/config.php');
require('../includes/users.class.php');
require('../includes/general.functions.php');

if(!checkLogin())
	header('LOCATION:login.php');
	// exit('you are not allowed to view this page');

$error = '';
if(count($_POST) > 0){
	$username = $_POST['username'];
	$password = $_POST['password'];
	$email = $_POST['email'];

	// add user 
	$userObject = new users();
	if($userObject->addUser($username, $password, $email))
		header('LOCATION:users.php');

	$error = "data invalid";
}


include('../templates/admin/header.html');
include('../templates/admin/menu.html');
include('../templates/admin/add-user.html');
include('../templates/admin/footer.html');

?>
