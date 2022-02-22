-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2022 at 06:21 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravelbatch10`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'farhan', 'nil26566@gmail.com', '$2y$10$QwcvmfVNhtgYiT4ID6ea7OkBAaueTF5w.0JcwjGdmJXdgYArW8COG', 'ghFG0Y1yOEGX4nP9twu8Gyn9c95snEq4sQT5azht2prU5RP4Npj1LhneypZX', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_row_id` int(10) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `category_slug` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `category_image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `category_short_description` text COLLATE utf8_unicode_ci,
  `category_long_description` longtext COLLATE utf8_unicode_ci,
  `parent_id` int(11) DEFAULT NULL,
  `has_child` int(11) DEFAULT NULL,
  `is_featured` tinyint(1) NOT NULL DEFAULT '0',
  `level` int(11) DEFAULT NULL,
  `count_product` int(11) DEFAULT NULL,
  `category_sort_order` int(11) DEFAULT NULL,
  `meta_key` text COLLATE utf8_unicode_ci,
  `meta_description` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_row_id`, `category_name`, `category_slug`, `category_image`, `category_short_description`, `category_long_description`, `parent_id`, `has_child`, `is_featured`, `level`, `count_product`, `category_sort_order`, `meta_key`, `meta_description`, `created_at`, `updated_at`) VALUES
(1, 'Kitchen', NULL, '1621662874_kitchen.png', 'kitchen description', 'kitchen description', 0, 1, 0, 0, NULL, NULL, NULL, NULL, '2021-05-21 23:54:34', '2021-05-21 23:54:34'),
(2, 'Water & Beverages', NULL, NULL, 'Water & Beverages description', 'Water & Beverages description', 1, NULL, 0, 1, NULL, NULL, NULL, NULL, '2021-05-21 23:56:10', '2021-05-21 23:56:10'),
(3, 'Fruits & Vegetables', NULL, NULL, 'Fruits & Vegetables description', 'Fruits & Vegetables description', 1, NULL, 0, 1, NULL, NULL, NULL, NULL, '2021-05-22 00:00:17', '2021-05-22 00:00:17'),
(4, 'Staples', NULL, NULL, 'Staples description', 'Staples description', 1, NULL, 0, 1, NULL, NULL, NULL, NULL, '2021-05-22 00:00:58', '2021-05-22 00:00:58'),
(5, 'Personal Care', NULL, '1621663418_personal_care.png', 'personal care description', 'personal care description', 0, 1, 0, 0, NULL, NULL, NULL, NULL, '2021-05-22 00:03:38', '2021-05-22 00:03:38'),
(6, 'Ayurvedic', NULL, NULL, 'Ayurvedic description', 'Ayurvedic description', 5, NULL, 0, 1, NULL, NULL, NULL, NULL, '2021-05-22 00:04:09', '2021-05-22 00:04:09'),
(7, 'Baby Care', NULL, NULL, 'Baby Care description', 'Baby Care description', 5, NULL, 0, 1, NULL, NULL, NULL, NULL, '2021-05-22 00:07:20', '2021-05-22 00:07:20'),
(8, 'Household', NULL, '1621663701_households.png', 'household description', 'household description', 0, 1, 0, 0, NULL, NULL, NULL, NULL, '2021-05-22 00:08:21', '2021-05-22 00:08:21'),
(9, 'Cleaning Accessories', NULL, NULL, 'Cleaning Accessories desc', 'Cleaning Accessories desc', 8, NULL, 0, 1, NULL, NULL, NULL, NULL, '2021-05-22 00:08:51', '2021-05-22 00:08:51'),
(10, 'CookWear', NULL, NULL, 'CookWear desc', 'CookWear desc', 8, 1, 0, 1, NULL, NULL, NULL, NULL, '2021-05-22 00:09:13', '2021-05-22 00:09:13'),
(11, 'Branded Food', NULL, NULL, 'brandon desc', 'brandon desc', 1, NULL, 0, 1, NULL, NULL, NULL, NULL, '2021-05-22 01:03:10', '2021-05-22 01:03:10'),
(12, 'Breakfast & Cereal', NULL, NULL, 'Breakfast descc', 'Breakfast descc', 1, NULL, 0, 1, NULL, NULL, NULL, NULL, '2021-05-22 01:03:35', '2021-05-22 01:03:35'),
(13, 'Snacks', NULL, NULL, 'snacks description', 'snacks description', 1, 1, 0, 1, NULL, NULL, NULL, NULL, '2021-05-22 02:58:40', '2021-05-22 02:58:40'),
(14, 'Spices', NULL, NULL, 'spices desc', 'spices desc', 1, NULL, 0, 1, NULL, NULL, NULL, NULL, '2021-05-22 02:59:51', '2021-05-22 02:59:51'),
(15, 'Hair Care', NULL, NULL, NULL, NULL, 5, NULL, 0, 1, NULL, NULL, NULL, NULL, '2021-05-22 05:33:14', '2021-05-22 05:33:14'),
(16, 'Detergents', NULL, NULL, NULL, NULL, 8, NULL, 0, 1, NULL, NULL, NULL, NULL, '2021-05-22 07:29:19', '2021-05-22 07:29:19'),
(17, 'rice', NULL, '1622299113_student.jpg', 'test', 'tasty', 10, NULL, 0, 2, NULL, NULL, NULL, NULL, '2021-05-29 08:38:33', '2021-05-29 08:38:33'),
(18, 'roti', NULL, '1622572970_167493146_487972385688354_6864487913749115004_n.jpg', 'test', 'tasty', 13, NULL, 0, 2, NULL, NULL, NULL, NULL, '2021-06-01 12:42:51', '2021-06-01 12:42:51'),
(19, 'dress', NULL, '1622727341_167493146_487972385688354_6864487913749115004_n.jpg', 'test', 'tasty', 8, NULL, 0, 1, NULL, NULL, NULL, NULL, '2021-06-03 07:35:42', '2021-06-03 07:35:42'),
(20, 'dress', NULL, '1622732687_moon.PNG', 'tasty', 'test', 5, NULL, 0, 1, NULL, NULL, NULL, NULL, '2021-06-03 09:04:47', '2021-06-03 09:04:47'),
(21, 'dress', NULL, '1622732935_moon.PNG', 'tasty', 'test', 5, NULL, 0, 1, NULL, NULL, NULL, NULL, '2021-06-03 09:08:56', '2021-06-03 09:08:56'),
(22, 'cooking', NULL, '1622898947_194228487_4191556607576464_5109295073664335324_n.jpg', 'tasty', 'tasty', 1, NULL, 0, 1, NULL, NULL, NULL, NULL, '2021-06-05 07:15:48', '2021-06-05 07:15:48'),
(23, 'cooking', NULL, '1622898956_194228487_4191556607576464_5109295073664335324_n.jpg', 'tasty', 'tasty', 1, NULL, 0, 1, NULL, NULL, NULL, NULL, '2021-06-05 07:15:56', '2021-06-05 07:15:56'),
(24, 'cuttung', NULL, '1624083954_knife.PNG', 'test', 'sharp', 1, NULL, 0, 1, NULL, NULL, NULL, NULL, '2021-06-19 00:25:55', '2021-06-19 00:25:55'),
(25, 'cuttung', NULL, '1624083963_knife.PNG', 'test', 'sharp', 1, NULL, 0, 1, NULL, NULL, NULL, NULL, '2021-06-19 00:26:03', '2021-06-19 00:26:03');

-- --------------------------------------------------------

--
-- Table structure for table `contact_infos`
--

CREATE TABLE `contact_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_number` int(11) NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_infos`
--

INSERT INTO `contact_infos` (`id`, `name`, `email`, `contact_number`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Asif Ahmed', 'asifahmed.mist@gmail.com', 123456789, 'I like this store site', NULL, NULL),
(2, 'Arshan Ahmad', 'aahmad@gmail.com', 987456321, 'Need to entry more productd', NULL, NULL),
(3, 'Asif Ahmed', 'asifahmed.mist@gmail.com', 123456789, 'I like this store site', NULL, NULL),
(4, 'Arshan Ahmad', 'aahmad@gmail.com', 987456321, 'Need to entry more productd', NULL, NULL);

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
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
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
(5, '2021_04_07_192815_create_contact_info_table', 2),
(6, '2021_03_27_143058_create_contact_info_table', 3),
(7, '2021_03_30_071223_create_admins_table', 3),
(8, '2021_05_08_141335_create_permission_tables', 4);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_row_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `total_price` float(10,2) DEFAULT NULL,
  `order_details` text,
  `payment_details` text,
  `order_status` tinyint(1) DEFAULT NULL,
  `shiping_address` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'role-list', 'admin', '2021-05-08 08:54:24', '2021-05-08 08:54:24'),
(2, 'role-create', 'admin', '2021-05-08 08:54:24', '2021-05-08 08:54:24'),
(3, 'role-edit', 'admin', '2021-05-08 08:54:24', '2021-05-08 08:54:24'),
(4, 'role-delete', 'admin', '2021-05-08 08:54:24', '2021-05-08 08:54:24'),
(5, 'category-list', 'admin', '2021-05-08 08:54:24', '2021-05-08 08:54:24'),
(6, 'category-create', 'admin', '2021-05-08 08:54:24', '2021-05-08 08:54:24'),
(7, 'category-edit', 'admin', '2021-05-08 08:54:24', '2021-05-08 08:54:24'),
(8, 'category-delete', 'admin', '2021-05-08 08:54:24', '2021-05-08 08:54:24');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_row_id` int(10) UNSIGNED NOT NULL,
  `product_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_base_price` float(8,2) DEFAULT NULL,
  `product_offer_price` float(8,2) DEFAULT NULL,
  `product_height` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_width` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_weight` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `category_row_id` int(11) NOT NULL,
  `product_sku` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_featured` tinyint(1) NOT NULL DEFAULT '0',
  `is_latest` tinyint(1) NOT NULL DEFAULT '0',
  `product_short_description` text COLLATE utf8_unicode_ci,
  `product_long_description` longtext COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_row_id`, `product_name`, `product_base_price`, `product_offer_price`, `product_height`, `product_width`, `product_weight`, `category_row_id`, `product_sku`, `product_image`, `is_featured`, `is_latest`, `product_short_description`, `product_long_description`, `created_at`, `updated_at`) VALUES
(2, 'Teer Whole  Wheat Atta', 88.00, 85.00, NULL, NULL, '2', 19, 'KC-0001', '1622228503_teer_flour.jpg', 0, 0, 'whole wheat', 'whole wheat', '2021-05-28 13:01:43', '2021-05-28 13:01:43'),
(3, 'Bashundhara Brown Atta', 42.00, 40.00, NULL, NULL, '1', 19, 'KC-0002', '1622229453_bashundhara-brown-atta-1-kg.jpg', 0, 0, NULL, NULL, '2021-05-28 13:17:33', '2021-05-28 13:17:33'),
(4, 'Chashi Aromatic Chinigura Rice', 250.00, NULL, NULL, NULL, '2', 20, 'KC-0003', '1622229707_chashi-aromatic-chinigura-rice-2-kg.jpg', 0, 0, 'Chashi Aromatic Chinigura Rice', 'Chashi Aromatic Chinigura Rice', '2021-05-28 13:21:47', '2021-05-28 13:21:47'),
(5, 'Pran Nazirshail Rice', 405.00, 390.00, NULL, NULL, '5', 20, 'KC-0004', '1622230056_pran-nazirshail-rice-5-kg.jpg', 1, 0, 'Pran Nazirshail Rice', 'Pran Nazirshail Rice', '2021-05-28 13:27:36', '2021-05-28 13:27:36'),
(6, 'flour', 20.00, 15.00, '8', '12', '4', 14, 'cold', '1622298214_1.PNG', 0, 0, 'tasty', 'tasty', '2021-05-29 08:23:34', '2021-05-29 08:23:34'),
(7, 'flour', 20.00, 15.00, '8', '12', '13', 3, 'cold', '1622891243_children-studying-670663_1920.jpg', 0, 0, 'tasty', 'tasty', '2021-06-05 05:07:23', '2021-06-05 05:07:23'),
(8, 'knife', 20.00, 15.00, '8', '6', '4', 1, 'cold', '1624084201_knife.PNG', 1, 0, 'tasty', 'sharp', '2021-06-19 00:30:01', '2021-06-19 00:30:01'),
(9, 'knife', 20.00, 15.00, '8', '6', '4', 24, 'cold', '1624105036_knife.PNG', 0, 0, 'sharp', 'sharp', '2021-06-19 06:17:16', '2021-06-19 06:17:16'),
(10, 'knife', 20.00, 15.00, '8', '6', '4', 25, 'cold', '1624105193_knife.PNG', 1, 0, 'tasty', 'sharp', '2021-06-19 06:19:53', '2021-06-19 06:19:53'),
(11, 'orange', 20.00, 15.00, '8', '6', '4', 22, 'cold', '1624719826_children-studying-670663_1920.jpg', 1, 0, 'tasty', 'tasty', '2021-06-26 09:03:46', '2021-06-26 09:03:46'),
(12, 'orange', 20.00, 15.00, '8', '12', '4', 3, 'cold', '1624894441_mai.png', 1, 0, 'tasty', 'tasty', '2021-06-28 09:34:01', '2021-06-28 09:34:01');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `temp_orders`
--

CREATE TABLE `temp_orders` (
  `temp_order_row_id` int(10) UNSIGNED NOT NULL,
  `product_row_id` int(11) NOT NULL,
  `tracking_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_price` double(8,2) NOT NULL,
  `product_qty` int(11) NOT NULL,
  `product_total_price` double(8,2) NOT NULL,
  `order_status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0 = pending, 1 = submitted',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `temp_orders`
--

INSERT INTO `temp_orders` (`temp_order_row_id`, `product_row_id`, `tracking_number`, `product_price`, `product_qty`, `product_total_price`, `order_status`, `created_at`, `updated_at`) VALUES
(1, 11, '6ZAY6W1YSrdkOQuNAKnPbHxKoC1qEDTFb2rBVHwn', 15.00, 3, 45.00, 0, '2021-07-01 21:29:28', NULL);

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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'farhan', 'nil26566@gmail.com', NULL, '$2y$10$I.YA54ckSGQF23FoIvUc1euCnFB6d2jCh8dXG6Z67zxZOCijt2kru', NULL, '2021-04-09 09:30:34', '2021-04-09 09:30:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_row_id`);

--
-- Indexes for table `contact_infos`
--
ALTER TABLE `contact_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_row_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_row_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `temp_orders`
--
ALTER TABLE `temp_orders`
  ADD PRIMARY KEY (`temp_order_row_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_row_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `contact_infos`
--
ALTER TABLE `contact_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_row_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_row_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `temp_orders`
--
ALTER TABLE `temp_orders`
  MODIFY `temp_order_row_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
