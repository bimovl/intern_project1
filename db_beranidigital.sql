-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 14, 2021 at 07:08 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_beranidigital`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`id`, `title`, `content`, `created_at`, `updated_at`) VALUES
(4, 'Announcement 1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec mattis sapien at justo placerat tempor. Pellentesque vestibulum eros vitae quam pharetra imperdiet. Nullam varius tellus justo, at auctor lectus varius ac. Sed finibus vehicula magna, ut consectetur eros auctor quis. Aliquam eu urna ipsum. Nulla metus nisi, feugiat nec sagittis sed, porttitor et enim. Ut orci elit, ultricies vitae sem non, dapibus auctor risus. Aenean eget sollicitudin dui, at suscipit ligula. Maecenas in tempor nibh, semper gravida lorem. Sed rutrum, eros a placerat interdum, urna justo efficitur quam, sed volutpat libero purus non sem. Sed volutpat, erat sit amet maximus placerat, lorem augue fringilla magna, vitae efficitur sapien tellus non mi.', '2021-08-26 18:19:17', '2021-08-29 07:26:15'),
(5, 'Announ 2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec mattis sapien at justo placerat tempor. Pellentesque vestibulum eros vitae quam pharetra imperdiet. Nullam varius tellus justo, at auctor lectus varius ac. Sed finibus vehicula magna, ut consectetur eros auctor quis. Aliquam eu urna ipsum. Nulla metus nisi, feugiat nec sagittis sed, porttitor et enim. Ut orci elit, ultricies vitae sem non, dapibus auctor risus. Aenean eget sollicitudin dui, at suscipit ligula. Maecenas in tempor nibh, semper gravida lorem.', '2021-08-29 07:28:01', '2021-08-29 07:28:01'),
(6, 'Tea Of The Day', 'hahahahhahahahaha', '2021-09-14 09:24:13', '2021-09-14 09:25:32');

-- --------------------------------------------------------

--
-- Table structure for table `balancecashes`
--

CREATE TABLE `balancecashes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `saldo_awal` int(11) NOT NULL,
  `transaksi` enum('deposit','transfer','withdraw','recieve') COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_transaksi` int(11) NOT NULL,
  `status` enum('pending','success') COLLATE utf8mb4_unicode_ci NOT NULL,
  `saldo_akhir` int(11) NOT NULL,
  `penerima` bigint(20) UNSIGNED DEFAULT NULL,
  `pengirim` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `balancecashes`
--

INSERT INTO `balancecashes` (`id`, `user_id`, `saldo_awal`, `transaksi`, `jumlah_transaksi`, `status`, `saldo_akhir`, `penerima`, `pengirim`, `created_at`, `updated_at`) VALUES
(1, 1, 0, 'deposit', 1000000, 'success', 1000000, NULL, NULL, '2021-09-10 22:43:16', '2021-09-10 22:43:16'),
(6, 3, 0, 'deposit', 500000, 'success', 500000, NULL, NULL, '2021-09-10 23:05:32', '2021-09-10 23:05:32'),
(11, 1, 1000000, 'transfer', 100000, 'success', 900000, 3, NULL, '2021-09-10 23:32:25', '2021-09-10 23:32:25'),
(12, 3, 500000, 'recieve', 100000, 'success', 600000, NULL, 1, '2021-09-10 23:32:25', '2021-09-10 23:32:25'),
(13, 1, 900000, 'transfer', 100000, 'success', 800000, 3, NULL, '2021-09-12 23:17:20', '2021-09-12 23:17:20'),
(14, 3, 600000, 'recieve', 100000, 'success', 700000, NULL, 1, '2021-09-12 23:17:20', '2021-09-12 23:17:20'),
(15, 1, 800000, 'withdraw', 50000, 'success', 750000, NULL, NULL, '2021-09-12 23:17:35', '2021-09-12 23:18:39');

-- --------------------------------------------------------

--
-- Table structure for table `balancersus`
--

CREATE TABLE `balancersus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `saldo_awal` int(11) NOT NULL,
  `transaksi` enum('deposit','transfer','withdraw','recieve') COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_transaksi` int(11) NOT NULL,
  `status` enum('pending','success') COLLATE utf8mb4_unicode_ci NOT NULL,
  `saldo_akhir` int(11) NOT NULL,
  `penerima` bigint(20) UNSIGNED DEFAULT NULL,
  `pengirim` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `balancersus`
--

INSERT INTO `balancersus` (`id`, `user_id`, `saldo_awal`, `transaksi`, `jumlah_transaksi`, `status`, `saldo_akhir`, `penerima`, `pengirim`, `created_at`, `updated_at`) VALUES
(1, 3, 0, 'deposit', 200, 'success', 200, NULL, NULL, '2021-09-11 21:32:23', '2021-09-11 21:32:23'),
(2, 1, 0, 'deposit', 1000, 'success', 1000, NULL, NULL, '2021-09-11 21:35:16', '2021-09-11 21:35:16'),
(3, 1, 1000, 'withdraw', 100, 'success', 900, NULL, NULL, '2021-09-11 21:47:45', '2021-09-11 21:48:23');

-- --------------------------------------------------------

--
-- Table structure for table `cvs`
--

CREATE TABLE `cvs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `cv` varchar(2000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(23, '2014_10_12_000000_create_users_table', 1),
(24, '2014_10_12_100000_create_password_resets_table', 1),
(25, '2019_08_19_000000_create_failed_jobs_table', 1),
(27, '2021_08_25_123209_create_notifications_table', 1),
(28, '2021_08_26_131224_create_announcements_table', 2),
(29, '2021_08_30_021659_create_transactions_table', 3),
(33, '2021_08_20_052429_create_portfolios_table', 7),
(34, '2021_09_01_135849_create_cvs_table', 8),
(35, '2021_09_01_135912_create_otherdocs_table', 9),
(36, '2021_08_30_020002_create_balancersus_table', 10),
(41, '2021_09_02_010406_create_balancecashes_table', 13),
(42, '2021_09_06_031704_create_balancersus_table', 14);

-- --------------------------------------------------------

--
-- Table structure for table `otherdocs`
--

CREATE TABLE `otherdocs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `otherdoc` varchar(2000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `otherdocs`
--

INSERT INTO `otherdocs` (`id`, `user_id`, `otherdoc`, `created_at`, `updated_at`) VALUES
(1, 1, '1630508338.pdf', '2021-09-01 07:58:58', '2021-09-01 07:58:58'),
(2, 3, '1630517406.pdf', '2021-09-01 10:30:06', '2021-09-01 10:30:06'),
(3, 1, '1630554959.pdf', '2021-09-01 20:55:59', '2021-09-01 20:55:59'),
(4, 1, '1631603962.pdf', '2021-09-14 00:19:22', '2021-09-14 00:19:22');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `portfolios`
--

CREATE TABLE `portfolios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `portfolio` varchar(2000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `transaction` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `transaction`, `created_at`, `updated_at`) VALUES
(1, 'deposit', NULL, NULL),
(2, 'transfer', NULL, NULL),
(3, 'withdraw', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `github` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('Enable','Disable') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hascash` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N',
  `hasrsu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `email_verified_at`, `password`, `lastname`, `phone`, `instagram`, `github`, `twitter`, `status`, `hascash`, `hasrsu`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'User', 'user@gmail.com', '0', NULL, '$2y$10$nUL0yipVSzz0D2fH/Dqg7OcGiEsfLcO/nwTbTu04d6ADYBF8huwcC', 'Name', '0812323231', NULL, 'github.com', NULL, 'Enable', 'Y', 'Y', NULL, '2021-08-25 05:56:58', '2021-09-14 07:03:02'),
(2, 'admin', 'admin@gmail.com', '1', NULL, '$2y$10$.8mPdiPsto2zUl./BxCia.gWO78TOoZyO6szI/K/sJKViA11N8IMO', NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', NULL, '2021-08-26 07:38:21', '2021-08-26 07:38:21'),
(3, 'user2', 'user2@gmail.com', '0', NULL, '$2y$10$Xr90IsOkDCjn8pJXeeltGuFCoOybFX/XYzGy2f7twIDxBInZC0Myq', NULL, NULL, NULL, NULL, NULL, NULL, 'Y', 'Y', NULL, '2021-09-01 09:08:08', '2021-09-01 09:08:08'),
(4, 'user3', 'user3@gmail.com', '0', NULL, '$2y$10$50pe1XytHxO5K23HINq70.UPQcZphyBe0u3ngl17OjKMnCclz5G9C', NULL, NULL, NULL, NULL, NULL, NULL, 'N', 'N', NULL, '2021-09-01 10:34:08', '2021-09-01 10:34:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `balancecashes`
--
ALTER TABLE `balancecashes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `balancecashes_user_id_index` (`user_id`),
  ADD KEY `balancecashes_penerima_index` (`penerima`),
  ADD KEY `balancecashes_pengirim_index` (`pengirim`);

--
-- Indexes for table `balancersus`
--
ALTER TABLE `balancersus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `balancersus_user_id_index` (`user_id`),
  ADD KEY `balancersus_penerima_index` (`penerima`),
  ADD KEY `balancersus_pengirim_index` (`pengirim`);

--
-- Indexes for table `cvs`
--
ALTER TABLE `cvs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cvs_user_id_index` (`user_id`);

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
-- Indexes for table `otherdocs`
--
ALTER TABLE `otherdocs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `otherdocs_user_id_index` (`user_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `portfolios`
--
ALTER TABLE `portfolios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `portfolios_user_id_index` (`user_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
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
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `balancecashes`
--
ALTER TABLE `balancecashes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `balancersus`
--
ALTER TABLE `balancersus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cvs`
--
ALTER TABLE `cvs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `otherdocs`
--
ALTER TABLE `otherdocs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `portfolios`
--
ALTER TABLE `portfolios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `balancecashes`
--
ALTER TABLE `balancecashes`
  ADD CONSTRAINT `balancecashes_penerima_foreign` FOREIGN KEY (`penerima`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `balancecashes_pengirim_foreign` FOREIGN KEY (`pengirim`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `balancecashes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `balancersus`
--
ALTER TABLE `balancersus`
  ADD CONSTRAINT `balancersus_penerima_foreign` FOREIGN KEY (`penerima`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `balancersus_pengirim_foreign` FOREIGN KEY (`pengirim`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `balancersus_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `cvs`
--
ALTER TABLE `cvs`
  ADD CONSTRAINT `cvs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `otherdocs`
--
ALTER TABLE `otherdocs`
  ADD CONSTRAINT `otherdocs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `portfolios`
--
ALTER TABLE `portfolios`
  ADD CONSTRAINT `portfolios_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
