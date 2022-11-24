<?php

if(isset($_GET['delete_id'])){
    $id=$_GET['delete_id'];
    $query = "DELETE FROM chart WHERE product_id = $id";
    $deleteProduct=mysqli_query($connect,$query);
    header("Location:cart.php");
}

?>