<?php
// Database Connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "registration";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>