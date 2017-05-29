<?php
	switch ($_GET['display']) {
		case 'bookDescription':
			displayBookDescription();
			break;
		case 'viewContactUs':
			displayUserMessages();
			break;
		case 'addBook':
			displayAddBook();
			break;
		case 'editAccountInformation':
			displayEditAccount();
			break;
		case 'login':
			displayLogin();
			break;
		case 'register':
			displayRegister();
			break;
		case 'requestSubscription':
			break;
		case 'contactUs':
			displayContactUs();
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