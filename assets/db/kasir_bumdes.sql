-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Jul 2023 pada 13.31
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.2.0

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

INSERT INTO `pelanggan` (`pelanggan_id`, `nama`, `jenis_kelamin`, `dusun`, `rt`, `rw`, `desa`, `kecamatan`, `kabupaten`, `kategori`, `meter_awal`) VALUES
(1, 'Bagas', 'Laki-Laki', 'Padangan', 1, 7, 'Jungke', 'Karanganyar', 'Karanganyar', 'R-01', 0),
(2, 'Radit', 'Laki-Laki', 'Bangsri', 8, 88, 'Bangsri', 'Karangpandan', 'Karanganyar', 'K-01', 1),
(3, 'Budi', 'Laki-Laki', 'Bang', 4, 3, 'bahbh', 'Karangpandan', 'hbhh', 'R-01', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penggunaan_air`
--

CREATE TABLE `penggunaan_air` (
  `pengair_id` int(11) NOT NULL,
  `pelanggan_id` int(11) NOT NULL,
  `pemakaian_perbulan` varchar(30) NOT NULL,
  `pemakaian_awal` int(11) NOT NULL,
  `pemakaian_akhir` int(11) NOT NULL,
  `status_pembayaran` enum('Sudah DiBayar','Belum Bayar') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `penggunaan_air`
--

INSERT INTO `penggunaan_air` (`pengair_id`, `pelanggan_id`, `pemakaian_perbulan`, `pemakaian_awal`, `pemakaian_akhir`, `status_pembayaran`) VALUES
(26, 1, 'Juni', 100, 200, 'Sudah DiBayar'),
(27, 2, 'Maret', 1, 10, 'Belum Bayar'),
(28, 1, 'Juni', 200, 210, 'Belum Bayar'),
(31, 3, 'Februari', 1, 16, 'Belum Bayar');

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
(7, 1, 26, '07:29:12', '2023-06-04', 500000, 500000, 0),
(8, 2, 27, '20:21:46', '2023-01-19', 45000, 0, 0),
(9, 1, 28, '17:59:54', '2023-06-07', 25000, 0, 0),
(12, 3, 31, '20:55:58', '2021-06-15', 75000, 0, 0);

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
(1, 'admin', 'ya', 'Bagas', 'nis.jpeg', 'Aktif', 'Admin', 1687042748),
(2, 'kasir', 'ya', 'Radityo', 'weee.jpg', 'Aktif', 'Kasir', 1687042748),
(7, 'mager', 'ya', 'Pak Budii', 'default.png', 'Aktif', 'Manager', 1687042748),
(8, 'yono', 'ya', 'Zeee', '719c0da74dd7823ed81f6cadd7568212.jpg', 'Aktif', 'Petugas', 1687042748),
(15, 'kasir2', 'ya', 'Azzee', '6110f812c464d8b40ae32226a116f372.jpg', 'Aktif', 'Kasir', 1687044052),
(17, 'zee', 'ya', 'azaa', 'default.png', 'Aktif', 'Petugas', 1688560997),
(18, 'rere', '123', 'Kareena Dwi Octaviani', 'weee1.jpg', 'Aktif', 'Admin', 1689421061);

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
  MODIFY `pelanggan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `penggunaan_air`
--
ALTER TABLE `penggunaan_air`
  MODIFY `pengair_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `tarif`
--
ALTER TABLE `tarif`
  MODIFY `tarif_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `transaksi_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
