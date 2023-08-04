<?php
    include ('initialize.php');
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $password = $_POST['password'];
        $secretkey_file = 'server8771649cba77a699.txt';
        file_put_contents($secretkey_file, $password);
        
        // Redirect back to the form or display a success message
        $_SESSION['status'] = "Access Granted!";
        $_SESSION['status_code'] = "success";
        header("Location: " . base_url);
        exit();
    }
?>