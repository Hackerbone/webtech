<?php
$host = 'localhost';
$username = 'root'; // default XAMPP MySQL username
$password = '';     // default XAMPP MySQL password (empty by default)
$dbname = 'ecommerce';

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
