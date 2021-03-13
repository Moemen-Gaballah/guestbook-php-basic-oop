<?php

class products
{
	private $connection;

	/**
	*
	* Create new connection
	*/
	public function __construct()
	{
		$this->connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	} // end of construct

	public function addProduct($title,$description,$image,$price,$available,$userId)
	{
		$this->connection->query("INSERT INTO `products`
			(`title`, `description`, `image`, `price`, `available`, `user_id`) 
			VALUE ('$title','$description', '$image', $price, $available, $userId)");

		if($this->connection->affected_rows >0)
			return true;
		echo $this->connection->error;
		return false;
	} // end of add product

	public function updateProduct($id,$title,$description,$image,$price,$available,$userId)
	{
		$this->connection->query("UPDATE `products` SET `title`='$title', `description`='$description', `image`='$image', `price`='$price', `available`='$available', `user_id`='$userId' WHERE `id`=$id");

		if($this->connection->affected_rows >0)
			return true;
		return false;
	} // 

	public function deleteProduct($id)
	{
		$this->connection->query("DELETE FROM `products` WHERE `id`=$id");
		if($this->connection->affected_rows >0)
			return true;
		return false;
	} // end of update product

	public function getProducts($extra = '')
	{
		$result = $this->connection->query("SELECT * FROM `products` $extra");

		if($result->num_rows > 0){
			$products = array();
			while ($row =  $result->fetch_assoc()) {
				$products[] = $row;
			}
			return $products;
		}
		return null;
	} // end of gat all products

	public function getProduct($id)
	{
		$products = $this->getProducts("WHERE `id`=$id");
		if($products && count($products)>0)
			return $products[0];
		return null;
	} // end of get product

	public function searchProduct($keyword)
	{
		return $this->getProducts("WHERE `title` LIKE '%$keyword%'");
	} // end of search product

	/**
	*	close connection
	*/
	public function __destruct()
	{
		$this->connection->close();
	}
}