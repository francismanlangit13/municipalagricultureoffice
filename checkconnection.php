<?php
    include ('initialize.php');
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
        <div class="pt-5">
            <h1 class="text-center">Municipal Agriculture Office | System</h1>
            <div class="container">
                <div class="row">
                    <div class="col-md-5 mx-auto">
                        <div class="card card-body">
                            <form action="secretkeycode.php" method="post" data-parsley-validate="" data-parsley-errors-messages-disabled="true" _lpchecked="1">
                                <div class="form-group required">
                                    <label class="d-flex flex-row align-items-center" for="password"> Enter password to access this system.</label>
                                    <input type="password" class="form-control" id="password" name="password" value="" required>
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
    </body>
</html>