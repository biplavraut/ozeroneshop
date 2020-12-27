-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 26, 2020 at 05:57 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
  `profile_photo_path` text COLLATE utf8mb4_unicode_ci,
  `is_super` tinyint(1) NOT NULL DEFAULT '0',
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'supdev',
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '#',
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '#',
  `github` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '#',
  `bio` mediumtext COLLATE utf8mb4_unicode_ci,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'profile.png',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `slug`, `email`, `email_verified_at`, `password`, `remember_token`, `current_team_id`, `profile_photo_path`, `is_super`, `type`, `facebook`, `instagram`, `github`, `bio`, `photo`, `created_at`, `updated_at`) VALUES
(1, 'Admin User', 'admin-user', 'admin@admin.com', NULL, '$2y$10$hQQqnGzpZL73e/D1I2EyAeSRgbMFP.Z0xhFvvhsImo6/Y8NxaGEL2', NULL, NULL, NULL, 0, 'admin', '#', '#', '#', 'I am admin user.', 'profile.png', '2020-10-24 10:47:17', '2020-10-29 06:41:02'),
(2, 'Biplav Raj Raut', 'biplav-raj-raut', 'biplavraut@gmail.com', NULL, '$2y$10$zBX0ZT602Q9yjvqDAQOaUOuCQMahTgTTTPP41vL9nD2IpmEyYaTj2', 'AehJraSGD6BZ42bA0Pldt27CxBM9q6zXyF8MmushLe6tutvNE7CthgCjpVoW', NULL, NULL, 0, 'supdev', '#', '#', '#', 'I am super developer.', '1.jpg', '2020-10-24 10:47:17', '2020-10-29 09:14:31'),
(9, 'Editor raj', 'editor-raj', 'editor@editor.com', NULL, '$2y$10$RiRj7dLchAWBgcpvVXU/G.0YyJbkaP7e8YA087RhnvRnHj2u1PUfm', NULL, NULL, NULL, 0, 'editor', '#', '#', '#', 'I am editor only', 'profile.png', '2020-10-29 04:16:02', '2020-10-29 09:01:38'),
(10, 'Ozerone Site Owner', 'ozerone-site-owner', 'owner@ozeroneshop.com', NULL, '$2y$10$F07ODS9/JQ5pYHJ2dmkUmulKVXXpHj09qyq93R6PKpizOp6zDm3Fq', NULL, NULL, NULL, 0, 'supadmin', '#', '#', '#', 'I am owner of ozerone shop.', 'profile.png', '2020-10-29 09:00:36', '2020-10-29 09:00:36'),
(11, 'Anish Shrestha', 'anish-shrestha', 'anish@ozeroneshop.com', NULL, '$2y$10$oJ/PYfGPempRDX2cedlQdOny9IrkM54y85Wzg7buCOwAnvsWpAYZm', NULL, NULL, NULL, 0, 'supadmin', '#', '#', '#', 'I am Anish Shrestha. I am admin. Ozerone shop', 'profile.png', '2020-10-29 09:58:14', '2020-11-01 11:37:08'),
(12, 'User', 'user', 'user@ozeroneshop.com', NULL, '$2y$10$OM.5IeWW3Z4MZ4ECZxwqyuTRafhHsbWupXCuByhWnkSGXsMlj19pG', NULL, NULL, NULL, 0, 'user', '#', '#', '#', 'I am user', 'profile.png', '2020-10-29 10:02:04', '2020-10-29 10:02:04');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'no-image.png',
  `display` tinyint(4) NOT NULL DEFAULT '0',
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_item` bigint(20) DEFAULT NULL,
  `meta_keywords` longtext COLLATE utf8mb4_unicode_ci,
  `meta_tags` longtext COLLATE utf8mb4_unicode_ci,
  `meta_categories` longtext COLLATE utf8mb4_unicode_ci,
  `excerpt` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `slug`, `brand`, `image`, `display`, `date`, `author`, `order_item`, `meta_keywords`, `meta_tags`, `meta_categories`, `excerpt`, `created_at`, `updated_at`) VALUES
(7, 'Ozerone Shop', 'ozerone-shop', 17, 'ozerone-shop.jpeg', 1, '2020-12-09', 'Ozzerone shop', 4, 'electronics', 'electronics', 'electronics', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut tincidunt convallis arcu, ac laoreet tortor aliquet sit amet. Etiam ut facilisis sem, eget consequat purus. Pellentesque quis justo sed felis laoreet faucibus. Duis a ex nec massa pulvinar iaculis in vel elit. Vivamus non lacus non ante aliquam porttitor nec et diam. Nullam nunc ex, auctor non ipsum nec, varius hendrerit eros. Maecenas porta diam justo, sed sollicitudin neque volutpat ac. Nulla et sodales tellus. Aliquam laoreet purus in semper facilisis. Pellentesque iaculis scelerisque condimentum. Vivamus quis venenatis odio. Phasellus ex risus, commodo ut gravida eu, malesuada in mi. Phasellus lobortis metus elit, non consectetur nisl fermentum nec. Aliquam sed nisi leo.</p>', '2020-12-16 11:32:07', '2020-12-16 12:11:26'),
(8, 'iPhone 11', 'iphone-11', 8, 'iphone-11.png', 1, '2020-12-01', 'Apple Inc.', 5, 'electronics', 'electronics', 'electronics', '<ul><li>Liquid Retina HD display</li><li>6.1‑inch (diagonal) all-screen LCD Multi-Touch display with IPS technology</li><li>1792‑by‑828‑pixel resolution at 326 ppi</li><li>1400:1 contrast ratio (typical)</li><li>True Tone display</li><li>Wide color display (P3)</li><li>Haptic Touch</li><li>625 nits max brightness (typical)</li><li>Fingerprint‑resistant oleophobic coating</li><li>Support for display of multiple languages and characters&nbsp;simultaneously</li></ul><p>The iPhone 11 display has rounded corners that follow a beautiful curved design, and these corners are within a standard rectangle. When measured as a standard rectangular shape, the screen is 6.06 inches diagonally (actual viewable area is less).</p>', '2020-12-16 12:15:42', '2020-12-16 12:15:42');

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
  `type` tinyint(4) NOT NULL DEFAULT '0',
  `display` tinyint(4) NOT NULL DEFAULT '0',
  `parent_id` bigint(20) NOT NULL DEFAULT '0',
  `child` tinyint(4) NOT NULL DEFAULT '0',
  `order_item` bigint(20) DEFAULT NULL,
  `excerpt` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `section_id`, `title`, `slug`, `image`, `icon`, `type`, `display`, `parent_id`, `child`, `order_item`, `excerpt`, `created_at`, `updated_at`) VALUES
(1, 3, 'Xiaomi', 'xiaomi', 'xiaomi.svg', '#', 1, 1, 0, 0, 3, '<p>sss</p>', '2020-10-31 05:38:38', '2020-12-16 10:22:19'),
(2, 3, 'Samsung', 'samsung', 'samsung.svg', '#', 1, 1, 0, 0, 2, '<p>I am samsung Brand</p>', '2020-10-31 05:48:42', '2020-12-16 10:22:19'),
(8, 5, 'Apple', 'apple', 'apple.svg', 'fas fa-apple', 1, 1, 0, 0, 1, '<p>This is Apple</p>', '2020-11-05 10:45:19', '2020-12-16 10:22:19'),
(17, 0, 'Ozerone', 'ozerone', 'ozerone.svg', '#', 1, 1, 0, 0, 4, '<p>da SDa </p>', '2020-12-16 11:11:08', '2020-12-16 11:11:08');

-- --------------------------------------------------------

--
-- Table structure for table `electronics`
--

CREATE TABLE `electronics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `section_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'no-image.png',
  `icon` text COLLATE utf8mb4_unicode_ci,
  `type` tinyint(4) NOT NULL DEFAULT '0',
  `display` tinyint(4) NOT NULL DEFAULT '0',
  `parent_id` bigint(20) NOT NULL DEFAULT '0',
  `child` tinyint(4) NOT NULL DEFAULT '0',
  `order_item` bigint(20) DEFAULT NULL,
  `excerpt` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `electronics`
--

INSERT INTO `electronics` (`id`, `section_id`, `title`, `slug`, `image`, `icon`, `type`, `display`, `parent_id`, `child`, `order_item`, `excerpt`, `created_at`, `updated_at`, `user_id`) VALUES
(1, 6, 'Smart Phone', 'smart-phone', 'smart-phone.svg', 'fas fa-phone', 1, 1, 0, 0, 3, '<p>aa</p>', '2020-11-06 04:10:00', '2020-12-22 11:02:57', 0),
(4, 6, 'Smart TV', 'smart-tv', 'smart-tv.svg', 'fas fa-tv', 1, 1, 0, 1, 1, '<p>TV</p>', '2020-11-06 05:45:29', '2020-12-22 11:02:57', 0),
(5, 6, '3D TV', '3d-tv', '3d-tv.svg', 'fas fa-tv', 1, 1, 4, 0, 2, '<p>TV 3D</p>', '2020-11-06 05:45:58', '2020-12-22 11:02:57', 0),
(6, 6, 'Laptops and PCs', 'laptops-and-pcs', 'laptops-and-pcs.svg', 'fas fa-apple', 1, 1, 0, 0, 4, '<p>ss</p>', '2020-11-06 07:24:22', '2020-12-22 11:02:57', 0),
(9, 6, 'Refrigerator', 'refrigerator', 'refrigerator.svg', 'fas fa-apple', 1, 1, 0, 0, 5, '<p> asdasa</p>', '2020-12-16 10:04:19', '2020-12-22 11:02:57', 0);

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
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display` tinyint(4) NOT NULL DEFAULT '0',
  `order_item` bigint(20) DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '#',
  `excerpt` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `title`, `slug`, `display`, `order_item`, `link`, `excerpt`, `created_at`, `updated_at`) VALUES
(1, 'How to place an order?', 'how-to-place-an-order', 1, 2, '#', '<ol><li>Select product</li><li>Add to cart</li><li>Place an Order</li><li>Pay cash on delivery</li></ol>', '2020-11-01 10:38:50', '2020-11-21 11:19:54'),
(3, 'What are payment options?', 'what-are-payment-options', 1, 1, '#', '<p>Cash on delivery.</p>', '2020-11-21 05:27:18', '2020-12-24 12:09:13');

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
(17, '2020_11_01_155652_create_faqs_table', 10),
(18, '2020_11_06_085816_create_electronics_table', 11),
(21, '2020_11_12_165004_create_product__colors_table', 13),
(22, '2020_11_12_165624_create_product__storages_table', 13),
(23, '2020_11_12_165759_create_product__images_table', 13),
(24, '2020_11_12_170012_create_product__details_table', 13),
(25, '2020_11_08_075640_create_products_table', 14),
(26, '2020_12_18_113230_create_product__sections_table', 15),
(27, '2020_12_18_153906_create_product__electronics_table', 16);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
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
  `scopes` text COLLATE utf8mb4_unicode_ci,
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
  `display` tinyint(4) NOT NULL DEFAULT '0',
  `order_item` bigint(20) DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '#',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `partners`
--

INSERT INTO `partners` (`id`, `title`, `slug`, `image`, `display`, `order_item`, `link`, `created_at`, `updated_at`) VALUES
(1, 'Pers Creation', 'pers-creation', 'pers-creation.png', 1, 2, 'www.perscreation.com', '2020-11-01 10:05:54', '2020-11-21 04:37:40'),
(3, 'Test Partner', 'test-partner', 'test-partner.png', 1, 1, 'www.perscreation.com', '2020-11-21 04:25:10', '2020-11-21 04:37:40');

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
('biplavraut@gmail.com', '$2y$10$6jjzUlGGd79JnJYlTa8wSe6J0h4Zd6/zxjg5H3FFk5Px0ZKTGZT9W', '2020-12-24 02:55:45');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `display` tinyint(4) DEFAULT '0',
  `featured` tinyint(4) DEFAULT '0',
  `order_item` bigint(20) DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount` int(11) DEFAULT '0',
  `total_quantity` int(11) DEFAULT '0',
  `brand` longtext COLLATE utf8mb4_unicode_ci,
  `sub_brand` longtext COLLATE utf8mb4_unicode_ci,
  `shop_category` longtext COLLATE utf8mb4_unicode_ci,
  `screen_detail` text COLLATE utf8mb4_unicode_ci,
  `operating_system` text COLLATE utf8mb4_unicode_ci,
  `main_camera` text COLLATE utf8mb4_unicode_ci,
  `selfie_camera` text COLLATE utf8mb4_unicode_ci,
  `sensor` text COLLATE utf8mb4_unicode_ci,
  `battery` text COLLATE utf8mb4_unicode_ci,
  `excerpt` longtext COLLATE utf8mb4_unicode_ci,
  `meta_keywords` longtext COLLATE utf8mb4_unicode_ci,
  `meta_tags` longtext COLLATE utf8mb4_unicode_ci,
  `meta_categories` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `slug`, `sku`, `model`, `display`, `featured`, `order_item`, `price`, `discount`, `total_quantity`, `brand`, `sub_brand`, `shop_category`, `screen_detail`, `operating_system`, `main_camera`, `selfie_camera`, `sensor`, `battery`, `excerpt`, `meta_keywords`, `meta_tags`, `meta_categories`, `created_at`, `updated_at`) VALUES
(1, 'Samsung Galaxy A21s', 'samsung-galaxy-a21s', 'product-1', 'Galaxy A21s', 1, 1, 2, '222222', 6, 8, '{\"id\":1,\"section_id\":3,\"title\":\"Xiaomi\",\"slug\":\"xiaomi\",\"image\":\"xiaomi.svg\",\"icon\":\"#\",\"type\":1,\"display\":1,\"parent_id\":0,\"child\":0,\"order_item\":3,\"excerpt\":\"<p>sss<\\/p>\",\"created_at\":\"2020-10-31T11:23:38.000000Z\",\"updated_at\":\"2020-12-16T16:07:19.000000Z\",\"children\":[]}', '{\"id\":9,\"section_id\":5,\"title\":\"Mac Book\",\"slug\":\"mac-book\",\"image\":\"mac-book.png\",\"icon\":\"fas fa-laptop\",\"type\":1,\"display\":1,\"parent_id\":8,\"child\":0,\"order_item\":5,\"excerpt\":\"<p>aaa<\\/p>\",\"created_at\":\"2020-11-05T16:31:35.000000Z\",\"updated_at\":\"2020-11-10T11:57:48.000000Z\",\"children\":[]}', '[{\"id\":1,\"section_id\":6,\"title\":\"Smart Phone\",\"slug\":\"smart-phone\",\"image\":\"smart-phone.png\",\"icon\":\"fas fa-phone\",\"type\":1,\"display\":1,\"parent_id\":0,\"child\":0,\"order_item\":1,\"excerpt\":\"<p>aa<\\/p>\",\"created_at\":\"2020-11-06T09:55:00.000000Z\",\"updated_at\":\"2020-11-08T07:39:05.000000Z\",\"user_id\":0}]', '6x12, 4k', 'Android 11.2', '25mp', '12mp', 'face', '4400 mAh', '<p>मोबाइलको प्याक नखोलिएको सील प्याक थियो, भनेको समय भन्दा पहिले नै आईपुग्यो । Galaxy S20FE को सबै फीचर्स S20 र S20+ भन्दा कम छैनन । Samsung ले Curve Edge ल्याए देखि यसको मोबाइल किन्न छोड़ी सकेको थिएँ, तर यसको flat screen ले गर्दा नै किनेको हो, मन पर्यो</p>', 'electronics phone', 'electronics', 'eclectronics', '2020-11-13 01:51:36', '2020-12-24 05:42:54'),
(2, 'Apple iPhone 11', 'apple-iphone-11', 'apple-iphone-11', '11 Pro', 1, 1, 3, '22000', 0, 3, '{\"id\":8,\"section_id\":5,\"title\":\"Apple\",\"slug\":\"apple\",\"image\":\"apple.png\",\"icon\":\"fas fa-apple\",\"type\":1,\"display\":1,\"parent_id\":0,\"child\":1,\"order_item\":4,\"excerpt\":\"<p>This is Apple<\\/p>\",\"created_at\":\"2020-11-05T16:30:19.000000Z\",\"updated_at\":\"2020-11-10T11:57:48.000000Z\",\"children\":[{\"id\":9,\"section_id\":5,\"title\":\"Mac Book\",\"slug\":\"mac-book\",\"image\":\"mac-book.png\",\"icon\":\"fas fa-laptop\",\"type\":1,\"display\":1,\"parent_id\":8,\"child\":0,\"order_item\":5,\"excerpt\":\"<p>aaa<\\/p>\",\"created_at\":\"2020-11-05T16:31:35.000000Z\",\"updated_at\":\"2020-11-10T11:57:48.000000Z\",\"children\":[]}]}', NULL, '[{\"id\":1,\"section_id\":6,\"title\":\"Smart Phone\",\"slug\":\"smart-phone\",\"image\":\"smart-phone.png\",\"icon\":\"fas fa-phone\",\"type\":1,\"display\":1,\"parent_id\":0,\"child\":0,\"order_item\":1,\"excerpt\":\"<p>aa<\\/p>\",\"created_at\":\"2020-11-06T09:55:00.000000Z\",\"updated_at\":\"2020-11-08T07:39:05.000000Z\",\"user_id\":0},{\"id\":6,\"section_id\":6,\"title\":\"Laptops and PCs\",\"slug\":\"laptops-and-pcs\",\"image\":\"laptops-and-pcs.svg\",\"icon\":\"fas fa-apple\",\"type\":1,\"display\":1,\"parent_id\":0,\"child\":0,\"order_item\":6,\"excerpt\":\"<p>ss<\\/p>\",\"created_at\":\"2020-11-06T13:09:22.000000Z\",\"updated_at\":\"2020-12-18T11:44:29.000000Z\",\"user_id\":0}]', '6x12, 4k', 'ios', '25mp', '12mp', 'face', '4400 mAh', '<p>sss</p>', 'electronics', 'electronics', 'eclectronics', '2020-11-13 11:01:53', '2020-12-18 10:52:11'),
(12, 'Oppo Phone', 'oppo-phone', 'oppo-phone', 'note', 1, 1, 4, '33200', 6, 10, '{\"id\":1,\"section_id\":3,\"title\":\"Huwai MI\",\"slug\":\"huwai-mi\",\"image\":\"huwai-mi.png\",\"icon\":\"#\",\"type\":1,\"display\":1,\"parent_id\":0,\"child\":0,\"order_item\":2,\"excerpt\":\"<p>sss<\\/p>\",\"created_at\":\"2020-10-31T11:23:38.000000Z\",\"updated_at\":\"2020-11-10T11:57:48.000000Z\",\"children\":[]}', NULL, '[{\"id\":1,\"section_id\":6,\"title\":\"Smart Phone\",\"slug\":\"smart-phone\",\"image\":\"smart-phone.png\",\"icon\":\"fas fa-phone\",\"type\":1,\"display\":1,\"parent_id\":0,\"child\":0,\"order_item\":1,\"excerpt\":\"<p>aa<\\/p>\",\"created_at\":\"2020-11-06T09:55:00.000000Z\",\"updated_at\":\"2020-11-08T07:39:05.000000Z\",\"user_id\":0}]', '6x12, 4k', 'Android 11.2', '25mp', '12mp', 'face', '4400 mAh', '<p>This is description.</p>', 'electronics', 'electronics', 'eclectronics', '2020-11-14 11:18:25', '2020-12-18 12:26:14'),
(13, 'Product 2', 'product-2', 'product-2', NULL, 0, 0, 1, NULL, 0, 0, NULL, NULL, '[{\"id\":5,\"section_id\":6,\"title\":\"3D TV\",\"slug\":\"3d-tv\",\"image\":\"3d-tv.svg\",\"icon\":\"fas fa-tv\",\"type\":1,\"display\":1,\"parent_id\":4,\"child\":0,\"order_item\":3,\"excerpt\":\"<p>TV 3D<\\/p>\",\"created_at\":\"2020-11-06T11:30:58.000000Z\",\"updated_at\":\"2020-12-16T16:32:10.000000Z\",\"user_id\":0},{\"id\":4,\"section_id\":6,\"title\":\"Smart TV\",\"slug\":\"smart-tv\",\"image\":\"smart-tv.svg\",\"icon\":\"fas fa-tv\",\"type\":1,\"display\":1,\"parent_id\":0,\"child\":1,\"order_item\":2,\"excerpt\":\"<p>TV<\\/p>\",\"created_at\":\"2020-11-06T11:30:29.000000Z\",\"updated_at\":\"2020-12-16T16:32:10.000000Z\",\"user_id\":0}]', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-21 09:19:33', '2020-12-18 10:33:47'),
(14, 'Samsung Refrigerator', 'samsung-refrigerator', 'samsung-refrigerator', 'REF-GRA-TOR', 1, 1, 5, '80000', 0, 10, '{\"id\":2,\"section_id\":3,\"title\":\"Samsung\",\"slug\":\"samsung\",\"image\":\"samsung.svg\",\"icon\":\"#\",\"type\":1,\"display\":1,\"parent_id\":0,\"child\":0,\"order_item\":2,\"excerpt\":\"<p>I am samsung Brand<\\/p>\",\"created_at\":\"2020-10-31T11:33:42.000000Z\",\"updated_at\":\"2020-12-16T16:07:19.000000Z\",\"children\":[]}', NULL, '[{\"id\":9,\"section_id\":6,\"title\":\"Refrigerator\",\"slug\":\"refrigerator\",\"image\":\"refrigerator.svg\",\"icon\":\"fas fa-apple\",\"type\":1,\"display\":1,\"parent_id\":0,\"child\":0,\"order_item\":5,\"excerpt\":\"<p> asdasa<\\/p>\",\"created_at\":\"2020-12-16T15:49:19.000000Z\",\"updated_at\":\"2020-12-22T16:47:57.000000Z\",\"user_id\":0}]', NULL, NULL, NULL, NULL, NULL, NULL, '<p>Sell your products directly on your website or app using the Shop layout design. Cart, checkout sections are included as well.</p>', 'electronics', 'electronics', 'electronics', '2020-12-24 07:16:32', '2020-12-24 07:18:05');

-- --------------------------------------------------------

--
-- Table structure for table `product__colors`
--

CREATE TABLE `product__colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hex` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `available` tinyint(4) DEFAULT '0',
  `quantity` int(11) DEFAULT '0',
  `ordered_item` int(11) DEFAULT '0',
  `sold_item` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product__colors`
--

INSERT INTO `product__colors` (`id`, `product_id`, `color`, `hex`, `image`, `available`, `quantity`, `ordered_item`, `sold_item`, `created_at`, `updated_at`) VALUES
(2, 1, 'Red', '#df1414', 'samsung-galaxy-a21s_red.png', 0, 4, 0, 0, '2020-11-13 12:42:11', '2020-11-13 12:42:11'),
(3, 2, 'Black', '#000000', 'apple-iphone-11_black.png', 0, 6, 0, 0, '2020-11-13 12:43:11', '2020-11-13 12:43:11'),
(6, 12, 'Mexician Red', '#ae2222', 'oppo-phone_mexician-red.jpeg', 0, 10, 0, 0, '2020-11-14 11:21:01', '2020-11-14 11:21:01'),
(7, 1, 'Brown', '#96917a', 'samsung-galaxy-a21s_brown.jpeg', 0, 4, 0, 0, '2020-12-24 05:19:00', '2020-12-24 05:19:00');

-- --------------------------------------------------------

--
-- Table structure for table `product__details`
--

CREATE TABLE `product__details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display` tinyint(4) NOT NULL DEFAULT '0',
  `excerpt` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product__details`
--

INSERT INTO `product__details` (`id`, `product_id`, `title`, `slug`, `display`, `excerpt`, `created_at`, `updated_at`) VALUES
(1, 1, 'Detail 1', 'detail-1', 1, '<p>Easily point out alerts and notifications for your app</p>', '2020-11-13 11:50:45', '2020-12-24 10:12:35'),
(2, 1, 'Detail 2', 'detail-2', 1, '<p>Easily point out alerts and notifications for your app</p>', '2020-11-13 11:51:40', '2020-12-24 10:12:42'),
(3, 1, 'Detail 3', 'detail-3', 1, '<p>Easily point out alerts and notifications for your app</p>', '2020-11-13 11:52:28', '2020-12-24 10:12:48'),
(4, 1, 'Detail 4', 'detail-4', 1, '<p>Easily</p>', '2020-11-13 11:53:09', '2020-12-24 10:24:37'),
(5, 1, 'Detail 5', 'detail-5', 1, '<p>Easily point out alerts and notifications for your app</p>', '2020-11-13 11:53:39', '2020-12-24 10:12:59'),
(6, 12, 'Detail 1', 'detail-1-1', 1, '<p>Detail</p>', '2020-11-14 11:21:49', '2020-11-14 11:21:49');

-- --------------------------------------------------------

--
-- Table structure for table `product__electronics`
--

CREATE TABLE `product__electronics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `electronic_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product__electronics`
--

INSERT INTO `product__electronics` (`id`, `product_id`, `electronic_id`, `created_at`, `updated_at`) VALUES
(7, 13, 5, '2020-12-18 10:33:47', '2020-12-18 10:33:47'),
(8, 13, 4, '2020-12-18 10:33:47', '2020-12-18 10:33:47'),
(11, 2, 1, '2020-12-18 10:52:11', '2020-12-18 10:52:11'),
(12, 2, 6, '2020-12-18 10:52:11', '2020-12-18 10:52:11'),
(15, 1, 1, '2020-12-18 12:06:58', '2020-12-18 12:06:58'),
(16, 12, 1, '2020-12-18 12:26:14', '2020-12-18 12:26:14'),
(17, 14, 9, '2020-12-24 07:18:05', '2020-12-24 07:18:05');

-- --------------------------------------------------------

--
-- Table structure for table `product__images`
--

CREATE TABLE `product__images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `primary` tinyint(4) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product__images`
--

INSERT INTO `product__images` (`id`, `product_id`, `image`, `primary`, `created_at`, `updated_at`) VALUES
(8, 1, 'samsung-galaxy-a21s_1608313873.jpeg', 1, '2020-12-18 12:06:14', '2020-12-18 12:06:26'),
(10, 2, 'apple-iphone-11_1608313956.jpeg', 1, '2020-12-18 12:07:36', '2020-12-18 12:07:46'),
(11, 12, 'oppo-phone_1608314013.jpeg', 1, '2020-12-18 12:08:33', '2020-12-18 12:08:46'),
(12, 1, 'samsung-galaxy-a21s_1608814255.jpeg', 0, '2020-12-24 07:05:56', '2020-12-24 07:05:56'),
(13, 14, 'samsung-refrigerator_1608815373.jpeg', 1, '2020-12-24 07:24:33', '2020-12-24 07:24:33');

-- --------------------------------------------------------

--
-- Table structure for table `product__sections`
--

CREATE TABLE `product__sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product__storages`
--

CREATE TABLE `product__storages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `storage` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ram` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `available` tinyint(4) DEFAULT '0',
  `quantity` int(11) DEFAULT '0',
  `ordered_item` int(11) DEFAULT '0',
  `sold_item` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product__storages`
--

INSERT INTO `product__storages` (`id`, `product_id`, `storage`, `ram`, `price`, `available`, `quantity`, `ordered_item`, `sold_item`, `created_at`, `updated_at`) VALUES
(1, 1, '64 GB', '6 GB', '100001', 0, 4, 0, 0, '2020-11-13 04:34:44', '2020-11-13 04:57:17'),
(3, 2, '64 GB', '8 GB', '22000', 0, 4, 0, 0, '2020-11-13 11:13:57', '2020-11-13 11:13:57'),
(4, 12, '32 GB', '8 GB', '22000', 0, 5, 0, 0, '2020-11-14 11:20:25', '2020-11-14 11:20:25'),
(6, 1, '256 GB', '64 GB', '122112', 0, 5, 0, 0, '2020-11-21 10:35:53', '2020-11-21 10:35:53');

-- --------------------------------------------------------

--
-- Table structure for table `seos`
--

CREATE TABLE `seos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `keyword` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `topic` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `summary` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `classification` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seos`
--

INSERT INTO `seos` (`id`, `title`, `keyword`, `subject`, `topic`, `summary`, `classification`, `category`, `excerpt`, `created_at`, `updated_at`) VALUES
(1, 'Ozerone is a chain of retailers of technology and electronic products. It aims to provide high quality customer services, product at reasonable prices, knowledgeable technical support and financial support and services to its customer base of general consumers.', 'Ozerone shop Nepal, Electronics Electronic shop Electronic stores Electronic stores near me Smartphone  Smartphone stores Smartphone stores near me Samsung Phones Samsung phone prices in Nepal Headphones in nepal Headphones in Kathmandu  Samsung phone prices in Nepal Mi phone prices  Infinix phone prices Samsung Tv prices Samsung tv prices in Nepal Infinix phone in Nepal Motorola phone in Nepal Motorola phone prices Motorola phone prices in Nepal Led tv Led tv in nepal Led tv prices in Nepal Smart Tv in Nepal  Smart Tv prices in Nepal Mi tv in nepal Mi tv prices in nepal Samsung Tv in Nepal Samsung Tv prices in Nepal', 'Ozerone shop Nepal, electronics shop in Nepal, online electrics shop', 'Ozerone shop Nepal, electronics shop in Nepal, online electrics shop', 'Ozerone shop Nepal, electronics shop in Nepal, online electrics shop', 'Ozerone shop Nepal, electronics shop in Nepal, online electrics shop', 'Ozerone shop Nepal, electronics shop in Nepal, online electrics shop', '<p><span style=\"color: rgb(206, 145, 120);\">Ozerone&nbsp;is&nbsp;a&nbsp;chain&nbsp;of&nbsp;retailers&nbsp;of&nbsp;technology&nbsp;and&nbsp;electronic&nbsp;products.&nbsp;It&nbsp;aims&nbsp;to&nbsp;provide&nbsp;high&nbsp;quality&nbsp;customer&nbsp;services,&nbsp;product&nbsp;at&nbsp;reasonable&nbsp;prices,&nbsp;knowledgeable&nbsp;technical&nbsp;support&nbsp;and&nbsp;financial&nbsp;support&nbsp;and&nbsp;services&nbsp;to&nbsp;its&nbsp;customer&nbsp;base&nbsp;of&nbsp;general&nbsp;consumers.</span></p>', '2020-10-24 18:19:56', '2020-12-26 09:49:21');

-- --------------------------------------------------------

--
-- Table structure for table `shopsections`
--

CREATE TABLE `shopsections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'no-image.png',
  `icon` text COLLATE utf8mb4_unicode_ci,
  `type` tinyint(4) NOT NULL DEFAULT '0',
  `display` tinyint(4) NOT NULL DEFAULT '0',
  `child` tinyint(4) NOT NULL DEFAULT '0',
  `order_item` bigint(20) DEFAULT NULL,
  `excerpt` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shopsections`
--

INSERT INTO `shopsections` (`id`, `title`, `slug`, `image`, `icon`, `type`, `display`, `child`, `order_item`, `excerpt`, `created_at`, `updated_at`) VALUES
(6, 'Electronics', 'electronics', 'electronics.svg', '<?xml version=\"1.0\"?> <svg xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" xmlns:svgjs=\"http://svgjs.com/svgjs\" version=\"1.1\" width=\"100%\" height=\"100%\" x=\"0\" y=\"0\" viewBox=\"0 0 480 480\" style=\"enable-background:new 0 0 512 512\" xml:space=\"preserve\" class=\"\"><g> <g xmlns=\"http://www.w3.org/2000/svg\"> 	<g> 		<path d=\"M456,0H168c-13.255,0-24,10.745-24,24v176H40c-13.255,0-24,10.745-24,24v160H8c-4.418,0-8,3.582-8,8    c0.026,22.08,17.92,39.974,40,40h256c22.069,0.022,39.978-17.851,40-39.92c0-0.027,0-0.053,0-0.08c0-4.418-3.582-8-8-8h-8v-88h88    c4.418,0,8-3.582,8-8s-3.582-8-8-8h-41.968l-11.424-40H456c13.255,0,24-10.745,24-24V24C480,10.745,469.255,0,456,0z M32,224    c0-4.418,3.582-8,8-8h256c4.418,0,8,3.582,8,8v160H192c-4.418,0-8,3.582-8,8h-32c0-4.418-3.582-8-8-8H32V224z M313.024,408.944    c-4.519,4.51-10.64,7.047-17.024,7.056H40c-10.168-0.012-19.229-6.418-22.632-16H136c0,4.418,3.582,8,8,8h48c4.418,0,8-3.582,8-8    h118.632C317.44,403.356,315.525,406.409,313.024,408.944z M320,280v-40h17.968l11.424,40H320z M464,216c0,4.418-3.582,8-8,8H320    c0-13.255-10.745-24-24-24H160V24c0-4.418,3.582-8,8-8h288c4.418,0,8,3.582,8,8V216z\" fill=\"#ffffff\" data-original=\"#000000\" style=\"\" class=\"\"/> 	</g> </g> <g xmlns=\"http://www.w3.org/2000/svg\"> 	<g> 		<path d=\"M440,304h-64c-13.255,0-24,10.745-24,24v128c0,13.255,10.745,24,24,24h64c13.255,0,24-10.745,24-24V328    C464,314.745,453.255,304,440,304z M448,456c0,4.418-3.582,8-8,8h-64c-4.418,0-8-3.582-8-8V328c0-4.418,3.582-8,8-8h64    c4.418,0,8,3.582,8,8V456z\" fill=\"#ffffff\" data-original=\"#000000\" style=\"\" class=\"\"/> 	</g> </g> <g xmlns=\"http://www.w3.org/2000/svg\"> </g> <g xmlns=\"http://www.w3.org/2000/svg\"> </g> <g xmlns=\"http://www.w3.org/2000/svg\"> </g> <g xmlns=\"http://www.w3.org/2000/svg\"> </g> <g xmlns=\"http://www.w3.org/2000/svg\"> </g> <g xmlns=\"http://www.w3.org/2000/svg\"> </g> <g xmlns=\"http://www.w3.org/2000/svg\"> </g> <g xmlns=\"http://www.w3.org/2000/svg\"> </g> <g xmlns=\"http://www.w3.org/2000/svg\"> </g> <g xmlns=\"http://www.w3.org/2000/svg\"> </g> <g xmlns=\"http://www.w3.org/2000/svg\"> </g> <g xmlns=\"http://www.w3.org/2000/svg\"> </g> <g xmlns=\"http://www.w3.org/2000/svg\"> </g> <g xmlns=\"http://www.w3.org/2000/svg\"> </g> <g xmlns=\"http://www.w3.org/2000/svg\"> </g> </g></svg>', 1, 1, 0, 1, '<p>Short description</p>', '2020-11-06 03:51:12', '2020-12-16 11:01:57');

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
  `display` tinyint(4) NOT NULL DEFAULT '0',
  `order_item` bigint(20) DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '#',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `sub_title`, `slug`, `image`, `display`, `order_item`, `link`, `created_at`, `updated_at`) VALUES
(1, 'My slider', 'Latest SMART PHONE for your daily use and work management', 'my-slider', 'my-slider.jpeg', 1, 2, 'ozeroneshop.com', '2020-12-09 11:05:52', '2020-12-13 09:50:21'),
(2, 'Second Slider', 'THE COLLECTION OF PERFECT TELEVISION FOR YOUR HOME', 'second-slider', 'second-slider.jpeg', 1, 1, 'ozeroneshop.com', '2020-12-09 11:06:30', '2020-12-13 09:50:21');

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
  `is_customer` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `is_customer`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Biplav Raj Raut', 'biplavraut@gmail.com', NULL, '$2y$10$zBX0ZT602Q9yjvqDAQOaUOuCQMahTgTTTPP41vL9nD2IpmEyYaTj2', 0, 'NemkF1GcbvGi5ATZjhXxbMFKkN4ROrd1qxWGJfu3h5WYGBcou74HFS54kGQJ', '2020-10-22 18:23:23', '2020-10-22 18:23:23'),
(2, 'User', 'user@user.com', NULL, '$2y$10$dJNiQNwSfikHaF23dFBhluXW5Yhb1upIjQyWYqYeVKYHFrxPbKRPO', 0, NULL, '2020-10-24 09:47:21', '2020-10-24 09:47:21'),
(3, 'Ram Thakur', 'ram@thakur.com', NULL, '$2y$10$PBGBB57e4dS7ztJBNxv7wePkwHLbhZjC4.EmpJEkzLVlb06g8Bffa', 0, NULL, '2020-10-25 08:49:02', '2020-10-25 08:49:02'),
(4, 'Biplav Raj Raut', 'mybiplavraut@gmail.com', NULL, '$2y$10$UuguuncPAz.OOByIR5ktEu5O8FwrN7ZHwNjRYQIDySBBl5AnSTtSG', 0, NULL, '2020-12-22 12:32:25', '2020-12-22 12:32:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `electronics`
--
ALTER TABLE `electronics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `partners`
--
ALTER TABLE `partners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product__colors`
--
ALTER TABLE `product__colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product__details`
--
ALTER TABLE `product__details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product__electronics`
--
ALTER TABLE `product__electronics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product__images`
--
ALTER TABLE `product__images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product__sections`
--
ALTER TABLE `product__sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product__storages`
--
ALTER TABLE `product__storages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seos`
--
ALTER TABLE `seos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shopsections`
--
ALTER TABLE `shopsections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `electronics`
--
ALTER TABLE `electronics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `partners`
--
ALTER TABLE `partners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `product__colors`
--
ALTER TABLE `product__colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product__details`
--
ALTER TABLE `product__details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product__electronics`
--
ALTER TABLE `product__electronics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `product__images`
--
ALTER TABLE `product__images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `product__sections`
--
ALTER TABLE `product__sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product__storages`
--
ALTER TABLE `product__storages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `seos`
--
ALTER TABLE `seos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `shopsections`
--
ALTER TABLE `shopsections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
