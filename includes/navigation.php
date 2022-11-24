
<header class="header menu_2">
		<div id="preloader"><div data-loader="circle-side"></div></div><!-- /Preload -->
		<div id="logo">
			<a href="index.php"><img src="img/2.png" width="149" height="42" alt=""></a>
		</div>
		
		<ul id="top_menu">

		<li class="hidden_tablet"><a href="register.php" class="btn_1 rounded">Register</a></li>
		<li  class="hidden_tablet"><a href="cart.php" class="btn_1 rounded">Cart</a></li>
		<li class="hidden_tablet"><a href="admin/index.php" class="btn_1 rounded">Admin</a></li>
		
		</ul>
		<!-- /top_menu -->
		<!-- <a href="#menu" class="btn_mobile">
			<div class="hamburger hamburger--spin" id="hamburger">
				<div class="hamburger-box">
					<div class="hamburger-inner"></div>
				</div>
			</div>
		</a> -->
		<nav id="menu" class="main-menu">
			
			<ul>
				<li><span><a href="index.php">Home</a></span></li>			
				<?php
				$query="SELECT * FROM categories";
				$allCategories=mysqli_query($connect,$query);
				while($row=mysqli_fetch_assoc($allCategories)){
					$cats=$row['cat_name'];
					echo "<li><span><a href='$cats.php'>$cats</a></span></li>";
				}
				?>
					
			
				
			</ul>
			
		</nav>
		<!-- Search Menu -->
		<div class="search-overlay-menu">
			<span class="search-overlay-close"><span class="closebt"><i class="ti-close"></i></span></span>
			<form role="search" id="searchform" method="get">
				<input value="" name="q" type="search" placeholder="Search..." />
				<button type="submit"><i class="icon_search"></i>
				</button>
			</form>
		</div><!-- End Search Menu -->
	</header>
