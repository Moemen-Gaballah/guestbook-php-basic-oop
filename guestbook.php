<?php

include('includes/config.php');
include('includes/messages.class.php');

$selected= 'guestbook';
$success= '';
$error  = '';

include('templates/front/header.html');

$gbObject = new messages();
if(count($_POST)>0){
	$title = $_POST['title'];
	$content = $_POST['content'];
	$name = $_POST['name'];
	$email = $_POST['email'];

	
	if($gbObject->addMessage($title,$content,$name,$email)){
		$success = 'Message added successfully...';
	}else{
		$error = 'Error Adding Message';
	}
}

	$messages = $gbObject->getMessages('ORDER BY `id` DESC');

	include('templates/front/guestbook.html');
	include('templates/front/footer.html');