<?php include('../includes/header.php');?>

<!-- Main Content -->
<div id="content">
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <br>
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0">Dashboard</h1>      
        </div>
        <!-- Content Row -->
        <div class="row">
            <!-- Request Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <!-- Report -->
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Request SENT</div>
                                <div class="h5 mb-0 font-weight-bold"> 
                                    <?php
                                        if(isset($_SESSION['auth_user'])) 
                                        $currentUSER = $_SESSION['auth_user']['user_id'];
                                        $total_request = "SELECT `request_id`FROM `request` WHERE user_id=$currentUSER";
                                        $total_request_query_run = mysqli_query($con, $total_request);
                                        if($total_request = mysqli_num_rows($total_request_query_run)){
                                            echo '<h4>'.$total_request.'</h4>';
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
            <!-- Report -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Report SENT</div>
                                <div class="h5 mb-0 font-weight-bold">
                                    <?php
                                        if(isset($_SESSION['auth_user'])) 
                                        $currentUSER = $_SESSION['auth_user']['user_id'];
                                        $total_request = "SELECT `report_id`FROM `report` WHERE user_id=$currentUSER";
                                        $total_request_query_run = mysqli_query($con, $total_request);
                                        if($total_request = mysqli_num_rows($total_request_query_run)){
                                            echo '<h4>'.$total_request.'</h4>';
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
            <!-- Concern -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">TOTAL CONCERN SENT</div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold">
                                            <?php
                                                if(isset($_SESSION['auth_user'])) 
                                                $currentUSER = $_SESSION['auth_user']['user_id'];    
                                                $total_category = "SELECT `concern_id` FROM concern WHERE user_id=$currentUSER";
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
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">TOTAL ANNOUNCEMENT</div>
                                <div class="h5 mb-0 font-weight-bold">
                                    <?php
                                        $total_product = "SELECT `ann_id` FROM announcement";
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
    </div>
    <!-- /.container-fluid -->
    <div class="my-element" id="myChart"></div>
    <?php
        if(isset($_SESSION['auth_user'])) {
            $currentUSER = $_SESSION['auth_user']['user_id'];
            $total_category = "SELECT 'request' as category, COUNT(*) as count FROM request WHERE user_id=$currentUSER AND request_date >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)
                UNION ALL
                SELECT 'report' as category, COUNT(*) as count FROM report WHERE user_id=$currentUSER AND date_created >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)
                UNION ALL
                SELECT 'concern' as category, COUNT(*) as count FROM concern WHERE user_id=$currentUSER AND date_created >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)
            ";
            $total_category_query_run = mysqli_query($con, $total_category);
            if(mysqli_num_rows($total_category_query_run) > 0){
                echo '<script>
                        google.charts.load("current", {"packages":["corechart"]});
                        google.charts.setOnLoadCallback(drawChart);
                        function drawChart() {
                            var data = google.visualization.arrayToDataTable([
                                ["Category", "Count"],';
                while($row = mysqli_fetch_assoc($total_category_query_run)) {
                    echo '["'.$row['category'].'", '.$row['count'].'],';
                }
                echo '          ]);
                            var options = {
                                title: "Your total transactions in this month",
                            };
                            var chart = new google.visualization.BarChart(document.getElementById("myChart"));
                            chart.draw(data, options);
                        }
                    </script>';
            }
            else {
                echo '<h4>0</h4>';
            }
        }
    ?>
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