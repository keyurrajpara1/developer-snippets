-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 13, 2026 at 12:53 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `codeigniter_v3`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) NOT NULL,
  `parent_category_id` bigint(20) DEFAULT NULL,
  `category_name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_category_id`, `category_name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, NULL, 'Print', '2026-10-13 06:36:39', '2026-10-13 06:36:39', NULL),
(2, NULL, 'Clothing', '2026-10-13 06:36:39', '2026-10-13 06:36:39', NULL),
(3, NULL, 'Marketing', '2026-10-13 06:36:39', '2026-10-13 06:36:39', NULL),
(4, 1, 'Business Cards', '2026-10-13 06:36:39', '2026-10-13 06:36:39', NULL),
(5, 1, 'Flyers', '2026-10-13 06:36:39', '2026-10-13 06:36:39', NULL),
(6, 1, 'Brochures', '2026-10-13 06:36:39', '2026-10-13 06:36:39', NULL),
(7, 4, 'Standard Business Cards', '2026-10-13 06:36:39', '2026-10-13 06:36:39', NULL),
(8, 4, 'Premium Business Cards', '2026-10-13 06:36:39', '2026-10-13 06:36:39', NULL),
(9, 7, 'Single-Sided Cards', '2026-10-13 06:36:39', '2026-10-13 06:36:39', NULL),
(10, 2, 'T-Shirts', '2026-10-13 06:36:39', '2026-10-13 06:36:39', NULL),
(11, 2, 'Hoodies', '2026-10-13 06:36:39', '2026-10-13 06:36:39', NULL),
(12, 10, 'Round Neck T-Shirts', '2026-10-13 06:36:39', '2026-10-13 06:36:39', NULL),
(13, 3, 'Digital Marketing', '2026-10-13 06:36:39', '2026-10-13 06:36:39', NULL),
(14, 3, 'Email Marketing', '2026-10-13 06:36:39', '2026-10-13 06:36:39', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mobile_number` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `mobile_number`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Sheryl', 'D\'Amore', 'fakedata65296@gmail.com', '272', '2026-10-13 06:08:48', '2026-10-13 06:16:55', NULL),
(2, 'Colt', 'Ziemann', 'fakedata45767@gmail.com', '62', '2026-10-13 06:17:15', '2026-10-13 06:17:15', '2026-10-13 06:17:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
