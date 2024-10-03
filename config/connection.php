<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$servername = "127.0.0.1"; // Use 127.0.0.1 for localhost
$username = "user1"; // Your MySQL username
$password = "123456"; // Your MySQL password
$dbname = "db1"; // Your database name
$port = 3307; // The port mapped to MySQL

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


?>