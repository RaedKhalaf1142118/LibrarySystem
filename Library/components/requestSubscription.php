<?php 
	function displayRequestSubscription(){
		if(isset($_SESSION['user'])){
			if(isset($_GET['confirmSubScription'])){
				$user = getUserByUsername($_SESSION['user']);
				setUserToPremium($user);
				header("Refresh:0 ; url=index.php?display=search");
			}
			?>
			<div class="request-subscription-container">
				<div class="request-subscription-form-container">
					<div class="request-subscription-form">
						<h3>Request subscription</h3>
						<p>
							This subscription will allow the customers to view 100% of the book's softcopy<br>
							the customer will pay monthly subscription to be able to open soft
							copies of the<br> books online (full pages) with a set of essential time-saving
							features and tools such<br> as bookmarking pages. 
						</p>
					</div>
					<a href="index.php?display=requestSubscription&confirmSubScription=true">
						<div class="request-subscription-confermation">
							Click here to confirm the subscription
						</div>
					</a>
				</div>
			</div>
			<?php
		}else{
			header("Refresh:0 ; url=index.php?display=search");
		}
	}
?>