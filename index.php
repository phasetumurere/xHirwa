<?php include "includes/header.php"; ?>
<div id="page">

	<?php include "includes/navigation.php" ?>
	<!-- /header -->

	<main>
		<section class="hero_single version_2">
			<div class="wrapper">
				<div class="container">
					<h3>What would you like buy?</h3>
					<p>As we want Smart Rwanda you need to expertise in shopping with, technology and xHirwa is there for you</p>
					<form action="" method="">
						<div id="custom-search-input">

							<div class="input-group">
								<input type="text" name="type" class=" search-query" placeholder="Ex. Fruits, Vegetables,...">
								<input type="submit" class="btn_search" name="search">
							</div>
						</div>
					</form>
				</div>
			</div>
		</section>
		<!-- /hero_single -->
		<!-- Categories -->
		<div class="features clearfix">
			<div class="container">
				<ul>
					<li><i class="pe-7s-study"></i>
						<h4>+1T Body Building</h4><span>Body building food helps for body growth </span>
					</li>
					<li><i class="pe-7s-cup"></i>
						<h4>1T Energy Giving</h4><span>to be strong you need Energy giving food</span>
					</li>
					<li><i class="pe-7s-target"></i>
						<h4>1T Body protecting</h4><span>for fight aginst diseases you need this kind of food</span>
					</li>
				</ul>
			</div>
		</div>



		<?php
		// session_start();
		if (isset($_SESSION["username"])) {

			include "includes/likedCommodity.php";
		} else {
			echo "Phase";
		}

		?>
		<!-- All products -->

		<div class="bg_color_1">
			<div class="container margin_120_95">
				<div class="main_title_2">
					<span><em></em></span>
					<h2>First Login</h2>
					<p>After Login Automatically you will be directed to your cart so you can use our Shop.</p>
				</div>

				<div class="row" style="margin: auto;">
					<div class="col-lg-3">

						<?php
						//Ibitera Imbaraga


						//Imboga
						$query = "SELECT * FROM commodity WHERE commodity_category = 'vegetables'";
						$allProducts = mysqli_query($connect, $query);
						while ($row = mysqli_fetch_assoc($allProducts)) {
							$names = $row['commodity_name'];
							$commodityId = $row['commodity_id'];
							$price = $row['commodity_price'];
							$image = $row['commodity_image'];
							$description = $row['commodity_description'];
							$quantity = $row['commodity_quantity'];

						?>

							<a href="index.php?commodity_id=<?php echo $commodityId ?> && commodity_name = <?php echo $names ?>">
								<?php echo $description . " at " . $price . "Rwf"; ?>

								<img src="img/<?php echo $image ?>" class="img-fluid" width="300" height="300" alt="boy">

							</a>
						<?php


						} ?>

					</div>

					<div class="col-lg-3">

						<?php
						$query = "SELECT * FROM commodity WHERE commodity_category = 'protein'";
						$allProducts = mysqli_query($connect, $query);
						while ($row = mysqli_fetch_assoc($allProducts)) {
							$names = $row['commodity_name'];
							$commodityId = $row['commodity_id'];
							$price = $row['commodity_price'];
							$image = $row['commodity_image'];
							$description = $row['commodity_description'];
							$quantity = $row['commodity_quantity'];
						?>



							<!-- <a class="box_news" href="#0"> -->

							<a href="index.php?commodity_id=<?php echo $commodityId ?> && commodity_name = <?php echo $names ?>">
								<?php echo $description . " at " . $price . "Rwf" . " /Kg"; ?>

								<img src="img/<?php echo $image ?>" width="300" height="300" class="img-fluid" alt=""><br>

							</a>
						<?php } ?>

					</div>

					<div class="col-lg-3">
						<?php
						//Ibitera Imbaraga


						//Imboga
						$query = "SELECT * FROM commodity WHERE commodity_category ='fruit'";
						$allProducts = mysqli_query($connect, $query);
						while ($row = mysqli_fetch_assoc($allProducts)) {
							$commodityId = $row['commodity_id'];
							$names = $row['commodity_name'];
							$price = $row['commodity_price'];
							$image = $row['commodity_image'];
							$description = $row['commodity_description'];
							$quantity = $row['commodity_quantity'];

						?>

							<a href="index.php?commodity_id=<?php echo $commodityId ?> && commodity_name = <?php echo $names ?>">
								<?php echo $description . " at " . $price . "Rwf"; ?>

								<img src="img/<?php echo $image ?>" class="img-fluid" width="300" height="300" alt="">

							</a>
						<?php } ?>

					</div>





					<div class="col-lg-3">
						<?php

						include "includes/login.php";


						?>

						<?php
						//Ibitera Imbaraga


						//Imboga
						$query = "SELECT * FROM commodity WHERE commodity_category ='others'";
						$allProducts = mysqli_query($connect, $query);
						while ($row = mysqli_fetch_assoc($allProducts)) {
							$commodityId = $row['commodity_id'];
							$names = $row['commodity_name'];
							$price = $row['commodity_price'];
							$image = $row['commodity_image'];
							$description = $row['commodity_description'];
							$quantity = $row['commodity_quantity'];

						?>

							<a href="index.php?commodity_id=<?php echo $commodityId ?> && commodity_name = <?php echo $names ?>">
								<?php echo $description . " at " . $price . "Rwf"; ?>

								<img src="img/<?php echo $image ?>" class="img-fluid" width="300" height="300" alt="">

							</a>
						<?php } ?>


					</div>




				</div>

			</div>

			<!--	<p class="btn_home_align"><a href="blog.html" class="btn_1 rounded">View all products</a></p> -->

		</div>
		<hr style="color: blue;"> <!-- /container -->
		<hr style="color: blue;"> <!-- /container -->
</div>
</div>
<!-- /features -->

<!-- Liked Commodity -->





<div class='bg_color_2'>

	<div class="call_section">

		<div style="padding: 50px;" class="row">


			<div class="col-lg-3 col-md-6 float-right wow position-relative" data-wow-offset="250">
				<div style="background-color:gray;">
					<h4 class="text-center">others Suggestions</h4>
					<?php

					$query = "SELECT * FROM comments WHERE comment_status ='Approved'";
					$allCommodities = mysqli_query($connect, $query);
					while ($row = mysqli_fetch_assoc($allCommodities)) {
						$commentId = $row['comment_id'];
						$fullNames = $row['full_names'];
						$usernamess = $row['username'];
						$phone = $row['phone'];
						$comment = $row['comment'];
						$email = $row['email'];
						echo "<p style='color: white;' class='text-center'> $comment by<b> $usernamess</b></p>";
					}

					?>
				</div>
				<div class="block-reveal">
					<div class="block-vertical"></div>
					<div class="box_1">

						<h3>Igurire utavuye murugo na xHirwa</h3>
						<p>Twabazaniye ibyokurya byubwokobwose kandi tubikugezaho utavuye murugo kubantu ba kimironko, nahandi hose
							mumujyi wa kigali nivuba wowe sura urubuga xHirwa.com maze utubwire icyo wifuza</p>


					</div>
				</div>
			</div>
			<div class='col-lg-9' style="background-color: grey;">
				<?php

				include

					"includes/addMessage.php"; ?>
			</div>


		</div>

	</div>
</div>


<!--/call_section-->

</main>
<!-- /main -->

<?php include "includes/footer.php" ?>