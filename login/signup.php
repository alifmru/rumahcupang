<?php
// Sertakan koneksi database
require '../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari form
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Validasi jika password dan konfirmasi password tidak cocok
    if ($password !== $confirm_password) {
        $error = "Password dan Konfirmasi Password tidak sama!";
    } else {
        // Hash password untuk keamanan
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        // Menentukan role otomatis 'customer'
        $role = 'customer';  // Role otomatis diset sebagai customer

        // Cek apakah username sudah ada
        $sql_check = "SELECT * FROM user WHERE username = ?";
        $stmt_check = $conn->prepare($sql_check);
        $stmt_check->bind_param('s', $username);
        $stmt_check->execute();
        $result_check = $stmt_check->get_result();

        if ($result_check->num_rows > 0) {
            $error = "Username sudah digunakan!";
        } else {
            // Masukkan data ke dalam database
            $sql_insert = "INSERT INTO user (username, password, role) VALUES (?, ?, ?)";
            $stmt_insert = $conn->prepare($sql_insert);
            $stmt_insert->bind_param('sss', $username, $hashed_password, $role);

            if ($stmt_insert->execute()) {
                // Berhasil mendaftar, redirect ke halaman login
                header('Location: login.php');
                exit;
            } else {
                $error = "Terjadi kesalahan, coba lagi!";
            }
            $stmt_insert->close();
        }
        $stmt_check->close();
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="../CSS/signup.css">
</head>
<body>
    <div class="wrapper">
        <div class="title">
            Sign Up
        </div>
        <form action="signup.php" method="post">
            <?php if (!empty($error)): ?>
                <p style="color: red;"><?= $error ?></p>
            <?php endif; ?>
            <div class="field">
                <input type="text" name="username" required>
                <label>Username</label>
            </div>
            <div class="field">
                <input type="password" name="password" required>
                <label>Password</label>
            </div>
            <div class="field">
                <input type="password" name="confirm_password" required>
                <label>Confirm Password</label>
            </div>
            <div class="field">
                <input type="submit" value="Sign Up">
            </div>
            <div class="login-link">
                <p>Sudah punya akun? <a href="login.php">Login</a></p>
            </div>
        </form>
    </div>
</body>
</html>
