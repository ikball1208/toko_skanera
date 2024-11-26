<?php
include '../includes/db.php';
session_start();
if (!isset($_SESSION['user']) || $_SESSION['role'] !== 'admin') {
    header('Location: ../login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $image = $_FILES['image']['name'];
    move_uploaded_file($_FILES['image']['tmp_name'], "../assets/images/" . $image);

    $sql = "INSERT INTO products (name, description, price, image) VALUES ('$name', '$description', '$price', '$image')";
    $conn->query($sql);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>Kelola Produk</title>
</head>
<body>
    <h1>Kelola Produk</h1>
    <form action="manage_products.php" method="POST" enctype="multipart/form-data">
        <input type="text" name="name" placeholder="Nama Produk" required>
        <textarea name="description" placeholder="Deskripsi Produk" required></textarea>
        <input type="number" name="price" placeholder="Harga" required>
        <input type="file" name="image" required>
        <button type="submit">Tambah Produk</button>
    </form>
    <h2>Daftar Produk</h2>
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
                    <td><a href='delete_product.php?id={$row['id']}'>Hapus</a></td>
                  </tr>";
        }
        ?>
    </table>
    <footer>
        <p>&copy; 2023 Toko Online</p>
    </footer>
</body>
</html>