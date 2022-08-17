-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 17, 2022 at 06:44 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `publicizingportal`
--

-- --------------------------------------------------------

--
-- Table structure for table `ad_coordinates`
--

CREATE TABLE `ad_coordinates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ad_data_id` tinyint(4) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ad_coordinates`
--

INSERT INTO `ad_coordinates` (`id`, `ad_data_id`, `image`, `latitude`, `longitude`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, '1233', NULL, NULL, NULL),
(2, 22, 'https://ads-project-kolkata.s3.ap-south-1.amazonaws.com/TnqaWDTH6Dk6XSDvfr7ejInjvMGmbfeEfSkfYMYU.png', NULL, NULL, '2022-08-15 23:52:18', '2022-08-15 23:52:18');

-- --------------------------------------------------------

--
-- Table structure for table `ad_datas`
--

CREATE TABLE `ad_datas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` tinyint(4) NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ad_tagline` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ad_layout` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pincode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ad_datas`
--

INSERT INTO `ad_datas` (`id`, `user_id`, `company_name`, `ad_tagline`, `address_1`, `address_2`, `ad_layout`, `city`, `state`, `pincode`, `country`, `created_at`, `updated_at`) VALUES
(1, 1, 'abc', 'hhh', 'ffff', 'dfddf', 'new lsy', 'kolcotha', 'sindh', 'aaa', 'indai', NULL, NULL),
(2, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-08-15 20:51:54', '2022-08-15 20:51:54'),
(3, 4, 'blisscoders', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-08-15 20:53:56', '2022-08-15 20:53:56'),
(4, 6, 'blisscoders', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-08-15 20:55:23', '2022-08-15 20:55:23'),
(5, 7, 'blisscoders', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-08-15 20:56:36', '2022-08-15 20:56:36'),
(6, 7, 'blisscoders', '123', NULL, NULL, NULL, 'karachi', 'sindh', '77210', 'Pakistan', '2022-08-15 23:33:42', '2022-08-15 23:33:42'),
(7, 7, 'blisscoders', '123', NULL, NULL, NULL, 'karachi', 'sindh', '77210', 'Pakistan', '2022-08-15 23:36:48', '2022-08-15 23:36:48'),
(8, 7, 'blisscoders', '123', NULL, NULL, NULL, 'karachi', 'sindh', '77210', 'Pakistan', '2022-08-15 23:37:33', '2022-08-15 23:37:33'),
(9, 7, 'blisscoders', '123', NULL, NULL, NULL, 'karachi', 'sindh', '77210', 'Pakistan', '2022-08-15 23:39:19', '2022-08-15 23:39:19'),
(10, 7, 'blisscoders', '123', NULL, NULL, NULL, 'karachi', 'sindh', '77210', 'Pakistan', '2022-08-15 23:40:31', '2022-08-15 23:40:31'),
(11, 7, 'blisscoders', '123', NULL, NULL, NULL, 'karachi', 'sindh', '77210', 'Pakistan', '2022-08-15 23:41:17', '2022-08-15 23:41:17'),
(12, 7, 'blisscoders', '123', NULL, NULL, NULL, 'karachi', 'sindh', '77210', 'Pakistan', '2022-08-15 23:41:39', '2022-08-15 23:41:39'),
(13, 7, 'blisscoders', '123', NULL, NULL, NULL, 'karachi', 'sindh', '77210', 'Pakistan', '2022-08-15 23:44:27', '2022-08-15 23:44:27'),
(14, 7, 'blisscoders', '123', NULL, NULL, NULL, 'karachi', 'sindh', '77210', 'Pakistan', '2022-08-15 23:47:02', '2022-08-15 23:47:02'),
(15, 7, 'blisscoders', '123', NULL, NULL, NULL, 'karachi', 'sindh', '77210', 'Pakistan', '2022-08-15 23:48:44', '2022-08-15 23:48:44'),
(16, 7, 'blisscoders', '123', NULL, NULL, NULL, 'karachi', 'sindh', '77210', 'Pakistan', '2022-08-15 23:48:47', '2022-08-15 23:48:47'),
(17, 7, 'blisscoders', '123', NULL, NULL, NULL, 'karachi', 'sindh', '77210', 'Pakistan', '2022-08-15 23:49:39', '2022-08-15 23:49:39'),
(18, 7, 'blisscoders', '123', NULL, NULL, NULL, 'karachi', 'sindh', '77210', 'Pakistan', '2022-08-15 23:50:14', '2022-08-15 23:50:14'),
(19, 7, 'blisscoders', '123', NULL, NULL, NULL, 'karachi', 'sindh', '77210', 'Pakistan', '2022-08-15 23:50:27', '2022-08-15 23:50:27'),
(20, 7, 'blisscoders', '123', NULL, NULL, NULL, 'karachi', 'sindh', '77210', 'Pakistan', '2022-08-15 23:50:40', '2022-08-15 23:50:40'),
(21, 7, 'blisscoders', '123', NULL, NULL, NULL, 'karachi', 'sindh', '77210', 'Pakistan', '2022-08-15 23:50:49', '2022-08-15 23:50:49'),
(22, 7, 'blisscoders', '123', NULL, NULL, NULL, 'karachi', 'sindh', '77210', 'Pakistan', '2022-08-15 23:52:18', '2022-08-15 23:52:18');

-- --------------------------------------------------------

--
-- Table structure for table `ad_layouts`
--

CREATE TABLE `ad_layouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `layout_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_08_15_214923_create_ad_datas_table', 1),
(6, '2022_08_15_214957_create_ad_layouts_table', 1),
(7, '2022_08_15_215026_create_ad_coordinates_table', 1);

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 8, 'my-app-token', '17eaabbaf8585709fb5333cfecdda14dd2fdec175c7c37500779a1d3e7deacce', '[\"*\"]', NULL, '2022-08-17 09:19:19', '2022-08-17 09:19:19'),
(2, 'App\\Models\\User', 8, 'my-app-token', '399d32452c734e5dcd3fa87501f92f876b42fdd2dee62ca19dca8c40ddeeab3a', '[\"*\"]', NULL, '2022-08-17 09:19:52', '2022-08-17 09:19:52'),
(3, 'App\\Models\\User', 1, 'my-app-token', '20a18fa276f6fca4a30a269908f80b0e8e85cf13ab633b4d2f3ca238c378f8ad', '[\"*\"]', NULL, '2022-08-17 09:24:29', '2022-08-17 09:24:29'),
(4, 'App\\Models\\User', 1, 'my-app-token', '068a90818406365586f3e03607b6f10ac130534e6d1e2a9d4461ae7c96288ed9', '[\"*\"]', NULL, '2022-08-17 09:24:32', '2022-08-17 09:24:32');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Shehzad Rana', '+91-9265121885', 'shehzadcse@gmail.com', NULL, '$2y$10$iIvJZtP2BpuNeUtjTB3/QOCm4AJ3EGYAP7TnkK6EDJIKs3Zx44EBy', NULL, '2022-08-17 09:23:09', '2022-08-17 09:23:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ad_coordinates`
--
ALTER TABLE `ad_coordinates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ad_datas`
--
ALTER TABLE `ad_datas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ad_layouts`
--
ALTER TABLE `ad_layouts`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ad_coordinates`
--
ALTER TABLE `ad_coordinates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ad_datas`
--
ALTER TABLE `ad_datas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `ad_layouts`
--
ALTER TABLE `ad_layouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
