-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Jan 2025 pada 14.40
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rumahcupang`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `orders`
--

INSERT INTO `orders` (`id`, `product_name`, `price`, `quantity`, `total_price`, `customer_name`, `address`, `created_at`) VALUES
(1, 'Cupang Koi', 300000, 1, 300000, 'reymondo', 'jalan kedongdong III no 2d', '2025-01-19 08:10:06'),
(2, 'Cupang Halfmoon', 500000, 1, 500000, 'raul', 'jalan jawabesar no 1c', '2025-01-19 08:11:34'),
(3, 'Cupang Koi', 300000, 4, 1200000, 'mahehe', 'jl kecapi rt 03 rw 12 blok a no 3 ', '2025-01-19 08:34:37'),
(4, 'Cupang Crowntail', 1000000, 2, 2000000, 'thoriq', 'korps brimob flat 4d', '2025-01-19 08:57:59'),
(6, 'Cupang Crowntail', 1000000, 3, 3000000, 'arief', 'gundar', '2025-01-19 13:23:14'),
(7, 'Cupang Koi', 300000, 1, 300000, 'anami', 'jl kedoya no 1', '2025-01-21 07:53:38'),
(8, 'Cupang Crowntail', 1000000, 2, 2000000, 'alifah', 'jl kedoya', '2025-01-22 07:56:11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `image`) VALUES
(1, 'Cupang Halfmoon', 500000, 'images/halfmoon.png'),
(2, 'Cupang Crowntail', 1000000, 'images/crowntail.png'),
(3, 'Cupang Koi', 300000, 'images/koi.png'),
(8, 'Cupang Plakat', 500000, 'images/cupang plakat.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','customer') DEFAULT 'customer'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `role`) VALUES
(1, 'alif', '$2y$10$gb2tyvn7SPzZGkFdMOAfQuwd.hodzIJk5qghSZhuFmOj4VEXA1XLK', 'admin'),
(2, 'freya', '$2y$10$SVwcIDMiAtzXxnUvngzo4.OOvQ28WcCpWsyZIoq..VSWjXLb/mfXK', 'customer'),
(3, 'rey', '$2y$10$4LfkfNIfV.ozQWlPPNNmpO09IyExCzOdy.4zgbBoCzw7M8bmn0PZu', 'customer'),
(4, 'michie', '$2y$10$sO/DgaD6AyFa0Su1E7KwrOzuGBhQSDvUstl04HcXPy.lHqtK4sDfC', 'customer'),
(5, 'enriq', '$2y$10$cQr.xrfSn0MCjDt6f0qJL.9hcV.0Vo1eDaWm8aiQyQNffmCVNNCt2', 'customer');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
