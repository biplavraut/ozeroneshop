-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2020 at 06:17 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ozeroneshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_super` tinyint(1) NOT NULL DEFAULT 0,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'supdev',
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '#',
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '#',
  `github` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '#',
  `bio` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'profile.png',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `slug`, `email`, `email_verified_at`, `password`, `remember_token`, `current_team_id`, `profile_photo_path`, `is_super`, `type`, `facebook`, `instagram`, `github`, `bio`, `photo`, `created_at`, `updated_at`) VALUES
(1, 'Admin User', 'admin-user', 'admin@admin.com', NULL, '$2y$10$hQQqnGzpZL73e/D1I2EyAeSRgbMFP.Z0xhFvvhsImo6/Y8NxaGEL2', NULL, NULL, NULL, 0, 'admin', '#', '#', '#', 'I am admin user.', 'profile.png', '2020-10-24 10:47:17', '2020-10-29 06:41:02'),
(2, 'Biplav Raj Raut', 'biplav-raj-raut', 'biplavraut@gmail.com', NULL, '$2y$10$zBX0ZT602Q9yjvqDAQOaUOuCQMahTgTTTPP41vL9nD2IpmEyYaTj2', '3DncEP82UNjAcxxopH2zBFSZ8jaxQZEB3zQpsbMOChQ9vGgtqfxkqPsunRry', NULL, NULL, 0, 'supdev', '#', '#', '#', 'I am super developer.', 'profile.png', '2020-10-24 10:47:17', '2020-10-29 09:14:31'),
(9, 'Editor raj', 'editor-raj', 'editor@editor.com', NULL, '$2y$10$RiRj7dLchAWBgcpvVXU/G.0YyJbkaP7e8YA087RhnvRnHj2u1PUfm', NULL, NULL, NULL, 0, 'editor', '#', '#', '#', 'I am editor only', 'profile.png', '2020-10-29 04:16:02', '2020-10-29 09:01:38'),
(10, 'Ozerone Site Owner', 'ozerone-site-owner', 'owner@ozeroneshop.com', NULL, '$2y$10$F07ODS9/JQ5pYHJ2dmkUmulKVXXpHj09qyq93R6PKpizOp6zDm3Fq', NULL, NULL, NULL, 0, 'supadmin', '#', '#', '#', 'I am owner of ozerone shop.', 'profile.png', '2020-10-29 09:00:36', '2020-10-29 09:00:36'),
(11, 'Anish Shrestha', 'anish-shrestha', 'anish@ozeroneshop.com', NULL, '$2y$10$6iIykHk0AMnbp2EhwTAJEuirP5tAam7oBptp/h/QFHw1ev5rz6X/S', NULL, NULL, NULL, 0, 'supadmin', '#', '#', '#', 'I am Anish Shrestha. I am admin. Ozerone shop', 'profile.png', '2020-10-29 09:58:14', '2020-10-29 10:01:13'),
(12, 'User', 'user', 'user@ozeroneshop.com', NULL, '$2y$10$OM.5IeWW3Z4MZ4ECZxwqyuTRafhHsbWupXCuByhWnkSGXsMlj19pG', NULL, NULL, NULL, 0, 'user', '#', '#', '#', 'I am user', 'profile.png', '2020-10-29 10:02:04', '2020-10-29 10:02:04');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'no-image.png',
  `display` tinyint(4) NOT NULL DEFAULT 0,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_item` bigint(20) DEFAULT NULL,
  `meta_keywords` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_tags` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_categories` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `excerpt` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `slug`, `image`, `display`, `date`, `author`, `order_item`, `meta_keywords`, `meta_tags`, `meta_categories`, `excerpt`, `created_at`, `updated_at`) VALUES
(3, 'Ozerone', 'ozerone', 'ozerone.png', 1, '2020-10-26', 'Ozerone Shop', 1, 'electronics', 'electronics', 'eclectronics', '<p>aaa</p>', '2020-11-01 08:16:37', '2020-11-01 08:26:06');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `section_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'no-image.png',
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` tinyint(4) NOT NULL DEFAULT 0,
  `display` tinyint(4) NOT NULL DEFAULT 0,
  `parent_id` bigint(20) NOT NULL DEFAULT 0,
  `child` tinyint(4) NOT NULL DEFAULT 0,
  `order_item` bigint(20) DEFAULT NULL,
  `excerpt` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `section_id`, `title`, `slug`, `image`, `icon`, `type`, `display`, `parent_id`, `child`, `order_item`, `excerpt`, `created_at`, `updated_at`) VALUES
(1, 3, 'Huwai MI', 'huwai-mi', 'huwai-mi.png', '#', 1, 1, 2, 0, 2, '<p>sss</p>', '2020-10-31 05:38:38', '2020-10-31 11:33:56'),
(2, 3, 'Samsung', 'samsung', 'samsung.png', '#', 1, 1, 0, 1, 1, '<p>I am samsung</p>', '2020-10-31 05:48:42', '2020-10-31 11:33:56'),
(3, 2, 'MI TV', 'mi-tv', 'mi-tv.png', '#', 1, 1, 0, 0, 2, '<p>tv</p>', '2020-10-31 06:01:43', '2020-11-01 04:09:23'),
(4, 4, 'Refrigerator', 'refrigerator', 'refrigerator.png', 'fas fa-refrigerator', 1, 1, 0, 1, 1, '<p>Refrigerator</p>', '2020-10-31 07:03:26', '2020-10-31 11:19:31'),
(5, 4, 'LG', 'lg', 'lg.jpeg', '#', 1, 1, 4, 0, 2, '<p>aaa</p>', '2020-10-31 07:06:25', '2020-10-31 11:19:41'),
(6, 2, 'Samsung TV', 'samsung-tv', 'no-image.png', '#', 1, 1, 0, 0, 3, '<p>aa</p>', '2020-11-01 04:08:04', '2020-11-01 04:09:23'),
(7, 2, 'LG TV', 'lg-tv', 'lg-tv.png', '#', 1, 1, 0, 0, 1, '<p>asas</p>', '2020-11-01 04:09:08', '2020-11-01 04:09:23');

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
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display` tinyint(4) NOT NULL DEFAULT 0,
  `order_item` bigint(20) DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '#',
  `excerpt` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `title`, `slug`, `display`, `order_item`, `link`, `excerpt`, `created_at`, `updated_at`) VALUES
(1, 'How to place an order?', 'how-to-place-an-order', 1, 1, '#', '<ol><li>Select product</li><li>Add to cart</li><li>Place an Order</li><li>Pay cash on delivery</li></ol>', '2020-11-01 10:38:50', '2020-11-01 10:38:50');

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
(4, '2020_10_22_171351_create_admins_table', 1),
(5, '2020_10_24_160236_create_devmenus_table', 2),
(6, '2020_10_24_172640_create_seos_table', 3),
(7, '2016_06_01_000001_create_oauth_auth_codes_table', 4),
(8, '2016_06_01_000002_create_oauth_access_tokens_table', 4),
(9, '2016_06_01_000003_create_oauth_refresh_tokens_table', 4),
(10, '2016_06_01_000004_create_oauth_clients_table', 4),
(11, '2016_06_01_000005_create_oauth_personal_access_clients_table', 4),
(12, '2020_10_26_152828_create_sliders_table', 5),
(13, '2020_10_30_174259_create_shopsections_table', 6),
(14, '2020_10_31_083022_create_brands_table', 7),
(15, '2020_11_01_115611_create_blogs_table', 8),
(16, '2020_11_01_151734_create_partners_table', 9),
(17, '2020_11_01_155652_create_faqs_table', 10);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'Eb8wvcpENLqiGu1cMnj6o2o7iM7nIV0oTv8NfQpd', NULL, 'http://localhost', 1, 0, 0, '2020-10-24 17:58:45', '2020-10-24 17:58:45'),
(2, NULL, 'Laravel Password Grant Client', 'xCfgRlruL1PxFH5bErZEzJXZDs8po148m6u26Vve', 'users', 'http://localhost', 0, 1, 0, '2020-10-24 17:58:45', '2020-10-24 17:58:45');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2020-10-24 17:58:45', '2020-10-24 17:58:45');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `partners`
--

CREATE TABLE `partners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'no-image.png',
  `display` tinyint(4) NOT NULL DEFAULT 0,
  `order_item` bigint(20) DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '#',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `partners`
--

INSERT INTO `partners` (`id`, `title`, `slug`, `image`, `display`, `order_item`, `link`, `created_at`, `updated_at`) VALUES
(1, 'Pers Creation', 'pers-creation', 'pers-creation.png', 1, 1, 'www.perscreation.com', '2020-11-01 10:05:54', '2020-11-01 10:08:21');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('biplavraut@gmail.com', '$2y$10$Ym6XvNwpDhi8CIYE9BXl..whklpV9fXvwkZ4GL26g3sZPC/5oIbjO', '2020-11-01 02:36:47');

-- --------------------------------------------------------

--
-- Table structure for table `seos`
--

CREATE TABLE `seos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keyword` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `topic` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `summary` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `classification` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seos`
--

INSERT INTO `seos` (`id`, `title`, `keyword`, `subject`, `topic`, `summary`, `classification`, `category`, `excerpt`, `created_at`, `updated_at`) VALUES
(1, 'Ozerone shop Nepal, electronics shop in Nepal, online electrics shop', 'Ozerone shop Nepal, electronics shop in Nepal, online electrics shop', 'Ozerone shop Nepal, electronics shop in Nepal, online electrics shop', 'Ozerone shop Nepal, electronics shop in Nepal, online electrics shop', 'Ozerone shop Nepal, electronics shop in Nepal, online electrics shop', 'Ozerone shop Nepal, electronics shop in Nepal, online electrics shop', 'Ozerone shop Nepal, electronics shop in Nepal, online electrics shop', '<p>Ozerone shop Nepal, electronics shop in Nepal, online electrics shop, Online stores</p>', '2020-10-24 18:19:56', '2020-10-30 11:07:30');

-- --------------------------------------------------------

--
-- Table structure for table `shopsections`
--

CREATE TABLE `shopsections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'no-image.png',
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` tinyint(4) NOT NULL DEFAULT 0,
  `display` tinyint(4) NOT NULL DEFAULT 0,
  `child` tinyint(4) NOT NULL DEFAULT 0,
  `order_item` bigint(20) DEFAULT NULL,
  `excerpt` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shopsections`
--

INSERT INTO `shopsections` (`id`, `title`, `slug`, `image`, `icon`, `type`, `display`, `child`, `order_item`, `excerpt`, `created_at`, `updated_at`) VALUES
(2, 'Smart TV', 'smart-tv', 'smart-tv.png', 'fas fa-tv', 1, 1, 0, 1, '<p>This is Smart TV</p>', '2020-10-30 12:24:47', '2020-10-31 11:25:37'),
(3, 'Smart Phone', 'smart-phone', 'smart-phone.jpeg', 'fas fa-mobile', 1, 1, 0, 2, '<p>This is smart phone</p>', '2020-10-30 12:25:29', '2020-10-31 11:25:37'),
(4, 'Home Appliances', 'home-appliances', 'home-appliances.jpeg', 'fas fa-bath', 1, 1, 0, 3, '<p>This is home appliances.</p>', '2020-10-30 12:26:16', '2020-11-01 05:15:54');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'no-image.png',
  `display` tinyint(4) NOT NULL DEFAULT 0,
  `order_item` bigint(20) DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '#',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `sub_title`, `slug`, `image`, `display`, `order_item`, `link`, `created_at`, `updated_at`) VALUES
(8, 'Ozerone shop', 'aa', 'ozerone-shop', 'ozerone-shop.jpeg', 1, 1, '#', '2020-11-01 05:48:31', '2020-11-01 05:48:31');

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
  `is_customer` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `is_customer`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Biplav Raj Raut', 'biplavraut@gmail.com', NULL, '$2y$10$zBX0ZT602Q9yjvqDAQOaUOuCQMahTgTTTPP41vL9nD2IpmEyYaTj2', 0, 'VfckbXzbjEbccXwuUerEotGJKGO6m6UDFw8sgn9cM7sgCNaJwqGBTqtFAXWP', '2020-10-22 18:23:23', '2020-10-22 18:23:23'),
(2, 'User', 'user@user.com', NULL, '$2y$10$dJNiQNwSfikHaF23dFBhluXW5Yhb1upIjQyWYqYeVKYHFrxPbKRPO', 0, NULL, '2020-10-24 09:47:21', '2020-10-24 09:47:21'),
(3, 'Ram Thakur', 'ram@thakur.com', NULL, '$2y$10$PBGBB57e4dS7ztJBNxv7wePkwHLbhZjC4.EmpJEkzLVlb06g8Bffa', 0, NULL, '2020-10-25 08:49:02', '2020-10-25 08:49:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`),
  ADD UNIQUE KEY `admins_slug_unique` (`slug`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `blogs_slug_unique` (`slug`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `brands_slug_unique` (`slug`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `faqs_slug_unique` (`slug`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `partners`
--
ALTER TABLE `partners`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `partners_slug_unique` (`slug`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `seos`
--
ALTER TABLE `seos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shopsections`
--
ALTER TABLE `shopsections`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `shopsections_slug_unique` (`slug`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sliders_slug_unique` (`slug`);

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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `partners`
--
ALTER TABLE `partners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `seos`
--
ALTER TABLE `seos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `shopsections`
--
ALTER TABLE `shopsections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
