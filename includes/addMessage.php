<?php
// $_SESSION['username']='';
if (isset($_SESSION['username'])) {

	$username = $_SESSION['username'];
	$lastname = $_SESSION['last_name'];
	$email = $_SESSION['email'];
	$phone = $_SESSION['phone_number'];
} else {
	$username = null;
	$lastname = null;
	$email = null;
	$phone = null;
}

?>

<aside id="sidebar" style="background-color: yellow;">

	<div class="box_detail">

		<b>
			<h4 style="text-align: center;">
				<?php echo "Your Welcome " . $username . " please Leave your Suggestion and you can edit these defaults" ?>.</h4>
		</b>
		<p style="text-align: center;" class="nopadding">Click Submit to Add your suggestion</p>
		<div id="message-contact"></div>
		<?php

		if (isset($_POST['submit'])) {
			$usernames = $_POST['username'];
			$fullNames = $_POST['fullNames'];
			$email = $_POST['email'];
			$phone = $_POST['phone'];
			$comment = $_POST['comment'];
			$query = "INSERT INTO comments (full_names, username, email, phone, comment, comment_status )
VALUES('$fullNames', '$usernames', '$email', '$phone', '$comment', 'unApproved' )";

			$addComment = mysqli_query($connect, $query);
		}
		?>

		<form method="post" action="" id="contactform" autocomplete="off">
			<div class="row">
				<div class="col-xl-6 col-lg-12 col-sm-6">
					<span class="input">
						<input class="input_field" value="<?php echo $username ?>" type="text" id="name_contact" name="username">
						<label class="input_label">
							<span class="input__label-content">Username</span>
						</label>
					</span>
				</div>
				<div class="col-xl-6 col-lg-12 col-sm-6">
					<span class="input">
						<input class="input_field" type="text" name="fullNames" value="<?php echo $lastname ?>">
						<label class="input_label">
							<span class="input__label-content">Full names</span>
						</label>
					</span>
				</div>
			</div>
			<!-- /row -->
			<div class="row">
				<div class="col-xl-6 col-lg-12 col-sm-6">
					<span class="input">
						<input class="input_field" type="email" id="email_contact" value="<?php echo $email ?>" name="email">
						<label class="input_label">
							<span class="input__label-content">Your email</span>
						</label>
					</span>
				</div>
				<div class="col-xl-6 col-lg-12 col-sm-6">
					<span class="input">
						<input class="input_field" type="text" name="phone" value=<?php echo "+250 $phone" ?>>
						<label class="input_label">
							<span class="input__label-content">Your telephone</span>
						</label>
					</span>
				</div>
			</div>


			<!-- /row -->
			<span class="input">
				<textarea class="input_field" id="message_contact" name="comment" style="height:120px;" required></textarea>
				<label class="input_label">
					<span class="input__label-content">Your message</span>
				</label>
			</span>

			<div style="position:relative;" class="mt-4"><input type="submit" value="Add Comment" class="btn_1 full-width" id="submit-contact" name='submit'></div>

		</form>
	</div>
</aside>