<!--/hero_in-->



<?php include "includes/header.php"; ?>
<?php

if (isset($_POST['add_user'])) {
    $username = $_POST['username'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $password = $_POST['password'];
    $user_role = $_POST['user_role'];
    $user_gender = $_POST['user_gender'];
    $phone_number = $_POST['phone_number'];
    $email = $_POST['email'];
    if (!empty($username) && !empty($user_role) && !empty($user_role) && !empty($phone_number)) {

        $message = "The user $username created successifully";

        $username = mysqli_real_escape_string($connect, $username);
        $first_name = mysqli_real_escape_string($connect, $first_name);
        $last_name = mysqli_real_escape_string($connect, $last_name);
        $password = mysqli_real_escape_string($connect, $password);
        $user_role = mysqli_real_escape_string($connect, $user_role);
        $user_gender = mysqli_real_escape_string($connect, $user_gender);
        $phone_number = mysqli_real_escape_string($connect, $phone_number);
        $email = mysqli_real_escape_string($connect, $email);
        $password = password_hash($password, PASSWORD_BCRYPT, array('cost' => 5));


        $query = "INSERT INTO users (first_name, last_name, username, email, password, user_role, user_gender, phone_number)
VALUES ('$first_name', '$last_name', '$username', '$email', '$password', '$user_role', '$user_gender', '$phone_number')";
        $registerUser = mysqli_query($connect, $query);
        if (!$registerUser) {
            die("Failed to registerUser" . mysqli_error($connect));
        }
    } elseif (!empty($username) && !empty($user_role) && !empty($user_role) && !empty($phone_number)) {

        $message = "Fields can't be Empty please Fill";
    }
} else {
    $message = "";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

</body>

</html>


<div class="container mt-2" style="padding-left: 10%; padding-right: 10%; padding-bottom:5px;">

    <div class="col-xl-11" style="padding-bottom: 10px; padding-top: 10px; background-color: grey">
        <nav id="menu" class="main-menu">

            <ul id="top_menu">

                <li class="hidden_tablet"><a href="index.php" class="btn_1">HOME</a></li>
                <!-- <li class="hidden_tablet"><a href="admin/index.php" class="btn_1 rounded">Admin</a></li> -->

            </ul>
        </nav>

        <form class="offset-md-4 col-md-5" action="" method="post">


            <h1>Register to xHirwa</h1>
            <div class="col-md-10">


                <div class="form-group">
                    <label for="first_name">First Name</label>
                    <input type="text" name="first_name" id="first_name" class="form-control" placeholder="Enter Your first Name" required>
                </div>
                <div class="form-group">
                    <label for="last_name">Last Name</label>
                    <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Enter Your last Name" required>
                </div>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" class="form-control" placeholder="Enter Desired Username" required>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="key" class="form-control" placeholder="Password" required>
                </div>
                <div class="form-group">
                    <label for="user_role"><b>User Role</b></label><br>
                    <select class="custom-select" name="user_role" id="">
                        <option value="client">User Role</option>
                        <option value="client">Client</option>
                    </select>

                </div>
                <div class="form-group">
                    <label for="user_gender"><b>User Gender</b></label><br>
                    <select class="custom-select" name="user_gender" id="" required>
                        <option value="M">Masculin</option>
                        <option value="F">Feminin</option>
                    </select>

                </div>
                <div class="form-group">
                    <label for="phone_number">Phone number</label>
                    <input type="tel" name="phone_number" id="key" class="form-control" placeholder="Phone" required>
                </div>
                <div class="form-group">
                    <label for="email">User Email</label>
                    <input type="email" name="email" id="key" class="form-control" placeholder="email" required>
                </div>

                <input type="submit" name="add_user" class="btn btn-primary" value="Register">

            </div>
        </form>


    </div>
</div>