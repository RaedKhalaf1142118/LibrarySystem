<?php
	$database = mysqli_connect("localhost","root","") OR die("ERROR");
	mysqli_select_db($database,"library");

	include 'connections/applicationServer/LoginServer.php';
	include 'connections/applicationServer/logoutServer.php';
	include 'connections/applicationServer/RegisterServer.php';
	include 'connections/applicationServer/SearchServer.php';
?>