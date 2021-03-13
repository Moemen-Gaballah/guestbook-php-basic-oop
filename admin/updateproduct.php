<?php 
session_start();
require('../includes/config.php');
require('../includes/products.class.php');
require('../includes/general.functions.php');

// check user login or not
if(!checkLogin())
	header('LOCATION:login.php');

$error = '';
// $success = '';

$productObject  = new products();
$id = (isset($_GET['id'])) ? (int)$_GET['id'] : 0;
$product = $productObject->getProduct($id);

if(!$product || count($product) == 0){
	$error = 'Product Nof Found';
}

if(count($_POST)> 0){
	$id = $_POST['id'];
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
			if(!move_uploaded_file($temp, '../uploads/'.$image)){
				$image = $product['image'];
			}else{
				if(file_exists('../uploads/'.$product['image']))
					unlink('../uploads/'.$product['image']);
			}
		}

	}

	if($productObject->updateProduct($id,$title, $description,$image, $price, $available, $userId))
		header('LOCATION:products.php');
		// $success = "successfully updated product";

	$error = "data invalid";
}

include('../templates/admin/header.html');
include('../templates/admin/menu.html');
include('../templates/admin/edit-product.html');
include('../templates/admin/footer.html');