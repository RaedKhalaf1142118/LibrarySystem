<?php
	
	function displayRegister(){
		if(isset($_POST['name'])){
			$name =$_POST['name'];
			$username = $_POST['username'];
			$password = $_POST['password'];
			$address = $_POST['address'];
			$birthDate = $_POST['birthDate'];
			$email = $_POST['email'];
			$telephone = $_POST['telephone'];
			$bankID = $_POST['Bank-AccountID'];
			$accountID = $_POST['accountID'];
			$creditCard = $_POST['creditCard'];
			$bankName = $_POST['BankName'];
			registerAccount($name,$username,$password,$address,$birthDate,$email,$telephone,$bankID,$accountID,$creditCard,$bankName);
			$_SESSION['user'] = $username;
			header("Refresh:0 ; index.php?display=search");
		}else{
			displayRegisterForm();
		}
	}
	function displayRegisterForm(){
		?>
		<div class="customer-registeration-container">
			<div class='register-form-container'>
				<form class='customer-registeration-form' action="index.php?display=register" method="POST" onkeyup="validateRegisterForm()">
					<h3>Register</h3>
					<table>
						<tr>
							<td>
								<label>Name</label>
								<input id="name" placeholder="Full-Name" type="text" name="name" required>
							</td>
						</tr>
						<tr>
							<td>
								<label>Username</label>
								<input id="UsernameField" placeholder="Username" type="text" name="username" required>
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
								<input id="address" placeholder="Address" type="Address" name="address" required>
							</td>
						</tr>
						<tr>
							<td>
								<label>Birth Date</label>
								<input id="birthDate" placeholder="Date Of Birth" type="date" name="birthDate" required>
							</td>
						</tr>
						<tr>
							<td>
								<label>Email</label>
								<input id="email" placeholder="Email" type="email" name="email" required>
							</td>
						</tr>
						<tr>
							<td>
								<label>Telephone</label>
								<input id="telephone" placeholder="Telephone" type="text" name="telephone" required>
							</td>
						</tr>
						<tr>
							<td>
								<label>Account ID</label>
								<input id="accountID" placeholder="accountID" type="number" name="accountID" required>
							</td>
						</tr>
						<tr>
							<td>
								<label>Bank AccountID</label>
								<input id="Bank-AccountID" placeholder="Bank-AccountID" type="number" name="Bank-AccountID" required>
							</td>
						</tr>
						<tr>
							<td>
								<label>Bank Name</label>
								<input id="Bank-AccountID" placeholder="Bank-AccountID" type="text" name="BankName" required>
							</td>
						</tr>
						<tr>
							<td>
								<label>creditCard number</label>
								<input id="Bank-AccountID" placeholder="Bank-AccountID" type="number" name="creditCard" required>
							</td>
						</tr>
						<tr>
							<td>
								<input id="submit" class="submit-btn btn green-btn" type="submit" name="submit" value='Create Account'>
							</td>
						</tr>
					</table>
				</form>
			</div>
		</div>
		<?php
	}
?>