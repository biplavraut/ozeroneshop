-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2020 at 07:05 PM
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
(3, 'Ozerone', 'ozerone', 'ozerone.png', 1, '2020-10-26', 'Ozerone Shop', 2, 'electronics', 'electronics', 'eclectronics', '<p>aaa</p>', '2020-11-01 08:16:37', '2020-11-21 04:30:50'),
(5, 'Product 1', 'product-1', 'product-1.jpeg', 1, '2020-11-20', 'Ozerone Shop', 1, 'electronics', 'electronics', 'eclectronics', '<p>asdasd adsas</p>', '2020-11-21 04:30:46', '2020-11-21 04:30:50');

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
(1, 3, 'Huwai MI', 'huwai-mi', 'huwai-mi.png', '#', 1, 1, 0, 0, 4, '<p>sss</p>', '2020-10-31 05:38:38', '2020-11-21 11:56:06'),
(2, 3, 'Samsung', 'samsung', 'samsung.png', '#', 1, 1, 0, 0, 3, '<p>I am samsung Brand</p>', '2020-10-31 05:48:42', '2020-11-21 11:56:06'),
(5, 4, 'LG', 'lg', 'lg.jpeg', '#', 1, 1, 0, 0, 5, '<p>aaa</p>', '2020-10-31 07:06:25', '2020-11-21 11:56:06'),
(8, 5, 'Apple', 'apple', 'apple.png', 'fas fa-apple', 1, 1, 0, 1, 1, '<p>This is Apple</p>', '2020-11-05 10:45:19', '2020-11-21 11:56:06'),
(9, 5, 'Mac Book', 'mac-book', 'mac-book.png', 'fas fa-laptop', 1, 1, 8, 0, 2, '<p>aaa</p>', '2020-11-05 10:46:35', '2020-11-21 11:56:06');

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
  `icon` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` tinyint(4) NOT NULL DEFAULT 0,
  `display` tinyint(4) NOT NULL DEFAULT 0,
  `parent_id` bigint(20) NOT NULL DEFAULT 0,
  `child` tinyint(4) NOT NULL DEFAULT 0,
  `order_item` bigint(20) DEFAULT NULL,
  `excerpt` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `electronics`
--

INSERT INTO `electronics` (`id`, `section_id`, `title`, `slug`, `image`, `icon`, `type`, `display`, `parent_id`, `child`, `order_item`, `excerpt`, `created_at`, `updated_at`, `user_id`) VALUES
(1, 6, 'Smart Phone', 'smart-phone', 'smart-phone.png', 'fas fa-phone', 1, 1, 0, 0, 3, '<p>aa</p>', '2020-11-06 04:10:00', '2020-11-21 12:01:17', 0),
(2, 6, 'Camera', 'camera', 'camera.png', 'fas fa-camera', 1, 1, 0, 1, 1, '<p>Camera</p>', '2020-11-06 04:14:50', '2020-11-21 12:01:17', 0),
(3, 6, 'Drones', 'drones', 'drones.png', 'fas fa-drones', 1, 1, 2, 0, 2, '<p>Drones</p>', '2020-11-06 04:15:31', '2020-11-21 12:01:17', 0),
(4, 6, 'Smart TV', 'smart-tv', 'smart-tv.png', 'fas fa-tv', 1, 1, 0, 1, 4, '<p>TV</p>', '2020-11-06 05:45:29', '2020-11-21 12:01:17', 0),
(5, 6, '3D TV', '3d-tv', '3d-tv.png', 'fas fa-tv', 1, 1, 4, 0, 5, '<p>TV 3D</p>', '2020-11-06 05:45:58', '2020-11-21 12:01:17', 0),
(6, 6, 'Laptops and PCs', 'laptops-and-pcs', 'laptops-and-pcs.png', '<?xml version=\"1.0\"?> <svg xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" xmlns:svgjs=\"http://svgjs.com/svgjs\" version=\"1.1\" width=\"100%\" height=\"100%\" x=\"0\" y=\"0\" viewBox=\"0 0 85.348 85.348\" style=\"enable-background:new 0 0 512 512\" xml:space=\"preserve\" class=\"\"><g> <g xmlns=\"http://www.w3.org/2000/svg\"> 	<g> 		<path style=\"\" d=\"M77.45,57.691v-3.16V35.563V16.595c0-1.736-1.424-3.16-3.164-3.16h-63.22    c-1.739,0-3.167,1.417-3.167,3.16v18.968v18.968v3.16L0,67.175c0,2.613,2.122,4.738,4.738,4.738H80.61    c2.616,0,4.738-2.126,4.738-4.738L77.45,57.691z M49.002,70.339H36.358c-0.44,0-0.791-0.351-0.791-0.791s0.351-0.791,0.791-0.791    h12.644c0.433,0,0.791,0.351,0.791,0.791C49.782,69.988,49.435,70.339,49.002,70.339z M29.644,67.179l2.412-2.895h21.237    l2.412,2.895H29.644z M72.998,52.101c0,1.525-1.242,2.759-2.756,2.759H15.106c-1.514,0-2.756-1.245-2.756-2.759V19.032    c0-1.525,1.242-2.759,2.756-2.759h55.136c1.514,0,2.756,1.242,2.756,2.759C72.998,19.032,72.998,52.101,72.998,52.101z\" fill=\"#ffffff\" data-original=\"#010002\" class=\"\"/> 		<path style=\"\" d=\"M56.052,42.778c-0.762-0.329-1.442-0.777-2.058-1.335c-0.44-0.397-0.816-0.866-1.12-1.378    c-0.222-0.369-0.426-0.748-0.58-1.138c-0.154-0.39-0.247-0.812-0.351-1.217c-0.075-0.301-0.125-0.601-0.143-0.909    c-0.025-0.673-0.014-1.335,0.143-1.997c0.132-0.54,0.297-1.059,0.54-1.553c0.598-1.199,1.471-2.129,2.623-2.809    c0.079-0.061,0.168-0.111,0.268-0.175c-0.075-0.075-0.122-0.136-0.175-0.2c-0.619-0.769-1.367-1.399-2.212-1.89    c-0.462-0.268-0.948-0.494-1.432-0.698c-0.286-0.122-0.594-0.197-0.895-0.261c-0.279-0.064-0.58-0.089-0.862-0.125    c-0.748-0.089-1.489,0.014-2.215,0.154c-0.354,0.064-0.687,0.183-1.031,0.293c-0.283,0.082-0.558,0.197-0.83,0.293    c-0.24,0.082-0.483,0.197-0.727,0.261c-0.372,0.104-0.755,0.2-1.134,0.276c-0.68,0.147-1.353,0.025-2.011-0.136    c-0.308-0.075-0.601-0.19-0.902-0.286c-0.354-0.115-0.698-0.24-1.056-0.358c-0.308-0.1-0.616-0.222-0.934-0.286    c-0.372-0.079-0.759-0.132-1.142-0.2c-0.82-0.129-1.628,0-2.426,0.215c-0.412,0.107-0.812,0.29-1.202,0.462    c-0.63,0.265-1.192,0.655-1.714,1.081c-0.705,0.555-1.299,1.224-1.811,1.958c-0.347,0.487-0.641,0.988-0.83,1.553    c-0.15,0.419-0.286,0.845-0.404,1.278c-0.089,0.344-0.175,0.684-0.222,1.034c-0.057,0.387-0.082,0.784-0.1,1.174    c-0.021,0.476-0.029,0.952-0.014,1.417c0.018,0.447,0.061,0.895,0.107,1.335c0.05,0.419,0.111,0.837,0.186,1.26    c0.057,0.301,0.136,0.594,0.215,0.891c0.111,0.429,0.218,0.863,0.358,1.281c0.161,0.483,0.34,0.963,0.537,1.424    c0.265,0.623,0.54,1.242,0.855,1.843c0.548,1.034,1.188,2.026,1.904,2.963c0.48,0.63,0.984,1.231,1.593,1.746    c0.701,0.608,1.474,1.063,2.412,1.231c0.812,0.14,1.564-0.029,2.301-0.308c0.372-0.147,0.73-0.308,1.099-0.462    c0.616-0.265,1.267-0.426,1.936-0.49c0.812-0.075,1.603-0.057,2.384,0.175c0.433,0.125,0.859,0.286,1.274,0.462    c0.594,0.243,1.17,0.519,1.818,0.623c0.888,0.14,1.682-0.064,2.444-0.483c0.684-0.372,1.27-0.873,1.782-1.46    c0.501-0.58,0.97-1.188,1.417-1.811c0.455-0.63,0.888-1.27,1.267-1.943c0.462-0.823,0.859-1.693,1.285-2.541    c0.05-0.097,0.011-0.165-0.075-0.211C56.138,42.792,56.091,42.792,56.052,42.778z\" fill=\"#ffffff\" data-original=\"#010002\" class=\"\"/> 		<path style=\"\" d=\"M43.945,27.027c0.551-0.179,1.07-0.437,1.564-0.755c0.694-0.455,1.288-1.016,1.779-1.693    c0.512-0.687,0.898-1.446,1.152-2.265c0.186-0.601,0.301-1.21,0.258-1.9c0-0.136,0.007-0.329,0-0.523    c-0.007-0.222-0.047-0.261-0.258-0.222c-0.455,0.097-0.923,0.175-1.364,0.34c-0.512,0.2-1.002,0.44-1.467,0.719    c-1.077,0.637-1.911,1.51-2.537,2.588c-0.293,0.508-0.523,1.027-0.691,1.578c-0.075,0.261-0.143,0.54-0.179,0.82    c-0.061,0.455-0.068,0.923-0.007,1.385c0.014,0.132,0.054,0.193,0.19,0.19C42.918,27.282,43.437,27.189,43.945,27.027z\" fill=\"#ffffff\" data-original=\"#010002\" class=\"\"/> 	</g> </g> <g xmlns=\"http://www.w3.org/2000/svg\"> </g> <g xmlns=\"http://www.w3.org/2000/svg\"> </g> <g xmlns=\"http://www.w3.org/2000/svg\"> </g> <g xmlns=\"http://www.w3.org/2000/svg\"> </g> <g xmlns=\"http://www.w3.org/2000/svg\"> </g> <g xmlns=\"http://www.w3.org/2000/svg\"> </g> <g xmlns=\"http://www.w3.org/2000/svg\"> </g> <g xmlns=\"http://www.w3.org/2000/svg\"> </g> <g xmlns=\"http://www.w3.org/2000/svg\"> </g> <g xmlns=\"http://www.w3.org/2000/svg\"> </g> <g xmlns=\"http://www.w3.org/2000/svg\"> </g> <g xmlns=\"http://www.w3.org/2000/svg\"> </g> <g xmlns=\"http://www.w3.org/2000/svg\"> </g> <g xmlns=\"http://www.w3.org/2000/svg\"> </g> <g xmlns=\"http://www.w3.org/2000/svg\"> </g> </g></svg>', 1, 1, 0, 0, 6, '<p>ss</p>', '2020-11-06 07:24:22', '2020-11-21 12:01:17', 0),
(7, 7, 'Small Home Appliances 1', 'small-home-appliances-1', 'small-home-appliances-1.png', 'fas fa-phone', 1, 1, 0, 0, 7, '<p>Small Home Appliances 1</p>', '2020-11-09 09:47:49', '2020-11-09 09:47:49', 0),
(8, 8, 'Kitchen Appliances 1', 'kitchen-appliances-1', 'kitchen-appliances-1.png', 'fas fa-phone', 1, 1, 0, 0, 8, '<p>Kitchen Appliances 1</p>', '2020-11-09 09:48:16', '2020-11-09 09:48:16', 0);

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
(1, 'How to place an order?', 'how-to-place-an-order', 1, 2, '#', '<ol><li>Select product</li><li>Add to cart</li><li>Place an Order</li><li>Pay cash on delivery</li></ol>', '2020-11-01 10:38:50', '2020-11-21 11:19:54'),
(3, 'Ozerone shop payment?', 'ozerone-shop-payment', 1, 1, '#', '<p>Cash on delivery.</p>', '2020-11-21 05:27:18', '2020-11-21 11:19:54');

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
(25, '2020_11_08_075640_create_products_table', 14);

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
('biplavraut@gmail.com', '$2y$10$Ym6XvNwpDhi8CIYE9BXl..whklpV9fXvwkZ4GL26g3sZPC/5oIbjO', '2020-11-01 02:36:47');

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
  `display` tinyint(4) DEFAULT 0,
  `featured` tinyint(4) DEFAULT 0,
  `order_item` bigint(20) DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount` int(11) DEFAULT 0,
  `total_quantity` int(11) DEFAULT 0,
  `brand` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_brand` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shop_category` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `screen_detail` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `operating_system` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `main_camera` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `selfie_camera` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sensor` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `battery` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `excerpt` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_tags` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_categories` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `slug`, `sku`, `model`, `display`, `featured`, `order_item`, `price`, `discount`, `total_quantity`, `brand`, `sub_brand`, `shop_category`, `screen_detail`, `operating_system`, `main_camera`, `selfie_camera`, `sensor`, `battery`, `excerpt`, `meta_keywords`, `meta_tags`, `meta_categories`, `created_at`, `updated_at`) VALUES
(1, 'Samsung Galaxy A21s', 'samsung-galaxy-a21s', 'product-1', 'Galaxy A21s', 1, 1, 1, '222222', 6, 8, '{\"id\":2,\"section_id\":3,\"title\":\"Samsung\",\"slug\":\"samsung\",\"image\":\"samsung.png\",\"icon\":\"#\",\"type\":1,\"display\":1,\"parent_id\":0,\"child\":0,\"order_item\":1,\"excerpt\":\"<p>I am samsung Brand<\\/p>\",\"created_at\":\"2020-10-31T11:33:42.000000Z\",\"updated_at\":\"2020-11-10T11:57:48.000000Z\",\"children\":[]}', '{\"id\":9,\"section_id\":5,\"title\":\"Mac Book\",\"slug\":\"mac-book\",\"image\":\"mac-book.png\",\"icon\":\"fas fa-laptop\",\"type\":1,\"display\":1,\"parent_id\":8,\"child\":0,\"order_item\":5,\"excerpt\":\"<p>aaa<\\/p>\",\"created_at\":\"2020-11-05T16:31:35.000000Z\",\"updated_at\":\"2020-11-10T11:57:48.000000Z\",\"children\":[]}', '[{\"id\":1,\"section_id\":6,\"title\":\"Smart Phone\",\"slug\":\"smart-phone\",\"image\":\"smart-phone.png\",\"icon\":\"fas fa-phone\",\"type\":1,\"display\":1,\"parent_id\":0,\"child\":0,\"order_item\":1,\"excerpt\":\"<p>aa<\\/p>\",\"created_at\":\"2020-11-06T09:55:00.000000Z\",\"updated_at\":\"2020-11-08T07:39:05.000000Z\",\"user_id\":0}]', '6x12, 4k', 'Android 11.2', '25mp', '12mp', 'face', '4400 mAh', '<p>detail</p>', 'electronics phone', 'electronics', 'eclectronics', '2020-11-13 01:51:36', '2020-11-21 09:48:22'),
(2, 'Apple iPhone 11', 'apple-iphone-11', 'apple-iphone-11', '11 Pro', 1, 1, 2, '22000', 0, 3, '{\"id\":8,\"section_id\":5,\"title\":\"Apple\",\"slug\":\"apple\",\"image\":\"apple.png\",\"icon\":\"fas fa-apple\",\"type\":1,\"display\":1,\"parent_id\":0,\"child\":1,\"order_item\":4,\"excerpt\":\"<p>This is Apple<\\/p>\",\"created_at\":\"2020-11-05T16:30:19.000000Z\",\"updated_at\":\"2020-11-10T11:57:48.000000Z\",\"children\":[{\"id\":9,\"section_id\":5,\"title\":\"Mac Book\",\"slug\":\"mac-book\",\"image\":\"mac-book.png\",\"icon\":\"fas fa-laptop\",\"type\":1,\"display\":1,\"parent_id\":8,\"child\":0,\"order_item\":5,\"excerpt\":\"<p>aaa<\\/p>\",\"created_at\":\"2020-11-05T16:31:35.000000Z\",\"updated_at\":\"2020-11-10T11:57:48.000000Z\",\"children\":[]}]}', NULL, '[{\"id\":1,\"section_id\":6,\"title\":\"Smart Phone\",\"slug\":\"smart-phone\",\"image\":\"smart-phone.png\",\"icon\":\"fas fa-phone\",\"type\":1,\"display\":1,\"parent_id\":0,\"child\":0,\"order_item\":1,\"excerpt\":\"<p>aa<\\/p>\",\"created_at\":\"2020-11-06T09:55:00.000000Z\",\"updated_at\":\"2020-11-08T07:39:05.000000Z\",\"user_id\":0}]', '6x12, 4k', 'ios', '25mp', '12mp', 'face', '4400 mAh', '<p>sss</p>', 'electronics', 'electronics', 'eclectronics', '2020-11-13 11:01:53', '2020-11-21 09:28:37'),
(12, 'Oppo Phone', 'oppo-phone', 'oppo-phone', 'note', 1, 1, 3, '33200', 6, 10, '{\"id\":1,\"section_id\":3,\"title\":\"Huwai MI\",\"slug\":\"huwai-mi\",\"image\":\"huwai-mi.png\",\"icon\":\"#\",\"type\":1,\"display\":1,\"parent_id\":0,\"child\":0,\"order_item\":2,\"excerpt\":\"<p>sss<\\/p>\",\"created_at\":\"2020-10-31T11:23:38.000000Z\",\"updated_at\":\"2020-11-10T11:57:48.000000Z\",\"children\":[]}', NULL, '[{\"id\":1,\"section_id\":6,\"title\":\"Smart Phone\",\"slug\":\"smart-phone\",\"image\":\"smart-phone.png\",\"icon\":\"fas fa-phone\",\"type\":1,\"display\":1,\"parent_id\":0,\"child\":0,\"order_item\":1,\"excerpt\":\"<p>aa<\\/p>\",\"created_at\":\"2020-11-06T09:55:00.000000Z\",\"updated_at\":\"2020-11-08T07:39:05.000000Z\",\"user_id\":0}]', '6x12, 4k', 'Android 11.2', '25mp', '12mp', 'face', '4400 mAh', '<p>This is description.</p>', 'electronics', 'electronics', 'eclectronics', '2020-11-14 11:18:25', '2020-11-21 09:28:37'),
(13, 'Product 2', 'product-2', 'product-2', NULL, 0, 0, 4, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-21 09:19:33', '2020-11-21 09:28:37');

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
  `available` tinyint(4) DEFAULT 0,
  `quantity` int(11) DEFAULT 0,
  `ordered_item` int(11) DEFAULT 0,
  `sold_item` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product__colors`
--

INSERT INTO `product__colors` (`id`, `product_id`, `color`, `hex`, `image`, `available`, `quantity`, `ordered_item`, `sold_item`, `created_at`, `updated_at`) VALUES
(2, 1, 'Red', '#df1414', 'samsung-galaxy-a21s_red.png', 0, 4, 0, 0, '2020-11-13 12:42:11', '2020-11-13 12:42:11'),
(3, 2, 'Black', '#000000', 'apple-iphone-11_black.png', 0, 6, 0, 0, '2020-11-13 12:43:11', '2020-11-13 12:43:11'),
(6, 12, 'Mexician Red', '#ae2222', 'oppo-phone_mexician-red.jpeg', 0, 10, 0, 0, '2020-11-14 11:21:01', '2020-11-14 11:21:01');

-- --------------------------------------------------------

--
-- Table structure for table `product__details`
--

CREATE TABLE `product__details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display` tinyint(4) NOT NULL DEFAULT 0,
  `excerpt` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product__details`
--

INSERT INTO `product__details` (`id`, `product_id`, `title`, `slug`, `display`, `excerpt`, `created_at`, `updated_at`) VALUES
(1, 1, 'Detail 1', 'detail-1', 1, '<p>This is detail 1</p>', '2020-11-13 11:50:45', '2020-11-13 12:05:09'),
(2, 1, 'Detail 2', 'detail-2', 1, '<p>dasa</p>', '2020-11-13 11:51:40', '2020-11-13 11:51:40'),
(3, 1, 'Detail 3', 'detail-3', 1, '<p>Ax  as AS</p>', '2020-11-13 11:52:28', '2020-11-13 11:52:28'),
(4, 1, 'Detail 4', 'detail-4', 1, '<p>f gf sfs </p>', '2020-11-13 11:53:09', '2020-11-13 11:53:09'),
(5, 1, 'Detail 5', 'detail-5', 1, '<p>d fadfas</p>', '2020-11-13 11:53:39', '2020-11-13 11:53:39'),
(6, 12, 'Detail 1', 'detail-1-1', 1, '<p>Detail</p>', '2020-11-14 11:21:49', '2020-11-14 11:21:49');

-- --------------------------------------------------------

--
-- Table structure for table `product__images`
--

CREATE TABLE `product__images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `primary` tinyint(4) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product__images`
--

INSERT INTO `product__images` (`id`, `product_id`, `image`, `primary`, `created_at`, `updated_at`) VALUES
(3, 1, 'samsung-galaxy-a21s_1605292041.png', 1, '2020-11-13 12:42:22', '2020-11-21 10:54:54'),
(4, 2, 'apple-iphone-11_1605292120.png', 1, '2020-11-13 12:43:41', '2020-11-13 12:44:13'),
(6, 1, 'samsung-galaxy-a21s_1605372206.jpeg', 0, '2020-11-14 10:58:27', '2020-11-14 10:58:27'),
(7, 12, 'oppo-phone_1605373593.jpeg', 1, '2020-11-14 11:21:34', '2020-11-14 11:21:34');

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
  `available` tinyint(4) DEFAULT 0,
  `quantity` int(11) DEFAULT 0,
  `ordered_item` int(11) DEFAULT 0,
  `sold_item` int(11) DEFAULT 0,
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
(6, 1, '256 GB', '64 GB', '122112', 0, 5, 0, 0, '2020-11-21 10:35:53', '2020-11-21 10:35:53'),
(7, 1, '32 GB', '16 GB', '21132131', 0, 5, 0, 0, '2020-11-21 10:36:00', '2020-11-21 10:36:00'),
(8, 1, '512 GB', '64 GB', '211221', 0, 12, 0, 0, '2020-11-21 10:36:32', '2020-11-21 10:36:32');

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
  `icon` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
(6, 'Electronics', 'electronics', 'electronics.png', '<?xml version=\"1.0\"?> <svg xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" xmlns:svgjs=\"http://svgjs.com/svgjs\" version=\"1.1\" width=\"100%\" height=\"100%\" x=\"0\" y=\"0\" viewBox=\"0 0 480 480\" style=\"enable-background:new 0 0 512 512\" xml:space=\"preserve\" class=\"\"><g> <g xmlns=\"http://www.w3.org/2000/svg\"> 	<g> 		<path d=\"M456,0H168c-13.255,0-24,10.745-24,24v176H40c-13.255,0-24,10.745-24,24v160H8c-4.418,0-8,3.582-8,8    c0.026,22.08,17.92,39.974,40,40h256c22.069,0.022,39.978-17.851,40-39.92c0-0.027,0-0.053,0-0.08c0-4.418-3.582-8-8-8h-8v-88h88    c4.418,0,8-3.582,8-8s-3.582-8-8-8h-41.968l-11.424-40H456c13.255,0,24-10.745,24-24V24C480,10.745,469.255,0,456,0z M32,224    c0-4.418,3.582-8,8-8h256c4.418,0,8,3.582,8,8v160H192c-4.418,0-8,3.582-8,8h-32c0-4.418-3.582-8-8-8H32V224z M313.024,408.944    c-4.519,4.51-10.64,7.047-17.024,7.056H40c-10.168-0.012-19.229-6.418-22.632-16H136c0,4.418,3.582,8,8,8h48c4.418,0,8-3.582,8-8    h118.632C317.44,403.356,315.525,406.409,313.024,408.944z M320,280v-40h17.968l11.424,40H320z M464,216c0,4.418-3.582,8-8,8H320    c0-13.255-10.745-24-24-24H160V24c0-4.418,3.582-8,8-8h288c4.418,0,8,3.582,8,8V216z\" fill=\"#ffffff\" data-original=\"#000000\" style=\"\" class=\"\"/> 	</g> </g> <g xmlns=\"http://www.w3.org/2000/svg\"> 	<g> 		<path d=\"M440,304h-64c-13.255,0-24,10.745-24,24v128c0,13.255,10.745,24,24,24h64c13.255,0,24-10.745,24-24V328    C464,314.745,453.255,304,440,304z M448,456c0,4.418-3.582,8-8,8h-64c-4.418,0-8-3.582-8-8V328c0-4.418,3.582-8,8-8h64    c4.418,0,8,3.582,8,8V456z\" fill=\"#ffffff\" data-original=\"#000000\" style=\"\" class=\"\"/> 	</g> </g> <g xmlns=\"http://www.w3.org/2000/svg\"> </g> <g xmlns=\"http://www.w3.org/2000/svg\"> </g> <g xmlns=\"http://www.w3.org/2000/svg\"> </g> <g xmlns=\"http://www.w3.org/2000/svg\"> </g> <g xmlns=\"http://www.w3.org/2000/svg\"> </g> <g xmlns=\"http://www.w3.org/2000/svg\"> </g> <g xmlns=\"http://www.w3.org/2000/svg\"> </g> <g xmlns=\"http://www.w3.org/2000/svg\"> </g> <g xmlns=\"http://www.w3.org/2000/svg\"> </g> <g xmlns=\"http://www.w3.org/2000/svg\"> </g> <g xmlns=\"http://www.w3.org/2000/svg\"> </g> <g xmlns=\"http://www.w3.org/2000/svg\"> </g> <g xmlns=\"http://www.w3.org/2000/svg\"> </g> <g xmlns=\"http://www.w3.org/2000/svg\"> </g> <g xmlns=\"http://www.w3.org/2000/svg\"> </g> </g></svg>', 1, 1, 0, 1, '<p>Short description</p>', '2020-11-06 03:51:12', '2020-11-21 11:56:23'),
(7, 'Small Home Appliances', 'small-home-appliances', 'small-home-appliances.png', '<?xml version=\"1.0\"?> <svg xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" xmlns:svgjs=\"http://svgjs.com/svgjs\" version=\"1.1\" width=\"100%\" height=\"100%\" x=\"0\" y=\"0\" viewBox=\"0 0 512 512\" style=\"enable-background:new 0 0 512 512\" xml:space=\"preserve\" class=\"\"><g><path xmlns=\"http://www.w3.org/2000/svg\" d=\"m472.433594 135.757812h-160.320313c-8.855469 0-16.03125-7.179687-16.03125-16.03125v-96.195312c0-8.851562 7.175781-16.03125 16.03125-16.03125h160.324219c8.851562 0 16.03125 7.179688 16.03125 16.03125v96.195312c0 8.851563-7.179688 16.03125-16.035156 16.03125zm0 0\" fill=\"#c8c5c9\" data-original=\"#c8c5c9\" style=\"\"/><path xmlns=\"http://www.w3.org/2000/svg\" d=\"m215.917969 504.5h-192.386719c-8.851562 0-16.03125-7.179688-16.03125-16.03125v-448.902344c0-17.710937 14.355469-32.066406 32.066406-32.066406h160.320313c17.710937 0 32.066406 14.355469 32.066406 32.066406v448.902344c0 8.851562-7.179687 16.03125-16.035156 16.03125zm0 0\" fill=\"#eceaec\" data-original=\"#eceaec\" style=\"\" class=\"\"/><path xmlns=\"http://www.w3.org/2000/svg\" d=\"m135.757812 103.695312h-32.066406c-4.425781 0-8.015625-3.589843-8.015625-8.015624v-16.035157c0-4.425781 3.589844-8.015625 8.015625-8.015625h32.066406c4.425782 0 8.015626 3.589844 8.015626 8.015625v16.03125c0 4.429688-3.589844 8.019531-8.015626 8.019531zm0 0\" fill=\"#dbeaff\" data-original=\"#dbeaff\" style=\"\"/><path xmlns=\"http://www.w3.org/2000/svg\" d=\"m32.09375 424.339844v-415.707032c-13.804688 3.578126-24.59375 16.007813-24.59375 30.933594v448.902344c0 8.851562 7.179688 16.03125 16.03125 16.03125h192.386719c8.855469 0 16.03125-7.179688 16.03125-16.03125v-8.015625h-143.742188c-30.941406 0-56.113281-25.175781-56.113281-56.113281zm0 0\" fill=\"#dad8db\" data-original=\"#dad8db\" style=\"\" class=\"\"/><path xmlns=\"http://www.w3.org/2000/svg\" d=\"m488.46875 504.5h-192.386719c-8.855469 0-16.03125-7.179688-16.03125-16.03125v-240.484375c0-8.855469 7.175781-16.03125 16.03125-16.03125h192.386719c8.851562 0 16.03125 7.175781 16.03125 16.03125v240.484375c0 8.851562-7.179688 16.03125-16.03125 16.03125zm0 0\" fill=\"#eceaec\" data-original=\"#eceaec\" style=\"\" class=\"\"/><path xmlns=\"http://www.w3.org/2000/svg\" d=\"m304.667969 432.355469v-200.402344h-8.585938c-8.855469 0-16.03125 7.175781-16.03125 16.03125v240.484375c0 8.851562 7.175781 16.03125 16.03125 16.03125h192.386719c8.851562 0 16.03125-7.179688 16.03125-16.03125v-8.015625h-151.734375c-26.519531 0-48.097656-21.578125-48.097656-48.097656zm0 0\" fill=\"#dad8db\" data-original=\"#dad8db\" style=\"\" class=\"\"/><path xmlns=\"http://www.w3.org/2000/svg\" d=\"m456.402344 400.289062c0 35.417969-28.710938 64.128907-64.128906 64.128907-35.417969 0-64.128907-28.710938-64.128907-64.128907 0-35.417968 28.710938-64.128906 64.128907-64.128906 35.417968 0 64.128906 28.710938 64.128906 64.128906zm0 0\" fill=\"#dad8db\" data-original=\"#dad8db\" style=\"\" class=\"\"/><path xmlns=\"http://www.w3.org/2000/svg\" d=\"m424.339844 400.289062c0 17.710938-14.355469 32.066407-32.066406 32.066407-17.707032 0-32.0625-14.355469-32.0625-32.066407 0-17.707031 14.355468-32.0625 32.0625-32.0625 17.710937 0 32.066406 14.355469 32.066406 32.0625zm0 0\" fill=\"#ffffff\" data-original=\"#ffffff\" style=\"\" class=\"\"/><path xmlns=\"http://www.w3.org/2000/svg\" d=\"m312.113281 264.015625h48.097657v32.066406h-48.097657zm0 0\" fill=\"#c8c5c9\" data-original=\"#c8c5c9\" style=\"\"/><path xmlns=\"http://www.w3.org/2000/svg\" d=\"m424.339844 280.046875c0 8.855469-7.179688 16.03125-16.035156 16.03125-8.851563 0-16.03125-7.175781-16.03125-16.03125 0-8.851563 7.179687-16.03125 16.03125-16.03125 8.855468 0 16.035156 7.179687 16.035156 16.03125zm0 0\" fill=\"#ffffff\" data-original=\"#ffffff\" style=\"\" class=\"\"/><path xmlns=\"http://www.w3.org/2000/svg\" d=\"m391.980469 412.019531c-4.792969-2.554687-8.820313-6.574219-11.386719-11.363281-5.796875-10.796875-5.292969-21.078125-1.46875-29.546875-15.578125 7.035156-24.59375 26.042969-14.910156 45.386719 2.542968 5.078125 6.765625 9.304687 11.847656 11.851562 19.34375 9.6875 38.359375.671875 45.394531-14.90625-8.453125 3.816406-18.703125 4.320313-29.476562-1.421875zm0 0\" fill=\"#dbeaff\" data-original=\"#dbeaff\" style=\"\"/><path xmlns=\"http://www.w3.org/2000/svg\" d=\"m400.289062 103.695312h-64.128906c-4.425781 0-8.015625-3.589843-8.015625-8.015624v-48.097657c0-4.429687 3.589844-8.015625 8.015625-8.015625h64.128906c4.429688 0 8.015626 3.585938 8.015626 8.015625v48.097657c0 4.425781-3.585938 8.015624-8.015626 8.015624zm0 0\" fill=\"#dbeaff\" data-original=\"#dbeaff\" style=\"\"/><path xmlns=\"http://www.w3.org/2000/svg\" d=\"m384.257812 79.644531c-17.707031 0-32.066406-14.355469-32.066406-32.066406v-8.015625h-16.03125c-4.425781 0-8.015625 3.589844-8.015625 8.015625v48.097656c0 4.429688 3.589844 8.015625 8.015625 8.015625h64.128906c4.429688 0 8.015626-3.585937 8.015626-8.015625v-16.03125zm0 0\" fill=\"#c3ddff\" data-original=\"#c3ddff\" style=\"\"/><path xmlns=\"http://www.w3.org/2000/svg\" d=\"m336.160156 103.695312c-4.425781 0-8.015625-3.589843-8.015625-8.015624v-88.179688h-16.03125c-8.855469 0-16.03125 7.179688-16.03125 16.03125v96.195312c0 8.851563 7.175781 16.03125 16.03125 16.03125h160.324219c8.851562 0 16.03125-7.179687 16.03125-16.03125v-16.03125zm0 0\" fill=\"#b6b1b7\" data-original=\"#b6b1b7\" style=\"\"/><path xmlns=\"http://www.w3.org/2000/svg\" d=\"m488.46875 224.453125h-88.695312v-81.195313h72.664062c12.972656 0 23.53125-10.554687 23.53125-23.53125v-96.195312c0-12.972656-10.558594-23.53125-23.53125-23.53125h-160.324219c-12.976562 0-23.53125 10.558594-23.53125 23.53125v40.597656h-49.128906v-24.566406c0-21.8125-17.75-39.5625-39.566406-39.5625h-160.324219c-21.8125 0-39.5625 17.75-39.5625 39.5625v448.90625c0 12.972656 10.558594 23.53125 23.53125 23.53125h192.386719c12.976562 0 23.53125-10.558594 23.53125-23.53125v-112.742188h33.097656v112.742188c0 12.976562 10.558594 23.53125 23.53125 23.53125h192.390625c12.972656 0 23.53125-10.558594 23.53125-23.53125v-240.484375c0-12.976563-10.558594-23.53125-23.53125-23.53125zm8.53125 23.53125v40.597656h-66.769531c1.035156-2.648437 1.609375-5.523437 1.609375-8.53125 0-12.976562-10.558594-23.535156-23.53125-23.535156-12.976563 0-23.535156 10.558594-23.535156 23.535156 0 3.007813.574218 5.882813 1.609374 8.53125h-18.671874v-24.566406c0-4.140625-3.359376-7.5-7.5-7.5h-48.097657c-4.140625 0-7.5 3.359375-7.5 7.5v24.566406h-17.0625v-40.597656c0-4.707031 3.828125-8.53125 8.53125-8.53125h192.386719c4.703125 0 8.53125 3.824219 8.53125 8.53125zm-97.226562 32.0625c0-4.703125 3.828124-8.53125 8.53125-8.53125 4.707031 0 8.535156 3.828125 8.535156 8.53125 0 4.707031-3.828125 8.53125-8.535156 8.53125-4.703126 0-8.53125-3.824219-8.53125-8.53125zm-80.160157 8.535156v-17.066406h33.097657v17.066406zm152.824219-160.324219h-24.566406v-65.160156h33.097656v56.628906c0 4.703126-3.828125 8.53125-8.53125 8.53125zm8.53125-104.726562v24.566406h-33.097656v-33.097656h24.5625c4.707031 0 8.535156 3.828125 8.535156 8.53125zm-177.386719 0c0-4.703125 3.828125-8.53125 8.53125-8.53125h120.757813v113.257812h-120.757813c-4.707031 0-8.53125-3.828124-8.53125-8.53125zm-288.582031 312.113281h16.546875c.285156 0 .515625.230469.515625.515625v56.113282c0 .285156-.230469.515624-.515625.515624h-16.546875zm0-136.273437h16.546875c.285156 0 .515625.230468.515625.515625v56.113281c0 .285156-.230469.515625-.515625.515625h-16.546875zm209.453125 289.097656c0 4.703125-3.828125 8.53125-8.53125 8.53125h-192.390625c-4.703125 0-8.53125-3.828125-8.53125-8.53125v-80.679688h16.546875c8.558594 0 15.515625-6.957031 15.515625-15.515624v-56.113282c0-8.554687-6.957031-15.515625-15.515625-15.515625h-16.546875v-17.0625h168.855469c4.140625 0 7.5-3.359375 7.5-7.5s-3.359375-7.5-7.5-7.5h-168.855469v-17.0625h16.546875c8.558594 0 15.515625-6.960937 15.515625-15.515625v-56.113281c0-8.558594-6.957031-15.519531-15.515625-15.519531h-16.546875v-144.808594c0-13.542969 11.019531-24.5625 24.5625-24.5625h160.324219c13.546875 0 24.5625 11.019531 24.5625 24.5625v249.015625h-8.527344c-4.140625 0-7.5 3.359375-7.5 7.5 0 4.144531 3.359375 7.5 7.5 7.5h8.527344v184.890625zm15-127.742188v-281.597656h49.128906v40.597656c0 12.976563 10.554688 23.53125 23.53125 23.53125h72.660157v81.195313h-88.691407c-12.976562 0-23.53125 10.554687-23.53125 23.53125v112.742187zm249.015625 136.273438h-192.386719c-4.707031 0-8.53125-3.828125-8.53125-8.53125v-184.886719h209.449219v184.886719c0 4.703125-3.828125 8.53125-8.53125 8.53125zm0 0\" fill=\"#000000\" data-original=\"#000000\" style=\"\" class=\"\"/><path xmlns=\"http://www.w3.org/2000/svg\" d=\"m135.757812 64.128906h-32.066406c-8.554687 0-15.515625 6.960938-15.515625 15.515625v16.03125c0 8.558594 6.960938 15.515625 15.515625 15.515625h32.066406c8.554688 0 15.515626-6.957031 15.515626-15.515625v-16.03125c0-8.554687-6.960938-15.515625-15.515626-15.515625zm.515626 31.546875c0 .285157-.230469.515625-.515626.515625h-32.066406c-.285156 0-.515625-.230468-.515625-.515625v-16.03125c0-.285156.230469-.515625.515625-.515625h32.066406c.285157 0 .515626.230469.515626.515625zm0 0\" fill=\"#000000\" data-original=\"#000000\" style=\"\" class=\"\"/><path xmlns=\"http://www.w3.org/2000/svg\" d=\"m448.386719 271.515625h24.046875c4.144531 0 7.5-3.359375 7.5-7.5s-3.355469-7.5-7.5-7.5h-24.046875c-4.140625 0-7.5 3.359375-7.5 7.5s3.359375 7.5 7.5 7.5zm0 0\" fill=\"#000000\" data-original=\"#000000\" style=\"\" class=\"\"/><path xmlns=\"http://www.w3.org/2000/svg\" d=\"m392.273438 328.660156c-39.496094 0-71.628907 32.132813-71.628907 71.628906 0 39.496094 32.132813 71.628907 71.628907 71.628907 39.496093 0 71.628906-32.132813 71.628906-71.628907 0-39.496093-32.132813-71.628906-71.628906-71.628906zm0 128.257813c-31.226563 0-56.628907-25.402344-56.628907-56.628907 0-31.226562 25.40625-56.628906 56.628907-56.628906 31.226562 0 56.628906 25.40625 56.628906 56.628906 0 31.226563-25.402344 56.628907-56.628906 56.628907zm0 0\" fill=\"#000000\" data-original=\"#000000\" style=\"\" class=\"\"/><path xmlns=\"http://www.w3.org/2000/svg\" d=\"m421.453125 385c-4.011719 1.035156-6.425781 5.121094-5.390625 9.132812.515625 2 .777344 4.070313.777344 6.15625 0 13.546876-11.019532 24.566407-24.566406 24.566407-13.542969 0-24.5625-11.019531-24.5625-24.566407 0-13.542968 11.019531-24.5625 24.5625-24.5625 2.085937 0 4.15625.257813 6.148437.773438 4.011719 1.03125 8.101563-1.382812 9.132813-5.394531 1.035156-4.007813-1.378907-8.097657-5.390626-9.132813-3.214843-.828125-6.542968-1.246094-9.890624-1.246094-21.816407 0-39.5625 17.746094-39.5625 39.5625 0 21.816407 17.746093 39.566407 39.5625 39.566407 21.816406 0 39.566406-17.75 39.566406-39.566407 0-3.347656-.421875-6.679687-1.25-9.898437-1.035156-4.011719-5.128906-6.421875-9.136719-5.390625zm0 0\" fill=\"#000000\" data-original=\"#000000\" style=\"\" class=\"\"/><path xmlns=\"http://www.w3.org/2000/svg\" d=\"m328.144531 111.191406h80.164063c4.140625 0 7.5-3.355468 7.5-7.5v-64.128906c0-4.140625-3.359375-7.5-7.5-7.5h-16.03125c-4.140625 0-7.5 3.359375-7.5 7.5 0 4.144531 3.359375 7.5 7.5 7.5h8.53125v49.128906h-65.164063v-49.128906h24.566407c4.140624 0 7.5-3.355469 7.5-7.5 0-4.140625-3.359376-7.5-7.5-7.5h-32.066407c-4.140625 0-7.5 3.359375-7.5 7.5v64.128906c0 4.144532 3.359375 7.5 7.5 7.5zm0 0\" fill=\"#000000\" data-original=\"#000000\" style=\"\" class=\"\"/></g></svg>', 1, 1, 0, 2, '<p>Small Home Appliances</p>', '2020-11-06 03:52:32', '2020-11-21 11:56:23'),
(8, 'Kitchen Appliances', 'kitchen-appliances', 'kitchen-appliances.png', '<?xml version=\"1.0\"?> <svg xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" xmlns:svgjs=\"http://svgjs.com/svgjs\" version=\"1.1\" width=\"100%\" height=\"100%\" x=\"0\" y=\"0\" viewBox=\"0 0 517.008 517.008\" style=\"enable-background:new 0 0 512 512\" xml:space=\"preserve\" class=\"\"><g> <g xmlns=\"http://www.w3.org/2000/svg\"> 	<path d=\"M459.439,32.653c-39.713-22.921-94.458-23.887-142.844-2.515c-44.772,19.785-77.046,63.38-96.123,96.142   c-8.587-2.094-17.777,1.989-21.764,10.299c-3.815,7.946-1.587,17.165,4.762,22.673c-1.74,3.873-2.802,6.474-3.203,7.487   l-92.661,203.528c-9.343-4.304-20.474-0.469-25.083,8.816c-4.695,9.457-0.841,20.933,8.616,25.637l0.631,0.316L70.925,450.85h-51.8   C8.568,450.85,0,459.418,0,469.975S8.568,489.1,19.125,489.1h95.625c10.557,0,19.125-8.568,19.125-19.125   s-8.568-19.125-19.125-19.125h-1.798l13.263-29.137c1.75,0.507,3.519,0.851,5.288,0.851c7.028,0,13.799-3.892,17.146-10.614   c4.38-8.816,1.262-19.307-6.828-24.509l96.018-210.9c2.591,1.195,5.297,1.789,7.984,1.789c7.124,0,13.961-3.997,17.251-10.854   c4.379-9.113,0.822-19.919-7.842-24.834c16.361-27.569,42.554-62.367,76.835-77.514c36.854-16.285,79.35-16.036,108.257,0.65   c21.258,12.269,33.469,31.786,36.318,58.025c5.336,49.142,0.812,82.094-13.406,97.958c-1.311,1.463-2.754,2.716-4.227,3.901v42.811   c11.781-3.978,23.093-10.47,32.694-21.17c22.108-24.624,29.614-66.374,22.969-127.622   C510.561,81.728,490.938,50.822,459.439,32.653z\" fill=\"#ffffff\" data-original=\"#000000\" style=\"\"/> 	<path d=\"M404.972,355.225c12.479,0,24.279,2.84,34.903,7.793V272.93v-38.804v-22.338c0-10.566,1.004-9.562-9.562-9.562h-37.456   c-10.566,0-117.141,8.769-145.293,147.931L229.5,465.193c0,10.566,8.559,23.906,19.125,23.906h90.758   c-10.921-14.066-17.49-31.661-17.49-50.796C321.893,392.489,359.168,355.225,404.972,355.225z\" fill=\"#ffffff\" data-original=\"#000000\" style=\"\"/> 	<path d=\"M449.438,392.441c-2.936-2.84-6.13-5.402-9.562-7.649c-10.05-6.579-22.032-10.442-34.903-10.442   c-35.267,0-63.954,28.688-63.954,63.954c0,20.712,9.945,39.11,25.265,50.796c5.336,4.073,11.312,7.315,17.767,9.562   c6.569,2.285,13.589,3.586,20.923,3.586c7.335,0,14.354-1.301,20.923-3.586c6.771-2.353,13.034-5.805,18.561-10.155   c5.202-4.093,9.783-8.941,13.503-14.43c6.923-10.223,10.978-22.539,10.978-35.783c0-12.526-3.672-24.184-9.916-34.052   C456.274,399.938,453.081,395.971,449.438,392.441z M404.972,406.222c17.71,0,32.073,14.362,32.073,32.072   s-14.363,32.073-32.073,32.073s-32.072-14.363-32.072-32.073S387.253,406.222,404.972,406.222z\" fill=\"#ffffff\" data-original=\"#000000\" style=\"\"/> </g> <g xmlns=\"http://www.w3.org/2000/svg\"> </g> <g xmlns=\"http://www.w3.org/2000/svg\"> </g> <g xmlns=\"http://www.w3.org/2000/svg\"> </g> <g xmlns=\"http://www.w3.org/2000/svg\"> </g> <g xmlns=\"http://www.w3.org/2000/svg\"> </g> <g xmlns=\"http://www.w3.org/2000/svg\"> </g> <g xmlns=\"http://www.w3.org/2000/svg\"> </g> <g xmlns=\"http://www.w3.org/2000/svg\"> </g> <g xmlns=\"http://www.w3.org/2000/svg\"> </g> <g xmlns=\"http://www.w3.org/2000/svg\"> </g> <g xmlns=\"http://www.w3.org/2000/svg\"> </g> <g xmlns=\"http://www.w3.org/2000/svg\"> </g> <g xmlns=\"http://www.w3.org/2000/svg\"> </g> <g xmlns=\"http://www.w3.org/2000/svg\"> </g> <g xmlns=\"http://www.w3.org/2000/svg\"> </g> </g></svg>', 1, 1, 0, 3, '<p>Kitchen Appliances</p>', '2020-11-06 03:56:30', '2020-11-21 11:56:23');

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
(8, 'Ozerone shop slider', 'aa', 'ozerone-shop-slider', 'ozerone-shop-slider.jpeg', 1, 2, '#', '2020-11-01 05:48:31', '2020-11-21 04:30:22'),
(10, 'Product 1', 'aa', 'product-1', 'product-1.png', 1, 1, '#', '2020-11-17 11:58:33', '2020-11-21 04:30:22');

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
(1, 'Biplav Raj Raut', 'biplavraut@gmail.com', NULL, '$2y$10$zBX0ZT602Q9yjvqDAQOaUOuCQMahTgTTTPP41vL9nD2IpmEyYaTj2', 0, 'L4nax5FrUu71Fu8NRPNt5GAb4lQErAdFCwHwHowlPANOdbEvkQ8S66xzssyJ', '2020-10-22 18:23:23', '2020-10-22 18:23:23'),
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
-- Indexes for table `electronics`
--
ALTER TABLE `electronics`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `electronics_slug_unique` (`slug`);

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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_slug_unique` (`slug`),
  ADD UNIQUE KEY `products_sku_unique` (`sku`);

--
-- Indexes for table `product__colors`
--
ALTER TABLE `product__colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product__details`
--
ALTER TABLE `product__details`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product__details_slug_unique` (`slug`);

--
-- Indexes for table `product__images`
--
ALTER TABLE `product__images`
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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `electronics`
--
ALTER TABLE `electronics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

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
-- AUTO_INCREMENT for table `product__images`
--
ALTER TABLE `product__images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `product__storages`
--
ALTER TABLE `product__storages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `seos`
--
ALTER TABLE `seos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `shopsections`
--
ALTER TABLE `shopsections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
