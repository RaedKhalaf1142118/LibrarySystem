<?php
	function dataBaseDeliverLogin($username,$password){
		global $database;
		$resultSet = mysqli_query($database,"SELECT * FROM deliveryman m WHERE m.username = '{$username}' AND m.password = '{$password}'");
		return $resultSet;
	}
?> 	