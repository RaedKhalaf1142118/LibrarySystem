<?php
	function registerAccount($name,$username,$password,$address,$birthDate,$email,$telephone,$accountID,$bankID,$creditCard,$bankName){
		global $database;
		$randomID = generateProductID();	
		mysqli_query($database,"INSERT INTO account(accountNumber , username, password) VALUES ($accountID,'{$username}','{$password}')");
		mysqli_query($database,"INSERT INTO bankaccount(accountNumber,creditCardNumber,bankName) VALUES ({$bankID},{$creditCard},'{$bankName}')");
		mysqli_query($database,"INSERT INTO systemuser(id,fullName,email,dateOfBirth,address,phoneNumber,accountId,bankAccountID,isFeasible) VALUES ({$randomID},'{$name}','{$email}','{$birthDate}','{$address}','{$telephone}',{$accountID},{$bankID},1)") ;
		echo "INSERT INTO systemuser(id,fullName,email,dateOfBirth,address,phoneNumber,accountId,bankAccountID) VALUES ({$randomID},'{$name}','{$email}','{$birthDate}','{$address}','{$telephone}',{$accountID},{$bankID})";
	}	

	function generateProductID(){
		$random1 = rand(0,9);
		$random2 = rand(0,9);
		$random3 = rand(0,9);
		$random4 = rand(0,9);
		$random5 = rand(0,9);
		$random6 = rand(0,9);
	
		$random = "".$random1.$random2.$random3.$random4.$random5.$random6.$random6;
		$product = getBookByISBN($random);
		if($product){
			return generateProductID;
		}else{
			return $random;
		}
	}
?>