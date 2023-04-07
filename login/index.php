<?php
  include ('../db_conn.php');
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="A web-based Farmers monitoring management system" name="description">
    <meta content="Monitoring, Management, System, Notification" name="keywords">

    <!-- Title Page -->
    <title>Municipal Agriculture Office Jimenez | Login</title>

    <!-- Favicons -->
    <link rel="shortcut icon" href="<?php echo base_url ?>assets/img/system/favicon.png" type="image/x-icon">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo base_url ?>assets/img/favicon.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo base_url ?>assets/img/favicon.png">

    <link rel="stylesheet" href="<?php echo base_url ?>assets/css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url ?>assets/css/bootstrap.min.css">

    <!-- Loading CSS -->
    <link href="<?php echo base_url ?>assets/css/loader.css" rel="stylesheet">
    
    <!-- Style -->
    <link rel="stylesheet" href="<?php echo base_url ?>assets/css/loginstyle.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url ?>assets/fonts/icomoon/style.css">
  </head>
  <?php
    if(isset($_SESSION['auth'])){
        if(!isset($_SESSION['status'])){
            $_SESSION['status'] = "You are already logged in";
            $_SESSION['status_code'] = "error";
        }
        header("Location: ../admin/index.php");
        exit(0);
    }
  ?>
  <body>
    <!-- Loading Screen -->
    <div id="loading">
        <img id="loading-image" src="<?php echo base_url ?>assets/img/system/loading.gif" alt="Loading" />
    </div>
    <div class="d-lg-flex half">
      <div class="bg order-1 order-md-2" style="background-image: url('<?php echo base_url ?>assets/img/system/template.jpg');"></div>
      <div class="contents order-2 order-md-1">
        <div class="container">
          <div class="row align-items-center justify-content-center">
            <div class="col-md-7">
              <h3>Login to <strong>MAO JIMENEZ</strong></h3>
              <br>
              <form action="logincode.php" method="POST">
                <div class="form-group first">
                  <label for="">Email</label>
                  <input required type="email" name="email" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" placeholder="your-email@gmail.com" id="username">
                </div>
                <div class="form-group last mb-0">
                  <label for="">Password</label>
                  <input required type="password" name="password" class="form-control" minlength="8" placeholder="Your Password" id="password">
                  <a href="javascript:void(0)"  style="position: relative; top: -2.5rem; left: 87%; cursor: pointer; color: lightgray;">
                    <img alt="show password icon" src="<?php echo base_url ?>assets/img/icons/eye-close.png" width="25rem" height="1%" id="togglePassword">
                  </a>
                </div>
                <div class="d-flex mb-3 align-items-center">
                  <label class="control control mb-0">
                    <a href="<?php echo base_url ?>login/forgot"><u>Forgot password</u></a>
                  </label>
                  <span class="ml-auto"><a href="<?php echo base_url ?>login/qr"><u>Login via QR</u></a></span>
                </div>
                <button type="submit" name="login_btn" class="btn btn-block btn-success">Login</button>
                <br>
                <span class="ml-auto"><a href="<?php echo base_url ?>"><u>Click here to Homepage</u></a></span> 
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="<?php echo base_url ?>assets/js/sweetalert.js"></script>
    <?php include ('message.php'); ?>
    <script>
      var base_url = "<?php echo base_url ?>"; // global location for javascript
    </script>
    <script src="<?php echo base_url ?>assets/js/jquery-3.3.1.min.js"></script>
    <script src="<?php echo base_url ?>assets/js/popper.min.js"></script>
    <script src="<?php echo base_url ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url ?>assets/js/main.js"></script>
    <script src="<?php echo base_url ?>assets/js/showpass.js"></script>
    <!-- Loading JS -->
    <script src="<?php echo base_url ?>assets/js/loader.js"></script>
  </body>
</html>