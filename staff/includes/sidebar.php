 <!-- Page Wrapper -->
 <div id="wrapper">
<!-- Sidebar -->
<ul class="navbar-nav noprint bg-gradient-success sidebar sidebar-dark accordion <?php if(is_mobile){ echo 'toggled'; } else { } ?>" id="accordionSidebar">

    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url ?>staff/home" style="margin-bottom:0.5rem;">
        <div class="sidebar-brand-icon rotate-n-0" data-toggle="collapse">
            <img src="<?php echo base_url ?>assets/img/system/logo.png" alt="company_logo"
                class="img-fluid-logo navbar-brand" style="width:4vh; margin-right:0rem !important;">
        </div>
        <div class="sidebar-brand mx-1" id="myDashboard" style="display:block; font-size: 0.8rem !important;">
            MAO JIMENEZ<br><sup>STAFF</sup>
        </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?php if (strpos($_SERVER['PHP_SELF'], 'home/index.php') !== false)  { echo 'active'; } ?>">
        <a class="nav-link <?php if (strpos($_SERVER['PHP_SELF'], 'home/index.php') !== false)  { echo 'show'; } else { echo 'collapsed'; } ?>" href="<?php echo base_url ?>staff/home">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <?php
        // Count the number of records that have a "expired" status
        $sql0 = "SELECT COUNT(*) AS num_expired FROM product WHERE product_status = '1' AND exp_date < NOW()";
        $result0 = mysqli_query($con, $sql0);
        $row0 = mysqli_fetch_assoc($result0);
        $num_expired = $row0['num_expired'];
    ?>
    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item <?php if (strpos($_SERVER['PHP_SELF'], 'home/product.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/product_add.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/product_update.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/product_view.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/product_category.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/product_category_add.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/product_category_update.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/product_category_view.php') !== false)  { echo 'active'; } ?>">
        <a class="nav-link <?php if (strpos($_SERVER['PHP_SELF'], 'home/product.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/product_add.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/product_update.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/product_view.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/product_category.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/product_category_add.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/product_category_update.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/product_category_view.php') !== false)  { echo 'show'; } else { echo 'collapsed'; } ?>" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <?php if($num_expired == 0) { } else{ ?>
                <!-- Counter - Alerts -->
                <span class="badge badge-danger badge-counter new-product count-product"><?php if ($num_expired >= 9){ echo "9+";} else { echo $num_expired; } ?></span>
            <?php } ?>
            <i class="fas fa-shopping-cart"></i>
            <span>Product</span>
        </a>
        <div id="collapseUtilities" class="collapse <?php if (strpos($_SERVER['PHP_SELF'], 'home/product.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/product_add.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/product_update.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/product_view.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/product_category.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/product_category_add.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/product_category_update.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/product_category_view.php') !== false)  { echo 'show'; } else { } ?>" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Manage:</h6>
                <a class="collapse-item <?php if (strpos($_SERVER['PHP_SELF'], 'home/product.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/product_add.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/product_update.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/product_view.php') !== false)  { echo 'active'; } ?>" href="<?php echo base_url ?>staff/home/product"><i class="fas fa-box" aria-hidden="true"></i> Products
                <?php if($num_expired == 0) { } else{ ?>
                    <!-- Counter - Alerts -->
                    <span class="badge badge-danger badge-counter"><?php if ($num_expired >= 9){ echo "9+";} else { echo $num_expired; } ?></span>
                <?php } ?>
                </a>
                <a class="collapse-item <?php if (strpos($_SERVER['PHP_SELF'], 'home/product_category.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/product_category_add.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/product_category_update.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/product_category_view.php') !== false)  { echo 'active'; } ?>" href="<?php echo base_url ?>staff/home/product_category"><i class="fa fa-list-alt" aria-hidden="true"></i> Product Category</a>
            </div>
        </div>
    </li>


    <li class="nav-item <?php if (strpos($_SERVER['PHP_SELF'], 'home/farmer_account.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/farmer_add.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/farmer_view.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/farmer_update.php') !== false)  { echo 'active'; } ?>">
        <a class="nav-link collapsed" href="<?php echo base_url ?>staff/home/farmer_account
        ">
        <i class="fas fa-newspaper"></i>
            <span>Farmer Profile</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Other
    </div>

    <?php
        // Count the number of records that have a "pending" status
        $sql = "SELECT COUNT(*) AS num_concern FROM concern WHERE status_id = '1' AND concern_status = 1";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_assoc($result);
        $num_concern = $row['num_concern'];

        // Count the number of records that have a "pending" status
        $sql1 = "SELECT COUNT(*) AS num_report FROM report WHERE status_id = '1' AND report_status = 1";
        $result1 = mysqli_query($con, $sql1);
        $row1 = mysqli_fetch_assoc($result1);
        $num_report = $row1['num_report'];

        // Count the number of records that have a "pending" status
        $sql2 = "SELECT COUNT(*) AS num_request FROM request WHERE status_id = '1' AND request_status = 1";
        $result2 = mysqli_query($con, $sql2);
        $row2 = mysqli_fetch_assoc($result2);
        $num_request = $row2['num_request'];

        $total_notification = $num_concern + $num_report + $num_request;
    ?>
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item <?php if (strpos($_SERVER['PHP_SELF'], 'home/announcement.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/announcement_add.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/announcement_view.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/announcement_update.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/request.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/request_view.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/report.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/report_view.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/concern.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/concern_view.php') !== false)  { echo 'active'; } ?>">
        <a class="nav-link <?php if (strpos($_SERVER['PHP_SELF'], 'home/announcement.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/announcement_add.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/announcement_view.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/announcement_update.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/request.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/request_view.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/report.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/report_view.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/concern.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/concern_view.php') !== false)  { echo 'show'; } else { echo 'collapsed'; } ?>" href="#" data-toggle="collapse" data-target="#collapsePages"
            aria-expanded="true" aria-controls="collapsePages">
            <?php if($total_notification == 0) { } else{ ?>
                <!-- Counter - Alerts -->
                <span class="badge-new badge-danger badge-counter count"><?php if ($total_notification >= 9){ echo "9+";} else { echo $total_notification; } ?></span>
            <?php } ?>
            <i class="fas fa-cog"></i>
            <span>Other</span>
        </a>
        <div id="collapsePages" class="collapse <?php if (strpos($_SERVER['PHP_SELF'], 'home/announcement.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/announcement_add.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/announcement_view.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/announcement_update.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/request.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/request_view.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/report.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/report_view.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/concern.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/concern_view.php') !== false)  { echo 'show'; } else { } ?>" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Manage:</h6>
                <a class="collapse-item <?php if (strpos($_SERVER['PHP_SELF'], 'home/announcement.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/announcement_add.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/announcement_view.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/announcement_update.php') !== false)  { echo 'active'; } ?>" href="<?php echo base_url ?>staff/home/announcement"><i class="fa fa-bullhorn" aria-hidden="true"></i> Announcement</a>
                <a class="collapse-item <?php if (strpos($_SERVER['PHP_SELF'], 'home/request.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/request_view.php') !== false)  { echo 'active'; } ?>" href="<?php echo base_url ?>staff/home/request"><i class="fa fa-archive" aria-hidden="true"></i> Request
                    <?php if($num_request == 0) { } else{ ?>
                        <!-- Counter - Alerts -->
                        <span class="badge badge-danger badge-counter count-title"><?php if ($num_request >= 9){ echo "9+";} else { echo $num_request; } ?></span>
                    <?php } ?>
                </a>
                <a class="collapse-item <?php if (strpos($_SERVER['PHP_SELF'], 'home/report.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/report_view.php') !== false)  { echo 'active'; } ?>" href="<?php echo base_url ?>staff/home/report"><i class="fa fa-pencil-square" aria-hidden="true"></i> Report
                    <?php if($num_report == 0) { } else{ ?>
                        <!-- Counter - Alerts -->
                        <span class="badge badge-danger badge-counter count-title"><?php if ($num_report >= 9){ echo "9+";} else { echo $num_report; } ?></span>
                    <?php } ?>
                </a>
                <a class="collapse-item <?php if (strpos($_SERVER['PHP_SELF'], 'home/concern.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/concern_view.php') !== false)  { echo 'active'; } ?>" href="<?php echo base_url ?>staff/home/concern"><i class="fa fa-comment" aria-hidden="true"></i> Concern
                    <?php if($num_concern == 0) { } else{ ?>
                        <!-- Counter - Alerts -->
                        <span class="badge badge-danger badge-counter count-title"><?php if ($num_concern >= 9){ echo "9+";} else { echo $num_concern; } ?></span>
                    <?php } ?>
                </a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
   


    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" onclick="myDashboard()" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->

<script>
function myDashboard() {
  var x = document.getElementById("myDashboard");
  if (x.style.display === "none") {
    x.style.display = "block";
    var badge = document.querySelector('.badge-new');
    if (badge && badge.offsetParent !== null) {
      badge.classList.add('count');
    }
    var newProduct = document.querySelector('.new-product');
    if (newProduct && newProduct.offsetParent !== null) {
      newProduct.classList.add('count-product');
    }
  } else {
    x.style.display = "none";
    var countBadge = document.querySelector('.count');
    if (countBadge) {
      countBadge.classList.remove('count');
    }
    var countProduct = document.querySelector('.count-product');
    if (countProduct) {
      countProduct.classList.remove('count-product');
    }
  }
}

</script>
<?php if(is_mobile){ ?> 
    <style type="text/css">
        @media only screen and (min-width: 900px) {
            /* For tablets: */
            .count{
                margin-right: 7.8rem;
            }
            .count-product{
                margin-right: 7rem;
            }
        }
        @media only screen and (min-width: 600px) {
            /* For tablets: */
            .count{
                margin-right: 7.8rem;
            }
            .count-product{
                margin-right: 7rem;
            }
        }
        @media only screen and (min-width: 300px) {
            /* For mobiles: */
            .count{
                margin-right: 1.5rem;
            }
            .count-product{
                margin-right: 1.3rem;
            }
        }
    </style> 
<?php } else { ?>
    <style type="text/css">
        .count{
            margin-right: 7.8rem !important;
        }
        .count-product{
            margin-right: 7rem !important;
        }
    </style> 
<?php } ?>