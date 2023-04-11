<!-- Page Wrapper -->
<div id="wrapper">

<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion <?php if(is_mobile){ echo 'toggled'; } else { } ?>" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon rotate-n-15">
        </div>
        <div class="sidebar-brand-text mx-3">FARMER</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?php if (strpos($_SERVER['PHP_SELF'], 'home/index.php') !== false)  { echo 'active'; } ?>">
        <a class="nav-link" href="index.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <li class="nav-item <?php if (strpos($_SERVER['PHP_SELF'], 'home/announcement.php') !== false)  { echo 'active'; } ?>">
        <a class="nav-link" href="announcement.php">
            <i class="fas fa-fw fa-table"></i>
            <span>View Announcement</span>
        </a>
    </li>

    <li class="nav-item <?php if (strpos($_SERVER['PHP_SELF'], 'home/product.php') !== false)  { echo 'active'; } ?>">
        <a class="nav-link" href="product.php">
            <i class="fas fa-fw fa-box"></i>
            <span>View Product</span>
        </a>
    </li>


    <li class="nav-item <?php if (strpos($_SERVER['PHP_SELF'], 'home/request.php') !== false)  { echo 'active'; } ?>">
        <a class="nav-link" href="request.php">
            <i class="fas fa-fw fa-poll-h"></i>
            <span>Request</span>
        </a>
    </li>

    <li class="nav-item <?php if (strpos($_SERVER['PHP_SELF'], 'home/report.php') !== false)  { echo 'active'; } ?>">
        <a class="nav-link" href="report.php">
            <i class="fas fa-fw fa-envelope-open-text"></i>
            <span>Report</span>
        </a>
    </li>

    <li class="nav-item <?php if (strpos($_SERVER['PHP_SELF'], 'home/concern.php') !== false)  { echo 'active'; } ?>">
        <a class="nav-link" href="concern.php">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Concern</span>
        </a>
    </li>

    <li class="nav-item <?php if (strpos($_SERVER['PHP_SELF'], 'home/generate_qr.php') !== false)  { echo 'active'; } ?>">
        <a class="nav-link" href="generate_qr.php">
            <i class="fas fa-fw fa-qrcode"></i>
            <span>Generate QR Code</span>
        </a>
    </li>

    <li class="nav-item <?php if (strpos($_SERVER['PHP_SELF'], 'home/generate_report.php') !== false)  { echo 'active'; } ?>">
        <a class="nav-link" href="generate_report.php">
            <i class="fas fa-fw fa-qrcode"></i>
            <span>Generate Report</span>
        </a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">


    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->