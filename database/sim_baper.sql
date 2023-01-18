-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2023 at 07:24 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_barang`
--

INSERT INTO `m_barang` (`kode_barang`, `kode_sub_kelompok`, `nama_barang`, `satuan`, `created_by`, `created_at`, `updated_at`) VALUES
('1010301001000005', '1010301001', 'Pena Standards', 'Buah', 1, '2023-01-17 05:26:34', '2023-01-16 22:26:34');

-- --------------------------------------------------------

--
-- Table structure for table `t_keluar`
--

CREATE TABLE `t_keluar` (
  `id` int(11) NOT NULL,
  `kode_barang` int(11) NOT NULL,
  `kuantitas` int(11) NOT NULL,
  `tgl_keluar` date NOT NULL,
  `pemakai` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_masuk`
--

INSERT INTO `t_masuk` (`id`, `no_bon`, `kode_barang`, `harga`, `kuantitas`, `tgl_masuk`, `created_by`, `created_at`, `updated_at`) VALUES
(18, '0032K', '1010301001000005', 1000, 1000, '2023-01-17', 1, '2023-01-17 01:29:36', '2023-01-17 01:29:36'),
(19, '0032K', '1010301001000005', 1000, 1000, '0111-11-11', 1, '2023-01-17 01:29:53', '2023-01-17 01:29:53'),
(20, '0032K', '1010301001000005', 1000, 1000, '0111-11-11', 1, '2023-01-17 01:30:49', '2023-01-17 01:30:49'),
(21, '0032K', '1010301001000005', 1000, 3000, '0111-11-11', 1, '2023-01-17 01:34:26', '2023-01-17 01:34:26');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_stock`
--

INSERT INTO `t_stock` (`kode_barang`, `quantity`, `quantity_opname`, `created_by`, `created_at`, `updated_at`) VALUES
('1010301001000005', 5000, 5000, 1, '2023-01-17 01:29:36', '2023-01-17 01:34:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `m_barang`
--
ALTER TABLE `m_barang`
  ADD PRIMARY KEY (`kode_barang`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_keluar`
--
ALTER TABLE `t_keluar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_masuk`
--
ALTER TABLE `t_masuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
