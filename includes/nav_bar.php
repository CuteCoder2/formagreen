<?php

session_start();
?>


<nav>
	<div class="navbar">
		<i class='bx bx-menu'></i>
		<div class="logo"><a href="#">FORMA GREEN</a></div>
		<div class="nav-links">
			<div class="sidebar-logo">
				<span class="logo-name">FORMA GREEN</span>
				<i class='bx bx-x'></i>
			</div>
			<ul class="links">
				<li><a href="home.php">HOME</a></li>
				<li>
					<a href="">MEMEBERS</a>
					<i class='bx bxs-chevron-down htmlcss-arrow arrow  '></i>
					<ul class="htmlCss-sub-menu sub-menu">
						<li><a href="add_members.php">Add Member</a></li>
						<li><a href="all_members.php">All Member</a></li>
					</ul>
				</li>
				<li>
					<a href="">Green Areas</a>
					<i class='bx bxs-chevron-down js-arrow arrow '></i>
					<ul class="js-sub-menu sub-menu">
						<li><a href="add_areas.php">Add New Area</a></li>
						<li><a href="all_green_areas.php">ALL Areas</a></li>
					</ul>
				</li>
				<li><a href=""><?php
				echo "<h2 style = 'color : black'>".$_SESSION['first Name'].' '.$_SESSION['last Name']."</h2>";
				?></a></li>
				<li><a href="../function/log_out.php"><h2 style = 'color : red;'>LOG OUT</h2></a></li>
			</ul>
		</div>

	</div>
</nav>
