<?php
	switch ($_GET['display']) {
		case 'login':
			displayLogin();
			break;
		case 'register':
			break;
		case 'requestSubscription':
			break;
		case 'contactUs':
			break;
		case 'search':
		default:
			break;
	}
?>