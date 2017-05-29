<?php
	
	function displayEditAccount(){
		if(isset($_SESSION['user'])){
			if(isset($_POST['name'])){
				$name =$_POST['name'];
				$password = $_POST['password'];
				$address = $_POST['address'];
				$birthDate = $_POST['birthDate'];
				$email = $_POST['email'];
				$telephone = $_POST['telephone'];
				saveEditInformation($name,$_SESSION['user'],$password,$address,$birthDate,$email,$telephone);
				//header("Refresh:0 , url=index.php?display=search");
			}else{
				$user = getUserByUsername($_SESSION['user']);
				$account = getAccountByUsername($_SESSION['user']);
				displayEditAccountForm($user,$account);
			}
		}else{
			header("Refresh:0 ; url=index.php?display=login");
		}
	}

	function displayEditAccountForm($user,$account){
		?>
		<div class="customer-registeration-container">
			<div class='register-form-container'>
				<form class='customer-registeration-form' action="index.php?display=editAccountInformation" method="POST">
					<h3>Register</h3>
					<table>
						<tr>
							<td>
								<label>Name</label>
								<input id="name" placeholder="Full-Name" type="text" name="name" required value="<?php echo $user['fullName']; ?>">
							</td>
						</tr>
						<tr>
							<td>
								<label>Username</label>
								<input id="UsernameField" placeholder="Username" type="text" name="username" required value="<?php echo $account['username']; ?>">
							</td>
						</tr>
						<tr>
							<td>
								<label>Password</label>
								<input id="password" placeholder="password" type="password" name="password" required>
							</td>
						</tr>
						<tr>
							<td>
								<label>Address</label>
								<input id="address" placeholder="Address" type="Address" name="address" required value="<?php echo $user['address']; ?>">
							</td>
						</tr>
						<tr>
							<td>
								<label>Birth Date</label>
								<input id="birthDate" placeholder="Date Of Birth" type="date" name="birthDate" required value="<?php echo $user['birthDate']; ?>">
							</td>
						</tr>
						<tr>
							<td>
								<label>Email</label>
								<input id="email" placeholder="Email" type="email" name="email" required value="<?php echo $user['email']; ?>">
							</td>
						</tr>
						<tr>
							<td>
								<label>Telephone</label>
								<input id="telephone" placeholder="Telephone" type="text" name="telephone" required value="<?php echo $user['phoneNumber']; ?>">
							</td>
						</tr>
						<tr>
							<td>
								<input id="submit" class="submit-btn btn green-btn" type="submit" name="submit" value='Save Changes'>
							</td>
						</tr>
					</table>
				</form>
			</div>
		</div>
		<?php
	}
?>