-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2024 at 10:51 AM
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
-- Database: `laravelpbw`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `event_name` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `location` varchar(255) NOT NULL,
  `location_link` varchar(255) DEFAULT NULL,
  `capacity` int(11) NOT NULL,
  `dresscode` varchar(255) NOT NULL,
  `contact_person` varchar(255) NOT NULL,
  `cp_name` varchar(255) NOT NULL,
  `socmed_name` varchar(255) NOT NULL,
  `social_media_link` varchar(255) DEFAULT NULL,
  `event_hashtag` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `attendance` tinyint(1) NOT NULL DEFAULT 0,
  `polling` tinyint(1) NOT NULL DEFAULT 0,
  `event_code` varchar(6) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `event_name`, `date`, `time`, `location`, `location_link`, `capacity`, `dresscode`, `contact_person`, `cp_name`, `socmed_name`, `social_media_link`, `event_hashtag`, `description`, `attendance`, `polling`, `event_code`, `user_id`, `created_at`, `updated_at`) VALUES
(2, 'Kunjungan kerja', '2024-06-15', '10:20:00', 'Gedung AAC Dayan Dawood', 'https://maps.app.goo.gl/yqwxYynGkctp4Mui9', 1222, 'DPH HMIF', '08765432345', 'Firjatullah', 'hmiffmipausk', 'https://www.instagram.com/hmif.fmipausk?igsh=czNhcHFjdm1zcXJo', '#kunkerhmif', '[ 𝐊𝐔𝐍𝐉𝐔𝐍𝐆𝐀𝐍 𝐊𝐄𝐑𝐉𝐀 ]\r\n\r\nHaloo sobat informatika!! 👋🏻\r\n\r\nHimpunan Mahasiswa Informatika (HMIF) akan melaksanakan kegiatan kunjungan kerja nih ke Himpunan Mahasiswa Ilmu Komunikasi (HIMAKASI). \r\n\r\nKunjungan kerja ini bertujuan untuk sharing dan diskusi mengenai program kerja dari masing-masing himpunan. Harapannya, dari kegiatan ini hubungan kerjasama yang baik dapat terjalin antara kedua belah pihak.\r\n\r\nYuk, ikuti keseruannya besok hari, info detailnya sebagai berikut👇🏻\r\n\r\n🗓 : Selasa, 28 Mei 2024\r\n⏰ : 08:00 - selesai\r\n📍 : Aula multipurpose Fakultas MIPA USK\r\n\r\nNote : don\'t forget to bring ur own tumbler🤩\r\n\r\n________________________________  \r\n𝐃𝐄𝐏𝐀𝐑𝐓𝐄𝐌𝐄𝐍 𝐇𝐔𝐀𝐋  \r\n𝐇𝐌𝐈𝐅 𝐔𝐒𝐊 𝟐𝟎𝟐𝟒  \r\n𝐊𝐀𝐁𝐈𝐍𝐄𝐓 𝐀𝐃𝐀𝐏𝐓𝐈𝐕𝐄', 0, 0, 'DUVfYP', 2, '2024-06-06 00:49:02', '2024-06-06 00:49:02');

-- --------------------------------------------------------

--
-- Table structure for table `event_participants`
--

CREATE TABLE `event_participants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `event_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `attendance` tinyint(1) NOT NULL DEFAULT 0,
  `feedback` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `event_participants`
--

INSERT INTO `event_participants` (`id`, `event_id`, `user_id`, `name`, `email`, `phone`, `attendance`, `feedback`, `created_at`, `updated_at`) VALUES
(3, 2, 3, 'Abdullah Azam', 'azam@gmail.com', '082235857621', 0, NULL, '2024-06-06 00:51:23', '2024-06-06 00:51:23');

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
(5, '2024_06_03_153623_create_events_table', 1),
(6, '2024_06_03_153715_create_event_participants_table', 1);

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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Azimah Al-Huda', 'azimahhuda@gmail.com', NULL, '$2y$10$0rLqx87x0zjQwriZWvomkuo/S976LFWts0X/XZxuyQSUG1Mldf7LO', NULL, '2024-06-06 00:38:50', '2024-06-06 00:38:50'),
(2, 'Firjatullah Afny Abus', 'firja@gmail.com', NULL, '$2y$10$ix/UJCPwroUqv6p3jPcC8OEtuqXW2lIzxJ7TArkSDN0NvuYXlu9cy', NULL, '2024-06-06 00:39:11', '2024-06-06 00:39:11'),
(3, 'Abdullah Azam', 'azam@gmail.com', NULL, '$2y$10$3n7WoOdXbge4Puvhkf2L.OhcIZJj8OtPCNDqHDQ/Qp5Ulnct5pcvi', NULL, '2024-06-06 00:39:30', '2024-06-06 00:39:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `events_event_code_unique` (`event_code`),
  ADD KEY `events_user_id_foreign` (`user_id`);

--
-- Indexes for table `event_participants`
--
ALTER TABLE `event_participants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_participants_event_id_foreign` (`event_id`),
  ADD KEY `event_participants_user_id_foreign` (`user_id`);

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
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

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
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `event_participants`
--
ALTER TABLE `event_participants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `event_participants`
--
ALTER TABLE `event_participants`
  ADD CONSTRAINT `event_participants_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `event_participants_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
