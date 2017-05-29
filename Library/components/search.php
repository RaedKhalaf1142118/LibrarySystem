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
			echo "<tr>";
			echo "<td>".$book['ISBN']."</td>";
			echo "<td>".$book['name']."</td>";
			echo "<td>".$book['authors']."</td>";
			echo "<td>".$book['publishers']."</td>";
			echo "<td>".$book['publishDate']."</td>";
			echo "<td>".$book['edition']."</td>";
			echo "<td>".$book['disabled']."</td>";
			echo "<td>".getGenraName($book['genraId'])."</td>";
			echo "</tr>";
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