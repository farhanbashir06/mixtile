-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2021 at 07:54 AM
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
-- Database: `mixtile`
--

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
-- Table structure for table `homepages`
--

CREATE TABLE `homepages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `section1` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section2` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section3` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section4` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section5` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section6` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `homepages`
--

INSERT INTO `homepages` (`id`, `section1`, `section2`, `section3`, `section4`, `section5`, `section6`, `created_at`, `updated_at`) VALUES
(1, '{\"h\":\"Convert your picture<br> into wall art\",\"d\":\"Fill Your walls with<br>\\r\\nyou memoriable pictures\",\"img1\":\"storage\\/homepage\\/AXWkRR1CImlnYob20wW5EGtL2JkPPntJhHl3aXmt.jpg\",\"img2\":\"storage\\/homepage\\/K1HwSLlyedBSyFcKEevnsA26GX1tiFniLC1A498Q.jpg\",\"img3\":\"storage\\/homepage\\/65JAV69eXMIL9SSsIdjfOG3uc4M6ZunBpS0jxjth.jpg\"}', '{\"h1\":\"No need of nails\",\"d1\":\"Sticky frames on any kind of wall\",\"img1\":\"storage\\/homepage\\/PqLzdVU2VICmlGSP5Gy77dH71GdF33D3TM5BwM2Y.svg\",\"h2\":\"Free shipping worldwide !\",\"d2\":\"We deliver on your doorstep within a week\",\"img2\":\"storage\\/homepage\\/OQwItMJBe84BEEaOwBS5IvZLXhrm9iAy4a5nbncE.svg\",\"h3\":\"Your Satisfaction will be 100%\",\"d3\":\"You will get full Refund if not satified\",\"img3\":\"storage\\/homepage\\/1z9u3FnlrcGWBx5bGF0jNN5AHkKxtdq0lLrDad1E.svg\"}', '{\"h1\":\"Our magical frames can sticks \\r\\n<br> \\r\\nto any kind of wall\",\"d1\":\"Get your pictures in stylish frames that stick directly to  your \\r\\n<br>\\r\\n wall and leave no damage behind!\",\"img1\":\"storage\\/homepage\\/a1N4ybdRApJqtcaIiYgO2onewhXNE1li83snl8U1.mp4\"}', NULL, NULL, NULL, NULL, NULL);

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
(4, '2021_05_15_201639_create_homepages_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(100) NOT NULL,
  `title` varchar(250) NOT NULL,
  `descr` longtext NOT NULL,
  `img` varchar(250) NOT NULL,
  `year` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `title`, `descr`, `img`, `year`, `created_at`, `updated_at`) VALUES
(8, 'Jhon', 'Happy with works', 'storage/review/Kgffb2HDu30R5tuiMO7FCBsm0QWL5sMIPvI5DMZ2.jpg', '2020', '2021-05-17 20:52:20', '2021-05-17 20:52:20'),
(9, 'Michal', 'We love seeing beautiful Mixtiles walls!', 'storage/review/kdLhug4QfVcUaGbZCxyr8RmFcnpG9UOBPQtoM7og.jpg', '2020', '2021-05-17 20:52:20', '2021-05-17 20:52:20'),
(10, 'Doe', 'Happy with works', 'storage/review/IPoqCrOyGKtekWJ2b3Frt313sescb0llYzTZ9yOm.jpg', '2019', '2021-05-17 20:52:20', '2021-05-17 20:52:20'),
(11, 'Alisa', 'We love seeing beautiful Mixtiles walls!', 'storage/review/lK47o5kKdNae7RpO4JmASHKBfIHgZRjg4aLTSIFy.jpg', '2020', '2021-05-17 20:52:20', '2021-05-17 20:52:20');

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
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'farhan bashir', 'farhanbashir06@gmail.com', NULL, '$2y$10$.zUvpPRk0mGumkQxqLNeS.X1b9qya1HsN1cXLUgH/wBzVd2USvjWO', NULL, '2021-05-15 13:16:48', '2021-05-15 13:16:48');

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
-- Indexes for table `homepages`
--
ALTER TABLE `homepages`
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
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
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
-- AUTO_INCREMENT for table `homepages`
--
ALTER TABLE `homepages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
