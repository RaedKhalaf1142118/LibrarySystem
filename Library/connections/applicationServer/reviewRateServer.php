<?php 
	function addRateReviewToDB($rate,$review,$user,$ISBN){
		global $database;
		mysqli_query($database,"INSERT INTO ratereview(rating,review,userId,bookId) VALUES ({$rate},'{$review}',{$user['id']},{$ISBN})");
	}

	function getRateReview($user,$ISBN){
		global $database;
		return mysqli_query($database,"SELECT * FROM ratereview WHERE userId = {$user['id']} AND bookId = {$ISBN}");
	}

	function getAllRatesReviews($ISBN){
		global $database;
		$rates = array();
		$resultSet = mysqli_query($database,"SELECT * FROM ratereview WHERE bookId = {$ISBN}");
		while($row = mysqli_fetch_assoc($resultSet)){
			$rates[] = $row;
		}
		return $rates;
	}
?>