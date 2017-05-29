<?php
	function displayBorrowingMessages(){
		if(isset($_GET['mark'])){
			$borrowMessageID = $_GET['mark'];
			markBorrowingMessage($borrowMessageID);	
		}
		$borrowingMessages = getAllBorrowingMessages();
		?>
			<div class="borrowing-messages-container">
				<div class="isset($_SESSION['deliverMan'])">
					<table class="allUsers-table">
						<thead>
							<td>
								<label>
									User ID
								</label>
							</td>
							<td>
								<label>
									Book ID
								</label>
							</td>
							<td>
								Mark
							</td>
						</thead>
						<tbody>
							<?php 
							foreach ($borrowingMessages as $borrowMessage) {
								?>
								<tr>
									<td>
										<label>
											<?php 
												echo $borrowMessage['userID'];
											?>
										</label>
									</td>
									<td>
										<label>
											<?php
												echo $borrowMessage['BookID'];
											?>	
										</label>
									</td>
									<td>
										<a href="index.php?display=borrowingMessages&mark=<?php echo $borrowMessage['id']; ?>">
											Handle it
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