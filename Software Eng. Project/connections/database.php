<?php
	$database = mysqli_connect("localhost","root","") OR die("ERROR");
	mysqli_select_db($database,"library");

	include 'connections/applicationServer/LoginServer.php';
	
?>