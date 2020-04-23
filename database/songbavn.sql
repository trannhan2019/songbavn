-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 23, 2020 at 10:14 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `songbavn`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `content_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `sendername` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `senderemail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contents`
--

CREATE TABLE `contents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `menu_id` int(10) UNSIGNED DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci,
  `slug` text COLLATE utf8mb4_unicode_ci,
  `abstract` text COLLATE utf8mb4_unicode_ci,
  `imageorfile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `highlights` tinyint(4) NOT NULL DEFAULT '0',
  `notification` tinyint(4) NOT NULL DEFAULT '0',
  `views` int(10) UNSIGNED DEFAULT '0',
  `status` tinyint(4) NOT NULL,
  `author` mediumtext COLLATE utf8mb4_unicode_ci,
  `source` mediumtext COLLATE utf8mb4_unicode_ci,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `danhmucykiens`
--

CREATE TABLE `danhmucykiens` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `factorys`
--

CREATE TABLE `factorys` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `position` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `parent` int(10) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `slug`, `status`, `position`, `parent`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Giới thiệu', 'gioi-thieu', 1, 1, NULL, NULL, '2020-04-23 08:34:26', '2020-04-23 08:34:26'),
(2, 'Tin tức', 'tin-tuc', 1, 2, NULL, NULL, '2020-04-23 08:34:36', '2020-04-23 08:34:36'),
(3, 'Quan hệ cổ đông', 'quan-he-co-dong', 1, 3, NULL, NULL, '2020-04-23 08:49:39', '2020-04-23 08:49:39'),
(4, 'Tuyển dụng', 'tuyen-dung', 1, 4, NULL, NULL, '2020-04-23 08:49:53', '2020-04-23 08:49:53'),
(5, 'Liên hệ', 'lien-he', 1, 5, NULL, NULL, '2020-04-23 08:50:01', '2020-04-23 08:50:01'),
(6, 'Giới thiệu chung', 'gioi-thieu-chung', 1, 1, 1, NULL, '2020-04-23 09:08:14', '2020-04-23 09:08:14'),
(7, 'Sơ đồ tổ chức', 'so-do-to-chuc', 1, 2, 1, NULL, '2020-04-23 09:08:27', '2020-04-23 09:08:27'),
(8, 'Cơ cấu tổ chức', 'co-cau-to-chuc', 1, 3, 1, NULL, '2020-04-23 09:08:37', '2020-04-23 09:08:37'),
(9, 'Các nhà máy', 'cac-nha-may', 1, 4, 1, NULL, '2020-04-23 09:09:17', '2020-04-23 09:09:17'),
(10, 'Các dự án', 'cac-du-an', 1, 5, 1, NULL, '2020-04-23 09:09:27', '2020-04-23 09:09:27'),
(11, 'Thông tin hoạt động', 'thong-tin-hoat-dong', 1, 1, 2, NULL, '2020-04-23 09:09:41', '2020-04-23 09:09:41'),
(12, 'Đảng - Đoàn thể', 'dang-doan-the', 1, 2, 2, NULL, '2020-04-23 09:09:51', '2020-04-23 09:09:51'),
(13, 'Bài viết SBA', 'bai-viet-sba', 1, 3, 2, NULL, '2020-04-23 09:10:41', '2020-04-23 09:10:41'),
(14, 'Đại hội đồng cổ đông', 'dai-hoi-dong-co-dong', 1, 1, 3, NULL, '2020-04-23 09:11:11', '2020-04-23 09:11:11'),
(15, 'Công bố thông tin', 'cong-bo-thong-tin', 1, 2, 3, NULL, '2020-04-23 09:11:20', '2020-04-23 09:11:20'),
(16, 'Báo cáo tài chính', 'bao-cao-tai-chinh', 1, 3, 3, NULL, '2020-04-23 09:11:39', '2020-04-23 09:11:39'),
(17, 'Báo cáo thường niên', 'bao-cao-thuong-nien', 1, 4, 3, NULL, '2020-04-23 09:11:56', '2020-04-23 09:11:56'),
(18, 'Tình hình quản trị', 'tinh-hinh-quan-tri', 1, 5, 3, NULL, '2020-04-23 09:12:33', '2020-04-23 09:12:33'),
(19, 'Điều lệ, quy chế', 'dieu-le-quy-che', 1, 6, 3, NULL, '2020-04-23 09:12:50', '2020-04-23 09:12:50'),
(20, 'Ý kiến nhà đầu tư', 'y-kien-nha-dau-tu', 1, 7, 3, NULL, '2020-04-23 09:13:03', '2020-04-23 09:13:03'),
(21, 'Tin tuyển dụng', 'tin-tuyen-dung', 1, 1, 4, NULL, '2020-04-23 09:13:20', '2020-04-23 09:13:20'),
(22, 'Chính sách tuyển dụng', 'chinh-sach-tuyen-dung', 1, 2, 4, NULL, '2020-04-23 09:13:30', '2020-04-23 09:13:30');

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
(27, '2014_10_12_000000_create_users_table', 1),
(28, '2014_10_12_100000_create_password_resets_table', 1),
(29, '2019_08_19_000000_create_failed_jobs_table', 1),
(30, '2020_03_02_091936_create_menu_table', 1),
(31, '2020_03_02_102917_create_content_table', 1),
(32, '2020_03_02_104244_create_comment_table', 1),
(33, '2020_03_02_104736_create_slide_table', 1),
(34, '2020_03_02_104737_create_danhmucykien_table', 1),
(35, '2020_03_02_105353_create_ykiencodong_table', 1),
(36, '2020_03_02_105354_create_traloicodong_table', 1),
(37, '2020_03_02_112635_create_factory_table', 1),
(38, '2020_03_02_112636_create_muctieunam_table', 1),
(39, '2020_03_02_173835_create_thsx_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `muctieunams`
--

CREATE TABLE `muctieunams` (
  `id` int(10) UNSIGNED NOT NULL,
  `factory_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` int(10) UNSIGNED NOT NULL,
  `ratedpower` double(8,2) UNSIGNED NOT NULL,
  `MNHlowest` double(8,2) UNSIGNED NOT NULL,
  `MNHnormal` double(8,2) UNSIGNED NOT NULL,
  `quantity` double(8,3) UNSIGNED NOT NULL,
  `status` tinyint(4) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `slides`
--

CREATE TABLE `slides` (
  `id` int(10) UNSIGNED NOT NULL,
  `content_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` int(10) UNSIGNED NOT NULL,
  `Active` tinyint(4) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `thsxs`
--

CREATE TABLE `thsxs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `muctieunam_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `power` double(8,2) NOT NULL DEFAULT '0.00',
  `quantity` double(8,3) NOT NULL DEFAULT '0.000',
  `MNH` double(8,2) UNSIGNED NOT NULL,
  `rain` double(8,1) NOT NULL DEFAULT '0.0',
  `device` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `traloicodongs`
--

CREATE TABLE `traloicodongs` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `ykiencodong_id` int(10) UNSIGNED DEFAULT NULL,
  `reply_content` mediumtext COLLATE utf8mb4_unicode_ci,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` tinyint(4) NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` mediumtext COLLATE utf8mb4_unicode_ci,
  `active` tinyint(4) NOT NULL,
  `info` mediumtext COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `username`, `email`, `role`, `password`, `image`, `phone`, `address`, `active`, `info`, `remember_token`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Công ty Cổ phần Sông Ba', 'admin', 'sba2007@songba.vn', 1, '$2y$10$e1Rp5PkkAXIb814GtoF49OvmrkZmZG1ZwXSj1V8A9lyz4T/8PujF.', NULL, '02363653592', NULL, 1, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ykiencodongs`
--

CREATE TABLE `ykiencodongs` (
  `id` int(10) UNSIGNED NOT NULL,
  `menu_id` int(10) UNSIGNED DEFAULT NULL,
  `danhmucykien_id` int(10) UNSIGNED DEFAULT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` mediumtext COLLATE utf8mb4_unicode_ci,
  `ask_content` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `views` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_content_id_foreign` (`content_id`),
  ADD KEY `comments_user_id_foreign` (`user_id`);

--
-- Indexes for table `contents`
--
ALTER TABLE `contents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contents_menu_id_foreign` (`menu_id`),
  ADD KEY `contents_user_id_foreign` (`user_id`);

--
-- Indexes for table `danhmucykiens`
--
ALTER TABLE `danhmucykiens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `factorys`
--
ALTER TABLE `factorys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menus_parent_foreign` (`parent`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `muctieunams`
--
ALTER TABLE `muctieunams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `muctieunams_factory_id_foreign` (`factory_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`id`),
  ADD KEY `slides_content_id_foreign` (`content_id`);

--
-- Indexes for table `thsxs`
--
ALTER TABLE `thsxs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `thsxs_muctieunam_id_foreign` (`muctieunam_id`),
  ADD KEY `thsxs_user_id_foreign` (`user_id`);

--
-- Indexes for table `traloicodongs`
--
ALTER TABLE `traloicodongs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `traloicodongs_user_id_foreign` (`user_id`),
  ADD KEY `traloicodongs_ykiencodong_id_foreign` (`ykiencodong_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- Indexes for table `ykiencodongs`
--
ALTER TABLE `ykiencodongs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ykiencodongs_menu_id_foreign` (`menu_id`),
  ADD KEY `ykiencodongs_danhmucykien_id_foreign` (`danhmucykien_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contents`
--
ALTER TABLE `contents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `danhmucykiens`
--
ALTER TABLE `danhmucykiens`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `factorys`
--
ALTER TABLE `factorys`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `muctieunams`
--
ALTER TABLE `muctieunams`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `slides`
--
ALTER TABLE `slides`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `thsxs`
--
ALTER TABLE `thsxs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `traloicodongs`
--
ALTER TABLE `traloicodongs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ykiencodongs`
--
ALTER TABLE `ykiencodongs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_content_id_foreign` FOREIGN KEY (`content_id`) REFERENCES `contents` (`id`),
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `contents`
--
ALTER TABLE `contents`
  ADD CONSTRAINT `contents_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`),
  ADD CONSTRAINT `contents_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `menus`
--
ALTER TABLE `menus`
  ADD CONSTRAINT `menus_parent_foreign` FOREIGN KEY (`parent`) REFERENCES `menus` (`id`);

--
-- Constraints for table `muctieunams`
--
ALTER TABLE `muctieunams`
  ADD CONSTRAINT `muctieunams_factory_id_foreign` FOREIGN KEY (`factory_id`) REFERENCES `factorys` (`id`);

--
-- Constraints for table `slides`
--
ALTER TABLE `slides`
  ADD CONSTRAINT `slides_content_id_foreign` FOREIGN KEY (`content_id`) REFERENCES `contents` (`id`);

--
-- Constraints for table `thsxs`
--
ALTER TABLE `thsxs`
  ADD CONSTRAINT `thsxs_muctieunam_id_foreign` FOREIGN KEY (`muctieunam_id`) REFERENCES `muctieunams` (`id`),
  ADD CONSTRAINT `thsxs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `traloicodongs`
--
ALTER TABLE `traloicodongs`
  ADD CONSTRAINT `traloicodongs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `traloicodongs_ykiencodong_id_foreign` FOREIGN KEY (`ykiencodong_id`) REFERENCES `ykiencodongs` (`id`);

--
-- Constraints for table `ykiencodongs`
--
ALTER TABLE `ykiencodongs`
  ADD CONSTRAINT `ykiencodongs_danhmucykien_id_foreign` FOREIGN KEY (`danhmucykien_id`) REFERENCES `danhmucykiens` (`id`),
  ADD CONSTRAINT `ykiencodongs_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
