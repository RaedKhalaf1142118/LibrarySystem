<?php
	function displayUserMessages(){
		if(isset($_SESSION['admin'])){
			if(isset($_GET['deleteMessage'])){
				$messageId = $_GET['deleteMessage'];
				deleteMessage($messageId);
			}
			$messages = getAllContactUs();
		}else{
			if(isset($_SESSION['user'])){
				header("Refresh:0;url=index.php?display=search");
			}else{
				header("Refresh:0;url=index.php?display=login");
			}
		}
		?>
			<div class="messages-container">
				<div class="messages">
					<?php
						foreach ($messages as $message) {
							$from = getUserById($message['userId']);
							?>
							<div class="message-container">
								<fieldset>
									<legend>Message:<?php echo $message['subject'] ;?></legend>
									<h3>From : <?php  echo $from['fullName']; ?></h3>
									<p>
										MessageBody:<br>
										<?php echo $message['contentText']; ?>
									</p>
									<a href="index.php?display=viewContactUs&deleteMessage=<?php echo $message['id']; ?>">
										Delete Message
									</a>
								</fieldset>
							</div>
							<?php
						}
					?>
				</div>
			</div>
		<?php
	}
?>