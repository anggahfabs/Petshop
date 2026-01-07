-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 07, 2026 at 12:59 AM
-- Server version: 8.4.3
-- PHP Version: 8.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `petshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pet_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pet_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `appointment_date` datetime NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci,
  `status` enum('pending','confirmed','completed','cancelled') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `name`, `email`, `phone`, `pet_name`, `pet_type`, `appointment_date`, `note`, `status`, `created_at`, `updated_at`) VALUES
(1, 'book', 'awd@book.com', '123781237', 'simba', 'Cat', '2025-12-30 22:34:00', 'tester', 'pending', '2025-12-30 08:33:45', '2026-01-01 17:24:43');

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `published_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `title`, `slug`, `excerpt`, `content`, `thumbnail`, `is_active`, `published_at`, `created_at`, `updated_at`) VALUES
(1, 'Daily Nutrition for a Healthy Cat', 'daily-nutrition-for-a-healthy-cat', 'Balanced nutrition is the foundation of a healthy cat. This article explains how proper food choices, vitamins, and feeding routines help maintain ene...', 'Balanced nutrition is the foundation of a healthy cat. This article explains how proper food choices, vitamins, and feeding routines help maintain energy, digestion, and immunity at every life stage.', 'articles/Hd3CqeSceplgHVj8tmjiM2EC9989rrU4a6t8NE1F.jpg', 1, NULL, '2025-12-30 08:06:22', '2025-12-30 21:04:22'),
(2, 'Choosing the Right Accessories for Your Cat', 'choosing-the-right-accessories-for-your-cat', 'Choosing the right accessories improves your cat’s comfort and safety. Learn how to select collars, bowls, beds, and toys that are practical, durable,...', 'Choosing the right accessories improves your cat’s comfort and safety. Learn how to select collars, bowls, beds, and toys that are practical, durable, and suitable for daily indoor use.', 'articles/zxzAQ3r9pTpunFW5qLXIxzkm9TbEL3zgMRdwdorx.jpg', 1, NULL, '2025-12-30 21:05:45', '2025-12-30 21:05:45'),
(3, 'Safe Use of Cat Medicines', 'safe-use-of-cat-medicines', 'Medicines for cats must be given carefully and correctly. This article covers common cat medicines, their functions, and important tips to ensure safe...', 'Medicines for cats must be given carefully and correctly. This article covers common cat medicines, their functions, and important tips to ensure safe and effective treatment.', 'articles/gemISItm3unnpNGxiknTwY0pqQ8HtFw1LjtVAGqX.jpg', 1, NULL, '2025-12-30 21:06:48', '2026-01-01 17:25:58');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `slug`, `logo`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Whiskas', 'whiskas', 'brands/nLcpfzZFowVIwTCpwK6a3MzBqC028kGf5Yea4iIe.png', 1, '2025-12-30 09:02:53', '2025-12-30 19:39:15'),
(3, 'Royal Canin', 'royal-canin', 'brands/qxLajGnep392Ii1IX2idBuFBZnYiAXwdXFZQkRtN.png', 1, '2025-12-30 19:41:28', '2025-12-30 19:41:28'),
(4, 'Pro Plan', 'pro-plan', 'brands/3t7tZmQ5c7rXb1nESsze14UDEe9gCbKbwJyfB5iP.png', 1, '2025-12-30 19:42:52', '2025-12-30 19:43:25'),
(5, 'Frieskies', 'frieskies', 'brands/cIC1gcuX1ToXwIIFaIl3chDmpbE2kRqDNvwQINM2.png', 1, '2025-12-30 19:44:16', '2025-12-30 19:44:16');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Dry Food', 'dry-food', NULL, 1, '2025-12-30 08:46:00', '2026-01-01 16:36:17'),
(2, 'Wet Food', 'wet-food', NULL, 1, '2025-12-30 19:10:07', '2026-01-01 16:36:09');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `created_at`, `updated_at`, `title`, `description`, `logo`, `is_active`) VALUES
(2, '2025-12-30 09:32:40', '2025-12-30 20:54:57', 'Gmail', 'ovi@petshop.test', 'contacts/t3syAcDbklKcqPmC6G2rdB8tix4y0LsUhvvNK43M.jpg', 1),
(4, '2026-01-01 17:23:08', '2026-01-01 17:23:08', 'Whatsapp', '+62 851 5678 9012', 'contacts/mupKc0tQBQhoxwTqMFsvu3ppGxzecAHRGv8F1BYy.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contact_messages`
--

CREATE TABLE `contact_messages` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_messages`
--

INSERT INTO `contact_messages` (`id`, `name`, `email`, `phone`, `message`, `is_read`, `created_at`, `updated_at`) VALUES
(1, 'test new', 'test@petshop.com', '123123', 'test new', 1, '2025-12-30 09:33:42', '2026-01-01 17:01:01');

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `caption` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `image`, `caption`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'galleries/BAnQkBQVwCuBy5SWu8Ne15Bd7b6cYmLdsrUq45hr.jpg', '-', 1, '2025-12-30 07:43:33', '2025-12-30 20:58:58'),
(2, 'galleries/Doq5LZoF73FMrEdAjquQXftWSVUIE7VagRG6BJ8H.jpg', '-', 1, '2025-12-30 20:59:21', '2025-12-30 20:59:21'),
(3, 'galleries/NjiLIA0debwiX6VPFCMGOSZW1pllnPc9vo6Ewwdx.jpg', '-', 1, '2025-12-30 20:59:32', '2025-12-30 20:59:32'),
(4, 'galleries/EzivRicN8VZfLZ9ZNujrnGj6eBIBBKc6Y4y9vVSU.jpg', NULL, 1, '2025-12-30 20:59:40', '2026-01-01 16:47:06');

-- --------------------------------------------------------

--
-- Table structure for table `heroes`
--

CREATE TABLE `heroes` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtitle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `heroes`
--

INSERT INTO `heroes` (`id`, `title`, `subtitle`, `button_text`, `button_link`, `image`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Pamper Your Cat with Love', 'High-quality cat accessories and treats for your furry friend.', 'awd', 'awd', 'heroes/TGcpAc8ZGM7szI8jpqT293qdL7F7wDJ9Jm6mZQeV.jpg', 1, '2025-12-29 19:55:41', '2025-12-30 18:58:12'),
(4, 'Healthy & Happy Cats', 'Nutritious food and vitamins to keep your cat energetic and strongss', NULL, NULL, 'heroes/rf9luO0ovEbUODN1zOoilHRe66pxzr5YGDO46XNR.jpg', 1, '2025-12-30 19:17:55', '2026-01-04 02:27:51');

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
(1, '2025_12_29_002159_create_users_table', 1),
(2, '2025_12_29_002200_create_password_reset_tokens_table', 1),
(3, '2025_12_29_002200_create_sessions_table', 1),
(4, '2025_12_30_023251_create_heroes_table', 2),
(5, '2025_12_30_023932_create_services_table', 3),
(6, '2025_12_30_023936_create_products_table', 3),
(7, '2025_12_30_023940_create_articles_table', 3),
(8, '2025_12_30_024011_create_galleries_table', 3),
(9, '2025_12_30_024017_create_site_settings_table', 3),
(10, '2025_12_30_024226_create_contacts_table', 3),
(11, '2025_12_30_052648_add_description_to_products_table', 4),
(12, '2025_12_30_145640_create_appointments_table', 5),
(13, '2025_12_30_153849_create_categories_table', 6),
(14, '2025_12_30_153856_add_category_id_to_products_table', 6),
(15, '2025_12_30_155517_create_brands_table', 7),
(16, '2025_12_30_155615_add_brand_id_to_products_table', 7),
(17, '2025_12_30_162514_create_contact_messages_table', 8),
(18, '2025_12_30_162537_modify_contacts_table_for_info', 8),
(19, '2025_12_30_171152_create_subscribers_table', 9),
(20, '2025_12_31_021715_modify_heroes_table_make_buttons_nullable', 10);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('admin@petshop.test', '$2y$12$XxfFmnd4XYBCm4BLdtrUJ.NjLV0yakaTHk37wvLiCj3CuGITX4/7G', '2025-12-29 05:31:21');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `price` decimal(12,2) NOT NULL DEFAULT '0.00',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `category_id` bigint UNSIGNED DEFAULT NULL,
  `brand_id` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `slug`, `description`, `price`, `image`, `is_active`, `created_at`, `updated_at`, `category_id`, `brand_id`) VALUES
(5, 'Royal Canin (Kitten)', 'royal-canin-kitten', 'Royal Canin bla bla bla bla', 100000.00, 'products/DEp6tr96fiXSuRxPNzLktFDeUKsIgjvibd6U7TdF.jpg', 1, '2025-12-30 21:26:00', '2025-12-30 21:26:00', 1, 3),
(6, 'Whiskas (Kitten)', 'whiskas-kitten', 'Whiskas bla bla bla bla', 25000.00, 'products/SwvQWJeGrOjVduEM3O7HLFddYEuvVMgc2XAEBVqi.jpg', 1, '2025-12-30 21:27:17', '2026-01-01 16:41:35', 1, 1),
(7, 'Friskies (Kitten)', 'friskies-kitten', 'Friskies wet food bla bla bla', 15000.00, 'products/kvt1HEYNCIY4K7DsskTjU90BIilfYiqbY2k2Rc1X.jpg', 1, '2025-12-30 21:29:26', '2025-12-30 21:29:26', 2, 5),
(8, 'Proplan', 'proplan', 'Proplan bla bla bla bka', 199000.00, 'products/4oI6a5UDq6hmsHNnE0vJRc5ROLuWBLmhlo0U2Zyq.jpg', 1, '2025-12-30 21:31:18', '2025-12-30 21:31:18', 1, 4),
(9, 'Whiskas', 'whiskas', 'Whiskas bla bla bla', 15000.00, 'products/oH2oZlG4wQuMObpxWzRZOhMP8SiXicvcx8yhkEEx.jpg', 1, '2025-12-30 21:32:16', '2025-12-30 21:32:27', 2, 1),
(10, 'Frieskies', 'frieskies', 'Frieskies bla bla bla', 150000.00, 'products/2V0eoXN97KcGuPzPme9Xt276FpP8TH8ZC78yYDgq.jpg', 1, '2025-12-30 21:33:32', '2025-12-30 21:33:32', 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `slug`, `description`, `image`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Vitamins & Supplements', '3', 'We supply trusted vitamins and supplements to help maintain your cat’s health, support growth, recovery, and overall well-being.', 'services/ZBQmw9ddvduAVDPhJeruduGxd0MjuUhpfFNn3FjT.jpg', 1, '2025-12-29 20:52:49', '2025-12-30 21:13:53'),
(2, 'Premium Cat Food', '2', 'Our store offers quality cat food made to support healthy digestion, strong immunity, and balanced nutrition for cats at every life stage.', 'services/fvKHhv4MuSsA0fQfoEVNJpGxMR1rqv4lFth65cLa.jpg', 1, '2025-12-29 20:56:23', '2025-12-30 21:12:26'),
(3, 'Cat Accessories Shop', 'cat-accessories-shop', 'We provide carefully selected cat accessories, including bowls, collars, beds, and toys designed to improve comfort, safety, and daily activities for indoor and outdoor cats.', 'services/tNtaAOdAcOUswsOT20ZtXHcOxo9VPHla9LLeugYs.jpg', 1, '2025-12-29 20:58:33', '2025-12-30 21:16:18'),
(4, 'Cat Medicines', 'cat-medicines', 'Essential cat medicines are available to help manage common health issues safely, with products selected to meet standard pet care needs.', 'services/lBusDUrFne4WSmM7S08TPfq7esKIWuXnuylTXuEd.jpg', 1, '2025-12-30 21:18:04', '2025-12-30 21:18:04');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('f81M9cxjsC28KVdnSRp4G44jf9vS5Tyit2muKSUo', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiUW1jQm1CTWhKTkZxVXc5MGJnbzNqcmh5a1JNSnZLcUVZQmRVM0dPOSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9oZXJvZXMiO3M6NToicm91dGUiO3M6MTg6ImFkbWluLmhlcm9lcy5pbmRleCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MzoidXJsIjthOjE6e3M6ODoiaW50ZW5kZWQiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbiI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1767518468),
('JKZTG6aQEFuF31VeCsRotsgBzPEJoiRn117ZN3t0', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoicVZFMlhURm9VZDRGc2dldGZWOHlQNEdWYkpraUVQbWNlNmZFcWgyNyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyNzoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2FkbWluIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1767518891);

-- --------------------------------------------------------

--
-- Table structure for table `site_settings`
--

CREATE TABLE `site_settings` (
  `id` bigint UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` bigint UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `email`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'dwikifelisha@gmail.com', 1, '2025-12-30 10:21:22', '2025-12-30 10:21:22'),
(2, 'angga@gmail.com', 1, '2026-01-01 15:50:58', '2026-01-01 15:50:58');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
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
(1, 'Admin', 'admin@petshop.test', NULL, '$2y$12$/IorzBFEMbolcijjgndmte1Pp3Y/mGek6fVDX1CI29PhJZqQVgPrG', NULL, '2025-12-28 17:26:20', '2025-12-28 17:26:20'),
(2, 'angga', 'angga@petshop.test', NULL, '$2y$12$JDrR134UqWOcWhxyHRpsTOCxpYTSzsOiv5wPLYqjGLyJNrR8RLNG.', NULL, '2025-12-29 05:41:05', '2025-12-29 05:41:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `articles_slug_unique` (`slug`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `brands_slug_unique` (`slug`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `heroes`
--
ALTER TABLE `heroes`
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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_slug_unique` (`slug`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_brand_id_foreign` (`brand_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `services_slug_unique` (`slug`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `site_settings`
--
ALTER TABLE `site_settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `site_settings_key_unique` (`key`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subscribers_email_unique` (`email`);

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
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `heroes`
--
ALTER TABLE `heroes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `site_settings`
--
ALTER TABLE `site_settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
