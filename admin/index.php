<?php include "includes/adminHeader.php" ?>


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
      <li class="breadcrumb-item active"><?php

                                          echo $_SESSION['username'];

                                          ?>'s Dashboard</li>
    </ol>
    <!-- Icon Cards-->
    <div class="row">
      <div class="col-xl-3 col-sm-6 mb-3">
        <div class="card dashboard text-white bg-primary o-hidden h-100">
          <div class="card-body">
            <div class="card-body-icon">
              <i class="fa fa-fw fa-envelope-open"></i>
            </div>



            <?php

            $query = "SELECT * FROM categories";
            $allCategories = mysqli_query($connect, $query);
            $allCategoriesNum = mysqli_num_rows($allCategories);
            echo "<div class='mr-5'><h5 style='text-align:center'>" . $allCategoriesNum . " Categories" . "</h5></div>";

            ?>

          </div>
          <a class="card-footer text-white clearfix small z-1" href="categories.php">
            <span class="float-left">View Details</span>
            <span class="float-right">
              <i class="fa fa-angle-right"></i>
            </span>
          </a>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 mb-3">
        <div class="card dashboard text-white bg-warning o-hidden h-100">
          <div class="card-body">
            <div class="card-body-icon">
              <i class="fa fa-fw fa-star"></i>
            </div>
            <?php

            $query = "SELECT * FROM comments";
            $allcomments = mysqli_query($connect, $query);
            $allcommentsNum = mysqli_num_rows($allcomments);
            echo "<div class='mr-5'><h5 style='text-align:center'>" . $allcommentsNum . " Comments" . "</h5></div>";

            ?>
          </div>
          <a class="card-footer text-white clearfix small z-1" href="comments.php">
            <span class="float-left">View Details</span>
            <span class="float-right">
              <i class="fa fa-angle-right"></i>
            </span>
          </a>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 mb-3">
        <div class="card dashboard text-white bg-success o-hidden h-100">
          <div class="card-body">
            <div class="card-body-icon">
              <i class="fa fa-fw fa-calendar-check-o"></i>
            </div>


            <?php

            $query = "SELECT * FROM commodity";
            $allcommodity = mysqli_query($connect, $query);
            $allcommodityNum = mysqli_num_rows($allcommodity);
            echo "<div class='mr-5'><h5 style='text-align:center'>" . $allcommodityNum . " Commodities" . "</h5></div>";

            ?>
          </div>


          <a class="card-footer text-white clearfix small z-1" href="commodities.php">
            <span class="float-left">View Details</span>
            <span class="float-right">
              <i class="fa fa-angle-right"></i>
            </span>
          </a>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 mb-3">
        <div class="card dashboard text-white bg-danger o-hidden h-100">
          <div class="card-body">
            <div class="card-body-icon">
              <i class="fa fa-fw fa-heart"></i>
            </div>

            <?php

            $query = "SELECT * FROM users";
            $allusers = mysqli_query($connect, $query);
            $allusersNum = mysqli_num_rows($allusers);
            echo "<div class='mr-5'><h5 style='text-align:center'>" . $allusersNum . " Users" . "</h5></div>";

            ?>

          </div>
          <a class="card-footer text-white clearfix small z-1" href="users.php">
            <span class="float-left">View Details</span>
            <span class="float-right">
              <i class="fa fa-angle-right"></i>
            </span>
          </a>
        </div>
      </div>
    </div>




    <!-- /cards -->
    <h2>Graphs</h2>
    <div class="box_general padding_bottom">
      <div class="header_box version_2">
        <h2><i class="fa fa-bar-chart"></i>Statistic</h2>
      </div>

      <?php

      include "includes/databaseSelection.php";

      ?>

      <script type="text/javascript">
        google.charts.load('current', {
          'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
          var data = google.visualization.arrayToDataTable([
            ['Year', ''],


            <?php
            $elementsText = ['Categories', 'Users', 'Admins', 'Clients', 'Comments', 'ApprovedComments', 'UnApprovedComments', 'AllCommodities', 'Protains', 'Vegetables', 'Fruits', 'Others', 'Cart'];
            $elementsCount = [$allCategoriesNum, $allusersNum, $adminNum, $clientNum, $allcommentsNum, $approvedCommentsNum, $unApprovedCommentsNum, $allcommodityNum, $proteinsNum, $vegetablesNum, $fruitsNum, $cartedProductNum];
            for ($i = 0; $i < 9; $i++) {
              echo " ['$elementsText[$i]'" . "," . "$elementsCount[$i]],";
            }

            ?>
          ]);

          var options = {
            title: '',
            curveType: 'function',
            legend: {
              position: 'bottom'
            }
          };

          var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

          chart.draw(data, options);
        }
      </script>

      <div id="curve_chart" style="width: 100%; height: 500px"></div>

    </div>
  </div>
  <!-- /.container-fluid-->
</div>
<!-- /.container-wrapper-->
<?php include "includes/adminFooter.php";

?>