<?php

$host = "localhost";
$username = "root";
$password = "";
$database = "maojimenez";

$con = mysqli_connect("$host", "$username", "$password", "$database");

if(!$con)
{
    header("Location: 404.php");
    die();
}

?>