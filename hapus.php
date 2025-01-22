<?php
require 'koneksi.php'; // Impor koneksi database

if (isset($_GET['id'])) {
    $productId = $_GET['id'];

    // Query untuk menghapus data
    $stmt = $conn->prepare("DELETE FROM products WHERE id = ?");
    $stmt->bind_param('i', $productId);

    if ($stmt->execute()) {
        echo "<script>
                alert('Produk berhasil dihapus!');
                window.location.href = 'admin.php';
              </script>";
    } else {
        echo "<script>
                alert('Gagal menghapus produk!');
                window.location.href = 'admin.php';
              </script>";
    }

    $stmt->close();
} else {
    echo "<script>
            alert('ID produk tidak ditemukan!');
            window.location.href = 'admin.php';
          </script>";
}

$conn->close();
?>
