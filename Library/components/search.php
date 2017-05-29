<?php
	
	$name;
	$authors;
	$publishers;
	$ISBN;

	function displaySearchResultTable(){
		displaySearchTableHeader();
		displayTableResultSet();
		displaySearchTableFooter();
	}
	function displaySearchTableFooter(){
		echo "</table>";
	}
	function displaySearchTableHeader(){
		?>
			<table class='result-table'>
				<thead>
					<th>ISBN</th>
					<th>Name</th>
					<th>Authors</th>
					<th>publishers</th>
					<th>publishDate</th>
					<th>Edition</th>
					<th>disabled</th>
					<th>genra</th>
				</thead>
		<?php
	}

	function displayTableResultSet(){
		global $name,$authors,$publishers,$ISBN;
		if(isset($_POST['name'])){
			$books = searchBooks($name,$authors,$publishers,$ISBN);
			displayRows($books);
		}
	}

	function displayRows($books){
		foreach ($books as $book) {
			?>	
				<tr>
					<td>
						<a href="index.php?display=bookDescription&id=<?php echo $book['ISBN'] ?>">
							<?php echo $book['ISBN']; ?>
						</a>
					</td>
					<td>
						<?php echo $book['name']; ?>
					</td>
					<td>
						<?php echo $book['authors']; ?>
					</td>
					<td>
						<?php echo $book['publishers']; ?>
					</td>
					<td>
						<?php echo $book['publishDate'] ?>
					</td>
					<td>
						<?php echo $book['edition'] ?>
					</td>
					<td>
						<?php echo $book['disabled']==0?"enabled":"disabled"  ?>
					</td>
					<td>
						<?php echo getGenraName($book['genraId'])?>
					</td>
				</tr>
			<?php 
		}
	}

	function displayEmptyRow(){
		?>
		<tr>
			<td>Empty</td>
			<td>Empty</td>
			<td>Empty</td>
			<td>Empty</td>
			<td>Empty</td>
			<td>Empty</td>
		</tr>

		<?php
	}
	function displaySearch(){
		if(!(isset($_SESSION['admin']) || isset($_SESSION['user'])))
			header("Refresh:0;url=index.php?display=login");
		global $name,$authors,$publishers,$ISBN;
		if(isset($_POST['name'])){
			$name = $_POST['name'];
			$authors = $_POST['authors'];
			$publishers = $_POST['publishers'];
			$ISBN = $_POST['ISBN'];
		}
	?>	
		<div class="search-container">
			<div class="search-tools">
				<div class="search-form-container">
					<form action="index.php?display=search" method="POST" >
						<table>
							<tr>
								<td>
									<label>Name</label>
								</td>
								<td>
									<input type="text" name="name" value="<?php echo $name; ?>">
								</td>
							</tr>
							<tr>
								<td>
									<label>Authors</label>
								</td>
								<td>
									<input type="text" name="authors" value="<?php echo $authors ?>">
								</td>
							</tr>
							<tr>
								<td>
									<label>publishers</label>
								</td>
								<td>
									<input type="text" name="publishers" value="<?php echo $publishers ?>">
								</td>
							</tr>
							<tr>
								<td>
									<label>ISBN</label>
								</td>
								<td>
									<input type="number" name="ISBN" value="<?php echo $ISBN ?>">
								</td>
							</tr>
							<tr>
								<td></td>
								<td>
									<input type="submit" name="submit" value="searh"> 
								</td>
							</tr>
						</table>
					</form>
				</div>
			</div>
			<div class="search-result-set">
				<?php 
					displaySearchResultTable();
				?>
			</div>
		</div>
	<?php
	}	
?> 