<footer>
    <p>&copy; 2023 Toko Online</p>
</footer>
``` ### File `admin/manage_orders.php`
```php
<?php
include '../includes/db.php';
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
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>Kelola Pesanan</title>
</head>
<body>
    <h1>Kelola Pesanan</h1>
    <table>
        <tr>
            <th>ID Pesanan</th>
            <th>ID Pengguna</th>
            <th>ID Produk</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
        <?php
        $result = $conn->query("SELECT * FROM orders");
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['user_id']}</td>
                    <td>{$row['product_id']}</td>
                    <td>{$row['status']}</td>
                    <td>
                        <form action='update_order.php' method='POST'>
                            <input type='hidden' name='order_id' value='{$row['id']}'>
                            <select name='status'>
                                <option value='pending' " . ($row['status'] == 'pending' ? 'selected' : '') . ">Pending</option>
                                <option value='paid' " . ($row['status'] == 'paid' ? 'selected' : '') . ">Paid</option>
                                <option value='shipped' " . ($row['status'] == 'shipped' ? 'selected' : '') . ">Shipped</option>
                                <option value='completed' " . ($row['status'] == 'completed' ? 'selected' : '') . ">Completed</option>
                            </select>
                            <button type='submit'>Update</button>
                        </form>
                    </td>
                  </tr>";
        }
        ?>
    </table>
    <footer>
        <p>&copy; 2023 Toko Online</p>
    </footer>
</body>
</html>