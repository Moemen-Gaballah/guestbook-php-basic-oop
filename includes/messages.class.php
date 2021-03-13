<?php 

class messages 
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

	public function addMessage($title,$content,$name,$email)
	{
		$this->connection->query("INSERT INTO `messages`
			(`title`, `content`, `name`, `email`) 
			VALUE ('$title','$content', '$name', '$email')");

		if($this->connection->affected_rows >0)
			return true;
		echo $this->connection->error;
		return false;
	} // end of add messages

	public function updateMessage($id, $title,$content,$name,$email)
	{
		$this->connection->query("UPDATE `messages` SET `title`='$title',`content`='$content',`name`='$name',`email`='$email' WHERE `id`='$id'");

		if($this->connection->affected_rows >0)
			return true;
		echo $this->connection->error;
		return false;
	} // end of update messages

	public function deleteMessage($id)
	{
		$this->connection->query("DELETE FROM `messages` WHERE `id`=$id");
		if($this->connection->affected_rows >0)
			return true;
		echo $this->connection->error;
		return false;
	} // end of delete Messages

	public function getMessages($extra='')
	{
		$result = $this->connection->query("SELECT * FROM `messages` $extra");
		if($result->num_rows>0)
		{
			$messages = array();

			while($row = $result->fetch_assoc())
			{
				$messages[] = $row;
			}
			return $messages;
		}
		return null;
	} // end of get all messages

	public function getMessage($id)
	{
		$messages = $this->getMessages("WHERE `id`=$id");
		if($messages && count($messages)>0)
			return $messages[0];
		return null;
	}

	/**
	*	close connection
	*/
	public function __destruct()
	{
		$this->connection->close();
	}


}