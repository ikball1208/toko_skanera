<?php
session_start();
if (!isset($_SESSION['user']) || $_SESSION['role'] !== 'admin') {
    header('Location: ../login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        h1 {
            color: #333;
        }
        nav ul {
            list-style-type: none;
            padding: 0;
        }
        nav ul li {
            display: inline;
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <h1>Dashboard Admin</h1>
    <nav>
        <ul>
            <li><a href="manage_products.php">Kelola Produk</a></li>
 <li><a href="manage_orders.php">Kelola Pesanan</a></li>
        </ul>
    </nav>
    <h2>Statistik Penjualan</h2>
    <!-- Tambahkan grafik atau statistik penjualan di sini -->
    <footer>
        <p>&copy; 2023 Toko Online</p>
    </footer>
</body>
</html>