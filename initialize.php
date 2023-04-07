<?php
    if (session_status() !== PHP_SESSION_ACTIVE) {
        session_start();
    }
	// $timezone_la = new DateTimeZone('America/Los_Angeles'); // Set the time zone for Los Angeles
	// $time_la = new DateTime('now', $timezone_la); // Create a new DateTime object with the current time in Los Angeles
	// $time_mt = $time_la->sub(new DateInterval('PT1H')); // Subtract one hour from the Los Angeles time to get the time in Mountain Time
	// $timezone_mt = new DateTimeZone('America/Denver'); // Set the time zone for Mountain Time
	// $time_mt->setTimezone($timezone_mt); // Set the time zone for the DateTime object to Mountain Time
	// $systemtime = $time_mt->format('Y-m-d H:i:s'); // Output the time in Mountain Time
    
    // $systemtime_fixed = date('m-d-Y H-i-s A', strtotime(str_replace('_', ':', $systemtime))); // Output: Mar 28 2023 22:22:23 PM

    // This is offline hosting configuration.
    if(!defined('base_url')) define('base_url','http://localhost/municipalagricultureoffice/');
    if(!defined('base_app')) define('base_app', str_replace('\\','/',__DIR__).'/' );
    if(!defined('DB_SERVER')) define('DB_SERVER',"localhost");
    if(!defined('DB_USERNAME')) define('DB_USERNAME',"root");
    if(!defined('DB_PASSWORD')) define('DB_PASSWORD',"");
    if(!defined('DB_NAME')) define('DB_NAME',"maojimenez");
?>