<?php
	switch ($_GET['display']) {
		case 'borrowingMessages':
			displayBorrowingMessages();
			break;
		case 'viewBorrows':
			displayAllBorrows();
			break;
		case 'EditBook':
			displayEditBook();
			break;
		case 'listUsers':
			displayUsers();
			break;
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
			displayRequestSubscription();
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