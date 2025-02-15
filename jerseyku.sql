-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 15, 2025 at 12:39 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jerseyku`
--

-- --------------------------------------------------------

--
-- Table structure for table `alamats`
--

CREATE TABLE `alamats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `nohp` varchar(255) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `kota` varchar(255) DEFAULT NULL,
  `provinsi` varchar(255) DEFAULT NULL,
  `kode_pos` varchar(255) DEFAULT NULL,
  `pesanan_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `alamats`
--

INSERT INTO `alamats` (`id`, `nama`, `nohp`, `alamat`, `kota`, `provinsi`, `kode_pos`, `pesanan_id`, `created_at`, `updated_at`) VALUES
(6, 'Desta', '08213', 'Sapan city', 'Bandung ', 'Jawa Barat', '4038', 12, '2025-02-09 04:36:04', '2025-02-09 04:36:04'),
(7, 'Desta', '0821', 'Sapan', 'Bandung', 'Jabar', '4032', 13, '2025-02-09 04:48:06', '2025-02-09 04:48:06'),
(8, NULL, '0923', 'sdj', 'jdf', '231', '20', 15, '2025-02-09 22:01:44', '2025-02-09 22:01:44'),
(9, NULL, '082', 'Cibiru', 'Bandung', 'Jawa Barat', '9012', 14, '2025-02-09 22:11:28', '2025-02-09 22:16:54'),
(10, 'des', '0821', 'Sapan', 'Bandung', 'Jabar', '40381', 17, '2025-02-14 07:49:22', '2025-02-14 07:55:34'),
(11, 'Desta', '082', 'Sapan', 'Bandung', 'Jawa Barat', '4038', 18, '2025-02-14 07:58:22', '2025-02-14 07:58:22'),
(12, 'Jeki', '088', 'Cibiru hilir', 'Cibiru', 'Jabar', '5000', 19, '2025-02-15 01:42:38', '2025-02-15 01:42:38'),
(13, 'Desta', '088', 'Sapan\n', 'Bandung', 'Jawa Barat', '9000', 20, '2025-02-15 02:12:10', '2025-02-15 02:12:10'),
(14, 'Desta', '021', 'Sapan ', 'Bandung', 'Jawa Barat', '4033', 21, '2025-02-15 02:20:38', '2025-02-15 02:20:38'),
(15, 'des', '022', 'sapan', 'bandung', 'jabar', '300', 22, '2025-02-15 02:21:30', '2025-02-15 02:21:30');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('356a192b7913b04c54574d18c28d46e6395428ab', 'i:1;', 1739089777),
('356a192b7913b04c54574d18c28d46e6395428ab:timer', 'i:1739089777;', 1739089777),
('da4b9237bacccdf19c0760cab7aec4a8359010b0', 'i:1;', 1739166573),
('da4b9237bacccdf19c0760cab7aec4a8359010b0:timer', 'i:1739166573;', 1739166573),
('livewire-rate-limiter:a17961fa74e9275d529f489537f179c05d50c2f3', 'i:1;', 1739610659),
('livewire-rate-limiter:a17961fa74e9275d529f489537f179c05d50c2f3:timer', 'i:1739610659;', 1739610659);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ligas`
--

CREATE TABLE `ligas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `negara` varchar(255) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ligas`
--

INSERT INTO `ligas` (`id`, `nama`, `negara`, `gambar`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'BRI LIGA 1', 'INDONESIA', 'ligas/bri.png', 1, '2025-02-01 19:40:00', '2025-02-09 00:59:58'),
(3, 'BUNDESLIGA', 'JERMAN', 'ligas/bundesliga.png', 1, '2025-02-02 03:22:15', '2025-02-02 03:22:15'),
(4, 'PREMIER LEAGUE', 'INGGRIS', 'ligas/premier.png', 1, '2025-02-02 03:22:36', '2025-02-02 03:22:36'),
(5, 'LA LIGA', 'SPANYOL', 'ligas/laliga.png', 1, '2025-02-02 03:22:50', '2025-02-02 03:22:50');

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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_02_02_012201_create_ligas_table', 1),
(5, '2025_02_02_012208_create_produks_table', 1),
(6, '2025_02_02_012214_create_pesanans_table', 1),
(7, '2025_02_02_012234_create_pesanan_details_table', 1),
(8, '2025_02_02_012251_create_alamats_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pesanans`
--

CREATE TABLE `pesanans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `matauang` varchar(255) DEFAULT NULL,
  `metode_pembayaran` varchar(255) DEFAULT NULL,
  `status_pembayaran` varchar(255) DEFAULT NULL,
  `status` enum('new','proses','dikirim','diterima','cancel') NOT NULL DEFAULT 'new',
  `total_harga` decimal(10,2) DEFAULT NULL,
  `biaya_pengiriman` decimal(10,2) DEFAULT NULL,
  `metode_pengiriman` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `note` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pesanans`
--

INSERT INTO `pesanans` (`id`, `matauang`, `metode_pembayaran`, `status_pembayaran`, `status`, `total_harga`, `biaya_pengiriman`, `metode_pengiriman`, `user_id`, `note`, `created_at`, `updated_at`) VALUES
(12, 'idr', 'transfer', 'dibayar', 'diterima', 7747000.00, NULL, 'jne', 2, NULL, '2025-02-09 04:25:47', '2025-02-09 04:41:48'),
(13, 'idr', 'cod', 'dibayar', 'proses', 1850000.00, NULL, 'jne', 2, NULL, '2025-02-09 04:47:44', '2025-02-09 04:49:41'),
(14, 'idr', 'transfer', 'dibayar', 'diterima', 7990000.00, NULL, 'jne', 5, NULL, '2025-02-09 21:49:17', '2025-02-09 22:17:51'),
(15, 'idr', 'transfer', 'dibayar', 'proses', 1850000.00, NULL, 'jne', 2, NULL, '2025-02-09 22:01:13', '2025-02-09 22:01:44'),
(16, 'idr', 'cod', 'dibayar', 'new', 5550000.00, NULL, NULL, 5, NULL, '2025-02-09 22:52:48', '2025-02-09 22:52:48'),
(17, 'idr', 'transfer', 'dibayar', 'proses', 3995000.00, NULL, 'jne', 2, NULL, '2025-02-14 07:48:42', '2025-02-14 07:49:22'),
(18, 'idr', 'cod', 'dibayar', 'proses', 599000.00, NULL, 'sicepat', 2, NULL, '2025-02-14 07:57:51', '2025-02-14 07:58:22'),
(19, 'idr', 'cod', 'proses', 'new', 1598000.00, NULL, 'jne', 5, NULL, '2025-02-15 01:42:09', '2025-02-15 01:42:44'),
(20, 'idr', 'cod', 'proses', 'new', 3700000.00, NULL, NULL, 2, NULL, '2025-02-15 02:11:31', '2025-02-15 02:11:31'),
(21, 'idr', 'cod', 'dibayar', 'proses', 6398000.00, NULL, 'jne', 7, NULL, '2025-02-15 02:19:42', '2025-02-15 02:20:38'),
(22, 'idr', 'transfer', 'dibayar', 'proses', 3798000.00, NULL, 'sicepat', 7, NULL, '2025-02-15 02:21:14', '2025-02-15 02:21:30');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan_details`
--

CREATE TABLE `pesanan_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pesanan_id` bigint(20) UNSIGNED NOT NULL,
  `produk_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `unit_amount` decimal(10,2) DEFAULT NULL,
  `total_amount` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pesanan_details`
--

INSERT INTO `pesanan_details` (`id`, `pesanan_id`, `produk_id`, `quantity`, `unit_amount`, `total_amount`, `created_at`, `updated_at`) VALUES
(37, 12, 14, 1, 599000.00, 599000.00, '2025-02-09 04:25:57', '2025-02-09 04:25:57'),
(38, 12, 18, 1, 1850000.00, 1850000.00, '2025-02-09 04:35:31', '2025-02-09 04:35:31'),
(39, 12, 22, 2, 1850000.00, 3700000.00, '2025-02-09 04:35:39', '2025-02-09 04:35:39'),
(40, 13, 19, 1, 1850000.00, 1850000.00, '2025-02-09 04:47:44', '2025-02-09 04:47:44'),
(41, 14, 30, 10, 799000.00, 7990000.00, '2025-02-09 21:49:17', '2025-02-09 21:49:17'),
(42, 15, 29, 1, 1850000.00, 1850000.00, '2025-02-09 22:01:13', '2025-02-09 22:01:13'),
(43, 16, 20, 2, 1850000.00, 3700000.00, '2025-02-09 22:52:48', '2025-02-09 22:52:48'),
(44, 16, 27, 1, 1850000.00, 1850000.00, '2025-02-09 22:52:48', '2025-02-09 22:52:48'),
(45, 17, 30, 5, 799000.00, 3995000.00, '2025-02-14 07:48:42', '2025-02-14 07:48:42'),
(46, 18, 15, 1, 599000.00, 599000.00, '2025-02-14 07:57:51', '2025-02-14 07:57:51'),
(47, 19, 30, 2, 799000.00, 1598000.00, '2025-02-15 01:42:09', '2025-02-15 01:42:09'),
(48, 20, 20, 1, 1850000.00, 1850000.00, '2025-02-15 02:11:31', '2025-02-15 02:11:31'),
(49, 20, 19, 1, 1850000.00, 1850000.00, '2025-02-15 02:11:31', '2025-02-15 02:11:31'),
(50, 21, 28, 1, 1899000.00, 1899000.00, '2025-02-15 02:19:42', '2025-02-15 02:19:42'),
(51, 21, 30, 1, 799000.00, 799000.00, '2025-02-15 02:19:49', '2025-02-15 02:19:49'),
(52, 21, 27, 2, 1850000.00, 3700000.00, '2025-02-15 02:19:57', '2025-02-15 02:19:57'),
(53, 22, 28, 2, 1899000.00, 3798000.00, '2025-02-15 02:21:14', '2025-02-15 02:21:14');

-- --------------------------------------------------------

--
-- Table structure for table `produks`
--

CREATE TABLE `produks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `harga` decimal(10,2) NOT NULL,
  `liga_id` bigint(20) UNSIGNED NOT NULL,
  `is_ready` tinyint(1) NOT NULL DEFAULT 1,
  `is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `on_sale` tinyint(1) NOT NULL DEFAULT 0,
  `gambar` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`gambar`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `produks`
--

INSERT INTO `produks` (`id`, `nama`, `harga`, `liga_id`, `is_ready`, `is_featured`, `on_sale`, `gambar`, `created_at`, `updated_at`) VALUES
(14, 'PERSIJA HOME 2024/2025', 599000.00, 1, 1, 1, 1, '\"produks\\/psj.png\"', '2025-02-09 01:12:33', '2025-02-09 01:12:33'),
(15, 'PSS SLEMAN THIRD 2024/2025', 599000.00, 1, 1, 1, 1, '\"produks\\/pss3.png\"', '2025-02-09 01:14:26', '2025-02-09 01:14:26'),
(16, 'PERSEBAYA HOME 2024/2025', 599000.00, 1, 1, 1, 1, '\"produks\\/psb.png\"', '2025-02-09 01:14:57', '2025-02-09 01:14:57'),
(18, 'CHELSEA HOME 2024/2025', 1850000.00, 4, 1, 1, 1, '\"produks\\/celh.png\"', '2025-02-09 01:17:23', '2025-02-09 01:17:23'),
(19, 'MAN UNITED AWAY 2024/2025', 1850000.00, 4, 1, 1, 1, '\"produks\\/mua.png\"', '2025-02-09 01:18:47', '2025-02-09 01:18:47'),
(20, 'ARSENAL THIRD 2024/2025', 1850000.00, 4, 1, 1, 1, '\"produks\\/ars3.png\"', '2025-02-09 01:19:23', '2025-02-09 01:19:23'),
(21, 'REAL MADRID HOME 2024/2025', 1850000.00, 5, 1, 1, 1, '\"produks\\/madh.png\"', '2025-02-09 01:20:30', '2025-02-09 01:20:30'),
(22, 'REAL BETIS HOME 2024/2025', 1850000.00, 5, 1, 1, 1, '\"produks\\/rbh.png\"', '2025-02-09 01:21:27', '2025-02-09 01:21:27'),
(23, 'GIRONA HOME 2024/2025', 1850000.00, 5, 1, 1, 1, '\"produks\\/grnh.png\"', '2025-02-09 01:22:10', '2025-02-09 01:22:10'),
(24, 'DORTMUND AWAY 2024/2025', 1850000.00, 3, 1, 1, 1, '\"produks\\/drtmn.png\"', '2025-02-09 01:23:36', '2025-02-09 01:23:36'),
(25, 'RB LEIPZIG THIRD 2024/2025', 1850000.00, 3, 1, 1, 1, '\"produks\\/rbl3.png\"', '2025-02-09 01:24:53', '2025-02-09 01:24:53'),
(26, 'MONCHENGLADBACH HOME 2024/2025', 1850000.00, 3, 1, 1, 1, '\"produks\\/monceng.png\"', '2025-02-09 01:25:53', '2025-02-09 01:25:53'),
(27, 'BARCELONA HOME 2024/2025', 1850000.00, 5, 1, 1, 1, '\"produks\\/barc.png\"', '2025-02-09 01:27:22', '2025-02-09 01:27:22'),
(28, 'LIVERPOOL HOME 2024/2025', 1899000.00, 4, 1, 1, 1, '\"produks\\/liva.png\"', '2025-02-09 01:27:52', '2025-02-09 01:27:52'),
(29, 'BAYERN MUNCHEN HOME 2024/2025', 1850000.00, 3, 1, 1, 1, '\"produks\\/byerh.png\"', '2025-02-09 01:28:17', '2025-02-09 01:28:17'),
(30, 'PERSIB HOME 2024/2025', 799000.00, 1, 1, 1, 1, '\"produks\\/perh.png\"', '2025-02-09 01:28:48', '2025-02-09 01:28:48');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('epVFNHDAnQBwfcn012THvKWQczluHrsjZQ5OQAX4', 7, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiQk5zRFpXRzVpY3lBeXphSWVqUWJRMUdRTlNDa3M3blRUVVAxcGNNVCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6MzoidXJsIjthOjA6e31zOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEyJFY0SUN2RnZndERIdktpdWRGRWVKZmUvaEk0Zk1IRDhWanMwMGYuWXEweU5oVDVCdmlEaDJLIjtzOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTo3O30=', 1739611333);

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
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` enum('admin','customer') NOT NULL DEFAULT 'customer'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(1, 'admin', 'admin@jersey.id', NULL, '$2y$12$I5HjXBt/b2DGAShGVv495O2PNmECJGF8g2B7S.FplPoBK2fkH3fIa', NULL, '2025-02-01 18:35:21', '2025-02-15 01:58:34', 'admin'),
(2, 'rex', 'rex@rex.id', '2025-02-01 19:09:36', '$2y$12$V9qaMuxq5Mh7v.QZcuN2gODY4tEZHZTJ91GUhK1qPt4jNqMc4f0C2', NULL, '2025-02-01 19:09:45', '2025-02-01 19:09:45', 'customer'),
(5, 'jeki', 'jeki@jersey.id', NULL, '$2y$12$x2iLrIgIQLWnrTSO7GHOFO2miz2CpcNdqhr9drVzs9rh0EZ3wuZ8W', NULL, '2025-02-09 21:48:51', '2025-02-09 21:48:51', 'customer'),
(6, 'pedestaan', 'pedestaan@jersey.id', NULL, '$2y$12$V4ICvFvgtDHvKiudFEeJfe/hI4fMHD8Vjs00f.Yq0yNhT5BviDh2K', NULL, '2025-02-15 02:15:08', '2025-02-15 02:15:08', 'customer'),
(7, 'destaa', 'des@jersey.id', NULL, '$2y$12$wyVXAb/wJuRqXdt5DPzM8unAXl6.IgoyzpjpmLzmpRJH9LTmtBZwm', NULL, '2025-02-15 02:18:45', '2025-02-15 02:18:45', 'customer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alamats`
--
ALTER TABLE `alamats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `alamats_pesanan_id_foreign` (`pesanan_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ligas`
--
ALTER TABLE `ligas`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `pesanans`
--
ALTER TABLE `pesanans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pesanans_user_id_foreign` (`user_id`);

--
-- Indexes for table `pesanan_details`
--
ALTER TABLE `pesanan_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pesanan_details_pesanan_id_foreign` (`pesanan_id`),
  ADD KEY `pesanan_details_produk_id_foreign` (`produk_id`);

--
-- Indexes for table `produks`
--
ALTER TABLE `produks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `produks_liga_id_foreign` (`liga_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `alamats`
--
ALTER TABLE `alamats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ligas`
--
ALTER TABLE `ligas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pesanans`
--
ALTER TABLE `pesanans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `pesanan_details`
--
ALTER TABLE `pesanan_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `produks`
--
ALTER TABLE `produks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `alamats`
--
ALTER TABLE `alamats`
  ADD CONSTRAINT `alamats_pesanan_id_foreign` FOREIGN KEY (`pesanan_id`) REFERENCES `pesanans` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pesanans`
--
ALTER TABLE `pesanans`
  ADD CONSTRAINT `pesanans_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pesanan_details`
--
ALTER TABLE `pesanan_details`
  ADD CONSTRAINT `pesanan_details_pesanan_id_foreign` FOREIGN KEY (`pesanan_id`) REFERENCES `pesanans` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pesanan_details_produk_id_foreign` FOREIGN KEY (`produk_id`) REFERENCES `produks` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `produks`
--
ALTER TABLE `produks`
  ADD CONSTRAINT `produks_liga_id_foreign` FOREIGN KEY (`liga_id`) REFERENCES `ligas` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
