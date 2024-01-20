-- phpMyAdmin SQL Dump
-- version 5.2.1deb1ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 20, 2024 at 08:48 PM
-- Server version: 8.0.35-0ubuntu0.23.10.1
-- PHP Version: 8.2.10-2ubuntu1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `raitotec`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2024-01-20 06:53:12', '2024-01-20 06:53:12'),
(2, 1, '2024-01-20 06:53:36', '2024-01-20 06:53:36'),
(3, 2, '2024-01-20 06:58:35', '2024-01-20 06:58:35'),
(4, 2, '2024-01-20 07:05:39', '2024-01-20 07:05:39'),
(5, 1, '2024-01-20 07:18:21', '2024-01-20 07:18:21'),
(6, 1, '2024-01-20 08:14:50', '2024-01-20 08:14:50'),
(7, 1, '2024-01-20 08:18:30', '2024-01-20 08:18:30'),
(8, 1, '2024-01-20 08:18:39', '2024-01-20 08:18:39'),
(9, 1, '2024-01-20 08:55:32', '2024-01-20 08:55:32'),
(10, 1, '2024-01-20 09:39:52', '2024-01-20 09:39:52'),
(11, 1, '2024-01-20 13:56:06', '2024-01-20 13:56:06'),
(12, 2, '2024-01-20 13:56:36', '2024-01-20 13:56:36'),
(13, 1, '2023-12-31 22:00:00', '2024-01-20 14:14:54'),
(14, 1, '2024-01-01 22:00:00', '2024-01-20 18:29:44'),
(15, 1, '2024-01-09 22:00:00', '2024-01-20 18:30:45'),
(16, 1, '2024-01-08 22:00:00', '2024-01-20 18:31:25'),
(17, 1, '2024-01-03 22:00:00', '2024-01-20 18:32:25'),
(18, 1, '2024-01-08 22:00:00', '2024-01-20 18:34:30'),
(19, 1, '2024-01-09 22:00:00', '2024-01-20 18:35:05'),
(20, 1, '2024-01-02 22:00:00', '2024-01-20 18:39:00'),
(21, 1, '2024-01-08 22:00:00', '2024-01-20 18:39:35'),
(22, 1, '2024-01-09 22:00:00', '2024-01-20 18:40:11'),
(23, 1, '2024-01-01 22:00:00', '2024-01-20 18:41:07');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_item`
--

CREATE TABLE `invoice_item` (
  `id` bigint UNSIGNED NOT NULL,
  `invoice_id` bigint UNSIGNED NOT NULL,
  `item_id` bigint UNSIGNED NOT NULL,
  `quantity` int NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoice_item`
--

INSERT INTO `invoice_item` (`id`, `invoice_id`, `item_id`, `quantity`, `total`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 12.00, '2024-01-20 06:53:12', '2024-01-20 06:53:12'),
(2, 2, 1, 3, 36.00, '2024-01-20 06:53:36', '2024-01-20 06:53:36'),
(3, 2, 2, 1, 33.00, '2024-01-20 06:53:36', '2024-01-20 06:53:36'),
(4, 3, 2, 1, 33.00, '2024-01-20 06:58:35', '2024-01-20 06:58:35'),
(5, 4, 2, 2, 66.00, '2024-01-20 07:05:39', '2024-01-20 07:05:39'),
(6, 5, 2, 2, 66.00, '2024-01-20 07:18:21', '2024-01-20 07:18:21'),
(7, 6, 2, 2, 66.00, '2024-01-20 08:14:50', '2024-01-20 08:14:50'),
(8, 7, 2, 2, 66.00, '2024-01-20 08:18:30', '2024-01-20 08:18:30'),
(9, 8, 2, 2, 66.00, '2024-01-20 08:18:39', '2024-01-20 08:18:39'),
(10, 9, 2, 1, 33.00, '2024-01-20 08:55:32', '2024-01-20 08:55:32'),
(11, 10, 1, 1, 12.00, '2024-01-20 09:39:52', '2024-01-20 09:39:52'),
(12, 11, 2, 3, 99.00, '2024-01-20 13:56:06', '2024-01-20 13:56:06'),
(13, 12, 1, 4, 48.00, '2024-01-20 13:56:36', '2024-01-20 13:56:36'),
(14, 12, 2, 3, 99.00, '2024-01-20 13:56:36', '2024-01-20 13:56:36'),
(15, 13, 2, 2, 66.00, '2024-01-20 14:14:54', '2024-01-20 14:14:54'),
(16, 14, 1, 3, 36.00, '2024-01-20 18:29:44', '2024-01-20 18:29:44'),
(17, 15, 2, 3, 99.00, '2024-01-20 18:30:45', '2024-01-20 18:30:45'),
(18, 16, 1, 1, 12.00, '2024-01-20 18:31:25', '2024-01-20 18:31:25'),
(19, 17, 2, 1, 33.00, '2024-01-20 18:32:25', '2024-01-20 18:32:25'),
(20, 18, 1, 1, 12.00, '2024-01-20 18:34:30', '2024-01-20 18:34:30'),
(21, 19, 2, 1, 33.00, '2024-01-20 18:35:05', '2024-01-20 18:35:05'),
(22, 20, 2, 1, 33.00, '2024-01-20 18:39:00', '2024-01-20 18:39:00'),
(23, 21, 1, 1, 12.00, '2024-01-20 18:39:35', '2024-01-20 18:39:35'),
(24, 22, 1, 2, 24.00, '2024-01-20 18:40:11', '2024-01-20 18:40:11'),
(25, 23, 2, 1, 33.00, '2024-01-20 18:41:07', '2024-01-20 18:41:07');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` bigint UNSIGNED NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `price`, `created_at`, `updated_at`) VALUES
(1, 12.00, NULL, NULL),
(2, 33.00, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `item_translations`
--

CREATE TABLE `item_translations` (
  `id` bigint UNSIGNED NOT NULL,
  `item_id` bigint UNSIGNED NOT NULL,
  `language_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `item_translations`
--

INSERT INTO `item_translations` (`id`, `item_id`, `language_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'جهاز', NULL, NULL),
(2, 1, 2, 'device', NULL, NULL),
(3, 2, 1, 'ديمو', NULL, NULL),
(4, 2, 2, 'demo', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` bigint UNSIGNED NOT NULL,
  `native_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `flag` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `native_name`, `code`, `flag`, `created_at`, `updated_at`) VALUES
(1, 'العربيه', 'ar', 'egypt.png', NULL, NULL),
(2, 'english', 'en', 'usa.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_01_18_105815_create_languages_table', 1),
(6, '2024_01_18_110906_create_languages_table', 2),
(7, '2024_01_18_112538_create_user_translations_table', 3),
(8, '2024_01_18_113720_create_items_table', 4),
(9, '2024_01_18_113735_create_item_data_table', 4),
(10, '2024_01_18_114032_create_items_table', 5),
(11, '2024_01_18_114216_create_item_translations_table', 6),
(12, '2024_01_18_115124_create_invoices_table', 7),
(13, '2024_01_18_115244_create_invoice_item_table', 7),
(14, '2024_01_18_180421_create_item_translation_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'ahmed@gmail.com', NULL, '', NULL, NULL, NULL),
(2, 'saad@gmail.com', NULL, '', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users_translations`
--

CREATE TABLE `users_translations` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `language_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users_translations`
--

INSERT INTO `users_translations` (`id`, `user_id`, `language_id`, `name`) VALUES
(1, 1, 1, 'احمد'),
(2, 1, 2, 'ahmed'),
(3, 2, 1, 'سعيد'),
(4, 2, 2, 'saad');

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
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoices_user_id_foreign` (`user_id`);

--
-- Indexes for table `invoice_item`
--
ALTER TABLE `invoice_item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoice_item_invoice_id_foreign` (`invoice_id`),
  ADD KEY `invoice_item_item_id_foreign` (`item_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_translations`
--
ALTER TABLE `item_translations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_translations_language_id_foreign` (`language_id`),
  ADD KEY `item_translations_item_id_foreign` (`item_id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `languages_code_unique` (`code`);

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `users_translations`
--
ALTER TABLE `users_translations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_translations_user_id_foreign` (`user_id`),
  ADD KEY `users_translations_language_id_foreign` (`language_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `invoice_item`
--
ALTER TABLE `invoice_item`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `item_translations`
--
ALTER TABLE `item_translations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users_translations`
--
ALTER TABLE `users_translations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `invoices_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `invoice_item`
--
ALTER TABLE `invoice_item`
  ADD CONSTRAINT `invoice_item_invoice_id_foreign` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `invoice_item_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `item_translations`
--
ALTER TABLE `item_translations`
  ADD CONSTRAINT `item_translations_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `item_translations_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users_translations`
--
ALTER TABLE `users_translations`
  ADD CONSTRAINT `users_translations_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_translations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
