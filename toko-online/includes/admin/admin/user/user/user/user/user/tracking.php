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
    <title>Resi</title>
</head>
<body>
    <h1>Tracking Pesanan</h1>
    <table>
        <tr>
            <th>ID Pesanan</th>
            <th>Status</th>
        </tr>
        <?php
        $user_id = $_SESSION['user_id'];
        $result = $conn->query("SELECT * FROM orders WHERE user_id = $user_id");
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['status']}</td>
                  </tr>";
        }
        ?>
    </table>
    <footer>
        <p>&copy; 2023 Toko Online</p>
    </footer>
</body>
</html>