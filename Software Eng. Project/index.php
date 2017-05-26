<?php
	session_start();
	include 'connections/database.php';
	include 'components/login.php';
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