<?php

if (isset($_POST['create_commodity'])) {
    $commodityName = $_POST['commodity_name'];
    $commodityPrice = $_POST['commodity_price'];

    $commodityImage = $_FILES['commodity_image'];

    // Commodity Image
    $commodityImage = $_FILES['commodity_image']['name'];
    $commodityImageTemp = $_FILES['commodity_image']['tmp_name'];
    move_uploaded_file($commodityImageTemp, "../img/$commodityImage");

    $commodityDescription = $_POST['commodity_description'];
    $commodityQuantity = $_POST['commodity_quantity'];
    $commodityCategory = $_POST['commodity_status'];


    // Single Commodity Images
    $targetPath = "../img/";
    $singleCommodityImages = $_FILES['commodity_images']['name'];
    $fileName = implode(",", $singleCommodityImages);
    if (!empty($singleCommodityImages)) {
        foreach ($singleCommodityImages as $key => $val) {
            $targetFilePath = $targetPath . $val;
            move_uploaded_file($_FILES['commodity_images']['tmp_name'][$key], $targetFilePath);
        }
    }

    $commodityEntryDate = $_POST['entry_date'];

    $query = "INSERT INTO commodity (commodity_name, commodity_price, commodity_image, commodity_description, commodity_quantity, commodity_category, commodity_photos ) 
    VALUES('$commodityName', '$commodityPrice', '$commodityImage', '$commodityDescription', '$commodityQuantity', '$commodityCategory', '$fileName')";
    $insertCommodity = mysqli_query($connect, $query);
    if (!$insertCommodity) {
        die("Damn Query Failed!!!" . mysqli_error($connect));
    } else {
        echo "Inserted Successiful";
    }
}

?>


<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="commodityName"><b>commodityName</b></label><br>
        <input type="text" class="form-control" name="commodity_name" id=""></input>

    </div>

    <div class="form-group">
        <label for="title"><b>Commodity Price</b></label>
        <input type="text" class="form-control" name="commodity_price">
    </div>

    <div class="form-group">
        <label for="image"><b>commodity Image</b></label><br>
        <input type="file" name="commodity_image">
    </div>

    <div class="form-group">
        <label for="title"><b>Commodity Description</b></label>
        <input type="text" class="form-control" name="commodity_description">
    </div>

    <div class="form-group">
        <label for="title"><b>Commodity Quantity</b></label>
        <input type="text" class="form-control" name="commodity_quantity">
    </div>

    <div class="form-group"> <label for="category"><b>Categories</b></label><br>
        <select class="custom-select" name="commodity_status" id="">

            <?php

            $query = " SELECT * FROM categories";
            $allCategories = mysqli_query($connect, $query);
            while ($row = mysqli_fetch_assoc($allCategories)) {
                $catName = $row['cat_name'];
                $catId = $row['cat_id'];
                echo "<option value='$catName'>$catName</option>";
            }


            ?>
        </select>
    </div>

    <div class="form-group">
        <label for="image"><b>single commodity Images</b></label>
        <input type="file" name="commodity_images[]" multiple>
    </div>

    <div class="form-group">
        <label for="title"><b>Entry Date</b></label>
        <input type="date" class="form-control" name="entry_date">
    </div>

    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="create_commodity" value="Publish">
    </div>
</form>