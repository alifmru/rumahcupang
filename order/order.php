<?php
// Sertakan koneksi database
require '../koneksi.php';

// Cek apakah parameter 'product' tersedia di URL
if (isset($_GET['product'])) {
    $productName = urldecode($_GET['product']);

    // Query untuk mendapatkan detail produk berdasarkan nama
    $sql = "SELECT * FROM products WHERE name = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $productName);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Ambil data produk
        $product = $result->fetch_assoc();
    } else {
        echo "<h1>Produk tidak ditemukan.</h1>";
        exit;
    }

    $stmt->close();
} else {
    echo "<h1>Produk tidak ditemukan.</h1>";
    exit;
}

// Proses form jika metode POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari form
    $quantity = intval($_POST['quantity']);
    $customer_name = $_POST['customer_name'];
    $address = $_POST['address'];
    $total_price = $product['price'] * $quantity;

    // Query untuk menyimpan data pesanan
    $sql_order = "INSERT INTO orders (product_name, price, quantity, total_price, customer_name, address) 
                  VALUES (?, ?, ?, ?, ?, ?)";
    $stmt_order = $conn->prepare($sql_order);
    $stmt_order->bind_param(
        'siisss',
        $product['name'],       // Nama produk
        $product['price'],      // Harga satuan
        $quantity,              // Jumlah
        $total_price,           // Total harga
        $customer_name,         // Nama pelanggan
        $address                // Alamat pelanggan
    );

    if ($stmt_order->execute()) {
        echo "<script>alert('Pesanan berhasil dibuat!');</script>";
        echo "<script>window.location.href = '../index.php';</script>";
    } else {
        echo "<script>alert('Terjadi kesalahan saat membuat pesanan.');</script>";
    }

    $stmt_order->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesan Produk</title>
    <link rel="stylesheet" href="../CSS/order.css">
</head>
<body>
    <form action="" method="POST">
        <div class="order-container">
            <img src="../<?= $product['image']; ?>" alt="<?= ($product['name']); ?>">
            <h2><?= $product['name']; ?></h2>
            <p class="detail">Harga: <span>Rp. <?= number_format($product['price'], 0, ',', '.'); ?></span></p>

            <div class="quantity">
                <label for="quantity">Jumlah:</label>
                <input type="number" id="quantity" name="quantity" value="1" min="1" onchange="updateTotal(<?= $product['price']; ?>)">
            </div>

            <p class="detail">Total Bayar: <span id="total-price">Rp. <?= number_format($product['price'], 0, ',', '.'); ?></span></p>

            <label for="customer_name">Nama:</label>
            <input type="text" id="customer_name" name="customer_name" required>

            <label for="address">Alamat:</label>
            <textarea id="address" name="address" rows="3" required></textarea>

            <button type="submit" class="btn-pay">Bayar Sekarang</button>
        </div>
    </form>

    <script>
        function updateTotal(price) {
            const quantity = document.getElementById('quantity').value;
            const total = price * quantity;
            document.getElementById('total-price').innerText = 'Rp. ' + total.toLocaleString('id-ID');
        }
    </script>
</body>
</html>
