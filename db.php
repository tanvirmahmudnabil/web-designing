<?php
session_start();

$servername 	= "localhost";
$username 		= "root";
$password 		= null;
$dbName 		= "php-crud";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbName);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>
