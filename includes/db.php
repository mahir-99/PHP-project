<?php
// Change these values if your MySQL setup is different.
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'campuscore';
$conn = new mysqli($host, $username, $password, $database);
if ($conn->connect_error) {
    die('Database connection failed. Start MySQL and import database/campuscore.sql.');
}
$conn->set_charset('utf8mb4');
?>
