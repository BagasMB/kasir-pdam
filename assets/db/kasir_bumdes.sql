-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Nov 2023 pada 23.59
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.0.28

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
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `pelanggan_id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_wa` varchar(50) NOT NULL,
  `dusun` varchar(30) NOT NULL,
  `rt` int(5) NOT NULL,
  `rw` int(5) NOT NULL,
  `desa` varchar(30) NOT NULL,
  `kecamatan` varchar(30) NOT NULL,
  `kabupaten` varchar(30) NOT NULL,
  `kategori` enum('R-01','R-02','K-01','K-02') NOT NULL COMMENT '''R-01 = standar'',''R-02 = keluarga miskin'',''K-01 = dinas/istansi'',''K-02 = tempat ibadah''',
  `meter_awal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`pelanggan_id`, `nama`, `jenis_kelamin`, `email`, `no_wa`, `dusun`, `rt`, `rw`, `desa`, `kecamatan`, `kabupaten`, `kategori`, `meter_awal`) VALUES
(1, 'Bagass', 'Laki-Laki', 'bagasmahardikabudi2007@gmail.com', '0812345678', 'Padangan', 1, 7, 'Jungke', 'Karanganyar', 'Karanganyar', 'R-01', 1111),
(2, 'YGYG', 'Perempuan', 'cobaan@gmail.com', '1234567890', 'Opo', 76, 767, 'hvh', 'vhv', 'hhv', 'R-01', 12);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penggunaan_air`
--

CREATE TABLE `penggunaan_air` (
  `pengair_id` int(11) NOT NULL,
  `pelanggan_id` int(11) NOT NULL,
  `pemakaian_perbulan` date NOT NULL DEFAULT current_timestamp(),
  `pemakaian_awal` int(11) NOT NULL,
  `pemakaian_akhir` int(11) NOT NULL,
  `status_pembayaran` enum('Sudah DiBayar','Belum Bayar') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `penggunaan_air`
--

INSERT INTO `penggunaan_air` (`pengair_id`, `pelanggan_id`, `pemakaian_perbulan`, `pemakaian_awal`, `pemakaian_akhir`, `status_pembayaran`) VALUES
(1, 1, '2023-09-12', 0, 10, 'Sudah DiBayar'),
(2, 1, '2023-09-12', 10, 15, 'Belum Bayar'),
(3, 1, '2023-09-15', 15, 90, 'Belum Bayar'),
(4, 2, '2023-09-15', 0, 10, 'Belum Bayar'),
(5, 2, '2023-09-15', 10, 12, 'Sudah DiBayar'),
(6, 2147483647, '2023-10-27', 6677, 766, 'Belum Bayar'),
(7, 5656, '2023-10-27', 6556, 565, 'Belum Bayar'),
(8, 1, '2023-10-27', 12, 12, 'Belum Bayar'),
(9, 1, '2023-11-22', 111, 1111, 'Belum Bayar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tarif`
--

CREATE TABLE `tarif` (
  `tarif_id` int(11) NOT NULL,
  `biaya` enum('1000','1500','2000','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tarif`
--

INSERT INTO `tarif` (`tarif_id`, `biaya`) VALUES
(1, '1000'),
(2, '1500'),
(3, '2000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `transaksi_id` int(20) NOT NULL,
  `pelanggan_id` int(20) NOT NULL,
  `pengair_id` int(11) NOT NULL,
  `jam_transaksi` time NOT NULL DEFAULT current_timestamp(),
  `tanggal_transaksi` date NOT NULL DEFAULT current_timestamp(),
  `total_pembayaran` double NOT NULL,
  `bayar` int(11) NOT NULL,
  `kembalian` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`transaksi_id`, `pelanggan_id`, `pengair_id`, `jam_transaksi`, `tanggal_transaksi`, `total_pembayaran`, `bayar`, `kembalian`) VALUES
(1, 1, 1, '05:48:02', '2023-09-12', 50000, 50000, 0),
(2, 1, 2, '13:42:34', '2023-09-12', 25000, 0, 0),
(3, 1, 3, '13:41:23', '2023-09-15', 375000, 0, 0),
(4, 2, 4, '13:54:12', '2023-09-15', 50000, 0, 0),
(5, 2, 5, '13:54:31', '2023-09-15', 10000, 100000, 90000),
(6, 2147483647, 6, '17:31:45', '2023-10-27', -29555000, 0, 0),
(7, 5656, 7, '17:32:01', '2023-10-27', -29955000, 0, 0),
(8, 1, 8, '17:45:50', '2023-10-27', 0, 0, 0),
(9, 1, 9, '08:00:14', '2023-11-22', 5000000, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `user_id` int(10) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `image` varchar(100) NOT NULL,
  `status` enum('Aktif','Mati') NOT NULL,
  `user_role` enum('Kasir','Manager','Admin','Petugas') NOT NULL COMMENT 'Petugas = \r\nPetugas Pencatat Meteran',
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `nama`, `image`, `status`, `user_role`, `date_created`) VALUES
(1, 'admin', 'ya', 'Bagass', '_2f8ee1d8-cb5d-4913-a81e-9a61eede8eea.jpeg', 'Aktif', 'Admin', 1687042748),
(2, 'kasir', 'ya', 'Radityo', 'default.png', 'Aktif', 'Kasir', 1687042748),
(21, 'admin1', '123', 'cgfghh', 'default.png', 'Aktif', 'Kasir', 1700789512);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`pelanggan_id`);

--
-- Indeks untuk tabel `penggunaan_air`
--
ALTER TABLE `penggunaan_air`
  ADD PRIMARY KEY (`pengair_id`);

--
-- Indeks untuk tabel `tarif`
--
ALTER TABLE `tarif`
  ADD PRIMARY KEY (`tarif_id`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`transaksi_id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `pelanggan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `penggunaan_air`
--
ALTER TABLE `penggunaan_air`
  MODIFY `pengair_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tarif`
--
ALTER TABLE `tarif`
  MODIFY `tarif_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `transaksi_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
