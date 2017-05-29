<?php
	$database = mysqli_connect("localhost","root","") OR die("ERROR");
	mysqli_select_db($database,"library");

	include 'connections/applicationServer/LoginServer.php';
	include 'connections/applicationServer/logoutServer.php';
	include 'connections/applicationServer/RegisterServer.php';
	include 'connections/applicationServer/SearchServer.php';
	include 'connections/applicationServer/contactUsServer.php';
	include 'connections/applicationServer/editAccountServer.php';
	include 'connections/applicationServer/UserServer.php';
	include 'connections/applicationServer/genreServer.php';
	include 'connections/applicationServer/BookServer.php';
	include 'connections/applicationServer/reviewRateServer.php';
	include 'connections/applicationServer/deliverManServer.php';
?>