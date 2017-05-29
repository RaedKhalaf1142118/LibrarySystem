<?php
	function saveEditInformation($name,$username,$password,$address,$birthDate,$email,$telephone){
		global $database;
		$isFeasible = 0;
		if(empty($name) || empty($username) || empty($address) || empty($birthDate) || empty($email) || empty($telephone)){
			echo "RAED";
			$isFeasible = 0;
		}else{
			$isFeasible = 1;
		}
		mysqli_query($database,"UPDATE account a SET a.username = '{$username}' , a.password = '{$password}'");
		mysqli_query($database,"UPDATE systemuser s SET s.fullName = '{$name}' , s.address = '{$address}' , s.dateOfBirth = '{$birthDate}' , s.email = '{$email}' , s.phoneNumber = '{$telephone}' , s.isFeasible = {$isFeasible}");
	}
?>