<?php
// Sertakan koneksi database
require '../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query untuk mencari user berdasarkan username
    $sql = "SELECT * FROM user WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Verifikasi password
        if (password_verify($password, $user['password'])) {
            // Password benar, set session
            session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];  // Menyimpan role

            // Redirect ke halaman yang sesuai berdasarkan role
            if ($user['role'] == 'admin') {
                header('Location: ../admin.php');  // Redirect ke dashboard admin
            } else {
                header('Location: ../index.php');  // Redirect ke halaman home customer
            }
            exit;
        } else {
            // Password salah
            $error = "Password salah!";
        }
    } else {
        // Username tidak ditemukan
        $error = "Username tidak ditemukan!";
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./CSS/login.css">
</head>
<body>
    <div class="wrapper">
        <div class="title">
            Login
        </div>
        <form action="login.php" method="post">
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
            <div class="content">
                <div class="checkbox">
                    <input type="checkbox" id="remember-me">
                    <label for="remember-me">Remember me</label>
                </div>
                <div class="pass-link">
                    <a href="#">Forgot password?</a>
                </div>
            </div>
            <div class="field">
                <input type="submit" value="Login">
            </div>
            <div class="signup-link">
                <p>Belum punya akun? <a href="signup.php">Sign Up</a></p>
            </div>
        </form>
    </div>
</body>
</html>
