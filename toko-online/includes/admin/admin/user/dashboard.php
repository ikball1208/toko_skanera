<?php
session_start();
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
    <title>Dashboard User</title>
</head>
<body>
    <h1>Dashboard User</h1>
    <nav>
        <ul>
            <li><a href="products.php">Produk</a></li>
            <li><a href="cart.php">Keranjang</a></li>
            <li><a href="checkout.php">Checkout</a></li>
            <li><a href="payment.php">Pembayaran</a></li>
            <li><a href="tracking.php">Resi</a></li>
            <li><a href="confirm.php">Konfirmasi Barang</a></li>
            <li><a href="history.php">History Transaksi</a></li>
        </ul>
    </nav>
    <footer>
        <p>&copy; 2023 Toko Online</p>
    </footer>
</body>
</html>
``` ### File `user/products.php`
```php
<?php
include '../includes/db.php';
session_start();
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
    <title>Produk</title>
</head>
<body>
    <h1>Daftar Produk</h1>
    <table>
        <tr>
            <th>Nama</th>
            <th>Harga</th>
            <th>Aksi</th>
        </tr>
        <?php
        $result = $conn->query("SELECT * FROM products");
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['name']}</td>
                    <td>{$row['price']}</td>
                    <td><a href='cart.php?id={$row['id']}'>Tambah ke Keranjang</a></td>
                  </tr>";
        }
        ?>
    </table>
    <footer>
        <p>&copy; 2023 Toko Online</p>
    </footer>
</body>
</html>