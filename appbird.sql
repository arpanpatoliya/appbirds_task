-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 10, 2023 at 04:15 PM
-- Server version: 5.7.31
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `appbird`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
CREATE TABLE IF NOT EXISTS `customers` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DOB` date NOT NULL,
  `about_you` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `customers_mobile_unique` (`mobile`),
  UNIQUE KEY `customers_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `country`, `mobile`, `DOB`, `about_you`, `created_at`, `updated_at`) VALUES
(4, 'customer', 'customer3@gmail.com', 'USA', '981312132', '2023-04-05', 'test dis3', NULL, '2023-04-10 10:38:02'),
(5, 'customer4', 'customer4@gmail.com', 'Ind', '981312134', '2023-04-10', 'test dis4', NULL, NULL),
(6, 'customer5', 'customer5@gmail.com', 'Ind', '981312135', '2023-04-10', 'test dis5', NULL, NULL),
(7, 'customer6', 'customer6@gmail.com', 'Ind', '981312136', '2023-04-10', 'test dis6', NULL, NULL),
(8, 'customer7', 'customer7@gmail.com', 'Ind', '981312137', '2023-04-10', 'test dis7', NULL, NULL),
(9, 'customer8', 'customer8@gmail.com', 'Ind', '981312138', '2023-04-10', 'test dis8', NULL, NULL),
(10, 'customer9', 'customer9@gmail.com', 'Ind', '981312139', '2023-04-10', 'test dis9', NULL, NULL),
(11, 'customer10', 'customer10@gmail.com', 'Ind', '9813121310', '2023-04-10', 'test dis10', NULL, NULL),
(12, 'customer11', 'customer11@gmail.com', 'Ind', '9813121311', '2023-04-10', 'test dis11', NULL, NULL),
(13, 'customer12', 'customer12@gmail.com', 'Ind', '9813121312', '2023-04-10', 'test dis12', NULL, NULL),
(14, 'customer13', 'customer13@gmail.com', 'Ind', '9813121313', '2023-04-10', 'test dis13', NULL, NULL),
(15, 'customer14', 'customer14@gmail.com', 'Ind', '9813121314', '2023-04-10', 'test dis14', NULL, NULL),
(16, 'customer15', 'customer15@gmail.com', 'Ind', '9813121315', '2023-04-10', 'test dis15', NULL, NULL),
(17, 'customer16', 'customer16@gmail.com', 'Ind', '9813121316', '2023-04-10', 'test dis16', NULL, NULL),
(18, 'customer17', 'customer17@gmail.com', 'Ind', '9813121317', '2023-04-10', 'test dis17', NULL, NULL),
(19, 'customer18', 'customer18@gmail.com', 'Ind', '9813121318', '2023-04-10', 'test dis18', NULL, NULL),
(20, 'customer19', 'customer19@gmail.com', 'Ind', '9813121319', '2023-04-10', 'test dis19', NULL, NULL),
(21, 'customer20', 'customer20@gmail.com', 'Ind', '9813121320', '2023-04-10', 'test dis20', NULL, NULL),
(22, 'customer21', 'customer21@gmail.com', 'Ind', '9813121321', '2023-04-10', 'test dis21', NULL, NULL),
(23, 'customer22', 'customer22@gmail.com', 'Ind', '9813121322', '2023-04-10', 'test dis22', NULL, NULL),
(24, 'customer23', 'customer23@gmail.com', 'Ind', '9813121323', '2023-04-10', 'test dis23', NULL, NULL),
(25, 'customer24', 'customer24@gmail.com', 'Ind', '9813121324', '2023-04-10', 'test dis24', NULL, NULL),
(26, 'customer25', 'customer25@gmail.com', 'Ind', '9813121325', '2023-04-10', 'test dis25', NULL, NULL),
(27, 'customer26', 'customer26@gmail.com', 'Ind', '9813121326', '2023-04-10', 'test dis26', NULL, NULL),
(28, 'customer27', 'customer27@gmail.com', 'Ind', '9813121327', '2023-04-10', 'test dis27', NULL, NULL),
(29, 'customer28', 'customer28@gmail.com', 'Ind', '9813121328', '2023-04-10', 'test dis28', NULL, NULL),
(30, 'customer29', 'customer29@gmail.com', 'Ind', '9813121329', '2023-04-10', 'test dis29', NULL, NULL),
(33, 'dasdsa', 'arpan@gmail.com1', 'asd', '3213123', '2023-04-06', 'asdas', '2023-04-10 10:07:32', '2023-04-10 10:07:32');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_04_10_111320_create_customers_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  UNIQUE KEY `password_resets_email_unique` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'Adminapp@gmail.com', NULL, '$2y$10$L70IPy5DYQGzQ4XLkEURf.yCOk8FGpkbbFFNUMGpax3L6gfz.aVb2', NULL, NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
