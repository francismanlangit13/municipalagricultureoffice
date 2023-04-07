<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="./">
        <div class="sidebar-brand-icon rotate-n-0" data-toggle="collapse">
            <img src="<?php echo base_url ?>assets/img/company_logo.png" alt="company_logo"
                class="img-fluid-logo navbar-brand" style="width:4vh; margin-right:0rem !important;">
        </div>
        <div class="sidebar-brand mx-1" id="myDashboard" style="display:block; font-size: 0.8rem !important;">
            <sup>Grow</sup>Ecommcerce
        </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?php if (strpos($_SERVER['PHP_SELF'], '/admin/dashboard') !== false) { echo 'active'; } ?>">
        <a class="nav-link" href="../dashboard">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading d-none">
        Interface
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item d-none">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
            aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Components</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Components:</h6>
                <a class="collapse-item" href="buttons.html">Buttons</a>
                <a class="collapse-item" href="cards.html">Cards</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item d-none">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Utilities</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Utilities:</h6>
                <a class="collapse-item" href="utilities-color.html">Colors</a>
                <a class="collapse-item" href="utilities-border.html">Borders</a>
                <a class="collapse-item" href="utilities-animation.html">Animations</a>
                <a class="collapse-item" href="utilities-other.html">Other</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none">

    <!-- Heading -->
    <div class="sidebar-heading">
        Addons
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item d-none">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
            aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Pages</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Login Screens:</h6>
                <a class="collapse-item" href="login.html">Login</a>
                <a class="collapse-item" href="register.html">Register</a>
                <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                <div class="collapse-divider"></div>
                <h6 class="collapse-header">Other Pages:</h6>
                <a class="collapse-item" href="404.html">404 Page</a>
                <a class="collapse-item" href="blank.html">Blank Page</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Import Collapse Menu -->
    <li class="nav-item 
        <?php if (strpos($_SERVER['PHP_SELF'], '/admin/aliasSKU') !== false ||
            strpos($_SERVER['PHP_SELF'], '/admin/gecSKU') !== false ||
            strpos($_SERVER['PHP_SELF'], '/admin/homedepotSKU') !== false ||
            strpos($_SERVER['PHP_SELF'], '/admin/omsidsSKU') !== false ||
            strpos($_SERVER['PHP_SELF'], '/admin/inventoryQty') !== false  ||
            strpos($_SERVER['PHP_SELF'], '/admin/inventory') !== false ||
            strpos($_SERVER['PHP_SELF'], '/admin/item_management') !== false ||
            strpos($_SERVER['PHP_SELF'], '/admin/new_items') !== false ||
            strpos($_SERVER['PHP_SELF'], '/admin/OverStock') !== false ||
            strpos($_SERVER['PHP_SELF'], '/admin/purchase_orders') !== false ||
            strpos($_SERVER['PHP_SELF'], '/admin/StarHome') !== false ||
            strpos($_SERVER['PHP_SELF'], '/admin/Wayfair') !== false)  { echo 'active'; }
        ?>">
        <a class="nav-link
            <?php if (strpos($_SERVER['PHP_SELF'], '/admin/aliasSKU') !== false ||
                strpos($_SERVER['PHP_SELF'], '/admin/gecSKU') !== false ||
                strpos($_SERVER['PHP_SELF'], '/admin/homedepotSKU') !== false ||
                strpos($_SERVER['PHP_SELF'], '/admin/omsidsSKU') !== false ||
                strpos($_SERVER['PHP_SELF'], '/admin/inventoryQty') !== false ||
                strpos($_SERVER['PHP_SELF'], '/admin/inventory') !== false ||
                strpos($_SERVER['PHP_SELF'], '/admin/item_management') !== false ||
                strpos($_SERVER['PHP_SELF'], '/admin/new_items') !== false ||
                strpos($_SERVER['PHP_SELF'], '/admin/OverStock') !== false ||
                strpos($_SERVER['PHP_SELF'], '/admin/purchase_orders') !== false ||
                strpos($_SERVER['PHP_SELF'], '/admin/StarHome') !== false ||
                strpos($_SERVER['PHP_SELF'], '/admin/Wayfair') !== false)  { } else { echo 'collapsed'; }
            ?>" href="#" data-toggle="collapse" data-target="#collapseImports" aria-expanded="true"
            aria-controls="collapseImports">
            <i class="fas fa-fw fa-file-import"></i>
            <span>Import</span>
        </a>
        <div id="collapseImports" class="collapse 
            <?php if (strpos($_SERVER['PHP_SELF'], '/admin/aliasSKU') !== false ||
                strpos($_SERVER['PHP_SELF'], '/admin/gecSKU') !== false ||
                strpos($_SERVER['PHP_SELF'], '/admin/homedepotSKU') !== false ||
                strpos($_SERVER['PHP_SELF'], '/admin/omsidsSKU') !== false ||
                strpos($_SERVER['PHP_SELF'], '/admin/inventoryQty') !== false ||
                strpos($_SERVER['PHP_SELF'], '/admin/item_management') !== false ||
                strpos($_SERVER['PHP_SELF'], '/admin/inventory') !== false ||
                strpos($_SERVER['PHP_SELF'], '/admin/new_items') !== false ||
                strpos($_SERVER['PHP_SELF'], '/admin/OverStock') !== false ||
                strpos($_SERVER['PHP_SELF'], '/admin/purchase_orders') !== false ||
                strpos($_SERVER['PHP_SELF'], '/admin/StarHome') !== false ||
                strpos($_SERVER['PHP_SELF'], '/admin/Wayfair') !== false)  { echo 'show'; }
            ?>" aria-labelledby="headingImports" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Import Section</h6>
                <!-- <a class="collapse-item <?php if (strpos($_SERVER['PHP_SELF'], '/admin/aliasSKU') !== false) { echo 'active'; } ?>"
                    href="../aliasSKU">Alias</a>
                <a class="collapse-item <?php if (strpos($_SERVER['PHP_SELF'], '/admin/gecSKU') !== false) { echo 'active'; } ?>"
                    href="../gecSKU">GEC SKU</a>
                <a class="collapse-item <?php if (strpos($_SERVER['PHP_SELF'], '/admin/homedepotSKU') !== false) { echo 'active'; } ?>"
                    href="../homedepotSKU">HomeDepot SKU</a>
                <a class="collapse-item <?php if (strpos($_SERVER['PHP_SELF'], '/admin/inventoryQty') !== false) { echo 'active'; } ?>"
                    href="../inventoryQty">Inventory Quantity</a> -->
                <a class="collapse-item <?php if (strpos($_SERVER['PHP_SELF'], '/admin/inventory') !== false) { echo 'active'; } ?>"
                    href="../inventory">Inventory</a>
                <a class="collapse-item <?php if (strpos($_SERVER['PHP_SELF'], '/admin/item_management') !== false) { echo 'active'; } ?>"
                    href="../item_management">Item Management</a>
                <a class="collapse-item <?php if (strpos($_SERVER['PHP_SELF'], '/admin/purchase_orders') !== false) { echo 'active'; } ?>"
                    href="../purchase_orders">Purchase Orders</a>
                <a class="collapse-item <?php if (strpos($_SERVER['PHP_SELF'], '/admin/new_items') !== false) { echo 'active'; } ?>"
                    href="../new_items">New Items</a>
                <!-- <a class="collapse-item <?php if (strpos($_SERVER['PHP_SELF'], '/admin/omsidsSKU') !== false) { echo 'active'; } ?>"
                    href="../omsidsSKU">OMSIDs SKU</a>
                <a class="collapse-item <?php if (strpos($_SERVER['PHP_SELF'], '/admin/OverStock') !== false) { echo 'active'; } ?>"
                    href="../OverStock">OverStock</a>
                <a class="collapse-item <?php if (strpos($_SERVER['PHP_SELF'], '/admin/StarHome') !== false) { echo 'active'; } ?>"
                    href="../StarHome">THD StarHome orders</a>
                <a class="collapse-item <?php if (strpos($_SERVER['PHP_SELF'], '/admin/Wayfair') !== false) { echo 'active'; } ?>"
                    href="../Wayfair">Wayfair</a>
                <hr>
                <h6 class="collapse-header">GEC-VENDORS & CUSTOMERS</h6>
                <a class="collapse-item <?php if (strpos($_SERVER['PHP_SELF'], '/admin/Vendors') !== false) { echo 'active'; } ?>"
                    href="../Vendors">Vendors</a>
                <a class="collapse-item <?php if (strpos($_SERVER['PHP_SELF'], '/admin/Suppliers') !== false) { echo 'active'; } ?>"
                    href="../Suppliers">Suppliers</a>
                <a class="collapse-item <?php if (strpos($_SERVER['PHP_SELF'], '/admin/Brands') !== false) { echo 'active'; } ?>"
                    href="../Brands">Brands</a>
                <a class="collapse-item <?php if (strpos($_SERVER['PHP_SELF'], '/admin/Customers') !== false) { echo 'active'; } ?>"
                    href="../Customers">Customers</a> -->
            </div>
        </div>
    </li>

    <!-- Nav Item - Charts -->
    <li class="nav-item d-none">
        <a class="nav-link" href="charts.html">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Charts</span></a>
    </li>

    <!-- Nav Item - Tables Collapse Menu -->
    <!-- <li class="nav-item
        <?php if (strpos($_SERVER['PHP_SELF'], '/admin/TBLaliasSKU') !== false ||
            strpos($_SERVER['PHP_SELF'], '/admin/TBLgecSKU') !== false ||
            strpos($_SERVER['PHP_SELF'], '/admin/TBLhomedepotSKU') !== false ||
            strpos($_SERVER['PHP_SELF'], '/admin/TBLinventoryQty') !== false  ||
            strpos($_SERVER['PHP_SELF'], '/admin/TBLOverStock') !== false ||
            strpos($_SERVER['PHP_SELF'], '/admin/TBLStarHome') !== false ||
            strpos($_SERVER['PHP_SELF'], '/admin/TBLWayfair') !== false)  { echo 'active'; }
        ?>">
        <a class="nav-link
            <?php if (strpos($_SERVER['PHP_SELF'], '/admin/TBLaliasSKU') !== false ||
                strpos($_SERVER['PHP_SELF'], '/admin/TBLgecSKU') !== false ||
                strpos($_SERVER['PHP_SELF'], '/admin/TBLhomedepotSKU') !== false ||
                strpos($_SERVER['PHP_SELF'], '/admin/TBLinventoryQty') !== false ||
                strpos($_SERVER['PHP_SELF'], '/admin/TBLOverStock') !== false ||
                strpos($_SERVER['PHP_SELF'], '/admin/TBLStarHome') !== false ||
                strpos($_SERVER['PHP_SELF'], '/admin/TBLWayfair') !== false)  { } else { echo 'collapsed'; }
            ?>"
            href="#" data-toggle="collapse" data-target="#collapseTables" aria-expanded="true"
            aria-controls="collapseTables">
            <i class="fas fa-fw fa-table"></i>
            <span>Tables</span>
        </a>
        <div id="collapseTables" class="collapse
            <?php if (strpos($_SERVER['PHP_SELF'], '/admin/TBLaliasSKU') !== false ||
                strpos($_SERVER['PHP_SELF'], '/admin/TBLgecSKU') !== false ||
                strpos($_SERVER['PHP_SELF'], '/admin/TBLhomedepotSKU') !== false ||
                strpos($_SERVER['PHP_SELF'], '/admin/TBLinventoryQty') !== false ||
                strpos($_SERVER['PHP_SELF'], '/admin/TBLOverStock') !== false ||
                strpos($_SERVER['PHP_SELF'], '/admin/TBLStarHome') !== false ||
                strpos($_SERVER['PHP_SELF'], '/admin/TBLWayfair') !== false)  { echo 'show'; }
            ?>"
            aria-labelledby="headingImports" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Table Section</h6>
                <a class="collapse-item <?php if (strpos($_SERVER['PHP_SELF'], '/admin/TBLaliasSKU') !== false) { echo 'active'; } ?>"
                    href="../TBLaliasSKU">Alias</a>
                <a class="collapse-item <?php if (strpos($_SERVER['PHP_SELF'], '/admin/TBLgecSKU') !== false) { echo 'active'; } ?>"
                    href="../TBLgecSKU">GEC SKU</a>
                <a class="collapse-item <?php if (strpos($_SERVER['PHP_SELF'], '/admin/TBLhomedepotSKU') !== false) { echo 'active'; } ?>"
                    href="../TBLhomedepotSKU">HomeDepot SKU</a>
                <a class="collapse-item <?php if (strpos($_SERVER['PHP_SELF'], '/admin/TBLinventoryQty') !== false) { echo 'active'; } ?>"
                    href="../TBLinventoryQty">Inventory Quantity</a>
                <a class="collapse-item <?php if (strpos($_SERVER['PHP_SELF'], '/admin/TBLOverStock') !== false) { echo 'active'; } ?>"
                    href="../TBLOverStock">OverStock</a>
                <a class="collapse-item <?php if (strpos($_SERVER['PHP_SELF'], '/admin/TBLStarHome') !== false) { echo 'active'; } ?>"
                    href="../TBLStarHome">THD StarHome orders</a>
                <a class="collapse-item <?php if (strpos($_SERVER['PHP_SELF'], '/admin/TBLWayfair') !== false) { echo 'active'; } ?>"
                    href="../TBLWayfair">Wayfair</a>
            </div>
        </div>
    </li> -->

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" onclick="myDashboard()" id="sidebarToggle"></button>
    </div>

    <!-- Sidebar Message -->
    <div class="sidebar-card d-none">
        <img class="sidebar-card-illustration mb-2" src="<?php echo base_url ?>assets/img/undraw_rocket.svg" alt="...">
        <p class="text-center mb-2"><strong>SB Admin Pro</strong> is packed with premium features, components, and more!
        </p>
        <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to Pro!</a>
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
</script>