<?php
// **************Categories*********************

//  <!-- UPDATE CATEGORIES  -->
function updateCategory(){
global $connect;

// Catch Specific Category
if(isset($_GET['edit'])){
    $editId=$_GET['edit'];
    $editName=$_GET['editCategory'];
    // echo $editName;
 ?>  

        <div class="col-xl-6">
        <h5>Edit Category</h5>
        <form action="" method="post" class="form-group">
        
        <input type="text" name="editCategory" value="<?php echo $editName?>" class="form-control"><br>
        <input type="submit" class="btn btn-primary" name="updateCategory" value="Update Category">
        </form>
        </div>
      <?php } ?>

</div>
     
<?php

//Update
if(isset($_POST['updateCategory'])){
    $updateCategory=$_POST['editCategory'];
    echo $updateCategory;
  $query = "UPDATE categories SET cat_name = '{$updateCategory}' WHERE cat_id = $editId ";
  $updateCategoryName=mysqli_query($connect,$query);
  header("Location:categories.php");
    }
}


function viewAllCategories(){
    global $connect;
    $query = "SELECT * FROM categories";
$allCategories=mysqli_query($connect,$query);
while($row = mysqli_fetch_assoc($allCategories)){
    $id=$row['cat_id'];
    $name=$row['cat_name'];
    echo "<tr>";
    echo "<td>$id</td>";
    echo "<td>$name</td>";
    echo "<td><a href='categories.php?edit=$id & editCategory=$name'>Edit</a></td>";
    echo "<td><a href='categories.php?delete=$id'>Delete</a></td>";
    echo "</tr>";
    }
}

// *************Commodities******************//
function deleteCommodity(){
    global $connect;
    if(isset($_GET['delete_id'])){
        $deleteId=$_GET['delete_id'];
        $query="DELETE FROM commodity WHERE commodity_id = $deleteId";
        $deleteQuery=mysqli_query($connect,$query);
        header("Location:commodities.php");
        // if(!$deleteQuery){
        //     die("Query Failed!!".mysqli_error($connect));
        // }
    }
    
}
function editCommodity(){

global $connect;
  
}

?>