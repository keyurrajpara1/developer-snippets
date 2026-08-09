-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2026 at 03:08 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel-eloquent-relationships`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `user_id`, `country`, `created_at`, `updated_at`) VALUES
(1, 1, 'United States', NULL, NULL),
(2, 2, 'United States', NULL, NULL),
(3, 3, 'United States', NULL, NULL),
(4, 4, 'United States', NULL, NULL),
(5, 5, 'United States', NULL, NULL),
(6, 6, 'United States', NULL, NULL),
(7, 7, 'United States', NULL, NULL),
(8, 8, 'United States', NULL, NULL),
(9, 8, 'India', '2022-06-19 10:49:09', '2022-06-19 10:49:09'),
(10, 8, 'India', '2022-06-19 10:49:27', '2022-06-19 10:49:27'),
(11, 8, 'UK', '2022-06-19 11:15:31', '2022-06-19 11:15:31'),
(12, 8, 'United States', '2022-06-19 11:56:34', '2022-06-19 11:56:34'),
(13, 8, 'India', '2022-09-25 12:46:54', '2022-09-25 12:46:54');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `body` text DEFAULT NULL,
  `commentable_id` bigint(20) DEFAULT NULL,
  `commentable_type` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `body`, `commentable_id`, `commentable_type`, `created_at`, `updated_at`) VALUES
(1, 35, 'Comment for post', 6, 'App\\Models\\Post', '2026-05-20 07:04:47', '2026-05-20 07:04:47'),
(2, 35, '2nd comment for post', 6, 'App\\Models\\Post', '2026-05-20 07:17:39', '2026-05-20 07:17:39'),
(3, 35, 'Comment for video', 1, 'App\\Models\\Video', '2026-05-20 07:18:39', '2026-05-20 07:18:39');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `title`, `created_at`, `updated_at`) VALUES
(1, 1, 'Post title 1', '2022-09-25 12:57:48', '2022-09-25 12:57:48'),
(2, 2, 'Post title 2', '2022-09-25 12:57:48', '2022-09-25 12:57:48'),
(3, NULL, 'Post title 3', '2022-09-25 13:02:39', '2022-09-25 13:02:39'),
(4, 1, 'Post 4', '2022-09-25 13:16:48', '2022-09-25 13:16:48'),
(5, 3, 'Post 5', '2022-09-25 13:16:48', '2022-09-25 13:16:48'),
(6, 35, 'Example post title', '2026-05-20 12:34:47', '2026-05-20 12:34:47');

-- --------------------------------------------------------

--
-- Table structure for table `post_tags`
--

CREATE TABLE `post_tags` (
  `id` bigint(20) NOT NULL,
  `post_id` bigint(20) DEFAULT NULL,
  `tag_id` bigint(20) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post_tags`
--

INSERT INTO `post_tags` (`id`, `post_id`, `tag_id`, `status`, `created_at`, `updated_at`) VALUES
(3, 2, 3, NULL, NULL, NULL),
(5, 1, 2, NULL, NULL, NULL),
(6, 1, 1, NULL, NULL, NULL),
(7, 1, 1, NULL, NULL, NULL),
(8, 1, 1, NULL, '2022-09-25 15:35:51', '2022-09-25 15:35:51'),
(9, 1, 1, NULL, '2022-09-25 15:37:13', '2022-09-25 15:37:13'),
(10, 1, 1, 'approved', '2022-09-25 15:46:45', '2022-09-25 15:46:45'),
(11, 1, 2, 'approved1', '2022-09-25 15:46:45', '2022-09-25 15:46:45');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'Project A', '2022-09-26 17:19:31', '2022-09-26 17:19:31'),
(4, 'Project A1', '2026-05-15 11:02:07', '2026-05-15 11:02:07'),
(5, 'Project B1', '2026-05-15 11:02:07', '2026-05-15 11:02:07');

-- --------------------------------------------------------

--
-- Table structure for table `project_user`
--

CREATE TABLE `project_user` (
  `id` bigint(20) NOT NULL,
  `project_id` bigint(20) DEFAULT NULL,
  `user_id` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `project_user`
--

INSERT INTO `project_user` (`id`, `project_id`, `user_id`) VALUES
(1, 4, 32),
(2, 4, 33),
(3, 4, 34),
(4, 5, 32),
(5, 5, 34);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Laravel', '2022-09-25 14:24:02', '2022-09-25 14:24:02'),
(2, 'PHP', '2022-09-25 14:24:02', '2022-09-25 14:24:02'),
(3, 'JavaScript', '2022-09-25 14:24:02', '2022-09-25 14:24:02'),
(4, 'ReactJS', '2022-09-25 14:24:02', '2022-09-25 14:24:02');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `user_id`, `title`, `created_at`, `updated_at`) VALUES
(1, 26, 'Task 1 for project 1 by user 1', '2022-09-26 17:19:32', '2022-09-26 17:19:32'),
(2, 26, 'Task 2 for project 1 by user 1', '2022-09-26 17:19:32', '2022-09-26 17:19:32'),
(3, 27, 'Task 3 for project 1 by user 2', '2022-09-26 17:19:32', '2022-09-26 17:19:32'),
(4, 32, 'Task A', '2026-05-15 11:45:20', '2026-05-15 11:45:20'),
(5, 32, 'Task B', '2026-05-15 11:45:20', '2026-05-15 11:45:20'),
(6, 33, 'Task C', '2026-05-15 11:45:20', '2026-05-15 11:45:20'),
(7, 34, 'Task D', '2026-05-15 11:45:20', '2026-05-15 11:45:20');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `project_id` bigint(20) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `project_id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Liam', 'liam@gmail.com', '$2y$10$QxLYPKUmnRlSDrrlUIfDvumz/tc0m2WjX5cf4/JFFTzzmnwXHjYQ.', '2022-04-27 16:31:13', '2022-04-27 16:31:13'),
(2, NULL, 'Noah', 'noah@gmail.com', '$2y$10$Jg9INIRMBpGIW66x5BybKOdBKtwU4/qsc4CUTD/Lt83bKbbmH2YP6', '2022-04-27 16:31:13', '2022-04-27 16:31:13'),
(3, NULL, 'Oliver', 'oliver@gmail.com', '$2y$10$pzzj4BKoSEHZUzn8B.j3leyQZGZcZw1Fi3zGtvHo9Np4FaweXGFGq', '2022-04-27 16:31:13', '2022-04-27 16:31:13'),
(4, NULL, 'Elijah', 'elijah@gmail.com', '$2y$10$So8apha8hWFvAcrSOImDRuwRJO.ySrVA9OYWaCs4R0jOUUx5jQhXS', '2022-04-27 16:31:13', '2022-04-27 16:31:13'),
(5, NULL, 'Olivia', 'olivia@gmail.com', '$2y$10$ZAfpUgu7XsgdPiCwecNXOu6wBpULMLGYTmwPHRHWZJdUlniaH6zAW', '2022-04-27 16:31:13', '2022-04-27 16:31:13'),
(6, NULL, 'Emma', 'emma@gmail.com', '$2y$10$2iAj5P3jp1Jff0t3T7CYiOXrim4qIUmfl.xVprUA9.gJ6VtaN06uy', '2022-04-27 16:31:13', '2022-04-27 16:31:13'),
(7, NULL, 'Ava', 'ava@gmail.com', '$2y$10$57D/WgQNwyt5xXUOQB95BueuiO0J78I/N.WF9s5c07agXcQhu0pbm', '2022-04-27 16:31:13', '2022-04-27 16:31:13'),
(8, NULL, 'Charlotte', 'charlotte@gmail.com', '$2y$10$ko7TMqavsxvojYKCIP68YOrBCoU1N.YU8DJFAxMPn/FhUINuT3MB6', '2022-04-27 16:31:13', '2022-04-27 16:31:13'),
(26, 1, 'User 1', 'user1@example.com', '$2y$10$L4.tJnqfaN3p18PL5siC0uDXKLU93XMGxtvTIkb.wst0ZEkR/2M4K', '2022-09-26 17:19:32', '2022-09-26 17:19:32'),
(27, 1, 'User 2', 'user2@example.com', '$2y$10$4ls08I5V7QQ0cNFpHheAz.MXJfmwfAW2BQ9byE6sae2QCOmtfy4O2', '2022-09-26 17:19:32', '2022-09-26 17:19:32'),
(32, NULL, 'User 11', 'user_11@example.com', '$2y$10$yEAtIc5T6q2xd.VLHcVuZulR3PFUdEghAdTytwwAFJmvgw67iiwdO', '2026-05-15 11:02:07', '2026-05-15 11:02:07'),
(33, NULL, 'User 22', 'user_22@example.com', '$2y$10$xcN4isJ9p4bLOQVROKWwP.uohVnH8CD6wOMQ4D08gQLN13t1mpIuG', '2026-05-15 11:02:07', '2026-05-15 11:02:07'),
(34, NULL, 'User 33', 'user_33@example.com', '$2y$10$IYW6ptIxiFRY6Pot97HPLe27Q51RF73xb1SfNB8Si/56L2mEQIdKe', '2026-05-15 11:02:07', '2026-05-15 11:02:07'),
(35, NULL, 'Felipa Beahan', 'felipa_beahan@yopmail.com', '$2y$10$MAiwRYC0Z6xGO0kbT8s9EuKpe4mthlRs.zcr8nnDpwdEXyhuMvAJa', '2026-05-20 12:34:47', '2026-05-20 12:34:47');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` bigint(20) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'example video title', '2026-05-20 07:17:39', '2026-05-20 07:17:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_tags`
--
ALTER TABLE `post_tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_user`
--
ALTER TABLE `project_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `post_tags`
--
ALTER TABLE `post_tags`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `project_user`
--
ALTER TABLE `project_user`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
