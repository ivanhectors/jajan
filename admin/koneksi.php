<?php 

$servername = "localhost";
$dbusername = "root";
$dbpassword = "password";
$dbname = "ecom";

// Create connection
$conn = new mysqli($servername, $dbusername, $dbpassword,$dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

?>