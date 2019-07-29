<?php

//$dbhost = 'localhost';
//$dbuser = 'admin_lms';
//$dbpass = 'o0En9oXiTUpqzV8W';
//$dbname = 'cilms';

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = 'root';
$dbname = 'cilms';

$db = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

if ( mysqli_connect_errno() ) {
    // If there is an error with the connection, stop the script and display the error.
    die ('Failed to connect to MySQL: ' . mysqli_connect_error());
}
