<?php
session_start();
include '../includes/db.php';
if (!isset($_SESSION['user'])) {
    header('Location: ../login.php');
    exit();
}

// Logic untuk menambahkan produk ke keranjang
if (isset($_GET['id'])) {
    $product_id = $_GET['id'];
    $_SESSION['cart'][] = $product_id; // Menyimpan ID produk ke dalam sesi keranjang
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>Keranjang</title>
</head>
<body>
    <h1>Keranjang Belanja</h1>
    <table>
        <tr>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Aksi</th>
        </tr>
        <?php
        if (isset($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $product_id) {
                $result = $conn->query("SELECT * FROM products WHERE id = $product_id");
                $row = $result->fetch_assoc();
                echo "<tr>
                        <td>{$row['name']}</td>
                        <td>{$row['price']}</td>
                        <td><a href='remove_from_cart.php?id={$row['id']}'>Hapus</a></td>
                      </tr>";
            }
        }
        ?>
    </table>
    <a href="checkout.php">Checkout</a>
    <footer>
        <p>&copy; 2023 Toko Online</p>
    </footer>
</body>
</html>