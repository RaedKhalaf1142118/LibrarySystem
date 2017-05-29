<?php
	function getUserByUsername($username){
		global $database;
		$resultSet = mysqli_query($database,"SELECT * FROM account a WHERE a.username = '{$username}'");
		$accountNumber = mysqli_fetch_assoc($resultSet)['accountNumber'];
		$resultSet = mysqli_query($database,"SELECT * FROM systemuser s WHERE s.accountId =  {$accountNumber}");
		return  mysqli_fetch_assoc($resultSet);
	}

	function getAccountByUsername($username){
		global $database;
		$resultSet = mysqli_query($database,"SELECT * FROM account a WHERE a.username = '{$username}'");	
		return mysqli_fetch_assoc($resultSet);
	}

	function isFeasibleAccount($username){
		return getUserByUsername($username)['isFeasible'] == 1;
	}

	function getUserById($id){
		global $database;
		$resultSet = mysqli_query($database,"SELECT * FROM systemuser s WHERE s.id = {$id}");
		return mysqli_fetch_assoc($resultSet);
	}
?>