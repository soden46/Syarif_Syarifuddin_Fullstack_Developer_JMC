-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 10, 2023 at 07:00 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jmc`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--
-- Creation: Sep 08, 2023 at 08:33 AM
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONSHIPS FOR TABLE `failed_jobs`:
--

-- --------------------------------------------------------

--
-- Table structure for table `kabupaten`
--
-- Creation: Sep 08, 2023 at 08:33 AM
-- Last update: Sep 10, 2023 at 04:49 AM
--

CREATE TABLE `kabupaten` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Nama_Kabupaten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Provinsi` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONSHIPS FOR TABLE `kabupaten`:
--   `Provinsi`
--       `provinsi` -> `id`
--

--
-- Dumping data for table `kabupaten`
--

INSERT INTO `kabupaten` (`id`, `Nama_Kabupaten`, `Provinsi`, `created_at`) VALUES
(1, 'Lampung Tengah', 1, '2023-09-10 04:41:12'),
(2, 'Sleman', 2, '2023-09-09 17:00:00'),
(3, 'Kepulauan Seribu', 4, '2023-09-10 04:38:53'),
(4, 'Jakarta Barat', 4, '2023-09-10 04:41:55'),
(5, 'Jakarta Pusat', 4, '2023-09-10 04:38:53'),
(6, 'Jakarta Selatan', 4, '2023-09-10 04:38:53'),
(7, 'Jakarta Timur', 4, '2023-09-10 04:38:53'),
(8, 'Jakarta Utara', 4, '2023-09-10 04:38:53'),
(9, 'Banjar Negara', 3, '2023-09-10 04:43:32'),
(10, 'Banyumas', 3, '2023-09-10 04:43:32'),
(11, 'Batang', 3, '2023-09-10 04:43:32'),
(12, 'Blora', 3, '2023-09-10 04:43:32'),
(13, 'Boyolali', 3, '2023-09-10 04:43:32'),
(14, 'Brebes', 3, '2023-09-10 04:43:32'),
(15, 'Cilacap', 3, '2023-09-10 04:43:32'),
(16, 'Bantul', 2, '2023-09-10 04:43:32'),
(17, 'Gunngkidul', 2, '2023-09-10 04:43:32'),
(18, 'Kulon Progo', 2, '2023-09-10 04:43:32'),
(19, 'Kota Yogyakarta', 2, '2023-09-10 04:43:32'),
(20, 'Lampung Barat', 1, '2023-09-10 04:43:32'),
(21, 'Lampung Selatan', 1, '2023-09-10 04:43:32'),
(22, 'Lampung Timur', 1, '2023-09-10 04:43:32'),
(23, 'Lampung Utara', 1, '2023-09-10 04:43:32'),
(24, 'Mesuji', 1, '2023-09-10 04:43:32');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--
-- Creation: Sep 08, 2023 at 08:33 AM
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONSHIPS FOR TABLE `migrations`:
--

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_09_08_081237_penduduk', 1),
(6, '2023_09_08_082412_provinsi', 1),
(7, '2023_09_08_082418_kabupaten', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--
-- Creation: Sep 08, 2023 at 08:33 AM
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONSHIPS FOR TABLE `password_reset_tokens`:
--

-- --------------------------------------------------------

--
-- Table structure for table `penduduk`
--
-- Creation: Sep 08, 2023 at 04:57 PM
-- Last update: Sep 10, 2023 at 04:58 AM
--

CREATE TABLE `penduduk` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NIK` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Jenis_kelamin` enum('Pria','Wanita') COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_lahir` date NOT NULL,
  `Alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Provinsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Kabupaten` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONSHIPS FOR TABLE `penduduk`:
--

--
-- Dumping data for table `penduduk`
--

INSERT INTO `penduduk` (`id`, `Nama`, `NIK`, `Jenis_kelamin`, `tgl_lahir`, `Alamat`, `Provinsi`, `Kabupaten`, `created_at`, `updated_at`) VALUES
(12, 'udin', '555555', 'Pria', '2023-09-18', 'Sianduadi, Mlati', 'Yogyakarta', 'Sleman', '2023-09-08 23:57:37', '2023-09-08 23:57:37'),
(13, 'syarif syarifuddin', '12121212121212', 'Pria', '2023-09-15', 'Kota Gajah', 'Lampung', 'Lampung Tengah', '2023-09-09 05:19:46', '2023-09-09 21:58:52');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--
-- Creation: Sep 08, 2023 at 08:33 AM
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONSHIPS FOR TABLE `personal_access_tokens`:
--

-- --------------------------------------------------------

--
-- Table structure for table `provinsi`
--
-- Creation: Sep 08, 2023 at 03:08 PM
-- Last update: Sep 10, 2023 at 04:50 AM
--

CREATE TABLE `provinsi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Nama_Provinsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONSHIPS FOR TABLE `provinsi`:
--

--
-- Dumping data for table `provinsi`
--

INSERT INTO `provinsi` (`id`, `Nama_Provinsi`, `created_at`) VALUES
(1, 'Lampung', '2023-09-08 15:20:08'),
(2, 'Yogyakarta', '2023-09-08 15:20:21'),
(3, 'Jawa Tengah', '2023-09-10 04:50:17'),
(4, 'Jakarta', '2023-09-09 17:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--
-- Creation: Sep 08, 2023 at 08:33 AM
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONSHIPS FOR TABLE `users`:
--

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
-- Indexes for table `kabupaten`
--
ALTER TABLE `kabupaten`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kabupaten_provinsi_foreign` (`Provinsi`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `penduduk`
--
ALTER TABLE `penduduk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `provinsi`
--
ALTER TABLE `provinsi`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `kabupaten`
--
ALTER TABLE `kabupaten`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `penduduk`
--
ALTER TABLE `penduduk`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `provinsi`
--
ALTER TABLE `provinsi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kabupaten`
--
ALTER TABLE `kabupaten`
  ADD CONSTRAINT `kabupaten_provinsi_foreign` FOREIGN KEY (`Provinsi`) REFERENCES `provinsi` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
