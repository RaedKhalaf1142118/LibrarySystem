<?php
	switch ($_GET['display']) {
		case 'login':
			displayLogin();
			break;
		case 'register':
			displayRegister();
			break;
		case 'requestSubscription':
			break;
		case 'contactUs':
			break;
		case 'logout':
			logout();
			break;	
		case 'search':
			displaySearch();
		default:
			break;
	}
?>