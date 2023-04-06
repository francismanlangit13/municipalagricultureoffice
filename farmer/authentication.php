<?php
session_start();
include('config/dbcon.php');

if(!isset($_SESSION['auth']))
{
    $_SESSION['message'] = "Login to Access Dashboard";
    $_SESSION['message_code'] = "error";
    header("Location: ./index.php");
    exit(0);
}
else
{
    if ($_SESSION['auth_role'] != "3")
    {
        $_SESSION['message'] = "You are not authorized as ADMIN";
        $_SESSION['message_code'] = "error";
        header("Location: ./index.php");
        exit(0);
    }
}


?>
