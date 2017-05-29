<?php 
	function displayBookDescription(){
		if(isset($_SESSION['admin']) || isset($_SESSION['user'])){
			if(isset($_POST['rate'])){
				$rate = $_POST['rate'];
				$review = $_POST['review'];
				addRateReviewToDB($rate,$review,getUserByUsername($_SESSION['user']),$_GET['id']);
			}
			if(isset($_GET['id'])){
				$id = $_GET['id'];
				$book = getBookById($id);
				displayBookDescriptionView($book);
			}else{
				header("Refresh:0;url=index.php?display=search");
			}
		}else{
			header("Refresh:0;url=index.php?display=search");
		}
	}

	function displayBookDescriptionView($book){
		?>
			<div class="book-description-container">
				<div class="book-description">
					<div class="book-information">
						<div class="book-title">
							<h2><?php echo $book['name']; ?> <h3>Authors : <?php echo $book['authors']; ?></h3></h2>
						</div>
						<div class="book-img-container">
							<img src="resources/book.gif" class="book-img">
							<table class="book-des-table">
								<tr>
									<td>
										<label>Edition : <?php echo $book['edition']; ?></label>
									</td>
								</tr>
								<tr>
									<td>
										<label> Publishers : <?php echo $book['publishers']; ?></label>
									</td>
								</tr>
								<tr>
									<td>
										<label> Genra : <?php echo getGenraById($book['genraId'])['title'] ?></label>
									</td>
								</tr>
								<tr>
									<td>
										<label>ISBN : <?php echo $book['ISBN']; ?></label>
									</td>
								</tr>
							</table>
						</div>
						<div class="book-description-operations">
							<ul>
								<?php 
									if(isset($_SESSION['admin'])){
										?>
										<a href="index.php?display=EditBook&id=<?php echo $book['ISBN']; ?>">
											<li>
												Edit Book
											</li>
										</a>
										<a href="index.php?display=bookDescription&id=<?php echo $book['ISBN']; ?>&removeBook=true">
											<li>
												Remove Book
											</li>
										</a>
										<?php
										if($book['disabled'] == 0){
											?>
											<a href="index.php?display=bookDescription&id=<?php echo $book['ISBN']; ?>&DisableBook=true">
												<li>
													Disable
												</li>
											</a>
											<?php
										}else{
											?>
											<a href="index.php?display=bookDescription&id=<?php echo $book['ISBN']; ?>&EnsableBook=true">
												<li>
													Enable
												</li>
											</a>
											<?php
										}
									}else{
										?>
											<a href="index.php?display=softCopy&id=<?php echo $book['ISBN']; ?>">
												<li>
													Open SoftCopy
												</li>
											</a>
											<a href="index.php?display=bookDescription&id=<?php echo $book['ISBN']; ?>"">
												<li>
													Borrow Book
												</li>
											</a>
										<?php
									}
								?>
							</ul>
						</div>
					</div>
					<div class="rate-review-book-des">
						<hr>
						<h3>Rate & Review</h3>
						<div class="reviews-container">
							<!-- Add The Reviews From the DB -->
							<?php
								$ratesReviews = getAllRatesReviews($book['ISBN']);
								foreach ($ratesReviews as $rate) {
									?>
									<fieldset>
										<legend>By : <?php echo getUserById($rate['userId'])['fullName'] ?></legend>
										<table>
											<tr>
												<td>
													<label>
														Rate : 
													</label>
												</td>
												<td>
													<?php echo  $rate['rating']; ?>
												</td>
											</tr>
											<tr>
												<td>
													<label>Review :</label>
												</td>
												<td>
													<p>
														<?php echo $rate['review'] ?>
													</p>
												</td>
											</tr>
										</table>
									</fieldset>
									<?php
								}
							?>
							<!-- End The Review -->
							<?php
							if(isset($_SESSION['user'])){
							?>
							<div class="add-review-rate">
								<form action="index.php?display=bookDescription&id=<?php echo $book['ISBN']?>" method="POST">
									<table>
										<tr>
											<td>
												<label>
													Rate
												</label>
											</td>
											<td>
												<input class="review-form-control" type="number" name="rate" min="0" max="5">
											</td>
										</tr>
										<tr>
											<td>
												<label>
													Review
												</label>
											</td>
											<td>
												<textarea class="review-form-control" name="review">
													Write Your Review Here
												</textarea>
											</td>
										</tr>
										<tr>
											<td></td>
											<td>
												<input type="submit" name="submit" class="green-btn review-submit-btn" value="Rate">
											</td>
										</tr>
									</table>
								</form>
							</div>
							<?php 
							}
							?>
						</div>
					</div>
				</div>
			</div>
		<?php
	}
?>