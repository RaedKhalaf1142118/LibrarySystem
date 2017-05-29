<?php
	function displayContactUs(){
		if(isset($_SESSION['user'])){
			if(isset($_POST['subject'])){
				$subject = $_POST['subject'];
				$messageBody = $_POST['messageBody'];
				addContactUs($subject,$messageBody);
				header("Refresh:0 ; url=index.php?display=search");
			}else{
				displayContactUsForm();
			}
		}else{
			header("Refresh:0 ; url=index.php?display=login");
		}
	}

	function displayContactUsForm(){
		?>
		<div class="contact-us-container">
			<div class="contact-us-form-container">
				<form class="contact-us-form" action="index.php?display=contactUs" method="POST">
					<h3>Contact us</h3>
					<table>
						<tr>
							<td>
								<label>
									Subject
								</label>
							</td>
							<td>
								<input type="text" name="subject" required>
							</td>
						</tr>
						<tr>
							<td>
								<label>
									Message Body
								</label>
							</td>
							<td>
								<textarea name="messageBody" required placeholder="Message body">
									
								</textarea>
							</td>
						</tr>
					</table>
					<input type="submit" name="submit" value="send" class="btn submit-btn green-btn">
				</form>
			</div>
		</div>
		<?php
	}
?>