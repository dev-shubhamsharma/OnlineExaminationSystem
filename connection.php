<?php
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$database = "demo_db"; 

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
