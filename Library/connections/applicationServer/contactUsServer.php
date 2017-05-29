<?php
	function addContactUs($subject,$messageBody){
		global $database;
		$user = getUserByUsername($_SESSION['user']);
		$resultSet = mysqli_query($database,"INSERT INTO toadminmessage(subject,contentText,sendDate,userId) VALUES('{$subject}','{$messageBody}',NOW(),{$user['id']})");
	}

	function getAllContactUs(){
		global $database;
		$messages = array();
		$resultSet = mysqli_query($database,"SELECT * FROM toadminmessage");
		while($row = mysqli_fetch_assoc($resultSet)){
			$messages[] = $row;
		}
		return $messages;
	}

	function deleteMessage($messageId){
		global $database;
		mysqli_query($database,"DELETE FROM toadminmessage t WHERE t.id = {$messageId}");
		echo "DELETE FROM toadminmessage WHERE id = {$messageId}";
	}
?>