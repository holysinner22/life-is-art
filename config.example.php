<?php
// Copy this file to config.php and fill in your database credentials.
$host = "localhost";
$user = "your_db_username";
$pass = "your_db_password";
$dbname = "your_db_name";

$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
