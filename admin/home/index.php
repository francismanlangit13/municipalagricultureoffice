<?php include('../includes/header.php');?>

<!-- Main Content -->
<div id="content">

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        </div>

        <!-- Content Row -->
        <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Account (Farmer)</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?php
                                        $sql = "SELECT* FROM user WHERE user_status = 1 && user_type = 3";
                                        $sql_run = mysqli_query($con, $sql);
                                        if($farmer_count = mysqli_num_rows($sql_run)){
                                            echo '<h4>'.$farmer_count.'</h4>';
                                        }
                                        else{
                                            echo '<h4>0</h4>';
                                        }
                                    ?>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user-alt fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">REQUEST</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?php
                                        $request = "SELECT * FROM `request`
                                        WHERE
                                        status_id = 1;";
                                        $request_query_run = mysqli_query($con, $request);

                                        if($request_cpimt = mysqli_num_rows($request_query_run)){
                                            echo '<h4>'.$request_cpimt.'</h4>';
                                        }
                                        else{
                                            echo '<h4>0</h4>';
                                        }
                                    ?>
                                </div>
                            </div>
                            <div class="col-auto">
                            <i class="fas fa-user-alt fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">TOTAL CATEGORY</div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                            <?php
                                                $total_category = "SELECT
                                                product_category.*
                                                FROM
                                                product_category";
                                                $total_category_query_run = mysqli_query($con, $total_category);
                                                if($category_count = mysqli_num_rows($total_category_query_run)){
                                                    echo '<h4>'.$category_count.'</h4>';
                                                }
                                                else{
                                                    echo '<h4>0</h4>';
                                                }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">TOTAL PRODUCT</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?php
                                        $total_product = "SELECT
                                        product.*
                                        FROM
                                        product";
                                        $total_product_query_run = mysqli_query($con, $total_product);
                                        if($total_product = mysqli_num_rows($total_product_query_run)){
                                            echo '<h4>'.$total_product.'</h4>';
                                        }
                                        else{
                                            echo '<h4>0</h4>';
                                        }

                                    ?>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-box fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content Row -->

        <div class="row">

    </div>
    <!-- /.container-fluid -->
    
    <div class="my-element" id="myChart"></div>
    <script>
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Barangay', 'Farmer',],
            <?php
                // Define an array of barangays to search for
                $barangays = array('Adorable', 'Butuay', 'Carmen', 'Corrales', 'Dicoloc', 'Gata', 'Guintomoyan', 'Malibacsan', 'Macabayao', 'Matugas Alto', 'Matugas Bajo', 'Mialem', 'Naga', 'Palilan', 'Nacional', 'Rizal', 'San Isidro', 'Santa Cruz', 'Sibaroc', 'Sinara Alto', 'Sinara Bajo', 'Seti', 'Tabo-o', 'Taraka',);

                // Initialize the total variable for each barangay to zero
                $total = array_fill_keys($barangays, 0);

                // Loop through the barangays array and execute a separate query for each one
                foreach ($barangays as $barangay) {
                    $query = "SELECT user.barangay FROM user WHERE user.barangay = '$barangay'";
                    $result = mysqli_query($con, $query);
                    $num_rows = mysqli_num_rows($result);
                    $total[$barangay] = $num_rows;
                }

                // Display the total count for each barangay
                foreach ($total as $barangay => $count) {
                    echo"['$barangay', $count], ";
                }
            ?>
        ]);

        var options = {
            title:'Total Farmer in Barangays'
        };

        var chart = new google.visualization.BarChart(document.getElementById('myChart'));
        chart.draw(data, options);
        }
    </script>
</div>
<!-- End of Main Content -->
<?php include('../includes/footer.php');?>
<style>
    .my-element {
        width:100%;
        height:800px;
        max-width:auto;
    }
    
    @media (min-width: 768px) {
        .my-element {
            width:100%;
            height:800px;
            max-width:auto;
        }
    }
    @media (min-width: 1200px) {
        .my-element {
            width:100%;
            height:800px;
            max-width:auto;
        }
    }
</style>