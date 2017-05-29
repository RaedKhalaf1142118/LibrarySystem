<?php
	function displayAddBook(){
		if(isset($_SESSION['admin'])){
			if(isset($_POST['ISBN'])){
				$ISBN = $_POST['ISBN'];
				$name = $_POST['name'];
				$authors = $_POST['authors'];
				$publishers = $_POST['publishers'];
				$publishDate = $_POST['publishDate'];
				$edition = $_POST['edition'];
				$genre = $_POST['genre'];
				addBookToDB($ISBN,$name,$authors,$publishers,$publishDate,$edition,$genre);
				header("Refresh:0 ; url=index.php?display=search");
			}else
				displayAddBookForm();
		}else{
			if(isset($_SESSION['user']))
				header("Refresh:0 ; url=index.php?display=search");
			else
				header("Refresh:0 ; url=index.php?display=login");
		}
	}

	function displayAddBookForm(){
		?>
			<div class="add-book-container">
				<div class="add-book-form-container">
					<form action="index.php?display=addBook" method="POST" class="add-book-form">
						<h3>Add Book</h3>
						<table>
							<tr>
								<td>
									<label>ISBN</label>
								</td>
								<td>
									<input type="number" name="ISBN" required>
								</td>
							</tr>
							<tr>
								<td>
									<label>Name</label>
								</td>
								<td>
									<input type="text" name="name" required>
								</td>
							</tr>
							<tr>
								<td>
									<label>Authors</label>
								</td>
								<td>
									<input type="text" name="authors" required>
								</td>
							</tr>
							<tr>
								<td>
									<label>Publishers</label>
								</td>
								<td>
									<input type="text" name="publishers" required>
								</td>
							</tr>
							<tr>
								<td>
									<label>publish Date</label>
								</td>
								<td>
									<input type="date" name="publishDate" required>
								</td>
							</tr>
							<tr>
								<td>
									<label>Edition</label>
								</td>
								<td>
									<input type="number" name="edition" required>
								</td>
							</tr>
							<tr>
								<td>
									<label>Genra</label>
								</td>
								<td>
									<select name="genre" required>
										<?php 
											$genres = getAllGenres();
											foreach ($genres as $genre) {
												echo "<option> {$genre['title']} </option>";
											}
										 ?>
									</select>
								</td>
							</tr>
							<tr class="submit-row">
								<td></td>
								<td>
									<input type="submit" name="submit" value="add Book" class="btn submit-btn green-btn">
								</td>
							</tr>
						</table>
					</form>
				</div>
			</div>
		<?php
	}
?>