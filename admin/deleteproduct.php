<?php 

session_start();

require('../includes/config.php');
require('../includes/products.class.php');
require('../includes/general.functions.php');

if(!checkLogin())
	exit('you are not allowed to view this page');

$error = '';

// delete products
$id = (isset($_GET['id'])) ? (int)$_GET['id'] : 0;
$productObject = new products();
$product = $productObject->getProduct($id);

if($productObject->deleteProduct($id)){

	// delete image 
	if(file_exists('../uploads/'.$product['image']))
		unlink('../uploads/'.$product['image']);
	header('LOCATION:products.php');
}else{
	$error = 'faild to delete product';

	include('../templates/admin/header.html');
	include('../templates/admin/menu.html');
	include('../templates/admin/resultmessages.html');
	include('../templates/admin/footer.html');
}

?>