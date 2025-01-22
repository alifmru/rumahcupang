<?php
require 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $image = $_FILES['image'];

    // Validasi data
    if (empty($name) || empty($price) || empty($image['name'])) {
        echo "<script>alert('Data tidak lengkap!'); window.location.href = 'admin.php';</script>";
        exit;
    }

    // Path folder upload
    $uploadDir = 'images/';
    $uploadFile = $uploadDir . basename($image['name']);

    // Pindahkan file yang diupload
    if (move_uploaded_file($image['tmp_name'], $uploadFile)) {
        // Masukkan data ke database
        $stmt = $conn->prepare("INSERT INTO products (name, price, image) VALUES (?, ?, ?)");
        $stmt->bind_param('sds', $name, $price, $uploadFile);

        if ($stmt->execute()) {
            echo "<script>alert('Produk berhasil ditambahkan!'); window.location.href = 'admin.php';</script>";
        } else {
            echo "<script>alert('Gagal menyimpan ke database!'); window.location.href = 'admin.php';</script>";
        }

        $stmt->close();
    } else {
        echo "<script>alert('Gagal mengupload gambar!'); window.location.href = 'admin.php';</script>";
    }
} else {
    echo "<script>alert('Metode tidak valid!'); window.location.href = 'admin.php';</script>";
}

$conn->close();
?>
