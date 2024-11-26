<?php
// Menghasilkan hash untuk password
$password = '1234567890';
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
echo $hashedPassword; // Menampilkan hash password
?>