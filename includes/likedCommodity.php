<?php



$username = $_SESSION["username"];
$email = $_SESSION["email"];
// $_SESSION["email"]=$email;
if (isset($_GET['commodity_id'])) {
	// $theFluitName=$_GET['commodity_name'];
	$theFluitId = $_GET['commodity_id'];
	$query = "SELECT * FROM commodity WHERE commodity_id = $theFluitId";
	$selectedCommodity = mysqli_query($connect, $query); ?>
	<div class="container-fluid margin_120_0">
		<div class="main_title_2">
			<span><em></em></span>
			<h2>xHirwa Popular Products</h2>
			<p>You can make an order and we make free derivery if you are in Kimironko.</p>
		</div>


		<div id="reccomended" class="owl-carousel owl-theme">



			<?php
			// Displaying many images in multiple images in one cell separated by comma.
			$row = mysqli_fetch_assoc($selectedCommodity);
			$commodityName = $row['commodity_name'];
			$commodityPicture = $row['commodity_image'];
			$commodityCategory = $row['commodity_category'];
			$commodityPrice = $row['commodity_price'];
			$commodityImage = $row['commodity_photos'];
			$commodityImage = explode(',', $commodityImage);
			foreach ($commodityImage as $selectedCommodityImage) {
				echo "<div><a href='cart.php'><p>$commodityName</p><img src='img/$selectedCommodityImage' width='300', height='300'></a></div>";
			}
			?>



		</div>

		<!-- Add to chart -->
		<?php

		if (isset($_POST['addToChart'])) {

			$quantity = $_POST['quantity'];

			$amount = $commodityPrice * $quantity;
			$query = "INSERT INTO chart (username, email, product_photo, product_name, quantity, product_price, product_amount, product_category ) 
VALUES('$username', '$email', '$commodityPicture', '$commodityName', '$quantity', $commodityPrice, $amount, '$commodityCategory' )";
			$insertIntoChart = mysqli_query($connect, $query);
			header("Location:./cart.php");
		}

		?>


		<div class="row col-sm-4 form-group">

			<form method="post">
				<label for="">Insert Quantity That You want</label>
				<input type="text" name="quantity" class="form-control"><br>
				<input type="submit" class="btn btn-primary" name="addToChart" value="AddToChart">
			</form>

		</div>


		<hr>
	</div>

	>
	<hr>
<?php
}


?>