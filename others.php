

    
<?php include "includes/header.php"?>

<div id="page">
    
<?php include "includes/navigation.php"?>
<!-- /header -->
<main>
<section id="hero_in" class="courses">
    <div class="wrapper bg_color_3" >
        <div class="container margin_60_35">
            <h1 class="fadeInUp"><span></span>xHirwa's Available non Food stuff commodities </h1>
        </div>
    </div>
</section>

<?php
//Ibitera Imbaraga


//Imboga
$query="SELECT * FROM commodity WHERE commodity_category = 'others'";
$allProducts=mysqli_query($connect,$query);
while($row=mysqli_fetch_assoc($allProducts)){
$names = $row['commodity_name'];
$commodityId=$row['commodity_id'];
$price = $row['commodity_price'];
$image= $row['commodity_image'];
$description=$row['commodity_description'];
$quantity=$row['commodity_quantity'];

?>
                    
                    



    <div class="bg_color_3">
            <div class="container margin_60_35">
                <div class="row">                                  
                    <div class="col-md-12" style="text-align: center">
                    <a href="index.php?commodity_id=<?php echo $commodityId?> && commodity_name = <?php echo $names?>">
                    <?php echo $description ." at " .$price. "Rwf". " Kumufungo"."<br>";?>
                                            
                    <img src="img/<?php echo $image?>" class="img-fluid" alt="boy">

                    </a>
                    </div>
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <?php


} ?>
    </div>    
</main>    
    <?php include "includes/footer.php"?>

    