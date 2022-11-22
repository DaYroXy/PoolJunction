
<?php
    // Database Params
    // Global named constant for DB
    define('DB_HOST', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'castor');

    // App Root
    // Go back 2 directories to get /app directory
    $appDirectory = dirname(dirname(__FILE__));
    define('APPROOT', $appDirectory);

    // PORT, OPTIONAL
    $port = ":8080";

    // URL Root
    $urlRoot = "http://localhost".$port."/PoolJunction";
    define("URLROOT",  $urlRoot);

    // Site Name
    $siteName = "Pool Junction";
    define("SITENAME", $siteName);

    // App Version
    define("VERSION", "1.0.0");

    // You might face redireciton error, make sure to edit .htaccess to the correct path.
