<?php
// Sertakan file koneksi database
require 'koneksi.php';

// Query untuk mendapatkan data produk
$sql = "SELECT * FROM products";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rumah Cupang</title>
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&family=Montserrat:wght@500;600&display=swap" rel="stylesheet">
</head>
<body>
    <!-- Navbar -->
    <header>
        <a href="#" class="logo"><img src="images/logo.png" alt=""></a>
        <div class="bx bx-menu" id="menu-icon"></div>
        <div class="navbar">
            <a href="index.php">Home</a>
            <a href="about.php">About</a>
            <a href="contact.php">Contact</a>
            <a href="login/login.php" class="login-button">Login</a>
        </div>
    </header>

    <section class="home" id="home">
        <div class="home-text">
            <span>Selamat Datang Di </span>
            <h1>Rumah Cupang</h1>
            <h2>Dapatkan Promo <br></h2>
        </div>
        <div>
            <img src="images/home.png" alt="">
        </div>
    </section>

    <!-- Katalog -->
    <section class="catalog">
        <div class="heading">
            <span>Checkout Sekarang</span>
            <h1>Belanja Cupang</h1>
        </div>
        <div class="catalog-container">
            <?php
            if ($result->num_rows > 0) {
                // Loop melalui data produk
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="box">';
                    echo '    <div class="box-img">';
                    echo '        <img src="' . $row['image'] . '" alt="' . $row['name'] . '">';
                    echo '    </div>';
                    echo '    <div class="stars">';
                    echo '    </div>';
                    echo '    <h2>' . $row['name'] . '</h2>';
                    echo '    <span>Rp.' . number_format($row['price'], 0, ',', '.') . '</span>';
                    echo '    <a href="order/order.php?product=' . urlencode($row['name']) . '" class="btn">Order Sekarang</a>';
                    echo '</div>';
                }
            } else {
                echo '<p>Tidak ada produk tersedia.</p>';
            }
            ?>
        </div>
    </section>

    <section class="catalog" id="catalog">
    <div class="heading">
        <h1>Jangan sampai ketinggalan</h1>
    </div>
    <div class="container" style="display: flex; align-items: center; gap: 40px; padding: 20px;">
        <div class="img-cupang" style="flex: 1; text-align: center;">
            <img src="images/cupang bawah.jpg" alt="Promo Ikan Cupang" style="width: 100%; max-width: 400px; height: auto;">
        </div>
        <div class="catalog-text" style="flex: 1; font-family: 'Poppins', sans-serif;">
            <h2 style="margin-bottom: 15px;">Promo hanya hari ini</h2>
            <p style="font-weight: 600; margin-bottom: 10px;">Dapatkan diskon hingga 50% untuk pembelian berbagai jenis ikan cupang berkualitas. Jangan lewatkan kesempatan ini untuk melengkapi koleksi akuarium Anda dengan harga spesial.</p>
            <p style="font-weight: 600; margin-bottom: 20px;">Stok terbatas, dan promo hanya berlaku hingga pukul 23:59 malam ini. Segera kunjungi toko kami atau pesan melalui website untuk menikmati penawaran eksklusif ini!</p>
        </div>
    </div>
</section>

    <!-- Maps -->
<section class="maps">
    <h2>Lokasi Kami</h2>
    <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31721.072165995367!2d106.78192376388448!3d-6.376694890651558!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69eeb3d7abab47%3A0x3a0885ce8ae80870!2sTanah%20Baru%2C%20Kecamatan%20Beji%2C%20Kota%20Depok%2C%20Jawa%20Barat!5e0!3m2!1sid!2sid!4v1735720331254!5m2!1sid!2sid"
        width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
</section>

    <!-- Footer -->
    <footer style="background-color: #005b96; color: white; text-align: center; padding: 20px 0; font-size: 1rem;">
        <p>&copy; 2024 Rumah Cupang | All Rights Reserved.</p>
    </footer>

    <script src="main.js"></script>
</body>
</html>

<?php
// Tutup koneksi database
$conn->close();
?>
