<?php 
    //Start Session
    session_start();


    //Create Constants to Store Non Repeating Values
    //define('SITEURL', 'http://localhost/final_dontskip/');
    define('HOST', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'dontskip');
    $conn = mysqli_connect(HOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error()); //Database Connection
    $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error()); //SElecting Database
?>