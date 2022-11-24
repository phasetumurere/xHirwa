<?php include "includes/adminHeader.php"?>
<?php include "includes/adminNavigation.php"?>
<div class="content-wrapper">
    
      <!-- Breadcrumbs-->
      <div class="">
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>

        <li class="breadcrumb-item active"><?php echo $_SESSION['username']; ?>'s Dashboard</li><br>
        
      </ol>    
     

<?php

if(isset($_GET['action'])){
    $action =$_GET['action'];
}else{
    $action='';
}

switch($action){

    case 'addUser';
    include "includes/addUser.php";
    break;

    case 'editUser';
    include "includes/editUser.php";
    break;

    default;
    include "includes/viewAllUsers.php";
   
}

?>

    </div>
</div>

<?php include "includes/adminFooter.php"?>
