<?php
  include ('../../db_conn.php');
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
    <title>Municipal Agriculture Office Jimenez | Login QR Code</title>

    <!-- Remove Banner -->
    <script src="<?php echo base_url ?>assets/js/fwhabannerfix.js"></script>

    <!-- Favicons -->
    <link rel="shortcut icon" href="<?php echo base_url ?>assets/img/system/favicon.png" type="image/x-icon">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo base_url ?>assets/img/system/favicon.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo base_url ?>assets/img/system/favicon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url ?>assets/css/bootstrap.min.css">
    <link href="<?php echo base_url ?>assets/css/custom.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="<?php echo base_url ?>assets/css/loginstyle.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url ?>assets/fonts/icomoon/style.css">
    <link rel="stylesheet" href="<?php echo base_url ?>assets/css/owl.carousel.min.css">

    <!-- Loading CSS -->
    <link href="<?php echo base_url ?>assets/css/loader.css" rel="stylesheet">

    <!-- Cookie CSS -->
    <link href="<?php echo base_url ?>assets/css/cookie.css" rel="stylesheet">

    <!-- Script QR Code scanner -->
    <script type="text/javascript" src="<?php echo base_url ?>assets/js/qrscanner/adapter.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url ?>assets/js/qrscanner/vue.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url ?>assets/js/qrscanner/instascan.min.js"></script>
  </head>
  <?php
    if(isset($_SESSION['auth'])){
      if ($_SESSION['auth_role'] == "1"){
        if(!isset($_SESSION['status'])){
          $_SESSION['status'] = "You are already logged in";
          $_SESSION['status_code'] = "error";
        }
        header("Location: " . base_url . "admin");
        exit(0);
      }
      elseif ($_SESSION['auth_role'] == "2"){
        if(!isset($_SESSION['status'])){
          $_SESSION['status'] = "You are already logged in";
          $_SESSION['status_code'] = "error";
        }
        header("Location: " . base_url . "staff");
        exit(0);
      }
      elseif ($_SESSION['auth_role'] == "3"){
        if(!isset($_SESSION['status'])){
          $_SESSION['status'] = "You are already logged in";
          $_SESSION['status_code'] = "error";
        }
        header("Location: " . base_url . "farmer");
        exit(0);
      }
      else{
        if(!isset($_SESSION['status'])){
            $_SESSION['status'] = "Login first to access dashboard";
            $_SESSION['status_code'] = "error";
        }
        header("Location: " . base_url . "login");
        exit(0);
      }
    }
  ?>
  <body>
    <!-- Loading Screen -->
    <div id="loading">
        <img id="loading-image" src="<?php echo base_url ?>assets/img/system/loading.gif" alt="Loading" />
    </div>
    <div id="connectionAlert" class="alert"></div>
    <div class="d-lg-flex half">
      <div class="bg order-1 order-md-2" style="background-image: url('<?php echo base_url ?>assets/img/system/template.jpg');"></div>
      <div class="contents order-2 order-md-1">
        <div class="container">
          <div class="row align-items-center justify-content-center text-center">
            <div class="col-md-12">
              <form action="loginqrcode.php" method="post">
                <h3>Login via <strong>QR CODE</strong></h3>
                <div class="row">
                  <div class="col-md-12">
                      <video id="preview" width="100%"></video>
                  </div>
                  <div class="col-md-6" hidden="true">
                    <form method="post" class="form-horizontal">
                      <h3>SCAN QR CODE HERE</h3>
                      <input type="text" name="qrcode_text" id="text" readonyy="" placeholder="INPUT QR CODE" class="form-control">
                    </form>

                    <button type="submit">LOGIN</button>
                  </div>
                </div>
              </form>
              <div class="d-flex mb-5 align-items-center">
                <span class="ml-auto"><a href="<?php echo base_url ?>login"><u>Click here to login manually</u></a></span> 
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Cookie Consent -->
    <div class="wrapper">
      <img src="<?php echo base_url ?>assets/img/icons/cookie.png" alt="">
      <div class="content">
        <header>Cookies Consent</header>
        <p>Cookies help us deliver our services. By using our services, you agree to our use of cookies. <a href="<?php echo base_url ?>cookie-policy">Cookie Policy</a>. For information on how we protect your privacy, please read our <a href="<?php echo base_url ?>privacy-policy">Privacy Policy</a>.</p>
        <div class="buttons">
          <button class="item">I accept</button>
        </div>
      </div>
    </div>
    <!-- End Cookie Consent -->

    <script>
      let scanner = new Instascan.Scanner({ video: document.getElementById('preview')});
      Instascan.Camera.getCameras().then(function(cameras){
        if(cameras.length > 0 ){
            scanner.start(cameras[0]);
        } else{
            alert('No cameras found');
        }
      }).catch(function(e) {
        console.error(e);
      });
      scanner.addListener('scan',function(c){
        document.getElementById('text').value=c;
        document.forms[0].submit();
      });
    </script>

    <script src="<?php echo base_url ?>assets/js/sweetalert.js"></script>
    <?php include ('message.php'); ?>
    <script>
      var base_url = "<?php echo base_url ?>"; // global location for javascript
    </script>

    <!-- Cookie Consent -->
    <script src="<?php echo base_url ?>assets/js/cookie.js"></script>

    <!-- Disable-key -->
    <script src="<?php echo base_url ?>assets/js/disable-key.js"></script>
    
    <!-- Image viewer slider -->
    <script src="<?php echo base_url ?>assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="<?php echo base_url ?>assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="<?php echo base_url ?>assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="<?php echo base_url ?>assets/js/main.js"></script>

    <script src="<?php echo base_url ?>assets/js/jquery-3.3.1.min.js"></script>
    <script src="<?php echo base_url ?>assets/js/popper.min.js"></script>
    <script src="<?php echo base_url ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url ?>assets/js/main.js"></script>
    <!-- Loading JS -->
    <script src="<?php echo base_url ?>assets/js/loader.js"></script>
    <!-- Serverstatus JS -->
    <script src="<?php echo base_url ?>assets/js/serverstatus.js"></script>
  </body>
</html>