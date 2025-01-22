<?php
require 'koneksi.php'; // Impor koneksi database

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $image = $_FILES['image'];

    // Jika gambar diunggah, proses pengunggahan
    if ($image['size'] > 0) {
        $targetDir = "images/";
        $targetFile = $targetDir . basename($image['name']);
        move_uploaded_file($image['tmp_name'], $targetFile);

        // Update dengan gambar baru
        $sql = "UPDATE products SET name = ?, price = ?, image = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sdsi", $name, $price, $targetFile, $id);
    } else {
        // Update tanpa mengubah gambar
        $sql = "UPDATE products SET name = ?, price = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sdi", $name, $price, $id);
    }

    if ($stmt->execute()) {
        echo "<script>
                alert('Produk berhasil diperbarui!');
                window.location.href = 'admin.php';
              </script>";
    } else {
        echo "<script>
                alert('Gagal memperbarui produk!');
                window.location.href = 'admin.php';
              </script>";
    }

    $stmt->close();
}

$conn->close();
?>
