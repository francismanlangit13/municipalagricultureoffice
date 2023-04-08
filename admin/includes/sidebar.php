 <!-- Page Wrapper -->
 <div id="wrapper">

<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url ?>admin/home">
        <div class="sidebar-brand-icon rotate-n-15">
        </div>
        <div class="sidebar-brand-text mx-3" style="font-size: larger;">ADMIN</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?php if (strpos($_SERVER['PHP_SELF'], 'home/index.php') !== false)  { echo 'active'; } ?>">
        <a class="nav-link <?php if (strpos($_SERVER['PHP_SELF'], 'home/index.php') !== false)  { echo 'show'; } else { echo 'collapsed'; } ?>" href="<?php echo base_url ?>admin/home">
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

    <li class="nav-item <?php if (strpos($_SERVER['PHP_SELF'], 'home/user.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/user_add.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/user_view.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/user_update.php') !== false)  { echo 'active'; } ?>">
        <a class="nav-link <?php if (strpos($_SERVER['PHP_SELF'], 'home/user.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/user_add.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/user_view.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/user_update.php') !== false)  { echo 'show'; } else { echo 'collapsed'; } ?>" href="#" data-toggle="collapse" data-target="#account"
            aria-expanded="true" aria-controls="account">
            <i class="fas fa-user-circle"></i>
            <span>Accounts</span>
        </a>
        <div id="account" class="collapse <?php if (strpos($_SERVER['PHP_SELF'], 'home/user.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/user_add.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/user_view.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/user_update.php') !== false)  { echo 'show'; } else { } ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Manage:</h6>
                <!-- <a class="collapse-item" href="farmer_account.php">Farmer</a> -->
                <a class="collapse-item <?php if (strpos($_SERVER['PHP_SELF'], 'home/user.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/user_add.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/user_view.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/user_update.php') !== false) { echo 'active'; } ?>" href="<?php echo base_url ?>admin/home/user.php">Users</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item <?php if (strpos($_SERVER['PHP_SELF'], 'home/manage_product.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/manage_product_add.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/manage_product_update.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/manage_product_view.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/product_category.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/product_category_add.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/product_category_edit.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/product_category_view.php') !== false)  { echo 'active'; } ?>">
        <a class="nav-link <?php if (strpos($_SERVER['PHP_SELF'], 'home/manage_product.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/manage_product_add.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/manage_product_update.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/manage_product_view.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/product_category.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/product_category_add.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/product_category_edit.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/product_category_view.php') !== false)  { echo 'show'; } else { echo 'collapsed'; } ?>" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-shopping-cart"></i>
            <span>Product</span>
        </a>
        <div id="collapseUtilities" class="collapse <?php if (strpos($_SERVER['PHP_SELF'], 'home/manage_product.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/manage_product_add.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/manage_product_update.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/manage_product_view.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/product_category.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/product_category_add.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/product_category_edit.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/product_category_view.php') !== false)  { echo 'show'; } else { } ?>" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Manage:</h6>
                <a class="collapse-item <?php if (strpos($_SERVER['PHP_SELF'], 'home/manage_product.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/manage_product_add.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/manage_product_update.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/manage_product_view.php') !== false)  { echo 'active'; } ?>" href="<?php echo base_url ?>admin/home/manage_product.php">Manage Products</a>
                <a class="collapse-item <?php if (strpos($_SERVER['PHP_SELF'], 'home/product_category.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/product_category_add.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/product_category_edit.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/product_category_view.php') !== false)  { echo 'active'; } ?>" href="<?php echo base_url ?>admin/home/product_category.php">Product Category</a>
            </div>
        </div>
    </li>


    <li class="nav-item <?php if (strpos($_SERVER['PHP_SELF'], 'home/farmer_account.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/farmer_add.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/farmer_view.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/farmer_update.php') !== false)  { echo 'active'; } ?>">
        <a class="nav-link collapsed" href="<?php echo base_url ?>admin/home/farmer_account.php">
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

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item <?php if (strpos($_SERVER['PHP_SELF'], 'home/announcement.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/announcement_add.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/request.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/request_view.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/report.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/report_view.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/concern.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/concern_view.php') !== false)  { echo 'active'; } ?>">
        <a class="nav-link <?php if (strpos($_SERVER['PHP_SELF'], 'home/announcement.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/announcement_add.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/request.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/request_view.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/report.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/report_view.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/concern.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/concern_view.php') !== false)  { echo 'show'; } else { echo 'collapsed'; } ?>" href="#" data-toggle="collapse" data-target="#collapsePages"
            aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-cog"></i>
            <span>Other</span>
        </a>
        <div id="collapsePages" class="collapse <?php if (strpos($_SERVER['PHP_SELF'], 'home/announcement.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/announcement_add.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/request.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/request_view.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/report.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/report_view.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/concern.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/concern_view.php') !== false)  { echo 'show'; } else { } ?>" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Manage:</h6>
                <a class="collapse-item <?php if (strpos($_SERVER['PHP_SELF'], 'home/announcement.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/announcement_add.php') !== false)  { echo 'active'; } ?>" href="<?php echo base_url ?>admin/home/announcement.php">Announcement</a>
                <a class="collapse-item <?php if (strpos($_SERVER['PHP_SELF'], 'home/request.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/request_view.php') !== false)  { echo 'active'; } ?>" href="<?php echo base_url ?>admin/home/request.php">Request</a>
                <a class="collapse-item <?php if (strpos($_SERVER['PHP_SELF'], 'home/report.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/report_view.php') !== false)  { echo 'active'; } ?>" href="<?php echo base_url ?>admin/home/report.php">Report</a>
                <a class="collapse-item <?php if (strpos($_SERVER['PHP_SELF'], 'home/concern.php') !== false || strpos($_SERVER['PHP_SELF'], 'home/concern_view.php') !== false)  { echo 'active'; } ?>" href="<?php echo base_url ?>admin/home/concern.php">Concern</a>
            </div>
        </div>
    </li>

    <li class="nav-item <?php if (strpos($_SERVER['PHP_SELF'], 'home/database.php') !== false)  { echo 'active'; } ?>">
        <a class="nav-link <?php if (strpos($_SERVER['PHP_SELF'], 'home/database.php') !== false)  { echo 'show'; } else { echo 'collapsed'; } ?>" href="#" data-toggle="collapse" data-target="#collapseMaintainence"
            aria-expanded="true" aria-controls="collapseMaintainence">
            <i class="fas fa-cog"></i>
            <span>Maintenance</span>
        </a>
        <div id="collapseMaintainence" class="collapse <?php if (strpos($_SERVER['PHP_SELF'], 'home/database.php') !== false)  { echo 'show'; } else { } ?>" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Manage:</h6>
                <a class="collapse-item <?php if (strpos($_SERVER['PHP_SELF'], 'home/database.php') !== false)  { echo 'active'; } ?>" href="<?php echo base_url ?>admin/home/database.php">Database</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <li class="nav-item <?php if (strpos($_SERVER['PHP_SELF'], 'home/generatereport.php') !== false)  { echo 'active'; } ?>">
        <a class="nav-link collapsed" href="<?php echo base_url ?>admin/home/generatereport.php">
        <i class="fas fa-newspaper"></i>
            <span>Generate Report</span>
        </a>
    </li>
   


    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->