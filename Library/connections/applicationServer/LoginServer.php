<?php
	function dataBaseAccountLogin($username,$password){
		global $database;
		$resultSet = mysqli_query($database, "SELECT * FROM account a WHERE a.username = '{$username}' AND a.password = '{$password}'");
		return $resultSet;
	}

	function dataBaseAdminLogin($username,$password){
		global $database;
		$resultSet = mysqli_query($database, "SELECT * FROM admin a WHERE a.username = '{$username}' AND a.password = '{$password}'");
		return $resultSet;
	}
?>