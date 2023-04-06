 <!-- Page Wrapper -->
 <div id="wrapper">

<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon rotate-n-15">
        </div>
        <div class="sidebar-brand-text mx-3" style="font-size: larger;">ADMIN</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?php if (strpos($_SERVER['PHP_SELF'], '/admin/index.php') !== false)  { echo 'active'; } ?>">
        <a class="nav-link <?php if (strpos($_SERVER['PHP_SELF'], '/admin/user.php') !== false)  { echo 'show'; } else { echo 'collapsed'; } ?>" href="index.php">
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

    <li class="nav-item <?php if (strpos($_SERVER['PHP_SELF'], '/admin/user.php') !== false || strpos($_SERVER['PHP_SELF'], '/admin/user_add.php') !== false || strpos($_SERVER['PHP_SELF'], '/admin/user_view.php') !== false || strpos($_SERVER['PHP_SELF'], '/admin/user_update.php') !== false)  { echo 'active'; } ?>">
        <a class="nav-link <?php if (strpos($_SERVER['PHP_SELF'], '/admin/user.php') !== false || strpos($_SERVER['PHP_SELF'], '/admin/user_add.php') !== false || strpos($_SERVER['PHP_SELF'], '/admin/user_view.php') !== false || strpos($_SERVER['PHP_SELF'], '/admin/user_update.php') !== false)  { echo 'show'; } else { echo 'collapsed'; } ?>" href="#" data-toggle="collapse" data-target="#account"
            aria-expanded="true" aria-controls="account">
            <i class="fas fa-user-circle"></i>
            <span>Accounts</span>
        </a>
        <div id="account" class="collapse <?php if (strpos($_SERVER['PHP_SELF'], '/admin/user.php') !== false || strpos($_SERVER['PHP_SELF'], '/admin/user_add.php') !== false || strpos($_SERVER['PHP_SELF'], '/admin/user_view.php') !== false || strpos($_SERVER['PHP_SELF'], '/admin/user_update.php') !== false)  { echo 'show'; } else { } ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Manage:</h6>
                <!-- <a class="collapse-item" href="farmer_account.php">Farmer</a> -->
                <a class="collapse-item <?php if (strpos($_SERVER['PHP_SELF'], '/admin/user.php') !== false || strpos($_SERVER['PHP_SELF'], '/admin/user_add.php') !== false || strpos($_SERVER['PHP_SELF'], '/admin/user_view.php') !== false || strpos($_SERVER['PHP_SELF'], '/admin/user_update.php') !== false) { echo 'active'; } ?>" href="user.php">Users</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item <?php if (strpos($_SERVER['PHP_SELF'], '/admin/manage_product.php') !== false || strpos($_SERVER['PHP_SELF'], '/admin/manage_product_add.php') !== false || strpos($_SERVER['PHP_SELF'], '/admin/manage_product_update.php') !== false || strpos($_SERVER['PHP_SELF'], '/admin/manage_product_view.php') !== false || strpos($_SERVER['PHP_SELF'], '/admin/product_category.php') !== false || strpos($_SERVER['PHP_SELF'], '/admin/product_category_add.php') !== false || strpos($_SERVER['PHP_SELF'], '/admin/product_category_edit.php') !== false || strpos($_SERVER['PHP_SELF'], '/admin/product_category_view.php') !== false)  { echo 'active'; } ?>">
        <a class="nav-link <?php if (strpos($_SERVER['PHP_SELF'], '/admin/manage_product.php') !== false || strpos($_SERVER['PHP_SELF'], '/admin/manage_product_add.php') !== false || strpos($_SERVER['PHP_SELF'], '/admin/manage_product_update.php') !== false || strpos($_SERVER['PHP_SELF'], '/admin/manage_product_view.php') !== false || strpos($_SERVER['PHP_SELF'], '/admin/product_category.php') !== false || strpos($_SERVER['PHP_SELF'], '/admin/product_category_add.php') !== false || strpos($_SERVER['PHP_SELF'], '/admin/product_category_edit.php') !== false || strpos($_SERVER['PHP_SELF'], '/admin/product_category_view.php') !== false)  { echo 'show'; } else { echo 'collapsed'; } ?>" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-shopping-cart"></i>
            <span>Product</span>
        </a>
        <div id="collapseUtilities" class="collapse <?php if (strpos($_SERVER['PHP_SELF'], '/admin/manage_product.php') !== false || strpos($_SERVER['PHP_SELF'], '/admin/manage_product_add.php') !== false || strpos($_SERVER['PHP_SELF'], '/admin/manage_product_update.php') !== false || strpos($_SERVER['PHP_SELF'], '/admin/manage_product_view.php') !== false || strpos($_SERVER['PHP_SELF'], '/admin/product_category.php') !== false || strpos($_SERVER['PHP_SELF'], '/admin/product_category_add.php') !== false || strpos($_SERVER['PHP_SELF'], '/admin/product_category_edit.php') !== false || strpos($_SERVER['PHP_SELF'], '/admin/product_category_view.php') !== false)  { echo 'show'; } else { } ?>" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Manage:</h6>
                <a class="collapse-item <?php if (strpos($_SERVER['PHP_SELF'], '/admin/manage_product.php') !== false || strpos($_SERVER['PHP_SELF'], '/admin/manage_product_add.php') !== false || strpos($_SERVER['PHP_SELF'], '/admin/manage_product_update.php') !== false || strpos($_SERVER['PHP_SELF'], '/admin/manage_product_view.php') !== false)  { echo 'active'; } ?>" href="manage_product.php">Manage Products</a>
                <a class="collapse-item <?php if (strpos($_SERVER['PHP_SELF'], '/admin/product_category.php') !== false || strpos($_SERVER['PHP_SELF'], '/admin/product_category_add.php') !== false || strpos($_SERVER['PHP_SELF'], '/admin/product_category_edit.php') !== false || strpos($_SERVER['PHP_SELF'], '/admin/product_category_view.php') !== false)  { echo 'active'; } ?>" href="product_category.php">Product Category</a>
            </div>
        </div>
    </li>


    <li class="nav-item <?php if (strpos($_SERVER['PHP_SELF'], '/admin/farmer_account.php') !== false || strpos($_SERVER['PHP_SELF'], '/admin/farmer_add.php') !== false || strpos($_SERVER['PHP_SELF'], '/admin/farmer_view.php') !== false || strpos($_SERVER['PHP_SELF'], '/admin/farmer_update.php') !== false)  { echo 'active'; } ?>">
        <a class="nav-link collapsed" href="farmer_account.php">
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
    <li class="nav-item <?php if (strpos($_SERVER['PHP_SELF'], '/admin/announcement.php') !== false || strpos($_SERVER['PHP_SELF'], '/admin/announcement_add.php') !== false || strpos($_SERVER['PHP_SELF'], '/admin/request.php') !== false || strpos($_SERVER['PHP_SELF'], '/admin/request_view.php') !== false || strpos($_SERVER['PHP_SELF'], '/admin/report.php') !== false || strpos($_SERVER['PHP_SELF'], '/admin/report_view.php') !== false || strpos($_SERVER['PHP_SELF'], '/admin/concern.php') !== false || strpos($_SERVER['PHP_SELF'], '/admin/concern_view.php') !== false)  { echo 'active'; } ?>">
        <a class="nav-link <?php if (strpos($_SERVER['PHP_SELF'], '/admin/announcement.php') !== false || strpos($_SERVER['PHP_SELF'], '/admin/announcement_add.php') !== false || strpos($_SERVER['PHP_SELF'], '/admin/request.php') !== false || strpos($_SERVER['PHP_SELF'], '/admin/request_view.php') !== false || strpos($_SERVER['PHP_SELF'], '/admin/report.php') !== false || strpos($_SERVER['PHP_SELF'], '/admin/report_view.php') !== false || strpos($_SERVER['PHP_SELF'], '/admin/concern.php') !== false || strpos($_SERVER['PHP_SELF'], '/admin/concern_view.php') !== false)  { echo 'show'; } else { echo 'collapsed'; } ?>" href="#" data-toggle="collapse" data-target="#collapsePages"
            aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-cog"></i>
            <span>Other</span>
        </a>
        <div id="collapsePages" class="collapse <?php if (strpos($_SERVER['PHP_SELF'], '/admin/announcement.php') !== false || strpos($_SERVER['PHP_SELF'], '/admin/announcement_add.php') !== false || strpos($_SERVER['PHP_SELF'], '/admin/request.php') !== false || strpos($_SERVER['PHP_SELF'], '/admin/request_view.php') !== false || strpos($_SERVER['PHP_SELF'], '/admin/report.php') !== false || strpos($_SERVER['PHP_SELF'], '/admin/report_view.php') !== false || strpos($_SERVER['PHP_SELF'], '/admin/concern.php') !== false || strpos($_SERVER['PHP_SELF'], '/admin/concern_view.php') !== false)  { echo 'show'; } else { } ?>" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Manage:</h6>
                <a class="collapse-item <?php if (strpos($_SERVER['PHP_SELF'], '/admin/announcement.php') !== false || strpos($_SERVER['PHP_SELF'], '/admin/announcement_add.php') !== false)  { echo 'active'; } ?>" href="announcement.php">Announcement</a>
                <a class="collapse-item <?php if (strpos($_SERVER['PHP_SELF'], '/admin/request.php') !== false || strpos($_SERVER['PHP_SELF'], '/admin/request_view.php') !== false)  { echo 'active'; } ?>" href="request.php">Request</a>
                <a class="collapse-item <?php if (strpos($_SERVER['PHP_SELF'], '/admin/report.php') !== false || strpos($_SERVER['PHP_SELF'], '/admin/report_view.php') !== false)  { echo 'active'; } ?>" href="report.php">Report</a>
                <a class="collapse-item <?php if (strpos($_SERVER['PHP_SELF'], '/admin/concern.php') !== false || strpos($_SERVER['PHP_SELF'], '/admin/concern_view.php') !== false)  { echo 'active'; } ?>" href="concern.php">Concern</a>
            </div>
        </div>
    </li>

    <li class="nav-item <?php if (strpos($_SERVER['PHP_SELF'], '/admin/database.php') !== false)  { echo 'active'; } ?>">
        <a class="nav-link <?php if (strpos($_SERVER['PHP_SELF'], '/admin/database.php') !== false)  { echo 'show'; } else { echo 'collapsed'; } ?>" href="#" data-toggle="collapse" data-target="#collapseMaintainence"
            aria-expanded="true" aria-controls="collapseMaintainence">
            <i class="fas fa-cog"></i>
            <span>Maintenance</span>
        </a>
        <div id="collapseMaintainence" class="collapse <?php if (strpos($_SERVER['PHP_SELF'], '/admin/database.php') !== false)  { echo 'show'; } else { } ?>" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Manage:</h6>
                <a class="collapse-item <?php if (strpos($_SERVER['PHP_SELF'], '/admin/database.php') !== false)  { echo 'active'; } ?>" href="database.php">Database</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <li class="nav-item <?php if (strpos($_SERVER['PHP_SELF'], '/admin/generatereport.php') !== false)  { echo 'active'; } ?>">
        <a class="nav-link collapsed" href="generatereport.php">
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