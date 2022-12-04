-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 20, 2020 at 06:45 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.1.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `somtam`
--

-- --------------------------------------------------------

--
-- Table structure for table `abilities`
--

CREATE TABLE `abilities` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `entity_id` int(10) UNSIGNED DEFAULT NULL,
  `entity_type` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `only_owned` tinyint(1) NOT NULL DEFAULT '0',
  `scope` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `abilities`
--

INSERT INTO `abilities` (`id`, `name`, `title`, `entity_id`, `entity_type`, `only_owned`, `scope`, `created_at`, `updated_at`) VALUES
(1, 'category_view', 'Category View', NULL, NULL, 0, NULL, '2018-08-06 04:42:56', '2018-08-06 04:42:56'),
(2, 'sub_category_view', 'Sub Category View', NULL, NULL, 0, NULL, '2018-08-06 04:42:56', '2018-08-06 04:42:56'),
(3, 'merchant_view', 'Merchant View', NULL, NULL, 0, NULL, '2018-08-06 04:42:57', '2018-08-06 04:42:57'),
(4, 'merchant_create', 'Merchant Create', NULL, NULL, 0, NULL, '2018-08-06 04:42:57', '2018-08-06 04:42:57'),
(5, 'account_settings_view', 'Account Settings View', NULL, NULL, 0, NULL, '2018-08-06 04:43:16', '2018-08-06 04:43:16'),
(6, 'site_settings_view', 'Site Settings View', NULL, NULL, 0, NULL, '2018-08-06 04:43:16', '2018-08-06 04:43:16'),
(7, 'api_credentials_view', 'Api Credentials View', NULL, NULL, 0, NULL, '2018-08-06 04:43:16', '2018-08-06 04:43:16'),
(8, 'cities_view', 'Cities View', NULL, NULL, 0, NULL, '2018-08-06 04:43:17', '2018-08-06 04:43:17'),
(9, 'front_pages_view', 'Front Pages View', NULL, NULL, 0, NULL, '2018-08-06 04:43:17', '2018-08-06 04:43:17'),
(10, 'charity_blogs_view', 'Charity Blogs View', NULL, NULL, 0, NULL, '2018-08-06 04:43:17', '2018-08-06 04:43:17'),
(11, 'charity_blogs_edit', 'Charity Blogs Edit', NULL, NULL, 0, NULL, '2018-08-06 04:43:45', '2018-08-06 04:43:45'),
(12, 'partner_view', 'Partner View', NULL, NULL, 0, NULL, '2018-08-06 04:43:45', '2018-08-06 04:43:45'),
(13, 'partner_edit', 'Partner Edit', NULL, NULL, 0, NULL, '2018-08-06 04:43:45', '2018-08-06 04:43:45'),
(14, 'advertisement_edit', 'Advertisement Edit', NULL, NULL, 0, NULL, '2018-08-06 04:43:58', '2018-08-06 04:43:58'),
(15, 'roles_edit', 'Roles Edit', NULL, NULL, 0, NULL, '2018-08-06 04:43:58', '2018-08-06 04:43:58'),
(16, 'admin_user_management_create', 'Admin User Management Create', NULL, NULL, 0, NULL, '2018-08-06 04:43:59', '2018-08-06 04:43:59'),
(17, 'admin_user_management_edit', 'Admin User Management Edit', NULL, NULL, 0, NULL, '2018-08-06 04:43:59', '2018-08-06 04:43:59'),
(18, 'subscription_plan_edit', 'Subscription Plan Edit', NULL, NULL, 0, NULL, '2018-08-06 04:43:59', '2018-08-06 04:43:59'),
(19, 'sms_templates_view', 'Sms Templates View', NULL, NULL, 0, NULL, '2018-08-06 04:43:59', '2018-08-06 04:43:59'),
(20, 'front_pages_edit', 'Front Pages Edit', NULL, NULL, 0, NULL, '2018-08-06 04:44:07', '2018-08-06 04:44:07'),
(21, 'events_edit', 'Events Edit', NULL, NULL, 0, NULL, '2018-08-06 04:44:07', '2018-08-06 04:44:07'),
(22, 'discount_edit', 'Discount Edit', NULL, NULL, 0, NULL, '2018-08-06 04:44:07', '2018-08-06 04:44:07'),
(23, 'account_settings_edit', 'Account settings edit', NULL, NULL, 0, NULL, '2018-08-06 06:01:29', '2018-08-06 06:01:29'),
(24, 'site_settings_edit', 'Site settings edit', NULL, NULL, 0, NULL, '2018-08-06 06:01:29', '2018-08-06 06:01:29'),
(25, 'api_credentials_edit', 'Api credentials edit', NULL, NULL, 0, NULL, '2018-08-06 06:01:29', '2018-08-06 06:01:29'),
(26, 'cities_create', 'Cities create', NULL, NULL, 0, NULL, '2018-08-06 06:01:29', '2018-08-06 06:01:29'),
(27, 'cities_edit', 'Cities edit', NULL, NULL, 0, NULL, '2018-08-06 06:01:29', '2018-08-06 06:01:29'),
(28, 'cities_delete', 'Cities delete', NULL, NULL, 0, NULL, '2018-08-06 06:01:29', '2018-08-06 06:01:29'),
(29, 'front_pages_create', 'Front pages create', NULL, NULL, 0, NULL, '2018-08-06 06:01:30', '2018-08-06 06:01:30'),
(30, 'front_pages_delete', 'Front pages delete', NULL, NULL, 0, NULL, '2018-08-06 06:01:30', '2018-08-06 06:01:30'),
(31, 'charity_blogs_create', 'Charity blogs create', NULL, NULL, 0, NULL, '2018-08-06 06:01:30', '2018-08-06 06:01:30'),
(32, 'charity_blogs_delete', 'Charity blogs delete', NULL, NULL, 0, NULL, '2018-08-06 06:01:30', '2018-08-06 06:01:30'),
(33, 'partner_create', 'Partner create', NULL, NULL, 0, NULL, '2018-08-06 06:01:30', '2018-08-06 06:01:30'),
(34, 'partner_delete', 'Partner delete', NULL, NULL, 0, NULL, '2018-08-06 06:01:30', '2018-08-06 06:01:30'),
(35, 'category_edit', 'Category edit', NULL, NULL, 0, NULL, '2018-08-06 06:01:30', '2018-08-06 06:01:30'),
(36, 'sub_category_create', 'Sub category create', NULL, NULL, 0, NULL, '2018-08-06 06:01:30', '2018-08-06 06:01:30'),
(37, 'sub_category_edit', 'Sub category edit', NULL, NULL, 0, NULL, '2018-08-06 06:01:30', '2018-08-06 06:01:30'),
(38, 'merchant_edit', 'Merchant edit', NULL, NULL, 0, NULL, '2018-08-06 06:01:31', '2018-08-06 06:01:31'),
(39, 'users_view', 'Users view', NULL, NULL, 0, NULL, '2018-08-06 06:01:31', '2018-08-06 06:01:31'),
(40, 'users_transaction_view', 'Users transaction view', NULL, NULL, 0, NULL, '2018-08-06 06:01:31', '2018-08-06 06:01:31'),
(41, 'events_view', 'Events view', NULL, NULL, 0, NULL, '2018-08-06 06:01:31', '2018-08-06 06:01:31'),
(42, 'events_create', 'Events create', NULL, NULL, 0, NULL, '2018-08-06 06:01:31', '2018-08-06 06:01:31'),
(43, 'events_delete', 'Events delete', NULL, NULL, 0, NULL, '2018-08-06 06:01:31', '2018-08-06 06:01:31'),
(44, 'discount_view', 'Discount view', NULL, NULL, 0, NULL, '2018-08-06 06:01:31', '2018-08-06 06:01:31'),
(45, 'collections_view', 'Collections view', NULL, NULL, 0, NULL, '2018-08-06 06:01:31', '2018-08-06 06:01:31'),
(46, 'collections_create', 'Collections create', NULL, NULL, 0, NULL, '2018-08-06 06:01:31', '2018-08-06 06:01:31'),
(47, 'collections_edit', 'Collections edit', NULL, NULL, 0, NULL, '2018-08-06 06:01:31', '2018-08-06 06:01:31'),
(48, 'collections_delete', 'Collections delete', NULL, NULL, 0, NULL, '2018-08-06 06:01:32', '2018-08-06 06:01:32'),
(49, 'deals_view', 'Deals view', NULL, NULL, 0, NULL, '2018-08-06 06:01:32', '2018-08-06 06:01:32'),
(50, 'deals_edit', 'Deals edit', NULL, NULL, 0, NULL, '2018-08-06 06:01:32', '2018-08-06 06:01:32'),
(51, 'popular_deals_view', 'Popular deals view', NULL, NULL, 0, NULL, '2018-08-06 06:01:32', '2018-08-06 06:01:32'),
(52, 'payment_for_merchant_view', 'Payment for merchant view', NULL, NULL, 0, NULL, '2018-08-06 06:01:32', '2018-08-06 06:01:32'),
(53, 'manage_earnings_view', 'Manage earnings view', NULL, NULL, 0, NULL, '2018-08-06 06:01:32', '2018-08-06 06:01:32'),
(54, 'merchant_invoice_view', 'Merchant invoice view', NULL, NULL, 0, NULL, '2018-08-06 06:01:32', '2018-08-06 06:01:32'),
(55, 'advertisement_view', 'Advertisement view', NULL, NULL, 0, NULL, '2018-08-06 06:01:32', '2018-08-06 06:01:32'),
(56, 'roles_view', 'Roles view', NULL, NULL, 0, NULL, '2018-08-06 06:01:32', '2018-08-06 06:01:32'),
(57, 'admin_user_management_view', 'Admin user management view', NULL, NULL, 0, NULL, '2018-08-06 06:01:32', '2018-08-06 06:01:32'),
(58, 'manage_glance_view', 'Manage glance view', NULL, NULL, 0, NULL, '2018-08-06 06:01:32', '2018-08-06 06:01:32'),
(59, 'notifications_view', 'Notifications view', NULL, NULL, 0, NULL, '2018-08-06 06:01:32', '2018-08-06 06:01:32'),
(60, 'reaview_ratings_view', 'Reaview ratings view', NULL, NULL, 0, NULL, '2018-08-06 06:01:32', '2018-08-06 06:01:32'),
(61, 'subscription_plan_view', 'Subscription plan view', NULL, NULL, 0, NULL, '2018-08-06 06:01:32', '2018-08-06 06:01:32'),
(62, 'email_templates_view', 'Email templates view', NULL, NULL, 0, NULL, '2018-08-06 06:01:33', '2018-08-06 06:01:33'),
(63, 'email_templates_edit', 'Email templates edit', NULL, NULL, 0, NULL, '2018-08-06 06:01:33', '2018-08-06 06:01:33'),
(64, 'sms_templates_edit', 'Sms templates edit', NULL, NULL, 0, NULL, '2018-08-06 06:01:33', '2018-08-06 06:01:33'),
(65, 'job_view', 'Job view', NULL, NULL, 0, NULL, '2018-08-06 06:01:33', '2018-08-06 06:01:33'),
(66, 'job_edit', 'Job edit', NULL, NULL, 0, NULL, '2018-08-06 06:01:33', '2018-08-06 06:01:33'),
(67, 'activity_logs_view', 'Activity logs view', NULL, NULL, 0, NULL, '2018-08-06 06:01:33', '2018-08-06 06:01:33'),
(68, 'abuse_report_view', 'Abuse report view', NULL, NULL, 0, NULL, '2018-08-06 06:01:33', '2018-08-06 06:01:33'),
(69, 'reports_view', 'Reports view', NULL, NULL, 0, NULL, '2018-08-06 06:01:33', '2018-08-06 06:01:33'),
(70, 'advertisement_create', 'Advertisement create', NULL, NULL, 0, NULL, '2018-08-06 06:01:58', '2018-08-06 06:01:58'),
(71, 'advertisement_delete', 'Advertisement delete', NULL, NULL, 0, NULL, '2018-08-06 06:01:58', '2018-08-06 06:01:58'),
(72, 'notifications_delete', 'Notifications delete', NULL, NULL, 0, NULL, '2018-08-06 06:01:59', '2018-08-06 06:01:59'),
(73, 'charity_slider_view', 'Charity slider view', NULL, NULL, 0, NULL, '2018-09-07 13:00:46', '2018-09-07 13:00:46'),
(74, 'team_view', 'Team view', NULL, NULL, 0, NULL, '2018-09-07 13:00:46', '2018-09-07 13:00:46'),
(75, 'contact_enquiry_view', 'Contact enquiry view', NULL, NULL, 0, NULL, '2018-09-07 13:00:46', '2018-09-07 13:00:46'),
(76, 'charity_slider_create', 'Charity slider create', NULL, NULL, 0, NULL, '2018-10-02 13:50:32', '2018-10-02 13:50:32'),
(77, 'charity_slider_edit', 'Charity slider edit', NULL, NULL, 0, NULL, '2018-10-02 13:50:32', '2018-10-02 13:50:32'),
(78, 'charity_slider_delete', 'Charity slider delete', NULL, NULL, 0, NULL, '2018-10-02 13:50:32', '2018-10-02 13:50:32'),
(79, 'merchant_approve', 'Merchant approve', NULL, NULL, 0, NULL, '2018-10-16 15:31:10', '2018-10-16 15:31:10'),
(80, 'discount_approve', 'Discount approve', NULL, NULL, 0, NULL, '2018-10-16 15:31:10', '2018-10-16 15:31:10'),
(81, 'deals_approve', 'Deals approve', NULL, NULL, 0, NULL, '2018-10-16 15:31:10', '2018-10-16 15:31:10'),
(82, 'home_advertisement_view', 'Home advertisement view', NULL, NULL, 0, NULL, '2018-10-16 15:36:48', '2018-10-16 15:36:48'),
(83, 'home_advertisement_create', 'Home advertisement create', NULL, NULL, 0, NULL, '2018-10-16 15:36:48', '2018-10-16 15:36:48'),
(84, 'home_advertisement_edit', 'Home advertisement edit', NULL, NULL, 0, NULL, '2018-10-16 15:36:48', '2018-10-16 15:36:48'),
(85, 'home_advertisement_delete', 'Home advertisement delete', NULL, NULL, 0, NULL, '2018-10-16 15:36:48', '2018-10-16 15:36:48'),
(86, 'user_transactions_view', 'User transactions view', NULL, NULL, 0, NULL, '2018-10-16 15:36:48', '2018-10-16 15:36:48'),
(87, 'contact_enquiry_edit', 'Contact enquiry edit', NULL, NULL, 0, NULL, '2018-10-24 15:49:50', '2018-10-24 15:49:50'),
(88, 'team_create', 'Team create', NULL, NULL, 0, NULL, '2019-02-14 09:36:20', '2019-02-14 09:36:20');

-- --------------------------------------------------------

--
-- Table structure for table `admin_password_resets`
--

CREATE TABLE `admin_password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `api_details`
--

CREATE TABLE `api_details` (
  `id` int(50) NOT NULL,
  `onesignal_api_key` varchar(255) DEFAULT NULL,
  `onesignal_app_id` varchar(255) DEFAULT NULL,
  `google_map_key` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `api_details`
--

INSERT INTO `api_details` (`id`, `onesignal_api_key`, `onesignal_app_id`, `google_map_key`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'YzY4YzU2OTctMTRkNy00Y2M4LTk3ODYtY2ZiNGYzODEwODFj', '169e8b77-b651-4f26-9453-c5b1cabdd37c', 'AIzaSyCJJCAjc05BcEg64-KCCmCVVf6BxhKnA4g', '2018-04-25 06:37:43', '2018-10-29 18:14:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `banner_title` varchar(100) DEFAULT NULL,
  `banner_image` varchar(100) NOT NULL,
  `company` int(11) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `banner_title`, `banner_image`, `company`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Banner 1', '3a82fa72ae519bc2a7354934c4ec322b90276c88.jpg', 1, '1', '2020-03-02 03:41:27', '2020-03-02 03:41:27'),
(2, 'Banner  2', '2454f163fbbf56cf163e5bcc4bfe77796e3ecc6d.jpg', 2, '1', '2020-03-02 03:41:41', '2020-03-02 03:41:41'),
(3, 'Banner  3', 'f43b8c37d1583a1312c4f7dfd95377fc2e71eb09.jpg', 1, '1', '2020-03-02 03:41:53', '2020-03-02 03:41:53'),
(4, 'Banner  4', '42cb5de065accee7fa907b1d2e3ffebfdb922244.jpg', 1, '1', '2020-03-02 03:42:04', '2020-03-02 03:42:04'),
(5, 'Banner 5', 'f9306d2a0b3e14e79dea670d41c15409d88e1139.jpg', 1, '1', '2020-03-02 03:42:18', '2020-03-02 03:42:18'),
(6, 'Banner 6', '656aaa2957bd62bf9d95bae18a78147eea9cd31e.jpg', 2, '1', '2020-03-02 03:42:38', '2020-03-02 03:42:38'),
(7, 'Banner 7', '47dd60b7df2fd401d4135f69394225031d456b71.jpg', 2, '1', '2020-03-02 03:42:52', '2020-03-02 03:42:52'),
(8, 'Banner 8', 'c9f304dbd749d7b02b8b5ffc82963bf317cca830.jpg', 2, '1', '2020-03-02 03:43:04', '2020-03-02 03:43:04'),
(9, 'Banner 9', '88d87c5d16a0fe8c5dc73d9170ca8fe8d010b0df.jpg', 2, '1', '2020-03-02 03:43:14', '2020-03-02 03:43:14'),
(10, 'Banner 10', 'daba8a41414bec578dc4f10933ae2ecf6faa1c22.jpg', 2, '1', '2020-03-02 03:43:25', '2020-03-02 03:43:25');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `short_description` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `author_type` enum('admin','user') NOT NULL DEFAULT 'admin',
  `slug` varchar(200) DEFAULT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `is_active` enum('1','0') NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_keyword` varchar(255) DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `blogs_category`
--

CREATE TABLE `blogs_category` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `slug` varchar(50) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Category 1', '1', '2020-03-02 03:39:42', '2020-03-02 03:39:42'),
(2, 'Category 2', '1', '2020-03-02 03:39:50', '2020-03-02 03:39:50'),
(3, 'Category 3', '1', '2020-03-02 03:40:00', '2020-03-02 03:40:00'),
(4, 'Category 4', '1', '2020-03-02 03:40:04', '2020-03-02 03:40:04'),
(5, 'Category 5', '1', '2020-03-02 03:40:11', '2020-03-02 03:40:11');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `model_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `model_id`, `user_id`, `comment`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'ขนาดตัว', '1', '2020-03-02 04:48:40', '2020-03-02 04:48:40'),
(2, 2, 1, 'เขียนความคิดเห็น', '1', '2020-03-02 04:50:29', '2020-03-02 04:51:17');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `company_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Webwing', '1', '2020-03-02 03:39:19', '2020-03-02 03:39:19'),
(2, 'Webwing Technologies', '1', '2020-03-02 03:39:28', '2020-03-02 03:39:28');

-- --------------------------------------------------------

--
-- Table structure for table `contact_enquiry`
--

CREATE TABLE `contact_enquiry` (
  `id` int(11) NOT NULL,
  `first_name` varchar(60) NOT NULL,
  `last_name` varchar(60) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `contact_no` varchar(100) DEFAULT NULL,
  `message` varchar(500) NOT NULL,
  `status` enum('0','1') NOT NULL COMMENT '0 - Admin not responded, 1- Admin respnded',
  `admin_reply` varchar(555) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `country_id` int(11) NOT NULL,
  `country_name` varchar(64) NOT NULL DEFAULT '',
  `country_iso_code` varchar(2) NOT NULL,
  `country_isd_code` varchar(7) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`country_id`, `country_name`, `country_iso_code`, `country_isd_code`) VALUES
(1, 'Afghanistan', 'AF', '93'),
(2, 'Albania', 'AL', '355'),
(3, 'Algeria', 'DZ', '213'),
(4, 'American Samoa', 'AS', '1-684'),
(5, 'Andorra', 'AD', '376'),
(6, 'Angola', 'AO', '244'),
(7, 'Anguilla', 'AI', '1-264'),
(8, 'Antarctica', 'AQ', '672'),
(9, 'Antigua and Barbuda', 'AG', '1-268'),
(10, 'Argentina', 'AR', '54'),
(11, 'Armenia', 'AM', '374'),
(12, 'Aruba', 'AW', '297'),
(13, 'Australia', 'AU', '61'),
(14, 'Austria', 'AT', '43'),
(15, 'Azerbaijan', 'AZ', '994'),
(16, 'Bahamas', 'BS', '1-242'),
(17, 'Bahrain', 'BH', '973'),
(18, 'Bangladesh', 'BD', '880'),
(19, 'Barbados', 'BB', '1-246'),
(20, 'Belarus', 'BY', '375'),
(21, 'Belgium', 'BE', '32'),
(22, 'Belize', 'BZ', '501'),
(23, 'Benin', 'BJ', '229'),
(24, 'Bermuda', 'BM', '1-441'),
(25, 'Bhutan', 'BT', '975'),
(26, 'Bolivia', 'BO', '591'),
(27, 'Bosnia and Herzegowina', 'BA', '387'),
(28, 'Botswana', 'BW', '267'),
(29, 'Bouvet Island', 'BV', '47'),
(30, 'Brazil', 'BR', '55'),
(31, 'British Indian Ocean Territory', 'IO', '246'),
(32, 'Brunei Darussalam', 'BN', '673'),
(33, 'Bulgaria', 'BG', '359'),
(34, 'Burkina Faso', 'BF', '226'),
(35, 'Burundi', 'BI', '257'),
(36, 'Cambodia', 'KH', '855'),
(37, 'Cameroon', 'CM', '237'),
(38, 'Canada', 'CA', '1'),
(39, 'Cape Verde', 'CV', '238'),
(40, 'Cayman Islands', 'KY', '1-345'),
(41, 'Central African Republic', 'CF', '236'),
(42, 'Chad', 'TD', '235'),
(43, 'Chile', 'CL', '56'),
(44, 'China', 'CN', '86'),
(45, 'Christmas Island', 'CX', '61'),
(46, 'Cocos (Keeling) Islands', 'CC', '61'),
(47, 'Colombia', 'CO', '57'),
(48, 'Comoros', 'KM', '269'),
(49, 'Congo Democratic Republic of', 'CG', '242'),
(50, 'Cook Islands', 'CK', '682'),
(51, 'Costa Rica', 'CR', '506'),
(52, 'Cote D\'Ivoire', 'CI', '225'),
(53, 'Croatia', 'HR', '385'),
(54, 'Cuba', 'CU', '53'),
(55, 'Cyprus', 'CY', '357'),
(56, 'Czech Republic', 'CZ', '420'),
(57, 'Denmark', 'DK', '45'),
(58, 'Djibouti', 'DJ', '253'),
(59, 'Dominica', 'DM', '1-767'),
(60, 'Dominican Republic', 'DO', '1-809'),
(61, 'Timor-Leste', 'TL', '670'),
(62, 'Ecuador', 'EC', '593'),
(63, 'Egypt', 'EG', '20'),
(64, 'El Salvador', 'SV', '503'),
(65, 'Equatorial Guinea', 'GQ', '240'),
(66, 'Eritrea', 'ER', '291'),
(67, 'Estonia', 'EE', '372'),
(68, 'Ethiopia', 'ET', '251'),
(69, 'Falkland Islands (Malvinas)', 'FK', '500'),
(70, 'Faroe Islands', 'FO', '298'),
(71, 'Fiji', 'FJ', '679'),
(72, 'Finland', 'FI', '358'),
(73, 'France', 'FR', '33'),
(75, 'French Guiana', 'GF', '594'),
(76, 'French Polynesia', 'PF', '689'),
(77, 'French Southern Territories', 'TF', NULL),
(78, 'Gabon', 'GA', '241'),
(79, 'Gambia', 'GM', '220'),
(80, 'Georgia', 'GE', '995'),
(81, 'Germany', 'DE', '49'),
(82, 'Ghana', 'GH', '233'),
(83, 'Gibraltar', 'GI', '350'),
(84, 'Greece', 'GR', '30'),
(85, 'Greenland', 'GL', '299'),
(86, 'Grenada', 'GD', '1-473'),
(87, 'Guadeloupe', 'GP', '590'),
(88, 'Guam', 'GU', '1-671'),
(89, 'Guatemala', 'GT', '502'),
(90, 'Guinea', 'GN', '224'),
(91, 'Guinea-bissau', 'GW', '245'),
(92, 'Guyana', 'GY', '592'),
(93, 'Haiti', 'HT', '509'),
(94, 'Heard Island and McDonald Islands', 'HM', '011'),
(95, 'Honduras', 'HN', '504'),
(96, 'Hong Kong', 'HK', '852'),
(97, 'Hungary', 'HU', '36'),
(98, 'Iceland', 'IS', '354'),
(99, 'India', 'IN', '91'),
(100, 'Indonesia', 'ID', '62'),
(101, 'Iran (Islamic Republic of)', 'IR', '98'),
(102, 'Iraq', 'IQ', '964'),
(103, 'Ireland', 'IE', '353'),
(104, 'Israel', 'IL', '972'),
(105, 'Italy', 'IT', '39'),
(106, 'Jamaica', 'JM', '1-876'),
(107, 'Japan', 'JP', '81'),
(108, 'Jordan', 'JO', '962'),
(109, 'Kazakhstan', 'KZ', '7'),
(110, 'Kenya', 'KE', '254'),
(111, 'Kiribati', 'KI', '686'),
(112, 'Korea, Democratic People\'s Republic of', 'KP', '850'),
(113, 'South Korea', 'KR', '82'),
(114, 'Kuwait', 'KW', '965'),
(115, 'Kyrgyzstan', 'KG', '996'),
(116, 'Lao People\'s Democratic Republic', 'LA', '856'),
(117, 'Latvia', 'LV', '371'),
(118, 'Lebanon', 'LB', '961'),
(119, 'Lesotho', 'LS', '266'),
(120, 'Liberia', 'LR', '231'),
(121, 'Libya', 'LY', '218'),
(122, 'Liechtenstein', 'LI', '423'),
(123, 'Lithuania', 'LT', '370'),
(124, 'Luxembourg', 'LU', '352'),
(125, 'Macao', 'MO', '853'),
(126, 'Macedonia, The Former Yugoslav Republic of', 'MK', '389'),
(127, 'Madagascar', 'MG', '261'),
(128, 'Malawi', 'MW', '265'),
(129, 'Malaysia', 'MY', '60'),
(130, 'Maldives', 'MV', '960'),
(131, 'Mali', 'ML', '223'),
(132, 'Malta', 'MT', '356'),
(133, 'Marshall Islands', 'MH', '692'),
(134, 'Martinique', 'MQ', '596'),
(135, 'Mauritania', 'MR', '222'),
(136, 'Mauritius', 'MU', '230'),
(137, 'Mayotte', 'YT', '262'),
(138, 'Mexico', 'MX', '52'),
(139, 'Micronesia, Federated States of', 'FM', '691'),
(140, 'Moldova', 'MD', '373'),
(141, 'Monaco', 'MC', '377'),
(142, 'Mongolia', 'MN', '976'),
(143, 'Montserrat', 'MS', '1-664'),
(144, 'Morocco', 'MA', '212'),
(145, 'Mozambique', 'MZ', '258'),
(146, 'Myanmar', 'MM', '95'),
(147, 'Namibia', 'NA', '264'),
(148, 'Nauru', 'NR', '674'),
(149, 'Nepal', 'NP', '977'),
(150, 'Netherlands', 'NL', '31'),
(151, 'Netherlands Antilles', 'AN', '599'),
(152, 'New Caledonia', 'NC', '687	'),
(153, 'New Zealand', 'NZ', '64'),
(154, 'Nicaragua', 'NI', '505'),
(155, 'Niger', 'NE', '227'),
(156, 'Nigeria', 'NG', '234'),
(157, 'Niue', 'NU', '683'),
(158, 'Norfolk Island', 'NF', '672'),
(159, 'Northern Mariana Islands', 'MP', '1-670'),
(160, 'Norway', 'NO', '47'),
(161, 'Oman', 'OM', '968'),
(162, 'Pakistan', 'PK', '92'),
(163, 'Palau', 'PW', '680'),
(164, 'Panama', 'PA', '507'),
(165, 'Papua New Guinea', 'PG', '675'),
(166, 'Paraguay', 'PY', '595'),
(167, 'Peru', 'PE', '51'),
(168, 'Philippines', 'PH', '63'),
(169, 'Pitcairn', 'PN', '64'),
(170, 'Poland', 'PL', '48'),
(171, 'Portugal', 'PT', '351'),
(172, 'Puerto Rico', 'PR', '1-787'),
(173, 'Qatar', 'QA', '974'),
(174, 'Reunion', 'RE', '262'),
(175, 'Romania', 'RO', '40'),
(176, 'Russian Federation', 'RU', '7'),
(177, 'Rwanda', 'RW', '250'),
(178, 'Saint Kitts and Nevis', 'KN', '1-869'),
(179, 'Saint Lucia', 'LC', '1-758'),
(180, 'Saint Vincent and the Grenadines', 'VC', '1-784'),
(181, 'Samoa', 'WS', '685'),
(182, 'San Marino', 'SM', '378'),
(183, 'Sao Tome and Principe', 'ST', '239'),
(184, 'Saudi Arabia', 'SA', '966'),
(185, 'Senegal', 'SN', '221'),
(186, 'Seychelles', 'SC', '248'),
(187, 'Sierra Leone', 'SL', '232'),
(188, 'Singapore', 'SG', '65'),
(189, 'Slovakia (Slovak Republic)', 'SK', '421'),
(190, 'Slovenia', 'SI', '386'),
(191, 'Solomon Islands', 'SB', '677'),
(192, 'Somalia', 'SO', '252'),
(193, 'South Africa', 'ZA', '27'),
(194, 'South Georgia and the South Sandwich Islands', 'GS', '500'),
(195, 'Spain', 'ES', '34'),
(196, 'Sri Lanka', 'LK', '94'),
(197, 'Saint Helena, Ascension and Tristan da Cunha', 'SH', '290'),
(198, 'St. Pierre and Miquelon', 'PM', '508'),
(199, 'Sudan', 'SD', '249'),
(200, 'Suriname', 'SR', '597'),
(201, 'Svalbard and Jan Mayen Islands', 'SJ', '47'),
(202, 'Swaziland', 'SZ', '268'),
(203, 'Sweden', 'SE', '46'),
(204, 'Switzerland', 'CH', '41'),
(205, 'Syrian Arab Republic', 'SY', '963'),
(206, 'Taiwan', 'TW', '886'),
(207, 'Tajikistan', 'TJ', '992'),
(208, 'Tanzania, United Republic of', 'TZ', '255'),
(209, 'Thailand', 'TH', '66'),
(210, 'Togo', 'TG', '228'),
(211, 'Tokelau', 'TK', '690'),
(212, 'Tonga', 'TO', '676'),
(213, 'Trinidad and Tobago', 'TT', '1-868'),
(214, 'Tunisia', 'TN', '216'),
(215, 'Turkey', 'TR', '90'),
(216, 'Turkmenistan', 'TM', '993'),
(217, 'Turks and Caicos Islands', 'TC', '1-649'),
(218, 'Tuvalu', 'TV', '688'),
(219, 'Uganda', 'UG', '256'),
(220, 'Ukraine', 'UA', '380'),
(221, 'United Arab Emirates', 'AE', '971'),
(222, 'United Kingdom', 'GB', '44'),
(223, 'United States', 'US', '1'),
(224, 'United States Minor Outlying Islands', 'UM', '246'),
(225, 'Uruguay', 'UY', '598'),
(226, 'Uzbekistan', 'UZ', '998'),
(227, 'Vanuatu', 'VU', '678'),
(228, 'Vatican City State (Holy See)', 'VA', '379'),
(229, 'Venezuela', 'VE', '58'),
(230, 'Vietnam', 'VN', '84'),
(231, 'Virgin Islands (British)', 'VG', '1-284'),
(232, 'Virgin Islands (U.S.)', 'VI', '1-340'),
(233, 'Wallis and Futuna Islands', 'WF', '681'),
(234, 'Western Sahara', 'EH', '212'),
(235, 'Yemen', 'YE', '967'),
(236, 'Serbia', 'RS', '381'),
(238, 'Zambia', 'ZM', '260'),
(239, 'Zimbabwe', 'ZW', '263'),
(240, 'Aaland Islands', 'AX', '358'),
(241, 'Palestine', 'PS', '970'),
(242, 'Montenegro', 'ME', '382'),
(243, 'Guernsey', 'GG', '44-1481'),
(244, 'Isle of Man', 'IM', '44-1624'),
(245, 'Jersey', 'JE', '44-1534'),
(247, 'CuraÃ§ao', 'CW', '599'),
(248, 'Ivory Coast', 'CI', '225'),
(249, 'Kosovo', 'XK', '383');

-- --------------------------------------------------------

--
-- Table structure for table `email_template`
--

CREATE TABLE `email_template` (
  `id` int(11) NOT NULL,
  `template_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `template_subject` text COLLATE utf8_unicode_ci NOT NULL,
  `template_from` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `template_from_mail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `template_html` text COLLATE utf8_unicode_ci NOT NULL,
  `template_variables` varchar(500) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NA' COMMENT '~ Separated',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `email_template`
--

INSERT INTO `email_template` (`id`, `template_name`, `template_subject`, `template_from`, `template_from_mail`, `template_html`, `template_variables`, `created_at`, `updated_at`) VALUES
(1, 'Contact Enquiry Reply', 'Aircraft Rental  - Contact enquiry reply', 'Aircraft Rental  - Admin', 'admin@support.com', '<p>Hello ##USERNAME##,</p>\n<p>Aircraft admin replied to your enquiry -</p>\n<p>##REPLY##</p>', '##USERNAME##~##REPLY##', '2019-03-28 18:30:00', '2020-01-14 09:58:16'),
(3, 'Forgot Password', 'Somtam - Forgot Password', 'Aircraft Rental - Admin', 'admin@support.com', '<div style=\"height: 10px;\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>\r\n<p style=\"color: #333333; font-size: 18px; padding: 0 40px;\">Hello <span style=\"color: #f50001; font-family: \'Latomedium\',sans-serif;\">##USERNAME##,</span></p>\r\n<p style=\"color: #545454; font-size: 17px; padding: 15px 40px;\">You have recently requested for password reset. Please use following creditionals to login your account.</p>\r\n<p class=\"listed-btn\" style=\"text-align: center;\">\r\n<br>\r\nUsername:##USER_ID##\r\nPassword:##PASSWORD##\r\n</p>\r\n<p class=\"listed-btn\" style=\"text-align: center;\">&nbsp;</p>\r\n<div style=\"height: 30px;\">&nbsp;</div>', '##USERNAME##~##REPLY##~##USER_ID##~##USER_NAME##', '2019-03-29 09:00:00', '2020-02-12 09:11:29'),
(5, 'Verification link', 'Aircraft Rental - Verification link', 'Somtam Rental - Admin', 'admin@support.com', '<p><strong>Hello&nbsp;<span style=\"line-height: 1.6em;\">##FIRST_NAME##,&nbsp;</span></strong></p>\r\n<p><span style=\"line-height: 1.6em;\"><strong>Congratulations!</strong> </span></p>\r\n<p><span style=\"line-height: 1.6em;\">You are successfully registered as ##USER_TYPE## on ##PROJECT_NAME##. Thank you for choosing ##PROJECT_NAME##. We will contact you shortly .</span></p>\r\n<p><br /><br /></p>\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>', '##FIRST_NAME##~##USER_TYPE##~##PROJECT_NAME##~##VERIFICATION_LINK##', '2019-03-28 18:30:00', '2020-02-12 06:42:57'),
(6, 'Login Details', 'Aircraft Rental  - Login Details', 'Aircraft Rental - Admin', 'admin@support.com', '<p><strong>Hello&nbsp;<span style=\"line-height: 1.6em;\">##FIRST_NAME##,&nbsp;</span></strong></p>\r\n<p><span style=\"line-height: 1.6em;\">&nbsp;Congratulations! You are successfully registered as ##USER_TYPE## on ##PROJECT_NAME##. Thank you for choosing ##PROJECT_NAME##. Please login with follwing credentials :</span></p>\r\n<p><span style=\"line-height: 1.6em;\"> UserID :&nbsp;</span>##USER_ID## Password : ##PASSWORD##</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;##LOGIN_LINK##</p>\r\n<p>&nbsp;</p>', '##USER_TYPE##~##USER_ID##~##PASSWORD##~##PROJECT_NAME##~##LOGIN_LINK##', '2019-03-28 18:30:00', '2019-04-04 11:36:57'),
(7, 'Operator Forget Password mail', 'Aircraft Rental  - Operator Forget Password Mail', 'Aircraft Rental - Admin', 'admin@support.com', '<p style=\"color: #333333; font-size: 17px; padding-top: 5px; text-align: center;\">##SUBJECT##</p>\r\n<div style=\"height: 10px;\">&nbsp;</div>\r\n<p style=\"color: #333333; font-size: 18px; padding: 0 40px;\">Hello <span style=\"color: #f50001; font-family: \'Latomedium\',sans-serif;\">##USER_NAME##,</span></p>\r\n<p style=\"color: #545454; font-size: 17px; padding: 15px 40px;\">You are recently requested a password reset. Please enter the given OTP&nbsp; to reset your password. After verification of OTP you may reset your account password.</p>\r\n<p style=\"color: #545454; font-size: 17px; padding: 15px 40px;\">Thank you.</p>\r\n<p class=\"listed-btn\" style=\"text-align: justify; padding-left: 30px;\">&nbsp; &nbsp;OTP CODE : ##OTP##&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</p>\r\n<div style=\"height: 30px;\">&nbsp;</div>', '##OTP##', '2019-03-29 09:00:00', '2019-03-29 06:01:20'),
(8, 'Successful Registration Reply', 'Aircraft Rental - Successful Registration Reply', 'Aircraft Rental - Admin', 'admin@support.com', '<p>Hello ##FIRST_NAME##,</p>\r\n<p>Congratulations! You are successfully registered on ##PROJECT_NAME##. You can access your account after confirmation of our system admin, we will contact you soon. Thank you for choosing ##PROJECT_NAME##.</p>\r\n<p>Your login credentials as below :</p>\r\n<p>UserID : ##USER_ID##</p>\r\n<p>Password : ##PASSWORD##</p>', '##FIRST_NAME##~ \r\n##USER_TYPE##~  \r\n##PASSWORD##~  \r\n##PROJECT_NAME##~  \r\n##USER_ID##', '2019-03-29 04:56:39', '2019-04-12 17:20:42'),
(9, 'Contract Signed Reply', 'Aircraft Rental  - Contract Signed Reply', 'Aircraft Rental  - Admin', 'admin@support.com', '<p>Hello ##FIRST_NAME##, Congratulations! Contract have been successfully signed as ##USER_TYPE## on ##PROJECT_NAME##. Thank you for choosing ##PROJECT_NAME##.</p>', '#FIRST_NAME##~\r\n##USER_TYPE##~ \r\n ##PROJECT_NAME##~', '2019-03-29 05:03:04', '2019-03-29 04:32:21'),
(10, 'Quotation Reply', 'Aircraft Rental  - Quotation reply', 'Aircraft Rental - Admin', 'admin@support.com', '<p>Hello ##USER_NAME##,</p>\r\n<p>&nbsp; &nbsp; As you requested quotation for following details,here is quotation for the same.&nbsp;</p>\r\n<p>RFQ-ID :&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;##RFQ_ID##</p>\r\n<p>Aircraft name :&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; ##AIRCRAFT_NAME##</p>\r\n<p>From Date :&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;##FROM_DATE##</p>\r\n<p>To Date :&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; ##TO_DATE##</p>\r\n<p>Estimated Price/Hr :&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; $ ##ESTIMATED_PRICE##</p>\r\n<p>-----------------------------------------------------------------------</p>\r\n<p>Total Amount :&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; $ ##PRICE##</p>\r\n<p>Other Charges:&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;$ ##OTHER_CHARGES##</p>\r\n<p>------------------------------------------------------------------------</p>\r\n<p>Final Amount :&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; $ ##TOTAL_AMOUNT##</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p><strong style=\"margin: 0px; padding: 0px; font-family: \'Open Sans\', Arial, sans-serif; text-align: justify;\">Lorem Ipsum</strong><span style=\"font-family: \'Open Sans\', Arial, sans-serif; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</span></p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>Thank you! for choosing ##PROJECT_NAME##.</p>', '##USER_NAME##~##USER_TYPE##~##PROJECT_NAME##~##AIRCRAFT_NAME##~##FROM_DATE##~##TO_DATE##~##ESTIMATED_PRICE##~##RFQ_ID##~##OTHER_CHARGES##~##TOTAL_AMOUNT##~##PRICE##\n', '2019-03-29 05:12:35', '2020-01-14 10:24:57'),
(11, 'Invitation', 'Aircraft Rental - Invitation', 'Aircraft Rental - Admin', 'admin@support.com', '<p>Hello ##FIRST_NAME##,</p>\r\n<p>You have been invited by ##USER_NAME## to join ##PROJECT_NAME## as an ##USER_TYPE##&nbsp;. Please join ##PROJECT_NAME## where you can rent Aircraft\'s easily.</p>\r\n<p>Thank You!!</p>\r\n<p>&nbsp;</p>', '##USERNAME##~##USER_TYPE##~##FIRST_NAME##~##PROJECT_NAME##', '2019-03-29 05:38:47', '2019-03-29 05:47:03'),
(12, 'SMS Template', 'Aircraft Rental- SMS Template', 'Aircraft Rental Admin', 'admin@support.com', 'Hello ##FIRST_NAME##,\r\n\r\nYou have been invited by ##USER_NAME## to join ##PROJECT_NAME## as an ##USER_TYPE## . Please join ##PROJECT_NAME## where you can rent Aircraft\'s easily.\r\n\r\nThank You!!\r\n\r\n', '##FIRST_NAME##~##USER_NAME##~##PROJECT_NAME##', '2019-03-29 05:54:44', '0000-00-00 00:00:00'),
(13, 'Send Details Reply', 'Aircraft Rental  - Send Details reply', 'Aircraft Rental  - Admin', 'admin@support.com', '<p><strong>Hello&nbsp;<span style=\"line-height: 1.6em;\">##FIRST_NAME##,&nbsp;</span></strong></p>\r\n<p><span style=\"line-height: 1.6em;\"><strong>Congratulations!</strong> </span></p>\r\n<p><span style=\"line-height: 1.6em;\">You are successfully verified as ##USER_TYPE## on ##PROJECT_NAME##. Thank you for choosing ##PROJECT_NAME##. Please login with following details</span></p>\r\n<p><span style=\"line-height: 1.6em;\">UserID:##USER_ID##</span></p>\r\n<p><span style=\"line-height: 1.6em;\">Password:##PASSWORD##</span></p>\r\n<p><br /><br /></p>\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>', '##FIRST_NAME##~##USER_TYPE##~##PROJECT_NAME##~##VERIFICATION_LINK##~##USER_ID##~##PASSWORD##~##LOGIN_LINK##', '2019-04-04 11:54:41', '2019-04-17 05:29:00'),
(14, 'Registration Reply', 'Aircraft Rental  - Registration Request', 'Aircraft Rental  - Admin', 'admin@support.com', '<p>Hello ##FIRST_NAME##,</p>\r\n<p>Congratulations! We have received your registration request as ##USER_TYPE## on ##PROJECT_NAME##.&nbsp; Set your account password now. Thank you for choosing ##PROJECT_NAME##.&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>Please set your password from here : ##LINK##</p>', '<p>Hello ##FIRST_NAME##,</p>\r\n<p>Congratulations! You have successfully registered as ##USER_TYPE## on ##PROJECT_NAME##. Thank you for choosing ##PROJECT_NAME##. -</p>\r\n<p>UserID:##USER_ID##</p>\r\n<p>Please set your password from here : ##LINK##</p>', '2019-04-12 07:13:11', '2019-04-12 17:15:51'),
(15, 'Account Activation Reply', 'Aircraft Rental  - Account Activation reply', 'Aircraft Charter  - Admin', 'admin@support.com', '<p>Hello ##USER_NAME##,</p>\r\n<p>Congratulations! You have been successfully verified on ##PROJECT_NAME## by Admin. Thank you for choosing ##PROJECT_NAME##.</p>\r\n<p>&nbsp;</p>', '##USERNAME##~##PROJECT_NAME##', '2019-04-12 07:13:56', '2019-05-24 04:06:39'),
(16, 'contact Enquiry', 'Aircraft Rental  - contact Enquiry ', 'Aircraft Rental  - Admin', 'admin@support.com', '<tr>\r\n   <td style=\"color: #333333;font-size: 15px;padding-top: 3px;text-align: center;\">##SUBJECT##</td>\r\n</tr>\r\n<tr>\r\n   <td height=\"40\"></td>\r\n</tr>\r\n<tr>\r\n   <td style=\"color: #333333; font-size: 16px; padding: 0 30px;\"> Hello <span style=\"color:#0a54b9;font-family: \'Latomedium\',sans-serif;\">##USERNAME##,</span> </td>\r\n</tr>\r\n<tr>\r\n   <td style=\"color: #545454;font-size: 15px;padding: 12px 30px;\"> Thank you for contacting us, we will get back you soon! </td>\r\n</tr>\r\n<tr>\r\n   <td height=\"20\"></td>\r\n</tr>', '##SUBJECT##,\r\n##USERNAME##', '2019-04-12 07:13:56', '2019-04-22 06:34:08'),
(17, 'Send Newsletter', 'Aircraft Rental  - Send Newsletter', 'Aircraft Rental - Admin', 'admin@support.com', '<table style=\"margin-bottom: 0;\" border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\">\r\n<tbody>\r\n<tr style=\"height: 23px;\">\r\n<td style=\"color: #333333; font-size: 16px; padding: 0px 30px; height: 35px;\">Hello,</td>\r\n</tr>\r\n<tr style=\"height: 64px;\">\r\n<td style=\"color: #545454; font-size: 15px; padding: 12px 30px; height: 64px;\">\r\n<p>&nbsp;</p>\r\n<p><span style=\"color: #545454;\"><span style=\"font-size: 15px;\"> ##MESSAGE## </span></span></p>\r\n</td>\r\n</tr>\r\n<tr style=\"height: 22px;\">\r\n<td style=\"color: #333333; font-size: 16px; padding: 0px 30px; height: 22px;\">&nbsp;</td>\r\n</tr>\r\n<tr style=\"height: 21px;\">\r\n<td style=\"color: #0050a0; font-size: 15px; padding: 0px 30px; height: 21px;\">&nbsp;</td>\r\n</tr>\r\n</tbody>\r\n</table>', '', '2019-05-02 08:54:40', '2019-05-03 12:05:58'),
(18, 'Email Verification', 'Aircraft Rental - Email Verification', 'Aircraft Rental - Admin', 'admin@support.com', '<p>Hello ##FIRST_NAME##,</p>\r\n<p>Congratulations! You are successfully registered on ##PROJECT_NAME##. You can access your account after confirmation of our system admin, we will contact you soon. Thank you for choosing ##PROJECT_NAME##.</p>\r\n<p>Your email verification otp below :</p>\r\n<p>UserID : ##USER_ID##</p>\r\n<p>OTP : ##OTP##</p>', '##FIRST_NAME##~ \r\n##USER_TYPE##~   \r\n##PROJECT_NAME##~\r\n##USER_ID##~  \r\n##OTP##', '2019-05-03 11:51:17', '2019-06-29 06:47:23'),
(19, 'Login Credtionals', 'Somtom - Send Details reply', 'admin@laravel.com', 'admin@laravel.com', '<p><strong>Hello&nbsp;<span style=\"line-height: 1.6em;\">##FIRST_NAME##,&nbsp;</span></strong></p>\r\n<p><span style=\"line-height: 1.6em;\">&nbsp;Congratulations! You are successfully registered on ##PROJECT_NAME##. Thank you for choosing ##PROJECT_NAME##. Please login with follwing credentials :</span></p>\r\n<p><span style=\"line-height: 1.6em;\"> UserID :&nbsp;</span>##USER_ID## <br>Password : ##PASSWORD##</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;##LOGIN_LINK##</p>\r\n<p>&nbsp;</p>', '##FIRST_NAME##~##PROJECT_NAME##~##USER_ID##~##PASSWORD##', '2020-02-07 12:27:17', '2020-03-02 06:36:59');

-- --------------------------------------------------------

--
-- Table structure for table `front_pages`
--

CREATE TABLE `front_pages` (
  `id` int(11) NOT NULL,
  `page_title` varchar(255) NOT NULL,
  `page_description` text NOT NULL,
  `slug` varchar(300) NOT NULL,
  `meta_keyword` varchar(255) NOT NULL,
  `meta_title` varchar(255) NOT NULL,
  `meta_description` varchar(500) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `front_pages`
--

INSERT INTO `front_pages` (`id`, `page_title`, `page_description`, `slug`, `meta_keyword`, `meta_title`, `meta_description`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(7, 'Terms & Conditions', '<p><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">By signing up or entering your email, logging into your account, or accepting notifications, you agree to receive personalized PoketDeal deals, discount or event or related email, notifications or SMS each day. You may unsubscribe at any time.</span></p>\r\n<p><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">Welcome to the PoketDeal website (defined below). By using it, you are agreeing to these Terms of Use (defined below). Please read them carefully. If you have any questions, please contact us.</span></p>\r\n<p><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">These Terms of Use were last updated on September 1, 2018.</span></p>\r\n<p><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">&nbsp;</span></p>\r\n<p><strong><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">1. INTRODUCTORY&nbsp;</span></strong></p>\r\n<p><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">Important &ndash; please read these terms carefully. By using this Service, you agree that you have read, understood, accepted and agreed with the Terms and Conditions. You further agree to the representations made by yourself below. If you do not agree to or fall within the Terms and Conditions of the Service (as defined below) and wish to discontinue using the Service, please do not continue using this Application or Service. The terms and conditions stated herein (collectively, the &ldquo;Terms and Conditions&rdquo; or this &ldquo;Agreement&rdquo;) constitute a legal agreement between you and POKETDEAL (the &ldquo;Company&rdquo;) a trademark of CREATICK INTERNATIONAL.</span></p>\r\n<p><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">In order to use the Service (each as defined below) you must agree to the Terms and Conditions that are set out below. By using the mobile applications supplied to you by the Company (the &ldquo;Application&rdquo;), and downloading, installing or using any associated software supplied by the Company (the &ldquo;Software&rdquo;) which overall purpose is to enable the Service (each as defined below), you hereby expressly acknowledge and agree to be bound by the Terms and Conditions, and any future amendments and additions to this Terms and Conditions as published from time to time at PoketDeal.com&nbsp;or through the Application.</span></p>\r\n<p><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">&nbsp;</span></p>\r\n<p><strong><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">2. DEFINITIONS</span></strong></p>\r\n<p><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">The following terms shall have the following respective meanings:</span></p>\r\n<p><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">2.1 &ldquo;Merchant&rdquo; means a third party who shall supply or provide the goods and/or services for which a Voucher/ Coupon/ Ticket can be redeemed.</span></p>\r\n<p><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">2.2 &ldquo;Purchase&rdquo; means the purchase of a Service/ Product through the Application only.</span></p>\r\n<p><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">2.3 &ldquo;Register&rdquo; means creating an account on the Application.</span></p>\r\n<p><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">2.4 &ldquo;Service&rdquo; or &ldquo;Services&rdquo; means all and any of the services provided by the Company via the Website or application, including but not limited to the information services, content and transaction capabilities on the Website or Application and the availability to make a Purchase.</span></p>\r\n<p><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">2.5 &ldquo;Deal&rdquo; or &ldquo;Deals&rdquo; means all kind of offers for an individual or group from the merchants on particular services or products.</span></p>\r\n<p><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">2.6 &ldquo;Discount&rdquo; means a reduction in usual price published in the menu card or rate chart on total bill (conditions may apply) offered by the merchants on their services or goods.</span></p>\r\n<p><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">2.7 &ldquo;Event&rdquo; or &ldquo;Events&rdquo; means an activity that is planned for entertainment purpose by us or other merchant or companies, for example, a sport, party, trade show, concert, live show, gala dinner or any other related program hosted or organized or only for ticket selling via application.</span></p>\r\n<p><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">2.8 &ldquo;Voucher&rdquo; or &ldquo;Vouchers&rdquo; means a service or product or ticket or pass purchased by the user through the Application to exchange or redeem for the Voucher Products from a particular or relevant Merchant.</span></p>\r\n<p><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">2.9 &ldquo;Voucher Products&rdquo; means the products and/or services/ entry pass to be supplied and/or provided by the Merchant.</span></p>\r\n<p><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">2.10 &ldquo;Reward Point&rdquo; means the point awarded upon each transaction mentioned or declared with the deals or discount or event listings and can be used or redeemed in future for purchasing vouchers.</span></p>\r\n<p><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">2.11 &ldquo;Charity Point&rdquo; means the accumulated points of all users which will be added automatically in the section upon each successful transaction and will be used for social work with the presence of the user in different areas quarterly or half yearly.</span></p>\r\n<p><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">2.12 &ldquo;Website&rdquo; refers to PoketDeal.com, and all their related landing pages or microsites and their mobile app or application / mobile web equivalents.</span></p>\r\n<p><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">&nbsp;</span></p>\r\n<p><strong><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">3. REGISTRATION AND USER REQUIREMENTS &amp; OBLIGATIONS</span></strong></p>\r\n<p><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">3.1 You must be a registered member to make orders and access certain features of the Website.</span></p>\r\n<p><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">3.2 You will provide us with personal information including your name, address, phone number and a valid email address. You must ensure this information is accurate and current.</span></p>\r\n<p><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">3.3 Information is stored securely, and will only be used and disclosed in accordance with our Privacy Policy (which can be accessed here:&nbsp;https://poketdeal.com/privacy-policy.</span></p>\r\n<p><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">3.4 You are solely responsible for the activity that occurs on your account, and you must keep your account password secure.</span></p>\r\n<p><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">3.5 If you suspect or become aware of any unauthorized use of your account or that your password is no longer secure, you must notify us immediately (support@poketdeal.com). &nbsp;If you use multiple logins or accounts for the purpose of disrupting a community or annoying other users, we reserve the right to take any action which we deem fit against your account, your use of the Website and/or any of the Services.</span></p>\r\n<p><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">3.6 We are not liable for any unauthorized use of your account.</span></p>\r\n<p><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">3.7 By using the Website and its associated functionality, you grant your express consent to us to send you direct marketing communications to the email address you provide, from which you may unsubscribe at any time. Your consent to receive certain communications may be implied from the use of certain functional aspects of our service, such as receiving reminders that items are in your notification bar if you leave the page during a transaction.</span></p>\r\n<p><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">3.8 To register an account and use the Website you must be at least 18 years old, and have capacity to enter into a legally binding agreement with us.</span></p>\r\n<p><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">3.9 Only one session or login is allowed at a time.</span></p>\r\n<p><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">3.10 You need a mobile device to sign up and use all the functions of the app. You cannot access your account from the website.</span></p>\r\n<p><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">3.11 You hereby acknowledge that the Merchants will have their own applicable terms and conditions in relation to the supply of Voucher Products for the redemption of the Voucher, in which you agree to and shall abide by those terms and conditions.</span></p>\r\n<p><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">3.12 Without limitation, you undertake not to use or permit anyone else to use the Services and/or Website:</span></p>\r\n<p><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">3.13 You are prohibited to send or receive any material which is threatening, grossly offensive, of an indecent, obscene or menacing character, blasphemous or defamatory of any person, in contempt of court or in breach of confidence, copyright, rights of personality, publicity or privacy or any other third party rights; to send or receive any material which is technically harmful (including computer viruses, logic bombs, Trojan horses, worms, harmful components, corrupted data or other malicious software or harmful data); to cause annoyance, inconvenience or needless anxiety; to intercept or attempt to intercept any communications transmitted by way of a telecommunications system; for a purpose other than which we have designed them or intended them to be used; for any fraudulent purpose.</span></p>\r\n<p><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">3.14 You cannot resale of any Voucher;</span></p>\r\n<p><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">3.15 You cannot engage in any unlawful activity in connection with the use of the Website and/or the Services or any Voucher; or engage in any conduct which, in our exclusive reasonable opinion, restricts or inhibits any other customer from properly using or enjoying the Website and Service.</span></p>\r\n<p><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">&nbsp;</span></p>\r\n<p><strong><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">4. USE OF THE WEBSITE</span></strong></p>\r\n<p><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">4.1 Place: The Website and/or the availability of the Services and/or any Purchase are directed solely to those who access the Website from the cities that are listed on the Website. We make no representation that the Services are available or otherwise suitable for use by persons outside the listed cities. If you choose to access the Website (including the use of the Services and/or to make a Purchase) from locations outside of the listed cities, you hereby agree that you do so on your own initiative and are responsible for the consequences and for compliance with all applicable laws.</span></p>\r\n<p><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">4.2 Eligibility: To use the Website, the Services and/or to make any Purchase, you must be eighteen (18) years of age or over.</span></p>\r\n<p><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">4.3 Scope: The availability of the Website, Services and/or any Purchase are strictly for your noncommercial, personal use only. Commercial use for any business purposes or use on behalf of any third party is prohibited, except as explicitly permitted by us in advance. For the avoidance of doubt, scraping of the Website (and hacking of the Website) is not allowed.</span></p>\r\n<p><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">4.4 Prohibitions and Prevention of usage: You shall not misuse the Website. You shall not commit or encourage a criminal offence, transmit or distribute a virus including but not limited to Trojan horse, worm, logic bomb or post any other materials on the Website which is malicious, technologically harmful, in breach of confidence or in any way offensive or obscene, corrupt data, cause annoyance other users, infringe upon the rights of any other person&rsquo;s proprietary rights or send any unsolicited advertising or promotional material. We reserve the right, at our own discretion, to prevent you from using the Website, the Services (or any part of them) and/or from making any Purchase.</span></p>\r\n<p><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">&nbsp;</span></p>\r\n<p><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">4.4 Equipment: Your agreement to use the Services, the Website and/or the making of any Purchase does not include the provision of a computer or any other necessary equipment by us to you in achieving any of the said purposes. To use the Website, the Services and/or to make a Purchase, you will require internet connectivity and appropriate telecommunication links. We shall not be liable for any telephone costs, telecommunications costs or other costs that you may incur in connection with the same.</span></p>\r\n<p><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">&nbsp;</span></p>\r\n<p><strong><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">5. ACCESS TO THE SITE</span></strong></p>\r\n<p><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">PoketDeal retains the right, at our sole discretion, to deny service or use of the Site or an account to anyone at any time and for any reason. While we use reasonable efforts to keep the Site and your account accessible, the Site and/or your account may be unavailable from time to time. You understand and agree that there may be interruptions in service or events, Site access, or access to your account due to circumstances both within our control (e.g., routine maintenance) and outside of our control.</span></p>\r\n<p><strong><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">6. WEBSITE CHANGES</span></strong></p>\r\n<p><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">6.1 We reserve the right to change, modify, substitute, suspend or remove without notice any information or Voucher or Services or forming part of the Services from time to time. Your access to the Website and/or the Services may also be occasionally restricted to allow for repairs, maintenance or the introduction of new facilities or services. We will attempt to restore such access as soon as we reasonably can. We assume no responsibility for functionality which is dependent on your browser or other third party software to operate (including, without limitation, RSS feeds). For the avoidance of doubt, we may also withdraw any information or Voucher from the Website or Service at any time.</span></p>\r\n<p><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">6.2 We will use reasonable efforts to allow uninterrupted access to the Services and the Website, however we shall not be held liable in the event access to the Services and the Website may be suspended, restricted or terminated at any time.</span></p>\r\n<p><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">6.2 We may in our sole discretion terminate your account or restrict your access to the Website.</span></p>\r\n<p><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">If we do this, you may be prevented from accessing all or parts of the Website, your account details, or other content contained in your account. In the event that this occurs you will still be entitled to access those vouchers that you had previously purchased through the Website.</span></p>\r\n<p><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">&nbsp;</span></p>\r\n<p><strong><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">7. SUSPENSION AND TERMINATION</span></strong></p>\r\n<p><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">7.1 If you (or any other third party authorized by you) use the Website, the Services and/or the Voucher in contravention of these Terms and Conditions, we may suspend your use of the Services, the Website (in whole or in part) and/or the redemption of a Voucher.</span></p>\r\n<p><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">7.2 Upon suspension of usage, we may refuse to restore the Services or Website or Voucher until we receive an assurance from you, in the format that we deem acceptable. that there will be no further breach of the provisions of these Terms and Conditions.</span></p>\r\n<p><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">7.3 We shall fully co-operate with any law enforcement authorities or court order requesting or directing us to disclose the identity or locate anyone who is in breach of these Terms and Conditions.</span></p>\r\n<p><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">7.4 if we suspect, on reasonable grounds, that you may have committed or be committing any fraud against us or any person your account may be suspended.</span></p>\r\n<p><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">7.5 The Company (including all its subsidiaries, brands, related and/or associated companies/brands) reserves the right to terminate and/or suspend your account at any time for whatsoever reason, and is not obligated to disclose the reason behind the termination and/or suspension.</span></p>\r\n<p><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">&nbsp;</span></p>\r\n<p><strong><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">8. ACCESS AND USE OF OUR SOCIAL MEDIA PAGES</span></strong></p>\r\n<p><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">8.1 We will not be held responsible for third party posts on our social media pages. You will be responsible for content you post on our social media pages, and you must not post content that:</span></p>\r\n<p><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">8.1.1 Breaches the terms of use of the relevant social media service provider;</span></p>\r\n<p><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">8.1.2 Is defamatory or in contempt of legal proceedings;</span></p>\r\n<p><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">8.1.3 Is misleading or deceptive;</span></p>\r\n<p><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">8.1.4 That is offensive, including discriminatory against race, sex, sexual orientation, nationality, ethnicity or religion;</span></p>\r\n<p><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">8.1.5 Contains religious or political material;</span></p>\r\n<p><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">8.1.6 Is indecent, obscene or pornographic;</span></p>\r\n<p><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">8.1.7 Infringes any third party intellectual property rights;</span></p>\r\n<p><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">8.1.8 Contains any promotional or advertising material;</span></p>\r\n<p><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">8.1.9. Contains or links to computer viruses, malware, spyware or similar software.</span></p>\r\n<p><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">&nbsp;</span></p>\r\n<p><strong><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">9. SOCIAL MEDIA AND CONTENT</span></strong></p>\r\n<p><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">9.1 You understand that all information, such as comments, messages, text, files, images, photos, video, sounds and other materials (\"content\") posted on, transmitted through or linked from the Website, our Facebook page, Twitter feed, or forum or other like application or site that allows for the publication of user generated material (&ldquo;Social Media&rdquo;), is the sole responsibility of the person from whom such content originated.</span></p>\r\n<p><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">9.2 You understand that we do not control and are not responsible for content made available through the Website or Social Media unless it originates from us. Consequently, by using the Website or our Social Media pages you may be exposed to content provided by third parties that is offensive, indecent, inaccurate, misleading or otherwise objectionable. You use the Website at your own risk and to the extent permissible at law we do not accept liability in this regard.</span></p>\r\n<p><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">9.3 As a member or participant on our Social Media pages, you agree that you are responsible for any content submitted, posted or made available through the Website via your account and you must not post (or allow) content to be posted through your account that:</span></p>\r\n<p><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">9.3.1 you do not have the right to post;</span></p>\r\n<p><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">9.3.2 is defamatory or in contempt of any legal or other proceedings;</span></p>\r\n<p><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">9.3.3 is misleading or deceptive;</span></p>\r\n<p><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">9.3.4 incites hatred or discrimination against any group of persons being a group defined by reference to colour, race, sex, origin, nationality or ethnic or national origins;</span></p>\r\n<p><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">9.3.5 denounces religious or political beliefs;</span></p>\r\n<p><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">9.3.6 includes religious or political material which is or is likely to be offensive;</span></p>\r\n<p><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">9.3.7 is indecent, obscene, vulgar, pornographic, offensive or of doubtful propriety or of a menacing character or is likely to annoy or concern;</span></p>\r\n<p><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">9.3.8 infringes any copyright, trade mark, patent or other intellectual property right of another person;</span></p>\r\n<p><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">9.3.9 contains viruses or similar software or data which is designed to interrupt, destroy or limit the functionality of any computer software or hardware; or</span></p>\r\n<p><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">9.3.10 impersonates any person or misrepresents your relationship with any person.</span></p>\r\n<p><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">9.4 We reserve the right, in our absolute discretion, to pre-screen, refuse or remove any content from the Website or our Social Media pages without giving any reasons.</span></p>\r\n<p><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">9.5 You understand and agree that we may retain server and backup copies of your submitted content even if you have altered, removed or deleted your content from public display.</span></p>\r\n<p><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">&nbsp;</span></p>\r\n<p><strong><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">10. TERMS &amp; CONDITION MODIFICATION</span></strong></p>\r\n<p><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">We reserve the right at all times to discontinue or modify any part of these Terms of Use in our sole discretion. If you do not agree to the changes, you may close your account and you should not use the Site or any services offered through the Site after the effective date of the changes. We suggest that you revisit our Terms of Use regularly to ensure that you stay informed of any changes. You agree that posting notice of any changes on the Terms of Use page is adequate notice to advise you of these changes, and that your continued use of the Site or our services will constitute acceptance of these changes and the Terms of Use as modified.</span></p>\r\n<p><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">&nbsp;</span></p>\r\n<p><strong><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">11. INDEMNITY</span></strong></p>\r\n<p><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">You shall defend, indemnify and hold us and our affiliates harmless from any and all claims, liabilities, costs and expenses, including reasonable attorneys&rsquo; fees, arising in any way from your use of the Website and/or Services or the placement or transmission of any message, information, software or other materials through the Website by you or related to any violation of these Terms and Conditions by you or authorized users of your account.</span></p>\r\n<p><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">&nbsp;</span></p>\r\n<p><strong><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">12. YOUR PRIVACY</span></strong></p>\r\n<p><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">We take the privacy of your Personal Information (defined in the Privacy Statement) seriously. We encourage you to carefully review our Privacy Statement for important disclosures about ways that we may collect, use, and share personal data and your choices. Our Privacy Statement is incorporated in and subject to these Terms of Use, and available in our Privacy Policy</span></p>\r\n<p><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">&nbsp;</span></p>\r\n<p><strong><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">13 ADVERTISEMENTS</span></strong></p>\r\n<p><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">13.1 We may place advertisements in different locations on the Website and at different points during your use of the Website and/or Services. These locations and points may change from time to time - but we will always clearly mark which goods and services are advertisements (i.e. from persons other than us), so that it is clear to you which goods and services are provided on an objective basis and which are not (i.e. the advertisements).</span></p>\r\n<p><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">13.2 You are free to select or click on advertised goods and services or not as you see fit.</span></p>\r\n<p><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">13.3 Any advertisements may be delivered on our behalf by a third-party advertising company.</span></p>\r\n<p><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">13.4 No personal data (for example your name, address, email address or telephone number) will be used during the course of serving our advertising, but, on our behalf, our third-party advertiser or affiliate may place or recognize a unique &ldquo;cookie&rdquo; on your browser (see our Privacy Policy here about this). This cookie will not collect personal data about you nor is it linked to any personal data about you. If you would like more information about this practice and to know your choices about not having this information used by any company, see our Privacy Policy here about this which you can click on for more information.</span></p>\r\n<p><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">&nbsp;</span></p>\r\n<p><strong><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">14. PURCHASES AND PAYMENT</span></strong></p>\r\n<p><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">14.1 You may pay cash at merchant point if the option is available for the merchant.</span></p>\r\n<p><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">14.2 You may pay through the reward point (not partial bill) if the option is available for the merchant.</span></p>\r\n<p><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">14.3 If the option is available for the merchant you can pay online. The third-party payment gateway service allows transactions to be made online according to the price listed on the Website or on the Merchant&rsquo;s price list. When a transaction takes place, payment is processed whereby (a) credit card / debit card / online banking/ mobile banking information is held and (b) price of the transaction is charged to the selected payment method immediately.</span></p>\r\n<p><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">14.4 A current, valid and accepted payment method (as may be updated periodically, &ldquo;Payment Method&rdquo;) must be provided to us for use of the Service. When using our Service, it is assumed that the stipulated price listen on each item on the Website and/or on the Merchant&rsquo;s price list is mutually agreed upon transacting.</span></p>\r\n<p><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">14.5 Should payment method fail, we retain the right to request and/or seek payment from you through other avenues. Payment method may be edited by referring to the &ldquo;Payment&rdquo; page (mobile application). In the situation whereby payment is unsuccessful due to any reason (expiration, insufficient funds or otherwise), you are responsible to edit your payment method. Failure to do will result in allowing us the authority to continue billing the pre-selected payment method. All responsibility to resolve any/all disputed with your financial institution, credit/debit card issuer or provider of your selected Payment Method, are to be borne by you.</span></p>\r\n<p><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">14.6 PoketDeal does not guarantee that it offers best available rates or prices and does not guarantee against pricing errors. PoketDeal reserves the right, in its sole discretion, to not process or to cancel any orders placed, including, without limitation, if the price was incorrectly posted on the Site. If this occurs, PoketDeal will attempt to notify you by email. In addition, PoketDeal reserves the right, in its sole discretion, to correct any error in the stated retail price of the Merchant Offering or Product.</span></p>\r\n<p><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">14.7 If an offer becomes unavailable between ordering and processing, PoketDeal will either cancel or not process the order.</span></p>\r\n<p><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">14.8 By purchasing, viewing a mobile version, printing, accepting, using or attempting to use any Voucher, you agree specifically to the terms on the Voucher and any additional deal-specific terms advertised in connection with and on the Voucher at the time of purchase (the &ldquo;fine print&rdquo; regardless of how labeled), the Terms of Use and these Terms of Sale. These rules apply to all Vouchers that we make available, unless a particular Voucher&rsquo;s fine print states otherwise, and except as otherwise required by law. In the event of a conflict between these rules and a Voucher&rsquo;s fine print, the Voucher&rsquo;s fine print will control. Any attempt to redeem a Voucher in violation of these Terms of Use (including, without limitation, the Terms of Sale) will render the Voucher void.</span></p>\r\n<p><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">14.9 The Merchant is the sole issuer of the Voucher. Vouchers are not redeemable for cash, unless required by law. Unauthorized or unlawful reproduction, resale, modification, or trade of Vouchers is prohibited. Pricing relating to certain Merchant Offerings and Products on the Site may change at any time in PoketDeal&rsquo;s discretion, without notice.</span></p>\r\n<p><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">&nbsp;</span></p>\r\n<p><strong><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">15. REFUNDS (THIS PART IS NOT COMPLETE YET)</span></strong></p>\r\n<p><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">All transactions which are conducted are non-refundable in the case of partially used credits or unclaimed purchases. In cases whereby, you have been wrongfully billed, a &ldquo;case-to-case&rdquo; basis approach will be taken in the presence of credible evidence of such. The Company holds full authority and discretion towards the outcome of such circumstances.&nbsp;All refunds will be processed in Reward Point. Cash refund requests will be considered on a case-by-case basis and will be subjected to a surcharge of ten per centum (10%) on the transacted amount. The Company reserves the right to conduct thorough investigations over a period of time deemed that is deemed necessary by customer service agents of the Company.</span></p>\r\n<p><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">&nbsp;</span></p>\r\n<p><strong><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">16. BOOKINGS</span></strong></p>\r\n<p><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">16.1 All service products are offered by merchants subject to availability. For all products that require bookings (mentioned in terms &amp; conditions), we recommend making bookings at least THREE (3) weeks in advance by calling the merchant directly. Peak times (such as weekends or holidays) should be booked further in advance (and will often be limited).</span></p>\r\n<p><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">16.2 We do not guarantee that services will be available at your preferred date and time.</span></p>\r\n<p><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">16.3 Bookings are made subject to any merchant policies.</span></p>\r\n<p><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">16.4 If you cancel your booking you may incur a cancellation fee payable to the merchant. Short notice cancellations may result in the cancellation of your voucher if the merchant is unable to fill your space. In that regard, the cancellation policies of the merchant will apply at all times. Please ensure that you check the terms &amp; conditions of the merchant or particular deal or discount or event before booking.</span></p>\r\n<p><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">16.5 If required by the merchant, you may need to produce the voucher prior to the service being performed or product being provided. In the event that you forget, lose, misplace or have the voucher stolen, you will be required to produce another copy of the voucher. Neither poketdeal.com, nor the merchant, shall be required to provide any refund or a replacement booking or product, in the event that You fail to produce a voucher upon request.</span></p>\r\n<p><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">&nbsp;</span></p>\r\n<p><strong><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">17. IMPORTANT INFORMATION RELATING TO HEALTH OR NUTRITIONAL PRODUCTS</span></strong></p>\r\n<p><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">NOTHING CONTAINED ON THIS WEBSITE IS INTENDED TO BE OR SHOULD BE TAKEN FOR MEDICAL DIAGNOSIS OR TREATMENT.</span></p>\r\n<p><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">17.1. The information and statements provided on this [Website] with respect to any health or nutritional product that we retail from time to time is not intended to diagnose, treat, cure, or prevent any disease. Such information and statement with respect to any product is for general knowledge only and should not be relied upon.</span></p>\r\n<p><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">17.2. Medical advice is required for any health or nutritional related treatment or condition and for dosages of the pharmaceutical product supplied via this Website.</span></p>\r\n<p><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">17.3. You take full and total responsibility for what you do with this information and any resulting outcomes from your actions.</span></p>\r\n<p><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">17.4. All information contained on this Website is not intended nor is it implied to be a substitute for professional medical advice or any information contained on or in any product packaging or labels.</span></p>\r\n<p><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">17.5. Always seek the advice of your Pharmacist or General Practitioner when making decisions concerning starting any new medical treatment, continuing with medical treatment or with any questions you may have regarding any health or nutritional related treatment or condition.</span></p>\r\n<p><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">&nbsp;</span></p>\r\n<p><strong><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">18. VOUCHER EXPIRY AND EXTENSION</span></strong></p>\r\n<p><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">18.1 The voucher expires on the date indicated on the voucher.</span></p>\r\n<p><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">18.2 Expired vouchers are non-refundable in whole or part. Once expired, vouchers are no longer valid and will not be honored by the merchant.</span></p>\r\n<p><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">&nbsp;</span></p>\r\n<p><strong><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">19. COMPLAINTS OR PROBLEMS</span></strong></p>\r\n<p><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">We have no liability (including for loss or damage) for any act, omission or default, whether negligent or otherwise of any merchant.</span></p>\r\n<p><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">If you wish to make a complaint in respect of a merchant, you must email that complaint to&nbsp;support@poketdeal.com</span></p>\r\n<p><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">Notwithstanding the nature of the complaint, Refunds will only be provided in accordance with our Refunds Policy.</span></p>\r\n<p><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">&nbsp;</span></p>\r\n<p><strong><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">20 MERCHANT TERMS &amp; CONDITIONS</span></strong></p>\r\n<p><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">Any Terms and Conditions of the specific merchant will always apply in addition to any specific terms of the Deal stated by poketdeal.com. For example, if a Merchant is not open on certain days, the voucher will not be redeemable on those days. Refunds are not payable in the event that you are unable to use a voucher on account of the Merchant \'s usual terms and conditions.</span></p>\r\n<p><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">&nbsp;</span></p>\r\n<p><strong><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">21 VOUCHERS: AVAILABILITY OF GOODS AND SERVICES AND SCHEDULING</span></strong></p>\r\n<p><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">21.1 You agree and acknowledge that:</span></p>\r\n<p><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">21.1.1 where merchants offer services on the basis of \'sessions\' or otherwise on a time basis, the advertised duration may be indicative and approximate;</span></p>\r\n<p><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">21.1.2 merchants are under no obligation to give you priority over other, full paying or ordinary customers in respect of booking or scheduling for their services, and all services are rendered subject to availability.</span></p>\r\n<p><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">21.1.3 where merchants offer an experience based on an itinerary or schedule of events, the scheduling of or order for those events may vary from time to time;</span></p>\r\n<p><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">21.1.4 the merchants of certain types of experiences may impose conditions such as a minimum age or other restrictions regarding weight, health or other factors. It is your responsibility to confirm details of any restrictions that may apply from the merchant prior to purchasing any poketdeal.com voucher, or finalizing any booking and confirm that you are able to comply;</span></p>\r\n<p><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">21.1.5 photographs appearing on our website to illustrate details of offers of merchants are generally those made available to us by merchants or chosen by us for illustration purpose only. They are intended to be indicative only of the services, venues and locations at which services are offered by merchants. For example, they may depict only one of various venues and locations at which the services are offered and given your geographic location this may not be the venue or location applicable to you;</span></p>\r\n<p><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">21.1.6 a representation on the website that services will be available over a range of dates does not preclude you from being required to make a booking for the services to which the booking relates. Bookings may not be available on short notice;</span></p>\r\n<p><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">21.1.7 restaurant menus advertised on the website are indicative only and subject to change without notice; and</span></p>\r\n<p><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">21.1.8 where merchants offer a course or series of sessions or treatments (such as beauty treatments and waxing appointments) you agree that these may need to be scheduled at intervals to be determined in consultation with the merchant, in order to maximize the efficacy of the services provided or to minimize risks to health or wellbeing.</span></p>\r\n<p><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">&nbsp;</span></p>\r\n<p><strong><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">22. INTELLECTUAL PROPERTY</span></strong></p>\r\n<p><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">22.1 We reserve all intellectual property rights, including but not limited to, copyright in material and/or services provided by us. Nothing in the Agreement gives you a right to use any of our marketing material, business names, trademarks, logos, domain names or other distinctive brand features.</span></p>\r\n<p><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">22.2 Other trademarks used on the Website that belong to third parties are used with permission and remain the intellectual property of the third party.</span></p>\r\n<p><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">22.3 You may not:</span></p>\r\n<p><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">(a) modify or copy the layout or appearance of the Website nor any computer software or code contained in the Website; and/or</span></p>\r\n<p><span style=\"font-size: 10.0pt; font-family: \'Arial\',sans-serif; color: #333333;\">(b) decompile or disassemble, reverse engineer or otherwise attempt to discover or access any source code related to the Website.</span></p>', 'terms-conditions', 'Terms & Conditions', 'Terms & Conditions', 'Terms & Conditions', '1', '2018-04-25 03:25:02', '2019-02-14 09:48:37', NULL),
(9, 'Privacy Policy', '<p>Most<code> of the modern day interactive web sites use cookies to enable us to retrieve user details for each visit. Cookies are used in some areas of our site to enable the functionality of this area and ease of use for those people visiting. Some of our affiliate / advertising partners may also use cookies</code></p>', 'privacy-policy', 'Privacy Policy', 'Privacy Policy', 'Privacy Policy', '1', '2018-07-26 05:42:57', '2019-02-14 09:48:26', NULL),
(10, 'FAQ', '<p>Most<code>&nbsp;of the modern day interactive web sites use cookies to enable us to retrieve user details for each visit. Cookies are used in some areas of our site to enable the functionality of this area and ease of use for those people visiting. Some of our affiliate / advertising partners may also use cookies</code></p>', 'faq', 'FAQ', 'FAQ', 'FAQ', '1', '2019-02-14 09:49:07', '2019-02-14 09:49:07', NULL),
(11, 'Guidelines', '<p><span style=\"font-family: \'Open Sans\', Arial, sans-serif; text-align: justify;\">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</span></p>', 'guidelines', 'Guidelines', 'Guidelines', 'Guidelines', '1', '2019-05-10 05:33:37', '2019-05-10 05:33:37', NULL);
INSERT INTO `front_pages` (`id`, `page_title`, `page_description`, `slug`, `meta_keyword`, `meta_title`, `meta_description`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(12, 'Investor Information', '<p><span style=\"font-family: \'Open Sans\', Arial, sans-serif; text-align: justify;\">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</span></p>', 'investor-information', 'Investor Information', 'Investor Information', 'Investor Information', '1', '2019-05-10 05:34:30', '2019-05-10 05:34:30', NULL),
(13, 'Legal terms', '<p><span style=\"font-family: \'Open Sans\', Arial, sans-serif; text-align: justify;\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</span></p>', 'legal-terms', 'Legal terms', 'Legal terms', 'Legal terms', '1', '2019-05-10 05:35:00', '2019-05-10 05:59:32', NULL),
(14, 'Site map', '<p><span style=\"font-family: \'Open Sans\', Arial, sans-serif; text-align: justify;\">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.</span></p>', 'site-map', 'Site map', 'Site map', 'Site map', '1', '2019-05-10 05:36:39', '2019-05-10 05:59:05', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `id` int(11) NOT NULL,
  `location_name` varchar(100) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `location_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Bangkok', '1', '2020-03-02 03:37:21', '2020-03-02 03:37:21'),
(2, 'Chiang Mai', '1', '2020-03-02 03:37:32', '2020-03-02 03:37:32'),
(3, 'Phitsanulok', '1', '2020-03-02 03:37:40', '2020-03-02 03:37:40'),
(4, 'Phuket', '1', '2020-03-02 03:37:49', '2020-03-02 03:37:49'),
(5, 'Pattaya', '1', '2020-03-02 03:37:57', '2020-03-02 03:37:57'),
(6, 'Ubon Ratchathani', '0', '2020-03-04 04:36:09', '2020-03-03 23:06:09');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2017_02_20_233057_create_permission_tables', 1),
(3, '2017_02_22_171712_create_posts_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `models`
--

CREATE TABLE `models` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `gender` enum('male','female','other') DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `company` int(11) NOT NULL,
  `size` varchar(150) NOT NULL,
  `from_time` varchar(10) NOT NULL,
  `to_time` varchar(10) NOT NULL,
  `country_id` int(11) DEFAULT NULL,
  `country` varchar(50) NOT NULL DEFAULT 'Defult',
  `category` int(11) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `mobile_number` varchar(255) DEFAULT NULL,
  `wechat` enum('yes','no') DEFAULT 'no',
  `line` enum('yes','no') DEFAULT 'no',
  `email` varchar(255) NOT NULL,
  `location` int(11) DEFAULT NULL,
  `password` text,
  `user_id` int(11) NOT NULL,
  `is_set_password` enum('0','1') DEFAULT '0',
  `set_password_link_expiry` date DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `profile_image` varchar(1000) DEFAULT NULL,
  `referal_code` varchar(50) DEFAULT NULL,
  `is_email_verified` enum('0','1') DEFAULT '0' COMMENT '0=unverified, 1=verified',
  `is_verified` enum('0','1') DEFAULT '0',
  `verification_token` varchar(255) DEFAULT NULL,
  `status` enum('0','1') NOT NULL COMMENT '1=active, 0=inactive',
  `last_logged_at` datetime DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `models`
--

INSERT INTO `models` (`id`, `first_name`, `last_name`, `address`, `gender`, `date_of_birth`, `price`, `company`, `size`, `from_time`, `to_time`, `country_id`, `country`, `category`, `state`, `city_id`, `mobile_number`, `wechat`, `line`, `email`, `location`, `password`, `user_id`, `is_set_password`, `set_password_link_expiry`, `remember_token`, `profile_image`, `referal_code`, `is_email_verified`, `is_verified`, `verification_token`, `status`, `last_logged_at`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Dipti', 'Sharma', 'Bankok', NULL, '1999-01-04', 5000, 1, 'Natural', '19:00', '23:00', NULL, 'Thailand', 1, NULL, NULL, '7894561327', 'yes', 'yes', 'dipti@gmail.com', 1, NULL, 0, '0', NULL, NULL, NULL, NULL, '0', '0', NULL, '0', NULL, '2020-03-02 03:46:31', '2020-03-02 03:46:31', NULL),
(2, 'Saina', 'Agrwal', '2154/2 Sukhumvit Rd., Bang Chak, Phra Khanong', NULL, '2010-02-09', 5000, 1, 'Natural', '19:00', '13:00', NULL, 'Thailand', 2, NULL, NULL, '7894562134', 'yes', 'yes', 'saina@gmail.com', 2, NULL, 0, '0', NULL, NULL, NULL, NULL, '0', '0', NULL, '0', NULL, '2020-03-02 03:48:42', '2020-03-02 03:48:42', NULL),
(3, 'Priti', 'Agrwal', 'Nai Mueang, Muang Lampoon, Lampoon', NULL, '2004-06-21', 5000, 1, 'Normal', '20:00', '23:56', NULL, 'Thailand', 3, NULL, NULL, '7894561327', 'yes', 'yes', 'priti@gmail.com', 4, NULL, 0, '0', NULL, NULL, NULL, NULL, '0', '0', NULL, '0', NULL, '2020-03-02 03:50:36', '2020-03-02 03:50:36', NULL),
(4, 'Samira', 'Saina', 'Phuket Address', NULL, '1997-09-22', 5000, 2, 'Natural', '20:40', '23:55', NULL, 'Thailand', 1, NULL, NULL, '7894561327', 'no', 'no', 'samira@gmail.com', 4, NULL, 0, '0', NULL, NULL, NULL, NULL, '0', '0', NULL, '0', NULL, '2020-03-02 04:04:27', '2020-03-02 04:04:27', NULL),
(5, 'Priti', 'Sharma', 'Ubon Address', NULL, '2005-07-14', 5000, 2, 'Natural', '20:10', '23:00', NULL, 'Thailand', 5, NULL, NULL, '7894561327', 'yes', 'yes', 'priti@gmail.com', 6, NULL, 0, '0', NULL, NULL, NULL, NULL, '0', '0', NULL, '0', NULL, '2020-03-02 04:08:26', '2020-03-02 04:08:26', NULL),
(6, 'Ragina', 'Mahajan', 'Thailand Address', NULL, '1995-07-13', 500, 2, 'Normal', '18:00', '23:00', NULL, 'Thailand', 4, NULL, NULL, '7895612379', 'yes', 'yes', 'ragin@gmail.com', 3, NULL, 1, '0', NULL, NULL, NULL, NULL, '0', '0', NULL, '0', NULL, '2020-03-02 04:13:48', '2020-03-02 04:14:59', NULL),
(7, 'Amodni', 'Sharma', '71/22 Boromrajchonnee Aroon Amarin Noi', NULL, '2008-11-17', 2000, 2, 'Normal', '20:38', '20:45', NULL, 'Thailand', 5, NULL, NULL, '7984651234', 'yes', 'yes', 'amodin@gmail.com', 1, NULL, 1, '0', NULL, NULL, NULL, NULL, '0', '0', NULL, '0', NULL, '2020-03-02 04:20:13', '2020-03-02 04:20:13', NULL),
(8, 'Sami', 'Sharma', '314/3 Silom Suriyawong Bang Rak', NULL, '2018-02-06', 5000, 2, 'Natural', '20:00', '23:00', NULL, 'Thailand', 4, NULL, NULL, '7894651324', 'no', 'yes', 'sami@gmail.com', 1, NULL, 0, '0', NULL, NULL, NULL, NULL, '0', '0', NULL, '0', NULL, '2020-03-02 04:25:53', '2020-03-02 04:25:53', NULL),
(9, 'Shaina', 'Davidson', '71/22 Boromrajchonnee Aroon Amarin Noi', NULL, '2007-10-30', 2000, 1, 'Natural', '07:55', '23:55', NULL, 'Thailand', 1, NULL, NULL, '7894651327', 'no', 'no', 'shaina@gmail.com', 5, NULL, 0, '0', NULL, NULL, NULL, NULL, '0', '0', NULL, '0', NULL, '2020-03-02 04:27:35', '2020-03-02 04:27:35', NULL),
(12, 'Saina', 'Davidson', 'Ladna', NULL, '2004-06-29', 2000, 2, 'Natural', '20:55', '23:00', NULL, 'Thailand', 4, NULL, NULL, '7984651326', 'yes', 'yes', 'shaina@gmail.com', 3, NULL, 0, '0', NULL, NULL, NULL, NULL, '0', '0', NULL, '0', NULL, '2020-03-04 01:41:13', '2020-03-04 01:41:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `model_services`
--

CREATE TABLE `model_services` (
  `id` int(11) NOT NULL,
  `service_id` int(50) DEFAULT NULL,
  `service_name` varchar(50) DEFAULT NULL,
  `model_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `model_services`
--

INSERT INTO `model_services` (`id`, `service_id`, `service_name`, `model_id`, `created_at`, `updated_at`) VALUES
(1, 5, NULL, 1, '2020-03-02 03:46:32', '2020-03-02 03:46:32'),
(2, 4, NULL, 1, '2020-03-02 03:46:32', '2020-03-02 03:46:32'),
(3, 5, NULL, 2, '2020-03-02 03:48:43', '2020-03-02 03:48:43'),
(4, 4, NULL, 2, '2020-03-02 03:48:43', '2020-03-02 03:48:43'),
(5, 3, NULL, 2, '2020-03-02 03:48:43', '2020-03-02 03:48:43'),
(6, 5, NULL, 3, '2020-03-02 03:50:36', '2020-03-02 03:50:36'),
(7, 4, NULL, 3, '2020-03-02 03:50:36', '2020-03-02 03:50:36'),
(8, 3, NULL, 3, '2020-03-02 03:50:36', '2020-03-02 03:50:36'),
(9, 2, NULL, 3, '2020-03-02 03:50:36', '2020-03-02 03:50:36'),
(10, 1, NULL, 3, '2020-03-02 03:50:37', '2020-03-02 03:50:37'),
(11, 4, NULL, 4, '2020-03-02 04:04:28', '2020-03-02 04:04:28'),
(12, 3, NULL, 4, '2020-03-02 04:04:28', '2020-03-02 04:04:28'),
(13, 3, NULL, 5, '2020-03-02 04:08:26', '2020-03-02 04:08:26'),
(14, 2, NULL, 5, '2020-03-02 04:08:27', '2020-03-02 04:08:27'),
(18, 3, NULL, 6, '2020-03-02 04:14:58', '2020-03-02 04:14:58'),
(19, 4, NULL, 6, '2020-03-02 04:14:58', '2020-03-02 04:14:58'),
(20, 5, NULL, 6, '2020-03-02 04:14:58', '2020-03-02 04:14:58'),
(21, 5, NULL, 7, '2020-03-02 04:20:14', '2020-03-02 04:20:14'),
(22, 4, NULL, 7, '2020-03-02 04:20:14', '2020-03-02 04:20:14'),
(23, 3, NULL, 7, '2020-03-02 04:20:14', '2020-03-02 04:20:14'),
(24, 2, NULL, 7, '2020-03-02 04:20:14', '2020-03-02 04:20:14'),
(25, 1, NULL, 7, '2020-03-02 04:20:14', '2020-03-02 04:20:14'),
(26, 3, NULL, 8, '2020-03-02 04:25:53', '2020-03-02 04:25:53'),
(27, 2, NULL, 8, '2020-03-02 04:25:53', '2020-03-02 04:25:53'),
(28, 5, NULL, 9, '2020-03-02 04:27:35', '2020-03-02 04:27:35'),
(29, 4, NULL, 9, '2020-03-02 04:27:35', '2020-03-02 04:27:35'),
(30, 4, NULL, 10, '2020-03-02 04:29:40', '2020-03-02 04:29:40'),
(31, 3, NULL, 10, '2020-03-02 04:29:41', '2020-03-02 04:29:41'),
(34, 3, NULL, 11, '2020-03-02 05:52:01', '2020-03-02 05:52:01'),
(35, 4, NULL, 11, '2020-03-02 05:52:01', '2020-03-02 05:52:01'),
(36, 5, NULL, 12, '2020-03-04 01:41:14', '2020-03-04 01:41:14'),
(37, 4, NULL, 12, '2020-03-04 01:41:14', '2020-03-04 01:41:14'),
(38, 3, NULL, 12, '2020-03-04 01:41:14', '2020-03-04 01:41:14'),
(39, 2, NULL, 12, '2020-03-04 01:41:14', '2020-03-04 01:41:14'),
(40, 1, NULL, 12, '2020-03-04 01:41:14', '2020-03-04 01:41:14');

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE `newsletter` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `newsletter`
--

INSERT INTO `newsletter` (`id`, `email`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'sule@cyber-host.net', '2019-04-26 03:31:27', '2019-04-26 03:31:27', NULL),
(2, 'miye@email-list.online', '2019-05-02 07:04:03', '2019-05-02 07:04:03', NULL),
(3, 'merito@webgmail.info', '2019-05-03 12:04:28', '2019-05-03 12:04:28', NULL),
(34, 'miledolop@directmail.top', '2019-05-16 09:51:08', '2019-05-16 09:51:08', NULL),
(44, 'merito@webgmail.infoo', '2019-05-18 09:34:44', '2019-05-18 09:34:44', NULL),
(46, 'xirozoj@tech5group.com', '2019-05-28 08:37:36', '2019-05-28 08:37:36', NULL),
(47, 'bicevax@royalgifts.info', '2019-05-30 10:06:21', '2019-05-30 10:06:21', NULL),
(48, 'pamexicubi@bizsearch.info', '2019-06-10 11:30:49', '2019-06-10 11:30:49', NULL),
(49, 'xanuxaxu@daily-email.com', '2019-06-11 08:19:51', '2019-06-11 08:19:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `newsletter_template`
--

CREATE TABLE `newsletter_template` (
  `id` int(11) NOT NULL,
  `title` varchar(211) NOT NULL,
  `subject` varchar(211) NOT NULL,
  `news_description` text NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `newsletter_template`
--

INSERT INTO `newsletter_template` (`id`, `title`, `subject`, `news_description`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Test', 'Test', '<p>Test</p>', '1', '2019-04-22 08:22:33', '2019-04-22 08:38:03', '2019-04-22 08:38:03'),
(2, 'sdf', 'sdf', '<p>sdf</p>', '1', '2019-04-22 08:24:45', '2019-04-22 08:45:33', '2019-04-22 08:45:33'),
(3, 'sdfsdf', 'sdfsf', '<p>sdf</p>', '1', '2019-04-22 08:44:19', '2019-04-22 08:45:08', '2019-04-22 08:45:08'),
(4, 'tttt', 'ttt', '<p>ttt</p>', '1', '2019-04-22 08:45:16', '2019-04-22 08:45:33', '2019-04-22 08:45:33'),
(5, 'Test', 'Test', '<p>test</p>', '1', '2019-04-22 08:45:47', '2019-05-02 05:24:27', '2019-05-02 05:24:27'),
(6, 'Newsletter Tile', 'Newsletter subject', '<p><strong>Lorem Ipsum</strong><span>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p>', '1', '2019-05-02 07:00:43', '2019-05-02 08:10:42', NULL),
(7, 'Newsletter 2', 'Subject 2', '<p><span>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\'.</span></p>', '0', '2019-05-02 08:08:15', '2019-06-28 07:32:28', NULL),
(8, 'New', 'New', 'New', '1', '2019-06-28 07:42:28', '2019-06-28 07:42:28', NULL),
(9, 'vv', 'vv', 'vv', '1', '2019-06-28 07:43:03', '2019-06-28 07:43:03', NULL),
(11, 'sd', 'sd', 'sd', '1', '2019-06-28 07:44:26', '2019-06-28 07:44:33', '2019-06-28 07:44:33'),
(12, 'testtest', 'testtest', 'testtesttest', '1', '2020-02-03 01:34:31', '2020-02-03 01:34:31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `receiver_type` varchar(128) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `sender_type` varchar(128) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `redirect_url` varchar(255) DEFAULT NULL,
  `notification_type` enum('general','reservation','transaction') NOT NULL,
  `status` enum('0','1') CHARACTER SET utf8 NOT NULL DEFAULT '0' COMMENT '0 = Unread, 1 = Read',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Table structure for table `point_system`
--

CREATE TABLE `point_system` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `range_from` int(11) NOT NULL,
  `range_to` int(11) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `point_system`
--

INSERT INTO `point_system` (`id`, `name`, `range_from`, `range_to`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Basic', 1, 10, '1', '2020-02-21 04:17:36', '2020-03-02 06:39:27'),
(2, 'Silver', 10, 100, '1', '2020-02-21 04:18:01', '2020-03-02 06:39:20'),
(3, 'Gold', 101, 1000, '1', '2020-02-21 04:18:22', '2020-02-21 04:18:22');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `review_from_id` int(11) NOT NULL COMMENT 'IF review_to = '' AIRCRAFT'' THEN user_id used as clients id, and if review_to = '' USER'' then user id used as aircraft owner id',
  `review_to_id` int(11) DEFAULT NULL COMMENT 'this fields value considered as user/client or aircraft owner id ( primary key )',
  `reviews` varchar(255) NOT NULL,
  `ratings` varchar(255) NOT NULL,
  `aircraft_id` int(11) NOT NULL,
  `review_to` enum('AIRCRAFT','USER','RESERVATION') DEFAULT NULL,
  `reservation_id` varchar(100) DEFAULT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `service_name` varchar(50) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `service_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Service 1', '1', '2020-03-02 03:40:23', '2020-03-02 03:40:23'),
(2, 'Service 2', '1', '2020-03-02 03:40:29', '2020-03-02 03:40:29'),
(3, 'Service 3', '1', '2020-03-02 03:40:35', '2020-03-02 03:40:35'),
(4, 'Service 4', '1', '2020-03-02 03:40:39', '2020-03-02 03:40:39'),
(5, 'Service 5', '1', '2020-03-02 03:40:44', '2020-03-02 04:51:49');

-- --------------------------------------------------------

--
-- Table structure for table `site_settings`
--

CREATE TABLE `site_settings` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `site_name` varchar(255) NOT NULL,
  `site_address` varchar(255) NOT NULL,
  `meta_description` varchar(150) NOT NULL,
  `country_code` varchar(10) DEFAULT NULL,
  `country_name` varchar(50) DEFAULT NULL,
  `site_contact_number` varchar(255) DEFAULT NULL,
  `site_status` enum('0','1') NOT NULL DEFAULT '1' COMMENT '0=offline, 1=online',
  `meta_title` varchar(255) NOT NULL,
  `meta_desc` text NOT NULL,
  `meta_keyword` varchar(500) NOT NULL,
  `site_email_address` varchar(255) DEFAULT NULL,
  `fb_url` varchar(255) NOT NULL,
  `twitter_url` varchar(255) NOT NULL,
  `gmail_url` varchar(500) NOT NULL,
  `linkedin_url` varchar(255) DEFAULT NULL,
  `youtube_url` varchar(255) DEFAULT NULL,
  `instagram_url` varchar(255) DEFAULT NULL,
  `commission_rate` float DEFAULT NULL,
  `commission_payment_gateway` float(10,2) NOT NULL,
  `lat` text,
  `lon` text,
  `charity_points` float(10,2) DEFAULT '0.00',
  `carrer_video_link` varchar(300) DEFAULT NULL COMMENT 'video link for carrer page',
  `bank_name` varchar(255) DEFAULT NULL,
  `branch_name` varchar(255) NOT NULL,
  `swift_code` varchar(15) DEFAULT NULL,
  `account_number` varchar(50) DEFAULT NULL,
  `bank_address` varchar(255) DEFAULT NULL,
  `logo` varchar(255) NOT NULL,
  `send_order_email` varchar(100) NOT NULL,
  `favicon` varchar(255) NOT NULL,
  `ifsc_code` varchar(15) DEFAULT NULL,
  `bank_pin` varchar(10) DEFAULT NULL,
  `referral_code_value_user` int(11) NOT NULL,
  `referral_code_value_operator` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `site_settings`
--

INSERT INTO `site_settings` (`id`, `title`, `site_name`, `site_address`, `meta_description`, `country_code`, `country_name`, `site_contact_number`, `site_status`, `meta_title`, `meta_desc`, `meta_keyword`, `site_email_address`, `fb_url`, `twitter_url`, `gmail_url`, `linkedin_url`, `youtube_url`, `instagram_url`, `commission_rate`, `commission_payment_gateway`, `lat`, `lon`, `charity_points`, `carrer_video_link`, `bank_name`, `branch_name`, `swift_code`, `account_number`, `bank_address`, `logo`, `send_order_email`, `favicon`, `ifsc_code`, `bank_pin`, `referral_code_value_user`, `referral_code_value_operator`, `created_at`, `updated_at`) VALUES
(1, 'Somtam', 'Parking', 'Nashik Phata Road, Ganeesham Phase 2, Sai Nagar Park, Pimple Saudagar, Pimpri-Chinchwad, Maharashtra, India', 'Somtam', '91', 'in', '7878878900', '1', 'Parking', 'Parking', 'Somtam', 'admin@parking.com', 'https://facebook.com/', 'https://twitter.com/', 'https://www.gmail.com/', 'https://www.pinterest.com', NULL, NULL, 34, 2.00, '18.5974877', '73.8041624', 2427.50, 'https://www.youtube.com/watch?v=itnNaEEP6n0', 'HDFC bank', 'HDFC bank Pune', 'BARBINBBNSK342', '12345677654321', 'Pune Railway Station, Agarkar Nagar, Pune, Maharashtra', '9b7b45a3e37c8b00e131583980cf40998d626e32.jpeg', 'admin@somtam.com', '', 'BARB0NASIKC', '1570', 11, 18, '2018-04-13 06:48:30', '2020-03-18 11:58:52');

-- --------------------------------------------------------

--
-- Table structure for table `sms_template`
--

CREATE TABLE `sms_template` (
  `id` int(11) NOT NULL,
  `template_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `template_html` text COLLATE utf8_unicode_ci NOT NULL,
  `template_variables` varchar(500) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NA' COMMENT '~ Separated',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sms_template`
--

INSERT INTO `sms_template` (`id`, `template_name`, `template_html`, `template_variables`, `created_at`, `updated_at`) VALUES
(1, 'Profile Verification', '<p>##USER_NAME## your profile verification approved by admin.</p>', '##NAME##~##USER_TYPE##', '2018-04-22 18:30:00', '2019-02-14 10:36:45'),
(5, 'New Registration', '##NAME## is registered as a ##USER_TYPE##', '##NAME##~##USER_TYPE##', '2018-04-22 09:00:00', '2018-04-27 05:04:12'),
(7, 'Send OTP', '##OTP## is your OTP. Welcome to PoketDeal.', '##OTP##', '2018-05-04 18:30:00', '2018-09-11 00:56:58');

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `country_id` int(11) NOT NULL,
  `latitude` varchar(20) NOT NULL,
  `longitude` varchar(20) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`id`, `name`, `slug`, `country_id`, `latitude`, `longitude`, `status`, `created_at`, `deleted_at`, `updated_at`) VALUES
(1, 'maharashtra', 'maharashtra', 1, '19.7515', '75.7139', '1', '2019-03-19 12:56:42', '2019-03-19 12:56:42', '2019-03-19 12:56:42'),
(2, 'Goa', 'goa', 1, '15.2993', '74.1240', '1', '2019-03-19 11:57:37', '2019-03-19 13:27:37', '2019-03-27 03:59:05'),
(3, 'Gujratt', 'gujratt', 2, '22.25870', '71.19240', '0', '2019-03-19 11:58:39', '2019-03-19 13:28:39', '2019-03-20 09:53:58');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `user_name` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `admin_status` enum('0','1') NOT NULL DEFAULT '0',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `user_name`, `email`, `password`, `admin_status`, `updated_at`, `created_at`) VALUES
(1, 'Somtam', 'Admin', 'Somtam', 'somtam@yopmail.com', '$2y$10$WxYabVtJ1g6pP7v7M7erOOv/6uvSWZmG/uI/ikG9kg5KwAUkI4.mS', '1', '2020-03-03 23:08:09', '2020-03-04 04:38:09'),
(2, 'Akshay', 'Ugale', 'Akshay', 'akshayugalekr@yopmail.com', '$2y$10$NhtbZWj4G60j.coVPmFgeedDtKRhViPk29aVcWxJYWmZ.flW1b.y.', '1', '2020-03-03 00:07:10', '2020-03-03 05:37:10');

-- --------------------------------------------------------

--
-- Table structure for table `users_password_resets`
--

CREATE TABLE `users_password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user_image`
--

CREATE TABLE `user_image` (
  `id` int(11) NOT NULL,
  `profile_image` varchar(50) DEFAULT NULL,
  `user_id` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_image`
--

INSERT INTO `user_image` (`id`, `profile_image`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '0fecfc0fc38a10dc06e7125e81bb4eef7648485d.jpeg', '1', '2020-03-02 03:46:31', '2020-03-02 03:46:31'),
(2, 'a720bbd18da70b99389196487325d7fc96620b4b.jpeg', '1', '2020-03-02 03:46:31', '2020-03-02 03:46:31'),
(3, 'a448b52cbca4ec31115eaf6f162496a55e542ab7.jpeg', '1', '2020-03-02 03:46:31', '2020-03-02 03:46:31'),
(4, 'e568f036aee1f161cb39ee9325ee91e7afd63b97.jpeg', '1', '2020-03-02 03:46:31', '2020-03-02 03:46:31'),
(5, '0c737d5d2006d3509e3044b3a8bd8cc4b2fcd4ea.jpeg', '1', '2020-03-02 03:46:31', '2020-03-02 03:46:31'),
(6, '923424a52d6391afec35f995be8a9ea4617a8508.jpeg', '2', '2020-03-02 03:48:42', '2020-03-02 03:48:42'),
(7, '4acb76d6e8bae66f0fa57ffef453f3e9411022de.jpeg', '2', '2020-03-02 03:48:42', '2020-03-02 03:48:42'),
(8, '4181f9c9d12291bfb2f73252c88754dbc976d580.jpeg', '2', '2020-03-02 03:48:43', '2020-03-02 03:48:43'),
(9, 'da6e358cea01170632470471912d203bb6fdc0b7.jpeg', '2', '2020-03-02 03:48:43', '2020-03-02 03:48:43'),
(10, 'b9d770c83f7125a40614ec12c6ff6796a5d1e43e.jpeg', '2', '2020-03-02 03:48:43', '2020-03-02 03:48:43'),
(11, '74cbfd76948f9cc1f463f608fc5cc0e28c386c69.jpeg', '3', '2020-03-02 03:50:36', '2020-03-02 03:50:36'),
(12, '0892cd26af31a4a9e4bc7ec2c9bb23b00af67f1c.jpeg', '3', '2020-03-02 03:50:36', '2020-03-02 03:50:36'),
(13, 'c5ea302aaa3c81d70af4f3499aaf88ca0a393bf4.jpeg', '3', '2020-03-02 03:50:36', '2020-03-02 03:50:36'),
(14, '7166ab15248fc43b8020a6deb8872c2778218cd8.jpeg', '3', '2020-03-02 03:50:36', '2020-03-02 03:50:36'),
(15, 'be1a2adc7a49c5ee8e3a1822a9f5886751591cb4.jpeg', '3', '2020-03-02 03:50:36', '2020-03-02 03:50:36'),
(16, 'be28a14631afe91f75fc832af1b5626df43500a3.jpeg', '4', '2020-03-02 04:04:27', '2020-03-02 04:04:27'),
(17, '0d36b7d877fee2d63a01333bc244c8709643bc29.jpeg', '4', '2020-03-02 04:04:27', '2020-03-02 04:04:27'),
(18, '91ae279a0b87b1929082fa1fd2ddc1806a5d5617.jpeg', '4', '2020-03-02 04:04:28', '2020-03-02 04:04:28'),
(19, 'ec24e8d72757be1e86fe9d78ed6363e852c238d4.jpeg', '4', '2020-03-02 04:04:28', '2020-03-02 04:04:28'),
(20, '76527804c243050d63682d0b643e01e51e0a5dc6.jpeg', '4', '2020-03-02 04:04:28', '2020-03-02 04:04:28'),
(21, '500d5a34ed349de4fa0ab93c164e5a0ed4be8499.jpeg', '5', '2020-03-02 04:08:26', '2020-03-02 04:08:26'),
(22, '8ec4e3d45c940068c6869bb3ef4eb5f7f457592c.jpeg', '5', '2020-03-02 04:08:26', '2020-03-02 04:08:26'),
(23, '7652afcf1a593a31994cbd5784d6fbc4fc9886ae.jpeg', '5', '2020-03-02 04:08:26', '2020-03-02 04:08:26'),
(24, '6327539d4cc064cfa90aa7788d9c47dfe318fa77.jpeg', '5', '2020-03-02 04:08:26', '2020-03-02 04:08:26'),
(25, 'f0f7c7ff4b37c2e2d50815ed84c6a0529577a444.jpeg', '5', '2020-03-02 04:08:26', '2020-03-02 04:08:26'),
(28, '0a48b86a54c03c5899dffd5e0eef79eed3d7886a.jpeg', '6', '2020-03-02 04:14:58', '2020-03-02 04:14:58'),
(29, '8006902462d799c9432759ae8cdbdbaa7c917712.jpeg', '6', '2020-03-02 04:14:58', '2020-03-02 04:14:58'),
(30, '1f01be5f442f670e107cd271c87dead9e91df9b9.jpeg', '6', '2020-03-02 04:14:58', '2020-03-02 04:14:58'),
(31, '87d16dcbdbe80f57050171d5f4680e52dfdc362e.jpeg', '7', '2020-03-02 04:20:13', '2020-03-02 04:20:13'),
(32, '0a2b3d14f14d38f35c9832dbd203111c1a401a43.jpeg', '7', '2020-03-02 04:20:13', '2020-03-02 04:20:13'),
(33, '34ca72fd75115f3f5b415ac5438387a2b52f2ac1.jpeg', '7', '2020-03-02 04:20:13', '2020-03-02 04:20:13'),
(34, 'fd5d40f830477cec9589b61ca5f5eb481eb5d650.jpeg', '7', '2020-03-02 04:20:14', '2020-03-02 04:20:14'),
(35, 'fec988e23ac51ee49084e4b946fdebdc86208b97.jpeg', '7', '2020-03-02 04:20:14', '2020-03-02 04:20:14'),
(36, '24ebbaebd32f7b7d1de868b6a78f0d586ee39d51.jpeg', '8', '2020-03-02 04:25:53', '2020-03-02 04:25:53'),
(37, 'c9628810d65fd877a6b08127a87862ed0ad357fe.jpeg', '8', '2020-03-02 04:25:53', '2020-03-02 04:25:53'),
(38, '3d6ec704fd76bb61616644466f61678ccc2b9ba3.jpeg', '8', '2020-03-02 04:25:53', '2020-03-02 04:25:53'),
(39, 'dbd43da0a2dbf5d2e5977439e85e39a0b828457b.jpeg', '9', '2020-03-02 04:27:35', '2020-03-02 04:27:35'),
(40, '4268976ac47841c05ba68d20240331ec197be076.jpeg', '9', '2020-03-02 04:27:35', '2020-03-02 04:27:35'),
(41, 'a23c594c6fe69b614289ba030b3f04a5fd378bae.jpeg', '9', '2020-03-02 04:27:35', '2020-03-02 04:27:35'),
(42, '559fccc8f49503d9b217394d54227686bd9714d5.jpeg', '9', '2020-03-02 04:27:35', '2020-03-02 04:27:35'),
(43, '27266c32be26ac34fbe1b169259df64c068d7b51.jpeg', '10', '2020-03-02 04:29:40', '2020-03-02 04:29:40'),
(44, 'd8b906191104c30949644381d8e1c2198521a883.jpeg', '10', '2020-03-02 04:29:40', '2020-03-02 04:29:40'),
(45, '58ed9ef196ca811fbc00c8d72372e84bc549471e.jpeg', '10', '2020-03-02 04:29:40', '2020-03-02 04:29:40'),
(46, '3a00921e63a1110538ae4a9f5514af71af554fd1.jpeg', '10', '2020-03-02 04:29:40', '2020-03-02 04:29:40'),
(53, '1a9282a82e4cc7d72400959a780ef4dd0a2b7500.jpeg', '12', '2020-03-04 01:41:13', '2020-03-04 01:41:13'),
(54, 'd34c9f4e9fd583cd91ac316ae837420f864d7549.jpeg', '12', '2020-03-04 01:41:14', '2020-03-04 01:41:14'),
(55, 'c303415174e431ad2c1ab01a8ebab1108b8a3a8c.jpeg', '12', '2020-03-04 01:41:14', '2020-03-04 01:41:14'),
(56, 'dac727d65d27773986bf963573de27c14aa52502.jpeg', '12', '2020-03-04 01:41:14', '2020-03-04 01:41:14'),
(57, '4ef6d5781d635efdb28e15da4a86b6ac2b552f39.jpeg', '12', '2020-03-04 01:41:14', '2020-03-04 01:41:14');

-- --------------------------------------------------------

--
-- Table structure for table `user_otp`
--

CREATE TABLE `user_otp` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `otp` varchar(10) DEFAULT NULL,
  `mobile_no` varchar(20) DEFAULT NULL,
  `expired_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `web_admin`
--

CREATE TABLE `web_admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` text,
  `password_reset_code` mediumtext,
  `contact` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `profile_image` varchar(100) DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1' COMMENT '0-inactive, 1-active',
  `permissions` enum('0','1') NOT NULL DEFAULT '1',
  `admin_type` enum('ADMIN','SUBADMIN') NOT NULL DEFAULT 'SUBADMIN',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `web_admin`
--

INSERT INTO `web_admin` (`id`, `first_name`, `last_name`, `email`, `password`, `password_reset_code`, `contact`, `remember_token`, `profile_image`, `address`, `status`, `permissions`, `admin_type`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Shaina', 'Davidson', 'admin@somtam.com', '$2y$10$bRDUwy4/2fnFmz1E.0lnaeVlr/TZcMgsk29yjxM0AkkpE1Og07SrC', NULL, '7894561327', 'ggIl2WZdYeaKFsZN5WtCPV0iqtjpq0TUF7p0ZXklsE4aZvY1WFUOhDKVjK0H', '0c751db1617789fb98dedf7240c84d346ad73a52.jpg', 'Nashik, Maharashtra, India', '1', '0', 'ADMIN', '2020-01-01 02:59:38', '2020-03-20 05:00:45', NULL),
(2, 'Subadmin', 'User', 'subadmin@gmail.com', '$2y$10$bRDUwy4/2fnFmz1E.0lnaeVlr/TZcMgsk29yjxM0AkkpE1Og07SrC', NULL, '7984651327', 'Qqtit7iNPkbKeu7jn1Zv1X38OQLRnpq3D5z75XnXE3ThekJt0fn88PyDoGo1', 'no-img-user-profile.jpeg', 'Nashik Railway Track Road, Nawle Colony, Government Colony, Nashik, Maharashtra, India', '1', '1', 'SUBADMIN', '2018-05-09 00:41:32', '2020-03-04 07:24:25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `web_admin_password_reset`
--

CREATE TABLE `web_admin_password_reset` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abilities`
--
ALTER TABLE `abilities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `abilities_scope_index` (`scope`);

--
-- Indexes for table `api_details`
--
ALTER TABLE `api_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs_category`
--
ALTER TABLE `blogs_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_enquiry`
--
ALTER TABLE `contact_enquiry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`country_id`);

--
-- Indexes for table `email_template`
--
ALTER TABLE `email_template`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `front_pages`
--
ALTER TABLE `front_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `models`
--
ALTER TABLE `models`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_services`
--
ALTER TABLE `model_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletter_template`
--
ALTER TABLE `newsletter_template`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `point_system`
--
ALTER TABLE `point_system`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_settings`
--
ALTER TABLE `site_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sms_template`
--
ALTER TABLE `sms_template`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_image`
--
ALTER TABLE `user_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_otp`
--
ALTER TABLE `user_otp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `web_admin`
--
ALTER TABLE `web_admin`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abilities`
--
ALTER TABLE `abilities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `api_details`
--
ALTER TABLE `api_details`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blogs_category`
--
ALTER TABLE `blogs_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contact_enquiry`
--
ALTER TABLE `contact_enquiry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `country_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=250;

--
-- AUTO_INCREMENT for table `email_template`
--
ALTER TABLE `email_template`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `front_pages`
--
ALTER TABLE `front_pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `models`
--
ALTER TABLE `models`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `model_services`
--
ALTER TABLE `model_services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `newsletter_template`
--
ALTER TABLE `newsletter_template`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `point_system`
--
ALTER TABLE `point_system`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `site_settings`
--
ALTER TABLE `site_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sms_template`
--
ALTER TABLE `sms_template`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_image`
--
ALTER TABLE `user_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `user_otp`
--
ALTER TABLE `user_otp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `web_admin`
--
ALTER TABLE `web_admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
