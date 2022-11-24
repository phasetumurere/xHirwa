<?php include "includes/header.php" ?>
<?php //session_start();
// $_SESSION['username']==$dbUsername;
if ($_SESSION['user_role'] == 'client') {
	$dbUsername = $_SESSION['username'];
	// $dbUsername=$_SESSION['username'];

?>
	<div id="page">

		<?php include "includes/navigation.php" ?>
		<!-- /header -->


		<main>
			<section id="hero_in" class="courses">
				<div class="wrapper">
					<div class="container">
						<h1 class="fadeInUp"><span></span>Your Welcome to Cart <?php echo $dbUsername ?></h1>
					</div>
				</div>
			</section>
			<!--/hero_in-->
			<div class="filters_listing sticky_horizontal">

			</div>
			<!-- /filters -->

			<div class="container margin_60_35">
				<div class="row">
					<div class="col-xl-3 col-lg-6 col-md-6">

						<?php
						$query = "SELECT * FROM chart WHERE product_category = 'vegetables' AND username='$dbUsername'";
						$allProducts = mysqli_query($connect, $query);
						while ($row = mysqli_fetch_assoc($allProducts)) {
							$username = $row['username'];
							$id = $row['product_id'];
							$productId = $row['product_id'];
							$email = $row['email'];
							$image = $row['product_photo'];
							$productName = $row['product_name'];
							$quantity = $row['quantity'];
							$price = $row['product_price'];
							$category = $row['product_category'];


						?>

							<a href="cart.php?delete_id=<?php echo $id ?>">
								<?php echo $quantity . " kg of " . $productName . " at " . $price . "Rwf" . " Kumufungo"; ?>

								<img src="img/<?php echo $image ?>" class="img-fluid" alt="boy">

							</a>

						<?php }

						include "includes/deleteFromCart.php";

						?>
					</div>
					<!-- /box_grid -->
					<div class="col-xl-3 col-lg-6 col-md-6">
						<?php
						$query = "SELECT * FROM chart WHERE product_category = 'protein' AND username='$dbUsername'";
						$allProducts = mysqli_query($connect, $query);
						while ($row = mysqli_fetch_assoc($allProducts)) {
							$username = $row['username'];
							$id = $row['product_id'];
							$productId = $row['product_id'];
							$email = $row['email'];
							$image = $row['product_photo'];
							$productName = $row['product_name'];
							$quantity = $row['quantity'];
							$price = $row['product_price'];
							$category = $row['product_category'];


						?>

							<a href="cart.php?delete_id=<?php echo $id ?>">
								<?php echo $quantity . " kg of " . $productName . " at " . $price . "Rwf" . " Kumufungo"; ?>

								<img src="img/<?php echo $image ?>" class="img-fluid" alt="boy">

							</a>
						<?php }



						include "includes/deleteFromCart.php";



						?>
					</div>
					<!-- /box_grid -->
					<div class="col-xl-3 col-lg-6 col-md-6">
						<?php
						$query = "SELECT * FROM chart WHERE product_category = 'fruit' AND username='$dbUsername'";
						$allProducts = mysqli_query($connect, $query);
						while ($row = mysqli_fetch_assoc($allProducts)) {
							$username = $row['username'];
							$id = $row['product_id'];
							$productId = $row['product_id'];
							$email = $row['email'];
							$image = $row['product_photo'];
							$productName = $row['product_name'];
							$quantity = $row['quantity'];
							$price = $row['product_price'];
							$category = $row['product_category'];


						?>

							<a href="cart.php?delete_id=<?php echo $id ?>">
								<?php echo $quantity . " kg of " . $productName . " at " . $price . "Rwf" . " Kumufungo"; ?>

								<img src="img/<?php echo $image ?>" class="img-fluid" alt="boy">

							</a>
						<?php }
						include "includes/deleteFromCart.php";
						?>
					</div>
					<div class="col-xl-3 col-lg-6 col-md-6">

						<?php
						$query = "SELECT * FROM chart WHERE product_category = 'others' AND username='$dbUsername'";
						$allProducts = mysqli_query($connect, $query);
						while ($row = mysqli_fetch_assoc($allProducts)) {
							$username = $row['username'];
							$id = $row['product_id'];
							$productId = $row['product_id'];
							$email = $row['email'];
							$image = $row['product_photo'];
							$productName = $row['product_name'];
							$quantity = $row['quantity'];
							$price = $row['product_price'];
							$category = $row['product_category'];


						?>

							<a href="cart.php?delete_id=<?php echo $id ?>">
								<?php echo $quantity . " kg of " . $productName . " at " . $price . "Rwf" . " Kumufungo"; ?>

								<img src="img/<?php echo $image ?>" class="img-fluid" alt="boy">

							</a>
						<?php }
						include "includes/deleteFromCart.php";
						?>


					</div>


				</div>
				<!-- /row -->

				<?php ?>
				<form action="getInvoice.php" method="post">
					<div class="mt-4">
						<input type="submit" name="getInvoice" value="GET INVOICE" class="btn_1 full-width">
					</div>
				</form>

				<?php

				if (isset($_POST['logout'])) {
					include "includes/logout.php";
				}

				?>
				<form action="" method="post">
					<div class="mt-5">
						<input type="submit" style="background-color: #662d91;" name="logout" value="Logout" class="btn_1 full-width">
					</div>
				</form>

			</div>
			<!-- /container -->

			<!-- /bg_color_1 -->
		</main>
		<!--/main-->
		<?php include "includes/footer.php" ?>
	<?php
} elseif ($_SESSION['user_role'] == 'Admin') {
	header("Location:admin/index.php");
} else {
	header("Location:index.php");
}

	?>