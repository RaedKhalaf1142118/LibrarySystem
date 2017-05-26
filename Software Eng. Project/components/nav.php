<nav class="main-nav">
	<?php
		switch ($_GET['display']) {
			case 'login':
				break;
			case 'register':
				break;
			case 'requestSubscription':
				break;
			case 'contactUs':
			case 'search':
			default:
				break;
		}
	?>
	<ul class="main-nav-list">
		<a href="index.php?display=login">
			<li class="main-nav-item <?php echo strcmp($_GET['display'],'login')==0?"selected-nav-item":""?>">
				 Login 
			</li>
		</a>
		<a href="index.php?display=register">
			<li class="main-nav-item <?php echo strcmp($_GET['display'],'register')==0?"selected-nav-item":""?>">
				 Register 
			</li>
		</a>
		<a href="index.php?display=search">
			<li class="main-nav-item <?php echo strcmp($_GET['display'],'search')==0?"selected-nav-item":""?>">
				 Search
			</li>
		</a>
		<a href="index.php?display=requestSubscription">
			<li class="main-nav-item <?php echo strcmp($_GET['display'],'requestSubscription')==0?"selected-nav-item":""?>">
				 Request subscription
			</li>
		</a>
		<a href="index.php?display=contactUs">
			<li class="main-nav-item <?php echo strcmp($_GET['display'],'contactUs')==0?"selected-nav-item":""?>">
				 contact us
			</li>
		</a>
	</ul>
</nav>