<?php include "includes/adminHeader.php"?>


  <!-- Navigation-->
<?php include "includes/adminNavigation.php" ?>  
  <!-- /Navigation-->
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>

        <li class="breadcrumb-item active"><?php echo $_SESSION['username']; ?>'s Dashboard</li><br>
        
      </ol>

<?php

if(isset($_POST['upload'])){
    $categoryName=$_POST['category'];
    $query="INSERT INTO categories (cat_name) VALUES('$categoryName')";
    $insertCategory = mysqli_query($connect,$query);   
}

?>


      <div class="row breadcrumb">
        <div class="col-xl-6">
        <h5>Add Category</h5>
        <form action="" method="post" class="form-group">
        <!-- <label for="category">category</label> -->
        <input type="text" name="category" class="form-control"><br>
        <input type="submit" class="btn btn-primary" name="upload">
        </form>
        </div>

        <div class="col-xl-6">
        <h5>All Categories</h5>
        <table class="table table-hover table-bordered" style="background-color: pink;">
            <tr>
                <thead>
                    <th>Id</th>
                    <th>CategoryName</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </thead>
                
            </tr>
            
            <tbody>
                
<?php

viewAllCategories();

?>                
                  
                </tbody>
      
        </table>
        </div>
        <hr>
       
<?php



updateCategory();

?>
<!--  DELETE CATEGORIES -->
<?php

if(isset($_GET['delete'])){
  $deleteCategory=$_GET['delete'];
  $query= "DELETE FROM categories WHERE cat_id = $deleteCategory ";
  $deleteQuery=mysqli_query($connect,$query);
  header("Location:categories.php");
}

?>

</div>
    <!-- /.container-wrapper-->
    <?php include "includes/adminFooter.php"?>
   