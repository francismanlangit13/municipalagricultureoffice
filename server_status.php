<?php
    include ('db_conn.php');
    if(!$sock = @fsockopen('maojimenez.ueuo.com', 80)){
        echo 'Not Connected';
    }
    else{
        echo 'Connected';
    }
?>