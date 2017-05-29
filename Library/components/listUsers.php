<?php
	function displayUsers(){
		if(isset($_SESSION['admin'])){
			$users = getAllUsers();
			displayAllUsers($users);
		}else{
			header("Refresh:0 ; url=index.php?display=search");
		}
	}

	function displayAllUsers($users){
		?>
			<div class="allUsers-container">
				<div class="allUsers-table-container">
					<table class="allUsers-table">
						<thead>
							<td>
								ID
							</td>
							<td>
								Name
							</td>
							<td>
								Email
							</td>
							<td>
								Date Of Birth
							</td>
							<td>
								Address
							</td>
							<td>
								Telephone
							</td>
							<td>
								Type
							</td>
						</thead>
						<tbody>
							<?php
							foreach ($users as $user) {
								?>
								<tr>
									<td>
										<?php echo $user['id']; ?>
									</td>
									<td>
										<?php echo $user['fullName']; ?>
									</td>
									<td>
										<?php echo $user['email']; ?>
									</td>
									<td>
										<?php echo $user['dateOfBirth']; ?>
									</td>
									<td>
										<?php echo $user['address']; ?>
									</td>
									<td>
										<?php echo $user['phoneNumber']; ?>
									</td>
									<td>
										<?php 
											if($user['isFeasible']==0){
												echo "Non-Feasible";
											}else if($user['isFeasible'] == 1){
												echo "Feasible";
											}else{
												echo "Premium";
											}
										 ?>
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