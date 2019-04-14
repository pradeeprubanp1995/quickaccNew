-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2019 at 05:53 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `set`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(10) UNSIGNED NOT NULL,
  `service_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `acc_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `service_id`, `acc_name`, `created_at`, `updated_at`) VALUES
(1, '1', '1st acc', '2019-02-28 16:52:35', '2019-03-01 03:46:06'),
(2, '4', 'Myaccount', '2019-03-01 03:15:43', '2019-03-01 03:15:43'),
(3, '4', 'account', '2019-03-01 03:46:51', '2019-03-01 03:46:51');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `primeum` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amt` int(200) DEFAULT NULL,
  `count` int(100) NOT NULL,
  `days` int(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `primeum`, `amt`, `count`, `days`, `created_at`, `updated_at`) VALUES
(3, 'High', 2, 30, 70, '2019-02-28 01:59:00', '2019-03-08 10:47:07'),
(4, 'normal', 1, 20, 50, '2019-03-01 01:38:58', '2019-03-02 21:54:25'),
(5, 'Medium', 3, 10, 30, '2019-03-02 21:52:08', '2019-03-02 21:52:08');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(10) UNSIGNED NOT NULL,
  `pre_id` int(100) NOT NULL,
  `service_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `pre_id`, `service_name`, `image`, `created_at`, `updated_at`) VALUES
(5, 3, 'netflix', 'f8effa0a39deb5207e19e96af46d471c.png', '2019-03-02 21:56:31', '2019-03-03 16:22:32'),
(6, 4, 'Spotify', '5e780eea920964471e98238c0f5303d7.png', '2019-03-02 22:02:16', '2019-03-03 16:21:59'),
(7, 3, 'Origin', '5140c0d6118f7325892935bfbc6d917a.png', '2019-03-02 22:02:31', '2019-03-03 16:22:17'),
(8, 5, 'ccccc', '90fd875a098957d0b4b9a5f0cf70d50a.jpg', '2019-03-02 22:03:31', '2019-03-03 16:21:10'),
(9, 3, 'NardVPN', '11f536dd181438deedf3d6f01c2bcc53.png', '2019-03-02 21:56:31', '2019-03-03 16:21:36'),
(10, 4, 'Uplay', 'cf27b0e5227f69aebd4ea0605d1d536b.png', '2019-03-02 22:02:16', '2019-03-03 16:22:53'),
(11, 3, 'Minecraft', 'ddfcf380dce030fa7828407f11342217.jpg', '2019-03-02 22:02:31', '2019-03-03 16:23:07'),
(12, 4, 'Fortnite', 'e509f35e87a002eee7d564419ff38ee5.jpg', '2019-03-02 22:02:16', '2019-03-03 16:23:29'),
(13, 3, 'Hide My Ass', '6bfb2078584dcfa5a60fdb6f1c2589aa.jpg', '2019-03-02 22:02:31', '2019-03-03 23:46:33'),
(18, 3, 'demo1', '20bf05d8bd3b9cf042f360d0f2e564f2.png', '2019-03-03 13:54:21', '2019-03-03 13:54:21'),
(19, 3, 'demo two', 'dd2ba4decdff0a4641e0b655c630fa2a.jpg', '2019-03-04 02:58:16', '2019-03-04 02:58:16');

-- --------------------------------------------------------

--
-- Table structure for table `generates`
--

CREATE TABLE `generates` (
  `id` int(11) NOT NULL,
  `service_id` int(100) NOT NULL,
  `gname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `generates`
--

INSERT INTO `generates` (`id`, `service_id`, `gname`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, 6, 'ruba', 'ruba@gmail.com', '1234567', '2019-03-02 15:15:15', '2019-03-02 15:15:15'),
(2, 7, 'pradeep', 'pradeep@gmail.com', '1234567', '2019-03-02 23:15:24', '2019-03-02 23:15:24'),
(3, 8, 'siva', 'siva@gmail.com', '7654321', '2019-03-02 23:17:51', '2019-03-02 23:17:51'),
(4, 7, 'arvi', 'arvi@gmail.com', '1234567', '2019-03-02 23:15:24', '2019-03-02 23:15:24'),
(5, 8, 'karthi', 'karthi@gmail.com', '7654321', '2019-03-02 23:17:51', '2019-03-02 23:17:51'),
(6, 9, 'demo', 'demo@gmail.com', '123456789', '2019-03-03 01:54:29', '2019-03-03 01:54:29'),
(7, 16, 'friend', 'friend@gmail.com', '123456789', '2019-03-03 02:22:39', '2019-03-03 02:22:39'),
(8, 6, 'test', 'test@gmail.com', '1234567', '2019-03-03 12:54:10', '2019-03-03 12:54:10');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_01_07_062157_create_departments_table', 1),
(4, '2019_01_07_062233_create_titles_table', 1),
(5, '2019_01_07_062313_create_categories_table', 1),
(6, '2019_01_08_142750_create_results_table', 1),
(7, '2019_01_09_090723_create_questions_table', 1),
(8, '2019_01_09_102436_create_upcoming_titles_table', 1),
(9, '2019_01_11_125237_create_weekpoints_table', 1),
(10, '2019_01_21_061906_add_upcoming_id_to_results', 1);

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
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `premium_id` int(10) NOT NULL,
  `amount` int(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `username`, `premium_id`, `amount`, `created_at`, `updated_at`) VALUES
(1, 'pradeepruban.p1995@gmail.com', 3, 10, '2019-03-03 14:55:19', '2019-03-03 14:55:19'),
(2, 'hello@gmail.com', 5, 30, '2019-03-03 14:56:19', '2019-03-03 14:56:19');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(10) UNSIGNED NOT NULL,
  `upcomingtitle_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `question` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `upcoming_id` int(11) NOT NULL,
  `today_date` date NOT NULL,
  `user_answer` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `points` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `upcoming_titles`
--

CREATE TABLE `upcoming_titles` (
  `id` int(10) UNSIGNED NOT NULL,
  `title_id` int(11) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `date_of_quiz` date NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `images` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type` int(11) NOT NULL DEFAULT '0',
  `premium_id` int(11) NOT NULL DEFAULT '0',
  `count` int(100) DEFAULT NULL,
  `expiredate` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_cnt` int(100) NOT NULL DEFAULT '0',
  `phone` bigint(200) DEFAULT NULL,
  `status` int(10) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `images`, `email`, `email_verified_at`, `password`, `user_type`, `premium_id`, `count`, `expiredate`, `current_cnt`, `phone`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'ruba', '', 'praban1015@gmail.com', NULL, '$2y$10$RBDxKrqw8W0rq5BcuDmPzO1Ym6PRMYEHh9oHjosuusmFtZK4seaP6', 1, 0, NULL, NULL, 0, NULL, 2, 'qHrTasVbGBWInC7HvK2RpckihO8TIihgt5bf2Y3TnSeE2S5CrYxqwWjpIIsO', NULL, '2019-03-15 08:22:09'),
(2, 'pradeep ruba', '68dd7d40b84e7a97d8883aa844dbe092.jpg', 'pradeepruban.p1995@gmail.com', NULL, '$2y$10$RBDxKrqw8W0rq5BcuDmPzO1Ym6PRMYEHh9oHjosuusmFtZK4seaP6', 0, 0, 0, '', -1, 9876543210, 0, 'rbPWHEqglmP1iGEfqnA2ok1m0NLEbm4cF5jkPZDyHwqrb5S03ioTuysFtKq2', NULL, '2019-03-15 16:51:32'),
(3, 'arvi', NULL, 'arvi@gmail.com', NULL, '$2y$10$2hFEQN.mY64L3uLFoRZ/J.ePICq4lOpLOTOvgb1s4gErUvCbx84yi', 0, 0, NULL, NULL, 0, 9994372703, 0, NULL, '2019-03-09 21:21:14', '2019-03-14 16:30:58');

-- --------------------------------------------------------

--
-- Table structure for table `weekpoints`
--

CREATE TABLE `weekpoints` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `total_points` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `generates`
--
ALTER TABLE `generates`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `upcoming_titles`
--
ALTER TABLE `upcoming_titles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `weekpoints`
--
ALTER TABLE `weekpoints`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `generates`
--
ALTER TABLE `generates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `upcoming_titles`
--
ALTER TABLE `upcoming_titles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `weekpoints`
--
ALTER TABLE `weekpoints`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
