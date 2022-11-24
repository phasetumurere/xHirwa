<?php

if (isset($_POST['login'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];

	$query = "SELECT * FROM users WHERE username =  '$username' ";
	$allTheUsers = mysqli_query($connect, $query);
	while ($row = mysqli_fetch_assoc($allTheUsers)) {
		$dbUsername = $row['username'];
		$dbFirstname = $row['first_name'];
		$dbLastname = $row['last_name'];
		$dbPassword = $row['password'];
		$dbEmail = $row['email'];
		$dbUserRole = $row['user_role'];
		$dbUserGender = $row['user_gender'];
		$phone = $row['phone_number'];
	}

	if (password_verify($password, $dbPassword)) {
		$_SESSION['username'] = $dbUsername;
		$_SESSION['first_name'] = $dbFirstname;
		$_SESSION['last_name'] = $dbLastname;
		$_SESSION['password'] = $dbPassword;
		$_SESSION['email'] = $dbEmail;
		$_SESSION['phone_number'] = $phone;
		$_SESSION['user_role'] = $dbUserRole;
		$_SESSION['user_gender'] = $dbUserGender;
		if ($dbUserRole == 'client') {
			header("Location:./cart.php");
		} elseif ($dbUserRole == 'Admin') {
			header("Location:./admin/index.php");
		}
	} else {
		echo "inter Correct Password";
		header("Location:./index.php");
	}
}

?>

<div class="col-lg-12" style="background-color:whitesmoke">

	<form class="offset-md-1 col-md-10" action="" method="post">
		<h5>Login</h5>
		<div class="form-group" style="padding: 20;">
			<input type="text" name="username" class="form-control" id="" placeholder="Username">
		</div>
		<div class="form-group">
			<input type="password" name="password" class="form-control" id="" placeholder="Password">
		</div>
		<div class="form-group">
			<input type="submit" name="login" id="" class="btn btn-primary">
		</div>
	</form>
</div>
<div style="background-color: white;">
	<hr>