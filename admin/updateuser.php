<?php 

session_start();

require('../includes/config.php');
require('../includes/users.class.php');
require('../includes/general.functions.php');

if(!checkLogin())
	header('LOCATION:login.php');
	// exit('you are not allowed to view this page');


	$idFromUrl = (isset($_GET['id'])) ? (int)$_GET['id'] : 0;
	// add user 
	$userObject = new users();
	$error = '';
	$success = '';

	if(count($_POST)>0){
		$username = $_POST['username'];
		$password = $_POST['password'];
		$email = $_POST['email'];
		$idFromForm = $_POST['id'];
		if($userObject->updateUser($idFromForm,$username, $password, $email)){
			$success = 'user updated';
			header('LOCATION:users.php');
		}else{
			$error = 'user not updated';
		}
	}else{
		// get user from db;
		$user = $userObject->getUser($idFromUrl);
	}

	// $error = "data invalid";
// }


include('../templates/admin/header.html');
include('../templates/admin/menu.html');
include('../templates/admin/edit-user.html');
include('../templates/admin/footer.html');

?>
