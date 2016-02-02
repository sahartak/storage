<?php
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(0);
function die_with_error($error) {
    $ret = array(
        "status" => "Failed",
        "error" => $error
    );
    die(json_encode($ret));
}



$hostname = 'localhost';
$username = 'root';
$password = 'f#i-*7w5rWY';
$dbname = 'map2';
$mysqli = mysqli_connect($hostname, $username, $password, $dbname);
/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

mysqli_set_charset($mysqli, "utf8");