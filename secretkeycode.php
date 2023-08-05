<?php
    if(!defined('DB_SERVER')){
        include("initialize.php");
        $secretkey_file = 'web.conf';
        $secretkey = file_get_contents($secretkey_file);
    }
?>
<?php
    // DB connection parameters
    $host = DB_SERVER;
    $username = DB_USERNAME;
    $password = DB_PASSWORD;
    $database = DB_NAME;
    
    $con = new mysqli($host, $username, $password, $database);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $password = $_POST['password'];
        
        if (is_writable($secretkey_file)) {
            file_put_contents($secretkey_file, $password);

            $file = 'web.conf';
            $filesecretkey = file_get_contents($file);
            $md5_hash = md5($filesecretkey);
            $encode_key = sha1($md5_hash);
            $check_connection = "SELECT * FROM auth WHERE decode_key = '$encode_key'";
            $check_connection_query_run = mysqli_query($con, $check_connection);
            if(mysqli_num_rows($check_connection_query_run) > 0){
                $_SESSION['status'] = "Access Granted!";
                $_SESSION['status_code'] = "success";
                header("Location: " . base_url);
                exit();
            } else{
                $_SESSION['status'] = "Access Deny!";
                $_SESSION['status_code'] = "error";
                header("Location: " . base_url);
                exit();
            }
        } else{
            $_SESSION['status'] = "Unable to write to the file!";
            $_SESSION['status_code'] = "warning";
            header("Location: " . base_url);
            exit();
        }
    }
?>