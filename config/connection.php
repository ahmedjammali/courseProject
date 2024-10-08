<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$servername = "127.0.0.1"; // Use 127.0.0.1 for localhost
$username = "root"; // Your MySQL username
$password = "root"; // Your MySQL password
$dbname = "db2"; // Your database name
$port = 3307; // The port mapped to MySQL

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


?>