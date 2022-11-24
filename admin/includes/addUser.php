
<?php

if(isset($_POST['addUser'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $user_role = $_POST['user_role'];
    $phone_number = $_POST['phone_number'];
    
    $userImage = $_FILES['images'];
    $userImage = $_FILES['images']['name'];
    $userImageTemp = $_FILES['images']['tmp_name'];
    move_uploaded_file($userImageTemp,"../img/$userImage");
    

if(!empty($username) && !empty($email) && !empty($user_role) && !empty($first_name) && !empty($last_name) && !empty($user_role) && !empty($phone_number)){

    $message = "The user $username created successifully";

    $username = mysqli_real_escape_string($connect,$username);
    $email = mysqli_real_escape_string($connect,$email);
    $password = mysqli_real_escape_string($connect,$password);
    $first_name = mysqli_real_escape_string($connect,$first_name);
    $last_name = mysqli_real_escape_string($connect,$last_name);
    $user_role = mysqli_real_escape_string($connect,$user_role);
    $phone_number = mysqli_real_escape_string($connect,$phone_number);

    $password=password_hash($password, PASSWORD_BCRYPT, array('cost'=>5));

    
$query="INSERT INTO users (first_name, last_name,username, email, user_image, password, user_role, phone_number)
VALUES ('$first_name', '$last_name', '$username', '$email', '$userImage', '$password', '$user_role', '$phone_number')";
$registerUser=mysqli_query($connect,$query);
if(!$registerUser){
    die("Failed to registerUser".mysqli_error($connect));
}elseif($registerUser){
    echo "user $username is created as successifully";
}
}elseif(!empty($username) && !empty($email) && !empty($user_role) && !empty($first_name) && !empty($last_name) && !empty($user_role) && !empty($phone_number)){
    
$message = "Fields can't be Empty please Fill";
}

}else{
    $message="";
}

?>

    <div class="container-fluid d-flex"> 

        <div class="col-lg-8">


             <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="username" class="sr-only">username</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Enter Desired Username">
                        </div>
                        <div class="form-group">
                            <label for="first_name" class="sr-only">first_name</label>
                            <input type="text" name="first_name" id="first_name" class="form-control" placeholder="Firstname">
                        </div>
                                      
                        <div class="form-group">
                            <label for="last_name" class="sr-only">last_name</label>
                            <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Lastname">
                        </div>
  
                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com">
                        </div>
                         <div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" name="password" id="key" class="form-control" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label for="user_role" class="sr-only">user_role</label>
                            <input type="user_role" name="user_role" id="key" class="form-control" placeholder="Role">
                        </div>
                        <div class="form-group">
                            <label for="images"><b>You may Show Us your photo if you want</b></label><br>
                           <input type="file" name="images" id="">
                        </div>
                        <div class="form-group">
                            <label for="phone_number" class="sr-only">phone_number</label>
                            <input type="phone_number" name="phone_number" id="key" class="form-control" placeholder="Phone">
                        </div>
                        
                      <input type="submit" name="addUser" id="btn-login" class="btn btn-primary btn-lg btn-block" value="Register">
                    </form>
</div>
</div>
