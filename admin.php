<?php
require 'koneksi.php'; // Impor koneksi database
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Rumah Cupang</title>
    <link rel="stylesheet" href="CSS/admin.css">
</head>
<body>
    <div class="container">
        <div class="sidebar">
            <h2>Dashboard</h2>
            <ul>
                <li><a href="#">Overview</a></li>
                <li><a href="#">Products</a></li>
                <li><a href="#">Orders</a></li>
                <li><a href="#">Reports</a></li>
            </ul>
        </div>

        <div class="main-content">
            <h1>Produk Cupang</h1>
            <div class="add-product">
                <button onclick="openAddForm()">Tambah Data</button>
            </div>
            <table class="product-table">
                <thead>
                    <tr>
                        <th>Product ID</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <div class="back-to-login">
                    <button onclick="window.location.href='./login/login.php'">Log Out</button>
                 </div>
                <tbody>
                    <?php
                    $sql = "SELECT id, name, price, image FROM products";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                            echo "<td>$" . htmlspecialchars($row['price']) . "</td>";
                            echo "<td><img src='" . htmlspecialchars($row['image']) . "' alt='Product Image' style='width:100px; height:auto;'></td>";
                            echo "<td>
                                    <button onclick=\"openEditForm(" . $row['id'] . ", '" . htmlspecialchars($row['name']) . "', " . htmlspecialchars($row['price']) . ", '" . htmlspecialchars($row['image']) . "')\">Edit</button>
                                    <button onclick=\"deleteProduct(" . $row['id'] . ")\">Delete</button>
                                  </td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5'>No products found.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Form Tambah Produk -->
    <div id="popupAddForm" class="popup-form" style="display: none;">
        <div class="form-container">
            <h2>Tambah Produk</h2>
            <form action="tambah.php" method="POST" enctype="multipart/form-data">
                <label for="name">Nama Produk:</label>
                <input type="text" id="addName" name="name" required>
                <label for="price">Harga Produk:</label>
                <input type="number" id="addPrice" name="price" required>
                <label for="image">Gambar Produk:</label>
                <input type="file" id="addImage" name="image" required>
                <div class="form-actions">
                    <button type="submit">Simpan</button>
                    <button type="button" onclick="closeAddForm()">Batal</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Form Edit Produk -->
    <div id="popupEditForm" class="popup-form" style="display: none;">
        <div class="form-container">
            <h2>Edit Produk</h2>
            <form id="editForm" action="edit.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" id="editId" name="id">
                <label for="editName">Nama Produk:</label>
                <input type="text" id="editName" name="name" required>
                <label for="editPrice">Harga Produk:</label>
                <input type="number" id="editPrice" name="price" required>
                <label for="editImage">Gambar Produk:</label>
                <input type="file" id="editImage" name="image">
                <div class="form-actions">
                    <button type="submit">Simpan</button>
                    <button type="button" onclick="closeEditForm()">Batal</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openAddForm() {
            document.getElementById('popupAddForm').style.display = 'flex';
        }

        function closeAddForm() {
            document.getElementById('popupAddForm').style.display = 'none';
        }

        function openEditForm(id, name, price, image) {
            document.getElementById('editId').value = id;
            document.getElementById('editName').value = name;
            document.getElementById('editPrice').value = price;
            // Gambar tidak perlu diubah kecuali user mengupload yang baru
            document.getElementById('popupEditForm').style.display = 'flex';
        }

        function closeEditForm() {
            document.getElementById('popupEditForm').style.display = 'none';
        }

        function deleteProduct(productId) {
            if (confirm("Apakah Anda yakin ingin menghapus produk ini?")) {
                window.location.href = "hapus.php?id=" + productId;
            }
        }
    </script>
</body>
</html>
