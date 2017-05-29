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
		$user = getUserByUsername($username);
		return $user['isFeasible'] == 1 || $user['isFeasible'] == 2;
	}

	function isPremiumAccount($username){
		$user = getUserByUsername($username);
		return $user['isFeasible'] == 2;
	}

	function getUserById($id){
		global $database;
		$resultSet = mysqli_query($database,"SELECT * FROM systemuser s WHERE s.id = {$id}");
		return mysqli_fetch_assoc($resultSet);
	}

	function getAllUsers(){
		global $database;
		$resultSet = mysqli_query($database,"SELECT * FROM systemuser");
		$users = array();
		while($row = mysqli_fetch_assoc($resultSet)){
			$users[] = $row;
		}
		return $users;
	}

	function setUserToPremium($user){
		global $database;
		mysqli_query($database,"UPDATE systemuser s SET s.isFeasible = 2 WHERE s.id = {$user['id']}");
	}
?>