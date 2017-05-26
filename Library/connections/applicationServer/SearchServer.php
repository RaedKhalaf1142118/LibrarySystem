<?php
	function getBookByISBN($ISBN){
		global $database;
		$resultSet = mysqli_query($database,"SELECT * FROM book b WHERE b.ISBM = {$ISBN}");
		if($resultSet)
		return mysqli_fetch_assoc($resultSet);
	}

	function searchBooks($name,$authors,$publishers,$ISBN){
		global $database;
		$resultSet = mysqli_query($database,"SELECT * FROM book b WHERE b.name LIKE '%{$name}%' AND b.authors LIKE '%{$authors}%' AND b.publishers LIKE '%{$publishers}%' AND b.ISBN LIKE '%{$ISBN}%'");
		$books = array();
		while($result = mysqli_fetch_assoc($resultSet)){
			$books[] = $result;
		}
		return $books;
	}

	function getGenraName($ID){
		global $database;
		$resultSet = mysqli_query($database,"SELECT * FROM genre g where g.id = {$ID}");
		return mysqli_fetch_assoc($resultSet)['title'];
	}

?>