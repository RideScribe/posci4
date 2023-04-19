-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 19, 2023 at 04:18 AM
-- Server version: 10.11.2-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `posci4`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_bulan_tahun`
--

CREATE TABLE `tb_bulan_tahun` (
  `id` int(11) UNSIGNED NOT NULL,
  `bulan` varchar(10) NOT NULL,
  `tahun` year(4) NOT NULL,
  `bln_thn` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `tb_bulan_tahun`
--

INSERT INTO `tb_bulan_tahun` (`id`, `bulan`, `tahun`, `bln_thn`) VALUES
(1, 'Jan', '2020', '01-2020'),
(2, 'Feb', '2020', '02-2020'),
(3, 'Mar', '2020', '03-2020'),
(4, 'Apr', '2020', '04-2020'),
(5, 'Mei', '2020', '05-2020'),
(6, 'Jun', '2020', '06-2020'),
(7, 'Jul', '2020', '07-2020'),
(8, 'Agu', '2020', '08-2020'),
(9, 'Sep', '2020', '09-2020'),
(10, 'Okt', '2020', '10-2020'),
(11, 'Nov', '2020', '11-2020'),
(12, 'Des', '2020', '12-2020'),
(13, 'Jan', '2021', '01-2021'),
(14, 'Feb', '2021', '02-2021'),
(15, 'Mar', '2021', '03-2021'),
(16, 'Apr', '2021', '04-2021'),
(17, 'Mei', '2021', '05-2021'),
(18, 'Jun', '2021', '06-2021'),
(19, 'Jul', '2021', '07-2021'),
(20, 'Agu', '2021', '08-2021'),
(21, 'Sep', '2021', '09-2021'),
(22, 'Okt', '2021', '10-2021'),
(23, 'Nov', '2021', '11-2021'),
(24, 'Des', '2021', '12-2021'),
(25, 'Jan', '2022', '01-2022'),
(26, 'Feb', '2022', '02-2022'),
(27, 'Mar', '2022', '03-2022'),
(28, 'Apr', '2022', '04-2022'),
(29, 'Mei', '2022', '05-2022'),
(30, 'Jun', '2022', '06-2022'),
(31, 'Jul', '2022', '07-2022'),
(32, 'Agu', '2022', '08-2022'),
(33, 'Sep', '2022', '09-2022'),
(34, 'Okt', '2022', '10-2022'),
(35, 'Nov', '2022', '11-2022'),
(36, 'Des', '2022', '12-2022'),
(37, 'Jan', '2023', '01-2023'),
(38, 'Feb', '2023', '02-2023'),
(39, 'Mar', '2023', '03-2023'),
(40, 'Apr', '2023', '04-2023'),
(41, 'Mei', '2023', '05-2023'),
(42, 'Jun', '2023', '06-2023'),
(43, 'Jul', '2023', '07-2023'),
(44, 'Agu', '2023', '08-2023'),
(45, 'Sep', '2023', '09-2023'),
(46, 'Okt', '2023', '10-2023'),
(47, 'Nov', '2023', '11-2023'),
(48, 'Des', '2023', '12-2023'),
(49, 'Jan', '2024', '01-2024'),
(50, 'Feb', '2024', '02-2024'),
(51, 'Mar', '2024', '03-2024'),
(52, 'Apr', '2024', '04-2024'),
(53, 'Mei', '2024', '05-2024'),
(54, 'Jun', '2024', '06-2024'),
(55, 'Jul', '2024', '07-2024'),
(56, 'Agu', '2024', '08-2024'),
(57, 'Sep', '2024', '09-2024'),
(58, 'Okt', '2024', '10-2024'),
(59, 'Nov', '2024', '11-2024'),
(60, 'Des', '2024', '12-2024'),
(61, 'Jan', '2025', '01-2025'),
(62, 'Feb', '2025', '02-2025'),
(63, 'Mar', '2025', '03-2025'),
(64, 'Apr', '2025', '04-2025'),
(65, 'Mei', '2025', '05-2025'),
(66, 'Jun', '2025', '06-2025'),
(67, 'Jul', '2025', '07-2025'),
(68, 'Agu', '2025', '08-2025'),
(69, 'Sep', '2025', '09-2025'),
(70, 'Okt', '2025', '10-2025'),
(71, 'Nov', '2025', '11-2025'),
(72, 'Des', '2025', '12-2025'),
(73, 'Jan', '2026', '01-2026'),
(74, 'Feb', '2026', '02-2026'),
(75, 'Mar', '2026', '03-2026'),
(76, 'Apr', '2026', '04-2026'),
(77, 'Mei', '2026', '05-2026'),
(78, 'Jun', '2026', '06-2026'),
(79, 'Jul', '2026', '07-2026'),
(80, 'Agu', '2026', '08-2026'),
(81, 'Sep', '2026', '09-2026'),
(82, 'Okt', '2026', '10-2026'),
(83, 'Nov', '2026', '11-2026'),
(84, 'Des', '2026', '12-2026'),
(85, 'Jan', '2027', '01-2027'),
(86, 'Feb', '2027', '02-2027'),
(87, 'Mar', '2027', '03-2027'),
(88, 'Apr', '2027', '04-2027'),
(89, 'Mei', '2027', '05-2027'),
(90, 'Jun', '2027', '06-2027'),
(91, 'Jul', '2027', '07-2027'),
(92, 'Agu', '2027', '08-2027'),
(93, 'Sep', '2027', '09-2027'),
(94, 'Okt', '2027', '10-2027'),
(95, 'Nov', '2027', '11-2027'),
(96, 'Des', '2027', '12-2027'),
(97, 'Jan', '2028', '01-2028'),
(98, 'Feb', '2028', '02-2028'),
(99, 'Mar', '2028', '03-2028'),
(100, 'Apr', '2028', '04-2028'),
(101, 'Mei', '2028', '05-2028'),
(102, 'Jun', '2028', '06-2028'),
(103, 'Jul', '2028', '07-2028'),
(104, 'Agu', '2028', '08-2028'),
(105, 'Sep', '2028', '09-2028'),
(106, 'Okt', '2028', '10-2028'),
(107, 'Nov', '2028', '11-2028'),
(108, 'Des', '2028', '12-2028'),
(109, 'Jan', '2029', '01-2029'),
(110, 'Feb', '2029', '02-2029'),
(111, 'Mar', '2029', '03-2029'),
(112, 'Apr', '2029', '04-2029'),
(113, 'Mei', '2029', '05-2029'),
(114, 'Jun', '2029', '06-2029'),
(115, 'Jul', '2029', '07-2029'),
(116, 'Agu', '2029', '08-2029'),
(117, 'Sep', '2029', '09-2029'),
(118, 'Okt', '2029', '10-2029'),
(119, 'Nov', '2029', '11-2029'),
(120, 'Des', '2029', '12-2029'),
(121, 'Jan', '2030', '01-2030'),
(122, 'Feb', '2030', '02-2030'),
(123, 'Mar', '2030', '03-2030'),
(124, 'Apr', '2030', '04-2030'),
(125, 'Mei', '2030', '05-2030'),
(126, 'Jun', '2030', '06-2030'),
(127, 'Jul', '2030', '07-2030'),
(128, 'Agu', '2030', '08-2030'),
(129, 'Sep', '2030', '09-2030'),
(130, 'Okt', '2030', '10-2030'),
(131, 'Nov', '2030', '11-2030'),
(132, 'Des', '2030', '12-2030');

-- --------------------------------------------------------

--
-- Table structure for table `tb_item`
--

CREATE TABLE `tb_item` (
  `id` int(11) UNSIGNED NOT NULL,
  `barcode` varchar(50) NOT NULL,
  `nama_item` varchar(100) NOT NULL,
  `id_kategori` int(11) UNSIGNED NOT NULL,
  `id_unit` int(11) UNSIGNED NOT NULL,
  `id_pemasok` int(11) UNSIGNED NOT NULL,
  `harga` int(11) UNSIGNED NOT NULL,
  `stok` int(11) UNSIGNED NOT NULL,
  `gambar` varchar(100) NOT NULL DEFAULT 'gambar.jpg',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `tb_item`
--

INSERT INTO `tb_item` (`id`, `barcode`, `nama_item`, `id_kategori`, `id_unit`, `id_pemasok`, `harga`, `stok`, `gambar`, `created_at`, `updated_at`, `deleted_at`) VALUES
(8, 'CUO001', 'KOPI SUSU GULA AREN', 2, 8, 4, 15000, 99997, '1681377992_88bbb41bed184b322fdc.png', '2023-04-13 16:26:32', '2023-04-13 16:59:37', '0000-00-00 00:00:00'),
(9, 'CUO002', 'KOPI SUSU GULA AREN', 2, 9, 4, 23000, 100000, '1681378058_927aa959c5a73d619307.png', '2023-04-13 16:27:38', '2023-04-13 16:27:47', '0000-00-00 00:00:00'),
(10, 'CUO003', 'KOPI SUSU GULA AREN', 2, 7, 4, 18000, 99999, '1681378109_467e82986322c114f30d.png', '2023-04-13 16:28:29', '2023-04-18 11:37:07', '0000-00-00 00:00:00'),
(11, 'FOP001', 'KENTANG GORENG', 1, 10, 4, 10000, 14998, '1681378232_ddbf5102d7b6d1f379bf.png', '2023-04-13 16:30:32', '2023-04-18 11:37:07', '0000-00-00 00:00:00'),
(12, 'FOP002', 'TAHU BAKSO', 1, 10, 4, 10000, 13000, '1681378232_ddbf5102d7b6d1f379bf.png', '2023-04-13 16:30:32', '2023-04-13 16:30:32', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id` int(11) UNSIGNED NOT NULL,
  `nama_kategori` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`id`, `nama_kategori`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Makanan', '2021-10-12 18:31:03', '2021-10-12 18:31:03', '0000-00-00 00:00:00'),
(2, 'Minuman', '2021-10-12 18:31:07', '2021-10-19 22:19:43', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pelanggan`
--

CREATE TABLE `tb_pelanggan` (
  `id` int(11) UNSIGNED NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `jenkel` varchar(1) NOT NULL,
  `telp_pelanggan` varchar(20) NOT NULL,
  `alamat_pelanggan` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `tb_pelanggan`
--

INSERT INTO `tb_pelanggan` (`id`, `nama_pelanggan`, `jenkel`, `telp_pelanggan`, `alamat_pelanggan`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Umum', '', '-', '-', '2021-10-12 00:00:00', '2022-05-02 21:52:31', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pemasok`
--

CREATE TABLE `tb_pemasok` (
  `id` int(11) UNSIGNED NOT NULL,
  `nama_pemasok` varchar(100) NOT NULL,
  `telp_pemasok` varchar(20) NOT NULL,
  `alamat_pemasok` varchar(100) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `tb_pemasok`
--

INSERT INTO `tb_pemasok` (`id`, `nama_pemasok`, `telp_pemasok`, `alamat_pemasok`, `keterangan`, `created_at`, `updated_at`, `deleted_at`) VALUES
(4, 'KOTAMA', '081243211234', 'Karanganyar Pekalongan', '', '2023-04-13 16:24:52', '2023-04-13 16:24:52', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengaturan`
--

CREATE TABLE `tb_pengaturan` (
  `nama_toko` varchar(20) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `alamat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_pengaturan`
--

INSERT INTO `tb_pengaturan` (`nama_toko`, `no_telp`, `alamat`) VALUES
('KAFE HERA', '081295018034', 'Comal Pemalang');

-- --------------------------------------------------------

--
-- Table structure for table `tb_penjualan`
--

CREATE TABLE `tb_penjualan` (
  `id` int(11) UNSIGNED NOT NULL,
  `invoice` varchar(50) NOT NULL,
  `id_pelanggan` int(11) UNSIGNED NOT NULL,
  `total_harga` int(11) UNSIGNED NOT NULL,
  `diskon` int(11) UNSIGNED NOT NULL,
  `total_akhir` int(11) UNSIGNED NOT NULL,
  `tunai` int(11) UNSIGNED NOT NULL,
  `kembalian` int(11) UNSIGNED NOT NULL,
  `catatan` text NOT NULL,
  `tanggal` date NOT NULL,
  `id_user` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `tb_penjualan`
--

INSERT INTO `tb_penjualan` (`id`, `invoice`, `id_pelanggan`, `total_harga`, `diskon`, `total_akhir`, `tunai`, `kembalian`, `catatan`, `tanggal`, `id_user`, `ip_address`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'INV2304130001', 1, 55000, 0, 55000, 100000, 45000, 'ini adalah catatanya', '2023-04-13', 1, '::1', '2023-04-13 16:59:37', '2023-04-13 16:59:37', '0000-00-00 00:00:00'),
(2, 'INV2304180001', 1, 28000, 0, 28000, 30000, 2000, '', '2023-04-18', 3, '::1', '2023-04-18 11:37:07', '2023-04-18 11:37:07', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_roles`
--

CREATE TABLE `tb_roles` (
  `id` int(11) NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `tb_roles`
--

INSERT INTO `tb_roles` (`id`, `keterangan`) VALUES
(1, 'Super Admin'),
(2, 'Administrator'),
(3, 'Kasir');

-- --------------------------------------------------------

--
-- Table structure for table `tb_stok`
--

CREATE TABLE `tb_stok` (
  `id_stok` int(11) UNSIGNED NOT NULL,
  `tipe` enum('masuk','keluar') DEFAULT NULL,
  `id_item` int(11) UNSIGNED NOT NULL,
  `id_pemasok` int(11) UNSIGNED NOT NULL,
  `jumlah` int(11) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `id_user` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_transaksi` int(11) UNSIGNED NOT NULL,
  `id_penjualan` int(11) UNSIGNED NOT NULL,
  `id_item` int(11) UNSIGNED NOT NULL,
  `harga_item` int(11) UNSIGNED NOT NULL,
  `jumlah_item` int(11) UNSIGNED NOT NULL,
  `diskon_item` int(11) UNSIGNED NOT NULL,
  `subtotal` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id_transaksi`, `id_penjualan`, `id_item`, `harga_item`, `jumlah_item`, `diskon_item`, `subtotal`, `ip_address`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 11, 10000, 1, 0, 10000, '::1', '2023-04-13 16:59:37', '2023-04-13 16:59:37', '0000-00-00 00:00:00'),
(2, 1, 8, 15000, 3, 0, 45000, '::1', '2023-04-13 16:59:37', '2023-04-13 16:59:37', '0000-00-00 00:00:00'),
(3, 2, 10, 18000, 1, 0, 18000, '::1', '2023-04-18 11:37:07', '2023-04-18 11:37:07', '0000-00-00 00:00:00'),
(4, 2, 11, 10000, 1, 0, 10000, '::1', '2023-04-18 11:37:07', '2023-04-18 11:37:07', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_unit`
--

CREATE TABLE `tb_unit` (
  `id` int(11) UNSIGNED NOT NULL,
  `nama_unit` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `tb_unit`
--

INSERT INTO `tb_unit` (`id`, `nama_unit`, `created_at`, `updated_at`, `deleted_at`) VALUES
(7, 'Medium Cup', '2023-04-13 16:23:12', '2023-04-13 16:25:08', '0000-00-00 00:00:00'),
(8, 'Regular Cup', '2023-04-13 16:25:15', '2023-04-13 16:25:15', '0000-00-00 00:00:00'),
(9, 'Large Cup', '2023-04-13 16:25:26', '2023-04-13 16:25:26', '0000-00-00 00:00:00'),
(10, 'Porsi', '2023-04-13 16:28:56', '2023-04-13 16:28:56', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_users`
--

CREATE TABLE `tb_users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `id_role` int(11) NOT NULL,
  `avatar` varchar(255) NOT NULL DEFAULT 'avatar.jpg',
  `status` int(1) NOT NULL DEFAULT 0,
  `token` varchar(255) DEFAULT NULL,
  `ip_address` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `tb_users`
--

INSERT INTO `tb_users` (`id`, `email`, `username`, `password`, `nama`, `alamat`, `id_role`, `avatar`, `status`, `token`, `ip_address`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'sejatordev@gmail.com', 'superadmin', '$2y$10$PG9Nxciie3SHDVS6.a0Uw.QUqiAQx7pmM5qRnNuF0I5HvUpGbV50a', 'Super Admin', 'Bandung', 1, 'avatar.jpg', 1, '7b9abf00d73a783b2f1559517823fd60331f9b0ae065f68b732be0a364ab7347', '0.0.0.0', '2021-10-12 18:29:41', '2023-03-01 11:05:48', NULL),
(2, 'admin@gmail.com', 'admin', '$2y$10$DMm.sX1hMZMmwufMtk4Ktug0Tp3VIeskxo8Dukcq1crEr5WE32hHW', 'Administrator', 'Boyolali', 2, 'avatar.jpg', 1, 'bdbc976f1212965d03dcce1fecbcc811d3c817b7efd1aa61c090b5d7913b895f', '0.0.0.0', '2021-10-12 18:29:41', '2023-03-01 11:06:03', NULL),
(3, 'kasir@gmail.com', 'kasir', '$2y$10$q1sAVbrj2Jt2w50GFXYPOuyLbgJgAFgVEBldMa85/eN0MzZI4X.CK', 'Kasir', 'Bandung', 3, '1681792800_662cb8ebe865dd97bb35.png', 1, NULL, '0.0.0.0', '2021-10-12 18:29:41', '2023-04-18 11:40:00', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_bulan_tahun`
--
ALTER TABLE `tb_bulan_tahun`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_item`
--
ALTER TABLE `tb_item`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `barcode` (`barcode`),
  ADD KEY `tb_item_id_unit_foreign` (`id_unit`),
  ADD KEY `id_kategori_id_unit` (`id_kategori`,`id_unit`),
  ADD KEY `id_pemasok` (`id_pemasok`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pemasok`
--
ALTER TABLE `tb_pemasok`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_penjualan`
--
ALTER TABLE `tb_penjualan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_penjualan_id_user_foreign` (`id_user`),
  ADD KEY `id_pelanggan_id_user` (`id_pelanggan`,`id_user`);

--
-- Indexes for table `tb_roles`
--
ALTER TABLE `tb_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_stok`
--
ALTER TABLE `tb_stok`
  ADD PRIMARY KEY (`id_stok`),
  ADD KEY `tb_stok_id_pemasok_foreign` (`id_pemasok`),
  ADD KEY `tb_stok_id_user_foreign` (`id_user`),
  ADD KEY `id_item_id_pemasok_id_user` (`id_item`,`id_pemasok`,`id_user`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `tb_transaksi_id_item_foreign` (`id_item`),
  ADD KEY `id_penjualan_id_item` (`id_penjualan`,`id_item`);

--
-- Indexes for table `tb_unit`
--
ALTER TABLE `tb_unit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_username` (`email`,`username`),
  ADD KEY `id_role` (`id_role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_bulan_tahun`
--
ALTER TABLE `tb_bulan_tahun`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT for table `tb_item`
--
ALTER TABLE `tb_item`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tb_pemasok`
--
ALTER TABLE `tb_pemasok`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_penjualan`
--
ALTER TABLE `tb_penjualan`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_roles`
--
ALTER TABLE `tb_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_stok`
--
ALTER TABLE `tb_stok`
  MODIFY `id_stok` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id_transaksi` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_unit`
--
ALTER TABLE `tb_unit`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_item`
--
ALTER TABLE `tb_item`
  ADD CONSTRAINT `tb_item_id_kategori_foreign` FOREIGN KEY (`id_kategori`) REFERENCES `tb_kategori` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_item_id_pemasok_foreign` FOREIGN KEY (`id_pemasok`) REFERENCES `tb_pemasok` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_item_id_unit_foreign` FOREIGN KEY (`id_unit`) REFERENCES `tb_unit` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `tb_penjualan`
--
ALTER TABLE `tb_penjualan`
  ADD CONSTRAINT `tb_penjualan_id_pelanggan_foreign` FOREIGN KEY (`id_pelanggan`) REFERENCES `tb_pelanggan` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_penjualan_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `tb_users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `tb_stok`
--
ALTER TABLE `tb_stok`
  ADD CONSTRAINT `tb_stok_id_item_foreign` FOREIGN KEY (`id_item`) REFERENCES `tb_item` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_stok_id_pemasok_foreign` FOREIGN KEY (`id_pemasok`) REFERENCES `tb_pemasok` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_stok_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `tb_users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD CONSTRAINT `tb_transaksi_id_item_foreign` FOREIGN KEY (`id_item`) REFERENCES `tb_item` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_transaksi_id_penjualan_foreign` FOREIGN KEY (`id_penjualan`) REFERENCES `tb_penjualan` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `tb_users`
--
ALTER TABLE `tb_users`
  ADD CONSTRAINT `tb_users_id_role_foreign` FOREIGN KEY (`id_role`) REFERENCES `tb_roles` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;