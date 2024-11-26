<?php
// Include file register_action.php jika Anda ingin memproses data saat form dikirim
// require 'register_action.php'; // Ini akan memproses data saat halaman dimuat

// Jika Anda ingin memproses data setelah form disubmit, Anda bisa memindahkan require ini ke file register_action.php
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>

<h2>Form Registrasi</h2>
<form action="register_action.php" method="post">
    <label>Username:</label>
    <input type="text" name="username" required><br><br>
    
    <label>Email:</label>
    <input type="email" name="email" required><br><br>
    
    <label>Password:</label>
    <input type="password" name="password" required><br><br>
    
    <input type="submit" name="submit" value="Register">
</form>

</body>
</html>