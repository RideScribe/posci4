/*
 Navicat Premium Data Transfer

 Source Server         : local PC
 Source Server Type    : MySQL
 Source Server Version : 100612 (10.6.12-MariaDB-0ubuntu0.22.04.1)
 Source Host           : localhost:3306
 Source Schema         : posci4

 Target Server Type    : MySQL
 Target Server Version : 100612 (10.6.12-MariaDB-0ubuntu0.22.04.1)
 File Encoding         : 65001

 Date: 10/01/2024 12:53:25
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
BEGIN;
INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES (46, '2020-10-08-232503', 'App\\Database\\Migrations\\Users', 'default', 'App', 1695625680, 1);
INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES (47, '2021-08-05-131738', 'App\\Database\\Migrations\\Pemasok', 'default', 'App', 1695625680, 1);
INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES (48, '2021-08-10-132738', 'App\\Database\\Migrations\\Item', 'default', 'App', 1695625681, 1);
INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES (49, '2021-08-25-163243', 'App\\Database\\Migrations\\Pelanggan', 'default', 'App', 1695625681, 1);
INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES (50, '2021-08-31-152529', 'App\\Database\\Migrations\\Penjualan', 'default', 'App', 1695625681, 1);
INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES (51, '2021-09-01-140730', 'App\\Database\\Migrations\\Stok', 'default', 'App', 1695625681, 1);
INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES (52, '2021-09-22-145047', 'App\\Database\\Migrations\\BulanTahun', 'default', 'App', 1695625681, 1);
INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES (53, '2021-09-25-145047', 'App\\Database\\Migrations\\Pengaturan', 'default', 'App', 1695625681, 1);
INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES (54, '2023-07-08-103010', 'App\\Database\\Migrations\\Tempat', 'default', 'App', 1695625681, 1);
COMMIT;

-- ----------------------------
-- Table structure for tb_bulan_tahun
-- ----------------------------
DROP TABLE IF EXISTS `tb_bulan_tahun`;
CREATE TABLE `tb_bulan_tahun` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `bulan` varchar(10) NOT NULL,
  `tahun` year(4) NOT NULL,
  `bln_thn` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- ----------------------------
-- Records of tb_bulan_tahun
-- ----------------------------
BEGIN;
INSERT INTO `tb_bulan_tahun` (`id`, `bulan`, `tahun`, `bln_thn`) VALUES (1, 'Jan', 2022, '01-2022');
INSERT INTO `tb_bulan_tahun` (`id`, `bulan`, `tahun`, `bln_thn`) VALUES (2, 'Feb', 2022, '02-2022');
INSERT INTO `tb_bulan_tahun` (`id`, `bulan`, `tahun`, `bln_thn`) VALUES (3, 'Mar', 2022, '03-2022');
INSERT INTO `tb_bulan_tahun` (`id`, `bulan`, `tahun`, `bln_thn`) VALUES (4, 'Apr', 2022, '04-2022');
INSERT INTO `tb_bulan_tahun` (`id`, `bulan`, `tahun`, `bln_thn`) VALUES (5, 'Mei', 2022, '05-2022');
INSERT INTO `tb_bulan_tahun` (`id`, `bulan`, `tahun`, `bln_thn`) VALUES (6, 'Jun', 2022, '06-2022');
INSERT INTO `tb_bulan_tahun` (`id`, `bulan`, `tahun`, `bln_thn`) VALUES (7, 'Jul', 2022, '07-2022');
INSERT INTO `tb_bulan_tahun` (`id`, `bulan`, `tahun`, `bln_thn`) VALUES (8, 'Agu', 2022, '08-2022');
INSERT INTO `tb_bulan_tahun` (`id`, `bulan`, `tahun`, `bln_thn`) VALUES (9, 'Sep', 2022, '09-2022');
INSERT INTO `tb_bulan_tahun` (`id`, `bulan`, `tahun`, `bln_thn`) VALUES (10, 'Okt', 2022, '10-2022');
INSERT INTO `tb_bulan_tahun` (`id`, `bulan`, `tahun`, `bln_thn`) VALUES (11, 'Nov', 2022, '11-2022');
INSERT INTO `tb_bulan_tahun` (`id`, `bulan`, `tahun`, `bln_thn`) VALUES (12, 'Des', 2022, '12-2022');
INSERT INTO `tb_bulan_tahun` (`id`, `bulan`, `tahun`, `bln_thn`) VALUES (13, 'Jan', 2023, '01-2023');
INSERT INTO `tb_bulan_tahun` (`id`, `bulan`, `tahun`, `bln_thn`) VALUES (14, 'Feb', 2023, '02-2023');
INSERT INTO `tb_bulan_tahun` (`id`, `bulan`, `tahun`, `bln_thn`) VALUES (15, 'Mar', 2023, '03-2023');
INSERT INTO `tb_bulan_tahun` (`id`, `bulan`, `tahun`, `bln_thn`) VALUES (16, 'Apr', 2023, '04-2023');
INSERT INTO `tb_bulan_tahun` (`id`, `bulan`, `tahun`, `bln_thn`) VALUES (17, 'Mei', 2023, '05-2023');
INSERT INTO `tb_bulan_tahun` (`id`, `bulan`, `tahun`, `bln_thn`) VALUES (18, 'Jun', 2023, '06-2023');
INSERT INTO `tb_bulan_tahun` (`id`, `bulan`, `tahun`, `bln_thn`) VALUES (19, 'Jul', 2023, '07-2023');
INSERT INTO `tb_bulan_tahun` (`id`, `bulan`, `tahun`, `bln_thn`) VALUES (20, 'Agu', 2023, '08-2023');
INSERT INTO `tb_bulan_tahun` (`id`, `bulan`, `tahun`, `bln_thn`) VALUES (21, 'Sep', 2023, '09-2023');
INSERT INTO `tb_bulan_tahun` (`id`, `bulan`, `tahun`, `bln_thn`) VALUES (22, 'Okt', 2023, '10-2023');
INSERT INTO `tb_bulan_tahun` (`id`, `bulan`, `tahun`, `bln_thn`) VALUES (23, 'Nov', 2023, '11-2023');
INSERT INTO `tb_bulan_tahun` (`id`, `bulan`, `tahun`, `bln_thn`) VALUES (24, 'Des', 2023, '12-2023');
INSERT INTO `tb_bulan_tahun` (`id`, `bulan`, `tahun`, `bln_thn`) VALUES (25, 'Jan', 2024, '01-2024');
INSERT INTO `tb_bulan_tahun` (`id`, `bulan`, `tahun`, `bln_thn`) VALUES (26, 'Feb', 2024, '02-2024');
INSERT INTO `tb_bulan_tahun` (`id`, `bulan`, `tahun`, `bln_thn`) VALUES (27, 'Mar', 2024, '03-2024');
INSERT INTO `tb_bulan_tahun` (`id`, `bulan`, `tahun`, `bln_thn`) VALUES (28, 'Apr', 2024, '04-2024');
INSERT INTO `tb_bulan_tahun` (`id`, `bulan`, `tahun`, `bln_thn`) VALUES (29, 'Mei', 2024, '05-2024');
INSERT INTO `tb_bulan_tahun` (`id`, `bulan`, `tahun`, `bln_thn`) VALUES (30, 'Jun', 2024, '06-2024');
INSERT INTO `tb_bulan_tahun` (`id`, `bulan`, `tahun`, `bln_thn`) VALUES (31, 'Jul', 2024, '07-2024');
INSERT INTO `tb_bulan_tahun` (`id`, `bulan`, `tahun`, `bln_thn`) VALUES (32, 'Agu', 2024, '08-2024');
INSERT INTO `tb_bulan_tahun` (`id`, `bulan`, `tahun`, `bln_thn`) VALUES (33, 'Sep', 2024, '09-2024');
INSERT INTO `tb_bulan_tahun` (`id`, `bulan`, `tahun`, `bln_thn`) VALUES (34, 'Okt', 2024, '10-2024');
INSERT INTO `tb_bulan_tahun` (`id`, `bulan`, `tahun`, `bln_thn`) VALUES (35, 'Nov', 2024, '11-2024');
INSERT INTO `tb_bulan_tahun` (`id`, `bulan`, `tahun`, `bln_thn`) VALUES (36, 'Des', 2024, '12-2024');
INSERT INTO `tb_bulan_tahun` (`id`, `bulan`, `tahun`, `bln_thn`) VALUES (37, 'Jan', 2025, '01-2025');
INSERT INTO `tb_bulan_tahun` (`id`, `bulan`, `tahun`, `bln_thn`) VALUES (38, 'Feb', 2025, '02-2025');
INSERT INTO `tb_bulan_tahun` (`id`, `bulan`, `tahun`, `bln_thn`) VALUES (39, 'Mar', 2025, '03-2025');
INSERT INTO `tb_bulan_tahun` (`id`, `bulan`, `tahun`, `bln_thn`) VALUES (40, 'Apr', 2025, '04-2025');
INSERT INTO `tb_bulan_tahun` (`id`, `bulan`, `tahun`, `bln_thn`) VALUES (41, 'Mei', 2025, '05-2025');
INSERT INTO `tb_bulan_tahun` (`id`, `bulan`, `tahun`, `bln_thn`) VALUES (42, 'Jun', 2025, '06-2025');
INSERT INTO `tb_bulan_tahun` (`id`, `bulan`, `tahun`, `bln_thn`) VALUES (43, 'Jul', 2025, '07-2025');
INSERT INTO `tb_bulan_tahun` (`id`, `bulan`, `tahun`, `bln_thn`) VALUES (44, 'Agu', 2025, '08-2025');
INSERT INTO `tb_bulan_tahun` (`id`, `bulan`, `tahun`, `bln_thn`) VALUES (45, 'Sep', 2025, '09-2025');
INSERT INTO `tb_bulan_tahun` (`id`, `bulan`, `tahun`, `bln_thn`) VALUES (46, 'Okt', 2025, '10-2025');
INSERT INTO `tb_bulan_tahun` (`id`, `bulan`, `tahun`, `bln_thn`) VALUES (47, 'Nov', 2025, '11-2025');
INSERT INTO `tb_bulan_tahun` (`id`, `bulan`, `tahun`, `bln_thn`) VALUES (48, 'Des', 2025, '12-2025');
COMMIT;

-- ----------------------------
-- Table structure for tb_item
-- ----------------------------
DROP TABLE IF EXISTS `tb_item`;
CREATE TABLE `tb_item` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `barcode` varchar(50) NOT NULL,
  `nama_item` varchar(100) NOT NULL,
  `id_kategori` int(11) unsigned NOT NULL,
  `id_unit` int(11) unsigned NOT NULL,
  `id_pemasok` int(11) unsigned NOT NULL,
  `harga` int(11) unsigned NOT NULL,
  `stok` int(11) unsigned NOT NULL,
  `gambar` varchar(100) NOT NULL DEFAULT 'gambar.jpg',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `barcode` (`barcode`),
  KEY `tb_item_id_unit_foreign` (`id_unit`),
  KEY `tb_item_id_pemasok_foreign` (`id_pemasok`),
  KEY `id_kategori_id_unit_id_pemasok` (`id_kategori`,`id_unit`,`id_pemasok`),
  CONSTRAINT `tb_item_id_kategori_foreign` FOREIGN KEY (`id_kategori`) REFERENCES `tb_kategori` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `tb_item_id_pemasok_foreign` FOREIGN KEY (`id_pemasok`) REFERENCES `tb_pemasok` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `tb_item_id_unit_foreign` FOREIGN KEY (`id_unit`) REFERENCES `tb_unit` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- ----------------------------
-- Records of tb_item
-- ----------------------------
BEGIN;
INSERT INTO `tb_item` (`id`, `barcode`, `nama_item`, `id_kategori`, `id_unit`, `id_pemasok`, `harga`, `stok`, `gambar`, `created_at`, `updated_at`, `deleted_at`) VALUES (1, 'MKN-0001', 'Nasi Goreng', 1, 1, 1, 20000, 87, 'gambar.jpg', '2023-09-25 02:08:03', '2024-01-06 11:01:33', '0000-00-00 00:00:00');
INSERT INTO `tb_item` (`id`, `barcode`, `nama_item`, `id_kategori`, `id_unit`, `id_pemasok`, `harga`, `stok`, `gambar`, `created_at`, `updated_at`, `deleted_at`) VALUES (2, 'MKN-0002', 'Mie Goreng', 1, 1, 1, 20000, 99, 'gambar.jpg', '2023-09-25 02:08:03', '2024-01-01 02:57:03', '0000-00-00 00:00:00');
INSERT INTO `tb_item` (`id`, `barcode`, `nama_item`, `id_kategori`, `id_unit`, `id_pemasok`, `harga`, `stok`, `gambar`, `created_at`, `updated_at`, `deleted_at`) VALUES (3, 'MKN-0003', 'Nasi Goreng Seafood', 1, 1, 1, 25000, 98, 'gambar.jpg', '2023-09-25 02:08:03', '2023-12-28 04:54:08', '0000-00-00 00:00:00');
INSERT INTO `tb_item` (`id`, `barcode`, `nama_item`, `id_kategori`, `id_unit`, `id_pemasok`, `harga`, `stok`, `gambar`, `created_at`, `updated_at`, `deleted_at`) VALUES (4, 'MKN-0004', 'Nasi Goreng Ayam', 1, 1, 1, 25000, 94, 'gambar.jpg', '2023-09-25 02:08:03', '2024-01-01 18:20:58', '0000-00-00 00:00:00');
INSERT INTO `tb_item` (`id`, `barcode`, `nama_item`, `id_kategori`, `id_unit`, `id_pemasok`, `harga`, `stok`, `gambar`, `created_at`, `updated_at`, `deleted_at`) VALUES (5, 'MNM-0001', 'Es Teh Manis', 2, 2, 1, 5000, 91, 'gambar.jpg', '2023-09-25 02:08:03', '2024-01-01 18:20:58', '0000-00-00 00:00:00');
INSERT INTO `tb_item` (`id`, `barcode`, `nama_item`, `id_kategori`, `id_unit`, `id_pemasok`, `harga`, `stok`, `gambar`, `created_at`, `updated_at`, `deleted_at`) VALUES (6, 'MNM-0002', 'Matcha Latte', 2, 2, 1, 10000, 100, 'gambar.jpg', '2023-09-25 02:08:03', '2023-09-25 02:08:03', '0000-00-00 00:00:00');
INSERT INTO `tb_item` (`id`, `barcode`, `nama_item`, `id_kategori`, `id_unit`, `id_pemasok`, `harga`, `stok`, `gambar`, `created_at`, `updated_at`, `deleted_at`) VALUES (7, 'MNM-0003', 'Taro Latte', 2, 2, 1, 10000, 96, 'gambar.jpg', '2023-09-25 02:08:03', '2024-01-06 11:01:33', '0000-00-00 00:00:00');
INSERT INTO `tb_item` (`id`, `barcode`, `nama_item`, `id_kategori`, `id_unit`, `id_pemasok`, `harga`, `stok`, `gambar`, `created_at`, `updated_at`, `deleted_at`) VALUES (8, 'MNM-0004', 'Es Jeruk', 2, 2, 1, 5000, 96, 'gambar.jpg', '2023-09-25 02:08:03', '2024-01-01 18:20:58', '0000-00-00 00:00:00');
INSERT INTO `tb_item` (`id`, `barcode`, `nama_item`, `id_kategori`, `id_unit`, `id_pemasok`, `harga`, `stok`, `gambar`, `created_at`, `updated_at`, `deleted_at`) VALUES (9, 'MNM-0005', 'Minuman Test', 2, 2, 1, 19000, 1000, '1703727850_fe5b20d8cb5e8f59706e.jpg', '2023-12-28 08:44:10', '2023-12-28 08:44:10', '0000-00-00 00:00:00');
COMMIT;

-- ----------------------------
-- Table structure for tb_kategori
-- ----------------------------
DROP TABLE IF EXISTS `tb_kategori`;
CREATE TABLE `tb_kategori` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- ----------------------------
-- Records of tb_kategori
-- ----------------------------
BEGIN;
INSERT INTO `tb_kategori` (`id`, `nama_kategori`, `created_at`, `updated_at`, `deleted_at`) VALUES (1, 'Makanan', '2023-09-25 02:08:03', '2023-09-25 02:08:03', '0000-00-00 00:00:00');
INSERT INTO `tb_kategori` (`id`, `nama_kategori`, `created_at`, `updated_at`, `deleted_at`) VALUES (2, 'Minuman', '2023-09-25 02:08:03', '2023-09-25 02:08:03', '0000-00-00 00:00:00');
INSERT INTO `tb_kategori` (`id`, `nama_kategori`, `created_at`, `updated_at`, `deleted_at`) VALUES (3, 'Snack', '2023-09-25 02:08:03', '2023-09-25 02:08:03', '0000-00-00 00:00:00');
INSERT INTO `tb_kategori` (`id`, `nama_kategori`, `created_at`, `updated_at`, `deleted_at`) VALUES (4, 'Lainnya', '2023-09-25 02:08:03', '2023-09-25 21:01:28', '0000-00-00 00:00:00');
COMMIT;

-- ----------------------------
-- Table structure for tb_pemasok
-- ----------------------------
DROP TABLE IF EXISTS `tb_pemasok`;
CREATE TABLE `tb_pemasok` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nama_pemasok` varchar(100) NOT NULL,
  `telp_pemasok` varchar(20) NOT NULL,
  `alamat_pemasok` varchar(100) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- ----------------------------
-- Records of tb_pemasok
-- ----------------------------
BEGIN;
INSERT INTO `tb_pemasok` (`id`, `nama_pemasok`, `telp_pemasok`, `alamat_pemasok`, `keterangan`, `created_at`, `updated_at`, `deleted_at`) VALUES (1, 'Restoran Legita', '(+62) 977 0842 4513', 'Ki. Sukabumi No. 328, Pematangsiantar 58892, NTT', 'Ab vero.', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `tb_pemasok` (`id`, `nama_pemasok`, `telp_pemasok`, `alamat_pemasok`, `keterangan`, `created_at`, `updated_at`, `deleted_at`) VALUES (2, 'PD Mansur Sihotang Tbk', '(+62) 590 8717 2735', 'Dk. Labu No. 911, Padang 97325, Sumbar', 'Aut nisi.', '2023-09-25 02:08:03', '2023-09-25 02:08:03', '0000-00-00 00:00:00');
INSERT INTO `tb_pemasok` (`id`, `nama_pemasok`, `telp_pemasok`, `alamat_pemasok`, `keterangan`, `created_at`, `updated_at`, `deleted_at`) VALUES (3, 'PT Hutasoit Manullang (Persero) Tbk', '0221 3885 6281', 'Jln. Abdul Muis No. 231, Denpasar 84158, Sumsel', 'Eveniet.', '2023-09-25 02:08:03', '2023-09-25 02:08:03', '0000-00-00 00:00:00');
INSERT INTO `tb_pemasok` (`id`, `nama_pemasok`, `telp_pemasok`, `alamat_pemasok`, `keterangan`, `created_at`, `updated_at`, `deleted_at`) VALUES (4, 'CV Nainggolan Tbk', '0864 085 753', 'Ki. Agus Salim No. 509, Kediri 97780, Kalbar', 'Vel nisi.', '2023-09-25 02:08:03', '2023-09-25 02:08:03', '0000-00-00 00:00:00');
INSERT INTO `tb_pemasok` (`id`, `nama_pemasok`, `telp_pemasok`, `alamat_pemasok`, `keterangan`, `created_at`, `updated_at`, `deleted_at`) VALUES (5, 'UD Damanik', '0834 9367 8543', 'Jr. Babadan No. 467, Prabumulih 91967, Jateng', 'Quis.', '2023-09-25 02:08:03', '2023-09-25 02:08:03', '0000-00-00 00:00:00');
INSERT INTO `tb_pemasok` (`id`, `nama_pemasok`, `telp_pemasok`, `alamat_pemasok`, `keterangan`, `created_at`, `updated_at`, `deleted_at`) VALUES (6, 'PT Prasetya', '0618 2209 1474', 'Jln. Ir. H. Juanda No. 234, Surabaya 31111, Sulsel', 'Non quia.', '2023-09-25 02:08:03', '2023-09-25 02:08:03', '0000-00-00 00:00:00');
COMMIT;

-- ----------------------------
-- Table structure for tb_pengaturan
-- ----------------------------
DROP TABLE IF EXISTS `tb_pengaturan`;
CREATE TABLE `tb_pengaturan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_toko` varchar(20) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- ----------------------------
-- Records of tb_pengaturan
-- ----------------------------
BEGIN;
INSERT INTO `tb_pengaturan` (`id`, `nama_toko`, `no_telp`, `alamat`) VALUES (1, 'Restoran Legita', '081234567890', 'Jl. Raya Jember No. 123');
COMMIT;

-- ----------------------------
-- Table structure for tb_penjualan
-- ----------------------------
DROP TABLE IF EXISTS `tb_penjualan`;
CREATE TABLE `tb_penjualan` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `invoice` varchar(50) NOT NULL,
  `pelanggan` varchar(255) NOT NULL,
  `total_harga` int(11) unsigned NOT NULL,
  `diskon` int(11) unsigned NOT NULL,
  `total_akhir` int(11) unsigned NOT NULL,
  `tunai` int(11) unsigned DEFAULT NULL,
  `kembalian` int(11) unsigned NOT NULL,
  `catatan` text NOT NULL,
  `tanggal` date NOT NULL,
  `id_user` int(11) unsigned NOT NULL,
  `ip_address` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `tb_penjualan_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `tb_users` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- ----------------------------
-- Records of tb_penjualan
-- ----------------------------
BEGIN;
INSERT INTO `tb_penjualan` (`id`, `invoice`, `pelanggan`, `total_harga`, `diskon`, `total_akhir`, `tunai`, `kembalian`, `catatan`, `tanggal`, `id_user`, `ip_address`, `created_at`, `updated_at`, `deleted_at`) VALUES (1, 'INV2312250001', 'bambang', 25000, 0, 25000, 50000, 25000, '', '2023-11-25', 1, '127.0.0.1', '2023-12-25 16:28:14', '2023-12-25 16:28:14', '0000-00-00 00:00:00');
INSERT INTO `tb_penjualan` (`id`, `invoice`, `pelanggan`, `total_harga`, `diskon`, `total_akhir`, `tunai`, `kembalian`, `catatan`, `tanggal`, `id_user`, `ip_address`, `created_at`, `updated_at`, `deleted_at`) VALUES (2, 'INV2312250002', 'bambang', 25000, 0, 25000, 50000, 25000, '', '2023-12-26', 1, '127.0.0.1', '2023-12-26 16:28:14', '2023-12-26 16:28:14', '0000-00-00 00:00:00');
INSERT INTO `tb_penjualan` (`id`, `invoice`, `pelanggan`, `total_harga`, `diskon`, `total_akhir`, `tunai`, `kembalian`, `catatan`, `tanggal`, `id_user`, `ip_address`, `created_at`, `updated_at`, `deleted_at`) VALUES (3, 'INV2312280001', 'Nizar', 60000, 10, 54000, 100000, 46000, '', '2023-12-28', 1, '127.0.0.1', '2023-12-28 04:54:08', '2023-12-28 04:54:08', '0000-00-00 00:00:00');
INSERT INTO `tb_penjualan` (`id`, `invoice`, `pelanggan`, `total_harga`, `diskon`, `total_akhir`, `tunai`, `kembalian`, `catatan`, `tanggal`, `id_user`, `ip_address`, `created_at`, `updated_at`, `deleted_at`) VALUES (4, 'INV2312280002', 'IOP', 18000, 0, 18000, 20000, 2000, '', '2023-11-28', 1, '127.0.0.1', '2023-12-28 04:56:51', '2023-12-28 04:56:51', '0000-00-00 00:00:00');
INSERT INTO `tb_penjualan` (`id`, `invoice`, `pelanggan`, `total_harga`, `diskon`, `total_akhir`, `tunai`, `kembalian`, `catatan`, `tanggal`, `id_user`, `ip_address`, `created_at`, `updated_at`, `deleted_at`) VALUES (5, 'INV2312280003', 'QWE', 23000, 0, 23000, NULL, 0, '', '2023-12-28', 1, '127.0.0.1', '2023-12-28 04:57:50', '2023-12-28 04:57:50', '0000-00-00 00:00:00');
INSERT INTO `tb_penjualan` (`id`, `invoice`, `pelanggan`, `total_harga`, `diskon`, `total_akhir`, `tunai`, `kembalian`, `catatan`, `tanggal`, `id_user`, `ip_address`, `created_at`, `updated_at`, `deleted_at`) VALUES (6, 'INV2401010001', 'QWE', 55000, 0, 55000, 60000, 5000, '', '2024-01-06', 2, '127.0.0.1', '2024-01-01 02:55:44', '2024-01-06 11:03:13', '0000-00-00 00:00:00');
INSERT INTO `tb_penjualan` (`id`, `invoice`, `pelanggan`, `total_harga`, `diskon`, `total_akhir`, `tunai`, `kembalian`, `catatan`, `tanggal`, `id_user`, `ip_address`, `created_at`, `updated_at`, `deleted_at`) VALUES (7, 'INV2401010002', 'Hera 000', 55000, 0, 55000, 60000, 5000, '', '2024-01-05', 2, '127.0.0.1', '2024-01-01 02:57:03', '2024-01-06 11:02:59', '0000-00-00 00:00:00');
INSERT INTO `tb_penjualan` (`id`, `invoice`, `pelanggan`, `total_harga`, `diskon`, `total_akhir`, `tunai`, `kembalian`, `catatan`, `tanggal`, `id_user`, `ip_address`, `created_at`, `updated_at`, `deleted_at`) VALUES (8, 'INV2401010003', 'ERT', 40000, 0, 40000, 40000, 0, '', '2024-01-01', 1, '127.0.0.1', '2024-01-01 15:27:42', '2024-01-01 15:27:42', '0000-00-00 00:00:00');
INSERT INTO `tb_penjualan` (`id`, `invoice`, `pelanggan`, `total_harga`, `diskon`, `total_akhir`, `tunai`, `kembalian`, `catatan`, `tanggal`, `id_user`, `ip_address`, `created_at`, `updated_at`, `deleted_at`) VALUES (14, 'INV2401060001', 'KLMN', 60000, 0, 60000, 60000, 0, '', '2024-01-06', 2, '127.0.0.1', '2024-01-06 11:01:33', '2024-01-06 11:01:55', '0000-00-00 00:00:00');
COMMIT;

-- ----------------------------
-- Table structure for tb_roles
-- ----------------------------
DROP TABLE IF EXISTS `tb_roles`;
CREATE TABLE `tb_roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `keterangan` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- ----------------------------
-- Records of tb_roles
-- ----------------------------
BEGIN;
INSERT INTO `tb_roles` (`id`, `keterangan`) VALUES (1, 'Super Admin');
INSERT INTO `tb_roles` (`id`, `keterangan`) VALUES (2, 'Administrator');
INSERT INTO `tb_roles` (`id`, `keterangan`) VALUES (3, 'Kasir');
COMMIT;

-- ----------------------------
-- Table structure for tb_stok
-- ----------------------------
DROP TABLE IF EXISTS `tb_stok`;
CREATE TABLE `tb_stok` (
  `id_stok` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `tipe` enum('masuk','keluar') DEFAULT NULL,
  `id_item` int(11) unsigned NOT NULL,
  `id_pemasok` int(11) unsigned NOT NULL,
  `jumlah` int(11) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `id_user` int(11) unsigned NOT NULL,
  `ip_address` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL,
  PRIMARY KEY (`id_stok`),
  KEY `tb_stok_id_pemasok_foreign` (`id_pemasok`),
  KEY `tb_stok_id_user_foreign` (`id_user`),
  KEY `id_item_id_pemasok_id_user` (`id_item`,`id_pemasok`,`id_user`),
  CONSTRAINT `tb_stok_id_item_foreign` FOREIGN KEY (`id_item`) REFERENCES `tb_item` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `tb_stok_id_pemasok_foreign` FOREIGN KEY (`id_pemasok`) REFERENCES `tb_pemasok` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `tb_stok_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `tb_users` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- ----------------------------
-- Records of tb_stok
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for tb_tempat
-- ----------------------------
DROP TABLE IF EXISTS `tb_tempat`;
CREATE TABLE `tb_tempat` (
  `id` int(3) unsigned NOT NULL AUTO_INCREMENT,
  `tempat` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- ----------------------------
-- Records of tb_tempat
-- ----------------------------
BEGIN;
INSERT INTO `tb_tempat` (`id`, `tempat`, `keterangan`) VALUES (1, 'Meja 1', 'Keterangan Meja 1');
INSERT INTO `tb_tempat` (`id`, `tempat`, `keterangan`) VALUES (2, 'Meja 2', 'Keterangan Meja 2');
INSERT INTO `tb_tempat` (`id`, `tempat`, `keterangan`) VALUES (3, 'Meja 3', 'Keterangan Meja 3');
INSERT INTO `tb_tempat` (`id`, `tempat`, `keterangan`) VALUES (4, 'Meja 4', 'Keterangan Meja 4');
INSERT INTO `tb_tempat` (`id`, `tempat`, `keterangan`) VALUES (5, 'Meja 5', 'Keterangan Meja 5');
COMMIT;

-- ----------------------------
-- Table structure for tb_transaksi
-- ----------------------------
DROP TABLE IF EXISTS `tb_transaksi`;
CREATE TABLE `tb_transaksi` (
  `id_transaksi` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_penjualan` int(11) unsigned NOT NULL,
  `id_item` int(11) unsigned NOT NULL,
  `harga_item` int(11) unsigned NOT NULL,
  `jumlah_item` int(11) unsigned NOT NULL,
  `diskon_item` int(11) unsigned NOT NULL,
  `subtotal` int(11) unsigned NOT NULL,
  `ip_address` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL,
  PRIMARY KEY (`id_transaksi`),
  KEY `tb_transaksi_id_item_foreign` (`id_item`),
  KEY `id_penjualan_id_item` (`id_penjualan`,`id_item`),
  CONSTRAINT `tb_transaksi_id_item_foreign` FOREIGN KEY (`id_item`) REFERENCES `tb_item` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `tb_transaksi_id_penjualan_foreign` FOREIGN KEY (`id_penjualan`) REFERENCES `tb_penjualan` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- ----------------------------
-- Records of tb_transaksi
-- ----------------------------
BEGIN;
INSERT INTO `tb_transaksi` (`id_transaksi`, `id_penjualan`, `id_item`, `harga_item`, `jumlah_item`, `diskon_item`, `subtotal`, `ip_address`, `created_at`, `updated_at`, `deleted_at`) VALUES (1, 1, 1, 20000, 1, 0, 20000, '127.0.0.1', '2023-12-25 16:28:14', '2023-12-25 16:28:14', '0000-00-00 00:00:00');
INSERT INTO `tb_transaksi` (`id_transaksi`, `id_penjualan`, `id_item`, `harga_item`, `jumlah_item`, `diskon_item`, `subtotal`, `ip_address`, `created_at`, `updated_at`, `deleted_at`) VALUES (2, 1, 5, 5000, 1, 0, 5000, '127.0.0.1', '2023-12-25 16:28:14', '2023-12-25 16:28:14', '0000-00-00 00:00:00');
INSERT INTO `tb_transaksi` (`id_transaksi`, `id_penjualan`, `id_item`, `harga_item`, `jumlah_item`, `diskon_item`, `subtotal`, `ip_address`, `created_at`, `updated_at`, `deleted_at`) VALUES (3, 2, 1, 20000, 1, 0, 20000, '127.0.0.1', '2023-12-26 16:28:14', '2023-12-26 16:28:14', '0000-00-00 00:00:00');
INSERT INTO `tb_transaksi` (`id_transaksi`, `id_penjualan`, `id_item`, `harga_item`, `jumlah_item`, `diskon_item`, `subtotal`, `ip_address`, `created_at`, `updated_at`, `deleted_at`) VALUES (4, 2, 5, 5000, 1, 0, 5000, '127.0.0.1', '2023-12-26 16:28:14', '2023-12-26 16:28:14', '0000-00-00 00:00:00');
INSERT INTO `tb_transaksi` (`id_transaksi`, `id_penjualan`, `id_item`, `harga_item`, `jumlah_item`, `diskon_item`, `subtotal`, `ip_address`, `created_at`, `updated_at`, `deleted_at`) VALUES (5, 3, 3, 25000, 2, 0, 50000, '127.0.0.1', '2023-12-28 04:54:08', '2023-12-28 04:54:08', '0000-00-00 00:00:00');
INSERT INTO `tb_transaksi` (`id_transaksi`, `id_penjualan`, `id_item`, `harga_item`, `jumlah_item`, `diskon_item`, `subtotal`, `ip_address`, `created_at`, `updated_at`, `deleted_at`) VALUES (6, 3, 5, 5000, 1, 0, 5000, '127.0.0.1', '2023-12-28 04:54:08', '2023-12-28 04:54:08', '0000-00-00 00:00:00');
INSERT INTO `tb_transaksi` (`id_transaksi`, `id_penjualan`, `id_item`, `harga_item`, `jumlah_item`, `diskon_item`, `subtotal`, `ip_address`, `created_at`, `updated_at`, `deleted_at`) VALUES (7, 3, 8, 5000, 1, 0, 5000, '127.0.0.1', '2023-12-28 04:54:08', '2023-12-28 04:54:08', '0000-00-00 00:00:00');
INSERT INTO `tb_transaksi` (`id_transaksi`, `id_penjualan`, `id_item`, `harga_item`, `jumlah_item`, `diskon_item`, `subtotal`, `ip_address`, `created_at`, `updated_at`, `deleted_at`) VALUES (8, 4, 1, 20000, 1, 10, 18000, '127.0.0.1', '2023-12-28 04:56:51', '2023-12-28 04:56:51', '0000-00-00 00:00:00');
INSERT INTO `tb_transaksi` (`id_transaksi`, `id_penjualan`, `id_item`, `harga_item`, `jumlah_item`, `diskon_item`, `subtotal`, `ip_address`, `created_at`, `updated_at`, `deleted_at`) VALUES (9, 5, 1, 20000, 1, 10, 18000, '127.0.0.1', '2023-12-28 04:57:50', '2023-12-28 04:57:50', '0000-00-00 00:00:00');
INSERT INTO `tb_transaksi` (`id_transaksi`, `id_penjualan`, `id_item`, `harga_item`, `jumlah_item`, `diskon_item`, `subtotal`, `ip_address`, `created_at`, `updated_at`, `deleted_at`) VALUES (10, 5, 5, 5000, 1, 0, 5000, '127.0.0.1', '2023-12-28 04:57:50', '2023-12-28 04:57:50', '0000-00-00 00:00:00');
INSERT INTO `tb_transaksi` (`id_transaksi`, `id_penjualan`, `id_item`, `harga_item`, `jumlah_item`, `diskon_item`, `subtotal`, `ip_address`, `created_at`, `updated_at`, `deleted_at`) VALUES (13, 7, 1, 20000, 1, 0, 20000, '127.0.0.1', '2024-01-01 02:57:03', '2024-01-01 02:57:03', '0000-00-00 00:00:00');
INSERT INTO `tb_transaksi` (`id_transaksi`, `id_penjualan`, `id_item`, `harga_item`, `jumlah_item`, `diskon_item`, `subtotal`, `ip_address`, `created_at`, `updated_at`, `deleted_at`) VALUES (14, 7, 2, 20000, 1, 0, 20000, '127.0.0.1', '2024-01-01 02:57:03', '2024-01-01 02:57:03', '0000-00-00 00:00:00');
INSERT INTO `tb_transaksi` (`id_transaksi`, `id_penjualan`, `id_item`, `harga_item`, `jumlah_item`, `diskon_item`, `subtotal`, `ip_address`, `created_at`, `updated_at`, `deleted_at`) VALUES (15, 7, 5, 5000, 1, 0, 5000, '127.0.0.1', '2024-01-01 02:57:03', '2024-01-01 02:57:03', '0000-00-00 00:00:00');
INSERT INTO `tb_transaksi` (`id_transaksi`, `id_penjualan`, `id_item`, `harga_item`, `jumlah_item`, `diskon_item`, `subtotal`, `ip_address`, `created_at`, `updated_at`, `deleted_at`) VALUES (16, 7, 7, 10000, 1, 0, 10000, '127.0.0.1', '2024-01-01 02:57:03', '2024-01-01 02:57:03', '0000-00-00 00:00:00');
INSERT INTO `tb_transaksi` (`id_transaksi`, `id_penjualan`, `id_item`, `harga_item`, `jumlah_item`, `diskon_item`, `subtotal`, `ip_address`, `created_at`, `updated_at`, `deleted_at`) VALUES (17, 8, 1, 20000, 2, 0, 40000, '127.0.0.1', '2024-01-01 15:27:42', '2024-01-01 15:27:42', '0000-00-00 00:00:00');
INSERT INTO `tb_transaksi` (`id_transaksi`, `id_penjualan`, `id_item`, `harga_item`, `jumlah_item`, `diskon_item`, `subtotal`, `ip_address`, `created_at`, `updated_at`, `deleted_at`) VALUES (38, 6, 1, 20000, 1, 0, 20000, '127.0.0.1', '2024-01-01 18:20:58', '2024-01-01 18:20:58', '0000-00-00 00:00:00');
INSERT INTO `tb_transaksi` (`id_transaksi`, `id_penjualan`, `id_item`, `harga_item`, `jumlah_item`, `diskon_item`, `subtotal`, `ip_address`, `created_at`, `updated_at`, `deleted_at`) VALUES (39, 6, 8, 5000, 1, 0, 5000, '127.0.0.1', '2024-01-01 18:20:58', '2024-01-01 18:20:58', '0000-00-00 00:00:00');
INSERT INTO `tb_transaksi` (`id_transaksi`, `id_penjualan`, `id_item`, `harga_item`, `jumlah_item`, `diskon_item`, `subtotal`, `ip_address`, `created_at`, `updated_at`, `deleted_at`) VALUES (40, 6, 4, 25000, 1, 0, 25000, '127.0.0.1', '2024-01-01 18:20:58', '2024-01-01 18:20:58', '0000-00-00 00:00:00');
INSERT INTO `tb_transaksi` (`id_transaksi`, `id_penjualan`, `id_item`, `harga_item`, `jumlah_item`, `diskon_item`, `subtotal`, `ip_address`, `created_at`, `updated_at`, `deleted_at`) VALUES (41, 6, 5, 5000, 1, 0, 5000, '127.0.0.1', '2024-01-01 18:20:58', '2024-01-01 18:20:58', '0000-00-00 00:00:00');
INSERT INTO `tb_transaksi` (`id_transaksi`, `id_penjualan`, `id_item`, `harga_item`, `jumlah_item`, `diskon_item`, `subtotal`, `ip_address`, `created_at`, `updated_at`, `deleted_at`) VALUES (42, 14, 1, 20000, 2, 0, 40000, '127.0.0.1', '2024-01-06 11:01:33', '2024-01-06 11:01:33', '0000-00-00 00:00:00');
INSERT INTO `tb_transaksi` (`id_transaksi`, `id_penjualan`, `id_item`, `harga_item`, `jumlah_item`, `diskon_item`, `subtotal`, `ip_address`, `created_at`, `updated_at`, `deleted_at`) VALUES (43, 14, 7, 10000, 2, 0, 20000, '127.0.0.1', '2024-01-06 11:01:33', '2024-01-06 11:01:33', '0000-00-00 00:00:00');
COMMIT;

-- ----------------------------
-- Table structure for tb_unit
-- ----------------------------
DROP TABLE IF EXISTS `tb_unit`;
CREATE TABLE `tb_unit` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nama_unit` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- ----------------------------
-- Records of tb_unit
-- ----------------------------
BEGIN;
INSERT INTO `tb_unit` (`id`, `nama_unit`, `created_at`, `updated_at`, `deleted_at`) VALUES (1, 'Porsi', '2023-09-25 02:08:03', '2023-09-25 02:08:03', '0000-00-00 00:00:00');
INSERT INTO `tb_unit` (`id`, `nama_unit`, `created_at`, `updated_at`, `deleted_at`) VALUES (2, 'CUP', '2023-09-25 02:08:03', '2023-09-25 02:08:03', '0000-00-00 00:00:00');
INSERT INTO `tb_unit` (`id`, `nama_unit`, `created_at`, `updated_at`, `deleted_at`) VALUES (3, 'Item', '2023-09-25 02:08:03', '2023-09-25 02:08:03', '0000-00-00 00:00:00');
COMMIT;

-- ----------------------------
-- Table structure for tb_users
-- ----------------------------
DROP TABLE IF EXISTS `tb_users`;
CREATE TABLE `tb_users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
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
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_username` (`email`,`username`),
  KEY `id_role` (`id_role`),
  CONSTRAINT `tb_users_id_role_foreign` FOREIGN KEY (`id_role`) REFERENCES `tb_roles` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- ----------------------------
-- Records of tb_users
-- ----------------------------
BEGIN;
INSERT INTO `tb_users` (`id`, `email`, `username`, `password`, `nama`, `alamat`, `id_role`, `avatar`, `status`, `token`, `ip_address`, `created_at`, `updated_at`, `deleted_at`) VALUES (1, 'sejatordev@gmail.com', 'superadmin', '$2y$10$FsARf4VpWNb33GUXRVr3euRsJLe9mh6y/OnGlFKfbm.zVo.l6xxJK', 'Super Admin', 'Bandung', 1, 'avatar.jpg', 1, NULL, '0.0.0.0', '2023-09-25 02:08:03', '2023-09-25 02:08:03', NULL);
INSERT INTO `tb_users` (`id`, `email`, `username`, `password`, `nama`, `alamat`, `id_role`, `avatar`, `status`, `token`, `ip_address`, `created_at`, `updated_at`, `deleted_at`) VALUES (2, 'admin@gmail.com', 'admin', '$2y$10$WstLX6xRbaMNb7bCwCA5YujxpFDlmRF4Jlxjz7iaPec/OgP.Ja6iG', 'Administrator', 'Bandung', 2, 'avatar.jpg', 1, NULL, '0.0.0.0', '2023-09-25 02:08:03', '2023-09-25 02:08:03', NULL);
INSERT INTO `tb_users` (`id`, `email`, `username`, `password`, `nama`, `alamat`, `id_role`, `avatar`, `status`, `token`, `ip_address`, `created_at`, `updated_at`, `deleted_at`) VALUES (3, 'kasir@gmail.com', 'kasir', '$2y$10$3VETAEbrtsZYGtkt8dNGlerMPAk3kFfrIKBnF6uYQ4Vzl5GEQT2o2', 'Kasir', 'Bandung', 3, 'avatar.jpg', 1, NULL, '0.0.0.0', '2023-09-25 02:08:03', '2023-09-25 02:08:03', NULL);
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
