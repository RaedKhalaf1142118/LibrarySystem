<?php 
	function addBookToDB($ISBN,$name,$authors,$publishers,$publishDate,$edition,$genre,$amount){
		global $database;
		$genreId = getGenreByName($genre)['id'];
		mysqli_query($database,"INSERT INTO book(ISBN,name,authors,publishers,publishDate,edition,disabled,genraId) VALUES ({$ISBN},'{$name}','{$authors}','{$publishers}','{$publishDate}',{$edition},false,{$genreId},{$amount})");
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

	function getBookCopyById($id){
		global $database;
		$resultSet = mysqli_query($database,"SELECT * FROM bookcopy b WHERE b.id = {$id}");
		return mysqli_fetch_assoc($resultSet);
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

	function getAllBorrowedBooks($user){
		global $database;
		$resultSet = mysqli_query($database,"SELECT * FROM borrows b WHERE b.userId = {$user['id']}");
		$bookCopies = array();
		while($row = mysqli_fetch_assoc($resultSet)){
			$bookCopies[] = getBookCopyById($row['bookcopyId']);
		}
		return $bookCopies;	
	}

	function borrowBook($ISBN,$user){
		global $database;
		$id = substr($ISBN,0,5)+substr($user['id'],0,5);
		mysqli_query($database,"INSERT INTO borrowingmessage(id,userID,BookID) VALUES ({$id},{$user['id']},{$ISBN})");
	}

	function getAllBorrowingMessages(){
		global $database;
		$resultSet = mysqli_query($database,"SELECT * FROM borrowingmessage m WHERE m.marked = 0");
		$borrowingMessages = array();
		while($row = mysqli_fetch_assoc($resultSet)){
			$borrowingMessages[] = $row;
		}
		return $borrowingMessages;
	}

	function getBorrowingMessage($id){
		global $database;
		return mysqli_fetch_assoc(mysqli_query($database,"SELECT * FROM borrowingmessage m WHERE m.id = {$id}"));
	}

	function setBorrowingMessageMarked($id){
		global $database;
		mysqli_query($database,"UPDATE borrowingmessage m SET m.marked = 1");
	}

	function markBorrowingMessage($borrowMessageID){
		global $database;
		setBorrowingMessageMarked($borrowMessageID);
		$borrowMessage = getBorrowingMessage($borrowMessageID);
		mysqli_query($database,"INSERT INTO bookcopy(borrowedDate,dueDate,id,bookId) VALUES (NOW(),'2020-1-1',$borrowMessageID,{$borrowMessage['BookID']})");
		mysqli_query($database,"INSERT INTO borrows(userId,bookcopyId) VALUES ({$borrowMessage['userID']},$borrowMessageID)");
		mysqli_query($database,"UPDATE book b SET b.amount = b.amount-1 WHERE b.ISBN = {$borrowMessage['BookID']}");
	}

	function returnBook($bookId,$user){
		global $database;
		$copy = getBookCopyById($bookId);
		mysqli_query($database,"DELETE FROM borrows WHERE userId = {$user['id']} AND bookcopyId = {$bookId}");
		echo "DELETE FROM borrows b WHERE b.userId = {$user['id']} AND b.bookcopyId = {$bookId}";
		mysqli_query($database,"UPDATE book b SET b.amount = b.amount+1 WHERE b.ISBN = {$copy['bookId']}");
	}
?>