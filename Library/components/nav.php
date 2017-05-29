<nav class="main-nav">
	<?php
		if(isset($_GET['display'])){
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
		}
	?>
	<ul class="main-nav-list">
		<?php
			if(isset($_SESSION['admin']) || isset($_SESSION['user'])){
				?>
					<a href="index.php?display=logout">
						<li class="main-nav-item <?php echo strcmp($_GET['display'],'login')==0?"selected-nav-item":""?>">
						 Logout 
						</li>
					</a>
				<?php
			}else{
				?>
					<a href="index.php?display=login">
						<li class="main-nav-item <?php echo strcmp($_GET['display'],'login')==0?"selected-nav-item":""?>">
						 	log in 
						</li>
					</a>

					<a href="index.php?display=register">
						<li class="main-nav-item <?php echo strcmp($_GET['display'],'register')==0?"selected-nav-item":""?>">
							 Register 
						</li>
					</a>
				<?php
			
			}
		?>

		<?php
			if(isset($_SESSION['admin'])){
				?>
					<a href="index.php?display=addBook">
						<li class="main-nav-item <?php echo strcmp($_GET['display'],'addBook')==0?"selected-nav-item":""?>">
							 Add Book
						</li>
					</a>
					<a href="index.php?display=viewContactUs">
						<li class="main-nav-item <?php echo strcmp($_GET['display'],'viewContactUs')==0?"selected-nav-item":""?>">
							View Messages
						</li>
					</a>
					<a href="index.php?display=search">
						<li class="main-nav-item <?php echo strcmp($_GET['display'],'search')==0?"selected-nav-item":""?>">
							 Search
						</li>
					</a>
					<a href="index.php?display=listUsers">
						<li class="main-nav-item <?php echo strcmp($_GET['display'],'listUsers')==0?"selected-nav-item":""?>">
							All Users
						</li>
					</a>
				<?php
			}
		?>

		<?php
			if(isset($_SESSION['user'])){
		?>		
				<?php 
					if(isFeasibleAccount($_SESSION['user'])){
				 ?>
				<a href="index.php?display=search">
					<li class="main-nav-item <?php echo strcmp($_GET['display'],'search')==0?"selected-nav-item":""?>">
						 Search
					</li>
				</a>
				<?php
					if(!isPremiumAccount($_SESSION['user'])){
						?>
						<a href="index.php?display=requestSubscription">
							<li class="main-nav-item <?php echo strcmp($_GET['display'],'requestSubscription')==0?"selected-nav-item":""?>">
								 Subscribe
							</li>
						</a>
						<?php
					}
				?>
				<a href="index.php?display=contactUs">
					<li class="main-nav-item <?php echo strcmp($_GET['display'],'contactUs')==0?"selected-nav-item":""?>">
						Contact us
					</li>
				</a>
			<?php 
				}
			?>
				<a href="index.php?display=editAccountInformation">
					<li class="main-nav-item <?php echo strcmp($_GET['display'] ,'editAccountInformation')==0?"selected-nav-item":"";?>">
						Edit Account
					</li>
				</a>
		<?php
			}
		?>
	</ul>
</nav>