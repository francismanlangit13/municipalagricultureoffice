<?php include('authentication.php');?>
<?php include('includes/header.php');?>

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
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Total Account (Farmer)</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">

                                            <?php
                                            $total_farmer = "SELECT
                                            `farmer`.*
                                        FROM
                                            `farmer`
                                        WHERE
                                            `farmer`.user_status = 1";
                                            $total_farmer_query_run = mysqli_query($con, $total_farmer);

                                            if($farmer_count = mysqli_num_rows($total_farmer_query_run))
                                            {
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
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                REQUEST</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">

                                            <?php
                                            $request = "SELECT * FROM `request`
                                        WHERE
                                            request_status = 1;";
                                            $request_query_run = mysqli_query($con, $request);

                                            if($request_cpimt = mysqli_num_rows($request_query_run))
                                            {
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
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">TOTAL CATEGORY
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">

                                                    <?php
                                            $total_category = "SELECT
                                            product_category.*
                                        FROM
                                            product_category";
                                            $total_category_query_run = mysqli_query($con, $total_category);

                                            if($category_count = mysqli_num_rows($total_category_query_run))
                                            {
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
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                TOTAL PRODUCT</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">

                                            <?php
                                            $total_product = "SELECT
                                            product.*
                                        FROM
                                            product";
                                            $total_product_query_run = mysqli_query($con, $total_product);

                                            if($total_product = mysqli_num_rows($total_product_query_run))
                                            {
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

                <?php
                                            $adorable = "SELECT
                                            farmer.barangay
                                        FROM
                                            farmer
                                        WHERE
                                            farmer.barangay = 'Adorable'";
                                            $adorable_run = mysqli_query($con, $adorable);

                                            if($total_adorable = mysqli_num_rows($adorable_run))
                                            {
                                                    $total_adorable;
                                            }
                                         

                 ?>
                 <?php
                                            $butuay = "SELECT
                                            farmer.barangay
                                        FROM
                                            farmer
                                        WHERE
                                            farmer.barangay = 'Butuay'";
                                            $butuay_run = mysqli_query($con, $butuay);

                                            if($total_butuay = mysqli_num_rows($butuay_run))
                                            {
                                                    $total_butuay;
                                            }
                                         

                 ?>
                 <?php
                                            $carmen = "SELECT
                                            farmer.barangay
                                        FROM
                                            farmer
                                        WHERE
                                            farmer.barangay = 'Carmen'";
                                            $carmen_run = mysqli_query($con, $carmen);

                                            if($total_carmen = mysqli_num_rows($carmen_run))
                                            {
                                                    $total_carmen;
                                            }
                                         

                 ?>
                 <?php
                                            $corrales = "SELECT
                                            farmer.barangay
                                        FROM
                                            farmer
                                        WHERE
                                            farmer.barangay = 'Corrales'";
                                            $corrales_run = mysqli_query($con, $corrales);

                                            if($total_corrales = mysqli_num_rows($corrales_run))
                                            {
                                                    $total_corrales;
                                            }
                                         

                 ?>
                 <?php
                                            $dicoloc = "SELECT
                                            farmer.barangay
                                        FROM
                                            farmer
                                        WHERE
                                            farmer.barangay = 'Dicoloc'";
                                            $dicoloc_run = mysqli_query($con, $dicoloc);

                                            if($total_dicoloc = mysqli_num_rows($dicoloc_run))
                                            {
                                                    $total_dicoloc;
                                            }
                                         

                 ?>
                 <?php
                                            $gata = "SELECT
                                            farmer.barangay
                                        FROM
                                            farmer
                                        WHERE
                                            farmer.barangay = 'Gata'";
                                            $gata_run = mysqli_query($con, $gata);

                                            if($total_gata = mysqli_num_rows($gata_run))
                                            {
                                                    $total_gata;
                                            }
                                         

                 ?>
                 <?php
                                            $Guintomoyan = "SELECT
                                            farmer.barangay
                                        FROM
                                            farmer
                                        WHERE
                                            farmer.barangay = 'Guintomoyan'";
                                            $Guintomoyan_run = mysqli_query($con, $Guintomoyan);

                                            if($total_Guintomoyan = mysqli_num_rows($Guintomoyan_run))
                                            {
                                                    $total_Guintomoyan;
                                            }
                                         

                 ?>
                 <?php
                                            $Malibacsan = "SELECT
                                            farmer.barangay
                                        FROM
                                            farmer
                                        WHERE
                                            farmer.barangay = 'Malibacsan'";
                                            $Malibacsan_run = mysqli_query($con, $Malibacsan);

                                            if($total_Malibacsan = mysqli_num_rows($Malibacsan_run))
                                            {
                                                    $total_Malibacsan;
                                            }
                                         

                 ?>
                 <?php
                                            $Macabayao = "SELECT
                                            farmer.barangay
                                        FROM
                                            farmer
                                        WHERE
                                            farmer.barangay = 'Macabayao'";
                                            $Macabayao_run = mysqli_query($con, $Macabayao);

                                            if($total_Macabayao = mysqli_num_rows($Macabayao_run))
                                            {
                                                    $total_Macabayao;
                                            }
                                         

                 ?>
                 <?php
                                            $Matugas_Alto = "SELECT
                                            farmer.barangay
                                        FROM
                                            farmer
                                        WHERE
                                            farmer.barangay = 'Matugas Alto'";
                                            $Matugas_Alto_run = mysqli_query($con, $Matugas_Alto);

                                            if($total_Matugas_Alto = mysqli_num_rows($Matugas_Alto_run))
                                            {
                                                    $total_Matugas_Alto;
                                            }
                                         

                 ?>
                 <?php
                                            $Matugas_Bajo = "SELECT
                                            farmer.barangay
                                        FROM
                                            farmer
                                        WHERE
                                            farmer.barangay = 'Matugas Bajo'";
                                            $Matugas_Bajo_run = mysqli_query($con, $Matugas_Bajo);

                                            if($total_Matugas_Bajo = mysqli_num_rows($Matugas_Bajo_run))
                                            {
                                                    $total_Matugas_Bajo;
                                            }
                                         

                 ?>
                 <?php
                                            $Mialem = "SELECT
                                            farmer.barangay
                                        FROM
                                            farmer
                                        WHERE
                                            farmer.barangay = 'Mialem'";
                                            $Mialem_run = mysqli_query($con, $Mialem);

                                            if($total_Mialem = mysqli_num_rows($Mialem_run))
                                            {
                                                    $total_Mialem;
                                            }
                                         

                 ?>
                 <?php
                                            $Naga = "SELECT
                                            farmer.barangay
                                        FROM
                                            farmer
                                        WHERE
                                            farmer.barangay = 'Naga'";
                                            $Naga_run = mysqli_query($con, $Naga);

                                            if($total_Naga = mysqli_num_rows($Naga_run))
                                            {
                                                    $total_Naga;
                                            }
                                         

                 ?>
                 <?php
                                            $Palilan = "SELECT
                                            farmer.barangay
                                        FROM
                                            farmer
                                        WHERE
                                            farmer.barangay = 'Palilan'";
                                            $Palilan_run = mysqli_query($con, $Palilan);

                                            if($total_Palilan = mysqli_num_rows($Palilan_run))
                                            {
                                                    $total_Palilan;
                                            }
                                         

                 ?>
                 <?php
                                            $Nacional = "SELECT
                                            farmer.barangay
                                        FROM
                                            farmer
                                        WHERE
                                            farmer.barangay = 'Nacional'";
                                            $Nacional_run = mysqli_query($con, $Nacional);

                                            if($total_Nacional = mysqli_num_rows($Nacional_run))
                                            {
                                                    $total_Nacional;
                                            }
                                         

                 ?>
                 <?php
                                            $Rizal = "SELECT
                                            farmer.barangay
                                        FROM
                                            farmer
                                        WHERE
                                            farmer.barangay = 'Rizal'";
                                            $Rizal_run = mysqli_query($con, $Rizal);

                                            if($total_Rizal = mysqli_num_rows($Rizal_run))
                                            {
                                                    $total_Rizal;
                                            }
                                         

                 ?>
                 <?php
                                            $San_Isidro = "SELECT
                                            farmer.barangay
                                        FROM
                                            farmer
                                        WHERE
                                            farmer.barangay = 'San Isidro'";
                                            $San_Isidro_run = mysqli_query($con, $San_Isidro);

                                            if($total_San_Isidro = mysqli_num_rows($San_Isidro_run))
                                            {
                                                    $total_San_Isidro;
                                            }
                                         

                 ?>
                 <?php
                                            $Santa_Cruz = "SELECT
                                            farmer.barangay
                                        FROM
                                            farmer
                                        WHERE
                                            farmer.barangay = 'Santa Cruz'";
                                            $Santa_Cruz_run = mysqli_query($con, $Santa_Cruz);

                                            if($total_Santa_Cruz = mysqli_num_rows($Santa_Cruz_run))
                                            {
                                                    $total_Santa_Cruz;
                                            }
                                         

                 ?>
                 <?php
                                            $Sibaroc = "SELECT
                                            farmer.barangay
                                        FROM
                                            farmer
                                        WHERE
                                            farmer.barangay = 'Sibaroc'";
                                            $Sibaroc_run = mysqli_query($con, $Sibaroc);

                                            if($total_Sibaroc = mysqli_num_rows($Sibaroc_run))
                                            {
                                                    $total_Sibaroc;
                                            }
                                         

                 ?>
                 <?php
                                            $Sinara_Alto = "SELECT
                                            farmer.barangay
                                        FROM
                                            farmer
                                        WHERE
                                            farmer.barangay = 'Sinara Alto'";
                                            $Sinara_Alto_run = mysqli_query($con, $Sinara_Alto);

                                            if($total_Sinara_Alto = mysqli_num_rows($Sinara_Alto_run))
                                            {
                                                    $total_Sinara_Alto;
                                            }
                                         

                 ?>
                 <?php
                                            $Sinara_Bajo = "SELECT
                                            farmer.barangay
                                        FROM
                                            farmer
                                        WHERE
                                            farmer.barangay = 'Sinara Bajo'";
                                            $Sinara_Bajo_run = mysqli_query($con, $Sinara_Bajo);

                                            if($total_Sinara_Bajo = mysqli_num_rows($Sinara_Bajo_run))
                                            {
                                                    $total_Sinara_Bajo;
                                            }
                                         

                 ?>
                 <?php
                                            $Seti = "SELECT
                                            farmer.barangay
                                        FROM
                                            farmer
                                        WHERE
                                            farmer.barangay = 'Seti'";
                                            $Seti_run = mysqli_query($con, $Seti);

                                            if($total_Seti = mysqli_num_rows($Seti_run))
                                            {
                                                    $total_Seti;
                                            }
                                         

                 ?>
                 <?php
                                            $Taboo = "SELECT
                                            farmer.barangay
                                        FROM
                                            farmer
                                        WHERE
                                            farmer.barangay = 'Tabo-o'";
                                            $Taboo_run = mysqli_query($con, $Taboo);

                                            if($total_Taboo = mysqli_num_rows($Taboo_run))
                                            {
                                                    $total_Taboo;
                                            }
                                         

                 ?>
                 <?php
                                            $Taraka = "SELECT
                                            farmer.barangay
                                        FROM
                                            farmer
                                        WHERE
                                            farmer.barangay = 'Taraka'";
                                            $Taraka_run = mysqli_query($con, $Taraka);

                                            if($total_Taraka = mysqli_num_rows($Taraka_run))
                                            {
                                                    $total_Taraka;
                                            }
                                         

                 ?>

                <!-- /.container-fluid -->
                <div
                    id="myChart" style="width:100%; max-width:auto; height:800px;">
                </div>
                <script>
                    google.charts.load('current', {'packages':['corechart']});
                    google.charts.setOnLoadCallback(drawChart);

                    function drawChart() {
                    var data = google.visualization.arrayToDataTable([
                    ['Barangay', 'Farmer',],
                    ['Adorable', <?php echo $total_adorable ?>],
                    ['Butuay', <?php echo $total_butuay ?>],
                    ['Carmen', <?php echo $total_carmen ?>],
                    ['Corrales', <?php echo $total_corrales ?>],
                    ['Dicoloc', <?php echo $total_dicoloc ?>],
                    ['Gata', <?php echo $total_gata ?>],
                    ['Guintomoyan', <?php echo $total_Guintomoyan ?>],
                    ['Malibacsan', <?php echo $total_Malibacsan ?>],
                    ['Macabayao', <?php echo $total_Macabayao ?>],
                    ['Matugas Alto', <?php echo $total_Matugas_Alto ?>],
                    ['Matugas Bajo', <?php echo $total_Matugas_Bajo ?>],
                    ['Mialem', <?php echo $total_Mialem ?>],
                    ['Naga', <?php echo $total_Naga ?>],
                    ['Palilan', <?php echo $total_Palilan ?>],
                    ['Nacional', <?php echo $total_Nacional ?>],
                    ['Rizal', <?php echo $total_Rizal ?>],
                    ['San Isidro', <?php echo $total_San_Isidro ?>],
                    ['Santa Cruz',<?php echo $total_Santa_Cruz ?>],
                    ['Sibaroc', <?php echo $total_Sibaroc ?>],
                    ['Sinara Alto', <?php echo $total_Sinara_Alto ?>],
                    ['Sinara Bajo', <?php echo $total_Sinara_Bajo ?>],
                    ['Seti', <?php echo $total_Seti ?>],
                    ['Tabo-o', <?php echo $total_Taboo ?>],
                    ['Taraka', <?php echo $total_Taraka ?>],
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
<?php include('includes/footer.php');?>