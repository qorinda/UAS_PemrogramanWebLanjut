-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2020 at 07:34 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `edumark`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_teacher` int(11) NOT NULL,
  `nama_course` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan_course` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori_course` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_course` int(11) NOT NULL,
  `rating_course` float NOT NULL,
  `gambar_course` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `id_teacher`, `nama_course`, `keterangan_course`, `kategori_course`, `harga_course`, `rating_course`, `gambar_course`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Android Developer Bootcamp', 'Bootcamp untuk seseorang yang ingin membuat Aplikasi di Android.', 'Android Developer', 250000, 4.7, 'android.png', '2020-05-16 22:38:23', NULL, NULL),
(2, 1, 'CodeIgniter for Newbie', 'Buat website dengan CodeIgniter. Framework PHP paling mudah.', 'Web Developer', 215000, 4.4, 'ci.png', '2020-05-16 17:39:57', NULL, NULL),
(3, 1, 'Belajar HTML untuk Website', 'HTML adalah Markup Language untuk membuat struktur website.', 'Language', 85000, 4.5, 'html.png', '2020-05-16 17:59:21', '2020-05-16 18:01:26', NULL),
(4, 1, 'Java from Zero to Hero', 'Java adalah bahasa pemrograman dasar untuk belajar pemrograman.', 'Language', 100000, 4.6, 'java.jpg', '2020-05-16 18:03:22', NULL, NULL),
(5, 1, 'Kotlin for Advance', 'Android Developer? Bosen dengan Java? Yuk belajar Kotlin', 'Android Developer', 350000, 4.6, 'kotlin.png', '2020-05-16 18:04:19', '2020-05-17 17:48:58', NULL),
(6, 1, 'Snake Python', 'Selain nama ular, python adalah bahasa pemrograman yang mudah dipelajari.', 'Language', 150000, 4.5, 'python.jpg', '2020-05-16 18:11:20', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id_invoice` bigint(20) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_course` int(11) NOT NULL,
  `tgl_transaksi` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id_invoice`, `id_user`, `id_course`, `tgl_transaksi`, `created_at`, `updated_at`) VALUES
(2, 5, 1, '2020-05-18 05:31:08', '2020-05-17 22:31:08', NULL),
(5, 5, 1, '2020-05-18 07:09:58', '2020-05-18 00:09:58', NULL),
(6, 5, 1, '2020-05-18 07:17:30', '2020-05-18 00:17:30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `keys`
--

CREATE TABLE `keys` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `key` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` int(11) NOT NULL,
  `ignore_limits` tinyint(4) NOT NULL DEFAULT 0,
  `is_private_key` tinyint(4) NOT NULL DEFAULT 0,
  `ip_addresses` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `keys`
--

INSERT INTO `keys` (`id`, `user_id`, `key`, `level`, `ignore_limits`, `is_private_key`, `ip_addresses`, `date_created`) VALUES
(1, 1, 'laravel123', 1, 0, 0, NULL, 20200516);

-- --------------------------------------------------------

--
-- Table structure for table `limits`
--

CREATE TABLE `limits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uri` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `count` int(11) NOT NULL,
  `hour_started` int(11) NOT NULL,
  `api_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `limits`
--

INSERT INTO `limits` (`id`, `uri`, `count`, `hour_started`, `api_key`) VALUES
(1, 'uri:api/courses/index:get', 21, 1589777972, 'laravel123'),
(2, 'uri:api/auth/index:get', 2, 1589705931, 'laravel123'),
(3, 'uri:api/authentication/index:get', 1, 1589706131, 'laravel123'),
(4, 'uri:api/login/index:get', 3, 1589706154, 'laravel123'),
(5, 'uri:api/autentikasi/index:get', 1, 1589706639, 'laravel123'),
(6, 'uri:api/users/index:get', 1, 1589779077, 'laravel123'),
(7, 'uri:api/users/index:delete', 6, 1589753215, 'laravel123'),
(8, 'uri:api/users/index:put', 3, 1589753714, 'laravel123'),
(9, 'uri:api/courses/index:put', 4, 1589755511, 'laravel123'),
(10, 'uri:api/courses/index:post', 3, 1589756929, 'laravel123'),
(11, 'uri:api/courses/index:delete', 3, 1589757040, 'laravel123'),
(12, 'uri:api/invoices/index:get', 19, 1589776135, 'laravel123'),
(13, 'uri:api/invoices/index:delete', 2, 1589779159, 'laravel123'),
(14, 'uri:api/invoices/index:post', 2, 1589778598, 'laravel123');

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
(21, '2014_10_12_000000_create_users_table', 1),
(22, '2019_08_19_000000_create_failed_jobs_table', 1),
(23, '2020_05_15_161424_create_courses_table', 1),
(24, '2020_05_15_222235_create_keys_table', 1),
(25, '2020_05_15_235421_create_limits_table', 1),
(26, '2020_05_16_042556_add_rating_to_courses', 1),
(27, '2020_05_16_045418_create_teachers_table', 1),
(28, '2020_05_16_221316_add_kategori_to_courses', 2),
(29, '2020_05_17_025707_add_table_to_users', 3),
(31, '2014_10_12_100000_create_password_resets_table', 4),
(32, '2020_05_17_225633_add_soft_delete_to_users', 5),
(34, '2020_05_17_230912_add_soft_delete_to_courses', 6),
(35, '2020_05_18_005343_create_invoices_table', 7);

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
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_teacher` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_teacher` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quote_teacher` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar_teacher` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `nama_teacher`, `job_teacher`, `quote_teacher`, `gambar_teacher`, `created_at`, `updated_at`) VALUES
(1, 'Abdurrasyid Muhasibi', 'Programmer', 'Life is Never Flat!', 'rasyid.png', '2020-05-16 05:07:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(5, 'Abdurrasyid', 'syid@gmail.com', NULL, '$2y$10$65sMSZ8X7jfOM7K0bWRyNOBbMnhtFtDZe3Qt0kVq3ZsdoIi5LmtA6', NULL, '2020-05-17 15:33:40', '2020-05-17 17:46:48', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `courses_nama_course_unique` (`nama_course`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id_invoice`);

--
-- Indexes for table `keys`
--
ALTER TABLE `keys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `limits`
--
ALTER TABLE `limits`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
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
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id_invoice` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `keys`
--
ALTER TABLE `keys`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `limits`
--
ALTER TABLE `limits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
