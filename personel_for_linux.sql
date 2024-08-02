-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 02, 2024 at 09:32 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `personel`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_08_11_193931_create_tasks_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `cycles` int(11) NOT NULL DEFAULT 0,
  `description` longtext DEFAULT NULL,
  `days` int(11) NOT NULL DEFAULT 0,
  `end_date` date DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `user_id`, `name`, `cycles`, `description`, `days`, `end_date`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'The Mentor', 5000, NULL, 0, '2024-03-27', 1, '2024-03-13 17:02:14', '2024-07-26 16:57:19'),
(2, 1, 'Second Brain', 2000, NULL, 0, '2024-03-27', 1, '2024-03-13 17:02:29', '2024-07-26 16:57:25'),
(3, 1, 'Personal Growth', 0, NULL, 0, '2024-03-27', 1, '2024-03-13 17:02:29', '2024-07-17 17:18:37'),
(5, 1, 'Pocket Clone', 0, NULL, 0, '2024-04-28', 0, '2024-03-28 11:11:37', '2024-07-26 16:59:56'),
(7, NULL, NULL, 100, NULL, 0, NULL, 0, '2024-07-24 10:55:55', '2024-07-26 16:59:51'),
(8, 1, 'test', 100, NULL, 0, '2024-07-26', 0, '2024-07-24 10:57:19', '2024-07-26 16:59:48'),
(9, 1, 'test', 1400, 'test', 0, '2024-07-18', 0, '2024-07-24 10:59:19', '2024-07-26 16:59:46');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `duration` decimal(6,2) NOT NULL,
  `points` int(25) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'not completed',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `name`, `duration`, `points`, `status`, `created_at`, `updated_at`) VALUES
(6, 'thid', 70.00, 35, '1', '2023-10-07 09:36:18', '2023-10-07 09:53:38');

-- --------------------------------------------------------

--
-- Table structure for table `tblblog`
--

CREATE TABLE `tblblog` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `topic` varchar(255) DEFAULT NULL,
  `description` text NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblblog`
--

INSERT INTO `tblblog` (`id`, `title`, `topic`, `description`, `img`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'this is test for project', '1', '<p>Learn how to harness the power of Laravel CORS in this tutorial. Discover what it is and unlock its potential for seamless cross-origin resource sharing.\n\nLaravel has supported CORS for quite a while; however, until more recent versions, it has been from third-party packages only. Let\'s dive into CORS in Laravel, what it is, and why it is important.\n\nCORS stands for Cross-Origin Resource Sharing. It is a mechanism that allows you to make requests to a different domain than your own securely. It defines a set of headers the server can use to control which origins can access its resources. But what does this mean to you?\n\nAs someone who builds a lot of APIs, I am very used to CORS. It has become second nature at this point. Laravel, by default, has CORS support built in, where it will read from config/cors.php to programmatically build up the protection rules based on the values configured. Let\'s walk through the options in this file to see what they mean to us.</p>', 'http://127.0.0.1/the_mentor/storage/app/uploads/Laravel From Scratch 2022 _ 4+ Hour Course.mp4_snapshot_03.24.18.433.jpg', 1, '2023-12-17 12:12:27', '2024-04-23 16:22:48'),
(12, 'learnig to think in programming', '1', '<p>test</p>', 'http://127.0.0.1/the_mentor/storage/app/uploads/earth343434.jpg', 1, '2023-12-19 11:11:43', '2023-12-19 11:11:43'),
(13, 'this is another test', '1', '<p>hello this test is for tst</p>', NULL, 1, '2023-12-22 10:44:14', '2023-12-22 10:44:14'),
(14, 'how to use import in node module', '3', '<p>so in this example you can see the &nbsp;<span style=\"color: rgb(156, 220, 254);\">\"type\"</span>: <span style=\"color: rgb(206, 145, 120);\">\"module\"</span>, which will enable the import functionality in you app by the way if you dont want touse that you can always use \"const express = require(\"express\")\"</p>', 'http://127.0.0.1/the_mentor/storage/app/uploads/blog1.jpg', 1, '2024-01-02 11:31:07', '2024-01-02 11:31:07');

-- --------------------------------------------------------

--
-- Table structure for table `tblfinance`
--

CREATE TABLE `tblfinance` (
  `id` int(25) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `payment_type` int(25) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblfinance`
--

INSERT INTO `tblfinance` (`id`, `user_id`, `payment_type`, `amount`, `date`, `description`) VALUES
(1, NULL, NULL, 60, '2023-10-12', 'nasto as breakfast'),
(2, NULL, NULL, 60, '2023-10-12', 'nasto as breakfast');

-- --------------------------------------------------------

--
-- Table structure for table `tblgoals`
--

CREATE TABLE `tblgoals` (
  `id` int(11) NOT NULL,
  `name` varchar(25) DEFAULT NULL,
  `project_id` int(11) NOT NULL DEFAULT 1,
  `total_points` int(11) DEFAULT NULL,
  `total_days` int(11) DEFAULT NULL,
  `points` int(11) DEFAULT NULL,
  `days` int(11) DEFAULT NULL,
  `trash` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblgoals`
--

INSERT INTO `tblgoals` (`id`, `name`, `project_id`, `total_points`, `total_days`, `points`, `days`, `trash`) VALUES
(1, 'Tea fast for 10 days', 1, 500, 10, 0, 0, 1),
(3, 'work on second brain for ', 1, 500, 20, 300, 8, 0),
(6, 'test', 2, 10, 10, 0, NULL, 0),
(7, 'test1', 2, 10, 10, 4, 6, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblpasswords`
--

CREATE TABLE `tblpasswords` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `string` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblpasswords`
--

INSERT INTO `tblpasswords` (`id`, `name`, `string`) VALUES
(1, 'troikgroup98@gmail.com', '@$k30921'),
(2, 'vibeleo123@outlook.com', 'Mnkch1pckj'),
(3, 'BOB SIGN ON PASSWORD', 'mnkch1pc%'),
(4, 'BOB TRANSACT. PASSWORD', 'mnkch1pc$'),
(5, 'stripe password', 'Mnkch1pc@kunj'),
(6, 'linkedIn', 'mnkch1pc'),
(7, 'github', 'Mnkch1pc'),
(8, 'Postman', 'Mnkch1pc'),
(9, 'Chat Gpt', 'Mnkch1pc'),
(10, 'Cooper Hard Drive', '??');

-- --------------------------------------------------------

--
-- Table structure for table `tblpoints`
--

CREATE TABLE `tblpoints` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `task_id` int(25) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `value` int(25) DEFAULT NULL,
  `cycles` int(11) DEFAULT 0,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblpoints`
--

INSERT INTO `tblpoints` (`id`, `user_id`, `task_id`, `name`, `value`, `cycles`, `date`) VALUES
(1, 1, NULL, NULL, 0, 0, '2023-10-10'),
(2, 1, NULL, NULL, 112, 0, '2023-10-12'),
(3, 1, NULL, NULL, 100, 0, '2023-10-15'),
(4, 1, NULL, NULL, 130, 0, '2023-10-16'),
(5, 1, NULL, NULL, 80, 0, '2023-10-17'),
(6, 1, NULL, NULL, 30, 0, '2023-10-18'),
(7, 1, NULL, NULL, 30, 0, '2023-10-19'),
(8, 1, NULL, NULL, 30, 0, '2023-10-20'),
(9, 1, NULL, NULL, 0, 0, '2023-10-21'),
(10, 1, NULL, NULL, 80, 0, '2023-10-24'),
(11, 1, NULL, NULL, 80, 0, '2023-10-25'),
(12, 1, NULL, NULL, 50, 0, '2023-10-26'),
(13, 1, NULL, NULL, 50, 0, '2023-10-31'),
(14, 1, NULL, NULL, 50, 0, '2023-11-02'),
(15, 1, NULL, NULL, 30, 0, '2023-11-03'),
(16, 1, NULL, NULL, 65, 15, '2023-11-04'),
(17, 1, NULL, NULL, 30, 0, '2023-11-07'),
(18, 1, NULL, NULL, 500, 0, '2023-11-10'),
(20, 2, NULL, NULL, 80, 0, '2023-12-11'),
(21, 2, NULL, NULL, 50, 0, '2023-12-13'),
(22, 2, NULL, NULL, 310, 0, '2023-12-27'),
(23, 2, NULL, NULL, 30, 0, '2023-12-30'),
(24, NULL, NULL, NULL, 10, 3, '2024-03-25'),
(30, NULL, NULL, NULL, 15, 3, '2024-03-26'),
(31, NULL, NULL, NULL, 2, 2, '2024-03-28'),
(32, NULL, NULL, NULL, 3, 3, '2024-04-02'),
(33, NULL, NULL, NULL, 2, 2, '2024-04-03'),
(34, NULL, NULL, NULL, 6, 6, '2024-04-04');

-- --------------------------------------------------------

--
-- Table structure for table `tblprojects`
--

CREATE TABLE `tblprojects` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `cycles` int(11) NOT NULL DEFAULT 0,
  `days` int(11) NOT NULL DEFAULT 0,
  `end_date` date DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblprojects`
--

INSERT INTO `tblprojects` (`id`, `name`, `cycles`, `days`, `end_date`, `status`, `created_at`, `updated_at`) VALUES
(1, 'The Mentor', 0, 0, NULL, 1, '2024-03-13 17:02:14', '2024-03-13 17:02:14'),
(2, 'Second Brain', 0, 0, '2024-03-27', 1, '2024-03-13 17:02:29', '2024-03-14 16:53:46'),
(3, 'Personal Growth', 0, 0, '2024-03-27', 1, '2024-03-13 17:02:29', '2024-03-26 18:15:13'),
(5, 'Pocket Clone', 0, 0, '2024-04-28', 1, '2024-03-28 11:11:37', '2024-03-28 11:11:37');

-- --------------------------------------------------------

--
-- Table structure for table `tblrewards`
--

CREATE TABLE `tblrewards` (
  `id` int(11) NOT NULL,
  `name` int(11) NOT NULL,
  `points` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbltasks`
--

CREATE TABLE `tbltasks` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `project_id` int(11) NOT NULL DEFAULT 1,
  `duration` varchar(25) DEFAULT NULL,
  `points` int(25) DEFAULT NULL,
  `cycles` int(11) NOT NULL DEFAULT 0,
  `type` int(11) DEFAULT 0,
  `description` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbltasks`
--

INSERT INTO `tbltasks` (`id`, `name`, `project_id`, `duration`, `points`, `cycles`, `type`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'read book', 1, '15', 30, 10, 0, 'daily', 1, '2023-10-09 11:47:37', '2024-07-30 16:45:47'),
(2, 'Jumping jags', 1, '1', 20, 12, 0, 'daily', 0, '2023-10-09 11:55:37', '2024-07-30 16:45:51'),
(3, '10 push ups', 1, NULL, 30, 0, 0, 'daily', 0, '2023-10-10 11:26:42', '2024-07-30 16:45:54'),
(4, 'Learning Next js', 1, '45', 100, 0, 0, 'daily', 0, '2023-10-10 12:47:34', '2024-07-30 16:45:56'),
(5, 'waking up at 7', 1, NULL, 0, 0, 0, 'daily', 0, '2023-10-10 18:38:03', '2024-07-30 16:45:59'),
(9, 'Working on mentor UI', 1, '45', 50, 0, 0, 'daily', 0, '2023-10-17 17:51:32', '2024-07-30 16:46:02'),
(10, 'resist the trigger', 3, '-', 0, 0, 0, 'daily', 0, '2023-10-21 00:58:30', '2024-03-26 18:14:17'),
(11, 'test', 3, '10', 10, 19, 0, NULL, NULL, '2024-03-21 11:30:04', '2024-03-26 18:14:20'),
(12, 'Prepare home page', 5, '4', NULL, 13, 0, NULL, NULL, '2024-03-28 11:20:45', '2024-04-04 12:18:36'),
(13, 'home page phase -2', 5, NULL, NULL, 0, 0, NULL, NULL, '2024-04-04 12:19:08', '2024-04-04 12:19:08');

-- --------------------------------------------------------

--
-- Table structure for table `tbltitles`
--

CREATE TABLE `tbltitles` (
  `id` int(11) NOT NULL,
  `title_name` varchar(255) DEFAULT NULL,
  `check_points` int(11) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `id` int(11) NOT NULL,
  `name` varchar(11) DEFAULT NULL,
  `title` varchar(11) DEFAULT NULL,
  `points` varchar(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`id`, `name`, `title`, `points`) VALUES
(1, 'kunj', NULL, '1262'),
(2, 'someone', NULL, '1232');

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `is_active` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id`, `name`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'react', 1, '2023-12-17 17:35:19', '2024-01-02 17:47:04'),
(2, 'react_native', 0, '2023-12-17 17:35:39', '2023-12-17 17:35:39'),
(3, 'node.js', 1, '2023-12-17 17:35:53', '2024-01-02 17:47:16'),
(4, 'next.js', 0, '2023-12-17 17:36:27', '2023-12-17 17:36:27'),
(5, 'python', 0, '2023-12-17 17:38:28', '2023-12-17 17:38:28'),
(6, 'Personel Observations and learnings', 0, '2023-12-17 17:39:03', '2023-12-17 17:39:03');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `balance` double(20,2) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `balance`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'kunj', 'kunj@gmail.com', NULL, 'd220bc729594a8a30b4adc256d3ccf0c1e13005d0a35468cf2fb23e02d6c0f65', 0.00, NULL, NULL, NULL),
(2, 'test', 'test@gmail.com', NULL, '8622f0f69c91819119a8acf60a248d7b36fdb7ccf857ba8f85cf7f2767ff8265', 0.00, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblblog`
--
ALTER TABLE `tblblog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblfinance`
--
ALTER TABLE `tblfinance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblgoals`
--
ALTER TABLE `tblgoals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblpasswords`
--
ALTER TABLE `tblpasswords`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblpoints`
--
ALTER TABLE `tblpoints`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblprojects`
--
ALTER TABLE `tblprojects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbltasks`
--
ALTER TABLE `tbltasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbltitles`
--
ALTER TABLE `tbltitles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tblblog`
--
ALTER TABLE `tblblog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tblfinance`
--
ALTER TABLE `tblfinance`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblgoals`
--
ALTER TABLE `tblgoals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tblpasswords`
--
ALTER TABLE `tblpasswords`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tblpoints`
--
ALTER TABLE `tblpoints`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tblprojects`
--
ALTER TABLE `tblprojects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbltasks`
--
ALTER TABLE `tbltasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbltitles`
--
ALTER TABLE `tbltitles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
