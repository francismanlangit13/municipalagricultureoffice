<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="A web-based Farmers monitoring management system" name="description">
    <meta content="Monitoring, Management, System, Notification" name="keywords">

    <!-- Title Page -->
    <title>Municipal Agriculture Office Jimenez | Forgot Password</title>

    <!-- Favicons -->
    <link rel="shortcut icon" href="../assets/img/favicon.png" type="image/x-icon">
    <link rel="apple-touch-icon" sizes="120x120" href="../assets/img/favicon.png">
    <link rel="apple-touch-icon" sizes="152x152" href="../assets/img/favicon.png">

    <link rel="stylesheet" href="css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
  </head>

  <?php


session_start();


if(isset($_SESSION['auth']))
{
    if(!isset($_SESSION['status'])){
        $_SESSION['status'] = "You are already logged in";
        $_SESSION['status_code'] = "error";
    }
    header("Location: ../admin/index.php");
    exit(0);
}

?>
  <body>




  <div class="d-lg-flex half">
    <div class="bg order-1 order-md-2" style="background-image: url('images/mao2.jpg');"></div>
    <div class="contents order-2 order-md-1">

      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-7">
            <h3><strong><center>FORGOT PASSWORD</center></strong></h3>
            <br>
            <form action="forgotpasswordcode.php" method="POST">

              <div class="form-group first">
                <label for="">Email</label>
                <input required type="email" name="email" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" placeholder="your-email@gmail.com">
              </div>

              <button type="submit" name="forgot_btn" class="btn btn-block btn-success">Reset Password</button>
              <br>
              <span class="ml-auto"><a href="../index.php"><u>Click here to Homepage</u></a></span> 
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>




  <script src="js/sweetalert.js"></script>

    <?php
        if(isset($_SESSION['status']) && $_SESSION['status_code'] !='' )
        {
            ?>
                <script>
                swal({
                title: "<?php echo $_SESSION['status']; ?>",
                icon: "<?php echo $_SESSION['status_code']; ?>",
                timer: 1500,
                button: "Close",
                }).then(
                function () {},
                // handling the promise rejection
                function (dismiss) {
                    if (dismiss === 'timer') {
                    //console.log('I was closed by the timer')
                    }
                }
                )
                </script>
                <?php
                unset($_SESSION['status']);
                unset($_SESSION['status_code']);
        }
                ?>


    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/showpass.js"></script>
  </body>
</html>