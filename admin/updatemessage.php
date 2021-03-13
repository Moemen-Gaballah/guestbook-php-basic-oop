<?php 

session_start();

require('../includes/config.php');
require('../includes/messages.class.php');
require('../includes/general.functions.php');

if(!checkLogin())
	header('LOCATION:login.php');
	// exit('you are not allowed to view this page');


	$idFromUrl = (isset($_GET['id'])) ? (int)$_GET['id'] : 0;
	// add user 
	$messageObject = new messages();
	$error = '';
	$success = '';

	if(count($_POST)>0){
		$title = $_POST['title'];
		$content = $_POST['content'];
		// $idFromForm = $_POST['id'];
		$name = $_POST['name'];
		$email = $_POST['email'];
		if($messageObject->updateMessage($idFromUrl,$title,$content,$name, $email)){
			$success = 'message updated';
			header('LOCATION:messages.php');
		}else{
			$error = 'message not updated';
		}
	}else{
		// get user from db;
		if($messageObject->getMessage($idFromUrl)){
			$message = $messageObject->getMessage($idFromUrl);
		}else{
			$error = 'Message failed...';
		}
	}

	// $error = "data invalid";
// }


include('../templates/admin/header.html');
include('../templates/admin/menu.html');
include('../templates/admin/edit-message.html');
include('../templates/admin/footer.html');

?>
