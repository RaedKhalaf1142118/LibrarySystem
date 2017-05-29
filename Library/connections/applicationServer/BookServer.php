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

	function removeBook($ISBN){
		global $database;
		mysqli_query($database , "DELETE FROM book WHERE ISBN = {$ISBN}");
	}

	function enableBook($ISBN){
		global $database;
		mysqli_query($database,"UPDATE book b SET b.disabled = 1 WHERE b.ISBN = {$ISBN}");
	}

	function disableBook($ISBN){
		global $database;
		mysqli_query($database,"UPDATE book b SET b.disabled = 0 WHERE b.ISBN = {$ISBN}");
	}

	function saveEditBookChanges($ISBN,$name,$authors,$publishers,$edition){
		global $database;
		mysqli_query($database,"UPDATE book b SET b.name = '{$name}', b.authors = '{$authors}' , b.publishers = '{$publishers}', b.edition = {$edition} WHERE b.ISBN = {$ISBN}");
	}

	function getCopySize($ISBN){
		global $database;
		$resultSet = mysqli_query($database,"SELECT * FROM bookcopy bc WHERE bc.bookId = {$ISBN}");
		$numberOfCopies = 0;
		while($result = mysqli_fetch_assoc($resultSet)){
			$numberOfCopies++;
		}
		return $numberOfCopies;
	}
	
	function getRatingForBook($ISBN){
		global $database;
		$resultSet = mysqli_query($database,"SELECT * FROM ratereview rr WHERE rr.bookId = {$ISBN}");
		$sumRate = 0;
		$counter = 0;
		while($row = mysqli_fetch_assoc($resultSet)){
			$sumRate = $row['rating'];
			$counter++;
		}
		if($counter!=0)
			return $sumRate/$counter;
		return 0;
	}
?>