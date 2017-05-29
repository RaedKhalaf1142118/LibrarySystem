<?php
	function displayAllBorrows(){
		if(isset($_SESSION['user'])){
			$user = getUserByUsername($_SESSION['user']);
			if(isset($_GET['return'])){
				$bookId = $_GET['return'];
				returnBook($bookId,$user);
				//header("Refresh:0 ; url=index.php?display=search");
			}
			$books = getAllBorrowedBooks($user);
			displayBooks($books);
		}else{
			header("Refresh:0 ; url=index.php?display=search");
		}
	}

	function displayBooks($bookCopies){
		?>
			<div class="book-list-container">
				<div class="book-list-table">
					<table class="book-table">
						<thead>
							<td>
								<label>ISBN</label>
							</td>
							<td>
								<label>Name</label>
							</td>
							<td>
								<label>
									Genre
								</label>
							</td>
							<td>
								<label>
									From Date
								</label>
							</td>
							<td>
								<label>
									To Date
								</label>
							</td>
							<td>
								<label>
									Return
								</label>
							</td>
						</thead>
						<tbody>
							<?php
								foreach ($bookCopies as $bookCopy) {
									$book = getBookById($bookCopy['bookId']);
									?>
									<tr>
										<td>
											<label>
												<?php echo $book['ISBN']; ?>
											</label>
										</td>
										<td>
											<label>
												<?php echo $book['name']; ?>
											</label>
										</td>
										<td>
											<label>
												<?php echo getGenraById($book['genraId'])['title']; ?>
											</label>
										</td>
										<td>
											<label>
												<?php echo $bookCopy['borrowedDate']; ?>
											</label>	
										</td>
										<td>
											<label>
												<?php echo $bookCopy['dueDate']; ?>
											</label>	
										</td>
										<td>
											<a href="index.php?display=viewBorrows&return=<?php echo $bookCopy['id']; ?>">
												Return Book
											</a>
										</td>
									</tr>
									<?php
								}
							?>
						</tbody>
					</table>
				</div>
			</div>
		<?php
	}
?>