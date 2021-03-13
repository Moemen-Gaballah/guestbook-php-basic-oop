<?php 

session_start();

require('../includes/config.php');
require('../includes/products.class.php');
require('../includes/general.functions.php');

if(!checkLogin())
	header('LOCATION:login.php');
	// exit('you are not allowed to view this page');

// logged in 
$productObject = new products();
$products = $productObject->getProducts();

include('../templates/admin/header.html');
include('../templates/admin/menu.html');
include('../templates/admin/all-products.html');
include('../templates/admin/footer.html');

?>