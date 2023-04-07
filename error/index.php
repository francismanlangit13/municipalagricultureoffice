<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Title -->
    <title>GrowEcommerce | 522 Connection Timed Out</title>
    <?php
        include ('../includes/header.php');
    ?>
</head>

<body id="page-top">
    <!-- Loading Screen -->
    <div id="loading">
        <img id="loading-image" src="<?php echo base_url ?>assets/img/loading.gif" alt="Loading" />
    </div>
    <!-- Page Wrapper -->
    <div id="wrapper" class="d-flex justify-content-center position-fixed w-100 h-100 align-items-center">

        <!-- Content Wrapper -->
        <div id="content-wrapper">

            <!-- Main Content -->
            <div id="content">

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- 404 Error Text -->
                    <div class="text-center">
                        <div class="error mx-auto" data-text="522">522</div>
                        <p class="lead text-gray-800 mb-5">Connection Timed Out</p>
                        <p class="text-gray-500 mb-0">It looks like you found a glitch in the connection...</p>
                        <p class="text-gray-500 mb-0">Possible problems</p>
                        <p class="text-gray-500 mb-0">&#x2022; Database connection Error</p>
                        <p class="text-gray-500 mb-0">&#x2022; Server configuration error</p>
                        <p class="text-gray-500 mb-0">&#x2022; PHP error</p>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <?php
        include ('../includes/bottom.php');
    ?>

</body>

</html>