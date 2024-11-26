<?php
include 'includes/db.php'; // Pastikan Anda sudah menyertakan koneksi database

// Buat username dan password untuk admin
$username = 'admin';
$password = password_hash('admin123', PASSWORD_DEFAULT); // Gantilah 'admin123' dengan password yang diinginkan

// Masukkan data ke dalam tabel users
$sql = "INSERT INTO users (username, password, role) VALUES ('$username', '$password', 'admin')";

if ($conn->query($sql) === TRUE) {
    echo "Akun admin berhasil dibuat!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>