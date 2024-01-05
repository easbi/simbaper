-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2024 at 09:21 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sim_baper`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `m_barang`
--

CREATE TABLE `m_barang` (
  `kode_barang` varchar(16) NOT NULL,
  `kode_sub_kelompok` varchar(10) NOT NULL,
  `nama_barang` varchar(80) NOT NULL,
  `satuan` varchar(50) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `m_barang`
--

INSERT INTO `m_barang` (`kode_barang`, `kode_sub_kelompok`, `nama_barang`, `satuan`, `created_by`, `created_at`, `updated_at`) VALUES
('1010301001000005', '1010301001', 'Barang Coba2', 'Coba2', 1, '2024-01-05 00:52:29', '2024-01-05 00:52:29'),
('1010301001000027', '1010301001', 'Pensil Pentel', 'Buah', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1010301001000031', '1010301001', 'Pena My Gel', 'Buah', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1010301001000047', '1010301001', 'Isi pensil mekanik', 'buah', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1010301001000087', '1010301001', 'Drawing Pen (Kab/Kot)', 'Buah', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1010301001000088', '1010301001', 'Pena Mygel', 'Buah', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1010301003000007', '1010301003', 'Binder Clip no. 260', 'buah', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1010301003000017', '1010301003', 'Trigonal Clip Joyko No. 3', 'Kotak', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1010301003000028', '1010301003', 'Binder Clip No. 200', 'Kotak', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1010301003000029', '1010301003', 'Binder Clip No. 155', 'Kotak', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1010301003000033', '1010301003', 'Trigonal Clip No. 5', 'Kotak', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1010301004000002', '1010301004', 'Penghapus', 'Buah', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1010301004000005', '1010301004', 'Penghapus Faber Castele', 'Buah', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1010301006000001', '1010301006', 'Map Ordner Gobi', 'Buah', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1010301006000007', '1010301006', 'Map Lucky Hitam', 'Buah', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1010301006000010', '1010301006', 'Map Plastik', 'Buah', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1010301006000027', '1010301006', 'Map Tali', 'buah', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1010301006000039', '1010301006', 'Map Tulang Cetak', 'Buah', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1010301006000040', '1010301006', 'Stop Map Cetak', 'Buah', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1010301006000049', '1010301006', 'Map Jepit', 'Buah', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1010301012000001', '1010301012', 'Hekter No. 10 doli', 'Buah', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1010301012000002', '1010301012', 'pembuka hekter', 'buah', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1010301013000001', '1010301013', 'Isi Hekter', 'Buah', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1010302001000007', '1010302001', 'Stick Note', 'Bungkus', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1010302001000039', '1010302001', 'Kertas HVS 80 Gram A4', 'Rim', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1010302001000040', '1010302001', 'kertas A3', 'rim', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1010302001000041', '1010302001', 'Kertas A4', 'rim', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1010302004000014', '1010302004', 'Amplop Panjang Putih Cetak', 'Buah', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1010302004000015', '1010302004', 'Amplop Folio', 'Buah', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1010302004000016', '1010302004', 'Amplop A3', 'Buah', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1010302004000017', '1010302004', 'Amplop Dinas', 'Pack', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1010302004000018', '1010302004', 'Amplop BPS Padang Panjang', 'Kotak', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1010304002000001', '1010304002', 'Tempat CD DVD', 'Buah', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1010304004000030', '1010304004', 'Toner HP 85A', 'buah', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1010304004000035', '1010304004', 'toner hp officerjet 250 mobile', 'buah', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1010304004000044', '1010304004', 'Toner HP Officejet 250 Mobile Warna Hitam', 'Buah', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1010304004000052', '1010304004', 'Toner HP CF 289 A', 'Buah', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1010304004000055', '1010304004', 'Toner HP 107A Black', 'Buah', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1010304004000063', '1010304004', 'Tinta Epson 008 Black', 'Unit', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1010304004000064', '1010304004', 'Tinta Epson 008 Color', 'Unit', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1010304004000066', '1010304004', 'Toner HP CF 289A (89A)', 'buah', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1010304999000001', '1010304999', 'CD-R', 'Buah', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1010305002000016', '1010305002', 'Tissue Facial 600 Livi', 'Packs', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1010305002000018', '1010305002', 'Tissue Multifold', 'Pcs', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1010305008000024', '1010305008', 'Pembersih Keramik (CIF)', 'Buah', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1010305008000040', '1010305008', 'Pembersih Lantai Motto', 'Botol', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1010305008000041', '1010305008', 'Pembersih Kaca Motto', 'Botol', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1010305012000002', '1010305012', 'Pengharum Ruangan Stella', 'Buah', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1010306010000004', '1010306010', 'Baterai Alkaline A3', 'Pasang', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1010399999000736', '1010399999', 'Publikasi Padang Panjang Dalam Angka 2023', 'Eksemplar', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1010399999000746', '1010399999', 'Proyeksi Penduduk Kabupaten/Kota Provinsi Sumatera Barat 2020-2035 Hasil Sensus', 'Eksemplar', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1010399999000747', '1010399999', 'Provinsi Sumatera Barat Dalam Angka 2023', 'Buku', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1010399999000748', '1010399999', 'Informasi Ketenagakerjaan Kota Padang Panjang 2022', 'buah', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1010399999000749', '1010399999', 'Publikasi Statistik Hortikultura Kota Padang Panjang Tahun 2022', 'buah', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1010399999000750', '1010399999', 'Publikasi Statistik Daerah Kota Padang Panjang Tahun 2023', 'buah', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1010399999000751', '1010399999', 'leaflet', 'lembar', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1010399999000752', '1010399999', 'cetak infografis', 'buah', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1010399999000753', '1010399999', 'Cetak Booklet ST', 'buah', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1010399999000754', '1010399999', 'publikasi indikator kesejahteraan rakyat kota padang panjang 2022/2023', 'buah', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1010399999000755', '1010399999', 'Publikasi Analisis Hasil Survei Kebutuhan Data BPS Kota Padang Panjang 2023', 'buah', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1010399999000756', '1010399999', 'Publikasi Statistik Pengeluaran Konsumsi Penduduk Kota Padang Panjang 2023', 'buah', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1010399999000757', '1010399999', 'publikasi SP longform', 'buah', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1010399999000758', '1010399999', 'booklet SP longform', 'buah', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1010399999000760', '1010399999', 'Buku Pedoman Pencacahan SKP', 'Eksemplar', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1010399999000761', '1010399999', 'Buku Pedoman Pemeriksaan SKP', 'Eksemplar', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_keluar`
--

CREATE TABLE `t_keluar` (
  `id` int(11) NOT NULL,
  `kode_barang` varchar(16) NOT NULL,
  `kuantitas` int(11) NOT NULL,
  `tgl_keluar` date NOT NULL,
  `pemakai` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `t_keluar`
--

INSERT INTO `t_keluar` (`id`, `kode_barang`, `kuantitas`, `tgl_keluar`, `pemakai`, `created_at`, `updated_at`) VALUES
(1, '1010301001000005', 1000, '2024-01-05', 1, '2024-01-05 01:12:48', '2024-01-05 01:12:48'),
(2, '1010301001000005', 1, '2024-01-05', 1, '2024-01-05 01:13:19', '2024-01-05 01:13:19'),
(3, '1010301001000005', 1, '2024-01-05', 1, '2024-01-05 01:13:44', '2024-01-05 01:13:44');

-- --------------------------------------------------------

--
-- Table structure for table `t_masuk`
--

CREATE TABLE `t_masuk` (
  `id` int(11) NOT NULL,
  `no_bon` varchar(10) NOT NULL,
  `kode_barang` varchar(16) NOT NULL,
  `harga` int(11) NOT NULL,
  `kuantitas` int(11) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `t_masuk`
--

INSERT INTO `t_masuk` (`id`, `no_bon`, `kode_barang`, `harga`, `kuantitas`, `tgl_masuk`, `created_by`, `created_at`, `updated_at`) VALUES
(22, '0032K', '1010301001000005', 1000, 1, '2024-01-05', 1, '2024-01-05 01:11:21', '2024-01-05 01:11:21');

-- --------------------------------------------------------

--
-- Table structure for table `t_stock`
--

CREATE TABLE `t_stock` (
  `kode_barang` varchar(16) NOT NULL,
  `quantity` int(11) NOT NULL,
  `quantity_opname` int(11) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `t_stock`
--

INSERT INTO `t_stock` (`kode_barang`, `quantity`, `quantity_opname`, `created_by`, `created_at`, `updated_at`) VALUES
('1010301001000005', 1010300000, 1010300000, 1, '2022-11-19 09:21:34', '2024-01-05 01:13:44'),
('1010301001000027', 54, 54, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1010301001000031', 2, 2, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1010301001000047', 2, 2, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1010301001000087', 2, 2, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1010301001000088', 21, 21, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1010301003000007', 8, 8, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1010301003000017', 105, 105, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1010301003000028', 8, 8, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1010301003000029', 5, 5, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1010301003000033', 7, 7, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1010301004000002', 60, 60, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1010301004000005', 7, 7, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1010301006000001', 10, 10, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1010301006000007', 10, 10, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1010301006000010', 130, 130, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1010301006000027', 24, 24, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1010301006000039', 68, 68, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1010301006000040', 500, 500, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1010301006000049', 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1010301012000001', 3, 3, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1010301012000002', 2, 2, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1010301013000001', 33, 33, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1010302001000007', 18, 18, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1010302001000039', 8, 8, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1010302001000040', 2, 2, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1010302001000041', 25, 25, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1010302004000014', 10, 10, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1010302004000015', 118, 118, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1010302004000016', 40, 40, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1010302004000017', 5, 5, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1010302004000018', 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1010304002000001', 7, 7, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1010304004000030', 2, 2, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1010304004000035', 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1010304004000044', 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1010304004000052', 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1010304004000055', 4, 4, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1010304004000063', 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1010304004000064', 3, 3, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1010304004000066', 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1010304999000001', 7, 7, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1010305002000016', 11, 11, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1010305002000018', 4, 4, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1010305008000024', 2, 2, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1010305008000040', 3, 3, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1010305008000041', 9, 9, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1010305012000002', 4, 4, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1010306010000004', 3, 3, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1010399999000736', 4, 4, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1010399999000746', 3, 3, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1010399999000747', 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1010399999000748', 6, 6, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1010399999000749', 6, 6, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1010399999000750', 6, 6, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1010399999000751', 100, 100, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1010399999000752', 3, 3, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1010399999000753', 10, 10, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1010399999000754', 6, 6, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1010399999000755', 6, 6, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1010399999000756', 6, 6, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1010399999000757', 6, 6, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1010399999000758', 2, 2, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1010399999000760', 4, 4, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('1010399999000761', 3, 3, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('kode_barang', 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_barang`
--
ALTER TABLE `m_barang`
  ADD PRIMARY KEY (`kode_barang`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `t_keluar`
--
ALTER TABLE `t_keluar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_masuk`
--
ALTER TABLE `t_masuk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_stock`
--
ALTER TABLE `t_stock`
  ADD PRIMARY KEY (`kode_barang`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_keluar`
--
ALTER TABLE `t_keluar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `t_masuk`
--
ALTER TABLE `t_masuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
