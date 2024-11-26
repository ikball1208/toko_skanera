<?php
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'toko_online';

$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>