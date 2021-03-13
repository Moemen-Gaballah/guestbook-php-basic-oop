<?php 

include('includes/config.php');
include('includes/products.class.php');
$selected = 'products';
include('templates/front/header.html');


$productsObject = new products(); 
$productId = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$product = $productsObject->getProduct($productId);

if($product && count($product) > 0){
	include('templates/front/product-info.html');
}else{
	include('templates/front/404.html');
}

include('templates/front/footer.html');