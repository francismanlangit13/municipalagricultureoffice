 
 <!-- Content Wrapper -->
 <div id="content-wrapper" class="d-flex flex-column">

<!-- Main Content -->
<div id="content">

    <!-- Topbar -->
    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

        <!-- Sidebar Toggle (Topbar) -->
        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
        </button>

        <!-- System Time -->
        <div class="col-md-6 input-group">
            Date: <?php echo date("M d Y"); ?> (<?php echo date("l"); ?>) System time: <div id="timer" style="margin-left:0.3rem;"></div>
        </div>

        <!-- Topbar Navbar -->
        <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item d-none dropdown no-arrow d-sm-none">
                <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-search fa-fw"></i>
                </a>
                <!-- Dropdown - Messages -->
                <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                    aria-labelledby="searchDropdown">
                    <form class="form-inline mr-auto w-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small"
                                placeholder="Search for..." aria-label="Search"
                                aria-describedby="basic-addon2">
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
            <li class="nav-item dropdown no-arrow mx-1 d-none">
                <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-bell fa-fw"></i>
                    <!-- Counter - Alerts -->
                    <span class="badge badge-danger badge-counter">3+</span>
                </a>
                <!-- Dropdown - Alerts -->
                <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                    aria-labelledby="alertsDropdown">
                    <h6 class="dropdown-header">
                        Alerts Center
                    </h6>
                    <a class="dropdown-item d-flex align-items-center" href="#">
                        <div class="mr-3">
                            <div class="icon-circle bg-primary">
                                <i class="fas fa-file-alt text-white"></i>
                            </div>
                        </div>
                        <div>
                            <div class="small text-gray-500">December 12, 2019</div>
                            <span class="font-weight-bold">A new monthly report is ready to download!</span>
                        </div>
                    </a>
                    <a class="dropdown-item d-flex align-items-center" href="#">
                        <div class="mr-3">
                            <div class="icon-circle bg-success">
                                <i class="fas fa-donate text-white"></i>
                            </div>
                        </div>
                        <div>
                            <div class="small text-gray-500">December 7, 2019</div>
                            $290.29 has been deposited into your account!
                        </div>
                    </a>
                    <a class="dropdown-item d-flex align-items-center" href="#">
                        <div class="mr-3">
                            <div class="icon-circle bg-warning">
                                <i class="fas fa-exclamation-triangle text-white"></i>
                            </div>
                        </div>
                        <div>
                            <div class="small text-gray-500">December 2, 2019</div>
                            Spending Alert: We've noticed unusually high spending for your account.
                        </div>
                    </a>
                    <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
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
                    <?php } } ?>
                    <span class="mr-2 d-lg-inline text-gray-600 small"> <?= $_SESSION['auth_user'] ['user_name'];  ?></span>
                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="settings">
                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                        Profile
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
        </button>
      </div>
      <div class="modal-body"> Are you sure you want to logout?
      </div>
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
    .nav-item.dropdown:hover .dropdown-menu{
      display:block;
      margin-top: -10px;
      content: '\f107';
    }
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