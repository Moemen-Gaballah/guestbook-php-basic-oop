<?php 

session_start();

require('../includes/config.php');
require('../includes/products.class.php');
require('../includes/general.functions.php');

if(!checkLogin())
	header('LOCATION:login.php');

$success  = '';
$error = '';
if(count($_POST) > 0){
	$title = $_POST['title'];
	$description = $_POST['description'];
	$price = $_POST['price'];
	$available = $_POST['available'];
	$userId = $_SESSION['user']['id'];

	// Store Image
	$image = '';
	if(isset($_FILES['image'])){

		// info 
		$name = $_FILES['image']['name'];
		$type = $_FILES['image']['type'];
		$temp = $_FILES['image']['tmp_name'];
		$errorImg = $_FILES['image']['error'];
		$sizeImg = $_FILES['image']['size'];

		if(($type == 'image/png' || $type == 'image/jpg' || $type == 'image/jpeg') && $errorImg == 0){
			// rename :
			$image = md5($name.date('U').rand(1000,100000)).$name;

			// move :
			if(!move_uploaded_file($temp, '../uploads/'.$image))
				$image = '';
		}

	}

	// echo "<pre>";
	// print_r($_POST);
	// print_r($_FILES);
	// exit();

	// add user 
	$productObject = new products();
	if($productObject->addProduct($title, $description,$image, $price, $available, $userId))
		header('LOCATION:products.php');

	$error = "data invalid";
}

include('../templates/admin/header.html');
include('../templates/admin/menu.html');
include('../templates/admin/add-product.html');
include('../templates/admin/footer.html');
