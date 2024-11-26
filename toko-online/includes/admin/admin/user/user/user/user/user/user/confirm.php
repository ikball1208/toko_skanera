<?php
session_start();
include '../includes/db.php';
if (!isset($_SESSION['user'])) {
    header('Location: ../login.php');
    exit();
}

// Logic untuk mengonfirmasi barang telah sampai
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $order_id = $_POST['order_id'];
    $conn->query("UPDATE orders SET status = 'completed' WHERE id = $order_id");
    header('Location: history.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>Konfirmasi Barang</title>
</head>
<body>
    <h1>Konfirmasi Barang Telah Sampai</h1>
    <form action="confirm.php" method="POST">
        <input type="hidden" name="order_id" value="<?php echo $_GET['id']; ?>">
        <button type="submit">Konfirmasi</button>
    </form>
    <footer>
        <p>&copy; 2023 Toko Online</p>
    </footer>
</body>
</html>