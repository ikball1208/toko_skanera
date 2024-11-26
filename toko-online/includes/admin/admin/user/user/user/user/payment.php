<?php
session_start();
include '../includes/db.php';
if (!isset($_SESSION['user'])) {
    header('Location: ../login.php');
    exit();
}

// Logic untuk memproses pembayaran
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $address = $_POST['address'];
    foreach ($_SESSION['cart'] as $product_id) {
        $sql = "INSERT INTO orders (user_id, product_id, status) VALUES ('{$_SESSION['user_id']}', '$product_id', 'pending ')";
        $conn->query($sql);
    }
    // Kosongkan keranjang setelah pembayaran
    unset($_SESSION['cart']);
    header('Location: tracking.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>Pembayaran</title>
</head>
<body>
    <h1>Pembayaran</h1>
    <p>Silakan selesaikan pembayaran Anda.</p>
    <footer>
        <p>&copy; 2023 Toko Online</p>
    </footer>
</body>
</html>