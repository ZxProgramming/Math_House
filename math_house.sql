-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2024 at 09:04 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `math_house`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `address_line_1` varchar(191) NOT NULL,
  `address_line_2` varchar(191) DEFAULT NULL,
  `city` varchar(191) NOT NULL,
  `postal_code` varchar(191) NOT NULL,
  `state` varchar(191) NOT NULL,
  `country` varchar(191) NOT NULL,
  `type` tinyint(3) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admin_roles`
--

CREATE TABLE `admin_roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `admin_role` enum('Marketing','Questions','Teacher','Student','Lesson') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_roles`
--

INSERT INTO `admin_roles` (`id`, `user_id`, `admin_role`, `created_at`, `updated_at`) VALUES
(22, 57, 'Marketing', '2024-01-01 09:54:47', '2024-01-01 09:54:47'),
(23, 57, 'Questions', '2024-01-01 09:54:47', '2024-01-01 09:54:47'),
(24, 57, 'Teacher', '2024-01-01 09:54:47', '2024-01-01 09:54:47'),
(25, 57, 'Student', '2024-01-01 09:54:47', '2024-01-01 09:54:47'),
(26, 57, 'Lesson', '2024-01-01 09:54:47', '2024-01-01 09:54:47');

-- --------------------------------------------------------

--
-- Table structure for table `affilate`
--

CREATE TABLE `affilate` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `organization` varchar(255) DEFAULT NULL,
  `wallet` varchar(255) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cate_name` varchar(191) NOT NULL,
  `cate_des` varchar(191) NOT NULL,
  `cate_url` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `teacher_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `cate_name`, `cate_des`, `cate_url`, `created_at`, `updated_at`, `teacher_id`) VALUES
(1, 'Category 1', 'Category One', '', NULL, NULL, 1),
(2, 'Category 2', 'Category Two', '', NULL, NULL, 1),
(4, 'category 3', 'sfggd', '4522024X01X02X11X08X4420231001083656153827_2318787155110616_6392255175880343552_n.jpg', '2024-01-02 09:08:44', '2024-01-02 09:08:44', 8);

-- --------------------------------------------------------

--
-- Table structure for table `chapters`
--

CREATE TABLE `chapters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `chapter_name` varchar(191) NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `ch_des` varchar(191) NOT NULL,
  `ch_url` varchar(191) NOT NULL,
  `pre_requisition` text DEFAULT NULL,
  `gain` text DEFAULT NULL,
  `teacher_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chapters`
--

INSERT INTO `chapters` (`id`, `chapter_name`, `course_id`, `ch_des`, `ch_url`, `pre_requisition`, `gain`, `teacher_id`, `created_at`, `updated_at`) VALUES
(4, 'Chapter 1', 1, 'Chapter One', '', NULL, NULL, NULL, NULL, NULL),
(5, 'Chapter 22', 1, 'errw', '20230826085456153827_2318787155110616_6392255175880343552_n.jpg', NULL, NULL, 5, '2024-01-03 00:34:57', '2024-01-03 00:34:57'),
(6, 'Chapter 22', 1, 'errw', '20230826085456153827_2318787155110616_6392255175880343552_n.jpg', NULL, NULL, 5, '2024-01-03 00:35:50', '2024-01-03 00:35:50'),
(7, 'Chapter 22', 1, 'errw', '20230826085456153827_2318787155110616_6392255175880343552_n.jpg', NULL, NULL, 5, '2024-01-03 00:36:16', '2024-01-03 00:36:16');

-- --------------------------------------------------------

--
-- Table structure for table `chapter_prices`
--

CREATE TABLE `chapter_prices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `duration` varchar(20) NOT NULL,
  `price` float NOT NULL,
  `discount` float NOT NULL,
  `chapter_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `commissions`
--

CREATE TABLE `commissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `precentage` float NOT NULL,
  `state` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `commissions`
--

INSERT INTO `commissions` (`id`, `name`, `precentage`, `state`, `created_at`, `updated_at`) VALUES
(1, 'Course', 7, 1, NULL, '2024-01-01'),
(2, 'Chapter', 9, 1, NULL, '2024-01-01'),
(3, 'Exams', 10, 1, NULL, NULL),
(4, 'Questions', 5, 1, NULL, NULL),
(5, 'Live Session', 5, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `confirm_sign`
--

CREATE TABLE `confirm_sign` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `code` varchar(20) NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `confirm_sign`
--

INSERT INTO `confirm_sign` (`id`, `email`, `code`, `created_at`, `updated_at`) VALUES
(1, 'ahmedahmadahmid73@gmail.com', '1873', '2023-12-31', '2023-12-31'),
(2, 'ziadm57@yahoo.com', '1756', '2023-12-31', '2023-12-31'),
(3, 'ziadm0176@gmail.com', '5567', '2023-12-31', '2023-12-31');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_name` varchar(191) NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `course_price` double(8,2) NOT NULL,
  `course_des` varchar(191) NOT NULL,
  `course_url` varchar(191) NOT NULL,
  `pre_requisition` text DEFAULT NULL,
  `gain` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `teacher_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `duration` varchar(255) DEFAULT NULL,
  `discount` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course_name`, `category_id`, `course_price`, `course_des`, `course_url`, `pre_requisition`, `gain`, `created_at`, `updated_at`, `teacher_id`, `user_id`, `duration`, `discount`) VALUES
(1, 'Course 1', 1, 300.00, 'Course One', '', NULL, NULL, NULL, '2024-01-02 09:13:51', 1, 1, '2', NULL),
(2, 'Course 2', 1, 300.00, 'Course Two', '', NULL, NULL, NULL, NULL, 1, 1, NULL, NULL),
(3, 'Course 11', 2, 1100.00, 'ccccccc', '2023X12X19X10X49X393752202304300850download.png', 'cccccccc', 'cccccccc', '2023-12-19 08:49:39', '2023-12-19 08:49:39', 8, NULL, '2', 22),
(4, 'SAT', 1, 1100.00, 'hello', '2024X01X01X12X08X23612220231001083656153827_2318787155110616_6392255175880343552_n.jpg', 'Grid 10', 'hello', '2024-01-01 10:08:23', '2024-01-01 10:08:23', 1, NULL, '2', 22);

-- --------------------------------------------------------

--
-- Table structure for table `exam_codes`
--

CREATE TABLE `exam_codes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `exam_code` varchar(255) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `exam_codes`
--

INSERT INTO `exam_codes` (`id`, `exam_code`, `created_at`, `updated_at`) VALUES
(1, '1234', '2023-12-26', '2023-12-26');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `grid_ans`
--

CREATE TABLE `grid_ans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `grid_ans` text NOT NULL,
  `q_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `grid_ans`
--

INSERT INTO `grid_ans` (`id`, `grid_ans`, `q_id`, `created_at`, `updated_at`) VALUES
(1, '1', 12, '2023-12-25', '2023-12-25'),
(2, '2', 12, '2023-12-25', '2023-12-25');

-- --------------------------------------------------------

--
-- Table structure for table `idea_lessons`
--

CREATE TABLE `idea_lessons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idea` varchar(255) DEFAULT NULL,
  `syllabus` varchar(255) DEFAULT NULL,
  `idea_order` int(11) DEFAULT NULL,
  `pdf` varchar(255) DEFAULT NULL,
  `v_link` varchar(255) DEFAULT NULL,
  `lesson_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `idea_lessons`
--

INSERT INTO `idea_lessons` (`id`, `idea`, `syllabus`, `idea_order`, `pdf`, `v_link`, `lesson_id`, `created_at`, `updated_at`) VALUES
(1, 'nm', 'ljk', 1, '2024V01V02V09V50V20202307190927Capture.PNG', 'h', NULL, '2024-01-02', '2024-01-02'),
(2, 'nm', 'ljk', 1, '2024V01V02V09V50V36202307190927Capture.PNG', 'h', NULL, '2024-01-02', '2024-01-02'),
(3, 'nm', 'ljk', 1, '2024V01V02V09V51V30202307190927Capture.PNG', 'h', NULL, '2024-01-02', '2024-01-02');

-- --------------------------------------------------------

--
-- Table structure for table `lessons`
--

CREATE TABLE `lessons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lesson_name` varchar(191) NOT NULL,
  `chapter_id` bigint(20) UNSIGNED NOT NULL,
  `teacher_id` bigint(20) UNSIGNED DEFAULT NULL,
  `lesson_des` varchar(191) NOT NULL,
  `lesson_url` varchar(191) NOT NULL,
  `pre_requisition` text DEFAULT NULL,
  `gain` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lessons`
--

INSERT INTO `lessons` (`id`, `lesson_name`, `chapter_id`, `teacher_id`, `lesson_des`, `lesson_url`, `pre_requisition`, `gain`, `created_at`, `updated_at`) VALUES
(4, 'Lesson 1', 4, 5, 'fg', 'C:\\xampp\\tmp\\php274.tmp', 'jhf', 'g', '2024-01-02 07:48:20', '2024-01-02 07:48:20'),
(5, 'Lesson 1', 4, 5, 'fg', 'C:\\xampp\\tmp\\php9C07.tmp', 'jhf', 'g', '2024-01-02 07:48:59', '2024-01-02 07:48:59'),
(6, 'Lesson 1', 4, 5, 'fg', 'C:\\xampp\\tmp\\php3126.tmp', 'jhf', 'g', '2024-01-02 07:49:37', '2024-01-02 07:49:37'),
(7, 'Lesson 1', 4, 5, 'fg', 'C:\\xampp\\tmp\\phpD856.tmp', 'jhf', 'g', '2024-01-02 07:50:20', '2024-01-02 07:50:20'),
(8, 'Lesson 1', 4, 5, 'fg', 'C:\\xampp\\tmp\\php163C.tmp', 'jhf', 'g', '2024-01-02 07:50:36', '2024-01-02 07:50:36'),
(9, 'Lesson 1', 4, 5, 'fg', 'C:\\xampp\\tmp\\phpE94D.tmp', 'jhf', 'g', '2024-01-02 07:51:30', '2024-01-02 07:51:30');

-- --------------------------------------------------------

--
-- Table structure for table `marketings`
--

CREATE TABLE `marketings` (
  `id` int(11) NOT NULL,
  `course_id` bigint(20) UNSIGNED DEFAULT NULL,
  `chapter_id` bigint(20) UNSIGNED DEFAULT NULL,
  `affilate_id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mcq_ans`
--

CREATE TABLE `mcq_ans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mcq_ans` varchar(255) DEFAULT NULL,
  `mcq_answers` varchar(255) DEFAULT NULL,
  `q_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `mcq_ans`
--

INSERT INTO `mcq_ans` (`id`, `mcq_ans`, `mcq_answers`, `q_id`, `created_at`, `updated_at`) VALUES
(1, 'answer 1', 'A', 10, '2023-12-25', '2023-12-25'),
(2, 'answer 2', 'A', 10, '2023-12-25', '2023-12-25'),
(3, 'answer 3', 'A', 10, '2023-12-25', '2023-12-25'),
(4, 'answer 4', 'A', 10, '2023-12-25', '2023-12-25'),
(5, NULL, NULL, 11, '2023-12-25', '2023-12-25'),
(6, NULL, NULL, 11, '2023-12-25', '2023-12-25'),
(7, NULL, NULL, 11, '2023-12-25', '2023-12-25'),
(8, '1', 'A', 14, '2023-12-26', '2023-12-26'),
(9, '2', 'A', 14, '2023-12-26', '2023-12-26'),
(10, '3', 'A', 14, '2023-12-26', '2023-12-26'),
(11, '4', 'A', 14, '2023-12-26', '2023-12-26'),
(12, '1', 'A', 16, '2023-12-26', '2023-12-26'),
(13, '2', 'A', 16, '2023-12-26', '2023-12-26'),
(14, '3', 'A', 16, '2023-12-26', '2023-12-26'),
(15, '4', 'A', 16, '2023-12-26', '2023-12-26');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) NOT NULL,
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
(5, '2023_05_28_090500_add_login_fields_to_users_table', 1),
(6, '2023_06_11_075700_create_permission_tables', 1),
(7, '2023_06_12_013333_add_profile_photo_path_column_to_users_table', 1),
(8, '2023_10_09_041104_create_addresses_table', 1),
(9, '2023_12_12_111922_create_admin_roles_table', 1),
(10, '2023_12_12_113333_create_categories_table', 1),
(11, '2023_12_12_113743_create_courses_table', 1),
(12, '2023_12_12_113826_create_chapters_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `guard_name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 3, 'user', 'bbc09c6cd30d9b181974add3cfa31822cb433c24c8ea7a82b7752d867a8272b8', '[\"*\"]', NULL, NULL, '2023-12-26 11:36:12', '2023-12-26 11:36:12'),
(2, 'App\\Models\\User', 3, 'user', '69aea65dde048e556656dae788ffb98455457aa4cd36bda1f32a6acfcd6116d0', '[\"*\"]', NULL, NULL, '2023-12-26 11:38:02', '2023-12-26 11:38:02'),
(3, 'App\\Models\\User', 3, 'user', '228204018da2a9a74f5b9dd7d7ae316fb74f5e1d0b1d09ce4e696e4dedd6ca2c', '[\"*\"]', NULL, NULL, '2023-12-26 11:43:56', '2023-12-26 11:43:56'),
(4, 'App\\Models\\User', 3, 'user', 'd6ce215c2b1c6f5e333a03cce59eeb2a81acf3a1376a6a415976326f54ba45e0', '[\"*\"]', NULL, NULL, '2023-12-26 11:49:12', '2023-12-26 11:49:12'),
(5, 'App\\Models\\User', 3, 'user', 'fbb181f9597e41139789d1d9ca87d57c157ab126a34576e6807eda84abef656c', '[\"*\"]', NULL, NULL, '2023-12-26 11:50:53', '2023-12-26 11:50:53'),
(6, 'App\\Models\\User', 3, 'user', 'bc53e4026a08f1369eca591ff4d8ec20a80c0d1dc9b8130371d1b16ab994d290', '[\"*\"]', NULL, NULL, '2023-12-26 11:59:50', '2023-12-26 11:59:50'),
(7, 'App\\Models\\User', 3, 'user', '6af346ba5cbd724a37c6b8598dd426e2c28497b9c5e6d704efcd7ab3636bcb47', '[\"*\"]', NULL, NULL, '2023-12-26 12:00:14', '2023-12-26 12:00:14'),
(8, 'App\\Models\\User', 3, 'user', '9d5f52e338ec3bb7b1db634da7b8dcc476c8c82cf0aa6577c8896d8ce269fde0', '[\"*\"]', NULL, NULL, '2023-12-26 12:02:00', '2023-12-26 12:02:00'),
(9, 'App\\Models\\User', 3, 'user', '9b7d7ff71c6bfcc838bc999ae5c7a240d4bfbf37dc49d3c779457a53107f519f', '[\"*\"]', NULL, NULL, '2023-12-26 12:09:14', '2023-12-26 12:09:14'),
(10, 'App\\Models\\User', 3, 'user', '4e744b3be548780feb12e555fda87e352741c0b6514be2dc45aef03e7bbc5604', '[\"*\"]', NULL, NULL, '2023-12-26 12:09:33', '2023-12-26 12:09:33'),
(11, 'App\\Models\\User', 3, 'user', '8ae93bef6941dbaabd3994f08fecaa7019ae121c4abf3f4982bf6492cc17c6de', '[\"*\"]', NULL, NULL, '2023-12-26 12:17:52', '2023-12-26 12:17:52'),
(12, 'App\\Models\\User', 3, 'user', '28843eec2cd0f9dd31bd47b3523f114b5ff4cb76ca55039c396a71a5e558e00e', '[\"*\"]', NULL, NULL, '2023-12-26 12:18:44', '2023-12-26 12:18:44'),
(13, 'App\\Models\\User', 3, 'user', '890fed41874187a959ac479d687195e19976a89743e3f4142fbe7e2b480db2d8', '[\"*\"]', NULL, NULL, '2023-12-27 05:18:24', '2023-12-27 05:18:24'),
(14, 'App\\Models\\User', 3, 'user', 'f383a0db3de63c090a03406e6854629dcdc49470e3a37d68fed4530c4101483a', '[\"*\"]', NULL, NULL, '2023-12-27 05:38:04', '2023-12-27 05:38:04'),
(15, 'App\\Models\\User', 3, 'user', 'dc93f83f5bf50d6c88230623f0474e22aaea4ac51e2ae52a92a750466e6348d9', '[\"*\"]', NULL, NULL, '2023-12-27 06:52:42', '2023-12-27 06:52:42'),
(16, 'App\\Models\\User', 3, 'user', '18ac595b32677ff73128d3e8df5462f6dbea3b071b7b8f8f2dfe8f9d3bd49b3c', '[\"*\"]', NULL, NULL, '2023-12-28 05:14:28', '2023-12-28 05:14:28'),
(17, 'App\\Models\\User', 3, 'user', '4e01b781744d8ff3d17f875d8f62f2bb9e59e368d2781cf9dab1ae6e65e5bf6c', '[\"*\"]', NULL, NULL, '2023-12-28 06:04:15', '2023-12-28 06:04:15'),
(18, 'App\\Models\\User', 3, 'user', '014ad88c516a9ab4d47e53d6038c147fcf5dbde2340a9aa75cf3f83d95f597dc', '[\"*\"]', NULL, NULL, '2023-12-28 07:24:10', '2023-12-28 07:24:10'),
(19, 'App\\Models\\User', 3, 'user', '1329f18699b3175a738daa4fcfa844e6de22021a4b45c8533e5e1f544d7fecf1', '[\"*\"]', NULL, NULL, '2023-12-28 07:54:58', '2023-12-28 07:54:58'),
(20, 'App\\Models\\User', 3, 'user', 'c233f9ce3716e2f7bf41c9cd5fee6e5dd628b3a167490b0a1280c75e995a1875', '[\"*\"]', NULL, NULL, '2023-12-28 07:55:29', '2023-12-28 07:55:29'),
(21, 'App\\Models\\User', 3, 'user', 'ef75136f3d7910a2855aa7bedcd40304ac2363c7efc5624c3750b58086360898', '[\"*\"]', NULL, NULL, '2023-12-30 06:04:33', '2023-12-30 06:04:33'),
(22, 'App\\Models\\User', 3, 'user', '84074b2b6bf0eb540f1165b8140df283522b4957f51122e5cbefb4aa66308d42', '[\"*\"]', NULL, NULL, '2023-12-30 09:05:46', '2023-12-30 09:05:46'),
(23, 'App\\Models\\User', 3, 'user', 'cd5d03a7b6680940058985c5ece10cc7dc9a02172e165222607778484fca2cd5', '[\"*\"]', NULL, NULL, '2023-12-30 10:14:35', '2023-12-30 10:14:35'),
(24, 'App\\Models\\User', 19, 'user', '6af3e39d32f2ff2e0c7974a74e93b802c5e7fa4d8d19edd56f352a94d15e44aa', '[\"*\"]', NULL, NULL, '2023-12-30 11:56:55', '2023-12-30 11:56:55'),
(25, 'App\\Models\\User', 20, 'user', '4b4ef02966b59740e721ae15f4e7ab05d7692aa2dec5f1323abc65b48d39f144', '[\"*\"]', NULL, NULL, '2023-12-30 12:04:40', '2023-12-30 12:04:40'),
(26, 'App\\Models\\User', 21, 'user', '60e176dd2ded580d3039ae3aa5839e26ccdd9f8383d45291440c8b714bb0f50a', '[\"*\"]', NULL, NULL, '2023-12-30 12:07:06', '2023-12-30 12:07:06'),
(27, 'App\\Models\\User', 24, 'user', '356e919b05493f79e8b13985193da9522de772973a71469c5a996706da469ce3', '[\"*\"]', NULL, NULL, '2023-12-30 12:10:19', '2023-12-30 12:10:19'),
(28, 'App\\Models\\User', 26, 'user', '3672f9556bed1deb15ec5826be78fff985b52fe72757240de2cefbc0c192dc2c', '[\"*\"]', NULL, NULL, '2023-12-30 12:13:43', '2023-12-30 12:13:43'),
(29, 'App\\Models\\User', 28, 'user', '5463d4727ee521ed574e06531964cef828e5506e664cb0c4f564f835925340c3', '[\"*\"]', NULL, NULL, '2023-12-30 12:15:51', '2023-12-30 12:15:51'),
(30, 'App\\Models\\User', 29, 'user', '3ba63f4bdb1be5f13df54f56e1e162963c6f62fb2a8f73aed2fe637555612988', '[\"*\"]', NULL, NULL, '2023-12-30 12:21:52', '2023-12-30 12:21:52'),
(31, 'App\\Models\\User', 30, 'user', 'd964fcc5bf2c7c2ce7d3368e9e5862806cfefc5c9c5bcac66753a4cc72dc39e1', '[\"*\"]', NULL, NULL, '2023-12-30 12:24:24', '2023-12-30 12:24:24'),
(32, 'App\\Models\\User', 31, 'user', 'f61db1cdbef43720aca234f3ac60b088720549aa34a3215e36c5464604db67b9', '[\"*\"]', NULL, NULL, '2023-12-30 12:27:10', '2023-12-30 12:27:10'),
(33, 'App\\Models\\User', 32, 'user', '02cf0b84bc3402daac9f36a408b4856d0765e1332f178c3fb282d98d7fe4646d', '[\"*\"]', NULL, NULL, '2023-12-30 12:34:03', '2023-12-30 12:34:03'),
(34, 'App\\Models\\User', 33, 'user', '159f37926944efcb8477938b951673b68fe1226f7779564487678c6cccba4af6', '[\"*\"]', NULL, NULL, '2023-12-30 12:34:51', '2023-12-30 12:34:51'),
(35, 'App\\Models\\User', 3, 'user', '599109d078b6db3452e8b8f3579e5d37b9f06e202b0f4fa83189b3d3e1c44fe6', '[\"*\"]', NULL, NULL, '2023-12-30 12:44:37', '2023-12-30 12:44:37'),
(36, 'App\\Models\\User', 3, 'user', '403b97d39ee490f615d5bc6ece0f7a81468b6b38dca380b45e2c9e4c2d5b8aa7', '[\"*\"]', NULL, NULL, '2023-12-30 12:47:45', '2023-12-30 12:47:45'),
(37, 'App\\Models\\User', 34, 'user', 'd222e9e682b1e2741011f079a500965f1fe01c08d049c3f587be5c5517d30c67', '[\"*\"]', NULL, NULL, '2023-12-30 12:50:01', '2023-12-30 12:50:01'),
(38, 'App\\Models\\User', 35, 'user', '2ddb29d82f9c64fcde42803d613c08ef5fa245d4ada9c6c079488fb30fdfbef0', '[\"*\"]', NULL, NULL, '2023-12-30 12:51:40', '2023-12-30 12:51:40'),
(39, 'App\\Models\\User', 39, 'user', '0af2eb8d18c396f4a6b9126682a5df000043c7ac433d0c1853fd36571e735554', '[\"*\"]', NULL, NULL, '2023-12-31 06:08:08', '2023-12-31 06:08:08'),
(40, 'App\\Models\\User', 41, 'user', 'dbb903dfe2e971719f87a2b38a83e1656549c9e30c202fdfc5e5dbf3f430a20c', '[\"*\"]', NULL, NULL, '2023-12-31 06:11:42', '2023-12-31 06:11:42'),
(41, 'App\\Models\\User', 42, 'user', '8c68544f6ea3b955669fd53f5cb38ac4dadc00dc8ee10c6ad9f3d201c28ecb0e', '[\"*\"]', NULL, NULL, '2023-12-31 06:26:03', '2023-12-31 06:26:03'),
(42, 'App\\Models\\User', 43, 'user', '6326b2622c521fc15a909e4c1da7b4e4dcd76eb538b48cc65414b4c359be6044', '[\"*\"]', NULL, NULL, '2023-12-31 06:29:13', '2023-12-31 06:29:13'),
(43, 'App\\Models\\User', 44, 'user', '5b8227c8b00d644def452d432a8cb0521d31f4c1fba20cd76968e6cfc6814e88', '[\"*\"]', NULL, NULL, '2023-12-31 06:31:28', '2023-12-31 06:31:28'),
(44, 'App\\Models\\User', 45, 'user', '6e1fdedd86a89711f93cba3362f1822a67830d2b87547f6414fbe09fa7753474', '[\"*\"]', NULL, NULL, '2023-12-31 06:32:50', '2023-12-31 06:32:50'),
(45, 'App\\Models\\User', 46, 'user', '5d1dd3a709d6e9c3a83cec1e9a2fedb4e0c4207c4a946c1ceb99b4ae3aedf34a', '[\"*\"]', NULL, NULL, '2023-12-31 06:33:52', '2023-12-31 06:33:52'),
(46, 'App\\Models\\User', 47, 'user', '77efc28f9d2907d9cc74e0d946fd49db44449c3e603a55eb6c1c5237c123a252', '[\"*\"]', NULL, NULL, '2023-12-31 06:35:30', '2023-12-31 06:35:30'),
(47, 'App\\Models\\User', 48, 'user', 'caa1fd159fabd0fa9d157b844686e1004bd6cc0ca7e53b94972f77555a948030', '[\"*\"]', NULL, NULL, '2023-12-31 06:46:12', '2023-12-31 06:46:12'),
(48, 'App\\Models\\User', 49, 'user', 'b7728ad57ecdb10aa651d291575cfcea40446e584a8a116041ea12a2357c2205', '[\"*\"]', NULL, NULL, '2023-12-31 07:04:43', '2023-12-31 07:04:43'),
(49, 'App\\Models\\User', 3, 'user', '89008a946afd23384db0954d80abc0d318b2afd2b8364c638466582010a5c795', '[\"*\"]', NULL, NULL, '2023-12-31 07:18:44', '2023-12-31 07:18:44'),
(50, 'App\\Models\\User', 50, 'user', 'dc7596a02265b9ecc76a24b76b61032d26bbe67f23f8f4e7ac051246cc77d4a2', '[\"*\"]', NULL, NULL, '2023-12-31 09:09:09', '2023-12-31 09:09:09'),
(51, 'App\\Models\\User', 51, 'user', '5643ee987d2e55eb4d4d8cbd0258790b6ba6931de38596c0abc95044ff6e2bb0', '[\"*\"]', NULL, NULL, '2023-12-31 09:12:25', '2023-12-31 09:12:25'),
(52, 'App\\Models\\User', 52, 'user', '4e8682e0c63b280fb3814f8ebf8ffa7b71598a7d2a5ea3fd384ce0495fc63a48', '[\"*\"]', NULL, NULL, '2023-12-31 09:22:30', '2023-12-31 09:22:30'),
(53, 'App\\Models\\User', 3, 'user', 'ee8371348039a23df4a967958911e1bd2f115eeff75e85db7b709f8f0585075c', '[\"*\"]', NULL, NULL, '2023-12-31 09:22:46', '2023-12-31 09:22:46'),
(54, 'App\\Models\\User', 53, 'user', 'a199fc812b56df0184f3ee3fdb1f1930f6c7ea4d45bb8b2ff4dd284fdf159b43', '[\"*\"]', NULL, NULL, '2023-12-31 09:25:18', '2023-12-31 09:25:18'),
(55, 'App\\Models\\User', 54, 'user', '8d32833964cf32bc71538821e24e4bfaed9e1bd2b2507d85e60be307088bb474', '[\"*\"]', NULL, NULL, '2023-12-31 09:31:19', '2023-12-31 09:31:19'),
(56, 'App\\Models\\User', 55, 'user', 'b35bace04846a636042bb62f08eb3895636276ef5c5cc5fe32763ba9004ec72a', '[\"*\"]', NULL, NULL, '2023-12-31 09:34:08', '2023-12-31 09:34:08'),
(57, 'App\\Models\\User', 56, 'user', 'aa7d9188071449df07aa88ce84d347750daf644ea522b657356da40307aced12', '[\"*\"]', NULL, NULL, '2023-12-31 09:36:24', '2023-12-31 09:36:24'),
(58, 'App\\Models\\User', 3, 'user', 'bceeb27832292746b6fcb5788a6c31d3ab9e989c4917fbd082e90b0cfc304bb2', '[\"*\"]', NULL, NULL, '2023-12-31 09:43:21', '2023-12-31 09:43:21'),
(59, 'App\\Models\\User', 3, 'user', '0bd09b651d1d6613cee44be4f9c13489e7c96e7c10cd12586ba909ff6c9696a9', '[\"*\"]', NULL, NULL, '2024-01-01 05:05:14', '2024-01-01 05:05:14'),
(60, 'App\\Models\\User', 3, 'user', '092d538704b2747960f6bf43b9aa793d996595145d751cbc8d2838d3541c988a', '[\"*\"]', NULL, NULL, '2024-01-01 05:27:39', '2024-01-01 05:27:39'),
(61, 'App\\Models\\User', 3, 'user', '87dd6099d278905612f80781e09ac46cdc90457a205d3adb4dc5c16b942cfa18', '[\"*\"]', NULL, NULL, '2024-01-01 05:32:21', '2024-01-01 05:32:21'),
(62, 'App\\Models\\User', 3, 'user', '71bded3b51bf2e7efea4e7dbd30c6d69f2f48433ea5a2adfac76e363d385a1a0', '[\"*\"]', NULL, NULL, '2024-01-01 05:34:16', '2024-01-01 05:34:16'),
(63, 'App\\Models\\User', 3, 'user', 'd0869d14caaa063673c332bf1cf663524d2c7acb9de8bb0ca1ff2a099a54ee91', '[\"*\"]', NULL, NULL, '2024-01-01 06:01:13', '2024-01-01 06:01:13'),
(64, 'App\\Models\\User', 3, 'user', 'e58f3937773d4b9580b3ef1b18c8ccdf8758a1be48849963a226894e93d6e242', '[\"*\"]', NULL, NULL, '2024-01-01 09:47:51', '2024-01-01 09:47:51'),
(65, 'App\\Models\\User', 8, 'user', '095a5bdb2e7cf6aec764ebad99691bb4921efd38f67a63b8ab904a0f5918be55', '[\"*\"]', NULL, NULL, '2024-01-01 09:52:21', '2024-01-01 09:52:21'),
(66, 'App\\Models\\User', 8, 'user', 'de846ad91d0f1de434fd262280a4a2f7d94f42eb0474c1a0346ed9be7094a0f1', '[\"*\"]', NULL, NULL, '2024-01-01 09:53:07', '2024-01-01 09:53:07'),
(67, 'App\\Models\\User', 8, 'user', '593f4c1c60cf76f826d53c978f22b724f3aece649ff5d6a3960a9ed14c526e3d', '[\"*\"]', NULL, NULL, '2024-01-01 10:02:00', '2024-01-01 10:02:00'),
(68, 'App\\Models\\User', 8, 'user', '5e639c0d36f36aaac1d08bf41eebbf4793286776f2382d9d576160573586e43d', '[\"*\"]', NULL, NULL, '2024-01-02 05:32:58', '2024-01-02 05:32:58'),
(69, 'App\\Models\\User', 8, 'user', 'd2b8f6603a1baa3b9764638319ab9b59022756e4a7337c8fa89e15863e408c7b', '[\"*\"]', NULL, NULL, '2024-01-02 06:04:01', '2024-01-02 06:04:01'),
(70, 'App\\Models\\User', 8, 'user', '2e328daf79275dcf7bfaf61853b18bfb5b2e220362850685e09f60d1cc4163e0', '[\"*\"]', NULL, NULL, '2024-01-02 22:24:31', '2024-01-02 22:24:31'),
(71, 'App\\Models\\User', 8, 'user', 'd8c5dbf7418bc6e906c4725167b00f5848ffdd4fadf004454648695fac659336', '[\"*\"]', NULL, NULL, '2024-01-03 05:53:57', '2024-01-03 05:53:57');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lesson_id` bigint(20) UNSIGNED NOT NULL,
  `question` text NOT NULL,
  `q_url` varchar(255) DEFAULT NULL,
  `q_code` varchar(255) DEFAULT NULL,
  `q_type` enum('Trail','Parallel','Extra') DEFAULT NULL,
  `month` varchar(20) DEFAULT NULL,
  `q_num` varchar(20) DEFAULT NULL,
  `year` varchar(20) DEFAULT NULL,
  `section` enum('1','2','3','4') DEFAULT NULL,
  `difficulty` enum('A','B','C','D','E') NOT NULL,
  `ans_type` enum('MCQ','Grid_in') DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `created_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `q_ans`
--

CREATE TABLE `q_ans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ans_pdf` varchar(255) DEFAULT NULL,
  `ans_video` varchar(255) DEFAULT NULL,
  `Q_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `q_ans`
--

INSERT INTO `q_ans` (`id`, `ans_pdf`, `ans_video`, `Q_id`, `created_at`, `updated_at`) VALUES
(1, '2023X12X24X11X56X40202301111020C5631746XA3DDX43F6XA634X158716ABFA8B.jpeg', '2023X12X24X11X56X40202301111020C5631746XA3DDX43F6XA634X158716ABFA8B.jpeg', 8, '2023-12-24', '2023-12-24'),
(2, '2023X12X24X11X56X40202301111011mvf_light_logo.png', '2023X12X24X11X56X40202301111020C5631746XA3DDX43F6XA634X158716ABFA8B.jpeg', 8, '2023-12-24', '2023-12-24'),
(3, '2023X12X24X11X56X40202301111020C5631746XA3DDX43F6XA634X158716ABFA8B.jpeg', '2023X12X24X11X56X40202301111011mvf_light_logo.png', 8, '2023-12-24', '2023-12-24'),
(4, '2023X12X24X11X58X17202301101901SnapchatX2011979818.jpg', '2023X12X24X11X58X17202301101726mvf_dark_logo.png', 9, '2023-12-24', '2023-12-24'),
(5, '2023X12X24X11X58X17202301100931mvf_light_logo.png', '2023X12X24X11X58X17202303111454WaXSallahallhXAlaXNoor.jpg', 9, '2023-12-24', '2023-12-24'),
(6, '2023X12X25X14X16X59202301111020C5631746XA3DDX43F6XA634X158716ABFA8B.jpeg', '2023X12X25X14X16X59202301111020C5631746XA3DDX43F6XA634X158716ABFA8B.jpeg', 10, '2023-12-25', '2023-12-25'),
(7, '2023X12X25X14X18X43202301111011mvf_light_logo.png', '2023X12X25X14X18X43202301111020C5631746XA3DDX43F6XA634X158716ABFA8B.jpeg', 11, '2023-12-25', '2023-12-25'),
(8, '2023X12X26X11X07X34202301100934C5631746XA3DDX43F6XA634X158716ABFA8B.jpeg', '2023X12X26X11X07X34', 14, '2023-12-26', '2023-12-26'),
(9, '2023X12X26X11X10X38202301100934C5631746XA3DDX43F6XA634X158716ABFA8B.jpeg', '2023X12X26X11X10X38', 16, '2023-12-26', '2023-12-26');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `guard_name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `teacher__courses`
--

CREATE TABLE `teacher__courses` (
  `id` int(11) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `profile_photo_path` varchar(2048) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `phone` varchar(191) NOT NULL,
  `parent_phone` varchar(191) DEFAULT NULL,
  `parent_email` varchar(191) DEFAULT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'default.png',
  `position` enum('super_admin','admin','student','teacher','affilate') NOT NULL,
  `course_id` bigint(20) UNSIGNED DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `password` varchar(191) NOT NULL,
  `state` enum('hidden','Show') NOT NULL,
  `avatar` varchar(191) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `extra_email` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `last_login_at` datetime DEFAULT NULL,
  `last_login_ip` varchar(191) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `profile_photo_path`, `email_verified_at`, `phone`, `parent_phone`, `parent_email`, `image`, `position`, `course_id`, `category_id`, `password`, `state`, `avatar`, `remember_token`, `extra_email`, `created_at`, `updated_at`, `last_login_at`, `last_login_ip`) VALUES
(1, 'Ahmed', 'Ahmed@gmail.com', NULL, NULL, '0113443534', '012345346', 'Ali@gmail.com', 'default.png', 'teacher', 2, 1, '$2y$10$O4pDFFvEQGAkfZ.mcGIhaOb0MQCocleYwEySm4OYgq9./pKT021de', 'Show', NULL, NULL, NULL, NULL, '2023-12-18 05:20:49', NULL, NULL),
(5, 'Teacher 1', 'admin3@gmail.com', NULL, NULL, '01099475854', NULL, NULL, '2023X12X18X11X42X459672202304300850download.png', 'super_admin', NULL, NULL, '$2y$10$abRantqLN7R8dKUzWPGSLebir7D.GcznzfflGYjquM59GZo9f5y3a', 'Show', NULL, NULL, NULL, '2023-12-18 09:42:45', '2023-12-18 09:42:45', NULL, NULL),
(7, 'Teacher 1', 'admin4@gmail.com', NULL, NULL, '01099475854', NULL, NULL, '2023X12X18X11X43X297615202304300850download.png', 'super_admin', NULL, NULL, '$2y$10$CWyZzMn0kdjZKf1f5z0ey.xXzyHVVwkvCFGwakJchI9dwNSyOEyQa', 'Show', NULL, NULL, NULL, '2023-12-18 09:43:29', '2023-12-18 09:43:29', NULL, NULL),
(8, 'Teacher 1', 'admin@gmail.com', NULL, NULL, '01099475854', NULL, NULL, '2023X12X18X11X44X145166202304300850download.png', 'admin', NULL, NULL, '$2y$10$3cpQN4tIOFxAS2hQ6vKbl.ho1zHxGGWGziGNHR3.JZsjUYJRADNXq', 'Show', NULL, NULL, NULL, '2023-12-18 09:44:14', '2023-12-18 09:44:14', NULL, NULL),
(10, 'Teacher', 'teacher@gmail.com', NULL, NULL, '01099475854', NULL, NULL, '2023X12X18X11X50X119775202304090932egyptXflagXwaveXiconX32.png', 'teacher', NULL, NULL, '$2y$10$EFSKaqvOqy3o.ihNqVWi7uCPCrFtflwUJGqEBFP1woOuxlRaIqN5u', 'Show', NULL, NULL, NULL, '2023-12-18 09:50:11', '2023-12-18 09:50:11', NULL, NULL),
(11, 'Teacher2', 'teacher2@gmail.com', NULL, NULL, '01099475854', NULL, NULL, '2023X12X18X11X52X277966202304090932egyptXflagXwaveXiconX32.png', 'teacher', 1, 1, '$2y$10$Y4fg1B5EpujC8OVSCO6fNOyxdAj2lPJDZWibbtD8j55Jik6fU4Uq6', 'Show', NULL, NULL, NULL, '2023-12-18 09:52:27', '2023-12-18 09:52:27', NULL, NULL),
(44, 'admin@gmail.com', 'sad@gmail.com', NULL, NULL, '123', '123', NULL, 'default.png', 'admin', NULL, NULL, '$2y$10$RkeDuqhtAqMTRC7gfMFxG.Vl8pLtWGgj1jisi0ZkphX9LDVUQaZpO', 'Show', NULL, NULL, NULL, '2023-12-31 06:31:28', '2023-12-31 06:31:28', NULL, NULL),
(46, 'asd', 'asd12@gmail.com', NULL, NULL, '123', '123', NULL, 'default.png', 'student', NULL, NULL, '$2y$10$fHxDlq7YyAFsRbhMc/GicuyEhWJZ2D7z75W/CDKEvcodtPdVstLVC', 'hidden', NULL, NULL, NULL, '2023-12-31 06:33:52', '2023-12-31 06:33:52', NULL, NULL),
(48, 'admin@gmail.com', 'karimelfakey84@gmail.com', NULL, NULL, '01271684333', '01271546222', NULL, 'default.png', 'student', NULL, NULL, '$2y$10$32N1ELV4VDboOSV/2VrxQOjTkcK6f4exasrikJih1vkdwj.7cDG56', 'hidden', NULL, NULL, NULL, '2023-12-31 06:46:12', '2023-12-31 06:46:12', NULL, NULL),
(57, 'ahmed', 'ahmedyahia@yahoo.com', NULL, NULL, '123456789', NULL, NULL, 'default.png', 'admin', NULL, NULL, '$2y$10$4CuUgVeM.E8K16Tbs5ZdJ.5SvzhdLRr08.J4gkehsTsGNl7g43eVu', 'hidden', NULL, NULL, NULL, '2024-01-01 09:54:47', '2024-01-01 09:54:47', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wallets`
--

CREATE TABLE `wallets` (
  `id` bigint(20) NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `wallet` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_roles`
--
ALTER TABLE `admin_roles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_roles_user_id_foreign` (`user_id`);

--
-- Indexes for table `affilate`
--
ALTER TABLE `affilate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_Categories_Teacher` (`teacher_id`);

--
-- Indexes for table `chapters`
--
ALTER TABLE `chapters`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chapters_course_id_foreign` (`course_id`),
  ADD KEY `FK_Chapters_Teacher` (`teacher_id`);

--
-- Indexes for table `chapter_prices`
--
ALTER TABLE `chapter_prices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_Price_Chapter` (`chapter_id`);

--
-- Indexes for table `commissions`
--
ALTER TABLE `commissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `confirm_sign`
--
ALTER TABLE `confirm_sign`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `courses_category_id_foreign` (`category_id`),
  ADD KEY `FK_Course_Teacher` (`teacher_id`);

--
-- Indexes for table `exam_codes`
--
ALTER TABLE `exam_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `grid_ans`
--
ALTER TABLE `grid_ans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `idea_lessons`
--
ALTER TABLE `idea_lessons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_Idea_Lesson` (`lesson_id`);

--
-- Indexes for table `lessons`
--
ALTER TABLE `lessons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_Lesson_Chapter` (`chapter_id`),
  ADD KEY `FK_Lesson_Teacher` (`teacher_id`);

--
-- Indexes for table `marketings`
--
ALTER TABLE `marketings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_Maketing_Affilate` (`affilate_id`),
  ADD KEY `FK_Maketing_Chapter` (`chapter_id`),
  ADD KEY `FK_Maketing_Course` (`course_id`),
  ADD KEY `FK_Maketing_Student` (`student_id`);

--
-- Indexes for table `mcq_ans`
--
ALTER TABLE `mcq_ans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_Q_Lesson` (`lesson_id`);

--
-- Indexes for table `q_ans`
--
ALTER TABLE `q_ans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `teacher__courses`
--
ALTER TABLE `teacher__courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_tc_category` (`category_id`),
  ADD KEY `FK_tc_course` (`course_id`),
  ADD KEY `FK_tc_user` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `FK_Teacher_Categories` (`category_id`),
  ADD KEY `FK_Teacher_Course` (`course_id`);

--
-- Indexes for table `wallets`
--
ALTER TABLE `wallets`
  ADD KEY `FK_Wallet_Student` (`student_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admin_roles`
--
ALTER TABLE `admin_roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `affilate`
--
ALTER TABLE `affilate`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `chapters`
--
ALTER TABLE `chapters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `chapter_prices`
--
ALTER TABLE `chapter_prices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `commissions`
--
ALTER TABLE `commissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `confirm_sign`
--
ALTER TABLE `confirm_sign`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `exam_codes`
--
ALTER TABLE `exam_codes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `grid_ans`
--
ALTER TABLE `grid_ans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `idea_lessons`
--
ALTER TABLE `idea_lessons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `lessons`
--
ALTER TABLE `lessons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `marketings`
--
ALTER TABLE `marketings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `mcq_ans`
--
ALTER TABLE `mcq_ans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `q_ans`
--
ALTER TABLE `q_ans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teacher__courses`
--
ALTER TABLE `teacher__courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin_roles`
--
ALTER TABLE `admin_roles`
  ADD CONSTRAINT `admin_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `FK_Categories_Teacher` FOREIGN KEY (`teacher_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `chapters`
--
ALTER TABLE `chapters`
  ADD CONSTRAINT `FK_Chapters_Teacher` FOREIGN KEY (`teacher_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `chapters_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `chapter_prices`
--
ALTER TABLE `chapter_prices`
  ADD CONSTRAINT `FK_Price_Chapter` FOREIGN KEY (`chapter_id`) REFERENCES `chapters` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `FK_Course_Teacher` FOREIGN KEY (`teacher_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `courses_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `idea_lessons`
--
ALTER TABLE `idea_lessons`
  ADD CONSTRAINT `FK_Idea_Lesson` FOREIGN KEY (`lesson_id`) REFERENCES `lessons` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `lessons`
--
ALTER TABLE `lessons`
  ADD CONSTRAINT `FK_Lesson_Chapter` FOREIGN KEY (`chapter_id`) REFERENCES `chapters` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Lesson_Teacher` FOREIGN KEY (`teacher_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `marketings`
--
ALTER TABLE `marketings`
  ADD CONSTRAINT `FK_Maketing_Affilate` FOREIGN KEY (`affilate_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Maketing_Chapter` FOREIGN KEY (`chapter_id`) REFERENCES `chapters` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Maketing_Course` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Maketing_Student` FOREIGN KEY (`student_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `FK_Q_Lesson` FOREIGN KEY (`lesson_id`) REFERENCES `lessons` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `teacher__courses`
--
ALTER TABLE `teacher__courses`
  ADD CONSTRAINT `FK_tc_category` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_tc_course` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_tc_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `FK_Teacher_Categories` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Teacher_Course` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `wallets`
--
ALTER TABLE `wallets`
  ADD CONSTRAINT `FK_Wallet_Student` FOREIGN KEY (`student_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
