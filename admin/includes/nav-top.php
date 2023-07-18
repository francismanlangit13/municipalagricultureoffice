 
 <!-- Content Wrapper -->
 <div id="content-wrapper" class="d-flex flex-column noprint-scroll">

<!-- Main Content -->
<div id="content">

    <!-- Topbar -->
    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

        <!-- Sidebar Toggle (Topbar) -->
        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
        </button>

        <!-- Topbar Search -->
        <div class="d-none d-md-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100">
            <div class="input-group">
                <label>Date: <?php echo date("M d Y"); ?> (<?php echo date("l"); ?>) System time: <div id="timer" style="margin-left:0.3rem;"></div></label>
            </div>
        </div>

        <!-- Topbar Navbar -->
        <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item d-none dropdown no-arrow d-sm-none">
                <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-search fa-fw"></i>
                </a>
                <!-- Dropdown - Messages -->
                <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                    <form class="form-inline mr-auto w-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </li>

            <!-- Nav Item - Alerts -->
            <li class="nav-item dropdown no-arrow mx-1">
                <?php
                    $total_notification = $num_expired + $num_announcement + $num_concern + $num_report + $num_request;

                    $notifications = array();

                    $product_sql = "SELECT *, DATE_FORMAT(product.exp_date, '%m-%d-%Y %h:%i:%s %p') as product_short_date FROM product WHERE product_status = '1' AND exp_date < NOW()";
                    $product_sql_run = mysqli_query($con, $product_sql);

                    while ($row_product_notifications = mysqli_fetch_assoc($product_sql_run)) {
                        $notifications[] = array(
                            'id' => $row_product_notifications['product_id'],
                            'type' => 'product',
                            'fulldate' => $row_product_notifications['product_short_date'],
                            'message' => 'Product <b>' . $row_product_notifications['product_name'] . '</b> has expired.'
                        );
                    }

                    $request_sql = "SELECT *, DATE_FORMAT(request.request_date, '%m-%d-%Y %h:%i:%s %p') as request_short_date FROM request INNER JOIN user ON user.user_id = request.user_id INNER JOIN product ON product.product_id = request.product_id WHERE status_id = '1' AND request_status = 1";
                    $request_sql_run = mysqli_query($con, $request_sql);

                    while ($row_request_notifications = mysqli_fetch_assoc($request_sql_run)) {
                        $notifications[] = array(
                            'id' => $row_request_notifications['request_id'],
                            'type' => 'request',
                            'fulldate' => $row_request_notifications['request_short_date'],
                            'message' => 'User <b>' . $row_request_notifications['fname'] . ' ' . $row_request_notifications['mname'] . ' ' . $row_request_notifications['lname'] . ' ' . $row_request_notifications['suffix'] . '</b> has requested product <b>' . $row_request_notifications['product_name'] . '</b>.'
                        );
                    }

                    $report_sql = "SELECT *, DATE_FORMAT(report.date_created, '%m-%d-%Y %h:%i:%s %p') as report_short_date FROM report INNER JOIN user ON user.user_id = report.user_id WHERE status_id = '1' AND report_status = 1";
                    $report_sql_run = mysqli_query($con, $report_sql);

                    while ($row_report_notifications = mysqli_fetch_assoc($report_sql_run)) {
                        $notifications[] = array(
                            'id' => $row_report_notifications['report_id'],
                            'type' => 'report',
                            'fulldate' => $row_report_notifications['report_short_date'],
                            'message' => 'User <b>' . $row_report_notifications['fname'] . ' ' . $row_report_notifications['mname'] . ' ' . $row_report_notifications['lname'] . ' ' . $row_report_notifications['suffix'] . '</b> has submitted a report.'
                        );
                    }

                    $concern_sql = "SELECT *, DATE_FORMAT(concern.date_created, '%m-%d-%Y %h:%i:%s %p') as concern_short_date FROM concern INNER JOIN user ON user.user_id = concern.user_id WHERE status_id = '1' AND concern_status = 1";
                    $concern_sql_run = mysqli_query($con, $concern_sql);

                    while ($row_concern_notifications = mysqli_fetch_assoc($concern_sql_run)) {
                        $notifications[] = array(
                            'id' => $row_concern_notifications['concern_id'],
                            'type' => 'concern',
                            'fulldate' => $row_concern_notifications['concern_short_date'],
                            'message' => 'User <b>' . $row_concern_notifications['fname'] . ' ' . $row_concern_notifications['mname'] . ' ' . $row_concern_notifications['lname'] . ' ' . $row_concern_notifications['suffix'] . '</b> has submitted a concern.'
                        );
                    }

                    // Extract the fulldate column from the notifications array
                    $fulldates = array_column($notifications, 'fulldate');

                    // Sort the notifications array in descending order based on fulldate
                    array_multisort($fulldates, SORT_DESC, $notifications);
                ?>

                <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-bell fa-fw"></i>
                    <?php if ($total_notification == 0){ } else{ ?>
                        <!-- Counter - Notifications -->
                        <span class="badge badge-danger badge-counter"><?php if ($total_notification >= 10){ echo "9+";} else { echo $total_notification; } ?></span>
                    <?php } ?>
                </a>

                <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown" style="height:60%; right:-410%;">
                    <h6 class="dropdown-header">
                        Notifications Center
                    </h6>

                    <!-- Display the sorted notifications -->
                    <div class="dropdown-list shadow animated--grow-in bg-white" aria-labelledby="alertsDropdown" style="position:fixed;overflow-y:auto;max-height:53%;">
                        <?php if (count($notifications) > 0) { ?>
                            <?php foreach ($notifications as $notification): ?>
                                <a class="dropdown-item d-flex align-items-center" href="<?php  echo $notification['type']; ?>_update?id=<?= $notification['id']; ?>">
                                    <div class="mr-3">
                                        <br>
                                        <?php
                                            $currentDate = date('Y-m-d H:i:s');
                                            $notificationDate = $notification['fulldate'];
                                            $iconClass = '';
                                            switch ($notification['type']) {
                                                case 'product':
                                                    $iconClass = 'fa-box';
                                                    break;
                                                case 'request':
                                                    $iconClass = 'fa-archive';
                                                    break;
                                                case 'report':
                                                    $iconClass = 'fa-pencil-square';
                                                    break;
                                                case 'concern':
                                                    $iconClass = 'fa-comment';
                                                    break;
                                                default:
                                                    $iconClass = '';
                                                    break;
                                            }
                                            $colorClass = '';
                                            if ($notificationDate >= date('m-d-Y', strtotime('-2 days'))) {
                                                $colorClass = 'bg-success';
                                            } elseif ($notificationDate >= date('m-d-Y', strtotime('-5 days'))) {
                                                $colorClass = 'bg-warning';
                                            } elseif ($notificationDate >= date('m-d-Y', strtotime('-7 days'))) {
                                                $colorClass = 'bg-info';
                                            } else {
                                                $colorClass = 'bg-danger';
                                            }
                                        ?>
                                        <div class="icon-circle <?php echo $colorClass; ?>">
                                            <i class="fas <?php echo $iconClass; ?> text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500"><?= $notification['fulldate']; ?></div>
                                        <?= $notification['message']; ?>
                                    </div>
                                </a>
                            <?php endforeach; ?>
                        <?php } else { ?>
                            <div class="dropdown-item text-center">No new notification.</div>
                        <?php } ?>
                        <!-- <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a> -->
                    </div>
                </div>
            </li>
        
            <!-- Nav Item - User Information -->

            <?php if(isset($_SESSION['auth_user']))  ?>
            <li class="nav-item dropdown ">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php
                        $userID = $_SESSION['auth_user'] ['user_id'];
                        $query = "SELECT * FROM user where user_id = $userID";
                        $query_run = mysqli_query($con, $query);
                        $user = mysqli_num_rows($query_run) > 0;

                        if($user){
                            while($row = mysqli_fetch_assoc($query_run)){
                    ?>
                        <img id="cimg" class="img-fluid card-img-top" id="frame1"
                        src="
                            <?php
                                if(isset($row['picture'])){
                                    echo base_url . 'assets/img/users/' . $row['picture'];
                                } else { echo base_url . 'assets/img/system/no-image.png'; }
                            ?>
                        " alt="image">
                        <span class="mr-2 d-lg-inline text-gray-600 small"><?=$row['fname']?> <?=$row['mname']?> <?=$row['lname']?> <?=$row['suffix']?></span>
                    <?php } } ?>
                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="settings">
                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                        My Account
                    </a>
                    <div class="dropdown-divider"></div>
                    <button type="button" class="dropdown-item" data-toggle="modal" data-target="#exampleModal">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        Logout
                    </button>
                </div>
            </li>

        </ul>

    </nav>
    <!-- End of Topbar -->

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    Confirm to logout?
                </div>
                <div class="modal-body"> Are you sure you want to logout?</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <form action="code.php" method="POST">
                        <button type="submit" name="logout_btn" class="btn btn-danger">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Begin Page Content -->
    <div class="container-fluid">

<style>
    /* .nav-item.dropdown:hover .dropdown-menu{
      display:block;
      margin-top: -10px;
      content: '\f107';
    } */
    img#cimg{
      text-align: center;
      height: 2.3rem;
      width: 2.3rem;
      object-fit: cover;
      border-radius: 100% 100%;
      margin-right: 0.5rem;
      background-color: #fff;
      max-width: 100%;
    }
    @media (min-width: 276px) {
        .topbar .dropdown {
            position:relative
        }

        .topbar .dropdown .dropdown-menu {
            width: auto;
            right: 0
        }

        .topbar .dropdown-list {
            width: 20rem!important
        }

        .topbar .dropdown-list .dropdown-item .text-truncate {
            max-width: 13.375rem
        }
    }
</style>
<?php
$currentTime = date("Y/m/d H:i:s");
?>

<script>
    setInterval(function(){
       var xhr = new XMLHttpRequest();
       xhr.onreadystatechange = function() {
          if (xhr.readyState === 4 && xhr.status === 200) {
             var currentTime = new Date(xhr.responseText);
             var currentHours = currentTime.getHours();
             var currentMinutes = currentTime.getMinutes();
             var currentSeconds = currentTime.getSeconds();
             currentMinutes = (currentMinutes < 10 ? "0" : "") + currentMinutes;
             currentSeconds = (currentSeconds < 10 ? "0" : "") + currentSeconds;
             var timeOfDay = (currentHours < 12) ? "AM" : "PM";
             currentHours = (currentHours > 12) ? currentHours - 12 : currentHours;
             currentHours = (currentHours == 0) ? 12 : currentHours;
             var currentTimeString = currentHours + ":" + currentMinutes + ":" + currentSeconds + " " + timeOfDay;
             document.getElementById("timer").innerHTML = currentTimeString;
          }
       };
       xhr.open("GET", "../includes/server_time.php", true); // Change "server_time.php" to the actual path of your PHP file
       xhr.send();
    }, 1000);
</script>