
<?php

// DisplayCommodities
if(isset($_GET['id'])){
    $commodityId=$_GET['id'];
}
$query = "SELECT * FROM commodity WHERE commodity_id =$commodityId";
$allCommodities=mysqli_query($connect,$query);
while($row=mysqli_fetch_assoc($allCommodities)){
    $commodityIdA=$row['commodity_id'];
    $commodityNameA=$row['commodity_name'];
    $commodityPriceA=$row['commodity_price'];
    $commodityImageA=$row['commodity_image'];
    $commodityDescriptionA=$row['commodity_description'];
    $commodityQuantityA=$row['commodity_quantity'];
    $commodityCategoryA=$row['commodity_category'];
    $commodityPhotosA=$row['commodity_photos'];

}

 if(isset($_POST['update_commodity'])){
    $commodityName=$_POST['commodity_name'];
    $commodityPrice=$_POST['commodity_price'];

    // $commodityImage=$_FILES['commodity_image'];

// Commodity Image
$commodityImage=$_FILES['commodity_image']['name'];
$commodityImageTemp=$_FILES['commodity_image']['tmp_name'];
move_uploaded_file($commodityImageTemp,"../img/$commodityImage");

if(empty($commodityImage)){
    $commodityImage=$commodityImageA;
}

    $commodityDescription=$_POST['commodity_description'];
    $commodityQuantity=$_POST['commodity_quantity'];
    $commodityCategory=$_POST['commodity_status'];

   
// Single Commodity Images
$targetPath="../img/";
$singleCommodityImages = $_FILES['commodity_images']['name'];
$fileName=implode(",",$singleCommodityImages);
if(!empty($singleCommodityImages)){
foreach($singleCommodityImages as $key => $val){
$targetFilePath=$targetPath.$val;
move_uploaded_file($_FILES['commodity_images']['tmp_name'][$key],$targetFilePath);
}
}

    $commodityEntryDate=$_POST['entry_date'];
if(empty($fileName)){
    $fileName=$commodityPhotosA;
}
    // $query="INSERT INTO commodity (commodity_name, commodity_price, commodity_image, commodity_description, commodity_quantity, commodity_category, commodity_photos ) 
    // VALUES('$commodityName', '$commodityPrice', '$commodityImage', '$commodityDescription', '$commodityQuantity', '$commodityCategory', '$fileName')";

$query= "UPDATE commodity SET commodity_name='$commodityName', 
commodity_price='$commodityPrice', 
commodity_image='$commodityImage', 
commodity_description='$commodityDescription', 
commodity_quantity='$commodityQuantity', 
commodity_category='$commodityCategory', 
commodity_photos='$fileName' WHERE commodity_id= $commodityId";
 

$insertCommodity=mysqli_query($connect,$query);
if(!$insertCommodity){
    die("Damn Query Failed!!!".mysqli_error($connect));
}else{
    echo "Updated Successifully";
}
}
 

?>


<form action="" method="post" enctype="multipart/form-data">
   
   <div class="form-group">
       <label for="commodityName"><b>commodityName</b></label><br>
       <input type="text" value="<?php echo  $commodityNameA?>" class="form-control" name="commodity_name" id=""></input>
    
   </div>

   <div class="form-group">
       <label for="title"><b>Commodity Price</b></label>
       <input type="text" value="<?php echo  $commodityPriceA?>" class="form-control" name="commodity_price">
   </div>

    <div class="form-group">
        
        <label for="image"><b>commodity Image</b></label><br>
        <img src="../img/<?php echo $commodityImageA?>" width="90" alt=""><br>
        <input type="file" name="commodity_image">
    </div>

    <div class="form-group">
       <label for="title"><b>Commodity Description</b></label>
       <input type="text" value="<?php echo  $commodityDescriptionA?>" class="form-control" name="commodity_description">
   </div>

   <div class="form-group">
       <label for="title"><b>Commodity Quantity</b></label>
       <input type="text" value="<?php echo  $commodityQuantityA?>"  class="form-control" name="commodity_quantity">
   </div>
       
   <div class="form-group">  <label for="category"><b>Categories</b></label><br>   
       <select class="custom-select" name="commodity_status" id="">

<?php

$query =" SELECT * FROM categories";
$allCategories=mysqli_query($connect,$query);
while($row=mysqli_fetch_assoc($allCategories)){
  $catName=$row['cat_name'];
  $catId=$row['cat_id'];
  echo "<option value='$commodityCategoryA'>$catName</option>";
}


?>
       </select>
   </div>
  
    <div class="form-group">
			<label for="image"><b>single commodity Images</b></label><br>
            <img src="../img/<?php echo $commodityPhotosA?>" width="90" alt=""><br>
			<input type="file" name="commodity_images[]" multiple>
	</div> 

    <div class="form-group">
       <label for="title"><b>Entry Date</b></label>
       <input type="date" class="form-control" name="entry_date">
   </div>

   <div class="form-group">
       <input type="submit" class="btn btn-primary" name="update_commodity" value="Update">
   </div>
</form>
