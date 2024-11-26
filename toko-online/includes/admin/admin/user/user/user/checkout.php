<?php
session_start();
include '../includes/db.php';
if (!isset($_SESSION['user'])) {
    header('Location: ../login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>Checkout</title>
</head>
<body>
    <h1>Checkout</h1>
    <form action="payment.php" method="POST">
        <h2>Detail Pengiriman</h2>
        <input type="text" name="address" placeholder="Alamat Pengiriman" required>
        <button type="submit">Lanjut ke Pembayaran</button>
    </form>
    <footer>
        <p>&copy; 2023 Toko Online</p>
    </footer>
</body>
</html>