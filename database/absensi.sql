-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2024 at 05:02 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `absensi`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensis`
--

CREATE TABLE `absensis` (
  `AbsensiID` bigint(20) UNSIGNED NOT NULL,
  `UserID` bigint(20) UNSIGNED NOT NULL,
  `Hari` varchar(255) NOT NULL,
  `Tanggal` date NOT NULL,
  `WaktuMasuk` time DEFAULT NULL,
  `WaktuKeluar` time DEFAULT NULL,
  `Keterangan` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `absensis`
--

INSERT INTO `absensis` (`AbsensiID`, `UserID`, `Hari`, `Tanggal`, `WaktuMasuk`, `WaktuKeluar`, `Keterangan`, `created_at`, `updated_at`) VALUES
(1, 2, 'Kamis', '2024-09-19', '16:05:20', '16:05:23', 'Terlambat', '2024-09-19 09:05:20', '2024-09-19 09:05:23');

-- --------------------------------------------------------

--
-- Table structure for table `cutis`
--

CREATE TABLE `cutis` (
  `CutiID` bigint(20) UNSIGNED NOT NULL,
  `UserID` bigint(20) UNSIGNED NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `alasan` varchar(255) NOT NULL,
  `status` enum('pending','approved','rejected') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cutis`
--

INSERT INTO `cutis` (`id`, `UserID`, `tanggal_mulai`, `tanggal_selesai`, `alasan`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, '2024-09-16', '2024-09-26', 'males', 'approved', '2024-09-19 09:52:17', '2024-09-19 13:49:41'),
(2, 2, '2024-09-16', '2024-09-26', 'males', 'rejected', '2024-09-19 09:56:01', '2024-09-19 13:49:58'),
(3, 2, '2024-09-12', '2024-09-26', 'dinas keluar kota', 'approved', '2024-09-19 14:42:40', '2024-09-19 14:44:03'),
(4, 2, '2024-09-27', '2024-09-30', 'mages', 'approved', '2024-09-19 14:48:46', '2024-09-19 14:49:01'),
(5, 4, '2024-09-17', '2024-09-30', 'perayaan', 'approved', '2024-09-19 15:58:39', '2024-09-19 15:59:06'),
(6, 2, '2024-09-18', '2024-09-30', 'ke gunung', 'approved', '2024-09-20 02:20:04', '2024-09-20 02:44:33');

-- --------------------------------------------------------

--
-- Table structure for table `departemens`
--

CREATE TABLE `departemens` (
  `DepartemenID` bigint(20) UNSIGNED NOT NULL,
  `NamaDepartemen` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departemens`
--

INSERT INTO `departemens` (`DepartemenID`, `NamaDepartemen`, `created_at`, `updated_at`) VALUES
(1, 'IT', '2024-09-19 08:14:53', '2024-09-19 08:14:53');

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
-- Table structure for table `gajis`
--

CREATE TABLE `gajis` (
  `GajiID` bigint(20) UNSIGNED NOT NULL,
  `UserID` bigint(20) UNSIGNED NOT NULL,
  `No_Rekening` varchar(255) NOT NULL,
  `Npwp` varchar(255) NOT NULL,
  `Nominal` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gajis`
--

INSERT INTO `gajis` (`GajiID`, `UserID`, `No_Rekening`, `Npwp`, `Nominal`, `created_at`, `updated_at`) VALUES
(1, 1, '1111231', '121222', 120000.00, '2024-09-19 08:41:34', '2024-09-19 08:41:34');

-- --------------------------------------------------------

--
-- Table structure for table `jabatans`
--

CREATE TABLE `jabatans` (
  `JabatanID` bigint(20) UNSIGNED NOT NULL,
  `NamaJabatan` varchar(255) NOT NULL,
  `Keterangan` varchar(255) NOT NULL,
  `DepartemenID` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jabatans`
--

INSERT INTO `jabatans` (`JabatanID`, `NamaJabatan`, `Keterangan`, `DepartemenID`, `created_at`, `updated_at`) VALUES
(1, 'Pustipanda', 'tempat menuntun ilmu', 1, '2024-09-19 08:15:02', '2024-09-19 08:15:02');

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
(27, '2024_09_06_195050_create_admin_logs_table', 1),
(29, '2024_09_12_110458_create_notifications_table', 3),
(30, '2024_09_19_142338_create_lalaa_table', 4),
(31, '2014_10_12_000000_create_users_table', 5),
(32, '2014_10_12_100000_create_password_resets_table', 5),
(33, '2019_08_19_000000_create_failed_jobs_table', 5),
(34, '2019_12_14_000001_create_personal_access_tokens_table', 5),
(35, '2024_08_19_071719_create_jabatans_table', 5),
(36, '2024_08_19_071827_create_departemens_table', 5),
(37, '2024_08_23_031903_create_gajis_table', 5),
(38, '2024_08_30_043030_create_absensis_table', 5),
(39, '2024_09_10_111721_create_cutis_table', 5),
(40, '2024_09_20_091816_create_notifications_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) NOT NULL,
  `type` varchar(255) NOT NULL,
  `notifiable_type` varchar(255) NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('3aa78bde-1a7a-4eca-b6eb-076a297f9575', 'App\\Notifications\\PengajuanCutiNotification', 'App\\Models\\User', 2, '{\"message\":\"Pengajuan cuti baru dari Meilany Herlita Putri\",\"cuti_id\":null,\"user_id\":2}', NULL, '2024-09-20 02:46:37', '2024-09-20 02:46:37'),
('9e3106ca-8251-40c9-94ab-d4a385b9b8fa', 'App\\Notifications\\PengajuanCutiNotification', 'App\\Models\\User', 1, '{\"message\":\"Pengajuan cuti baru dari Meilany Herlita Putri\",\"cuti_id\":6,\"user_id\":2}', NULL, '2024-09-20 02:20:04', '2024-09-20 02:20:04'),
('a86f7651-797b-4f41-8d8a-08311c6e4015', 'App\\Notifications\\PengajuanCutiNotification', 'App\\Models\\User', 3, '{\"message\":\"Pengajuan cuti baru dari Meilany Herlita Putri\",\"cuti_id\":6,\"user_id\":2}', NULL, '2024-09-20 02:20:04', '2024-09-20 02:20:04');

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `JabatanID` bigint(20) UNSIGNED NOT NULL,
  `Tanggal_Lahir` date NOT NULL,
  `Jenis_Kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `No_Telp` varchar(255) NOT NULL,
  `Alamat` text NOT NULL,
  `Tanggal_Bergabung` date NOT NULL,
  `Status` enum('Aktif','Tidak Aktif') NOT NULL,
  `role_as` enum('admin','user') NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `name`, `email`, `email_verified_at`, `password`, `JabatanID`, `Tanggal_Lahir`, `Jenis_Kelamin`, `No_Telp`, `Alamat`, `Tanggal_Bergabung`, `Status`, `role_as`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Desta Siti Amalia', 'admin@gmail.com', NULL, '$2y$10$K/HRVeonByGCaFkZiV1JIuLcwfJW9Su1w5zS.qqqPYDOsuluYTmre', 1, '2024-09-03', 'Perempuan', '085781403979', 'sawangan', '2024-09-19', 'Aktif', 'admin', NULL, '2024-09-19 08:16:40', '2024-09-19 08:16:40'),
(2, 'Meilany Herlita Putri', 'mela@gmail.com', NULL, '$2y$10$K/HRVeonByGCaFkZiV1JIuLcwfJW9Su1w5zS.qqqPYDOsuluYTmre', 1, '2024-09-27', 'Perempuan', '0857814039735', 'sawangan', '2024-09-19', 'Aktif', 'user', NULL, '2024-09-19 08:17:20', '2024-09-19 08:17:20'),
(3, 'Desta Siti', 'admin@example.com', NULL, '$2y$10$K/HRVeonByGCaFkZiV1JIuLcwfJW9Su1w5zS.qqqPYDOsuluYTmre', 1, '2024-10-12', 'Perempuan', '0864646445', 'sawangan', '2024-09-19', 'Aktif', 'admin', NULL, '2024-09-19 08:26:11', '2024-09-19 08:26:11'),
(4, 'Alena Alfiana', 'alena12@gmail.com', NULL, '$2y$10$K/HRVeonByGCaFkZiV1JIuLcwfJW9Su1w5zS.qqqPYDOsuluYTmre', 1, '2024-09-25', 'Laki-laki', '085781403979', 'sawangan', '2024-09-19', 'Aktif', 'user', NULL, '2024-09-19 15:46:24', '2024-09-19 15:46:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensis`
--
ALTER TABLE `absensis`
  ADD PRIMARY KEY (`AbsensiID`);

--
-- Indexes for table `cutis`
--
ALTER TABLE `cutis`
  ADD PRIMARY KEY (`CutiID`);

--
-- Indexes for table `departemens`
--
ALTER TABLE `departemens`
  ADD PRIMARY KEY (`DepartemenID`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `gajis`
--
ALTER TABLE `gajis`
  ADD PRIMARY KEY (`GajiID`);

--
-- Indexes for table `jabatans`
--
ALTER TABLE `jabatans`
  ADD PRIMARY KEY (`JabatanID`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensis`
--
ALTER TABLE `absensis`
  MODIFY `AbsensiID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cutis`
--
ALTER TABLE `cutis`
  MODIFY `CutiID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `departemens`
--
ALTER TABLE `departemens`
  MODIFY `DepartemenID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gajis`
--
ALTER TABLE `gajis`
  MODIFY `GajiID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jabatans`
--
ALTER TABLE `jabatans`
  MODIFY `JabatanID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
