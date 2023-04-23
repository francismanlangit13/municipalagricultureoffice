<!-- Page Wrapper -->
<div id="wrapper">

<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion <?php if(is_mobile){ echo 'toggled'; } else { } ?>" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url ?>farmer/home">
        <div class="sidebar-brand-icon rotate-n-0" data-toggle="collapse">
            <img src="<?php echo base_url ?>assets/img/system/logo.png" alt="company_logo"
                class="img-fluid-logo navbar-brand" style="width:4vh; margin-right:0rem !important;">
        </div>
        <div class="sidebar-brand mx-1" id="myDashboard" style="display:block; font-size: 0.8rem !important;">
            <sup>MAO</sup>JIMENEZ
        </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?php if (strpos($_SERVER['PHP_SELF'], 'home/index.php') !== false)  { echo 'active'; } ?>">
        <a class="nav-link" href="<?php echo base_url ?>farmer/home">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>
    <?php
        $sql0 = "SELECT COUNT(*) AS num_ann FROM announcement WHERE ann_date >= DATE_SUB(NOW(), INTERVAL 2 DAY)";
        $result0 = mysqli_query($con, $sql0);
        $row0 = mysqli_fetch_assoc($result0);
        $num_ann = $row0['num_ann'];        
    ?>
    <li class="nav-item <?php if (strpos($_SERVER['PHP_SELF'], 'home/announcement.php') !== false)  { echo 'active'; } ?>">
        <a class="nav-link" href="<?php echo base_url ?>farmer/home/announcement">
            <?php if($num_ann == 0) { } else{ ?>
                <!-- Counter - Alerts -->
                <span class="badge badge-danger badge-counter count-ann"><?php if ($num_ann >= 99){ echo "99+";} else { echo $num_ann; } ?></span>
            <?php } ?>
            <i class="fa fa-bullhorn"></i>
            <span>View Announcement</span>
        </a>
    </li>

    <li class="nav-item <?php if (strpos($_SERVER['PHP_SELF'], 'home/product.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/product_view.php') !== false)  { echo 'active'; } ?>">
        <a class="nav-link" href="<?php echo base_url ?>farmer/home/product">
            <i class="fas fa-fw fa-box"></i>
            <span>View Product</span>
        </a>
    </li>


    <li class="nav-item <?php if (strpos($_SERVER['PHP_SELF'], 'home/request.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/request_add.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/request_view.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/request_update.php') !== false)  { echo 'active'; } ?>">
        <a class="nav-link" href="<?php echo base_url ?>farmer/home/request">
            <i class="fa fa-archive"></i>
            <span>Request</span>
        </a>
    </li>

    <li class="nav-item <?php if (strpos($_SERVER['PHP_SELF'], 'home/report.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/report_add.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/report_view.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/report_update.php') !== false)  { echo 'active'; } ?>">
        <a class="nav-link" href="<?php echo base_url ?>farmer/home/report">
            <i class="fa fa-pencil-square"></i>
            <span>Report</span>
        </a>
    </li>

    <li class="nav-item <?php if (strpos($_SERVER['PHP_SELF'], 'home/concern.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/concern_add.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/concern_view.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/concern_update.php') !== false)  { echo 'active'; } ?>">
        <a class="nav-link" href="<?php echo base_url ?>farmer/home/concern">
            <i class="fa fa-comment"></i>
            <span>Concern</span>
        </a>
    </li>

    <li class="nav-item <?php if (strpos($_SERVER['PHP_SELF'], 'home/generate_qr.php') !== false)  { echo 'active'; } ?>">
        <a class="nav-link" href="<?php echo base_url ?>farmer/home/generate_qr">
            <i class="fas fa-fw fa-qrcode"></i>
            <span>Generate QR Code</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
    <li class="nav-item <?php if (strpos($_SERVER['PHP_SELF'], 'home/generate_announcement.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/generate_report.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/generate_concern.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/generate_product.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/generate_request.php') !== false)  { echo 'active'; } ?>">
        <a class="nav-link <?php if (strpos($_SERVER['PHP_SELF'], 'home/generate_announcement.php') !== false ||strpos($_SERVER['PHP_SELF'], 'home/generate_report.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/generate_concern.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/generate_product.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/generate_request.php') !== false)  { echo 'show'; } else { echo 'collapsed'; } ?>" href="#" data-toggle="collapse" data-target="#collapseGenerate"
            aria-expanded="true" aria-controls="collapseGenerate">
            <i class="fas fa-newspaper"></i>
            <span>Generate</span>
        </a>
        <div id="collapseGenerate" class="collapse <?php if (strpos($_SERVER['PHP_SELF'], 'home/generate_announcement.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/generate_report.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/generate_concern.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/generate_product.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/generate_request.php') !== false)  { echo 'show'; } else { } ?>" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Manage:</h6>
                <a class="collapse-item <?php if (strpos($_SERVER['PHP_SELF'], 'home/generate_announcement.php') !== false)  { echo 'active'; } ?>" href="<?php echo base_url ?>farmer/home/generate_announcement"><i class="fa fa-file-text" aria-hidden="true"></i> Announcement</a>
                <a class="collapse-item <?php if (strpos($_SERVER['PHP_SELF'], 'home/generate_concern.php') !== false)  { echo 'active'; } ?>" href="<?php echo base_url ?>farmer/home/generate_concern"><i class="fa fa-file-text" aria-hidden="true"></i> Concern</a>
                <a class="collapse-item <?php if (strpos($_SERVER['PHP_SELF'], 'home/generate_report.php') !== false)  { echo 'active'; } ?>" href="<?php echo base_url ?>farmer/home/generate_report"><i class="fa fa-file-text" aria-hidden="true"></i> Report</a>
                <a class="collapse-item <?php if (strpos($_SERVER['PHP_SELF'], 'home/generate_request.php') !== false)  { echo 'active'; } ?>" href="<?php echo base_url ?>farmer/home/generate_request"><i class="fa fa-file-text" aria-hidden="true"></i> Request</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">


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
    } else {
        x.style.display = "none";
    }
}
// Get the announcement link and the counter alerts element
const announcementLink = document.querySelector('.nav-link[href="<?php echo base_url ?>farmer/home/announcement"]');
const counterAlerts = document.querySelector('.count-ann');

// Check if the user has clicked the announcement before
if (localStorage.getItem('announcementClicked')) {
  counterAlerts.style.display = 'none';
}

// Add a click event listener to the announcement link
announcementLink.addEventListener('click', function() {
  // Hide the counter alerts element
  counterAlerts.style.display = 'none';
  
  // Save the user's click in localStorage
  localStorage.setItem('announcementClicked', true);
});
</script>
<?php if(is_mobile){ ?> 
    <style type="text/css">
        @media only screen and (min-width: 900px) {
            /* For tablets: */
            .count-ann{
                margin-right: 2rem;
            }
        }
        @media only screen and (min-width: 600px) {
            /* For tablets: */
            .count-ann{
                margin-right: 2rem;
            }
        }
        @media only screen and (min-width: 300px) {
            /* For mobiles: */
            .count-ann{
                margin-right: 1.5rem;
            }
        }
    </style> 
<?php } else { ?>
    <style type="text/css">
        .count-ann{
            margin-right: 2rem;
        }
    </style> 
<?php } ?>