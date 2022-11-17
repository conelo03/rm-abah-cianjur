-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2022 at 03:26 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_rm_abah_cianjur`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `id_absensi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_shift` int(11) NOT NULL,
  `tanggal` int(11) NOT NULL,
  `jam_masuk` time NOT NULL,
  `jam_keluar` time NOT NULL,
  `keterangan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(200) NOT NULL,
  `stok` int(11) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `diskon` int(11) NOT NULL,
  `ppn` int(11) NOT NULL,
  `keterangan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `stok`, `harga_beli`, `harga_jual`, `diskon`, `ppn`, `keterangan`) VALUES
(2, 'Black Forest', 30, 29000, 35000, 0, 0, '-'),
(3, 'Red Velvet', 4, 29000, 35000, 0, 0, '-'),
(4, 'Alpukat Mentega', 1, 26000, 33000, 0, 0, '-'),
(5, 'Brownies Coklat', 4, 26000, 33000, 0, 0, '-'),
(6, 'Durian Montong', 0, 29000, 35000, 0, 0, '-'),
(7, 'Strowbery Ciwidey', 2, 26000, 33000, 0, 0, '-'),
(8, 'Bureo Coklat', 2, 29000, 35000, 0, 0, '-'),
(9, 'Susu Lembang', 5, 26000, 33000, 0, 0, '-'),
(10, 'Kopi Bogor', 7, 26000, 33000, 0, 0, '-'),
(11, 'Susu Vanila', 3, 29000, 35000, 0, 0, '-'),
(12, 'Ketan Kelapa', 3, 26000, 33000, 0, 0, '-'),
(13, 'Pandan Wangi', 5, 26000, 33000, 0, 0, '-'),
(14, 'Blackcurrrant Ori (S)', 4, 13000, 15000, 0, 0, '-'),
(15, 'Brownies Keju (L)', 1, 31000, 35000, 0, 0, '-'),
(16, 'Alpukat Keju (L)', 0, 31000, 35000, 0, 0, '-'),
(17, 'Blackcurrant Ori (L)', 0, 31000, 35000, 0, 0, '-'),
(18, 'Brownies Keju (S)', 1, 13000, 15000, 0, 0, '-'),
(19, 'Pisang Kepok', 2, 29000, 35000, 0, 0, '-'),
(20, 'Kacang Ijo', 10, 26000, 33000, 0, 0, '-'),
(21, 'Talas Bogor', 3, 26000, 33000, 0, 0, '-'),
(22, 'Kantong Plastik (3)', 100, 800, 0, 0, 0, '-'),
(23, 'Kantong Plastik (6)', 20, 1000, 0, 0, 0, '-'),
(24, 'Peuyeum Bandung', 6, 26000, 33000, 0, 0, '-');

-- --------------------------------------------------------

--
-- Table structure for table `barang_masuk`
--

CREATE TABLE `barang_masuk` (
  `id_barang_masuk` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang_masuk`
--

INSERT INTO `barang_masuk` (`id_barang_masuk`, `tanggal`, `id_barang`, `jumlah`, `keterangan`) VALUES
(1, '2021-09-15', 1, 3, '-'),
(2, '2021-09-16', 6, 18, '-'),
(3, '2021-09-16', 7, 12, '-'),
(4, '2021-09-16', 4, 20, '-'),
(5, '2021-09-16', 13, 6, '-'),
(6, '2021-09-16', 2, 20, '-'),
(7, '2021-09-16', 3, 20, '-'),
(8, '2021-09-16', 5, 20, '-'),
(9, '2021-09-16', 8, 10, '-'),
(10, '2021-09-16', 9, 13, '-'),
(11, '2021-09-16', 10, 7, '-'),
(12, '2021-09-16', 11, 7, '-'),
(13, '2021-09-16', 12, 6, '-'),
(14, '2021-09-16', 14, 5, '-'),
(15, '2021-09-16', 15, 2, '-'),
(17, '2021-09-16', 16, 1, '-'),
(18, '2021-09-16', 18, 2, '-'),
(19, '2021-09-17', 21, 5, '-'),
(20, '2021-09-18', 2, 45, '-'),
(21, '2021-09-18', 7, 5, '-'),
(22, '2021-09-18', 6, 10, '-'),
(23, '2021-09-18', 4, 5, '-'),
(24, '2021-09-18', 3, 5, '-'),
(25, '2021-09-18', 23, 20, '-'),
(26, '2021-09-18', 22, 100, '-'),
(27, '2021-09-19', 20, 10, '-'),
(28, '2021-09-19', 24, 8, '-');

-- --------------------------------------------------------

--
-- Table structure for table `cash`
--

CREATE TABLE `cash` (
  `id_cash` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` varchar(200) NOT NULL,
  `pemasukan` int(11) DEFAULT NULL,
  `pengeluaran` int(11) DEFAULT NULL,
  `catatan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cash`
--

INSERT INTO `cash` (`id_cash`, `tanggal`, `keterangan`, `pemasukan`, `pengeluaran`, `catatan`) VALUES
(1, '2022-07-18', 'Penjualan Item || T-220718-1', 132000, NULL, '-'),
(2, '2022-11-11', 'Penjualan Item || T-221111-1', 136000, NULL, '-');

-- --------------------------------------------------------

--
-- Table structure for table `gaji`
--

CREATE TABLE `gaji` (
  `id_gaji` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `gaji_pokok` int(11) NOT NULL,
  `kehadiran` int(11) NOT NULL,
  `kasbon` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id_penjualan` varchar(500) NOT NULL,
  `tanggal` date NOT NULL,
  `harga_total` int(11) NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id_penjualan`, `tanggal`, `harga_total`, `keterangan`) VALUES
('T-220718-1', '2022-07-18', 132000, 'Rama 3D'),
('T-221111-1', '2022-11-11', 136000, 'Rey');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan_detail`
--

CREATE TABLE `penjualan_detail` (
  `id_penjualan_detail` int(11) NOT NULL,
  `id_penjualan` varchar(50) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `exp` date DEFAULT NULL,
  `jumlah` int(11) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `diskon` int(11) NOT NULL,
  `harga_subtotal` int(11) NOT NULL,
  `sisa_stok` int(11) DEFAULT NULL,
  `ket_diskon` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjualan_detail`
--

INSERT INTO `penjualan_detail` (`id_penjualan_detail`, `id_penjualan`, `id_barang`, `exp`, `jumlah`, `harga_beli`, `harga_jual`, `diskon`, `harga_subtotal`, `sisa_stok`, `ket_diskon`) VALUES
(1, 'T-220718-1', 24, NULL, 2, 26000, 33000, 0, 66000, NULL, NULL),
(2, 'T-220718-1', 7, NULL, 2, 26000, 33000, 0, 66000, NULL, NULL),
(3, 'T-221111-1', 5, NULL, 2, 26000, 33000, 0, 66000, NULL, NULL),
(4, 'T-221111-1', 8, NULL, 2, 29000, 35000, 0, 70000, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shift`
--

CREATE TABLE `shift` (
  `id_shift` int(11) NOT NULL,
  `nama_shift` int(11) NOT NULL,
  `jam_masuk` time NOT NULL,
  `jam_pulang` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` text NOT NULL,
  `nama` varchar(200) NOT NULL,
  `jabatan` varchar(20) NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `gaji_pokok` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `id_shift` int(11) NOT NULL,
  `role` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama`, `jabatan`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `gaji_pokok`, `email`, `no_hp`, `id_shift`, `role`) VALUES
(1, 'admin', '$2y$10$5VifqomOAsoe39zJDc/GJefzvAwOmvdqMbDeNjocX0piQd5KDOKbS', 'Satria Prawira Yudanta', '', '', '0000-00-00', '', 0, 'tokoberkahsiliwangi@gmail.com', '081322394509', 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id_absensi`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD PRIMARY KEY (`id_barang_masuk`);

--
-- Indexes for table `cash`
--
ALTER TABLE `cash`
  ADD PRIMARY KEY (`id_cash`);

--
-- Indexes for table `gaji`
--
ALTER TABLE `gaji`
  ADD PRIMARY KEY (`id_gaji`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_penjualan`);

--
-- Indexes for table `penjualan_detail`
--
ALTER TABLE `penjualan_detail`
  ADD PRIMARY KEY (`id_penjualan_detail`);

--
-- Indexes for table `shift`
--
ALTER TABLE `shift`
  ADD PRIMARY KEY (`id_shift`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id_absensi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  MODIFY `id_barang_masuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `cash`
--
ALTER TABLE `cash`
  MODIFY `id_cash` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `gaji`
--
ALTER TABLE `gaji`
  MODIFY `id_gaji` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `penjualan_detail`
--
ALTER TABLE `penjualan_detail`
  MODIFY `id_penjualan_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `shift`
--
ALTER TABLE `shift`
  MODIFY `id_shift` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
