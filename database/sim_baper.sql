-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2023 at 10:55 AM
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
  `nama_barang` varchar(80) NOT NULL,
  `satuan` varchar(50) NOT NULL,
  `kode_sub_kelompok` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `no_bon` varchar(5) NOT NULL,
  `kode_barang` varchar(15) NOT NULL,
  `harga` int(11) NOT NULL,
  `kuantitas` int(11) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_stock`
--

CREATE TABLE `t_stock` (
  `id` int(11) NOT NULL,
  `kode_barang` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `quantity_opname` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_stock`
--
ALTER TABLE `t_stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
