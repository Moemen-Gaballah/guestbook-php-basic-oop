<?php 
session_start();
require('../includes/config.php');
require('../includes/messages.class.php');
require('../includes/general.functions.php');

if(!checkLogin())
	header('LOCATION:login.php');

$gbObject = new messages();
$messages = $gbObject->getMessages('ORDER BY `id` DESC');

include('../templates/admin/header.html');
include('../templates/admin/menu.html');
include('../templates/admin/all-messages.html');
include('../templates/admin/footer.html');
