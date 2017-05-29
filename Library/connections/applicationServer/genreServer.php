<?php 
	function getAllGenres(){
		global $database;
		$genres = array();
		$resultSet = mysqli_query($database , "SELECT * FROM genre");
		while($row = mysqli_fetch_assoc($resultSet)){
			$genres[] = $row;
		}
		return $genres;
	}

	function getGenreByName($name){
		global $database;
		$resultSet = mysqli_query($database,"SELECT * FROM genre g WHERE g.title = '{$name}'");
		return mysqli_fetch_assoc($resultSet);
	}

	function getGenraById($id){
		global $database;
		$resultSet = mysqli_query($database,"SELECT * FROM genre g WHERE g.id = '{$id}'");
		return mysqli_fetch_assoc($resultSet);
	}
?>