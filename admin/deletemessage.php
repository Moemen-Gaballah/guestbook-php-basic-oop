<?php 

session_start();

require('../includes/config.php');
require('../includes/messages.class.php');
require('../includes/general.functions.php');

if(!checkLogin())
	exit('you are not allowed to view this page');

$error = '';

// delete messages
$id = (isset($_GET['id'])) ? (int)$_GET['id'] : 0;
$messageObject = new messages();
if($messageObject->deleteMessage($id)){

	header('LOCATION:messages.php');
}else{
	$error = 'faild to delete message';

	include('../templates/admin/header.html');
	include('../templates/admin/menu.html');
	include('../templates/admin/resultmessages.html');
	include('../templates/admin/footer.html');
}

?>