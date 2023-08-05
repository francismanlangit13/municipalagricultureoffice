<?php
    if(!defined('DB_SERVER')){
        include("initialize.php");
        $secretkey_file = base_url . 'web.conf';
        $secretkey = file_get_contents($secretkey_file);
    }
?>
<?php
    // DB connection parameters
    $host = DB_SERVER;
    $username = DB_USERNAME;
    $password = DB_PASSWORD;
    $database = DB_NAME;
    $md5_hash = md5($secretkey);
    $encode_key = sha1($md5_hash);

    $con = new mysqli($host, $username, $password, $database);
    $check_connection = "SELECT * FROM auth WHERE decode_key = '$encode_key'";
    $check_connection_query_run = mysqli_query($con, $check_connection);

    if($con->connect_error){
        header("Location: " . base_url . "error");
        die('Connect Error (' . mysqli_connect_errno() . ') '. mysqli_connect_error());
    }
    else{
        if(mysqli_num_rows($check_connection_query_run) > 0){
            header("Location: " . base_url . "");
            die('Connect Error (' . mysqli_connect_errno() . ') '. mysqli_connect_error());
        } else {
            // Dead code.
        }
    }
?>
<! DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="A web-based Farmers monitoring management system" name="description">
        <meta content="Monitoring, Management, System, Notification" name="keywords">
        <title>Municipal Agriculture Office | System</title>
        <link href="<?php echo base_url ?>assets/css/bootstrap-4.css" rel="stylesheet">

        <!-- Remove Banner -->
        <script src="<?php echo base_url ?>assets/js/fwhabannerfix.js"></script>

        <!-- Favicons -->
        <link rel="shortcut icon" href="<?php echo base_url ?>assets/img/system/favicon.png" type="image/x-icon">
        <link rel="apple-touch-icon" sizes="120x120" href="<?php echo base_url ?>assets/img/system/favicon.png">
        <link rel="apple-touch-icon" sizes="152x152" href="<?php echo base_url ?>assets/img/system/favicon.png">

        <!-- Loading CSS -->
        <link href="<?php echo base_url ?>assets/css/loader.css" rel="stylesheet">

        <!-- Bootstrap core JavaScript-->
        <script src="<?php echo base_url ?>assets/vendor/jquery/jquery.min.js"></script>
        <script src="<?php echo base_url ?>assets/js/bootstrap.bundle.min.js"></script>
    </head>
    <style>
        body {
        background: #28a745 !important;
        font-family: 'Muli', sans-serif;
        }
        h1 {
        color: #fff;
        padding-bottom: 2rem;
        font-weight: bold;
        }
        a {
        color: #333;
        }
        a:hover {
        color: #E8D426;
        text-decoration: none;
        }
        .form-control:focus {
            color: #000;
            background-color: #fff;
            border: 2px solid #E8D426;
            outline: 0;
            box-shadow: none;
        }
        .btn {
        background: #28a745;
        border: #E8D426;
        }
        .btn:hover {
        background: #28a745;
        border: #E8D426;
        }
    </style>
    <body>
        <!-- Loading Screen -->
        <div id="loading">
            <img id="loading-image" src="<?php echo base_url ?>assets/img/system/loading.gif" alt="Loading" />
        </div>
        <div class="pt-5">
            <h1 class="text-center">Municipal Agriculture Office | System</h1>
            <div class="container">
                <div class="row">
                    <div class="col-md-5 mx-auto">
                        <div class="card card-body">
                            <form action="secretkeycode.php" method="post" data-parsley-validate="" data-parsley-errors-messages-disabled="true" _lpchecked="1">
                                <div class="form-group required">
                                    <label class="d-flex flex-row align-items-center" style="font-size:13px" for="password"> Enter password to access this system.
                                        <a class="ml-auto border-link small-xl" href="#" data-toggle="modal" data-target="#exampleModal">
                                            Need help?
                                        </a>
                                    </label>
                                    <input type="password" class="form-control" id="password" name="password" value="" required>
                                    <a href="javascript:void(0)"  style="position: relative; top: -1.8rem; left: 87%; cursor: pointer; color: lightgray;">
                                        <img alt="show password icon" src="<?php echo base_url ?>assets/img/icons/eye-close.png" width="25rem" height="1%" id="togglePassword">
                                    </a>
                                </div>
                                <div class="form-group pt-1">
                                    <button class="btn btn-primary btn-block" type="submit">Unlock System</button>
                                </div>
                            </form>
                            <p class="small-xl pt-0 text-center">
                                <a class="ml-auto border-link small-xl" href="mailto:francismanlangit13@gmail.com">Forget Password?</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <b>Help Guide</b>
                    </div>
                    <div class="modal-body"><b>Why I'm getting this?</b>
                        <br><br>
                        <p style="text-align: justify;">The system requires a one-time password for access as an additional layer of security, helping to ensure that only authorized user with the proper authentication can gain entry and protect this system from unauthorized access.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script>
      var base_url = "<?php echo base_url ?>"; // global location for javascript
    </script>
    <!-- Disable-key -->
    <script src="<?php echo base_url ?>assets/js/disable-key.js"></script>
    <!-- Loading JS -->
    <script src="<?php echo base_url ?>assets/js/loader.js"></script>
    <script src="<?php echo base_url ?>assets/js/underscore-min.js"></script>
    <!-- Serverstatus JS -->
    <script src="<?php echo base_url ?>assets/js/serverstatus.js"></script>
    <script src="<?php echo base_url ?>assets/js/showpass-login.js"></script>
    <?php include ('message.php'); ?>
    <script src="<?php echo base_url ?>assets/js/sweetalert.js"></script>
</html>