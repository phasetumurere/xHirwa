
<div class="col-xl-12">
        <h5 style="text-align: center;">View All Commodities</h5>
        <table class="table table-hover table-bordered" style="background-color: pink;">
            <tr>
                <thead>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Description</th>
                    <th>Quantity</th>
                    <th>Category</th>
                    <!-- <th>Commmodity Photos</th> -->
                    <th>Edit</th>
                    <th>Delete</th>
                </thead>
                
            </tr>
            
            <tbody>
                

                
<?php

$query = "SELECT * FROM commodity";
$allCommodities=mysqli_query($connect,$query);
while($row=mysqli_fetch_assoc($allCommodities)){
    $commodityId=$row['commodity_id'];
    $commodityName=$row['commodity_name'];
    $commodityPrice=$row['commodity_price'];
    $commodityImage=$row['commodity_image'];
    $commodityDescription=$row['commodity_description'];
    $commodityQuantity=$row['commodity_quantity'];
    $commodityCategory=$row['commodity_category'];
    // $commodityPhotos=$row['commodity_photos'];

    echo "<tr>";
    echo "<td>$commodityId</td>";
    echo "<td>$commodityName</td>";
    echo "<td>$commodityPrice</td>";
    echo "<td><img src='../img/$commodityImage' width='50' class='img-fluid'></td>";
    echo "<td>$commodityDescription</td>";
    echo "<td>$commodityQuantity</td>";
    echo "<td>$commodityCategory</td>";
    // echo "<td>$commodityPhotos</td>";
    
    echo "<td><a href='commodities.php?action=edit&&id=$commodityId' >Edit</a></td>";
    echo "<td><a href='commodities.php?action=delete&&delete_id=$commodityId' >Delete</a></td>";
    echo "</tr>";
}

// Delete Commodity
deleteCommodity();

?>

                
                
            </tbody>
        </table>
</div>