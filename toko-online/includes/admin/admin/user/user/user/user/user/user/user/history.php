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
    <title>History Transaksi</title>
</head>
<body>
    <h1>History Transaksi</h1>
    <table>
        <tr>
            <th>ID Pesanan</th>
            <th>Status</th>
            <th>Tanggal</th>
        </tr>
        <?php
        $user_id = $_SESSION['user_id'];
        $result = $conn->query("SELECT * FROM orders WHERE user_id = $user_id");
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['status']}</td>
                    <td>{$row['created_at']}</td>
                  </tr>";
        }
        ?>
    </table>
    <footer>
        <p>&copy; 2023 Toko Online</p>
    </footer>
</body>
</html>
``` ### File `user/remove_from_cart.php`
```php
<?php
session_start();
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if (isset($_GET['id'])) {
    $product_id = $_GET['id'];
    if (($key = array_search($product_id, $_SESSION['cart'])) !== false) {
        unset($_SESSION['cart'][$key]);
    }
}

header('Location: cart.php');
?>