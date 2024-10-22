-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Okt 2024 pada 15.46
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
-- Database: `donasi_palestina`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `donasi`
--

CREATE TABLE `donasi` (
  `id` int(11) NOT NULL,
  `nama_depan` varchar(50) NOT NULL,
  `nama_belakang` varchar(50) DEFAULT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `usia` int(11) NOT NULL,
  `gambar_ktp` varchar(255) NOT NULL,
  `gambar_ijazah` varchar(255) NOT NULL,
  `nama_bank` varchar(50) NOT NULL,
  `no_bank` varchar(50) NOT NULL,
  `pesan` text DEFAULT NULL,
  `jumlah_donasi` decimal(10,2) NOT NULL,
  `tanggal_donasi` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `donasi`
--

INSERT INTO `donasi` (`id`, `nama_depan`, `nama_belakang`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `no_hp`, `usia`, `gambar_ktp`, `gambar_ijazah`, `nama_bank`, `no_bank`, `pesan`, `jumlah_donasi`, `tanggal_donasi`) VALUES
(9, 'Taufiqurrahman Al Baihaqi', 'Sadli', 'Laki-laki', 'SAMARINDA', '2003-07-19', 'Jl.pahlaawn', '082150750884', 19, 'WhatsApp Image 2023-10-17 at 11.36.52.jpeg', 'webcam-toy-photo1.jpg', 'BNI', '2309106114', 'amin', 1000000.00, '2024-10-15 16:40:53'),
(11, 'aliza farwah', 'zahira', 'Perempuan', 'SAMARINDA', '2005-11-07', 'jl ikaula', '23145678', 10, 'WIN_20240308_08_05_33_Pro.jpg', 'WIN_20231026_15_26_49_Pro.jpg', 'syariah', '1234567865432', 'sukses', 2000000.00, '2024-10-15 16:55:05'),
(14, 'AGUNG', 'HERmanyah', 'Perempuan', 'balikpapan', '2330-03-12', 'JL.sutomo', '082150750884', 13, 'webcam-toy-photo19.jpg', 'WhatsApp Image 2024-09-05 at 00.58.05_1a649f41.jpg', 'BRI', '65789657689', 'AMINNNNN', 60000000.00, '2024-10-16 12:54:13'),
(15, 'Albira', 'auakk', 'Perempuan', 'SAMARINDA', '2233-03-22', 'Jl.bengkuring', '987656789887', 18, 'WhatsApp Image 2023-10-17 at 11.36.52.jpeg', 'WhatsApp Image 2023-10-17 at 11.36.52.jpeg', 'BNI', '56789087654', 'BRRRR', 1200000.00, '2024-10-22 13:03:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `nama_lengkap`, `created_at`) VALUES
(1, 'aliza', '$2y$10$KgM6IlUboycxOG5jNeIAOebiJ8PyUjolNSqQXsj/9iAspW0GXXFI2', 'aliza@gmail.com', 'Aliza Farwah Zahira', '2024-10-22 13:01:51'),
(2, 'akhyat', '$2y$10$SucIRwNh9J7R2guDtnEY/OH75EbZVUKnMPxaizbEVFmx7KLor0TsG', 'akhyat@gmail.com', 'akhyat akbar', '2024-10-22 13:14:21');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `donasi`
--
ALTER TABLE `donasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `donasi`
--
ALTER TABLE `donasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
