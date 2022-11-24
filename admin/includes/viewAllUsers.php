
<div class="col-xl-12">
        <h5 style="text-align: center;">View All Users</h5>
        <table class="table table-hover table-bordered" style="background-color: pink;">
            <tr>
                <thead>
                    <th>ID</th>
                    <th>username</th>
                    <th>email</th>
                    <!-- <th>password</th> -->
                    <th>first_name</th>
                    <th>last_name</th>
                    <th>user_role</th>
                    <th>user_gender</th>
                    <th>phone_number</th>
                    <th>User_Image</th>
                    <!-- <th>Commmodity Photos</th> -->
                    <th>Edit</th>
                    <th>Delete</th>
                    <th>Admin</th>
                    <th>Client</th>
                </thead>
                
            </tr>
 
            <tbody>
                

                
<?php

$query = "SELECT * FROM users";
$allCommodities=mysqli_query($connect,$query);
while($row=mysqli_fetch_assoc($allCommodities)){
    $user_id = $row['user_id'];
    $username = $row['username'];
    $email = $row['email'];
    $password = $row['password'];
    $first_name = $row['first_name'];
    $last_name = $row['last_name'];
    $user_role = $row['user_role'];
    $user_gender = $row['user_gender'];
    $phone_number = $row['phone_number'];
    $password=password_verify(123,$password);
    $commodityPhotos=$row['user_image'];

    echo "<tr>";
    echo "<td>$user_id</td>";
    echo "<td>$username</td>";
    echo "<td>$email</td>";
    // echo "<td><img src='../img/$commodityImage' width='50' class='img-fluid'></td>";
    // echo "<td>$password</td>";
    echo "<td>$first_name</td>";
    echo "<td>$last_name</td>";
    echo "<td>$user_role</td>";
    echo "<td>$user_gender</td>";
    echo "<td>$phone_number</td>";
    echo "<td><img src='../img/$commodityPhotos' width=50 height=50></td>";
    // echo "<td>$commodityPhotos</td>";
    
    echo "<td><a href='users.php?action=editUser&editUserId=$user_id' >Edit</a></td>";
    echo "<td><a href='users.php?deleteUser=$user_id' >Delete</a></td>";
    echo "<td><a href='users.php?makeAdminUser=$user_id' >Admin</a></td>";
    echo "<td><a href='users.php?makeClientuser=$user_id' >Client</a></td>";
    echo "</tr>";
}

if(isset($_GET['deleteUser'])){
    $deleteUserId=$_GET['deleteUser'];
    $query="DELETE FROM users WHERE user_id=$deleteUserId";
    $deleteUser=mysqli_query($connect,$query);
    header("Location:users.php");
}

if(isset($_GET['makeAdminUser'])){
    $makeAdminUserId=$_GET['makeAdminUser'];
    $query="UPDATE users SET user_role = 'Admin' WHERE user_id=$makeAdminUserId";
    $adminizing=mysqli_query($connect,$query);
    header("Location:users.php");
}

if(isset($_GET['makeClientuser'])){
    $makeClientuserId=$_GET['makeClientuser'];
    $query="UPDATE users SET user_role = 'client' WHERE user_id=$makeClientuserId";
    $adminizing=mysqli_query($connect,$query);
    header("Location:users.php");
    
}
?>

                
                
            </tbody>
        </table>
</div>