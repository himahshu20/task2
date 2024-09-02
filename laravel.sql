-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 31, 2024 at 08:39 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `doc_no` varchar(255) NOT NULL,
  `doc_date` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `doc_no`, `doc_date`, `name`, `email`, `created_at`, `updated_at`) VALUES
(1, '1', '2024-08-31', 'sdsdf', 'test@gmail.com', '2024-08-31 03:02:05', '2024-08-31 03:02:05'),
(2, '2', '2024-08-31', 'ASDASD', 'test@gmail.com', '2024-08-31 03:07:01', '2024-08-31 03:07:01'),
(3, '2', '2024-08-31', 'Jay', 'sdfsdf@gmail.com', '2024-08-31 03:19:49', '2024-08-31 03:19:49'),
(4, '2', '2024-08-31', 'Jay', 'sdfsdf@gmail.com', '2024-08-31 03:20:06', '2024-08-31 03:20:06'),
(5, '2', '2024-08-31', 'Jay', 'sdfsdf@gmail.com', '2024-08-31 03:20:20', '2024-08-31 03:20:20'),
(6, '2', '2024-08-31', 'Jay', 'sdfsdf@gmail.com', '2024-08-31 03:25:29', '2024-08-31 03:25:29'),
(7, '2', '2024-08-31', 'sdsfsdf', 'biru@gmail.com', '2024-08-31 03:27:02', '2024-08-31 03:27:02'),
(8, '2', '2024-08-31', 'test', 'test@gmail.com', '2024-08-31 03:30:54', '2024-08-31 03:30:54'),
(9, '2', '2024-08-31', 'Arun', 'dsf@fsdc.com', '2024-08-31 03:31:51', '2024-08-31 03:31:51'),
(10, '2', '2024-08-31', 'Jay', 'sdfsdf@gmail.com', '2024-08-31 03:33:24', '2024-08-31 03:33:24'),
(11, '2', '2024-08-31', 'asdads', 'dsf@fsdc.com', '2024-08-31 03:54:15', '2024-08-31 03:54:15'),
(12, '2', '2024-08-31', 'asdads', 'dsf@fsdc.com', '2024-08-31 03:54:43', '2024-08-31 03:54:43'),
(13, '2', '2024-08-31', 'Himanshu', 'himanshu20k@gmail.com', '2024-08-31 04:00:00', '2024-08-31 04:00:00'),
(14, '2', '2024-08-31', 'Himanshu', 'himanshu20k@gmail.com', '2024-08-31 04:00:26', '2024-08-31 04:00:26'),
(15, '2', '2024-08-31', 'Himanshu', 'himanshu20k@gmail.com', '2024-08-31 04:02:01', '2024-08-31 04:02:01'),
(16, '2', '2024-09-03', 'hisfs', 'giman@gmaill.com', '2024-08-31 13:08:23', '2024-08-31 13:08:23'),
(17, '2', '2024-09-03', 'hisfs', 'giman@gmaill.com', '2024-08-31 13:09:05', '2024-08-31 13:09:05');

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
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`) VALUES
(1, 'Item1'),
(2, 'Item1'),
(3, 'Item2'),
(4, 'Item3'),
(5, 'Item4'),
(6, 'Item5'),
(7, 'Item6'),
(8, 'Item7'),
(9, 'Item8'),
(10, 'Item9'),
(11, 'Item10'),
(12, 'Item11');

-- --------------------------------------------------------

--
-- Table structure for table `item_masters`
--

CREATE TABLE `item_masters` (
  `id` int(11) NOT NULL,
  `doc_id` int(11) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `qty` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `item_masters`
--

INSERT INTO `item_masters` (`id`, `doc_id`, `item_name`, `qty`) VALUES
(14, 17, '1', 70);

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
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_08_31_064649_customer', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stores`
--

CREATE TABLE `stores` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stores`
--

INSERT INTO `stores` (`id`, `name`) VALUES
(1, 'store1'),
(2, 'store2'),
(4, 'store3'),
(6, 'store4'),
(8, 'store5'),
(10, 'store6'),
(12, 'store7'),
(14, 'store7'),
(16, 'store8'),
(18, 'store9'),
(20, 'store10'),
(22, 'store11'),
(24, 'store12'),
(26, 'store13'),
(27, 'store1'),
(28, 'store14');

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
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_masters`
--
ALTER TABLE `item_masters`
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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `stores`
--
ALTER TABLE `stores`
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
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `item_masters`
--
ALTER TABLE `item_masters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

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
-- AUTO_INCREMENT for table `stores`
--
ALTER TABLE `stores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
