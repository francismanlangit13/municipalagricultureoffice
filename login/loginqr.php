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

    <!-- Favicons -->
    <link rel="shortcut icon" href="../assets/img/favicon.png" type="image/x-icon">
    <link rel="apple-touch-icon" sizes="120x120" href="../assets/img/favicon.png">
    <link rel="apple-touch-icon" sizes="152x152" href="../assets/img/favicon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">

    <!-- Script QR Code scanner -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/webrtc-adapter/3.3.3/adapter.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.10/vue.min.js"></script>
    <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
  </head>

  <?php


session_start();


if(isset($_SESSION['auth']))
{
    if(!isset($_SESSION['message'])){
        $_SESSION['message'] = "You are already logged in";
    }
    header("Location: ./index.php");
    exit(0);
}

?>
  <body>




  <div class="d-lg-flex half">
    <div class="bg order-1 order-md-2" style="background-image: url('images/mao2.jpg');"></div>
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
                    <label>SCAN QR CODE HERE</label>
                    <input type="text" name="qrcode_text" id="text" readonyy="" placeholder="INPUT QR CODE" class="form-control">
                   </form>

     	<button type="submit">LOGIN</button>
     	</div>
            </div>

            </form>
     </form>
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

            <div class="d-flex mb-5 align-items-center">
              
                <span class="ml-auto"><a href="index.php"><u>Click here to login manually</u></a></span> 
                
              </div>
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
  </body>
</html>