<?php
	function displayEditBook(){
		if(isset($_SESSION['admin'])){
			$id = $_GET['id'];		 
			$book = getBookById($id);
			if(isset($_POST['name'])){
				$name = $_POST['name'];
				$authors = $_POST['authors'];
				$publishers = $_POST['publishers'];
				$edition = $_POST['edition'];
				saveEditBookChanges($book['ISBN'],$name,$authors,$publishers,$edition);
				header("Refresh:0 ; url=index.php?display=search");
			}else
				showEditForm($book);
		}else
			header("Refresh:0 ; url=index.php?display=search");
	}

	function showEditForm($book){
		?>
			<div class="add-book-container">
				<div class="add-book-form-container">
					<form action="index.php?display=EditBook&id=<?php echo $book['ISBN']; ?>" method="POST" class="add-book-form">
						<h3>Edit Book</h3>
						<table>
							<tr>
								<td>
									<label>Name</label>
								</td>
								<td>
									<input type="text" name="name" required value="<?php echo $book['name']; ?>">
								</td>
							</tr>
							<tr>
								<td>
									<label>Authors</label>
								</td>
								<td>
									<input type="text" name="authors" required value="<?php echo $book['authors']; ?>">
								</td>
							</tr>
							<tr>
								<td>
									<label>Publishers</label>
								</td>
								<td>
									<input type="text" name="publishers" required value="<?php echo $book['publishers']; ?>">
								</td>
							</tr>
							<tr>
								<td>
									<label>Edition</label>
								</td>
								<td>
									<input type="number" name="edition" required value="<?php echo $book['edition']; ?>">
								</td>
							</tr>
							<tr class="submit-row">
								<td></td>
								<td>
									<input type="submit" name="submit" value="Save changes" class="btn submit-btn green-btn">
								</td>
							</tr>
						</table>
					</form>
				</div>
			</div>
		<?php
	}
?>