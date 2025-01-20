-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 20, 2025 at 06:33 AM
-- Server version: 8.0.30
-- PHP Version: 8.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kasir_bumdes`
--

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `pelanggan_id` int NOT NULL,
  `nomor_pelanggan` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan','Umum') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `no_wa` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `dusun` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `rt` int NOT NULL,
  `rw` int NOT NULL,
  `desa` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `kecamatan` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `kabupaten` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `kategori` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `meter_awal` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`pelanggan_id`, `nomor_pelanggan`, `nama`, `jenis_kelamin`, `email`, `no_wa`, `dusun`, `rt`, `rw`, `desa`, `kecamatan`, `kabupaten`, `kategori`, `meter_awal`) VALUES
(1, '000001', 'Bagass', 'Laki-Laki', 'bagasmahardikabudi2007@gmail.com', '0812345678', 'Padangan', 12, 7, 'Jungke', 'Karanganyar', 'Karanganyar', '1', 100),
(2, '000002', 'Andika', 'Perempuan', 'cobaan@gmail.com', '1234567890', 'Opo', 76, 767, 'hvh', 'vhv', 'aaaaaaaaaaaaaaa', '2', 0),
(3, '000003', 'Masjid Al-Hidayah', 'Umum', 'bgasah@gmail.com', '777877878', 'jewen', 2, 7, 'klans', 'hgvhv', 'gvgh', '4', 0),
(4, '000004', 'Perpustakaan Jungke', 'Umum', 'perpusda@gmail.com', '387918', 'Bakae', 1, 2, 'Basa', 'Kakk', 'jk', '3', 30);

-- --------------------------------------------------------

--
-- Table structure for table `penggunaan_air`
--

CREATE TABLE `penggunaan_air` (
  `pengair_id` int NOT NULL,
  `nomor_pelanggan` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `pemakaian_perbulan` date NOT NULL,
  `pemakaian_awal` int NOT NULL,
  `pemakaian_akhir` int NOT NULL,
  `status_pembayaran` enum('Sudah DiBayar','Belum Bayar') COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penggunaan_air`
--

INSERT INTO `penggunaan_air` (`pengair_id`, `nomor_pelanggan`, `pemakaian_perbulan`, `pemakaian_awal`, `pemakaian_akhir`, `status_pembayaran`) VALUES
(1, '000001', '2025-01-20', 0, 100, 'Sudah DiBayar'),
(2, '000004', '2025-01-20', 0, 30, 'Belum Bayar');

-- --------------------------------------------------------

--
-- Table structure for table `tarif`
--

CREATE TABLE `tarif` (
  `tarif_id` int NOT NULL,
  `nama_tarif` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `biaya` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tarif`
--

INSERT INTO `tarif` (`tarif_id`, `nama_tarif`, `biaya`) VALUES
(1, 'R-01 (Standar)', 2000),
(2, 'R-02 (Keluarga Miskin)', 500),
(3, 'K-01 (Dinas/Instansi)', 1500),
(4, 'K-02  (Tempat Ibadah)', 1000);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `transaksi_id` int NOT NULL,
  `kode_transaksi` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `nomor_pelanggan` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `pengair_id` int NOT NULL,
  `jam_transaksi` time NOT NULL,
  `tanggal_transaksi` date NOT NULL,
  `total_pembayaran` double NOT NULL,
  `bayar` int NOT NULL,
  `kembalian` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`transaksi_id`, `kode_transaksi`, `nomor_pelanggan`, `pengair_id`, `jam_transaksi`, `tanggal_transaksi`, `total_pembayaran`, `bayar`, `kembalian`) VALUES
(1, '2501201', '000001', 1, '11:13:21', '2025-01-20', 200000, 200000, 0),
(2, '2501202', '000004', 2, '00:00:00', '0000-00-00', 45000, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int NOT NULL,
  `username` varchar(25) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(25) COLLATE utf8mb4_general_ci NOT NULL,
  `nama` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `status` enum('Aktif','Mati') COLLATE utf8mb4_general_ci NOT NULL,
  `user_role` enum('Kasir','Manager','Admin','Petugas') COLLATE utf8mb4_general_ci NOT NULL COMMENT 'Petugas = \r\nPetugas Pencatat Meteran',
  `date_created` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `nama`, `image`, `status`, `user_role`, `date_created`) VALUES
(1, 'admin', 'ya', 'Bagas', '20250119014337.jpg', 'Aktif', 'Admin', 1687042748),
(2, 'kasir', 'ya', 'Radityo', '20250119043437.jpg', 'Aktif', 'Kasir', 1687042748),
(21, 'azalea', 'ya', 'azalee', '', 'Aktif', 'Kasir', 1700789512),
(22, 'zee', 'ya', 'aziizii', '20250119032709.jpg', 'Aktif', 'Kasir', 1737257074);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`pelanggan_id`);

--
-- Indexes for table `penggunaan_air`
--
ALTER TABLE `penggunaan_air`
  ADD PRIMARY KEY (`pengair_id`);

--
-- Indexes for table `tarif`
--
ALTER TABLE `tarif`
  ADD PRIMARY KEY (`tarif_id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`transaksi_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `pelanggan_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `penggunaan_air`
--
ALTER TABLE `penggunaan_air`
  MODIFY `pengair_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tarif`
--
ALTER TABLE `tarif`
  MODIFY `tarif_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `transaksi_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
