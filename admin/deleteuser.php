<?php 

session_start();

require('../includes/config.php');
require('../includes/users.class.php');
require('../includes/general.functions.php');

if(!checkLogin())
	exit('you are not allowed to view this page');

// delete users
$id = (isset($_GET['id'])) ? (int)$_GET['id'] : 0;
$userObject = new users();
if($userObject->deleteUser($id)){
	header('LOCATION:users.php');
}else{
	echo 'invalid user selected';
}

?>