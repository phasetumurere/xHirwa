
<?php
// Fetching user's Information
if(isset($_GET['editUserId'])){
    $userId=$_GET['editUserId'];
}
$query = "SELECT * FROM users WHERE user_id = $userId";
$allCommodities=mysqli_query($connect,$query);
$row=mysqli_fetch_assoc($allCommodities);
    $userName = $row['username'];
    $userEmail = $row['email'];
    $userPassword = $row['password'];
    $firstName = $row['first_name'];
    $lastName = $row['last_name'];
    $userRole = $row['user_role'];
    $phoneNumber = $row['phone_number'];
    $userPhoto=$row['user_image'];

// Inserting Into User
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

    $message = "The user $username created Updated Successifully";

    $username = mysqli_real_escape_string($connect,$username);
    $email = mysqli_real_escape_string($connect,$email);
    $password = mysqli_real_escape_string($connect,$password);
    $first_name = mysqli_real_escape_string($connect,$first_name);
    $last_name = mysqli_real_escape_string($connect,$last_name);
    $user_role = mysqli_real_escape_string($connect,$user_role);
    $phone_number = mysqli_real_escape_string($connect,$phone_number);

    $password=password_hash($password, PASSWORD_BCRYPT, array('cost'=>5));

    
$query="UPDATE users SET first_name = '$username',
last_name='$last_name',
username='$username',
email='$email',
user_image='$userImage',
password = '$password',
user_role='$user_role',
phone_number='$phone_number' WHERE user_id = $userId";
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
                            <label for="username" class="">username</label>
                            <input value="<?php echo $userName?>" type="text" name="username" id="username" class="form-control" placeholder="Enter Desired Username">
                        </div>
                        <div class="form-group">
                            <label for="first_name" class="">first_name</label>
                            <input value="<?php echo $firstName?>" type="text" name="first_name" id="first_name" class="form-control" placeholder="Firstname">
                        </div>
                                      
                        <div class="form-group">
                            <label for="last_name" class="">last_name</label>
                            <input value="<?php echo $lastName?>" type="text" name="last_name" id="last_name" class="form-control" placeholder="Lastname">
                        </div>
  
                         <div class="form-group">
                            <label for="email" class="">Email</label>
                            <input value="<?php echo $userEmail?>" type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com">
                        </div>
                         <div class="form-group">
                            <label for="password">Password</label>
                            <input value="<?php echo $userPassword?>" type="password" name="password" id="key" class="form-control" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label for="user_role" class="">user_role</label>
                            <input value="<?php echo $userRole?>" type="user_role" name="user_role" id="key" class="form-control" placeholder="Role">
                        </div>
                        <div class="form-group">
                            <label for="images"><b>You may Show Us your photo if you want</b></label><br>
                           <input value="<?php echo $userImage?>" type="file" name="images" id="">
                        </div>
                        <div class="form-group">
                            <label for="phone_number" class="">phone_number</label>
                            <input value="<?php echo $phoneNumber?>" type="phone_number" name="phone_number" id="key" class="form-control" placeholder="Phone">
                        </div>
                        
                      <input type="submit" name="addUser" id="btn-login" class="btn btn-primary btn-lg btn-block" value="Update">
                    </form>
</div>
</div>
