<?php include "includes/adminHeader.php"?>


  <!-- Navigation-->
<?php include "includes/adminNavigation.php" ?>  
  <!-- /Navigation-->
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Welcome to Admin</a>
        </li>

        <li class="breadcrumb-item active"><?php echo $_SESSION['username']; ?></li><br>
        
      </ol>
      
      
<?php 

if(isset($_GET['action'])){
  $action =$_GET['action'];
}else{
  $action='';
}
  switch($action){
    case 'viewAllComments';
    include "includes/viewAllComments.php";
    break;

    default;
    include "includes/viewAllComments.php";
  }


?>
</div>


</div>
    <!-- /.container-wrapper-->
    <?php include "includes/adminFooter.php"?>
   