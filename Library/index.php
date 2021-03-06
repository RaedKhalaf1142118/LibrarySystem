<?php
	session_start();
	include 'connections/database.php';
	include 'components/login.php';
	include 'components/register.php';	
	include 'components/search.php';
	include 'components/contactUs.php';
	include 'components/editAccount.php';
	include 'components/viewMessages.php';
	include 'components/addBook.php';
	include 'components/bookDescription.php';
	include 'components/listUsers.php';
	include 'components/editBook.php';
	include 'components/requestSubscription.php';
	include 'components/viewBorrowedList.php';
	include 'components/borrowingMessages.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Library</title>
</head>
	<?php
		include 'connections/styles.php';
	?>
<body>
	<?php
		include 'components/header.php';
		include 'components/nav.php'
	?>
	<div class="display">
		<?php
			include 'components/display.php';
		?>
	</div>
	<?php
		include 'connections/scripts.php';
	?>
</body>
</html>