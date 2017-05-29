<?php 
	function addBookToDB($ISBN,$name,$authors,$publishers,$publishDate,$edition,$genre){
		global $database;
		$genreId = getGenreByName($genre)['id'];
		mysqli_query($database,"INSERT INTO book(ISBN,name,authors,publishers,publishDate,edition,disabled,genraId) VALUES ({$ISBN},'{$name}','{$authors}','{$publishers}','{$publishDate}',{$edition},false,{$genreId})");
	}

	function getBookById($id){
		global $database;
		$resultSet = mysqli_query($database,"SELECT * FROM book b WHERE b.ISBN = {$id}");
		return mysqli_fetch_assoc($resultSet);
	}
?>