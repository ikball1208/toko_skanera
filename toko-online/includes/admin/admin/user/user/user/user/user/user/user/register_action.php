<?php
// Include file db.php
require 'includes/db.php';

// Proses registrasi
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Sanitasi input
    $username = $conn->real_escape_string($username);
    $email = $conn->real_escape_string($email);
    $password = $conn->real_escape_string($password);

    // Hash password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Query untuk insert data ke tabel users
    $query = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashed_password')";
    $result = $conn->query($query);

    if ($result) {
        echo "Registrasi berhasil!";
    } else {
        echo "Registrasi gagal: " . $conn->error;
    }
}

// Tutup koneksi
$conn->close();
?>