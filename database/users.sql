-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2024 at 09:26 AM
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
-- Database: `sim_khi_papa`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fullname` varchar(70) NOT NULL,
  `username` varchar(255) NOT NULL,
  `nip` varchar(18) NOT NULL,
  `organisasi` varchar(70) NOT NULL,
  `unit_kerja` varchar(60) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `username`, `nip`, `organisasi`, `unit_kerja`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'Easbi Ikhsan', 'easbi', '199602182019011002', 'Seksi Integrasi Pengolahan dan Diseminasi Statistik', 'BPS Kota Padang Panjang', 'easbi@bps.go.id', NULL, '$2y$10$E6xLwKsKY9wdhOm/2LF/3.U/G3V0sNx9Rh7uNYlznbvEAu2GTt0b2', NULL, NULL, NULL, NULL, NULL, '2021-08-08 22:55:07', '2021-09-14 04:06:51'),
(2, 'Joni Suryadi SE, MM', 'joni.suryadi', '196701201993031001', 'Kepala BPS Kota Padang Panjang', 'BPS Kota Padang Panjang', 'joni.suryadi@bps.go.id', NULL, '$2y$10$uT1r5NknRJWVt69R90fSA.OLntUcF28z0a.H5XfyAeDapg/PGKADO', NULL, NULL, NULL, NULL, NULL, '2021-08-12 20:37:19', '2021-11-10 07:55:20'),
(3, 'Nove Ira S.Psi', 'nove', '197611092011012005', 'Subbagian Tata Usaha', 'BPS Kota Padang Panjang', 'nove@bps.go.id', NULL, '$2y$10$Ssd3K6M7crPdAQk.IpOc.uEpIMEO4uo7bqgfAh3xqbPPYxB0u4NP2', NULL, NULL, NULL, NULL, NULL, '2021-08-19 06:55:10', '2021-08-19 06:55:10'),
(4, 'Mega Novita', 'mega.novita', '198508032005022001', 'Subbagian Tata Usaha', 'BPS Kota Padang Panjang', 'mega.novita@bps.go.id', NULL, '$2y$10$W4NlpZXCJDcQba/dr8XAp.qcx0g3MtM2lDjjRflN.5F4eDTYwFsFy', NULL, NULL, NULL, NULL, NULL, '2021-08-19 07:39:25', '2021-08-19 07:39:25'),
(5, 'Dwithia Handriani SST', 'dhandriani', '199007172014102001', 'Seksi Statistik Sosial', 'BPS Kota Padang Panjang', 'dhandriani@bps.go.id', NULL, '$2y$10$EgLeAwDmnv363uCY20/EWOhcPrRwzsxrdd/g2sEsmvbns4CDlBQnC', NULL, NULL, NULL, NULL, NULL, '2021-08-19 07:40:29', '2021-08-19 07:40:29'),
(6, 'Lina Ferdianty Lubis SST', 'lina_ferdianty', '198002162002122005', 'Seksi Statistik Produksi', 'BPS Kota Padang Panjang', 'lina_ferdianty@bps.go.id', NULL, '$2y$10$LsucNVwPf9PY7MeKjwshhuFK9H28wl6UAbvJzOS6I0978W2lzs0tW', NULL, NULL, 'kWTeiRJPSy7K6tP8ae0I0FIYJaKHYW971vJ4S2Dz5Q83bQhUnsvcPvEyRdhO', NULL, NULL, '2021-08-19 07:41:20', '2021-08-19 07:41:20'),
(7, 'Chesilia Amora Jofipasi S.Stat.', 'chesilia.jofipasi', '199507222019032001', 'Seksi Statistik Produksi', 'BPS Kota Padang Panjang', 'chesilia.jofipasi@bps.go.id', NULL, '$2y$10$B5zikLfBdgMRPCPlctP54eAhgwhDd04dDFHHZemanKIOPYPDHu7/C', NULL, NULL, NULL, NULL, NULL, '2021-08-19 07:42:35', '2021-08-19 07:43:24'),
(8, 'Rindy Primadini SST', 'rindyprimadini', '199105192013112001', 'Seksi Statistik Distribusi', 'BPS Kota Padang Panjang', 'rindyprimadini@bps.go.id', NULL, '$2y$10$ZJO8szZ/HPwIccSW7VJZjemF3HOgTdzIPcCt6WA52BCKpWNMylsAy', NULL, NULL, NULL, NULL, NULL, '2021-08-19 07:45:44', '2021-08-19 07:45:44'),
(9, 'Atika Surya Ananda SST', 'atika.ananda', '199104052014122001', 'Seksi Statistik Distribusi', 'BPS Kota Padang Panjang', 'atika.ananda@bps.go.id', NULL, '$2y$10$U8VDWp/3of0n8U8J1j7bEO.o1zKqZaw.f7YfXyI0YPnH2MFr0Eb0C', NULL, NULL, NULL, NULL, NULL, '2021-08-19 07:46:33', '2021-08-19 07:46:33'),
(10, 'Nurhayati S.E', 'nurhay', '197111211994032002', 'Seksi Neraca Wilayah dan Analisis Statistik', 'BPS Kota Padang Panjang', 'nurhay@bps.go.id', NULL, '$2y$10$uSwowz2mJvrw6g3xdFNtb.b6sy/FRKWBvwPA1Eg8w1iJd4qaZVxeq', NULL, NULL, 'TodI6QfQaL4oGxZ8v4HGhRtUbbkOMN91BF0NTjBQHsc2sJmr5gnX8rR3le7T', NULL, NULL, '2021-08-19 07:47:28', '2021-08-19 07:47:28'),
(11, 'Masruqi Arrazy SST.,M.M.', 'mas.ruqi', '198701242009021003', 'Seksi Neraca Wilayah dan Analisis Statistik', 'BPS Kota Padang Panjang', 'mas.ruqi@bps.go.id', NULL, '$2y$10$aZSwjo6bsRnfYlGSpg7rMOBGib/uz1SCT1llolYC/UvPuQt4Vo6dG', NULL, NULL, 'QpE0vqdcAIKOM7w8Xn0STMx5OLw1BMCnZ5lN4xBXYX4nD4AP7Aqq37ZsEvRL', NULL, NULL, '2021-08-19 07:48:16', '2021-08-19 07:48:16'),
(12, 'Utari Azalika Rahmi SST', 'utari.ar', '199111052014102001', 'Seksi Integrasi Pengolahan dan Diseminasi Statistik', 'BPS Kota Padang Panjang', 'utari.ar@bps.go.id', NULL, '$2y$10$Yb9TTM3Po7zAWyRp4QNTpOsmV82BenA54IpUe66L74fH4zTlbmche', NULL, NULL, NULL, NULL, NULL, '2021-08-19 07:49:06', '2021-08-19 07:49:06'),
(13, 'Fitri Ananda S.Si', 'fitri.ananda', '198612152009022005', 'Fungsi Produksi BPS Kota Padang Panjang', 'BPS Kota Padang Panjang', 'fitri.ananda@bps.go.id', NULL, '$2y$10$kHUNWO/4hXkNaSw25BLId.ttmOlMvAqC4w7UtHvZcfnA3ekbKazby', NULL, NULL, NULL, NULL, NULL, '2021-08-19 07:49:56', '2023-01-11 02:20:39'),
(14, 'Ester Harefa', 'ester', '199906092021121002', 'BPS Kota Padang Panjang', 'Internship', 'ester@bps.go.id', NULL, '$2y$10$KdVEL8EPciToYax3svx9PeQpiJsy9.ry6Qzy5HWLIYWa81yubaSqy', NULL, NULL, '3tqVvE0nlZgtIzfXFGW65N3o2Ts50ALInGnKEC81Ir8Rt4cd08PjkpysITCs', NULL, NULL, '2021-11-08 09:04:47', '2021-11-08 09:04:47'),
(15, 'Ririn Savitri', 'ririn_savitri', '999999999999999991', 'Internship', 'BPS Kota Padang Panjang', 'ririnsavitri18@gmail.com', NULL, '$2y$10$LGTTnn0Uf4HPPtZWhn2qfOjgznlReO8NWnIErG6806YUDT2eyNhyy', NULL, NULL, NULL, NULL, NULL, '2022-06-30 05:24:09', '2022-06-30 05:24:09'),
(16, 'Nabila Khairunnisa', 'nabila_khairunnisa', '999999999999999992', 'BPS Kota Padang Panjang', 'Internship', 'nabilakhairunnisa1410@gmail.com', NULL, '$2y$10$knlDXBdolWUwqx73BkyRlOA0nVU6WRcbZ3vreQiLwB9W6V6C.mZS6', NULL, NULL, NULL, NULL, NULL, '2022-06-30 05:25:48', '2022-06-30 05:25:48'),
(17, 'Dela Puspita', 'dela_puspita', '9999999999999993', 'BPS Kota Padang Panjang', 'Internship', 'puspitadela848@gmail.com', NULL, '$2y$10$JXiaLq4i3KeT2QbFw1D8cupnwFHOLHQmEXevloiGA./eLAa87Ep4y', NULL, NULL, 'NPUu05c5CI5U3KQ9EQD0vKuZRcvTYqw1lenNWvYHuPtGSICATH2aLGtbuwTG', NULL, NULL, '2022-06-30 05:26:50', '2022-06-30 05:26:50'),
(18, 'Anugrah Fitri Adilla', 'dila_anugrahfitria', '9999999999999994', 'BPS Kota Padang Panjang', 'Internship', 'anugrahfitria@gmail.com', NULL, '$2y$10$D1h02ezpTYuNN7as110lFu/40t.6lDBRmCMhedpFfEwPawsjNsSJC', NULL, NULL, NULL, NULL, NULL, '2022-06-30 05:28:55', '2022-06-30 05:28:55'),
(20, 'Zaky Imadudin Salam', 'zakyimad', '199910112023021001', 'BPS Kota Padang Panjang', 'BPS Kota Padang Panjang', 'zakyimad@bps.go.id', NULL, '$2y$10$Psy46ThFUEFnPHOsZP39Bu.5s5IYDGugO5Px/t2fBeyRbuLBFXXTO', NULL, NULL, 'A3ozPyzzRPUVHpG8GOG09P0EwwDoXZa4DrRN1iOT1WOQeLomFJEWG9h4sWbR', NULL, NULL, '2023-03-07 06:42:51', '2023-03-07 06:50:23');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
