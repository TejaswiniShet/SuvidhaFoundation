<?php
$servername = "localhost";
$username = "root"; // default username for XAMPP
$password = ""; // no password by default for XAMPP
$dbname = "reviews_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
