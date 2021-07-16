-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 14, 2021 at 07:32 AM
-- Server version: 10.2.34-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `falcontr_kraftbox`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, '$2y$10$t8QZElh2oa49Jwyp05I7TO3egRE9kONGV.guRKwiopwRJfqTzXdEG', NULL, NULL, 'upload/admin/1613057303admin.png', NULL, '2021-07-03 05:55:51');

-- --------------------------------------------------------

--
-- Table structure for table `advertisments`
--

CREATE TABLE `advertisments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `advertisments`
--

INSERT INTO `advertisments` (`id`, `image`, `title`, `status`, `created_at`, `updated_at`) VALUES
(1, 'upload/add/1785558801add.jpg', 'hello', 1, '2021-06-15 06:09:40', '2021-06-15 06:09:40'),
(2, 'upload/add/1069262962add.jpg', NULL, 0, '2021-06-15 06:10:31', '2021-06-15 06:10:31'),
(3, 'upload/add/1946340519add.png', 'www.youtube.com', 0, '2021-07-05 03:33:29', '2021-07-05 03:33:29'),
(4, 'upload/add/1195148851add.jpg', 'https://krafftbox.com/admin/add/create', 0, '2021-07-05 03:46:35', '2021-07-05 03:46:35'),
(5, 'upload/add/2114778061banner.JPG', 'https://www.sciencealert.com/', 0, '2021-07-05 03:49:10', '2021-07-05 03:53:11'),
(6, 'upload/add/68115389add.png', 'https://www.youtube.com', 1, '2021-07-06 00:51:11', '2021-07-06 00:51:11'),
(7, 'upload/add/88351523add.jpg', 'http://www.instagram.com', 1, '2021-07-09 12:33:46', '2021-07-09 12:33:46');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `image`, `title`, `text`, `status`, `created_at`, `updated_at`) VALUES
(1, 'upload/setting/banner/672057574banner.jpg', NULL, NULL, '1', '2021-05-31 05:20:04', '2021-07-07 13:31:49'),
(3, 'upload/setting/banner/299414270banner.jpg', 'https://www.youtube.com/', NULL, '1', '2021-05-31 05:26:25', '2021-07-05 03:48:03'),
(4, 'upload/setting/banner/891911952banner.jpg', 'https://www.youtube.com/', NULL, '1', '2021-05-31 05:26:32', '2021-07-05 03:48:17'),
(6, 'upload/setting/banner/247618038banner.png', '<b>test</b>', 'test', '1', '2021-07-10 15:46:48', '2021-07-10 15:46:48');

-- --------------------------------------------------------

--
-- Table structure for table `blogcategories`
--

CREATE TABLE `blogcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogcategories`
--

INSERT INTO `blogcategories` (`id`, `category`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Blogcategory1', NULL, 1, '2021-06-02 01:35:49', '2021-06-02 01:35:49'),
(2, 'blogcategory2', NULL, 1, '2021-06-02 01:36:01', '2021-06-02 01:36:01');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `category_id`, `image`, `title`, `detail`, `status`, `author`, `created_at`, `updated_at`) VALUES
(1, 1, 'upload/blog/1650182914blog.png', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas, sequi!', '&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas, sequi!&nbsp;&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas, sequi!&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas, sequi!&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas, sequi!&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas, sequi!&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas, sequi!&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas, sequi!&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas, sequi!&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas, sequi!&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas, sequi!&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas, sequi!&nbsp;&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas, sequi!&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas, sequi!&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas, sequi!&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas, sequi! Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas, sequi!&nbsp;&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas, sequi!&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas, sequi!&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas, sequi!&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas, sequi!&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas, sequi!&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas, sequi!&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas, sequi!&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas, sequi!&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas, sequi!&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas, sequi!&nbsp;&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas, sequi!&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas, sequi!&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas, sequi!&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas, sequi!', 1, 'Author', '2021-06-02 01:37:08', '2021-06-02 01:37:08'),
(2, 1, 'upload/blog/1538845547blog.png', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas, sequi!', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas, sequi!&nbsp;&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas, sequi!&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas, sequi!&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas, sequi!&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas, sequi!&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas, sequi!&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas, sequi!&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas, sequi!&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas, sequi!&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas, sequi!&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas, sequi!&nbsp;&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas, sequi!&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas, sequi!&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas, sequi!&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas, sequi!Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas, sequi!&nbsp;&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas, sequi!&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas, sequi!&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas, sequi!&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas, sequi!&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas, sequi!&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas, sequi!&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas, sequi!&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas, sequi!&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas, sequi!&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas, sequi!&nbsp;&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas, sequi!&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas, sequi!&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas, sequi!&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas, sequi!', 1, 'Admin', '2021-06-02 01:37:28', '2021-06-02 01:37:28'),
(3, 2, 'upload/blog/1778026976blog.png', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas, sequi!', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas, sequi!&nbsp;&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas, sequi!&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas, sequi!&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas, sequi!&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas, sequi!&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas, sequi!&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas, sequi!&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas, sequi!&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas, sequi!&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas, sequi!&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas, sequi!&nbsp;&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas, sequi!&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas, sequi!&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas, sequi!&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas, sequi!Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas, sequi!&nbsp;&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas, sequi!&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas, sequi!&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas, sequi!&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas, sequi!&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas, sequi!&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas, sequi!&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas, sequi!&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas, sequi!&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas, sequi!&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas, sequi!&nbsp;&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas, sequi!&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas, sequi!&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas, sequi!&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas, sequi!', 1, NULL, '2021-06-02 01:37:43', '2021-06-02 01:37:43'),
(4, 1, 'upload/blog/1039128292blog.png', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas, sequi!', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas, sequi!&nbsp;&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas, sequi!&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas, sequi!&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas, sequi!&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas, sequi!&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas, sequi!&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas, sequi!&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas, sequi!&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas, sequi!&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas, sequi!&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas, sequi!&nbsp;&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas, sequi!&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas, sequi!&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas, sequi!&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas, sequi!Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas, sequi!&nbsp;&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas, sequi!&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas, sequi!&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas, sequi!&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas, sequi!&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas, sequi!&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas, sequi!&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas, sequi!&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas, sequi!&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas, sequi!&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas, sequi!&nbsp;&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas, sequi!&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas, sequi!&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas, sequi!&nbsp;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas, sequi!', 1, NULL, '2021-06-02 01:37:57', '2021-06-02 01:37:57');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `buynow` int(11) NOT NULL DEFAULT 0,
  `user_id` int(11) NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `price` double(8,2) NOT NULL,
  `coupon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_value` int(11) DEFAULT NULL,
  `price_after_comission` int(11) NOT NULL,
  `actual_price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `product_id`, `buynow`, `user_id`, `color`, `size`, `qty`, `price`, `coupon`, `coupon_value`, `price_after_comission`, `actual_price`, `created_at`, `updated_at`) VALUES
(46, 7, 0, 32, NULL, NULL, 7, 5832.75, NULL, NULL, 5833, 5555, '2021-07-02 03:26:31', '2021-07-02 03:26:31'),
(48, 7, 1, 32, NULL, NULL, 1, 5249.48, 'KB3', 10, 5833, 5555, '2021-07-02 11:36:01', '2021-07-02 11:36:01'),
(53, 6, 1, 36, NULL, '2gb/38gb', 1, 1050.00, NULL, NULL, 1050, 1000, '2021-07-02 14:54:06', '2021-07-02 14:54:06'),
(54, 6, 0, 36, NULL, '2gb/38gb', 1, 1050.00, NULL, NULL, 1050, 1000, '2021-07-02 14:54:10', '2021-07-02 14:54:10'),
(79, 1, 0, 51, NULL, NULL, 1, 105.00, NULL, NULL, 105, 100, '2021-07-03 12:27:44', '2021-07-03 12:27:44'),
(87, 5, 1, 57, NULL, NULL, 1, 105.00, NULL, NULL, 105, 100, '2021-07-06 03:08:28', '2021-07-06 03:08:28'),
(88, 2, 0, 57, NULL, NULL, 1, 105.00, NULL, NULL, 105, 100, '2021-07-06 03:09:15', '2021-07-06 03:09:15'),
(94, 5, 1, 84, NULL, NULL, 1, 105.00, NULL, NULL, 105, 100, '2021-07-09 01:26:52', '2021-07-09 01:26:52'),
(99, 24, 0, 35, NULL, NULL, 1, 12962.20, NULL, NULL, 12962, 12345, '2021-07-11 05:47:01', '2021-07-11 05:47:01'),
(101, 11, 0, 84, NULL, NULL, 1, 105.00, NULL, NULL, 105, 100, '2021-07-11 16:28:03', '2021-07-11 16:28:03');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Category1', 'upload/category/49380938category.jpg', 1, '2021-05-29 04:36:16', '2021-07-02 12:49:36'),
(2, 'Category2', 'upload/category/1096320449category.jpg', 1, '2021-05-29 04:36:37', '2021-05-29 04:36:37'),
(3, 'category3', 'upload/category/1096320449category.jpg', 1, NULL, NULL),
(4, 'category 4', 'upload/category/1096320449category.jpg', 1, NULL, NULL),
(5, 'category 5', 'upload/category/1096320449category.jpg', 1, NULL, NULL),
(6, 'category 6', 'upload/category/1096320449category.jpg', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `msg` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `fname`, `lname`, `email`, `phone`, `msg`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, 'ashokmehta123y@gmail.com', '9813519397', 'rtewtre', '0', '2021-06-02 02:40:47', '2021-06-02 02:40:47'),
(2, NULL, NULL, 'ashokmehta123y@gmail.com', '9813519397', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Tempora sequi ut, laborum dolor magnam similique impedit quia sunt mollitia sapiente!', '0', '2021-06-29 18:48:30', '2021-06-29 18:48:30'),
(3, NULL, NULL, 'ashokmehta123y@gmail.com', '9813519397', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Tempora sequi ut, laborum dolor magnam similique impedit quia sunt mollitia sapiente!', '0', '2021-06-29 18:48:57', '2021-06-29 18:48:57'),
(4, NULL, NULL, 'ashokmehta123y@gmail.com', '9813519397', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Tempora sequi ut, laborum dolor magnam similique impedit quia sunt mollitia sapiente!', '0', '2021-06-29 18:49:57', '2021-06-29 18:49:57');

-- --------------------------------------------------------

--
-- Table structure for table `contactvendors`
--

CREATE TABLE `contactvendors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `user_id` int(255) NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contactvendors`
--

INSERT INTO `contactvendors` (`id`, `vendor_id`, `user_id`, `title`, `message`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, 'Hell0 i am testing message,.Hell i am testing message.Hell i am testing message.Hell i am testing message.Hell i am testing message Hell i am testing messageHell i am testing messageHell i am testing messageHell i am testing messageHell i am testing messageHell i am testing messageHell i am testing messageHell i am testing messageHell i am testing messageHell i am testing messageHell i am testing messageHell i am testing messageHell i am testing messageHell i am testing message', 0, NULL, NULL),
(2, 1, 1, 'What is lorem ispim', 'message message message message message message message message message message message message message message message', 0, '2021-06-26 05:40:44', '2021-06-26 05:40:44');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `coupon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `expire_at` date NOT NULL,
  `card_value` double(8,2) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `coupon`, `price`, `expire_at`, `card_value`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'D10', 10.00, '2021-06-09', 100.00, 'upload/coupon/1159875696Coupon.png', '0', '2021-06-01 02:11:06', '2021-06-01 02:11:06'),
(2, '123', 5.00, '2021-07-23', 100000.00, 'upload/coupon/674568049Coupon.jpg', '1', '2021-07-09 01:57:10', '2021-07-09 01:57:10'),
(3, 'abcd', 10.00, '2021-07-23', 100000.00, NULL, '1', '2021-07-11 10:04:27', '2021-07-11 10:04:27');

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
-- Table structure for table `favourites`
--

CREATE TABLE `favourites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `shop_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `favourites`
--

INSERT INTO `favourites` (`id`, `user_id`, `shop_id`, `created_at`, `updated_at`) VALUES
(2, 1, 1, '2021-06-26 21:57:31', '2021-06-26 21:57:31'),
(4, 84, 8, '2021-07-09 01:33:53', '2021-07-09 01:33:53');

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
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2021_05_11_233951_create_sessions_table', 1),
(7, '2021_05_12_005932_create_admins_table', 1),
(8, '2021_05_13_091222_create_categories_table', 1),
(9, '2021_05_13_150726_create_subcategories_table', 1),
(10, '2021_05_14_103039_create_products_table', 1),
(11, '2021_05_14_123014_create_productcolors_table', 1),
(12, '2021_05_14_160154_create_productvariations_table', 1),
(13, '2021_05_14_233020_create_coupons_table', 1),
(14, '2021_05_15_030047_create_blogcategories_table', 1),
(15, '2021_05_15_031734_create_blogs_table', 1),
(16, '2021_05_15_054500_create_subscribers_table', 1),
(17, '2021_05_15_064016_create_banners_table', 1),
(18, '2021_05_17_014812_create_pages_table', 1),
(19, '2021_05_17_014917_create_websites_table', 1),
(20, '2021_05_17_050009_create_contacts_table', 1),
(21, '2021_05_20_022520_create_orders_table', 1),
(22, '2021_05_20_044632_create_shippings_table', 1),
(23, '2021_05_20_045145_create_order_details_table', 1),
(24, '2021_05_29_043147_create_shops_table', 2),
(25, '2021_05_30_053830_create_vendorcoupons_table', 3),
(26, '2021_05_30_073856_create_productreports_table', 4),
(27, '2021_05_30_074336_create_productcustomizes_table', 4),
(28, '2021_05_30_133509_create_contactvendors_table', 5),
(29, '2021_05_30_233412_create_payments_table', 6),
(30, '2021_05_30_233944_create_tickets_table', 6),
(31, '2021_05_31_080608_create_vendortotals_table', 7),
(32, '2021_05_31_123125_create_productreviews_table', 8),
(33, '2021_06_01_024057_create_carts_table', 9),
(34, '2021_06_01_225651_create_wishlists_table', 10),
(35, '2021_06_13_030824_create_shop_galleries_table', 11),
(36, '2021_06_14_235832_create_shopreviews_table', 12),
(37, '2021_06_15_034419_create_buynows_table', 13),
(38, '2021_06_15_090312_create_favourites_table', 14),
(39, '2021_06_15_101516_create_advertisments_table', 15);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `vendor_id` int(11) DEFAULT NULL,
  `tracking_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ispaid` int(11) NOT NULL DEFAULT 0,
  `payment_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` double(8,2) NOT NULL,
  `coupon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_value` float DEFAULT NULL,
  `cart_value` float NOT NULL,
  `tax` double(8,2) DEFAULT NULL,
  `shipping_charge` double(8,2) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `vendor_id`, `tracking_code`, `ispaid`, `payment_type`, `payment_id`, `total`, `coupon`, `coupon_value`, `cart_value`, `tax`, `shipping_charge`, `status`, `created_at`, `updated_at`) VALUES
(93, 1, NULL, '60dc57b1711dc', 0, 'cod', '764098671', 115.00, NULL, NULL, 105, NULL, 10.00, '1', '2021-06-30 05:53:25', '2021-07-11 10:36:33'),
(94, 1, NULL, '60dc58c14c012', 0, 'cod', '1913523518', 5842.75, NULL, NULL, 5832.75, NULL, 10.00, '0', '2021-06-30 05:57:57', '2021-06-30 05:57:57'),
(95, 1, NULL, '60dc58d333ca5', 0, 'cod', '2000806207', 5842.75, NULL, NULL, 5832.75, NULL, 10.00, '0', '2021-06-30 05:58:15', '2021-06-30 05:58:15'),
(96, 1, NULL, '60dc591e7592d', 0, 'cod', '1762492112', 9460.00, NULL, NULL, 9450, NULL, 10.00, '0', '2021-06-30 05:59:30', '2021-06-30 05:59:30'),
(97, 1, NULL, '60dc59cf02fcc', 0, 'cod', '29272584', 14290.00, NULL, NULL, 14280, NULL, 10.00, '0', '2021-06-30 06:02:27', '2021-06-30 06:02:27'),
(98, 1, NULL, '60dc5ac2467ba', 0, 'cod', '437175813', 14290.00, NULL, NULL, 14280, NULL, 10.00, '0', '2021-06-30 06:06:30', '2021-06-30 06:06:30'),
(99, 1, NULL, '60dc5ad470879', 0, 'cod', '1648881238', 14290.00, NULL, NULL, 14280, NULL, 10.00, '0', '2021-06-30 06:06:48', '2021-06-30 06:06:48'),
(100, 1, NULL, '60dc5b0c52e5a', 0, 'cod', '1191772012', 14290.00, NULL, NULL, 14280, NULL, 10.00, '0', '2021-06-30 06:07:44', '2021-06-30 06:07:44'),
(101, 1, NULL, '60dc5b179bbd5', 0, 'cod', '808758375', 14290.00, NULL, NULL, 14280, NULL, 10.00, '0', '2021-06-30 06:07:55', '2021-06-30 06:07:55'),
(102, 1, NULL, '60dc5bc439307', 0, 'cod', '676238001', 14290.00, NULL, NULL, 14280, NULL, 10.00, '0', '2021-06-30 06:10:48', '2021-06-30 06:10:48'),
(103, 1, NULL, '60dc5de6c4239', 0, 'cod', '686213950', 4840.00, NULL, NULL, 4830, NULL, 10.00, '0', '2021-06-30 06:19:54', '2021-06-30 06:19:54'),
(104, 1, NULL, '60dc5e15d7395', 0, 'cod', '873758846', 5842.75, NULL, NULL, 5832.75, NULL, 10.00, '0', '2021-06-30 06:20:41', '2021-06-30 06:20:41'),
(105, 1, NULL, '60de9032a2162', 0, 'cod', '785527703', 5842.75, NULL, NULL, 5832.75, NULL, 10.00, '0', '2021-07-01 22:19:02', '2021-07-01 22:19:02'),
(106, 32, NULL, '60defa2d99c66', 0, 'cod', '1777828417', 5259.48, NULL, NULL, 5249.48, NULL, 10.00, '0', '2021-07-02 11:36:13', '2021-07-02 11:36:13'),
(107, 32, NULL, '60defa57c74f2', 0, 'cod', '162276931', 5259.48, NULL, NULL, 5249.48, NULL, 10.00, '0', '2021-07-02 11:36:55', '2021-07-02 11:36:55'),
(108, 32, NULL, '60defa707066d', 0, 'cod', '1286858005', 5259.48, NULL, NULL, 5249.48, NULL, 10.00, '0', '2021-07-02 11:37:20', '2021-07-02 11:37:20'),
(109, 32, NULL, '60defad19cc6f', 0, 'cod', '1140990046', 40839.25, NULL, NULL, 40829.2, NULL, 10.00, '0', '2021-07-02 11:38:57', '2021-07-02 11:38:57'),
(110, 36, NULL, '60df0c299af53', 0, 'cod', '2018458073', 5842.75, NULL, NULL, 5832.75, NULL, 10.00, '0', '2021-07-02 12:52:57', '2021-07-02 12:52:57'),
(111, 36, NULL, '60df0c8c3138c', 0, 'cod', '804680660', 5842.75, NULL, NULL, 5832.75, NULL, 10.00, '0', '2021-07-02 12:54:36', '2021-07-02 12:54:36'),
(112, 1, NULL, '60e00abc96e51', 0, 'cod', '1937189059', 5842.75, NULL, NULL, 5832.75, NULL, 10.00, '0', '2021-07-03 06:59:08', '2021-07-03 06:59:08'),
(113, 1, NULL, '60e00b738cecb', 0, 'cod', '1069772628', 40839.25, NULL, NULL, 40829.2, NULL, 10.00, '0', '2021-07-03 07:02:11', '2021-07-03 07:02:11'),
(114, 1, NULL, '60e00b8b5de28', 0, 'cod', '2073284602', 40839.25, NULL, NULL, 40829.2, NULL, 10.00, '0', '2021-07-03 07:02:35', '2021-07-03 07:02:35'),
(115, 1, NULL, '60e00b9a28fd3', 0, 'cod', '697383024', 40839.25, NULL, NULL, 40829.2, NULL, 10.00, '0', '2021-07-03 07:02:50', '2021-07-03 07:02:50'),
(116, 1, NULL, '60e00bfbcf509', 0, 'cod', '1121189739', 40839.25, NULL, NULL, 40829.2, NULL, 10.00, '0', '2021-07-03 07:04:27', '2021-07-03 07:04:27'),
(117, 1, NULL, '60e00db5a71e1', 0, 'cod', '1248653459', 23446.00, NULL, NULL, 23436, NULL, 10.00, '0', '2021-07-03 07:11:49', '2021-07-03 07:11:49'),
(118, 1, NULL, '60e0123087ff2', 0, 'cod', '805588995', 31798.75, NULL, NULL, 31788.8, NULL, 10.00, '0', '2021-07-03 07:30:56', '2021-07-03 07:30:56'),
(119, 1, NULL, '60e0125a2b769', 0, 'cod', '1009801439', 31798.75, NULL, NULL, 31788.8, NULL, 10.00, '0', '2021-07-03 07:31:38', '2021-07-03 07:31:38'),
(120, 1, NULL, '60e012c097e88', 0, 'cod', '907985169', 535.00, NULL, NULL, 525, NULL, 10.00, '0', '2021-07-03 07:33:20', '2021-07-03 07:33:20'),
(121, 1, NULL, '60e0137f2cbcf', 0, 'cod', '2057139541', 20.50, NULL, NULL, 10.5, NULL, 10.00, '0', '2021-07-03 07:36:31', '2021-07-03 07:36:31'),
(122, 1, NULL, '60e013d6c36c7', 0, 'cod', '1420587544', 20.50, NULL, NULL, 10.5, NULL, 10.00, '0', '2021-07-03 07:37:58', '2021-07-03 07:37:58'),
(123, 1, NULL, '60e0145b471ed', 0, 'cod', '1404678159', 73.00, NULL, NULL, 63, NULL, 10.00, '0', '2021-07-03 07:40:11', '2021-07-03 07:40:11'),
(124, 1, NULL, '60e014ec4d782', 0, 'cod', '639647048', 115.00, NULL, NULL, 105, NULL, 10.00, '0', '2021-07-03 07:42:36', '2021-07-03 07:42:36'),
(125, 1, NULL, '60e016b9637d1', 0, 'cod', '1901921717', 17518.75, NULL, NULL, 17508.8, NULL, 10.00, '0', '2021-07-03 07:50:17', '2021-07-03 07:50:17'),
(126, 1, NULL, '60e017afa66de', 0, 'cod', '759314695', 1060.00, NULL, NULL, 1050, NULL, 10.00, '0', '2021-07-03 07:54:23', '2021-07-03 07:54:23'),
(127, 1, NULL, '60e018090752c', 0, 'cod', '1579288428', 1060.00, NULL, NULL, 1050, NULL, 10.00, '0', '2021-07-03 07:55:53', '2021-07-03 07:55:53'),
(128, 1, NULL, '60e0182e8db4e', 0, 'cod', '2140357576', 1060.00, NULL, NULL, 1050, NULL, 10.00, '0', '2021-07-03 07:56:30', '2021-07-03 07:56:30'),
(129, 1, NULL, '60e01844f24b6', 0, 'cod', '948837323', 1060.00, NULL, NULL, 1050, NULL, 10.00, '0', '2021-07-03 07:56:52', '2021-07-03 07:56:52'),
(130, 1, NULL, '60e018883dd98', 0, 'cod', '2000059937', 1060.00, NULL, NULL, 1050, NULL, 10.00, '0', '2021-07-03 07:58:00', '2021-07-03 07:58:00'),
(131, 1, NULL, '60e01c76a3307', 0, 'cod', '2063363035', 76.15, NULL, NULL, 66.15, NULL, 10.00, '0', '2021-07-03 08:14:46', '2021-07-03 08:14:46'),
(132, 1, NULL, '60e020a19fcfa', 0, 'cod', '1504344622', 85.60, NULL, NULL, 75.6, NULL, 10.00, '0', '2021-07-03 08:32:33', '2021-07-03 08:32:33'),
(133, 1, NULL, '60e023e2467fb', 0, 'cod', '1622069302', 19.45, NULL, NULL, 9.45, NULL, 10.00, '1', '2021-07-03 08:46:26', '2021-07-03 09:47:36'),
(134, 1, NULL, '60e0272844e2f', 0, 'cod', '1086329160', 5842.75, NULL, NULL, 5832.75, NULL, 10.00, '0', '2021-07-03 09:00:24', '2021-07-03 09:00:24'),
(135, 1, NULL, '60e0276e51597', 0, 'cod', '879794650', 5842.75, NULL, NULL, 5832.75, NULL, 10.00, '0', '2021-07-03 09:01:34', '2021-07-03 09:01:34'),
(136, 1, NULL, '60e027ded7f40', 0, 'cod', '940833589', 115.00, NULL, NULL, 105, NULL, 10.00, '0', '2021-07-03 09:03:26', '2021-07-03 09:03:26'),
(137, 1, NULL, '60e0292dc321c', 0, 'cod', '1680800698', 115.00, NULL, NULL, 105, NULL, 10.00, '0', '2021-07-03 09:09:01', '2021-07-03 09:09:01'),
(138, 1, NULL, '60e029f63b596', 0, 'cod', '2066955519', 20.50, NULL, NULL, 10.5, NULL, 10.00, '0', '2021-07-03 09:12:22', '2021-07-03 09:12:22'),
(139, 1, NULL, '60e02ae6a72d9', 0, 'cod', '328429457', 20.50, NULL, NULL, 10.5, NULL, 10.00, '0', '2021-07-03 09:16:22', '2021-07-03 09:16:22'),
(140, 52, NULL, '60e05b335df7e', 0, 'cod', '394202975', 325.00, NULL, NULL, 315, NULL, 10.00, '2', '2021-07-03 12:42:27', '2021-07-03 12:45:32'),
(141, 35, NULL, '60e05cb3a56d2', 0, 'cod', '538742233', 5842.75, NULL, NULL, 5832.75, NULL, 10.00, '0', '2021-07-03 12:48:51', '2021-07-03 12:48:51'),
(142, 44, NULL, '60e3b3a923f17', 0, 'cod', '1893332433', 1060.00, NULL, NULL, 1050, NULL, 10.00, '1', '2021-07-06 01:36:41', '2021-07-06 01:38:59'),
(143, 46, NULL, '60e3f182c8ab0', 0, 'cod', '1065933219', 5947.75, NULL, NULL, 5937.75, NULL, 10.00, '0', '2021-07-06 06:00:34', '2021-07-06 06:00:34'),
(144, 81, NULL, '60e42552df7ee', 0, 'cod', '767823045', 1060.00, NULL, NULL, 1050, NULL, 10.00, '0', '2021-07-06 09:41:38', '2021-07-06 09:41:38'),
(145, 41, NULL, '60e84f5240926', 0, 'cod', '1067031128', 12324.09, NULL, NULL, 12314.1, NULL, 10.00, '0', '2021-07-09 13:29:54', '2021-07-09 13:29:54'),
(146, 1, NULL, '60eac84b2673d', 0, 'cod', '1444295367', 5842.75, NULL, NULL, 5832.75, NULL, 10.00, '0', '2021-07-11 10:30:35', '2021-07-11 10:30:35');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `vendor_id` int(11) DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` float NOT NULL,
  `comission` float NOT NULL,
  `price_after_comission` float NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `shop_id` int(11) DEFAULT NULL,
  `coupon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price_after_coupon` float DEFAULT NULL,
  `uid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_value` int(11) DEFAULT NULL,
  `actual_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `vendor_id`, `product_id`, `color`, `size`, `qty`, `price`, `comission`, `price_after_comission`, `created_at`, `updated_at`, `shop_id`, `coupon`, `price_after_coupon`, `uid`, `coupon_value`, `actual_price`) VALUES
(179, 132, 1, 17, NULL, NULL, '8', 9, 5, 9.45, '2021-07-03 08:32:33', '2021-07-03 08:32:33', NULL, 'KB3', 9.45, '60e020a1a1c3b', 10, 10),
(180, 133, 1, 17, NULL, NULL, '1', 9, 5, 9.45, '2021-07-03 08:46:26', '2021-07-03 08:46:26', NULL, 'KB3', 9.45, '60e023e248b44', 10, 10),
(181, 134, 1, 4, NULL, NULL, '1', 5555, 5, 5833, '2021-07-03 09:00:24', '2021-07-03 09:00:24', NULL, NULL, 5832.75, '60e027284c68d', NULL, 5555),
(182, 135, 1, 4, NULL, NULL, '1', 5555, 5, 5833, '2021-07-03 09:01:34', '2021-07-03 09:01:34', NULL, NULL, 5832.75, '60e0276e57420', NULL, 5555),
(183, 136, 1, 10, NULL, NULL, '1', 100, 5, 105, '2021-07-03 09:03:26', '2021-07-03 09:03:26', NULL, NULL, 105, '60e027ded9d48', NULL, 100),
(184, 137, 1, 5, NULL, NULL, '1', 100, 5, 105, '2021-07-03 09:09:01', '2021-07-03 09:09:01', NULL, NULL, 105, '60e0292dc6b8e', NULL, 100),
(185, 138, 1, 17, NULL, NULL, '1', 10, 5, 11, '2021-07-03 09:12:22', '2021-07-03 09:12:22', NULL, NULL, 10.5, '60e029f64031e', NULL, 10),
(186, 139, 1, 17, NULL, NULL, '1', 10, 5, 11, '2021-07-03 09:16:22', '2021-07-03 09:16:22', NULL, NULL, 10.5, '60e02ae6c111e', NULL, 10),
(187, 140, NULL, 1, NULL, NULL, '1', 100, 5, 105, '2021-07-03 12:42:27', '2021-07-03 12:42:27', NULL, NULL, 105, '60e05b336092b', NULL, 100),
(188, 140, 1, 11, NULL, NULL, '1', 100, 5, 105, '2021-07-03 12:42:27', '2021-07-03 12:42:27', NULL, NULL, 105, '60e05b3361608', NULL, 100),
(189, 140, 1, 15, NULL, NULL, '1', 100, 5, 105, '2021-07-03 12:42:27', '2021-07-03 12:42:27', NULL, NULL, 105, '60e05b3361ed3', NULL, 100),
(190, 141, 1, 7, NULL, NULL, '1', 5555, 5, 5833, '2021-07-03 12:48:51', '2021-07-03 12:48:51', NULL, NULL, 5832.75, '60e05cb3a9515', NULL, 5555),
(191, 142, 1, 6, NULL, '2gb/38gb', '1', 1000, 5, 1050, '2021-07-06 01:36:41', '2021-07-06 01:36:41', NULL, NULL, 1050, '60e3b3a925d77', NULL, 1000),
(192, 143, 1, 2, NULL, NULL, '1', 100, 5, 105, '2021-07-06 06:00:34', '2021-07-06 06:00:34', NULL, NULL, 105, '60e3f182cabe7', NULL, 100),
(193, 143, 1, 4, NULL, NULL, '1', 5555, 5, 5833, '2021-07-06 06:00:34', '2021-07-06 06:00:34', NULL, NULL, 5832.75, '60e3f182cb5cb', NULL, 5555),
(194, 144, 1, 6, NULL, '2gb/38gb', '1', 1000, 5, 1050, '2021-07-06 09:41:38', '2021-07-06 09:41:38', NULL, NULL, 1050, '60e42552e1fa7', NULL, 1000),
(195, 145, 41, 24, NULL, NULL, '1', 11727.8, 5, 12314.1, '2021-07-09 13:29:54', '2021-07-09 13:29:54', NULL, 'supercoupon', 12314.1, '60e84f5242f86', 5, 12345),
(196, 146, 1, 7, NULL, NULL, '1', 5555, 5, 5833, '2021-07-11 10:30:35', '2021-07-11 10:30:35', NULL, NULL, 5832.75, '60eac84b296cf', NULL, 5555);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `about` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `term` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `policy` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `about`, `term`, `price`, `policy`, `image`, `created_at`, `updated_at`) VALUES
(1, '<h2>atestataeta</h2>', '<h2>Term &amp; conditions content goes here</h2>\r\n<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Placeat minima alias ab veritatis, provident tenetur. Dolore voluptatibus eaque exercitationem consectetur aliquam velit nostrum vel corporis cum similique magnam totam quos repudiandae non nobis maiores illum assumenda vero, ad, iste, tenetur voluptas. Modi accusantium aut eos sunt quasi cumque voluptatum sit, enim architecto et, minima ut consequuntur molestias deleniti quis ex veritatis officiis blanditiis! Cupiditate doloribus reprehenderit dicta temporibus ratione blanditiis quo, fugit facere similique animi vitae nemo tenetur, nam esse veritatis! Accusamus saepe maxime, harum impedit quae sint? Ipsum, iste eum. Laboriosam nostrum sunt illum quas explicabo consequatur excepturi cupiditate.</p>\r\n<p>Lorem ipsum</p>', '<h2>Price And Payemnt content goes here</h2>\r\n<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Placeat minima alias ab veritatis, provident tenetur. Dolore voluptatibus eaque exercitationem consectetur aliquam velit nostrum vel corporis cum similique magnam totam quos repudiandae non nobis maiores illum assumenda vero, ad, iste, tenetur voluptas. Modi accusantium aut eos sunt quasi cumque voluptatum sit, enim architecto et, minima ut consequuntur molestias deleniti quis ex veritatis officiis blanditiis! Cupiditate doloribus reprehenderit dicta temporibus ratione blanditiis quo, fugit facere similique animi vitae nemo tenetur, nam esse veritatis! Accusamus saepe maxime, harum impedit quae sint? Ipsum, iste eum. Laboriosam nostrum sunt illum quas explicabo consequatur excepturi cupiditate.</p>\r\n<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Placeat minima alias ab veritatis, provident tenetur. Dolore voluptatibus eaque exercitationem consectetur aliquam velit nostrum vel corporis cum similique magnam totam quos repudiandae non nobis maiores illum assumenda vero, ad, iste, tenetur voluptas. Modi accusantium aut eos sunt quasi cumque voluptatum sit, enim architecto et, minima ut consequuntur molestias deleniti quis ex veritatis officiis blanditiis! Cupiditate doloribus reprehenderit dicta temporibus ratione blanditiis quo, fugit facere similique animi vitae nemo tenetur, nam esse veritatis! Accusamus saepe maxime, harum impedit quae sint? Ipsum, iste eum. Laboriosam nostrum sunt illum quas explicabo consequatur excepturi cupiditate.</p>', '<h2>Privacy Policy content goes here</h2>\r\n<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Placeat minima alias ab veritatis, provident tenetur. Dolore voluptatibus eaque exercitationem consectetur aliquam velit nostrum vel corporis cum similique magnam totam quos repudiandae non nobis maiores illum assumenda vero, ad, iste, tenetur voluptas. Modi accusantium aut eos sunt quasi cumque voluptatum sit, enim architecto et, minima ut consequuntur molestias deleniti quis ex veritatis officiis blanditiis! Cupiditate doloribus reprehenderit dicta temporibus ratione blanditiis quo, fugit facere similique animi vitae nemo tenetur, nam esse veritatis! Accusamus saepe maxime, harum impedit quae sint? Ipsum, iste eum. Laboriosam nostrum sunt illum quas explicabo consequatur excepturi cupiditate.</p>\r\n<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Placeat minima alias ab veritatis, provident tenetur. Dolore voluptatibus eaque exercitationem consectetur aliquam velit nostrum vel corporis cum similique magnam totam quos repudiandae non nobis maiores illum assumenda vero, ad, iste, tenetur voluptas. Modi accusantium aut eos sunt quasi cumque voluptatum sit, enim architecto et, minima ut consequuntur molestias deleniti quis ex veritatis officiis blanditiis! Cupiditate doloribus reprehenderit dicta temporibus ratione blanditiis quo, fugit facere similique animi vitae nemo tenetur, nam esse veritatis! Accusamus saepe maxime, harum impedit quae sint? Ipsum, iste eum. Laboriosam nostrum sunt illum quas explicabo consequatur excepturi cupiditate.</p>', NULL, NULL, '2021-07-09 12:49:55');

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
('smtptestmail9@gmail.com', '$2y$10$D9Ujly/WH29/XKjAODDhUuTZCKtJdkaDzk2iW5tr2icxlxMTRDNhS', '2021-07-05 04:01:48'),
('ashokmehta123y@gmail.com', '$2y$10$XuodX09ny35aX7S2/kQqUuj/D.by.bO1W1gudpFS2Vvr.EF4slV2i', '2021-07-06 09:55:46');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `payment_mode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `vendor_id`, `payment_mode`, `payment_id`, `image`, `date`, `time`, `amount`, `created_at`, `updated_at`) VALUES
(16, 1, 'Fone-pay', '60d7fcc15cf29', NULL, '2021-06-27', '2021-06-27 04:21:21', 10000.00, '2021-06-26 22:36:21', '2021-06-26 22:36:21'),
(17, 1, 'Fone-pay', '60d7fcd68bb00', NULL, '2021-06-27', '2021-06-27 04:21:42', 500.00, '2021-06-26 22:36:42', '2021-06-26 22:36:42');

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

-- --------------------------------------------------------

--
-- Table structure for table `productcolors`
--

CREATE TABLE `productcolors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vendor_id` int(11) DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `sku` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `productcolors`
--

INSERT INTO `productcolors` (`id`, `vendor_id`, `product_id`, `color`, `image`, `quantity`, `sku`, `status`, `created_at`, `updated_at`) VALUES
(5, 1, 1, '#921c1c', 'upload/productcolor/924301835productcolor.jpg', NULL, NULL, 1, '2021-05-30 01:19:58', '2021-05-30 01:19:58'),
(6, 1, 1, '#e50606', 'upload/productcolor/424223920productcolor.jpg', NULL, NULL, 1, '2021-05-30 01:20:12', '2021-05-30 01:20:12'),
(7, NULL, 6, '#000000', 'upload/productcolor/297540066productcolor.jpg', NULL, NULL, 1, '2021-05-31 01:02:36', '2021-06-12 08:16:39'),
(8, NULL, 6, '#fd0d0d', 'upload/productcolor/743816174productcolor.jpg', NULL, NULL, 1, '2021-05-31 07:08:21', '2021-05-31 07:08:21'),
(9, NULL, 6, '#17e87c', 'upload/productcolor/1843008187productcolor.jpg', NULL, NULL, 1, '2021-05-31 07:08:41', '2021-05-31 07:08:41'),
(10, NULL, 16, '#c21919', 'upload/productcolor/372671592productcolor.png', NULL, NULL, 1, '2021-06-25 22:45:44', '2021-06-25 22:45:44'),
(11, NULL, 16, '#b41313', 'upload/productcolor/678596034productcolor.png', NULL, NULL, 1, '2021-06-25 22:45:56', '2021-06-25 22:45:56'),
(12, 1, 17, '#db0000', 'upload/productcolor/698206736productcolor.png', NULL, NULL, 1, '2021-06-30 06:46:35', '2021-06-30 06:46:35'),
(13, 41, 24, '#4b639b', 'upload/productcolor/1823419364productcolor.jpg', NULL, NULL, 1, '2021-07-09 12:24:57', '2021-07-09 12:24:57');

-- --------------------------------------------------------

--
-- Table structure for table `productcustomizes`
--

CREATE TABLE `productcustomizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `descr` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `productcustomizes`
--

INSERT INTO `productcustomizes` (`id`, `vendor_id`, `image`, `user_id`, `product_id`, `descr`, `status`, `created_at`, `updated_at`) VALUES
(7, 1, 'upload/product/customize/2122358331product.jpg', 1, 10, 'sdfvds', 0, NULL, NULL),
(8, 1, 'upload/product/customize/1093525875product.jpg', 1, 10, 'sdfvds', 0, NULL, NULL),
(9, 1, 'upload/product/customize/1942543090product.png', 1, 8, 'dgfdh sryer ryer vewtywe', 0, NULL, NULL),
(10, 1, 'upload/product/customize/1333869990product.jpg', 83, 9, 'sdsd', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `productreports`
--

CREATE TABLE `productreports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `reason` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `productreports`
--

INSERT INTO `productreports` (`id`, `vendor_id`, `user_id`, `product_id`, `reason`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 'Hello reasom  Hello reasom Hello reasom Hello reasom Hello reasom Hello reasom Hello reasom Hello reasom Hello reasom Hello reasom Hello reasom Hello reasom Hello reasom Hello reasom Hello reasom Hello reasom Hello reasom Hello reasom Hello reasom Hello reasom Hello reasom Hello reasom Hello reasom Hello reasom Hello reasom Hello reasom Hello reasom Hello reasom Hello reasom Hello reasom Hello reasom Hello reasom Hello reasom Hello reasom Hello reasom Hello reasom Hello reasom Hello reasom Hello reasom Hello reasom Hello reasom Hello reasom Hello reasom Hello reasom ', 1, NULL, NULL),
(2, 1, 1, 1, 'Hello reasom  Hello reasom Hello reasom Hello reasom Hello reasom Hello reasom Hello reasom Hello reasom Hello reasom Hello reasom Hello reasom Hello reasom Hello reasom Hello reasom Hello reasom Hello reasom Hello reasom Hello reasom Hello reasom Hello reasom Hello reasom Hello reasom Hello reasom Hello reasom Hello reasom Hello reasom Hello reasom Hello reasom Hello reasom Hello reasom Hello reasom Hello reasom Hello reasom Hello reasom Hello reasom Hello reasom Hello reasom Hello reasom Hello reasom Hello reasom Hello reasom Hello reasom Hello reasom Hello reasom ', 0, NULL, NULL),
(3, 1, 1, 9, 'i am reporting this product', 1, NULL, NULL),
(4, 1, 1, 6, 'Hello,i want to report this product', 1, NULL, NULL),
(5, 1, 1, 6, 'hellokjs,iasdsaf', 1, NULL, NULL),
(6, 1, 1, 6, 'hellokjs,iasdsaf', 1, NULL, NULL),
(7, 1, 1, 6, 'hellokjs,iasdsaf', 1, NULL, NULL),
(8, 1, 1, 6, 'hellokjs,iasdsaf', 1, NULL, NULL),
(9, 1, 1, 6, 'hellokjs,iasdsaf', 1, NULL, NULL),
(10, 1, 1, 6, 'hellokjs,iasdsaf', 1, NULL, NULL),
(11, 1, 1, 6, 'Hellooo', 1, NULL, NULL),
(12, 1, 1, 6, 'Hellooo', 1, NULL, NULL),
(13, 1, 1, 4, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque ullam similique ea suscipit debitis. Quam, saepe. Minima, alias quasi ut consequatur consequuntur atque odio quos reiciendis cupiditate sequi dolore asperiores?', 1, NULL, NULL),
(14, 1, 1, 4, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque ullam similique ea suscipit debitis. Quam, saepe. Minima, alias quasi ut consequatur consequuntur atque odio quos reiciendis cupiditate sequi dolore asperiores?\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Eaque ullam similique ea suscipit debitis. Quam, saepe. Minima, alias quasi ut consequatur consequuntur atque odio quos reiciendis cupiditate sequi dolore asperiores?', 1, NULL, NULL),
(15, 1, 1, 8, 'gehrhfe teurthet', 1, NULL, NULL),
(16, 1, 1, 8, 'dghf dfgfg', 1, NULL, NULL),
(17, 1, 1, 8, 'dghf dfgfg', 1, NULL, NULL),
(18, 1, 1, 8, 'dghf dfgfg', 1, NULL, NULL),
(19, 1, 1, 8, 'dghf dfgfg', 1, NULL, NULL),
(20, 1, 1, 7, 'ewtertyre 3wetwert', 1, NULL, NULL),
(21, 1, 1, 7, 'ewtertyre 3wetwert', 1, NULL, NULL),
(22, 1, 1, 7, 'ewtertyre 3wetwert', 1, NULL, NULL),
(23, 1, 1, 7, 'ewtertyre 3wetwert', 1, NULL, NULL),
(24, 1, 83, 9, 'badd', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `productreviews`
--

CREATE TABLE `productreviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `feedback` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `productreviews`
--

INSERT INTO `productreviews` (`id`, `product_id`, `user_id`, `rating`, `feedback`, `created_at`, `updated_at`) VALUES
(1, 4, 1, 4, '1111', '2021-06-01 01:28:14', '2021-06-01 01:28:14'),
(2, 4, 1, 4, '1111', '2021-06-01 01:28:14', '2021-06-01 01:28:14'),
(4, 10, 1, 4, 'Good job', '2021-05-31 20:51:10', '2021-05-31 20:51:10'),
(5, 9, 1, 5, 'Nice product', '2021-06-01 05:21:16', '2021-06-01 05:21:16'),
(6, 7, 1, 3, 'iuu', '2021-07-02 00:21:01', '2021-07-02 00:21:01'),
(7, 7, 1, 3, 'rtrtrfgrthg', '2021-07-02 00:31:59', '2021-07-02 00:31:59'),
(9, 7, 32, 4, 'srg', '2021-07-02 00:42:55', '2021-07-02 00:42:55'),
(10, 7, 32, 4, 'Good jobs', '2021-07-02 00:50:25', '2021-07-02 01:01:48'),
(11, 7, 35, 3, 'Doing good job', '2021-07-03 03:04:49', '2021-07-03 03:05:06'),
(12, 4, 42, 3, 'sdsd', '2021-07-03 06:01:35', '2021-07-03 06:01:35'),
(13, 11, 52, 3, 'sdff', '2021-07-03 12:31:41', '2021-07-03 12:31:41'),
(16, 4, 44, 1, NULL, '2021-07-04 02:18:47', '2021-07-04 02:18:47'),
(17, 4, 44, 1, 'nice product nice seller', '2021-07-04 02:19:17', '2021-07-04 02:19:17'),
(18, 4, 44, 5, 'testestestest', '2021-07-04 02:22:55', '2021-07-04 02:22:55'),
(19, 4, 35, 2, 'fhnmjfgj', '2021-07-06 02:02:20', '2021-07-06 02:02:20'),
(20, 5, 57, 3, NULL, '2021-07-06 03:06:15', '2021-07-06 03:06:15'),
(21, 4, 83, 3, 'good job', '2021-07-08 02:25:50', '2021-07-08 02:26:26'),
(22, 9, 83, 3, 'sdsd', '2021-07-08 02:35:03', '2021-07-08 02:35:16'),
(23, 1, 83, 4, 'd', '2021-07-08 03:24:56', '2021-07-08 03:24:56'),
(24, 27, 41, 3, NULL, '2021-07-09 12:26:42', '2021-07-09 12:26:42'),
(25, 27, 84, 5, NULL, '2021-07-09 12:47:57', '2021-07-09 12:47:57'),
(26, 27, 84, 3, NULL, '2021-07-09 12:48:11', '2021-07-09 12:48:11'),
(27, 6, 1, 4, 'Good products', '2021-07-11 09:48:52', '2021-07-11 09:49:21');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) DEFAULT NULL,
  `price` float NOT NULL,
  `comission` float NOT NULL,
  `price_after_comission` float NOT NULL,
  `qty` int(11) DEFAULT NULL,
  `vendor_id` int(11) DEFAULT NULL,
  `shop_id` int(11) DEFAULT NULL,
  `featured` int(11) DEFAULT NULL,
  `top_rated` int(11) DEFAULT NULL,
  `bestseller` int(11) DEFAULT NULL,
  `Iscustomized` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_descr` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keyword` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descr` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sku` int(11) DEFAULT NULL,
  `front` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `back` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `left` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `right` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `material` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `term` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `recipt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `image`, `category_id`, `subcategory_id`, `price`, `comission`, `price_after_comission`, `qty`, `vendor_id`, `shop_id`, `featured`, `top_rated`, `bestseller`, `Iscustomized`, `quantity`, `meta_title`, `meta_descr`, `meta_keyword`, `descr`, `short_desc`, `sku`, `front`, `back`, `left`, `right`, `material`, `term`, `delivery_time`, `recipt`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Product 1', 'upload/product/1881946112product.png', 1, NULL, 100, 5, 105, 44, NULL, 8, 1, 1, 1, NULL, NULL, 'title', 'description', 'metatitle', 'Lorem ipsum dolor sit Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi repellendus, doloremque dicta error exercitationem sed excepturi accusantium officiis placeat blanditiis? Eveniet iusto quibusdam Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi repellendus, doloremque dicta error exercitationem sed excepturi accusantium officiis placeat blanditiis? Eveniet iusto quibusdam Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi repellendus, doloremque dicta error exercitationem sed excepturi accusantium officiis placeat blanditiis? Eveniet iusto quibusdam Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi repellendus, doloremque dicta error exercitationem sed excepturi accusantium officiis placeat blanditiis? Eveniet iusto quibusdam  amet consectetur adipisicing elit. Eligendi repellendus, doloremque dicta error exercitationem sed excepturi accusantium officiis placeat blanditiis? Eveniet iusto quibusdam ', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Labore voluptates voluptatem minima suscipit iste odio, et minus consequuntur amet sint.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 1, '2021-05-29 04:58:26', '2021-05-29 06:27:36'),
(2, 'Product2', 'upload/product/121996194product.jpg', 1, NULL, 100, 5, 105, 20, 1, 8, 1, 1, 1, NULL, NULL, '4', NULL, '4', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi repellendus, doloremque dicta error exercitationem sed excepturi accusantium officiis placeat blanditiis? Eveniet iusto quibusdam Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi repellendus, doloremque dicta error exercitationem sed excepturi accusantium officiis placeat blanditiis? Eveniet iusto quibusdam Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi repellendus, doloremque dicta error exercitationem sed excepturi accusantium officiis placeat blanditiis? Eveniet iusto quibusdam Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi repellendus, doloremque dicta error exercitationem sed excepturi accusantium officiis placeat blanditiis? Eveniet iusto quibusdam Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi repellendus, doloremque dicta error exercitationem sed excepturi accusantium officiis placeat blanditiis? Eveniet iusto quibusdam Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi repellendus, doloremque dicta error exercitationem sed excepturi accusantium officiis placeat blanditiis? Eveniet iusto quibusdam Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi repellendus, doloremque dicta error exercitationem sed excepturi accusantium officiis placeat blanditiis? Eveniet iusto quibusdam Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi repellendus, doloremque dicta error exercitationem sed excepturi accusantium officiis placeat blanditiis? Eveniet iusto quibusdam Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi repellendus, doloremque dicta error exercitationem sed excepturi accusantium officiis placeat blanditiis? Eveniet iusto quibusdam Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi repellendus, doloremque dicta error exercitationem sed excepturi accusantium officiis placeat blanditiis? Eveniet iusto quibusdam Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi repellendus, doloremque dicta error exercitationem sed excepturi accusantium officiis placeat blanditiis? Eveniet iusto quibusdam Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi repellendus, doloremque dicta error exercitationem sed excepturi accusantium officiis placeat blanditiis? Eveniet iusto quibusdam Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi repellendus, doloremque dicta error exercitationem sed excepturi accusantium officiis placeat blanditiis? Eveniet iusto quibusdam  Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi repellendus, doloremque dicta error exercitationem sed excepturi accusantium officiis placeat blanditiis? Eveniet iusto quibusdam Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi repellendus, doloremque dicta error exercitationem sed excepturi accusantium officiis placeat blanditiis? Eveniet iusto quibusdam ', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi repellendus, doloremque dicta error exercitationem sed excepturi accusantium officiis placeat blanditiis? Eveniet iusto quibusdam Lorem ipsum dolor sit amet consectetur adipisicing elit. El', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 1, '2021-05-30 00:57:25', '2021-05-30 01:04:20'),
(3, 'product3', 'upload/product/1538579683product.jpg', 1, 1, 3333, 5, 3499.65, 44, 1, 8, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, 'long description goes hereLorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi repellendus, doloremque dicta error exercitationem sed excepturi accusantium officiis placeat blanditiis? Eveniet iusto quibusdam Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi repellendus, doloremque dicta error exercitationem sed excepturi accusantium officiis placeat blanditiis? Eveniet iusto quibusdam Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi repellendus, doloremque dicta error exercitationem sed excepturi accusantium officiis placeat blanditiis? Eveniet iusto quibusdam Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi repellendus, doloremque dicta error exercitationem sed excepturi accusantium officiis placeat blanditiis? Eveniet iusto quibusdam Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi repellendus, doloremque dicta error exercitationem sed excepturi accusantium officiis placeat blanditiis? Eveniet iusto quibusdam Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi repellendus, doloremque dicta error exercitationem sed excepturi accusantium officiis placeat blanditiis? Eveniet iusto quibusdam Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi repellendus, doloremque dicta error exercitationem sed excepturi accusantium officiis placeat blanditiis? Eveniet iusto quibusdam Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi repellendus, doloremque dicta error exercitationem sed excepturi accusantium officiis placeat blanditiis? Eveniet iusto quibusdam Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi repellendus, doloremque dicta error exercitationem sed excepturi accusantium officiis placeat blanditiis? Eveniet iusto quibusdam Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi repellendus, doloremque dicta error exercitationem sed excepturi accusantium officiis placeat blanditiis? Eveniet iusto quibusdam Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi repellendus, doloremque dicta error exercitationem sed excepturi accusantium officiis placeat blanditiis? Eveniet iusto quibusdam Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi repellendus, doloremque dicta error exercitationem sed excepturi accusantium officiis placeat blanditiis? Eveniet iusto quibusdam Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi repellendus, doloremque dicta error exercitationem sed excepturi accusantium officiis placeat blanditiis? Eveniet iusto quibusdam ', 'short description goes here', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4-5 days', '', 0, '2021-05-30 18:44:59', '2021-05-30 18:44:59'),
(4, 'product 4', 'upload/product/1427092154product.jpg', 1, 1, 5555, 5, 5832.75, 44, 1, 8, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi repellendus, doloremque dicta error exercitationem sed excepturi accusantium officiis placeat blanditiis? Eveniet iusto quibusdam Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi repellendus, doloremque dicta error exercitationem sed excepturi accusantium officiis placeat blanditiis? Eveniet iusto quibusdam Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi repellendus, doloremque dicta error exercitationem sed excepturi accusantium officiis placeat blanditiis? Eveniet iusto quibusdam Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi repellendus, doloremque dicta error exercitationem sed excepturi accusantium officiis placeat blanditiis? Eveniet iusto quibusdam Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi repellendus, doloremque dicta error exercitationem sed excepturi accusantium officiis placeat blanditiis? Eveniet iusto quibusdam Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi repellendus, doloremque dicta error exercitationem sed excepturi accusantium officiis placeat blanditiis? Eveniet iusto quibusdam Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi repellendus, doloremque dicta error exercitationem sed excepturi accusantium officiis placeat blanditiis? Eveniet iusto quibusdam Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi repellendus, doloremque dicta error exercitationem sed excepturi accusantium officiis placeat blanditiis? Eveniet iusto quibusdam Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi repellendus, doloremque dicta error exercitationem sed excepturi accusantium officiis placeat blanditiis? Eveniet iusto quibusdam Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi repellendus, doloremque dicta error exercitationem sed excepturi accusantium officiis placeat blanditiis? Eveniet iusto quibusdam Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi repellendus, doloremque dicta error exercitationem sed excepturi accusantium officiis placeat blanditiis? Eveniet iusto quibusdam ', 'short descp', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4-5 days', '', 1, '2021-05-30 23:11:50', '2021-05-30 23:11:50'),
(5, 'Product 5', 'upload/product/1396357596product.jpg', 1, NULL, 100, 5, 105, 44, 1, 8, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi repellendus, doloremque dicta error exercitationem sed excepturi accusantium officiis placeat blanditiis? Eveniet iusto quibusdam Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi repellendus, doloremque dicta error exercitationem sed excepturi accusantium officiis placeat blanditiis? Eveniet iusto quibusdam Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi repellendus, doloremque dicta error exercitationem sed excepturi accusantium officiis placeat blanditiis? Eveniet iusto quibusdam Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi repellendus, doloremque dicta error exercitationem sed excepturi accusantium officiis placeat blanditiis? Eveniet iusto quibusdam Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi repellendus, doloremque dicta error exercitationem sed excepturi accusantium officiis placeat blanditiis? Eveniet iusto quibusdam Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi repellendus, doloremque dicta error exercitationem sed excepturi accusantium officiis placeat blanditiis? Eveniet iusto quibusdam Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi repellendus, doloremque dicta error exercitationem sed excepturi accusantium officiis placeat blanditiis? Eveniet iusto quibusdam Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi repellendus, doloremque dicta error exercitationem sed excepturi accusantium officiis placeat blanditiis? Eveniet iusto quibusdam Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi repellendus, doloremque dicta error exercitationem sed excepturi accusantium officiis placeat blanditiis? Eveniet iusto quibusdam Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi repellendus, doloremque dicta error exercitationem sed excepturi accusantium officiis placeat blanditiis? Eveniet iusto quibusdam Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi repellendus, doloremque dicta error exercitationem sed excepturi accusantium officiis placeat blanditiis? Eveniet iusto quibusdam Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi repellendus, doloremque dicta error exercitationem sed excepturi accusantium officiis placeat blanditiis? Eveniet iusto quibusdam ', 'gdfgfdgfhgh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4-5 days', '', 1, '2021-05-30 23:30:12', '2021-05-31 00:43:01'),
(6, 'product 6', 'upload/product/731060899product.jpg', 1, NULL, 100000, 5, 105000, 44, 1, 8, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi repellendus, doloremque dicta error exercitationem sed excepturi accusantium officiis placeat blanditiis? Eveniet iusto quibusdam Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi repellendus, doloremque dicta error exercitationem sed excepturi accusantium officiis placeat blanditiis? Eveniet iusto quibusdam Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi repellendus, doloremque dicta error exercitationem sed excepturi accusantium officiis placeat blanditiis? Eveniet iusto quibusdam Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi repellendus, doloremque dicta error exercitationem sed excepturi accusantium officiis placeat blanditiis? Eveniet iusto quibusdam Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi repellendus, doloremque dicta error exercitationem sed excepturi accusantium officiis placeat blanditiis? Eveniet iusto quibusdam Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi repellendus, doloremque dicta error exercitationem sed excepturi accusantium officiis placeat blanditiis? Eveniet iusto quibusdam Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi repellendus, doloremque dicta error exercitationem sed excepturi accusantium officiis placeat blanditiis? Eveniet iusto quibusdam Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi repellendus, doloremque dicta error exercitationem sed excepturi accusantium officiis placeat blanditiis? Eveniet iusto quibusdam Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi repellendus, doloremque dicta error exercitationem sed excepturi accusantium officiis placeat blanditiis? Eveniet iusto quibusdam Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi repellendus, doloremque dicta error exercitationem sed excepturi accusantium officiis placeat blanditiis? Eveniet iusto quibusdam Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi repellendus, doloremque dicta error exercitationem sed excepturi accusantium officiis placeat blanditiis? Eveniet iusto quibusdam Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi repellendus, doloremque dicta error exercitationem sed excepturi accusantium officiis placeat blanditiis? Eveniet iusto quibusdam Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi repellendus, doloremque dicta error exercitationem sed excepturi accusantium officiis placeat blanditiis? Eveniet iusto quibusdam Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi repellendus, doloremque dicta error exercitationem sed excepturi accusantium officiis placeat blanditiis? Eveniet iusto quibusdam Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi repellendus, doloremque dicta error exercitationem sed excepturi accusantium officiis placeat blanditiis? Eveniet iusto quibusdam Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi repellendus, doloremque dicta error exercitationem sed excepturi accusantium officiis placeat blanditiis? Eveniet iusto quibusdam Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi repellendus, doloremque dicta error exercitationem sed excepturi accusantium officiis placeat blanditiis? Eveniet iusto quibusdam Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi repellendus, doloremque dicta error exercitationem sed excepturi accusantium officiis placeat blanditiis? Eveniet iusto quibusdam Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi repellendus, doloremque dicta error exercitationem sed excepturi accusantium officiis placeat blanditiis? Eveniet iusto quibusdam Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi repellendus, doloremque dicta error exercitationem sed excepturi accusantium officiis placeat blanditiis? Eveniet iusto quibusdam Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi repellendus, doloremque dicta error exercitationem sed excepturi accusantium officiis placeat blanditiis? Eveniet iusto quibusdam Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi repellendus, doloremque dicta error exercitationem sed excepturi accusantium officiis placeat blanditiis? Eveniet iusto quibusdam Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi repellendus, doloremque dicta error exercitationem sed excepturi accusantium officiis placeat blanditiis? Eveniet iusto quibusdam Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi repellendus, doloremque dicta error exercitationem sed excepturi accusantium officiis placeat blanditiis? Eveniet iusto quibusdam ', 'fdsfds', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4-5 days', '', 1, '2021-05-31 00:54:34', '2021-05-31 00:58:12'),
(7, 'Product 7', 'upload/product/155852008product.jpg', 1, 1, 5555, 5, 5832.75, 55, 1, 8, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi repellendus, doloremque dicta error exercitationem sed excepturi accusantium officiis placeat blanditiis? Eveniet iusto quibusdam Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi repellendus, doloremque dicta error exercitationem sed excepturi accusantium officiis placeat blanditiis? Eveniet iusto quibusdam Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi repellendus, doloremque dicta error exercitationem sed excepturi accusantium officiis placeat blanditiis? Eveniet iusto quibusdam Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi repellendus, doloremque dicta error exercitationem sed excepturi accusantium officiis placeat blanditiis? Eveniet iusto quibusdam Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi repellendus, doloremque dicta error exercitationem sed excepturi accusantium officiis placeat blanditiis? Eveniet iusto quibusdam Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi repellendus, doloremque dicta error exercitationem sed excepturi accusantium officiis placeat blanditiis? Eveniet iusto quibusdam Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi repellendus, doloremque dicta error exercitationem sed excepturi accusantium officiis placeat blanditiis? Eveniet iusto quibusdam Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi repellendus, doloremque dicta error exercitationem sed excepturi accusantium officiis placeat blanditiis? Eveniet iusto quibusdam Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi repellendus, doloremque dicta error exercitationem sed excepturi accusantium officiis placeat blanditiis? Eveniet iusto quibusdam Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi repellendus, doloremque dicta error exercitationem sed excepturi accusantium officiis placeat blanditiis? Eveniet iusto quibusdam Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi repellendus, doloremque dicta error exercitationem sed excepturi accusantium officiis placeat blanditiis? Eveniet iusto quibusdam ', 'short description goes here', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4-5 days', '', 1, '2021-05-31 18:02:53', '2021-05-31 18:02:53'),
(8, 'Product 8', 'upload/product/686269357product.jpg', 1, NULL, 500, 5, 525, 44, 1, 8, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi repellendus, doloremque dicta error exercitationem sed excepturi accusantium officiis placeat blanditiis? Eveniet iusto quibusdam Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi repellendus, doloremque dicta error exercitationem sed excepturi accusantium officiis placeat blanditiis? Eveniet iusto quibusdam Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi repellendus, doloremque dicta error exercitationem sed excepturi accusantium officiis placeat blanditiis? Eveniet iusto quibusdam Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi repellendus, doloremque dicta error exercitationem sed excepturi accusantium officiis placeat blanditiis? Eveniet iusto quibusdam Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi repellendus, doloremque dicta error exercitationem sed excepturi accusantium officiis placeat blanditiis? Eveniet iusto quibusdam Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi repellendus, doloremque dicta error exercitationem sed excepturi accusantium officiis placeat blanditiis? Eveniet iusto quibusdam Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi repellendus, doloremque dicta error exercitationem sed excepturi accusantium officiis placeat blanditiis? Eveniet iusto quibusdam Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi repellendus, doloremque dicta error exercitationem sed excepturi accusantium officiis placeat blanditiis? Eveniet iusto quibusdam Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi repellendus, doloremque dicta error exercitationem sed excepturi accusantium officiis placeat blanditiis? Eveniet iusto quibusdam Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi repellendus, doloremque dicta error exercitationem sed excepturi accusantium officiis placeat blanditiis? Eveniet iusto quibusdam Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi repellendus, doloremque dicta error exercitationem sed excepturi accusantium officiis placeat blanditiis? Eveniet iusto quibusdam Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi repellendus, doloremque dicta error exercitationem sed excepturi accusantium officiis placeat blanditiis? Eveniet iusto quibusdam Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi repellendus, doloremque dicta error exercitationem sed excepturi accusantium officiis placeat blanditiis? Eveniet iusto quibusdam', 'shor description goes hereshor description goes hereshor description goes here', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4-5 days', '', 1, '2021-05-31 18:03:51', '2021-06-14 18:02:50'),
(9, 'Product 9', 'upload/product/2053388292product.jpg', 1, NULL, 100, 5, 105, 44, 1, 8, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi repellendus, doloremque dicta error exercitationem sed excepturi accusantium officiis placeat blanditiis? Eveniet iusto quibusdam Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi repellendus, doloremque dicta error exercitationem sed excepturi accusantium officiis placeat blanditiis? Eveniet iusto quibusdam Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi repellendus, doloremque dicta error exercitationem sed excepturi accusantium officiis placeat blanditiis? Eveniet iusto quibusdam Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi repellendus, doloremque dicta error exercitationem sed excepturi accusantium officiis placeat blanditiis? Eveniet iusto quibusdam Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi repellendus, doloremque dicta error exercitationem sed excepturi accusantium officiis placeat blanditiis? Eveniet iusto quibusdam Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi repellendus, doloremque dicta error exercitationem sed excepturi accusantium officiis placeat blanditiis? Eveniet iusto quibusdam Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi repellendus, doloremque dicta error exercitationem sed excepturi accusantium officiis placeat blanditiis? Eveniet iusto quibusdam Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi repellendus, doloremque dicta error exercitationem sed excepturi accusantium officiis placeat blanditiis? Eveniet iusto quibusdam Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi repellendus, doloremque dicta error exercitationem sed excepturi accusantium officiis placeat blanditiis? Eveniet iusto quibusdam Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi repellendus, doloremque dicta error exercitationem sed excepturi accusantium officiis placeat blanditiis? Eveniet iusto quibusdam', 'short description goes hereLong description goes hereLong description goes here', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4-5 days', '', 1, '2021-05-31 18:05:20', '2021-06-14 17:01:57'),
(10, 'product 10', 'upload/product/1703568233product.jpg', 1, NULL, 100, 5, 105, 44, 1, 8, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi repellendus, doloremque dicta error exercitationem sed excepturi accusantium officiis placeat blanditiis? Eveniet iusto quibusdam Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi repellendus, doloremque dicta error exercitationem sed excepturi accusantium officiis placeat blanditiis? Eveniet iusto quibusdam Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi repellendus, doloremque dicta error exercitationem sed excepturi accusantium officiis placeat blanditiis? Eveniet iusto quibusdam Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi repellendus, doloremque dicta error exercitationem sed excepturi accusantium officiis placeat blanditiis? Eveniet iusto quibusdam Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi repellendus, doloremque dicta error exercitationem sed excepturi accusantium officiis placeat blanditiis? Eveniet iusto quibusdam Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi repellendus, doloremque dicta error exercitationem sed excepturi accusantium officiis placeat blanditiis? Eveniet iusto quibusdam', 'short description goes hereLong description goes hereLong description goes hereLong description goes here', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4-9 days', '', 1, '2021-05-31 18:06:02', '2021-06-14 17:27:00'),
(11, 'Ashok Mehta', 'upload/product/71874023product.png', 2, NULL, 100, 5, 105, 44, 1, 8, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi esse atque nulla at cumque quaerat, aspernatur, voluptatum distinctio ullam necessitatibus perferendis exercitationem unde dignissimos debitis!</p><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi esse atque nulla at cumque quaerat, aspernatur, voluptatum distinctio ullam necessitatibus perferendis exercitationem unde dignissimos debitis!Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi esse atque nulla at cumque quaerat, aspernatur, voluptatum distinctio ullam necessitatibus perferendis exercitationem unde dignissimos debitis!Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi esse atque nulla at cumque quaerat, aspernatur, voluptatum distinctio ullam necessitatibus perferendis exercitationem unde dignissimos debitis!<br></p>', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi esse atque nulla at cumque quaerat, aspernatur, voluptatum distinctio ullam necessitatibus perferendis exercitationem unde dignissimos debitis!', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4-5 days', '', 1, '2021-06-12 22:56:48', '2021-06-14 17:00:34'),
(12, 'Product9', 'upload/product/353755953product.jpg', 3, NULL, 500, 5, 525, 44, 1, 8, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, '<div>      Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi, id?</div><div>             Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi, id?      Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi, id?</div><div>             Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi, id?      Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi, id?</div><div>             Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi, id?</div>', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi, id?\r\n             Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi, id?\r\n             Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi, id?', NULL, 'upload/product/444380992product.jpg', 'upload/product/1602270719product.jpg', 'upload/product/1295543797product.jpg', 'upload/product/580972919product.jpg', '<p>sdfdsf</p>', 'dsfd', '4-5 days', '', 1, '2021-06-15 04:55:54', '2021-06-15 05:28:56'),
(13, 'product10', 'upload/product/1544340783product.jpg', 3, NULL, 100, 5, 105, 44, 1, 8, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, '<div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam numquam sapiente, saepe quam sit assumenda exercitationem et voluptate eum similique!</div><div><div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam numquam sapiente, saepe quam sit assumenda exercitationem et voluptate eum similique!</div></div><div><div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam numquam sapiente, saepe quam sit assumenda exercitationem et voluptate eum similique!</div></div><div><div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam numquam sapiente, saepe quam sit assumenda exercitationem et voluptate eum similique!</div></div><div><br></div>', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam numquam sapiente, saepe quam sit assumenda exercitationem et voluptate eum similique!\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam numquam sapiente, saepe quam sit assumenda exercitationem et voluptate eum similique!', NULL, 'upload/product/1542477342product.jpg', 'upload/product/514954940product.jpg', 'upload/product/1859729641product.jpg', 'upload/product/58050943product.jpg', '<p>fgdgf</p>', 'asfdsfdsg', '4-5 days', '', 1, '2021-06-15 05:07:44', '2021-06-15 05:28:36'),
(14, 'product 14', 'upload/product/647867491product.jpg', 3, NULL, 500, 5, 525, 44, 1, 8, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, '<div> Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi, id?</div><div>             Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi, id? Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi, id?</div><div>             Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi, id? Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi, id?</div><div>             Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi, id? Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi, id?</div><div>             Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi, id?</div>', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi, id?\r\n             Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi, id?', NULL, 'upload/product/306215022productf.jpg', 'upload/product/1388836668productb.jpg', 'upload/product/1311653168productl.jpg', 'upload/product/392923485productr.jpg', '<p>&nbsp;Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi, id?</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi, id?&nbsp;Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi, id?</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi, id?&nbsp;Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi, id?</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi, id?&nbsp;Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi, id?</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi, id?&nbsp;Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi, id?</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi, id?</p>', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi, id?\r\n             Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi, id? Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi, id?\r\n             Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi, id? Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi, id?\r\n             Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi, id? Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi, id?\r\n             Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi, id?', '4-5 days', '', 1, '2021-06-15 05:10:33', '2021-06-15 05:28:04'),
(15, 'product 15', 'upload/product/1975607112product.jpg', 2, NULL, 100, 5, 105, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, 'I-phone-koho koho-1', 'I-phone-koho koho-23', 'I-phone-koho koho', '<div> ;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Neque aliquid eius tenetur cum cupiditate, quod eum quis in facilis ut.</div><div><div> ;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Neque aliquid eius tenetur cum cupiditate, quod eum quis in facilis ut.</div></div><div><br></div>', ';Lorem, ipsum dolor sit amet consectetur adipisicing elit. Neque aliquid eius tenetur cum cupiditate, quod eum quis in facilis ut.', NULL, 'upload/product/2061874759product.jpg', 'upload/product/1248340627product.jpg', 'upload/product/2070024080product.jpg', 'upload/product/1428949177product.jpg', '<p>;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Neque aliquid eius tenetur cum cupiditate, quod eum quis in facilis ut.</p><p>&nbsp;;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Neque aliquid eius tenetur cum cupiditate, quod eum quis in facilis ut.</p>', ';Lorem, ipsum dolor sit amet consectetur adipisicing elit. Neque aliquid eius tenetur cum cupiditate, quod eum quis in facilis ut.\r\n ;Lorem, ipsum dolor sit amet consectetur adipisicing elit. Neque aliquid eius tenetur cum cupiditate, quod eum quis in facilis ut.', '4-9 days', 'Male', 1, '2021-06-15 05:42:40', '2021-07-03 03:59:34'),
(16, 'prod17', 'upload/product/1647573318product.png', 2, 3, 100, 5, 105, 44, NULL, NULL, 1, 1, 1, 1, NULL, NULL, NULL, NULL, '<div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita ratione eaque inventore alias delectus consequuntur ipsa iste, nemo animi quod aut optio eos recusandae veritatis corporis a iure aperiam quae sequi voluptatibus vitae tenetur quam voluptatum? Tempora ratione deserunt iure ex corporis porro veniam voluptatibus. Adipisci quidem, enim magnam perferendis dolore dolorem hic itaque accusamus voluptatibus esse explicabo rem et in sit dolores, ullam eos vero, nobis ex! Assumenda fugiat officia nostrum aspernatur ipsam temporibus ducimus reiciendis distinctio, ea vitae quisquam dicta repudiandae impedit reprehenderit id nemo quibusdam! Tenetur, harum!</div><div><br></div>', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita ratione eaque inventore alias delectus consequuntur ipsa iste, nemo animi quod aut optio eos recusandae veritatis corporis a iure aperiam quae sequi voluptatibus vitae tenetur quam voluptatum? Tempora ratione deserunt iure ex corporis porro veniam voluptatibus. Adipisci quidem, enim magnam perferendis dolore dolorem hic itaque accusamus voluptatibus esse explicabo rem et in sit dolores, ullam eos vero, nobis ex! Assumenda fugiat officia nostrum aspernatur ipsam temporibus ducimus reiciendis distinctio, ea vitae quisquam dicta repudiandae impedit reprehenderit id nemo quibusdam! Tenetur, harum!', NULL, 'upload/product/326385334productf.png', 'upload/product/1616002600productb.png', 'upload/product/643920040productl.png', 'upload/product/1357655414productr.png', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita ratione eaque inventore alias delectus consequuntur ipsa iste, nemo animi quod aut optio eos recusandae veritatis corporis a iure aperiam quae sequi voluptatibus vitae tenetur quam voluptatum? Tempora ratione deserunt iure ex corporis porro veniam voluptatibus. Adipisci quidem, enim magnam perferendis dolore dolorem hic itaque accusamus voluptatibus esse explicabo rem et in sit dolores, ullam eos vero, nobis ex! Assumenda fugiat officia nostrum aspernatur ipsam temporibus ducimus reiciendis distinctio, ea vitae quisquam dicta repudiandae impedit reprehenderit id nemo quibusdam! Tenetur, harum!</p><div><br></div>', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita ratione eaque inventore alias delectus consequuntur ipsa iste, nemo animi quod aut optio eos recusandae veritatis corporis a iure aperiam quae sequi voluptatibus vitae tenetur quam voluptatum? Tempora ratione deserunt iure ex corporis porro veniam voluptatibus. Adipisci quidem, enim magnam perferendis dolore dolorem hic itaque accusamus voluptatibus esse explicabo rem et in sit dolores, ullam eos vero, nobis ex! Assumenda fugiat officia nostrum aspernatur ipsam temporibus ducimus reiciendis distinctio, ea vitae quisquam dicta repudiandae impedit reprehenderit id nemo quibusdam! Tenetur, harum!', '4-5 days', 'Female', 1, '2021-06-25 21:04:37', '2021-06-25 21:04:37'),
(17, 'sdfdf', 'upload/product/1670350372product.png', 1, NULL, 10, 5, 10.5, 55, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'dfdfdf', 'dfds', NULL, 'upload/product/161958689product.jpg', 'upload/product/385812546product.jpg', 'upload/product/1642836388product.jpg', 'upload/product/2020737120product.png', '<p>dfds</p>', 'fddf', '4-5 days', 'Male', 1, '2021-06-30 06:43:29', '2021-06-30 06:45:56'),
(18, 'Ashok Mehta', 'upload/product/319814427product.jpg', 3, NULL, 10, 5, 10.5, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, 'ghhggh', 'dsgdfg', NULL, 'upload/product/241328784productf.jpg', 'upload/product/1851387032productb.jpg', 'upload/product/1751310950product.png', NULL, '<p>fdhg</p>', 'dfgh', '4-9 days', 'Male', 1, '2021-06-30 06:48:53', '2021-06-30 06:53:01'),
(19, 'afsdf', 'upload/product/1325397065product.png', 2, NULL, 10, 5, 10.5, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fdgf', 'sdgfvdsgb', NULL, 'upload/product/249323371productf.jpg', 'upload/product/849869185productb.jpg', 'upload/product/318347084productl.jpg', 'upload/product/536815019productr.jpg', '<p>fdgbhfg</p>', 'fdgf', '4-5 days', 'Male', 1, '2021-06-30 06:52:37', '2021-07-03 04:11:03'),
(20, 'producte', 'upload/product/2012254141product.png', 2, NULL, 500, 5, 525, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ghghgh', 'rsgrdrhd', NULL, 'upload/product/580737394productf.jpg', 'upload/product/1666126606productb.jpg', 'upload/product/1426950418productl.jpg', 'upload/product/1997780030productr.jpg', '<p>fhg</p>', 'fghggh', '4-5 days', 'Male', 1, '2021-06-30 06:54:01', '2021-07-03 05:56:37'),
(21, 'Blue Art', 'upload/product/411845604product.jpg', 1, NULL, 10000, 5, 10500, NULL, 1, 2, NULL, NULL, NULL, NULL, NULL, 'Art', 'Handmade, Hand painted, Art', 'handmade, handpainted, art', 'Handmade Oil Painting. Around 3 years old.', 'Handmade Oil Painting', NULL, 'upload/product/1837786945product.jpg', NULL, NULL, NULL, '<p>Oil Paint</p>', 'No Returns Accepted', '3 days', 'Male', 1, '2021-07-02 15:36:05', '2021-07-02 15:52:44'),
(22, 'Ashok Mehta', 'upload/product/317610658product.png', 1, NULL, 10, 5, 10.5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'g7g98989hhi iuhhhuohh ouhhohhih ', 'hjh', NULL, NULL, NULL, NULL, NULL, '<p>ugou ouiho&nbsp;</p>', 'iughhui h008u0 980u0uj', '4-5 days', 'Male', 1, '2021-07-03 04:07:45', '2021-07-03 04:08:34'),
(23, 'MehtaTEttessadfes', 'upload/product/316108958product.png', 2, 3, 10, 5, 10.5, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'rdtgvbdrtf ryhrt', 'afers', NULL, 'upload/product/927794989product.png', 'upload/product/47294832product.png', 'upload/product/150358940product.png', NULL, '<p>rfgtrdh tfu6</p>', 'rdyhrt deyrtf', '4-5 days', 'Male', 1, '2021-07-03 04:12:29', '2021-07-05 03:09:33'),
(24, 'boxkraft', 'upload/product/1311800370product.jpg', 1, NULL, 12345, 5, 12962.2, NULL, 41, 11, NULL, NULL, NULL, NULL, NULL, 'BoxKraft', NULL, NULL, 'test', 'tet', NULL, 'upload/product/120973036productf.jpg', 'upload/product/954104554productb.jpg', 'upload/product/460223851productl.jpg', NULL, 'tet', 'tet', '2 days', 'Male', 1, '2021-07-04 15:58:10', '2021-07-09 13:23:53'),
(25, 'ddd', 'upload/product/349078710product.jpg', 1, NULL, 47888, 5, 50282.4, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, 'fg', 'fg', 'fg', 'fgsfdg', 'desc', NULL, 'upload/product/1040172397product.jpg', 'upload/product/312835651product.jpg', 'upload/product/1273875009product.jpg', 'upload/product/1270850389product.jpg', 'dsfg', 'sdfgdsg', 'Estimated 2-3 Days', 'Male', 1, '2021-07-05 03:19:25', '2021-07-06 03:30:52'),
(26, 'Ashok Mehta', 'upload/product/176782839product.jpg', 3, 4, 100, 5, 105, NULL, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ghfg', 'vfhbgfc', NULL, 'upload/product/706959242productf.jpg', 'upload/product/270172615productb.jpg', 'upload/product/1392858014productl.jpg', 'upload/product/1334342652productr.jpg', '<p>cfghg</p>', 'ghgh', '4-5 days', 'Female', 1, '2021-07-06 03:32:05', '2021-07-06 03:32:05'),
(27, 'test product', 'upload/product/1340559627product.jpg', 2, 3, 10000, 5, 10500, NULL, NULL, NULL, 1, 1, 1, 1, NULL, 'test product', 'test product', 'test product', 'test', 'test', NULL, 'upload/product/1953543435productf.jpg', 'upload/product/1146799822productb.jpg', 'upload/product/1830496318productl.jpg', 'upload/product/86050498productr.jpg', '<p>test</p>', 'testtest', '2 days', 'Male', 0, '2021-07-09 01:46:44', '2021-07-09 01:46:44');

-- --------------------------------------------------------

--
-- Table structure for table `productvariations`
--

CREATE TABLE `productvariations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vendor_id` int(11) DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `variation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comission` float NOT NULL,
  `price_after_comission` float NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `sku` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `productvariations`
--

INSERT INTO `productvariations` (`id`, `vendor_id`, `product_id`, `variation`, `image`, `price`, `comission`, `price_after_comission`, `quantity`, `sku`, `status`, `created_at`, `updated_at`) VALUES
(3, 1, 1, '2gb/38gb', NULL, '1000', 5, 1050, NULL, NULL, 1, '2021-05-30 01:25:23', '2021-05-30 01:27:15'),
(4, 1, 3, '2gb/38gb', NULL, '1000', 5, 1050, NULL, NULL, 0, '2021-05-31 00:50:23', '2021-05-31 00:51:43'),
(5, NULL, 6, '2gb/38gb', NULL, '1000', 5, 1050, NULL, NULL, 0, '2021-05-31 00:58:37', '2021-05-31 01:01:58'),
(6, NULL, 6, '8gb/64gb', NULL, '10000', 5, 10500, NULL, NULL, 1, '2021-05-31 07:09:00', '2021-05-31 07:09:00'),
(7, NULL, 6, '3gb/32gb', NULL, '5000', 5, 525, NULL, NULL, 1, '2021-05-31 07:09:13', '2021-05-31 07:09:13');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('5TlL6c1koE3EEXMbRAaext7Mw1vxNvyBG3hFyVf6', NULL, '192.36.71.133', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWFYxbXJ6eWRjOWRUUzJKd0RwTnF5RGpGR2FnYm5ZbHlWUEtxQU5DQSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjA6Imh0dHA6Ly9rcmFmZnRib3guY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1626214569),
('aU8dLeOhaBJmGdFPGM2g46eLgh9vxOM50Zm7zAcX', NULL, '54.36.148.123', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiV2g4M2dXSHFXeEQ5YUtCNktUZXd4cmVNcXk0THc2MXQzcEQwbWpRWCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjA6Imh0dHA6Ly9rcmFmZnRib3guY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1626220865),
('cMRDgQyk09rgxrQx5L8F12mI0OL1fi7fq1Mvx0Th', NULL, '54.36.148.15', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidHdHWkRVcWJ3Y1RPaDNQeHlpak1aMURJRXk5WXh4Yk8zaEpTNjlqSyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHA6Ly93d3cua3JhZmZ0Ym94LmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1626226621),
('ErFhoZhGDroxBZphP2d4JITO5Z8b3ICQ3Wxb4Uf8', NULL, '54.36.148.93', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiU1VIYzZrVFMxejllZmVvckVjUjlER21pbUd5ZWxDSFY5dTBTajZnRiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHBzOi8va3JhZmZ0Ym94LmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1626223251),
('fmaQPX6GJOxdJImUBy4LO7BNKCiSU6tDrQdKGSBr', NULL, '34.86.35.6', 'Expanse, a Palo Alto Networks company, searches across the global IPv4 space multiple times per day to identify customers&#39; presences on the Internet. If you would like to be excluded from our scans, please send IP addresses/domains to: scaninfo@paloaltonetworks.com', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVFh1eGprMEJzVWZhZXFwdzJPa3RLbXlhd1NRQ1hxMTVORXp5dDF6UiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHBzOi8va3JhZmZ0Ym94LmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1626215842),
('ISzyDtB3LXDXLBuxmGVxgUtwjOqjZU7ISC8dll8t', NULL, '103.10.29.81', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiN2xhZ2xFanBhRk5yUWZDT0VSaFpqM3dmMFBlTFFiU2FCQmdnR3RqUSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHBzOi8va3JhZmZ0Ym94LmNvbS92ZW5kb3IvcmVnaXN0ZXIiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUyOiJsb2dpbl9hZG1pbl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyODoiaHR0cHM6Ly9rcmFmZnRib3guY29tL2xvZ291dCI7fX0=', 1626225138),
('jgvGIg47dpXcMruAgHgA62b79sIganrEiQt02Rh5', NULL, '66.249.68.80', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.90 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNlVNU2tubnI1bDZheEhxMlpQaHFBcGdFcXNqUlBpVG8zNzdobXcybSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTA6Imh0dHBzOi8vd3d3LmtyYWZmdGJveC5jb20vcHJvZHVjdC8xMS9Bc2hvayUyME1laHRhIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1626234877),
('jz6TtwhO3awE0hmm7YTH5jDhq4pgzgfD1s0TXWPG', NULL, '34.77.162.9', 'Expanse, a Palo Alto Networks company, searches across the global IPv4 space multiple times per day to identify customers&#39; presences on the Internet. If you would like to be excluded from our scans, please send IP addresses/domains to: scaninfo@paloaltonetworks.com', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNHpMQnp0RVNkZ2d0S2F5dW9KU3Z3bnQ1a1JMWFZDWmtydDdZUmEwcSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDA6Imh0dHBzOi8va3JhZmZ0Ym94LmZhbGNvbnRyYWRlcnNuZXBhbC5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1626244035),
('kR5Mn0BgYCrSLFYJVYV5ClPhhjtJ4fxlYXirtaBb', NULL, '45.129.18.23', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.47 Safari/537.36', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiOUViZEp2Q2JMMlVSdnNpU214NVJQVHprUWVyc21ibXRsZlp1QmNuTiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1626244578),
('kYndJVQGvK6ro1ByjJHwPmzt2wZIKmPtk3a4H05x', NULL, '34.86.35.15', 'Expanse, a Palo Alto Networks company, searches across the global IPv4 space multiple times per day to identify customers&#39; presences on the Internet. If you would like to be excluded from our scans, please send IP addresses/domains to: scaninfo@paloaltonetworks.com', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoieFpKRXgxUmo4a0hNblZITzhPN1ZEdlFodkFobUppdlBNTmpQYUMwSSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHA6Ly93d3cua3JhZmZ0Ym94LmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1626219141),
('mBc62bYUdf8juvSBSFzM2xdzmQIFYaRHTh0XSbue', NULL, '173.252.127.8', 'facebookexternalhit/1.1 (+http://www.facebook.com/externalhit_uatext.php)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibDN2Y3dTZmNIQ2lrbUl3d0dFbW13RGNiUGJiczBDQlhITUlxdXVIcyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjA6Imh0dHA6Ly9rcmFmZnRib3guY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1626237422),
('mISxfcRmAVxVZ86Izip8wswYuapshXI8ZjzRoFvE', NULL, '157.55.39.89', 'Mozilla/5.0 (compatible; bingbot/2.0; +http://www.bing.com/bingbot.htm)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoid2JuTWhnQW8yMVB6NkNnR0RLUUZOVWFtUXRZNUYxTkNxS3Ftd3V1bCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHBzOi8va3JhZmZ0Ym94LmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1626227614),
('NB95rz6e32s4rPwYT3LboYT7ZJMtaby94iDEDXH0', NULL, '103.10.29.81', 'Mozilla/5.0 (Linux; Android 9; INE-LX2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.101 Mobile Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSGgyaDljOVM5bUtEZFZBQ1VETXZMbmliN2JVWWZJTURCb1FXRGJiOCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjA6Imh0dHA6Ly9rcmFmZnRib3guY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1626223046),
('qfPqNdxGULFzSXjV5J2wVBgWBmeUAoeGVuWHOE65', NULL, '173.252.127.118', 'facebookexternalhit/1.1 (+http://www.facebook.com/externalhit_uatext.php)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoieWhoUXBhQ2JJZW9iaUFKNmo0SGtiV2JmM041dGIwYUlSNFozQ0x0WCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjA6Imh0dHA6Ly9rcmFmZnRib3guY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1626237424),
('TAyAWaKIn2LOBymn8hgT8C2twcHfJ9ixdzTa67cc', NULL, '66.249.68.37', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.90 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoieUJCTzlxd2JSRWI4OTNhNFI4SkRlZ3kzbmREaHBuajNRY3MxN2RLMyI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozOToiaHR0cHM6Ly9rcmFmZnRib3guY29tL3dpc2hsaXN0L3N0b3JlLzE5Ijt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHBzOi8va3JhZmZ0Ym94LmNvbS9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1626237316),
('U4CbLeG3lmPpKXTPAaVeC4L7eoPF640xSkvZIYBY', NULL, '66.249.68.80', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiU3hHZ0FrSGJrSXFaeHlWejRKSEdwQTBGeVN1ZWx5dlFGMTdKbjFndiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTA6Imh0dHBzOi8vd3d3LmtyYWZmdGJveC5jb20vcHJvZHVjdC8xMS9Bc2hvayUyME1laHRhIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1626215995),
('UZhHT8LXniewa3NN1OA7lo7XKD6kR3iAwl7tMdrn', NULL, '54.36.149.33', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaGhrOEdoRjJsYTEyZk5nSFRFMndyd3JuWG1kSERDa0UzSkhsWXpSWSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjU6Imh0dHBzOi8vd3d3LmtyYWZmdGJveC5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1626229889),
('vgUjgeArxrT8y3ntbJcq5YxWECilvOwnueFQD0rm', NULL, '66.249.68.80', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibHpENno5bHFTdmlaQkpuVUdHOGZzcGR6MHlLODJKTFBoMURtOGY2ZiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjU6Imh0dHBzOi8vd3d3LmtyYWZmdGJveC5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1626226972);

-- --------------------------------------------------------

--
-- Table structure for table `shippings`
--

CREATE TABLE `shippings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `vendor_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `district` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shippings`
--

INSERT INTO `shippings` (`id`, `order_id`, `vendor_id`, `name`, `email`, `phone`, `state`, `district`, `city`, `zip`, `created_at`, `updated_at`) VALUES
(89, 93, NULL, 'KarenMatthews', 'admin@admin.com', '9813519397', 'Louisiana', NULL, 'cvc', '70126', NULL, NULL),
(90, 94, NULL, 'AshokMehta', 'ashokmehta123y@gmail.com', '9813519397', 'sdfsf', NULL, 'dfsdfddsf', 'fddffd', NULL, NULL),
(91, 95, NULL, 'AshokMehta', 'ashokmehta123y@gmail.com', '9813519397', 'sdfsf', NULL, 'dfsdfddsf', 'fddffd', NULL, NULL),
(92, 96, NULL, 'AshokMehta', 'ashokmehta123y@gmail.com', '+9779813519397', 'Kosi', NULL, 'errgf', '2046', NULL, NULL),
(93, 97, NULL, 'KarenMatthews', 'ashokmehta123y@gmail.com', '9813519397', 'Louisiana', NULL, 'dsffdsfds', '70126', NULL, NULL),
(94, 98, NULL, 'KarenMatthews', 'ashokmehta123y@gmail.com', '9813519397', 'Louisiana', NULL, 'ertr', '70126', NULL, NULL),
(95, 99, NULL, 'KarenMatthews', 'ashokmehta123y@gmail.com', '9813519397', 'Louisiana', NULL, 'ertr', '70126', NULL, NULL),
(96, 100, NULL, 'AshokMehta', 'ashokmehta123y@gmail.com', '+9779813519397', 'Kosi', NULL, 'sgdfg', '2046', NULL, NULL),
(97, 101, NULL, 'AshokMehta', 'ashokmehta123y@gmail.com', '+9779813519397', 'Kosi', NULL, 'sgdfg', '2046', NULL, NULL),
(98, 102, NULL, 'AshokMehta', 'ashokmehta123y@gmail.com', '+9779813519397', 'Kosi', NULL, 'gfhngbjnhgjhj', '2046', NULL, NULL),
(99, 103, NULL, 'AshokMehta', 'ashokmehta123y@gmail.com', '+9779813519397', 'Kosi', NULL, 'fdhgf', '2046', NULL, NULL),
(100, 104, NULL, 'KarenMatthews', 'admin@admin.com', '9813519397', 'Louisiana', NULL, 'gfhfgh', '70126', NULL, NULL),
(101, 105, NULL, 'KarenMatthews', 'admin@admin.com', '9813519397', 'Louisiana', NULL, 'setst', '70126', NULL, NULL),
(102, 106, NULL, 'AshokMehta', 'ashokmehta123y@gmail.com', '9813519397', 'Kosi', NULL, 'werfew', 'fddffd', NULL, NULL),
(103, 107, NULL, 'AshokMehta', 'ashokmehta123y@gmail.com', '9813519397', 'Kosi', NULL, 'werfew', 'fddffd', NULL, NULL),
(104, 108, NULL, 'AshokMehta', 'ashokmehta123y@gmail.com', '9813519397', 'Louisiana', NULL, 'sfdsf', 'fddffd', NULL, NULL),
(105, 109, NULL, 'AshokMehta', 'ashokmehta123y@gmail.com', '9813519397', 'Kosi', NULL, 'dddd', 'fddffd', NULL, NULL),
(106, 110, NULL, 'sm', 'sujnmaha@gmail.com', '1234567890', '3', NULL, 'asd', '3', NULL, NULL),
(107, 111, NULL, 'Sujit123', 'sujnmaha@gmail.com', '123', '123', NULL, '213', '123', NULL, NULL),
(108, 112, NULL, 'AshokMehta', 'ashokmehta123y@gmail.com', '9813519397', 'yyyy', NULL, 'ujji', 'fddffd', NULL, NULL),
(109, 113, NULL, 'AshokMehta', 'ashokmehta123y@gmail.com', '+9779813519397', 'Kosi', NULL, 'p[p[', '2046', NULL, NULL),
(110, 114, NULL, 'AshokMehta', 'ashokmehta123y@gmail.com', '+9779813519397', 'Kosi', NULL, 'p[p[', '2046', NULL, NULL),
(111, 115, NULL, 'AshokMehta', 'ashokmehta123y@gmail.com', '9813519397', 'Bagmati', NULL, 'egrtf5', 'fddffd', NULL, NULL),
(112, 116, NULL, 'AshokMehta', 'ashokmehta123y@gmail.com', '9813519397', 'Kosi', NULL, 't5rt', 'fddffd', NULL, NULL),
(113, 117, NULL, 'AshokMehta', 'ashokmehta123y@gmail.com', '9813519397', 'Kosi', NULL, 'hhhhh', 'fddffd', NULL, NULL),
(114, 118, NULL, 'KarenMatthews', 'ashokmehta1234y@gmail.com', '9813519397', 'Louisiana', NULL, 'drgtfrf', '70126', NULL, NULL),
(115, 119, NULL, 'KarenMatthews', 'ashokmehta1234y@gmail.com', '9813519397', 'Louisiana', NULL, 'drgtfrf', '70126', NULL, NULL),
(116, 120, NULL, 'AshokMehta', 'ashokmehta123y@gmail.com', '+9779813519397', 'Kosi', NULL, 'drtyhjt', '2046', NULL, NULL),
(117, 121, NULL, 'AshokMehta', 'ashokmehta123y@gmail.com', '+9779813519397', 'Kosi', NULL, 'er5y54rtyu6', '2046', NULL, NULL),
(118, 122, NULL, 'AshokMehta', 'ashokmehta123y@gmail.com', '+9779813519397', 'Kosi', NULL, 'fggnjhmg', '2046', NULL, NULL),
(119, 123, NULL, 'AshokMehta', 'ashokmehta123y@gmail.com', '+9779813519397', 'Kosi', NULL, 'dfhy', '2046', NULL, NULL),
(120, 124, NULL, 'AshokMehta', 'ashokmehta123y@gmail.com', '+9779813519397', 'Kosi', NULL, 'rtfyh', '2046', NULL, NULL),
(121, 125, NULL, 'AshokMehta', 'ashokmehta123y@gmail.com', '9813519397', 'ewrewrt', NULL, 'ertet', 'fddffd', NULL, NULL),
(122, 126, NULL, 'AshokMehta', 'ashokmehta123y@gmail.com', '+9779813519397', 'Kosi', NULL, 'fdghdf', '2046', NULL, NULL),
(123, 127, NULL, 'AshokMehta', 'ashokmehta123y@gmail.com', '+9779813519397', 'Kosi', NULL, 'fdghdf', '2046', NULL, NULL),
(124, 128, NULL, 'AshokMehta', 'ashokmehta123y@gmail.com', '+9779813519397', 'Kosi', NULL, 'fdghdf', '2046', NULL, NULL),
(125, 129, NULL, 'AshokMehta', 'ashokmehta123y@gmail.com', '9813519397', 'Bagmati', NULL, 'drg', 'fddffd', NULL, NULL),
(126, 130, NULL, 'AshokMehta', 'ashokmehta123y@gmail.com', '9813519397', 'Bagmati', NULL, 'drg', 'fddffd', NULL, NULL),
(127, 131, NULL, 'AshokMehta', 'ashokmehta123y@gmail.com', '+9779813519397', 'Kosi', NULL, 'afdc', '2046', NULL, NULL),
(128, 132, NULL, 'AshokMehta', 'ashokmehta123y@gmail.com', '+9779813519397', 'Kosi', NULL, 'dgdfh', '2046', NULL, NULL),
(129, 133, NULL, 'AshokMehta', 'ashokmehta123y@gmail.com', '9813519397', 'Zone / Capital', NULL, 'uyiouolui', 'fddffd', NULL, NULL),
(130, 134, NULL, 'AshokMehta', 'ashokmehta123y@gmail.com', '9813519397', 'Kosi', NULL, 'fgfdghfhghghgh', 'fddffd', NULL, NULL),
(131, 135, NULL, 'AshokMehta', 'ashokmehta123y@gmail.com', '9813519397', 'Kosi', NULL, 'asgfsdf', 'fddffd', NULL, NULL),
(132, 136, NULL, 'AshokMehta', 'ashokmehta123y@gmail.com', '9813519397', 'Louisiana', NULL, 'fgvjngh', 'fddffd', NULL, NULL),
(133, 137, NULL, 'AshokMehta', 'ashokmehta123y@gmail.com', '+9779813519397', 'Kosi', NULL, 'truj', '2046', NULL, NULL),
(134, 138, NULL, 'AshokMehta', 'ashokmehta123y@gmail.com', '9813519397', 'Louisiana', NULL, 'heelo', 'fddffd', NULL, NULL),
(135, 139, NULL, 'AshokMehta', 'ashokmehta123y@gmail.com', '+9779813519397', 'Kosi', NULL, ';ppppp', '2046', NULL, NULL),
(136, 140, NULL, 'AnilChaudhary', 'anil.prasmen@gmail.com', '9802069979', 'Nepal', NULL, 'Kapan', '44600', NULL, NULL),
(137, 141, NULL, 'AshokMehta', 'ashokmehta123y@gmail.com', '+9779813519397', 'Kosi', NULL, 'ergergte', '2046', NULL, NULL),
(138, 142, NULL, 'sujanmaharjan', 'sujnmaha@gmail.com', '9841054367', '3', NULL, 'test', '123', NULL, NULL),
(139, 143, NULL, 'Anil KumarChaudhary', 'anil.prasmen@gmail.com', '9802069979', 'Nepal', NULL, 'Baneshwor', 'Baneshwor', NULL, NULL),
(140, 144, NULL, 'AshokMehta', 'ashokmehta123y@gmail.com', '9813519397', 'Zone / Capital', NULL, 'gfjgfj', 'fddffd', NULL, NULL),
(141, 145, NULL, 's243', '123@gmail.com', '214124', '124', NULL, '124124', '412', NULL, NULL),
(142, 146, NULL, 'AshokMehta', 'ashokmehta123y@gmail.com', '9813519397', 'Kosi', NULL, 'ouuui', 'fddffd', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shopreviews`
--

CREATE TABLE `shopreviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `shop_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `feedback` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shopreviews`
--

INSERT INTO `shopreviews` (`id`, `shop_id`, `user_id`, `rating`, `feedback`, `created_at`, `updated_at`) VALUES
(1, 8, 1, 4, 'good job', '2021-06-14 18:26:50', '2021-06-26 05:46:38'),
(2, 8, 1, 3, 'dfgvdfgf', '2021-07-02 00:46:42', '2021-07-02 00:46:42'),
(3, 8, 32, 4, 'Hellos', '2021-07-02 00:48:41', '2021-07-02 00:48:54'),
(5, 8, 42, 4, 'd', '2021-07-03 06:04:39', '2021-07-03 06:04:39'),
(6, 2, 35, 3, 'rtyre', '2021-07-03 12:32:54', '2021-07-03 12:32:54'),
(7, 2, 35, 4, NULL, '2021-07-03 12:44:07', '2021-07-03 12:44:07');

-- --------------------------------------------------------

--
-- Table structure for table `shops`
--

CREATE TABLE `shops` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descr` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cover` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shops`
--

INSERT INTO `shops` (`id`, `vendor_id`, `name`, `descr`, `image`, `cover`, `latitude`, `longitude`, `address`, `contact`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Shop2', 'Hello,we serve u the best in nepal', 'upload/vendor/shop/1288640247shop.png', NULL, NULL, NULL, '1', '12345678', '1', '2021-05-29 03:37:12', '2021-05-29 08:23:04'),
(2, 1, 'Shop1', 'Hello,we serve u the best in nepal', 'upload/vendor/shop/1405641389shop.jpg', NULL, NULL, NULL, 'inaruwa', '12345678', '1', '2021-05-29 03:53:04', '2021-05-29 03:54:39'),
(7, 1, 'shop3', 'Hello this is my shop', 'upload/vendor/shop/1007633610shop.png', 'upload/vendor/shop/cover/1114002582shopcover.jpg', NULL, NULL, NULL, NULL, '1', '2021-06-12 21:45:43', '2021-06-14 17:33:40'),
(8, 1, 'shop4', '<p><b style=\"background-color: rgb(255, 255, 0);\">                        Lorem ipsum dolor sit amet, </b></p><p><b style=\"background-color: rgb(255, 255, 0);\"><br></b>consectetur adipisicing elit. Excepturi nesciunt veniam neque temporibus aut dolorum asperiores quod blanditiis consequuntur molestias nulla, expedita animi! Eaque reprehenderit distinctio illo necessitatibus ipsa doloribus alias nisi voluptates veniam. Ipsa, quidem doloremque ut aspernatur, ab similique et perferendis facere iste, repudiandae id est voluptas non.\r\n\r\n      Lorem ipsum dolor sit amet, consectetur adipisicing elit. </p><p><br></p><p>Excepturi nesciunt veniam neque temporibus aut dolorum asperiores quod blanditiis consequuntur molestias nulla, expedita animi! Eaque reprehenderit distinctio illo necessitatibus ipsa doloribus alias nisi voluptates veniam. Ipsa, quidem doloremque ut aspernatur, ab similique et perferendis facere iste, repudiandae id est voluptas non.\r\n\r\n\r\n\r\n      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi nesciunt veniam neque temporibus aut dolorum asperiores quod blanditiis consequuntur molestias nulla, expedita animi! Eaque reprehenderit distinctio illo necessitatibus ipsa doloribus alias nisi voluptates veniam. Ipsa, quidem doloremque ut aspernatur, ab similique et perferendis facere iste, repudiandae id est voluptas non.\r\n\r\n                       </p>', 'upload/vendor/shop/621606576shop.png', 'upload/vendor/shop/cover/575304403shopcover.png', NULL, NULL, NULL, NULL, '1', '2021-06-12 21:57:35', '2021-06-17 08:04:18'),
(9, 1, 'shop5', 'Hello', 'upload/vendor/shop/1775327486shop.png', 'upload/vendor/shop/cover/914997328shopcover.png', NULL, NULL, NULL, NULL, '1', '2021-06-12 22:00:07', '2021-06-12 22:05:32'),
(10, 41, '123', '123', 'upload/vendor/shop/1398279515shop.jpg', 'upload/vendor/shop/cover/1844941133shopcover.jpg', NULL, NULL, NULL, NULL, '1', '2021-07-04 15:56:32', '2021-07-04 15:56:32'),
(11, 41, 'test shop 123', 'test', 'upload/vendor/shop/762142219shop.jpg', 'upload/vendor/shop/cover/46959161shopcover.jpg', NULL, NULL, NULL, NULL, '1', '2021-07-09 13:23:18', '2021-07-09 13:23:18');

-- --------------------------------------------------------

--
-- Table structure for table `shop_galleries`
--

CREATE TABLE `shop_galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `shop_id` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shop_galleries`
--

INSERT INTO `shop_galleries` (`id`, `shop_id`, `image`, `created_at`, `updated_at`) VALUES
(1, 7, 'upload/vendor/shop/gallery/400538247shop.jpg', '2021-06-12 21:45:43', '2021-06-12 21:45:43'),
(7, 9, 'upload/vendor/shop/gallery/137887882shop.png', '2021-06-12 22:05:32', '2021-06-12 22:05:32'),
(8, 9, 'upload/vendor/shop/gallery/1846753772shop.png', '2021-06-12 22:05:33', '2021-06-12 22:05:33'),
(9, 8, 'upload/vendor/shop/gallery/1900947105shop.png', '2021-06-14 17:55:59', '2021-06-14 17:55:59'),
(10, 8, 'upload/vendor/shop/gallery/41590852shop.png', '2021-06-14 17:56:00', '2021-06-14 17:56:00'),
(11, 11, 'upload/vendor/shop/gallery/1648540726shop.jpg', '2021-07-09 13:23:18', '2021-07-09 13:23:18');

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subcategory` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `subcategory`, `image`, `category_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'subcategory1', 'upload/subcategory/1369292986category.png', 1, 1, '2021-05-29 04:37:24', '2021-05-29 04:37:24'),
(2, 'subcategory2', 'upload/subcategory/1613392688category.png', 1, 1, '2021-05-29 04:37:51', '2021-05-29 04:37:51'),
(3, 'Subcategory 3', 'upload/category/1096320449category.jpg', 2, 1, NULL, NULL),
(4, 'subcategory 5', 'upload/category/1096320449category.jpg', 3, 1, NULL, NULL),
(5, 'subcategory3', NULL, 1, 1, '2021-07-03 03:30:49', '2021-07-03 03:30:49'),
(6, 'subcategory4', NULL, 1, 1, '2021-07-03 03:31:02', '2021-07-03 03:31:02'),
(7, 'subcategory5', NULL, 1, 1, '2021-07-03 03:31:37', '2021-07-03 03:31:37'),
(8, 'subcategory6', NULL, 1, 1, '2021-07-03 03:31:46', '2021-07-03 03:31:46'),
(9, 'subcategory7', NULL, 1, 1, '2021-07-03 03:31:54', '2021-07-03 03:31:54');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `email`, `created_at`, `updated_at`) VALUES
(12, 'ashokmehta123y@gmail.com', '2021-07-06 09:51:11', '2021-07-06 09:51:11');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descr` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `vendor_id`, `date`, `title`, `descr`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, '2021-05-31', 'Hello,i am waiting for my payment.', 'Hello,i am waiting for my payment. Hello,i am waiting for my payment.Hello,i am waiting for my payment.Hello,i am waiting for my payment.Hello,i am waiting for my payment.Hello,i am waiting for my payment.Hello,i am waiting for my payment.Hello,i am waiting for my payment.Hello,i am waiting for my payment.Hello,i am waiting for my payment.Hello,i am waiting for my payment.Hello,i am waiting for my payment.Hello,i am waiting for my payment.Hello,i am waiting for my payment.Hello,i am waiting for my payment.', NULL, '2021-05-30 18:35:45', '2021-05-30 18:35:45');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Isvendor` int(11) DEFAULT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_pan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `membership` int(11) DEFAULT NULL,
  `google_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `Isvendor`, `company_name`, `company_pan`, `company_address`, `company_state`, `remember_token`, `current_team_id`, `profile_photo_path`, `membership`, `google_id`, `facebook_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'useer', 'vendor@gmail.com', '92343243', NULL, '$2y$10$hdEhb01GRl5YK/suiQ2lRuRSBIlujsMwkp1Uw8.83BaWUcPz6ja6u', NULL, NULL, 1, 'Company1', '2344', 'sunsari', 'state1', 'v2pQn3E5o4ikDjN1gCHl0EBdvQ9gtPfCEjyGVXnp8K3q8ht3pLt8p8iHSstI', NULL, 'upload/user/472959988user.png', 3, NULL, NULL, 1, NULL, '2021-07-02 15:33:03'),
(32, 'Ashok Mehta', 'ashokmehta123y@gmail.com', '9813519397', NULL, '$2y$10$33H48gWi5n2t1rWWr1JMLuoM9NdMHQ/2p9kLHew.VEcyP142oV63C', NULL, NULL, 1, 'Company1', '2344', 'inaruwa', 'Kosi', NULL, NULL, 'upload/user/1957096923user.png', NULL, NULL, NULL, 1, '2021-07-01 21:34:12', '2021-07-02 12:27:27'),
(35, 'Ashok Mehta', 'ashokmehta1234y@gmail.com', NULL, NULL, 'eyJpdiI6ImpSOTU0NnFpN3dMWDlXVk1kQkc2MEE9PSIsInZhbHVlIjoic2JmdkpZY2t2SEw1OWw1YTA2cE1qdUFGcHN6cWF4Rk1TOHJKczZQcHI4MD0iLCJtYWMiOiI3ODgxYmYzY2IzMzVjOTkxNjAwYWUwZTY2OGM0YmU1YzdjNTAwZGE0YjFiZjQ4MGVmNTA5YWFmZjNjYTlkZDk3In0=', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'upload/user/753806779user.png', NULL, '103567842143466469198', NULL, 1, '2021-07-02 03:28:36', '2021-07-03 05:44:46'),
(36, 'Sujan Maharjan', 'sujnmaha@gmail.com', NULL, NULL, '$2y$10$S0hZYDXk3i5M6YxfghZvWeQPuq5G5SFwANlhOAiWSoG.YBWKnRpzW', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kUaUaAZ86QgfSnXD19oz4xk8bQhQ0iEQxeDBB0DY3W8EsAIUY9wE0ZogXYDH', NULL, NULL, NULL, NULL, NULL, 1, '2021-07-02 12:52:35', '2021-07-09 12:38:44'),
(37, 'Sujan Maharjan', 'maharjansujan08@gmail.com', '1234567890', NULL, '$2y$10$oc7oryHxEgRZUl5W4qw4oOLnTCAXg0/RTtnl.a9LKRJbmwq.b.CC.', NULL, NULL, NULL, 'Kraft table', '123', 'test', '3', NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-07-02 15:04:37', '2021-07-02 15:04:37'),
(38, 'Sujan Maharjan', '123@gmail.com', '123', NULL, '$2y$10$lEf1vPGmbmyDNkS0381GTeAtJw9hoIvupW9Obm5dZqZvpmWGNBgse', NULL, NULL, NULL, '123', '123', '123', '123', NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-07-03 02:58:34', '2021-07-03 02:58:34'),
(39, '123', 'sujit.maharjan539@gmail.com', '123', NULL, '$2y$10$FpAHUNRygb0F2xguF9j3U.yNYR3lZ8uhMhfuCsLokzT3yGyQ5UTmq', NULL, NULL, 1, '123', '123', '123', '123', NULL, NULL, NULL, 3, NULL, NULL, 3, '2021-07-03 02:59:01', '2021-07-03 03:09:38'),
(41, 'asdf', 'dabali.enterprises@gmail.com', '123', NULL, '$2y$10$cIBHRd.dAqQJSD7snvRXEuU/AfB9k2/2v6qlF0PeTWXZigvnKA33i', NULL, NULL, 1, '123', '123', '123', '123', NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-07-03 03:13:38', '2021-07-09 01:58:22'),
(43, 'Ashok Mehta', 'ashokmehtad123y@gmail.com', NULL, NULL, '$2y$10$6n5wjzMsJHZPYe6VGQNsMOYnCxa5FEK0I4Wkc7N4S4jNGirOiuGfy', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'upload/user/775373227user.png', NULL, NULL, NULL, 1, '2021-07-03 03:37:56', '2021-07-03 04:05:56'),
(81, 'Ashok Mehta', 'ashokmehta12345y@gmail.com', '9813519397', NULL, '$2y$10$iFD9UxkelPrEAqj0ckmdvubisVWgCxQQFZuKb0TB1vqxki6yFYBYO', NULL, NULL, 1, 'Company1', '123456789', 'inaruwa', 'Kosi', NULL, NULL, NULL, 3, NULL, NULL, 0, '2021-07-06 08:45:22', '2021-07-06 09:03:06'),
(82, 'Ashok Mehta', 'ashokmdfdehta123y@gmail.com', '9813519397', NULL, '$2y$10$pzsjYSmaXEe1M3GgRBzWNe5Lr4im8/NMjovnwRNdOHTV8yo0Wdfd.', NULL, NULL, NULL, 'saf', '123456789', 'inaruwa', 'Kosi', NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-07-07 03:19:19', '2021-07-07 03:19:19'),
(83, 'Smtp Mail', 'smtptestmail9@gmail.com', NULL, NULL, 'eyJpdiI6IkRNZVR4QlNQT3NkUDdzb1BwRVVTK2c9PSIsInZhbHVlIjoiNUJLS0FZRHNSaVBLRFBjNW1Zam1LSmM4UnFGUFdpNENNVURqbzFURlFOND0iLCJtYWMiOiJlNzc1NTVjZjdmM2RhOTM0MmVhN2M2ZjI1NGM2MDI2ZDJmNjk0NDdlYWEzYWI3Mzk3NDgyNzgyZmY2NjJhNDhlIn0=', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'upload/user/1126213140user.jpg', NULL, '118231283574372605912', NULL, 1, '2021-07-08 02:25:35', '2021-07-08 03:24:43'),
(84, 'Sujan Maharjan', 'sujmaha08@gmail.com', NULL, NULL, '$2y$10$M1rchHyM6XnJhFqwBF7xoOAiExl07uDBj6iP8VetFfrH9LmTM8d7a', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'upload/user/1553245593user.jpg', NULL, NULL, NULL, 1, '2021-07-09 01:22:45', '2021-07-09 12:48:57'),
(85, 'dfsadf', '444@gmail.com', '123', NULL, '$2y$10$YerwTLxbq.jH8qLuYv6NUejJwAk54OIa0MVsCL2j82LAbv8KWvhL.', NULL, NULL, 1, '123', '123456789', 'tst', 'test', NULL, NULL, NULL, 3, NULL, NULL, 1, '2021-07-09 12:36:07', '2021-07-09 12:42:38'),
(86, 'Sujan Maharjan', '5567@gmail.com', '123', NULL, '$2y$10$UZizBj4dkUddEQf71tw7KuvT/AMuQOKdLRRxEYsd.rorZBxr2QjSS', NULL, NULL, NULL, '123', '123456789', 'fsdgf', 'ewt', NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-07-09 12:52:34', '2021-07-09 12:52:34'),
(87, 'test', '888@gmail.com', '123', NULL, '$2y$10$tKUTKlEtM/9batm18DNyY.WowbUsKKBChaGVvwtHI0D8X3Z85.z9S', NULL, NULL, NULL, 'test', '123456789', 'test', 'test', NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-07-10 02:44:36', '2021-07-10 02:44:36'),
(88, 'Prince Kumar Soni', 'princekumarsoni903@gmail.com', NULL, NULL, 'eyJpdiI6Ik1RZlovNEJzdW1Tck5SSTYyL21Sb3c9PSIsInZhbHVlIjoiMlNPREl1eE5CcWNLUmFVK29aVTJCcWZzUnh0TGVRYmMveGE2Sks0ck51QT0iLCJtYWMiOiI0MDQxNTgyYzM2YTU0Y2MxODQ3NzBjOGViZWQwYWU4ODA3NzgxNWMxMzFhYmFmOGJhYTIxZTNiZDExMzMzYjc3In0=', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '102154151546368963182', NULL, 1, '2021-07-11 14:46:19', '2021-07-11 14:46:19');

-- --------------------------------------------------------

--
-- Table structure for table `vendorcoupons`
--

CREATE TABLE `vendorcoupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `coupon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `expire_at` date NOT NULL,
  `Isapproved` int(11) DEFAULT NULL,
  `card_value` double(8,2) DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendorcoupons`
--

INSERT INTO `vendorcoupons` (`id`, `vendor_id`, `coupon`, `price`, `expire_at`, `Isapproved`, `card_value`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'coupon1', 5.00, '2021-06-30', 1, 500.00, 'upload/coupon/vendor/450050615Coupon.jpg', '1', '2021-05-30 00:09:42', '2021-06-26 06:23:52'),
(2, 1, 'KB2', 100.00, '2021-07-08', 2, 1.00, NULL, '1', '2021-06-29 21:08:13', '2021-06-29 22:15:29'),
(3, 1, 'KB3', 10.00, '2021-07-09', 1, 1.00, NULL, '1', '2021-06-29 21:13:37', '2021-06-29 21:14:13'),
(4, 1, '123', 5.00, '2021-07-09', 1, NULL, NULL, '1', '2021-07-02 16:07:37', '2021-07-02 16:08:36'),
(5, 41, 'test', 5.00, '2021-07-15', 1, NULL, NULL, '1', '2021-07-09 01:59:29', '2021-07-09 02:00:54'),
(6, 1, 'Coupon', 10.00, '2021-07-24', 1, NULL, NULL, '1', '2021-07-09 09:11:55', '2021-07-09 09:13:19'),
(7, 41, 'supercoupon', 5.00, '2021-07-30', 1, NULL, NULL, '1', '2021-07-09 13:28:41', '2021-07-09 13:29:17');

-- --------------------------------------------------------

--
-- Table structure for table `vendortotals`
--

CREATE TABLE `vendortotals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `total` float NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendortotals`
--

INSERT INTO `vendortotals` (`id`, `date`, `vendor_id`, `total`, `created_at`, `updated_at`) VALUES
(2, '2021-06-27', 1, 500, '2021-06-26 22:36:21', '2021-06-26 22:36:42');

-- --------------------------------------------------------

--
-- Table structure for table `websites`
--

CREATE TABLE `websites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `comission` float NOT NULL DEFAULT 0,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descr` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keyword` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tax` float DEFAULT NULL,
  `shipping_charge` float NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `websites`
--

INSERT INTO `websites` (`id`, `comission`, `title`, `descr`, `keyword`, `url`, `tax`, `shipping_charge`, `image`, `phone1`, `email1`, `address1`, `facebook1`, `twitter1`, `instagram1`, `other1`, `phone2`, `email2`, `address2`, `facebook2`, `twitter2`, `instagram2`, `other2`, `created_at`, `updated_at`) VALUES
(1, 5, 'Krafftbox - Online Shop for handmade, custom and unique items in Nepal.', 'Krafftbox is a marketplace for handmade and personalized items. Shop & connect with creative makers and individual sellers on Krafftbox.', 'Nepal\'s Leading Online Shopping Platform-KrafftBox', 'https://krafftbox.com/', NULL, 10, 'upload/setting/logo/52183714seeting.png', '9813519397', 'infomehta123y@gmail.com', 'inaruwa', 'https://mailtrap.io/', 'https://mailtrap.io/', 'https://www.instagram.com/thekrafftbox/?hl=en', 'https://mailtrap.io/', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-03 09:49:27');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(12, 32, 5, '2021-07-02 01:08:08', '2021-07-02 01:08:08'),
(13, 32, 7, '2021-07-02 03:24:15', '2021-07-02 03:24:15'),
(20, 36, 5, '2021-07-02 14:58:19', '2021-07-02 14:58:19'),
(36, 42, 2, '2021-07-06 02:49:27', '2021-07-06 02:49:27'),
(37, 62, 4, '2021-07-06 02:52:28', '2021-07-06 02:52:28'),
(38, 64, 4, '2021-07-06 03:00:15', '2021-07-06 03:00:15'),
(39, 83, 4, '2021-07-08 02:31:22', '2021-07-08 02:31:22');

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
-- Indexes for table `advertisments`
--
ALTER TABLE `advertisments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogcategories`
--
ALTER TABLE `blogcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contactvendors`
--
ALTER TABLE `contactvendors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `favourites`
--
ALTER TABLE `favourites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `productcolors`
--
ALTER TABLE `productcolors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productcustomizes`
--
ALTER TABLE `productcustomizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productreports`
--
ALTER TABLE `productreports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productreviews`
--
ALTER TABLE `productreviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productvariations`
--
ALTER TABLE `productvariations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `shippings`
--
ALTER TABLE `shippings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shopreviews`
--
ALTER TABLE `shopreviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shops`
--
ALTER TABLE `shops`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shop_galleries`
--
ALTER TABLE `shop_galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vendorcoupons`
--
ALTER TABLE `vendorcoupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendortotals`
--
ALTER TABLE `vendortotals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `websites`
--
ALTER TABLE `websites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
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
-- AUTO_INCREMENT for table `advertisments`
--
ALTER TABLE `advertisments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `blogcategories`
--
ALTER TABLE `blogcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contactvendors`
--
ALTER TABLE `contactvendors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `favourites`
--
ALTER TABLE `favourites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=197;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `productcolors`
--
ALTER TABLE `productcolors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `productcustomizes`
--
ALTER TABLE `productcustomizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `productreports`
--
ALTER TABLE `productreports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `productreviews`
--
ALTER TABLE `productreviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `productvariations`
--
ALTER TABLE `productvariations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `shippings`
--
ALTER TABLE `shippings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

--
-- AUTO_INCREMENT for table `shopreviews`
--
ALTER TABLE `shopreviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `shops`
--
ALTER TABLE `shops`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `shop_galleries`
--
ALTER TABLE `shop_galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `vendorcoupons`
--
ALTER TABLE `vendorcoupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `vendortotals`
--
ALTER TABLE `vendortotals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `websites`
--
ALTER TABLE `websites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
