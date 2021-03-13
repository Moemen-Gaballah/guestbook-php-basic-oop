<?php

class users
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

	/**
	*
	*	add new user
	*/
	public function addUser($username, $password, $email)
	{
		$this->connection->query("INSERT INTO `users`(`username`, `password`, `email`) VALUE ('$username','$password', '$email')");

		if($this->connection->affected_rows >0)
			return true;
		return false;
	}// end of addUser

	/**
	*
	*	add new user
	*/
	public function updateUser($id, $username, $password, $email)
	{
		$sql = "UPDATE `users` SET";

		if(strlen($username) > 0)
			$sql .= "`username`='$username'";

		if(strlen($password) > 0)
			$sql .= ",`password`='$password'";
		
		if(strlen($email) > 0)
			$sql .= ",`email`='$email'"; // edit if first value email remove ",";

		$sql .= " WHERE `id`=$id";

		// exit($sql);
		$this->connection->query($sql);

		if($this->connection->affected_rows >0){
			return true;
		}else{
			// echo $sql . "<pre>";
			// echo $this->connection->error;
			return false;
		}
		// return $this->connection->error;
		// return false;
	} // end of updateUser

	public function deleteUser($id)
	{
		$this->connection->query("DELETE FROM `users` WHERE `id`=$id");
		if($this->connection->affected_rows >0)
			return true;
		return false;
	}// end of delete user

	/**
	* Get all users
	* return array | null;
	*/
	public function getUsers($extra = '')
	{
		$result = $this->connection->query("SELECT * FROM `users` $extra");

		if($result->num_rows > 0){
			$users = array();
			while ($row =  $result->fetch_assoc()) {
				$users[] = $row;
			}
			return $users;
		}
		return null;
	} // end of get users

	/**
	*
	*	get user by id
	*/
	public function getUser($id)
	{
		$users = $this->getUsers("WHERE `id`=$id");
		if($users && count($users)>0)
			return $users[0];
		return null;
	} // end of getuser

	public function login($username, $password)
	{	
		$users = $this->getUsers("WHERE `username`='$username' AND `password`='$password'");
		if($users && count($users) > 0)
			return $users[0];
		return null;
	} // end of login

	/**
	*	close connection
	*/
	public function __destruct()
	{
		$this->connection->close();
	}

}