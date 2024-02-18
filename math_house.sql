-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 15, 2024 at 01:57 PM
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
(26, 57, 'Lesson', '2024-01-01 09:54:47', '2024-01-01 09:54:47'),
(31, 44, 'Questions', '2024-01-04 06:14:37', '2024-01-04 06:14:37');

-- --------------------------------------------------------

--
-- Table structure for table `affilate`
--

CREATE TABLE `affilate` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `organization` varchar(255) DEFAULT NULL,
  `wallet` varchar(255) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `affilate`
--

INSERT INTO `affilate` (`id`, `name`, `phone`, `email`, `organization`, `wallet`, `created_at`, `updated_at`) VALUES
(1, 'vd1', '01099475854', 'admin@gmail.com', 'fd', NULL, '2024-01-08', '2024-01-08'),
(2, 'as', '01099475854', 'admin@gmail.com', 'fd', NULL, '2024-01-24', '2024-01-24'),
(3, 'vd1', '01099475854', 'admin@gmail.com', 'fd', NULL, '2024-01-27', '2024-01-27'),
(4, 'vd1', '2222', 'mohamed_yasen@gmail.com', 'fd', NULL, '2024-02-05', '2024-02-05');

-- --------------------------------------------------------

--
-- Table structure for table `cancel_session`
--

CREATE TABLE `cancel_session` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `session_id` bigint(20) UNSIGNED NOT NULL,
  `statue` enum('Pendding','Approve','Rejected') NOT NULL DEFAULT 'Pendding',
  `date` date NOT NULL,
  `time` time NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cancel_session`
--

INSERT INTO `cancel_session` (`id`, `user_id`, `session_id`, `statue`, `date`, `time`, `created_at`, `updated_at`) VALUES
(1, 1, 7, 'Rejected', '2024-02-07', '27:04:32', NULL, '2024-02-03');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cate_name` varchar(191) NOT NULL,
  `cate_des` varchar(191) NOT NULL,
  `cate_url` varchar(191) NOT NULL DEFAULT 'Default.jfif',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `teacher_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `cate_name`, `cate_des`, `cate_url`, `created_at`, `updated_at`, `teacher_id`) VALUES
(1, 'Category 1', 'Category One', 'default.png', NULL, '2024-02-13 09:36:52', 1),
(6, 'America deploma', 'asd', '3782024X01X24X09X35X06shape2.png', '2024-01-24 07:35:06', '2024-01-24 07:35:06', 8),
(8, 'category Three', 'category Three', '2722024X02X05X12X52X505.png', '2024-02-05 10:52:50', '2024-02-05 10:52:50', 8);

-- --------------------------------------------------------

--
-- Table structure for table `chapters`
--

CREATE TABLE `chapters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `chapter_name` varchar(191) NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `ch_des` varchar(191) NOT NULL,
  `ch_price` float DEFAULT NULL,
  `ch_url` varchar(255) NOT NULL DEFAULT 'Default.jfif',
  `pre_requisition` text DEFAULT NULL,
  `gain` text DEFAULT NULL,
  `teacher_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chapters`
--

INSERT INTO `chapters` (`id`, `chapter_name`, `course_id`, `ch_des`, `ch_price`, `ch_url`, `pre_requisition`, `gain`, `teacher_id`, `created_at`, `updated_at`) VALUES
(4, 'Chapter 1', 1, 'Chapter One', 200, 'Default.jfif', 'to', 'what', 1, NULL, '2024-01-30 10:00:54'),
(5, 'Chapter 22', 1, 'errw', 200, 'Default.jfif', 'hfgh', 'h', 5, '2024-01-03 00:34:57', '2024-01-03 00:34:57'),
(6, 'Chapter 228', 1, 'errw', 200, '20230826085456153827_2318787155110616_6392255175880343552_n.jpg', 'jfdgh', 'o', 5, '2024-01-03 00:35:50', '2024-01-24 10:11:46'),
(7, 'Chapter 22', 8, 'errw', 350, '20230826085456153827_2318787155110616_6392255175880343552_n.jpg', 'fjfgj', 'ghf', 5, '2024-01-03 00:36:16', '2024-01-03 00:36:16'),
(13, 'Chapter 123', 8, 'yere', 300, '3272024X01X30X09X39X3910.jpg', 'hgg', 'jh', 5, '2024-01-30 09:39:39', '2024-01-30 09:39:39'),
(15, 'Chapter 99', 1, 'ghfg', 150, '', 'jhv', 'jih', 5, '2024-01-30 13:49:37', '2024-01-30 13:49:37');

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

--
-- Dumping data for table `chapter_prices`
--

INSERT INTO `chapter_prices` (`id`, `duration`, `price`, `discount`, `chapter_id`, `created_at`, `updated_at`) VALUES
(3, '33', 23, 2, 5, '2024-01-04', '2024-01-04'),
(5, '22', 222, 22, 6, '2024-01-24', '2024-01-24'),
(6, '11', 11, 11, 7, '2024-01-30', '2024-01-30'),
(7, '22', 22, 22, 6, '2024-01-30', '2024-01-30'),
(8, '33', 23, 231, 7, '2024-01-30', '2024-01-30'),
(9, '11', 236, 77, 5, '2024-01-30', '2024-01-30'),
(10, '33', 23, 231, NULL, '2024-01-30', '2024-01-30'),
(11, '11', 236, 77, NULL, '2024-01-30', '2024-01-30'),
(12, '11', 22, 33, NULL, '2024-01-30', '2024-01-30'),
(13, '33', 22, 11, NULL, '2024-01-30', '2024-01-30'),
(16, '22', 23, 2, 13, '2024-01-30', '2024-01-30'),
(20, '22', 22, 22, 4, '2024-01-30', '2024-01-30'),
(21, '33', 33, 33, 4, '2024-01-30', '2024-01-30'),
(22, '2', 23, 22, 15, '2024-01-30', '2024-01-30');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `city` varchar(255) NOT NULL,
  `country_id` bigint(20) UNSIGNED DEFAULT NULL,
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
(1, 'Course', 5, 0, NULL, '2024-02-05'),
(2, 'Chapter', 10, 1, NULL, '2024-01-30'),
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
(3, 'ziadm0176@gmail.com', '5567', '2023-12-31', '2023-12-31'),
(4, 'admin@gmail.com', '6618', '2024-01-03', '2024-01-03'),
(5, 'admin@gmail.com', '3021', '2024-01-03', '2024-01-03'),
(6, 'admin@gmail.com', '6842', '2024-01-03', '2024-01-03'),
(7, 'admin2312@gmail.com', '9858', '2024-01-03', '2024-01-03'),
(8, 'karimelfakey84@gmail.com', '9349', '2024-01-04', '2024-01-04'),
(9, 'karimelfakey84@gmail.com', '5987', '2024-01-04', '2024-01-04'),
(10, 'karimelfakey84@gmail.com', '9299', '2024-01-04', '2024-01-04'),
(11, 'sdfs@gmail.com', '1039', '2024-01-04', '2024-01-04'),
(12, 'sdfs@gmail.com', '3273', '2024-01-04', '2024-01-04'),
(13, 'sdfs@gmail.com', '2720', '2024-01-04', '2024-01-04'),
(14, 'sdfs@gmail.com', '7016', '2024-01-04', '2024-01-04');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(1, 'mohamed yasen', 'admin@gmail.com', 'Hello', 'My Msg', '2024-01-20', '2024-01-20');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `created_at`, `updated_at`) VALUES
(10, 'Afghanistan', '2023-05-02 04:20:41', '2023-05-02 04:20:41'),
(11, 'Albania', '2023-05-02 04:20:54', '2023-05-02 04:20:54'),
(12, 'Algeria', '2023-05-02 04:21:05', '2023-05-02 04:21:05'),
(13, 'Andorra', '2023-05-02 04:21:18', '2023-05-02 04:21:18'),
(14, 'Angola', '2023-05-02 04:21:32', '2023-05-02 04:21:32'),
(15, 'Antigua and Barbuda', '2023-05-02 04:21:47', '2023-05-02 04:21:47'),
(16, 'Argentina', '2023-05-02 04:24:32', '2023-05-02 04:24:32'),
(17, 'Armenia', '2023-05-02 04:24:48', '2023-05-02 04:24:48'),
(18, 'Australia', '2023-05-02 04:24:59', '2023-05-02 04:24:59'),
(19, 'Austria', '2023-05-02 04:25:10', '2023-05-02 04:25:10'),
(20, 'Azerbaijan', '2023-05-02 04:25:21', '2023-05-02 04:25:21'),
(21, 'Bahamas', '2023-05-02 04:25:33', '2023-05-02 04:25:33'),
(22, 'Bahrain', '2023-05-02 04:25:43', '2023-05-02 04:25:43'),
(23, 'Bangladesh', '2023-05-02 04:25:53', '2023-05-02 04:25:53'),
(24, 'Barbados', '2023-05-02 04:27:02', '2023-05-02 04:27:02'),
(25, 'Belarus', '2023-05-02 04:27:27', '2023-05-02 04:27:27'),
(26, 'Belgium', '2023-05-02 04:28:46', '2023-05-02 04:28:46'),
(27, 'Belize', '2023-05-02 04:28:57', '2023-05-02 04:28:57'),
(28, 'Benin', '2023-05-02 04:32:12', '2023-05-02 04:32:12'),
(29, 'Bhutan', '2023-05-02 04:32:45', '2023-05-02 04:32:45'),
(30, 'Bolivia', '2023-05-02 04:32:59', '2023-05-02 04:32:59'),
(31, 'Bosnia and Herzegovina', '2023-05-02 04:33:17', '2023-05-02 04:33:17'),
(32, 'Botswana', '2023-05-02 04:33:31', '2023-05-02 04:33:31'),
(33, 'Brazil', '2023-05-02 04:45:12', '2023-05-02 04:45:12'),
(34, 'Brunei', '2023-05-02 04:45:41', '2023-05-02 04:45:41'),
(35, 'Bulgaria', '2023-05-02 04:52:29', '2023-05-02 04:52:29'),
(36, 'Burkina Faso', '2023-05-02 04:53:34', '2023-05-02 04:53:34'),
(37, 'Burundi', '2023-05-02 04:53:53', '2023-05-02 04:53:53'),
(38, 'Côte d\'Ivoire', '2023-05-02 04:54:04', '2023-05-02 04:54:04'),
(39, 'Cabo Verde', '2023-05-02 04:54:15', '2023-05-02 04:54:15'),
(40, 'Cambodia', '2023-05-02 04:57:48', '2023-05-02 04:57:48'),
(41, 'Cameroon', '2023-05-02 04:57:58', '2023-05-02 04:57:58'),
(42, 'Canada', '2023-05-02 04:58:09', '2023-05-02 04:58:09'),
(43, 'Central African Republic', '2023-05-02 04:58:21', '2023-05-02 04:58:21'),
(44, 'Chad', '2023-05-02 05:00:10', '2023-05-02 05:00:10'),
(45, 'Chile', '2023-05-02 05:00:22', '2023-05-02 05:00:22'),
(46, 'China', '2023-05-02 05:00:34', '2023-05-02 05:00:34'),
(47, 'Colombia', '2023-05-02 05:00:44', '2023-05-02 05:00:44'),
(48, 'Comoros', '2023-05-02 05:01:00', '2023-05-02 05:01:00'),
(49, 'Congo (Congo-Brazzaville)', '2023-05-02 05:01:16', '2023-05-02 05:01:16'),
(50, 'Costa Rica', '2023-05-02 05:01:27', '2023-05-02 05:01:27'),
(51, 'Croatia', '2023-05-02 05:01:39', '2023-05-02 05:01:39'),
(52, 'Cuba', '2023-05-02 05:01:50', '2023-05-02 05:01:50'),
(53, 'Cyprus', '2023-05-02 05:02:01', '2023-05-02 05:02:01'),
(54, 'Czechia (Czech Republic)', '2023-05-02 05:02:21', '2023-05-02 05:02:21'),
(55, 'Democratic Republic of the Congo', '2023-05-02 05:02:38', '2023-05-02 05:02:38'),
(56, 'Denmark', '2023-05-02 05:02:50', '2023-05-02 05:02:50'),
(57, 'Djibouti', '2023-05-02 05:03:06', '2023-05-02 05:03:06'),
(58, 'Dominica', '2023-05-02 05:03:17', '2023-05-02 05:03:17'),
(59, 'Dominican Republic', '2023-05-02 05:03:29', '2023-05-02 05:03:29'),
(60, 'Ecuador', '2023-05-02 05:03:40', '2023-05-02 05:03:40'),
(61, 'Egypt', '2023-05-02 05:03:50', '2023-05-02 05:03:50'),
(62, 'El Salvador', '2023-05-02 05:04:18', '2023-05-02 05:04:18'),
(63, 'Equatorial Guinea', '2023-05-02 05:04:28', '2023-05-02 05:04:28'),
(64, 'Eritrea', '2023-05-02 05:04:39', '2023-05-02 05:04:39'),
(65, 'Estonia', '2023-05-02 05:04:49', '2023-05-02 05:04:49'),
(66, 'Eswatini (fmr. \"Swaziland\")', '2023-05-02 05:05:02', '2023-05-02 05:05:02'),
(67, 'Ethiopia', '2023-05-02 05:05:12', '2023-05-02 05:05:12'),
(68, 'Fiji', '2023-05-02 05:05:23', '2023-05-02 05:05:23'),
(69, 'Finland', '2023-05-02 05:05:32', '2023-05-02 05:05:32'),
(70, 'France', '2023-05-02 05:05:42', '2023-05-02 05:05:42'),
(71, 'Gabon', '2023-05-02 05:05:54', '2023-05-02 05:05:54'),
(72, 'Gambia', '2023-05-02 05:06:08', '2023-05-02 05:06:08'),
(73, 'Georgia', '2023-05-02 05:06:36', '2023-05-02 05:06:36'),
(74, 'Germany', '2023-05-02 05:06:46', '2023-05-02 05:06:46'),
(75, 'Ghana', '2023-05-02 05:06:58', '2023-05-02 05:06:58'),
(76, 'Greece', '2023-05-02 05:07:07', '2023-05-02 05:07:07'),
(77, 'Grenada', '2023-05-02 05:07:21', '2023-05-02 05:07:21'),
(78, 'Guatemala', '2023-05-02 05:07:34', '2023-05-02 05:07:34'),
(79, 'Guinea', '2023-05-02 05:07:43', '2023-05-02 05:07:43'),
(80, 'Guinea-Bissau', '2023-05-02 05:07:53', '2023-05-02 05:07:53'),
(81, 'Guyana', '2023-05-02 05:08:02', '2023-05-02 05:08:02'),
(82, 'Haiti', '2023-05-02 05:08:14', '2023-05-02 05:08:14'),
(83, 'Holy See', '2023-05-02 05:08:25', '2023-05-02 05:08:25'),
(84, 'Honduras', '2023-05-02 05:08:45', '2023-05-02 05:08:45'),
(85, 'Hungary', '2023-05-02 05:08:57', '2023-05-02 05:08:57'),
(86, 'Iceland', '2023-05-02 05:09:09', '2023-05-02 05:09:09'),
(87, 'India', '2023-05-02 05:09:20', '2023-05-02 05:09:20'),
(88, 'Indonesia', '2023-05-02 05:10:10', '2023-05-02 05:10:10'),
(89, 'Iran', '2023-05-02 05:10:23', '2023-05-02 05:10:23'),
(90, 'Iraq', '2023-05-02 05:10:34', '2023-05-02 05:10:34'),
(91, 'Ireland', '2023-05-02 05:10:44', '2023-05-02 05:10:44'),
(92, 'Italy', '2023-05-02 05:11:03', '2023-05-02 05:11:03'),
(93, 'Jamaica', '2023-05-02 05:11:17', '2023-05-02 05:11:17'),
(94, 'Japan', '2023-05-02 05:11:31', '2023-05-02 05:11:31'),
(95, 'Jordan', '2023-05-02 05:11:47', '2023-05-02 05:11:47'),
(96, 'Kazakhstan', '2023-05-02 05:11:59', '2023-05-02 05:11:59'),
(97, 'Kenya', '2023-05-02 05:12:09', '2023-05-02 05:12:09'),
(98, 'Kiribati', '2023-05-02 05:12:19', '2023-05-02 05:12:19'),
(99, 'Kuwait', '2023-05-02 05:12:54', '2023-05-02 05:12:54'),
(100, 'Kyrgyzstan', '2023-05-02 05:13:26', '2023-05-02 05:13:26'),
(101, 'Laos', '2023-05-02 05:13:37', '2023-05-02 05:13:37'),
(102, 'Latvia', '2023-05-02 05:13:46', '2023-05-02 05:13:46'),
(103, 'Lebanon', '2023-05-02 05:14:50', '2023-05-02 05:14:50'),
(104, 'Lesotho', '2023-05-02 05:15:22', '2023-05-02 05:15:22'),
(105, 'Liberia', '2023-05-02 05:15:34', '2023-05-02 05:15:34'),
(106, 'Libya', '2023-05-02 05:15:48', '2023-05-02 05:15:48'),
(107, 'Libya', '2023-05-02 05:15:48', '2023-05-02 05:15:48'),
(108, 'Liechtenstein', '2023-05-02 05:17:24', '2023-05-02 05:17:24'),
(109, 'Lithuania', '2023-05-02 05:17:45', '2023-05-02 05:17:45'),
(110, 'Luxembourg', '2023-05-02 06:31:48', '2023-05-02 06:31:48'),
(111, 'Madagascar', '2023-05-02 06:42:28', '2023-05-02 06:42:28'),
(112, 'Malawi', '2023-05-02 06:42:46', '2023-05-02 06:42:46'),
(113, 'Malaysia', '2023-05-02 06:43:49', '2023-05-02 06:43:49'),
(114, 'Maldives', '2023-05-02 06:44:17', '2023-05-02 06:44:17'),
(115, 'Malta', '2023-05-02 09:41:04', '2023-05-02 09:41:04'),
(116, 'Marshall Islands', '2023-05-02 09:41:15', '2023-05-02 09:41:15'),
(117, 'Mauritania', '2023-05-02 09:41:27', '2023-05-02 09:41:27'),
(118, 'Mauritius', '2023-05-02 09:41:54', '2023-05-02 09:41:54'),
(119, 'Mexico', '2023-05-02 09:42:05', '2023-05-02 09:42:05'),
(120, 'Micronesia', '2023-05-02 09:43:01', '2023-05-02 09:43:01'),
(121, 'Moldova', '2023-05-02 09:43:11', '2023-05-02 09:43:11'),
(122, 'Monaco', '2023-05-02 09:43:23', '2023-05-02 09:43:23'),
(123, 'Mongolia', '2023-05-02 09:43:35', '2023-05-02 09:43:35'),
(124, 'Montenegro', '2023-05-02 09:43:44', '2023-05-02 09:43:44'),
(125, 'Morocco', '2023-05-02 09:43:54', '2023-05-02 09:43:54'),
(126, 'Mozambique', '2023-05-02 09:44:04', '2023-05-02 09:44:04'),
(127, 'Myanmar (formerly Burma)', '2023-05-02 09:44:15', '2023-05-02 09:44:15'),
(128, 'Namibia', '2023-05-02 09:45:21', '2023-05-02 09:45:21'),
(129, 'Nauru', '2023-05-02 09:45:32', '2023-05-02 09:45:32'),
(130, 'Nepal', '2023-05-02 09:47:31', '2023-05-02 09:47:31'),
(131, 'Nepal', '2023-05-02 09:48:06', '2023-05-02 09:48:06'),
(132, 'Netherlands', '2023-05-02 09:48:20', '2023-05-02 09:48:20'),
(133, 'New Zealand', '2023-05-02 09:48:30', '2023-05-02 09:48:30'),
(134, 'Nicaragua', '2023-05-02 09:48:40', '2023-05-02 09:48:40'),
(135, 'Niger', '2023-05-02 09:48:50', '2023-05-02 09:48:50'),
(136, 'Nigeria', '2023-05-02 09:49:01', '2023-05-02 09:49:01'),
(137, 'North Korea', '2023-05-02 09:49:22', '2023-05-02 09:49:22'),
(138, 'North Macedonia', '2023-05-02 09:49:32', '2023-05-02 09:49:32'),
(139, 'Norway', '2023-05-02 09:49:46', '2023-05-02 09:49:46'),
(140, 'Oman', '2023-05-02 09:49:57', '2023-05-02 09:49:57'),
(141, 'Pakistan', '2023-05-02 09:50:07', '2023-05-02 09:50:07'),
(142, 'Palau', '2023-05-02 09:50:21', '2023-05-02 09:50:21'),
(143, 'Palestine State', '2023-05-02 09:51:02', '2023-05-02 09:51:02'),
(144, 'Panama', '2023-05-02 09:51:13', '2023-05-02 09:51:13'),
(145, 'Papua New Guinea', '2023-05-02 09:51:28', '2023-05-02 09:51:28'),
(146, 'Paraguay', '2023-05-02 09:52:02', '2023-05-02 09:52:02'),
(147, 'Peru', '2023-05-02 09:52:14', '2023-05-02 09:52:14'),
(148, 'Philippines', '2023-05-02 09:52:23', '2023-05-02 09:52:23'),
(149, 'Poland', '2023-05-02 09:52:35', '2023-05-02 09:52:35'),
(150, 'Portugal', '2023-05-02 09:52:47', '2023-05-02 09:52:47'),
(151, 'Qatar', '2023-05-02 09:52:58', '2023-05-02 09:52:58'),
(152, 'Romania', '2023-05-02 09:53:07', '2023-05-02 09:53:07'),
(153, 'Russia', '2023-05-02 09:53:17', '2023-05-02 09:53:17'),
(154, 'Rwanda', '2023-05-02 09:53:26', '2023-05-02 09:53:26'),
(155, 'Saint Kitts and Nevis', '2023-05-02 09:53:35', '2023-05-02 09:53:35'),
(156, 'Saint Lucia', '2023-05-02 09:53:43', '2023-05-02 09:53:43'),
(157, 'Saint Vincent and the Grenadines', '2023-05-02 09:53:57', '2023-05-02 09:53:57'),
(158, 'Samoa', '2023-05-02 09:54:06', '2023-05-02 09:54:06'),
(159, 'San Marino', '2023-05-02 09:54:15', '2023-05-02 09:54:15'),
(160, 'Sao Tome and Principe', '2023-05-02 09:54:25', '2023-05-02 09:54:25'),
(161, 'Saudi Arabia', '2023-05-02 09:54:36', '2023-05-02 09:54:36'),
(162, 'Senegal', '2023-05-02 09:54:46', '2023-05-02 09:54:46'),
(163, 'Serbia', '2023-05-02 09:54:56', '2023-05-02 09:54:56'),
(164, 'Seychelles', '2023-05-02 09:55:07', '2023-05-02 09:55:07'),
(165, 'Sierra Leone', '2023-05-02 09:55:17', '2023-05-02 09:55:17'),
(166, 'Singapore', '2023-05-02 09:55:25', '2023-05-02 09:55:25'),
(167, 'Slovakia', '2023-05-02 09:55:50', '2023-05-02 09:55:50'),
(168, 'Slovenia', '2023-05-02 09:56:10', '2023-05-02 09:56:10'),
(169, 'Solomon Islands', '2023-05-02 09:56:28', '2023-05-02 09:56:28'),
(170, 'Somalia', '2023-05-02 09:56:39', '2023-05-02 09:56:39'),
(171, 'South Africa', '2023-05-02 09:56:50', '2023-05-02 09:56:50'),
(172, 'South Korea', '2023-05-02 09:59:19', '2023-05-02 09:59:19'),
(173, 'South Sudan', '2023-05-02 09:59:28', '2023-05-02 09:59:28'),
(174, 'Spain', '2023-05-02 09:59:38', '2023-05-02 09:59:38'),
(175, 'Sri Lanka', '2023-05-02 09:59:49', '2023-05-02 09:59:49'),
(176, 'Sudan', '2023-05-02 09:59:59', '2023-05-02 09:59:59'),
(177, 'Suriname', '2023-05-02 10:00:09', '2023-05-02 10:00:09'),
(178, 'Sweden', '2023-05-02 10:00:19', '2023-05-02 10:00:19'),
(179, 'Switzerland', '2023-05-03 03:38:16', '2023-05-03 03:38:16'),
(180, 'Switzerland', '2023-05-03 03:38:17', '2023-05-03 03:38:17'),
(181, 'Syria', '2023-05-03 03:38:27', '2023-05-03 03:38:27'),
(182, 'Tajikistan', '2023-05-03 03:39:25', '2023-05-03 03:39:25'),
(183, 'Tanzania', '2023-05-03 03:39:36', '2023-05-03 03:39:36'),
(184, 'Thailand', '2023-05-03 03:39:46', '2023-05-03 03:39:46'),
(185, 'Timor-Leste', '2023-05-03 03:39:59', '2023-05-03 03:39:59'),
(186, 'Togo', '2023-05-03 03:40:10', '2023-05-03 03:40:10'),
(187, 'Tonga', '2023-05-03 03:40:21', '2023-05-03 03:40:21'),
(188, 'Trinidad and Tobago', '2023-05-03 03:40:33', '2023-05-03 03:40:33'),
(189, 'Tunisia', '2023-05-03 03:40:45', '2023-05-03 03:40:45'),
(190, 'Turkey', '2023-05-03 03:41:57', '2023-05-03 03:41:57'),
(191, 'Turkmenistan', '2023-05-03 03:42:08', '2023-05-03 03:42:08'),
(192, 'Tuvalu', '2023-05-03 03:42:20', '2023-05-03 03:42:20'),
(193, 'Uganda', '2023-05-03 03:42:30', '2023-05-03 03:42:30'),
(194, 'Ukraine', '2023-05-03 03:42:40', '2023-05-03 03:42:40'),
(195, 'United Arab Emirates', '2023-05-03 03:42:54', '2023-05-03 03:42:54'),
(196, 'United Kingdom', '2023-05-03 03:43:19', '2023-05-03 03:43:19'),
(197, 'United States of America', '2023-05-03 03:43:35', '2023-05-03 03:43:35'),
(198, 'Uruguay', '2023-05-03 03:43:47', '2023-05-03 03:43:47'),
(199, 'Uzbekistan', '2023-05-03 03:45:03', '2023-05-03 03:45:03'),
(200, 'Vanuatu', '2023-05-03 03:45:18', '2023-05-03 03:45:18'),
(201, 'Venezuela', '2023-05-03 03:45:31', '2023-05-03 03:45:31'),
(202, 'Vietnam', '2023-05-03 03:45:39', '2023-05-03 03:45:39'),
(203, 'Yemen', '2023-05-03 03:45:51', '2023-05-03 03:45:51'),
(204, 'Zambia', '2023-05-03 03:46:01', '2023-05-03 03:46:01'),
(205, 'Zimbabwe', '2023-05-03 03:46:17', '2023-05-03 03:46:17');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_name` varchar(191) NOT NULL,
  `course_price` float NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `course_des` varchar(191) NOT NULL,
  `course_url` varchar(191) NOT NULL DEFAULT 'Default.jfif',
  `pre_requisition` text DEFAULT NULL,
  `gain` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `teacher_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course_name`, `course_price`, `category_id`, `course_des`, `course_url`, `pre_requisition`, `gain`, `created_at`, `updated_at`, `teacher_id`, `user_id`) VALUES
(1, 'Course 1', 100, 1, 'Course One', 'Default.jfif', 'sd', 'sad', NULL, '2024-02-05 10:53:34', 1, 1),
(2, 'Course 2', 500, 1, 'Course Two', 'Default.jfif', 'weq', 'tr', NULL, NULL, 1, 1),
(4, 'SAT', 300, 1, 'hello', '2024X01X01X12X08X23612220231001083656153827_2318787155110616_6392255175880343552_n.jpg', 'Grid 10', 'hello', '2024-01-01 10:08:23', '2024-01-01 10:08:23', 1, NULL),
(6, 'erwe', 200, 1, 'asd', '2024X01X24X11X14X1187535.jpg', 'das', 'asd', '2024-01-24 09:14:11', '2024-01-24 09:14:53', 1, NULL),
(8, 'ls', 400, 6, 'ls', '2024X01X28X10X03X0973864.png', 'dsa', 'dsa', '2024-01-28 08:03:09', '2024-01-28 08:03:09', 1, NULL),
(9, 'dddddd', 1100, 1, 'ddddd', '2024X01X28X10X16X1464223.png', 'sdsdsd', 'sdsdd', '2024-01-28 08:16:14', '2024-01-28 08:16:14', 1, NULL),
(10, 'Course Eleven', 1100, 1, 'Course Eleven', '2024X02X05X12X54X4940013.jpg', 'asd', 'asd', '2024-02-05 10:54:49', '2024-02-05 10:54:49', 10, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `course_prices`
--

CREATE TABLE `course_prices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `duration` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `discount` float NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course_prices`
--

INSERT INTO `course_prices` (`id`, `course_id`, `duration`, `price`, `discount`, `created_at`, `updated_at`) VALUES
(13, 8, '5 days', 500, 50, '2024-01-28', '2024-01-28'),
(14, 8, '6 days', 600, 60, '2024-01-28', '2024-01-28'),
(17, 9, '1 days', 100, 10, '2024-01-28', '2024-01-28'),
(20, 1, '5 days', 500, 5, '2024-02-05', '2024-02-05'),
(21, 1, '4 dayes', 400, 3, '2024-02-05', '2024-02-05'),
(22, 10, '1 days', 23, 22, '2024-02-05', '2024-02-05'),
(23, 10, '1 days', 100, 1, '2024-02-05', '2024-02-05');

-- --------------------------------------------------------

--
-- Table structure for table `diagnostic_exams`
--

CREATE TABLE `diagnostic_exams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `time` varchar(255) NOT NULL,
  `score` int(11) NOT NULL,
  `pass_score` float NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `state` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `diagnostic_exams`
--

INSERT INTO `diagnostic_exams` (`id`, `title`, `description`, `time`, `score`, `pass_score`, `course_id`, `state`, `created_at`, `updated_at`) VALUES
(3, 'sda', 'sad', 'asd', 123, 123, 1, 1, NULL, NULL),
(7, 'ahmed', 'ahmed', '1Hours 1 M', 100, 48, 1, 0, '2024-01-24', '2024-01-24'),
(8, 'ahmed', 'ahmed', '1Hours 1 M', 100, 48, 1, 0, '2024-01-24', '2024-01-24'),
(9, 'sad', 'asd', '2Hours 1 M', 100, 48, 1, 0, '2024-01-24', '2024-01-24'),
(10, 'sad', 'asd', '1Hours 1 M', 100, 48, 1, 0, '2024-01-24', '2024-01-24'),
(12, 'ggggg', 'ggggg', '1Hours 1 M', 100, 48, 1, 0, '2024-02-03', '2024-02-03'),
(13, 'sasasasasasasa', 'sasasa', '1Hours 1 M', 100, 40, 1, 0, '2024-02-15', '2024-02-15');

-- --------------------------------------------------------

--
-- Table structure for table `dia_questions`
--

CREATE TABLE `dia_questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `daiExam_id` bigint(20) UNSIGNED NOT NULL,
  `ques_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dia_questions`
--

INSERT INTO `dia_questions` (`id`, `daiExam_id`, `ques_id`, `created_at`, `updated_at`) VALUES
(9, 10, 18, '2024-01-24', '2024-01-24'),
(10, 10, 19, '2024-01-24', '2024-01-24'),
(13, 12, 18, '2024-02-03', '2024-02-03'),
(14, 12, 19, '2024-02-03', '2024-02-03'),
(15, 12, 20, '2024-02-03', '2024-02-03'),
(16, 13, 1, '2024-02-15', '2024-02-15'),
(17, 13, 18, '2024-02-15', '2024-02-15');

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
(1, '1234', '2023-12-26', '2023-12-26'),
(2, '234', '2024-01-24', '2024-01-24');

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
(1, '1', 20, '2023-12-25', '2023-12-25'),
(2, '2', 21, '2023-12-25', '2023-12-25'),
(4, '7', 1, '2024-01-29', '2024-01-29');

-- --------------------------------------------------------

--
-- Table structure for table `group_days`
--

CREATE TABLE `group_days` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `day` enum('Sat','Sun','Mon','Tues','Wed','Thurs','Fri') NOT NULL,
  `from` time NOT NULL,
  `to` time NOT NULL,
  `group_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `group_days`
--

INSERT INTO `group_days` (`id`, `day`, `from`, `to`, `group_id`, `created_at`, `updated_at`) VALUES
(7, 'Sat', '10:16:00', '00:17:00', 3, '2024-01-14', '2024-01-14'),
(22, 'Sat', '11:59:00', '11:59:00', 5, '2024-01-27', '2024-01-27'),
(23, 'Sat', '00:59:00', '11:59:00', 5, '2024-01-27', '2024-01-27'),
(26, 'Sun', '13:59:00', '13:59:00', 6, '2024-02-04', '2024-02-04'),
(27, 'Sat', '13:58:00', '13:58:00', 6, '2024-02-04', '2024-02-04'),
(36, 'Sat', '10:44:21', '12:45:21', 1, '2024-02-13', '2024-02-13'),
(37, 'Sat', '10:44:21', '12:45:21', 1, '2024-02-13', '2024-02-13'),
(38, 'Sun', '10:44:21', '12:45:21', 1, '2024-02-13', '2024-02-13');

-- --------------------------------------------------------

--
-- Table structure for table `group_students`
--

CREATE TABLE `group_students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `group_id` bigint(20) UNSIGNED NOT NULL,
  `stu_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `group_students`
--

INSERT INTO `group_students` (`id`, `group_id`, `stu_id`, `created_at`, `updated_at`) VALUES
(1, 1, 5, '0000-00-00', '0000-00-00'),
(2, 1, 7, '0000-00-00', '0000-00-00');

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
  `lesson_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `idea_lessons`
--

INSERT INTO `idea_lessons` (`id`, `idea`, `syllabus`, `idea_order`, `pdf`, `v_link`, `lesson_id`, `created_at`, `updated_at`) VALUES
(4, 'nm', 'ljk', 1, '2024V01V04V08V47V2320231001083656153827_2318787155110616_6392255175880343552_n.jpg', 'https://www.youtube.com/embed/v69praWH6cs?si=3ntnEewNZm5NcrFp', 7, '2024-01-04', '2024-01-04'),
(5, 'nm', 'ljk', 12, '2024V01V30V12V17V174.png', 'https://www.youtube.com/embed/v69praWH6cs?si=3ntnEewNZm5NcrFp', 8, '2024-01-30', '2024-01-30'),
(6, '12', '12', 12, '2024V02V01V12V33V049.jpg', 'https://www.youtube.com/watch?v=v69praWH6cs', 12, '2024-02-01', '2024-02-01'),
(7, '21', '21', 21, '2024V02V01V12V33V049.jpg', 'https://www.youtube.com/watch?v=v69praWH6cs', 13, '2024-02-01', '2024-02-01'),
(8, NULL, '12', 12, '2024V02V01V13V04V194.png', 'https://www.youtube.com/watch?v=v69praWH6cs', 16, '2024-02-01', '2024-02-01'),
(9, NULL, NULL, NULL, '2024V02V01V13V08V44', 'https://www.youtube.com/watch?v=v69praWH6cs', 17, '2024-02-01', '2024-02-01'),
(32, 'nm123', 'ljk', 1, '2024V02V13V11V54V47', 'https://www.youtube.com/embed/v69praWH6cs?si=3ntnEewNZm5NcrFp', 4, '2024-02-13', '2024-02-13'),
(33, 'sadsad', 'dasdas', 12, '2024V02V13V11V54V47', 'h', 4, '2024-02-13', '2024-02-13'),
(34, 'nm', 'ljk', 1, '2024V02V13V11V54V47', 'https://www.youtube.com/embed/v69praWH6cs?si=3ntnEewNZm5NcrFp', 4, '2024-02-13', '2024-02-13');

-- --------------------------------------------------------

--
-- Table structure for table `lessons`
--

CREATE TABLE `lessons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lesson_name` varchar(191) NOT NULL,
  `chapter_id` bigint(20) UNSIGNED NOT NULL,
  `teacher_id` bigint(20) UNSIGNED NOT NULL,
  `lesson_des` varchar(191) NOT NULL,
  `lesson_url` varchar(191) DEFAULT NULL,
  `pre_requisition` text DEFAULT NULL,
  `gain` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lessons`
--

INSERT INTO `lessons` (`id`, `lesson_name`, `chapter_id`, `teacher_id`, `lesson_des`, `lesson_url`, `pre_requisition`, `gain`, `created_at`, `updated_at`) VALUES
(4, 'Lesson 1', 4, 5, 'fg', '5692024X02X01X16X46X574.jpg', 'jhf', 'g', '2024-01-02 07:48:20', '2024-02-13 09:54:47'),
(5, 'Lesson 1', 4, 5, 'fg', NULL, 'jhf', 'g', '2024-01-02 07:48:59', '2024-01-02 07:48:59'),
(6, 'Lesson 1', 4, 5, 'fg', NULL, 'jhf', 'g', '2024-01-02 07:49:37', '2024-01-02 07:49:37'),
(7, 'Lesson 1', 4, 5, 'fg', NULL, 'jhf', 'g', '2024-01-02 07:50:20', '2024-01-02 07:50:20'),
(8, 'Lesson 1', 4, 5, 'fg', NULL, 'jhf', 'g', '2024-01-02 07:50:36', '2024-01-02 07:50:36'),
(12, 'Lesson 26', 4, 5, 'fdfhg', NULL, 'jfggj', 'fgjfgh', '2024-01-30 10:15:21', '2024-01-30 10:15:21'),
(13, 'Lesson 26', 4, 5, 'fdfhg', NULL, 'jfggj', 'fgjfgh', '2024-01-30 10:17:17', '2024-01-30 10:17:17'),
(14, 'sss', 5, 5, 'dddd', NULL, 'sdsd', 'sdds', '2024-02-01 10:31:46', '2024-02-01 10:31:46'),
(15, 'sss', 4, 7, 'dddd', NULL, 'sdsd', 'sdds', '2024-02-01 10:33:04', '2024-02-01 10:33:04'),
(16, 'dd', 4, 44, 'dsds', NULL, 'cc', 'cd', '2024-02-01 11:04:19', '2024-02-01 11:04:19'),
(17, 'sd', 5, 5, 'sd', NULL, 'sd', 'sdsd', '2024-02-01 11:08:44', '2024-02-01 11:08:44'),
(18, 'Lesson 22', 4, 5, 'das', '3662024X02X05X12X57X434.png', 'sfd', 'assd', '2024-02-05 10:57:43', '2024-02-05 10:57:43');

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
(1, 'answer 1', 'A', 18, '2023-12-25', '2023-12-25'),
(2, 'answer 2', 'A', 18, '2023-12-25', '2023-12-25'),
(3, 'answer 3', 'A', 18, '2023-12-25', '2023-12-25'),
(4, 'answer 4', 'A', 18, '2023-12-25', '2023-12-25'),
(8, '1', 'A', 19, '2023-12-26', '2023-12-26'),
(9, '2', 'A', 19, '2023-12-26', '2023-12-26'),
(10, '3', 'A', 19, '2023-12-26', '2023-12-26'),
(11, '4', 'A', 19, '2023-12-26', '2023-12-26'),
(16, NULL, 'A', 20, '2024-01-24', '2024-01-24'),
(17, NULL, 'A', 20, '2024-01-24', '2024-01-24'),
(18, NULL, 'A', 20, '2024-01-24', '2024-01-24'),
(19, NULL, 'A', 20, '2024-01-24', '2024-01-24'),
(20, NULL, 'A', 21, '2024-01-24', '2024-01-24'),
(21, NULL, 'A', 21, '2024-01-24', '2024-01-24'),
(22, NULL, 'A', 21, '2024-01-24', '2024-01-24'),
(23, NULL, 'A', 21, '2024-01-24', '2024-01-24'),
(56, 'fg', 'A', 1, '2024-01-29', '2024-01-29'),
(57, 'fg', 'A', 1, '2024-01-29', '2024-01-29'),
(58, 'fg', 'A', 1, '2024-01-29', '2024-01-29'),
(59, 'fg', 'A', 1, '2024-01-29', '2024-01-29'),
(60, 'fg', 'A', 1, '2024-01-29', '2024-01-29'),
(61, 'fg', 'A', 1, '2024-01-29', '2024-01-29'),
(62, 'fg', 'A', 1, '2024-01-29', '2024-01-29'),
(63, 'fg', 'A', 1, '2024-01-29', '2024-01-29'),
(64, 'fg', 'A', 1, '2024-01-29', '2024-01-29'),
(65, 'fg', 'A', 1, '2024-01-29', '2024-01-29'),
(66, 'fg', 'A', 1, '2024-01-29', '2024-01-29'),
(67, 'fg', 'A', 1, '2024-01-29', '2024-01-29'),
(68, 'fg', 'A', 1, '2024-01-29', '2024-01-29'),
(69, 'fg', 'A', 1, '2024-01-29', '2024-01-29'),
(70, 'fg', 'A', 1, '2024-01-29', '2024-01-29'),
(71, 'fg', 'A', 1, '2024-01-29', '2024-01-29'),
(72, 'fg', 'A', 1, '2024-01-29', '2024-01-29'),
(73, 'fg', 'A', 1, '2024-01-29', '2024-01-29'),
(74, 'fg', 'A', 1, '2024-01-29', '2024-01-29'),
(75, 'fg', 'A', 1, '2024-01-29', '2024-01-29'),
(76, 'fg', 'A', 1, '2024-01-29', '2024-01-29'),
(77, 'sa', 'A', 1, '2024-01-29', '2024-01-29'),
(78, 'fg', 'A', 1, '2024-01-29', '2024-01-29'),
(79, 'sa', 'A', 1, '2024-01-29', '2024-01-29'),
(80, 'fg', 'A', 1, '2024-01-29', '2024-01-29'),
(81, 'sa', 'A', 1, '2024-01-29', '2024-01-29'),
(82, 'fg', 'A', 1, '2024-01-29', '2024-01-29'),
(83, 'sa', 'A', 1, '2024-01-29', '2024-01-29'),
(84, 'c', 'C', 19, '2024-01-29', '2024-01-29'),
(85, 'cc', 'C', 19, '2024-01-29', '2024-01-29'),
(86, 'ccc', 'C', 19, '2024-01-29', '2024-01-29'),
(87, 'cccc', 'C', 19, '2024-01-29', '2024-01-29'),
(92, NULL, 'A', 18, '2024-02-03', '2024-02-03'),
(93, NULL, 'A', 18, '2024-02-03', '2024-02-03'),
(94, NULL, 'A', 18, '2024-02-03', '2024-02-03'),
(95, NULL, 'A', 18, '2024-02-03', '2024-02-03');

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
-- Table structure for table `payment_method`
--

CREATE TABLE `payment_method` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `payment` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `statue` tinyint(1) DEFAULT 0,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `payment_method`
--

INSERT INTO `payment_method` (`id`, `payment`, `description`, `logo`, `statue`, `created_at`, `updated_at`) VALUES
(2, 'Visa', 'Number 1', '2024X02X05X13X13X2774644.png', 1, '2024-01-07', '2024-02-12'),
(4, 'pay 1', 'Number 2', '2024X01X27X09X01X1410931.jpg', 1, '2024-01-27', '2024-01-27'),
(5, 'Visa', NULL, '2024X02X05X13X14X0069575.png', 1, '2024-02-05', '2024-02-05'),
(7, 'pay 1', NULL, '2024X02X12X10X01X511491202301101725mvf_dark_logo.png', 1, '2024-02-12', '2024-02-12');

-- --------------------------------------------------------

--
-- Table structure for table `payment_orders`
--

CREATE TABLE `payment_orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `payment_request_id` bigint(20) UNSIGNED NOT NULL,
  `chapter_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment_orders`
--

INSERT INTO `payment_orders` (`id`, `payment_request_id`, `chapter_id`, `created_at`, `updated_at`) VALUES
(1, 1, 4, NULL, NULL),
(2, 4, 7, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `payment_requests`
--

CREATE TABLE `payment_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `payment_method_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `price` float UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `state` enum('Pendding','Approve','Rejected') NOT NULL DEFAULT 'Pendding',
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment_requests`
--

INSERT INTO `payment_requests` (`id`, `payment_method_id`, `user_id`, `price`, `image`, `state`, `created_at`, `updated_at`) VALUES
(1, 2, 8, 800, NULL, 'Approve', NULL, '2024-01-28'),
(2, 2, 11, 300, NULL, 'Approve', NULL, '2024-01-28'),
(3, 4, 8, 100, '2024X01X28X12X04X3729854.jpg', 'Pendding', '2024-01-28', '2024-01-28'),
(4, 4, 8, 100, '2024X01X28X12X05X4260874.jpg', 'Pendding', '2024-01-28', '2024-01-28'),
(5, 4, 8, 400, '2024X01X29X09X58X1436634.png', 'Pendding', '2024-01-29', '2024-01-29'),
(6, 4, 8, 100, NULL, 'Pendding', '2024-01-29', '2024-01-29'),
(7, 2, 8, 300, NULL, 'Pendding', '2024-01-29', '2024-01-29'),
(8, 2, 8, 300, '2024X01X29X12X52X3733564.png', 'Pendding', '2024-01-29', '2024-01-29'),
(9, 2, 8, 300, '2024X01X29X12X54X484494.png', 'Pendding', '2024-01-29', '2024-01-29'),
(10, 2, 8, 300, '2024X01X29X12X55X4948744.png', 'Pendding', '2024-01-29', '2024-01-29'),
(11, 2, 8, 300, '2024X01X29X12X57X4189054.png', 'Pendding', '2024-01-29', '2024-01-29'),
(12, 2, 8, 300, '2024X01X29X12X58X0850554.png', 'Pendding', '2024-01-29', '2024-01-29'),
(13, 2, 8, 300, '2024X01X29X12X58X1712044.png', 'Pendding', '2024-01-29', '2024-01-29'),
(14, 2, 8, 300, '2024X01X29X12X58X5794914.png', 'Pendding', '2024-01-29', '2024-01-29'),
(15, 2, 8, 300, '2024X01X29X13X00X1860184.png', 'Pendding', '2024-01-29', '2024-01-29'),
(16, 2, 8, 300, '2024X01X29X13X00X5675254.png', 'Pendding', '2024-01-29', '2024-01-29'),
(17, 2, 8, 300, '2024X01X29X13X01X5242194.png', 'Pendding', '2024-01-29', '2024-01-29'),
(18, 2, 8, 300, '2024X01X29X13X02X1810384.png', 'Pendding', '2024-01-29', '2024-01-29'),
(19, 2, 8, 300, '2024X01X29X13X02X5990354.png', 'Pendding', '2024-01-29', '2024-01-29'),
(20, 2, 8, 300, '2024X01X29X13X03X2076884.png', 'Pendding', '2024-01-29', '2024-01-29'),
(21, 2, 8, 300, '2024X01X29X13X08X2777064.png', 'Pendding', '2024-01-29', '2024-01-29'),
(22, 2, 8, 300, '2024X01X29X13X09X1285114.png', 'Pendding', '2024-01-29', '2024-01-29'),
(23, 2, 8, 300, '2024X01X29X13X10X1715834.png', 'Pendding', '2024-01-29', '2024-01-29'),
(24, 2, 8, 300, '2024X01X29X13X10X4853924.png', 'Pendding', '2024-01-29', '2024-01-29'),
(25, 2, 8, 300, '2024X01X29X13X11X1448174.png', 'Pendding', '2024-01-29', '2024-01-29'),
(26, 4, 8, 300, '2024X01X30X07X26X4649074.png', 'Rejected', '2024-01-30', '2024-02-05'),
(27, 5, 8, 350, NULL, 'Pendding', '2024-02-12', '2024-02-12'),
(28, 7, 8, 100, '2024X02X12X12X51X237693202301101726mvf_dark_logo.png', 'Pendding', '2024-02-12', '2024-02-12'),
(29, 5, 8, 100, '2024X02X12X13X15X199673202301101725mvf_dark_logo.png', 'Pendding', '2024-02-12', '2024-02-12'),
(30, 7, 8, 550, '2024X02X13X12X59X048766202301101726mvf_dark_logo.png', 'Rejected', '2024-02-13', '2024-02-13');

-- --------------------------------------------------------

--
-- Table structure for table `payouts`
--

CREATE TABLE `payouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `affilate_id` bigint(20) UNSIGNED NOT NULL,
  `amount` float NOT NULL,
  `payment_method` bigint(20) UNSIGNED DEFAULT NULL,
  `statue` enum('pendding','approve','rejected') NOT NULL DEFAULT 'pendding',
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `payouts`
--

INSERT INTO `payouts` (`id`, `date`, `affilate_id`, `amount`, `payment_method`, `statue`, `created_at`, `updated_at`) VALUES
(1, '2024-01-16', 1, 200, 2, 'approve', NULL, '2024-01-27');

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
(71, 'App\\Models\\User', 8, 'user', 'd8c5dbf7418bc6e906c4725167b00f5848ffdd4fadf004454648695fac659336', '[\"*\"]', NULL, NULL, '2024-01-03 05:53:57', '2024-01-03 05:53:57'),
(72, 'App\\Models\\User', 59, 'user', 'ce05c06e8a2b40099b2b733f3018fa7790c0366688631259d9adf4d6bd0caff0', '[\"*\"]', NULL, NULL, '2024-01-03 07:52:53', '2024-01-03 07:52:53'),
(73, 'App\\Models\\User', 8, 'user', 'b4cc2c592c366801e97c7fb221e515f5698511b644ed3f4209999ab20f9ab606', '[\"*\"]', NULL, NULL, '2024-01-03 09:14:20', '2024-01-03 09:14:20'),
(74, 'App\\Models\\User', 8, 'user', 'a72a08d961af7d59769dfc0f2b5dadf7ba7348bb3f6c02560226c555ab392866', '[\"*\"]', NULL, NULL, '2024-01-03 10:23:40', '2024-01-03 10:23:40'),
(75, 'App\\Models\\User', 8, 'user', '3eeb6f1cba20dfe5db7b890a1f2c9a68bcb3f1bff0e0fc9a7acba9b15209de39', '[\"*\"]', NULL, NULL, '2024-01-03 11:59:25', '2024-01-03 11:59:25'),
(76, 'App\\Models\\User', 8, 'user', '9bc1c4d5c1631a84b825c72223eea9b8fdcd6f8cd09fb27c97343bfddd641dfb', '[\"*\"]', NULL, NULL, '2024-01-04 05:15:24', '2024-01-04 05:15:24'),
(77, 'App\\Models\\User', 8, 'user', 'd7296ed9f9e78834772777b050cd225dd757dee125951521d4890ab5a71d1de0', '[\"*\"]', NULL, NULL, '2024-01-04 06:28:22', '2024-01-04 06:28:22'),
(78, 'App\\Models\\User', 8, 'user', '92076edb48757fca6c7fadaaf27728a4217c614f6a4f39b443eb913f7c1fe969', '[\"*\"]', NULL, NULL, '2024-01-04 06:55:25', '2024-01-04 06:55:25'),
(79, 'App\\Models\\User', 8, 'user', '1a70a7c645573cc4916ae9b9ac78c8961234ab6c3cc8c6754981a1205714de64', '[\"*\"]', NULL, NULL, '2024-01-04 07:10:57', '2024-01-04 07:10:57'),
(80, 'App\\Models\\User', 8, 'user', 'b8e00280da3240adece1c3c6ad264b374ebac01e1fd509b7fbc8d7239dab630b', '[\"*\"]', NULL, NULL, '2024-01-07 05:57:11', '2024-01-07 05:57:11'),
(81, 'App\\Models\\User', 8, 'user', 'a0848ebbd4273d7065cd3f70a41533d307f1aa534ea85c942c17d5c0c1f53576', '[\"*\"]', NULL, NULL, '2024-01-07 09:14:34', '2024-01-07 09:14:34'),
(82, 'App\\Models\\User', 8, 'user', '430724e62921c13659f73275a1bce37d854066144ffc3d3d8e926f92c0062020', '[\"*\"]', NULL, NULL, '2024-01-08 05:24:23', '2024-01-08 05:24:23'),
(83, 'App\\Models\\User', 8, 'user', 'd6632945fbaf153776c6417a3b477a454debd8cec6301f10d88bc8fe26e688b3', '[\"*\"]', NULL, NULL, '2024-01-10 07:17:40', '2024-01-10 07:17:40'),
(84, 'App\\Models\\User', 8, 'user', '5ba3fa08446f7bc39cc46d09e66f679f6bee57d3bee7ba70125dca65864ba70c', '[\"*\"]', NULL, NULL, '2024-01-10 15:06:34', '2024-01-10 15:06:34'),
(85, 'App\\Models\\User', 8, 'user', 'a10327119e72251f73a5aad56fe379feb30332aa4bc8895f3c94323c8decb493', '[\"*\"]', NULL, NULL, '2024-01-11 07:59:46', '2024-01-11 07:59:46'),
(86, 'App\\Models\\User', 8, 'user', '9a0ea9f880feeaf7097ba69fcac065817a258066cb9e9de21e07229248c689b6', '[\"*\"]', NULL, NULL, '2024-01-14 05:25:18', '2024-01-14 05:25:18'),
(87, 'App\\Models\\User', 8, 'user', '8312c52e1ab165eae4947f6fbe2fe5ac6419b0f95fd248cf36e88e7e2a8f4105', '[\"*\"]', NULL, NULL, '2024-01-15 05:12:47', '2024-01-15 05:12:47'),
(88, 'App\\Models\\User', 8, 'user', '6d6174775c1ba507a804871c7169e7178e0489a2d2a349f6cbf1cd5764270dda', '[\"*\"]', NULL, NULL, '2024-01-15 06:52:19', '2024-01-15 06:52:19'),
(89, 'App\\Models\\User', 8, 'user', 'e077d7f8f24adef939f32dae60d5f506336088a713d68a1278b2743ea29a834b', '[\"*\"]', NULL, NULL, '2024-01-16 05:17:21', '2024-01-16 05:17:21'),
(90, 'App\\Models\\User', 8, 'user', 'd8f1b93ec698f0c0908abe7f23e84bd96d8b209dff4bbcab2079582353063daa', '[\"*\"]', NULL, NULL, '2024-01-16 11:57:24', '2024-01-16 11:57:24'),
(91, 'App\\Models\\User', 8, 'user', 'f25270b50ea191c0aea8c050323b33c351b882a9cf68f2480534aeb8a4fb5c45', '[\"*\"]', NULL, NULL, '2024-01-16 11:58:06', '2024-01-16 11:58:06'),
(92, 'App\\Models\\User', 8, 'user', '1017ea0358e7d244add5b93b452dce2871cf20455caa12edb4e7130bc28927d3', '[\"*\"]', NULL, NULL, '2024-01-16 11:58:51', '2024-01-16 11:58:51'),
(93, 'App\\Models\\User', 8, 'user', '30913192f3746a4b420ec1dea346385cc187a160434eefe1fd748f4eefcc7ef9', '[\"*\"]', NULL, NULL, '2024-01-17 05:35:20', '2024-01-17 05:35:20'),
(94, 'App\\Models\\User', 8, 'user', 'db610ec924ed595aa48fcce2428e268acd503c46e6c20dec60f3e1425d70cd25', '[\"*\"]', NULL, NULL, '2024-01-18 06:43:37', '2024-01-18 06:43:37'),
(95, 'App\\Models\\User', 8, 'user', '14f3b56d5a72ce09f8aa0d6e0ccb4e800596dfaab39d4d27b3e00f69173d536c', '[\"*\"]', NULL, NULL, '2024-01-20 10:13:39', '2024-01-20 10:13:39'),
(96, 'App\\Models\\User', 8, 'user', '4bbc7145e8df3c737b2d5d5bdcc903c53255062d9fc61019b6dd7793881df658', '[\"*\"]', NULL, NULL, '2024-01-21 06:06:01', '2024-01-21 06:06:01'),
(97, 'App\\Models\\User', 8, 'user', 'bbd198e6383ac8bda5306fa26aaf96b5fe00f62650699a7c5558185b2367e713', '[\"*\"]', NULL, NULL, '2024-01-22 05:43:34', '2024-01-22 05:43:34'),
(98, 'App\\Models\\User', 8, 'user', '282d2f788fd1fb3839f78a06fdc2cc2e07fc4efe6ba7e87256f66226805885c7', '[\"*\"]', NULL, NULL, '2024-01-22 06:45:48', '2024-01-22 06:45:48'),
(99, 'App\\Models\\User', 8, 'user', 'bf9e20f580afff475dc1414ce7e781b6da06d50f5a0f8d63336bd0e3b2945809', '[\"*\"]', NULL, NULL, '2024-01-22 06:55:19', '2024-01-22 06:55:19'),
(100, 'App\\Models\\User', 8, 'user', 'b537fa34fa054f10be62fc02b6a5101cefa35bc56cf9b165e625a51e0fb76197', '[\"*\"]', NULL, NULL, '2024-01-22 06:56:49', '2024-01-22 06:56:49'),
(101, 'App\\Models\\User', 8, 'user', 'b4cabf6328aa212934e771f76e871b643ca350fa9c4cfcb151e30226aa782b98', '[\"*\"]', NULL, NULL, '2024-01-22 06:59:52', '2024-01-22 06:59:52'),
(102, 'App\\Models\\User', 8, 'user', '46609381546877b58273ddaba8b57cce0f51b623da363e8683d5a89d88ceb2f9', '[\"*\"]', NULL, NULL, '2024-01-22 07:06:45', '2024-01-22 07:06:45'),
(103, 'App\\Models\\User', 8, 'user', '10ef0d453873ce17b0ade56184666dce09479c7d1b67ceb28e91f99a41aaf2c1', '[\"*\"]', NULL, NULL, '2024-01-22 07:18:42', '2024-01-22 07:18:42'),
(104, 'App\\Models\\User', 8, 'user', 'a0b63200a88bd4402eeb242546ad279d74601b8ccf48c097a168c2e5fa12bf8e', '[\"*\"]', NULL, NULL, '2024-01-22 07:21:19', '2024-01-22 07:21:19'),
(105, 'App\\Models\\User', 8, 'user', '1580dbc88f4ae6ebe11d3563155785f689324fbb2b2026b528b86cb6c1a7f8eb', '[\"*\"]', NULL, NULL, '2024-01-22 07:38:46', '2024-01-22 07:38:46'),
(106, 'App\\Models\\User', 8, 'user', '071305102b4f9f919960741cdd5edbb83573597b36e210e0b720dc1b1f3fff57', '[\"*\"]', NULL, NULL, '2024-01-22 07:50:42', '2024-01-22 07:50:42'),
(107, 'App\\Models\\User', 8, 'user', '1f96474cd50c8882b4c1e723bc520045520ea81f6382f06f2876d60b24e4c8ca', '[\"*\"]', NULL, NULL, '2024-01-22 10:03:07', '2024-01-22 10:03:07'),
(108, 'App\\Models\\User', 8, 'user', '81d2ec2a189cb27d90d8d6382d7555c2a7aca84f7a6e29d84ec606075cdf09b4', '[\"*\"]', NULL, NULL, '2024-01-22 10:05:36', '2024-01-22 10:05:36'),
(109, 'App\\Models\\User', 8, 'user', '63519d00e8edc4eb7be753d6dc91f9379174e3a5c65bae4d92dcb8ce2ee3e4aa', '[\"*\"]', NULL, NULL, '2024-01-22 10:52:02', '2024-01-22 10:52:02'),
(110, 'App\\Models\\User', 8, 'user', '7b4dddae813c2eec8176e35fa8a1d78fe175448137ab4b4f5d47ea12180347a9', '[\"*\"]', NULL, NULL, '2024-01-22 11:01:04', '2024-01-22 11:01:04'),
(111, 'App\\Models\\User', 8, 'user', 'fd02dc705bc6228bc9b5955972ac18cd891a9c0218399214b3a4c7b0025ad5cb', '[\"*\"]', NULL, NULL, '2024-01-23 05:30:06', '2024-01-23 05:30:06'),
(112, 'App\\Models\\User', 8, 'user', 'b334310d94eb36135a349a2af383f8e3ba1755802c72ebba92c408502a8dfb35', '[\"*\"]', NULL, NULL, '2024-01-24 05:28:48', '2024-01-24 05:28:48'),
(113, 'App\\Models\\User', 8, 'user', 'c809d89d0924c22985ce2ef3d4a5332ce1061d0349f66fcf93a293284838e69a', '[\"*\"]', NULL, NULL, '2024-01-24 09:26:07', '2024-01-24 09:26:07'),
(114, 'App\\Models\\User', 8, 'user', '021e709d20e7c96425e0136b0e3de152a4d2d4a2ce3e70d213b6f7b5dfd15f49', '[\"*\"]', NULL, NULL, '2024-01-24 09:27:28', '2024-01-24 09:27:28'),
(115, 'App\\Models\\User', 8, 'user', '9346193306542cb65911864afc5967b71ca74e12283c190b3b2993e7854233e8', '[\"*\"]', NULL, NULL, '2024-01-27 05:56:30', '2024-01-27 05:56:30'),
(116, 'App\\Models\\User', 8, 'user', '6137960b8867d05485978ab983845b4791365444c1f7e64bd6d25bba5f29411f', '[\"*\"]', NULL, NULL, '2024-01-28 05:33:52', '2024-01-28 05:33:52'),
(117, 'App\\Models\\User', 8, 'user', '268d5f344adf4f227fa89b65449bc19c16c1836c94a65649e603a6a7ff3bf35c', '[\"*\"]', NULL, NULL, '2024-01-28 10:26:47', '2024-01-28 10:26:47'),
(118, 'App\\Models\\User', 8, 'user', '94ea4474d25fa62743e36c7e1e52c737152d60403dde003d7022b7ee419457e6', '[\"*\"]', NULL, NULL, '2024-01-29 05:33:37', '2024-01-29 05:33:37'),
(119, 'App\\Models\\User', 8, 'user', 'aabb55df601a1959a35512a03c3f7061c5f0b54c0f96f9a95507d8d2ccb2cb74', '[\"*\"]', NULL, NULL, '2024-01-29 06:05:38', '2024-01-29 06:05:38'),
(120, 'App\\Models\\User', 8, 'user', '1c839226ae414356066bec5ebe40c01f5a6b0d5202e8a57a5bd201948f276564', '[\"*\"]', NULL, NULL, '2024-01-29 08:02:20', '2024-01-29 08:02:20'),
(121, 'App\\Models\\User', 8, 'user', '189e0a956d08ba0f16282bd578bfb67bfbea7b3e6891d5121dc86be4aa5f5c35', '[\"*\"]', NULL, NULL, '2024-01-29 12:06:35', '2024-01-29 12:06:35'),
(122, 'App\\Models\\User', 8, 'user', '4d9c7cb5e180613abc78f40554f2559de776b7a4577fa7151503fa7842510283', '[\"*\"]', NULL, NULL, '2024-01-30 05:17:30', '2024-01-30 05:17:30'),
(123, 'App\\Models\\User', 8, 'user', '7c60cfb7eb4837260a007be5c6d264e500a629ac17d2b681beef5d0374114bf9', '[\"*\"]', NULL, NULL, '2024-01-30 11:18:04', '2024-01-30 11:18:04'),
(124, 'App\\Models\\User', 8, 'user', 'b19c450de51786a92b0382acca909feb31fb62e13c295f57c335f1220ba46340', '[\"*\"]', NULL, NULL, '2024-01-31 10:01:27', '2024-01-31 10:01:27'),
(125, 'App\\Models\\User', 8, 'user', '11e00976d658790cdcf21386f175d0ff612190e12b50d54ddf2036fd0dc45a79', '[\"*\"]', NULL, NULL, '2024-02-01 10:07:12', '2024-02-01 10:07:12'),
(126, 'App\\Models\\User', 8, 'user', '052b020dee841e1dfc7d1b55f97ad1bcf4b0739c5f6d4d004ffa286cc2efbf2f', '[\"*\"]', NULL, NULL, '2024-02-01 14:27:49', '2024-02-01 14:27:49'),
(127, 'App\\Models\\User', 8, 'user', 'c615bd74e1a688735284e17d4428a2c9034d02133a1d63b3055a7390c600dad9', '[\"*\"]', NULL, NULL, '2024-02-03 05:17:40', '2024-02-03 05:17:40'),
(128, 'App\\Models\\User', 8, 'user', '64f51ac47a6b2c9fe10c8aacace64b4c5c7535f1d62cf3db53e39fc1ad4bf2ce', '[\"*\"]', NULL, NULL, '2024-02-04 03:17:56', '2024-02-04 03:17:56'),
(129, 'App\\Models\\User', 8, 'user', 'fda7ea9b85c5544409abcafa9f7b74127ae9f81449217a1bde755f67dd229fe3', '[\"*\"]', NULL, NULL, '2024-02-04 06:28:38', '2024-02-04 06:28:38'),
(130, 'App\\Models\\User', 8, 'user', '1774a5f48073839bcb706946989b38e3f5eb240473b6a49fcf04113e4fa30665', '[\"*\"]', NULL, NULL, '2024-02-05 05:27:59', '2024-02-05 05:27:59'),
(131, 'App\\Models\\User', 8, 'user', '8bd95cff5c4543ccae3d4c49ee027012ddea90e8663474fa3c8acaac1cb1152e', '[\"*\"]', NULL, NULL, '2024-02-05 11:58:24', '2024-02-05 11:58:24'),
(132, 'App\\Models\\User', 8, 'user', '2430a286c8c4724cba69c0d18654d03dbffc4028a1e516d0fa5be0cd3306459c', '[\"*\"]', NULL, NULL, '2024-02-06 05:43:42', '2024-02-06 05:43:42'),
(133, 'App\\Models\\User', 8, 'user', '2a124db6a4c6835125105b007c26b53d46eb136de771646f67098bb2b0fe1c86', '[\"*\"]', NULL, NULL, '2024-02-06 07:52:48', '2024-02-06 07:52:48'),
(134, 'App\\Models\\User', 8, 'user', '29fe41b359dd96d3fcf6b77d1ab2eb3ded555dea9ad82652a195a72cacac3f0d', '[\"*\"]', NULL, NULL, '2024-02-07 07:59:41', '2024-02-07 07:59:41'),
(135, 'App\\Models\\User', 8, 'user', '1298323e81ee596c771109c9a6c3a23d83219c23dd722a254f1ef5dcea3bb576', '[\"*\"]', NULL, NULL, '2024-02-07 09:51:52', '2024-02-07 09:51:52'),
(136, 'App\\Models\\User', 8, 'user', '4b5c3038aa8cc32596d393565e127e75b8e3f82b10cceef3824b199767f3ac6b', '[\"*\"]', NULL, NULL, '2024-02-08 09:14:45', '2024-02-08 09:14:45'),
(137, 'App\\Models\\User', 8, 'user', '702a6fa97df9ceec6a492e0c28af5224a8ab3c87235bac5cd35abd3c3535141b', '[\"*\"]', NULL, NULL, '2024-02-08 09:21:52', '2024-02-08 09:21:52'),
(138, 'App\\Models\\User', 8, 'user', '1c1e556d6187fa2e9474cd516651249c54a6de88a794f5016a4ab6cc8982c09a', '[\"*\"]', NULL, NULL, '2024-02-08 10:29:38', '2024-02-08 10:29:38'),
(139, 'App\\Models\\User', 8, 'user', '5c9c487bf205872a65692970458a5f91ffddd3c734436ea496a46c3b01ffa375', '[\"*\"]', NULL, NULL, '2024-02-08 13:13:00', '2024-02-08 13:13:00'),
(140, 'App\\Models\\User', 8, 'user', '1a255ceed2c2bdd7200c997c52c07b62bb95e1fbff9d3461a2f17d5e959feb8b', '[\"*\"]', NULL, NULL, '2024-02-08 13:13:13', '2024-02-08 13:13:13'),
(141, 'App\\Models\\User', 8, 'user', '705843cda2213a41565324267fa8c4b9e46b4ea8f6eaa6f3f486a52308ff2817', '[\"*\"]', NULL, NULL, '2024-02-10 05:09:23', '2024-02-10 05:09:23'),
(142, 'App\\Models\\User', 8, 'user', '032bec8fb9cc9d7ba619bd55efd1702cf29e454d289e81bbe3ce39b4096c66af', '[\"*\"]', NULL, NULL, '2024-02-10 05:09:35', '2024-02-10 05:09:35'),
(143, 'App\\Models\\User', 8, 'user', '8b7aaa61c0dc1558bbe8dcf9094665a7939d3a6041effec300c17d23b360f775', '[\"*\"]', NULL, NULL, '2024-02-10 10:47:20', '2024-02-10 10:47:20'),
(144, 'App\\Models\\User', 8, 'user', '8e421d36c6d6acaa9c5e2b6b0f23156acafa4faaee08b8b887507b8b0ba58686', '[\"*\"]', NULL, NULL, '2024-02-11 05:19:16', '2024-02-11 05:19:16'),
(145, 'App\\Models\\User', 8, 'user', 'c3e473b0fc7c6d75f5ada7243cbe97d59e7bfad59e343f34959f2505b939578e', '[\"*\"]', NULL, NULL, '2024-02-11 05:55:37', '2024-02-11 05:55:37'),
(146, 'App\\Models\\User', 8, 'user', '753fda8acf59e75f33a4983cb9d0ff62ad6c7b8547eaf6ae049d2fde27fe7b71', '[\"*\"]', NULL, NULL, '2024-02-11 05:57:24', '2024-02-11 05:57:24'),
(147, 'App\\Models\\User', 8, 'user', 'c6d930c5e47555d6f5e75af6c1d24faa72bcb0aea8977f85dcb6154254544672', '[\"*\"]', NULL, NULL, '2024-02-11 05:58:35', '2024-02-11 05:58:35'),
(148, 'App\\Models\\User', 8, 'user', '56cc04ae1bee56e2af50a5ccb5a5608d15a12ed0bad9b0cb9c3ef5d22185237a', '[\"*\"]', NULL, NULL, '2024-02-11 08:13:33', '2024-02-11 08:13:33'),
(149, 'App\\Models\\User', 8, 'user', '97e398bc2e5185f9f302e4afb824d6799c1fa521a72e07904bf3d3fb86eb30e1', '[\"*\"]', NULL, NULL, '2024-02-11 11:19:05', '2024-02-11 11:19:05'),
(150, 'App\\Models\\User', 8, 'user', '27c00f5da5e9a9a191457a0ecc7d408afa96583bb72a140edc5f77fade3a3a5e', '[\"*\"]', NULL, NULL, '2024-02-11 11:19:15', '2024-02-11 11:19:15'),
(151, 'App\\Models\\User', 8, 'user', 'd73221999a73262331db1795d29ec372c29f50192d898698e4163860d2adca01', '[\"*\"]', NULL, NULL, '2024-02-11 11:19:36', '2024-02-11 11:19:36'),
(152, 'App\\Models\\User', 8, 'user', '7f260665111890bca3b1c3ae831566911e5c3a2590412459e678c1e2c3d8fd2e', '[\"*\"]', NULL, NULL, '2024-02-11 11:20:08', '2024-02-11 11:20:08'),
(153, 'App\\Models\\User', 8, 'user', 'ffbe68bf28164968eafd042f394db9f9a545ffa57c36d4aad172f47d1926f00a', '[\"*\"]', NULL, NULL, '2024-02-11 11:20:35', '2024-02-11 11:20:35'),
(154, 'App\\Models\\User', 8, 'user', '1310866eb804ece4d293b3cd5c32ad1d6afb5ab72e88804a2857de7699d8a047', '[\"*\"]', NULL, NULL, '2024-02-11 11:20:47', '2024-02-11 11:20:47'),
(155, 'App\\Models\\User', 8, 'user', 'c17ca40c427b68c32075e32448d995d4bfe7ef9c9fb4ccf860f2c4d212cd89a8', '[\"*\"]', NULL, NULL, '2024-02-11 12:06:57', '2024-02-11 12:06:57'),
(156, 'App\\Models\\User', 8, 'user', 'b629b86eb2dca6446fdd9a8885cf7dad6f7f99afb9330d7e362aedd6ec7f56ce', '[\"*\"]', NULL, NULL, '2024-02-12 06:12:26', '2024-02-12 06:12:26'),
(157, 'App\\Models\\User', 8, 'user', 'b16852f82a0cebcff91da1bfd07cfcfac2f52dcc467bd1315871ec993a37a826', '[\"*\"]', NULL, NULL, '2024-02-12 06:12:47', '2024-02-12 06:12:47'),
(158, 'App\\Models\\User', 8, 'user', '128941571ba63c8e832a02eeb77d538668eccea959336a8d443f8b1c97b4a25a', '[\"*\"]', NULL, NULL, '2024-02-12 06:25:10', '2024-02-12 06:25:10'),
(159, 'App\\Models\\User', 8, 'user', '237c987265ffb5d810a56b0d56132b91f5c394f0103f8b2790528af4cb4ba2d4', '[\"*\"]', NULL, NULL, '2024-02-12 06:55:34', '2024-02-12 06:55:34'),
(160, 'App\\Models\\User', 8, 'user', '495629b5d2b744cf11fd7c963e49df4f3048f3bdb2e1a1a54df7081c2e330525', '[\"*\"]', NULL, NULL, '2024-02-12 06:58:46', '2024-02-12 06:58:46'),
(161, 'App\\Models\\User', 8, 'user', '421a01bd4ac2181d66f2ce4f730a03ddb72ff3a7adc7a50bab45df4463179ccb', '[\"*\"]', NULL, NULL, '2024-02-12 06:59:17', '2024-02-12 06:59:17'),
(162, 'App\\Models\\User', 8, 'user', '89b69de064b03a973c364b47b412abed3ee58d619fc031eca68bd4b682bcae8b', '[\"*\"]', NULL, NULL, '2024-02-12 07:01:58', '2024-02-12 07:01:58'),
(163, 'App\\Models\\User', 8, 'user', '581c69ad888f45f52e013d5aac408c7a704266a81d4456e61716edb8ac96280b', '[\"*\"]', NULL, NULL, '2024-02-12 07:02:11', '2024-02-12 07:02:11'),
(164, 'App\\Models\\User', 8, 'user', 'a51f5f4fcd59f8c1f3430b18c40aaa90aa904becf499906790d23a2b65a42035', '[\"*\"]', NULL, NULL, '2024-02-12 07:03:31', '2024-02-12 07:03:31'),
(165, 'App\\Models\\User', 8, 'user', '078894c856bac1086500f7e12ff9191665e361bc4257e44cb982e0d7e201bf53', '[\"*\"]', NULL, NULL, '2024-02-12 07:20:22', '2024-02-12 07:20:22'),
(166, 'App\\Models\\User', 8, 'user', '8850b479b4de1f8493f3fc9390a580b0afd5a6a918d091551466a5eb2de5890c', '[\"*\"]', NULL, NULL, '2024-02-12 08:15:31', '2024-02-12 08:15:31'),
(167, 'App\\Models\\User', 8, 'user', 'c18c94f79100c5d837db7d7aee536af7bc8d9e7cbc935c3a612f8b4ff16843a3', '[\"*\"]', NULL, NULL, '2024-02-13 05:43:06', '2024-02-13 05:43:06'),
(168, 'App\\Models\\User', 8, 'user', '0ddc4599ad0466acaacadbe9393cafea738e5122132a843a24aeb87ed20fbe4f', '[\"*\"]', NULL, NULL, '2024-02-13 06:26:57', '2024-02-13 06:26:57'),
(169, 'App\\Models\\User', 8, 'user', '5dcabe0d3a744ad1be7fcad7ed23d54763271ef5a1e592a2af897d078e2758a3', '[\"*\"]', NULL, NULL, '2024-02-13 07:35:55', '2024-02-13 07:35:55'),
(170, 'App\\Models\\User', 8, 'user', '23dee66781c5d3eacc75fd37d56adb5a93d7e821d8fa0ade467fde068a6c341c', '[\"*\"]', NULL, NULL, '2024-02-13 07:41:08', '2024-02-13 07:41:08'),
(171, 'App\\Models\\User', 8, 'user', 'ad4689618de7816340f5aed41f29f0845f8c6625f5be46c4254eb87601b4f913', '[\"*\"]', NULL, NULL, '2024-02-13 07:47:32', '2024-02-13 07:47:32'),
(172, 'App\\Models\\User', 8, 'user', '238ae7b06000e3eb1070905bef5678423a87899bf3110538fdae9464c0fd4cf7', '[\"*\"]', NULL, NULL, '2024-02-13 10:07:28', '2024-02-13 10:07:28'),
(173, 'App\\Models\\User', 8, 'user', 'e777473177d80e50227a39349aef1f330c169d4bf728015c499276a63ec27d36', '[\"*\"]', NULL, NULL, '2024-02-13 10:33:08', '2024-02-13 10:33:08'),
(174, 'App\\Models\\User', 8, 'user', 'c76e119827e6af25b7dac6df5eab3388a7cee9385ce29794773dc489105ee084', '[\"*\"]', NULL, NULL, '2024-02-14 06:46:29', '2024-02-14 06:46:29'),
(175, 'App\\Models\\User', 8, 'user', '841305d9aa52b24426606e7273395fb756acc3b9b6db4646dc5ec0b48394a1f9', '[\"*\"]', NULL, NULL, '2024-02-14 07:29:01', '2024-02-14 07:29:01'),
(176, 'App\\Models\\User', 8, 'user', '7158b14d642d120ddd4af8417ad6cf183e411d97dd1321ebf6071c00a991a1e6', '[\"*\"]', NULL, NULL, '2024-02-15 07:08:33', '2024-02-15 07:08:33'),
(177, 'App\\Models\\User', 8, 'user', '8152b4db5162c181aa8d8a837122fac9fef97c2ce44802d70b339117ceae283e', '[\"*\"]', NULL, NULL, '2024-02-15 10:16:49', '2024-02-15 10:16:49'),
(178, 'App\\Models\\User', 8, 'user', '1eb894f58462f7373794826535483ca98cf0ec1ee03f5312ca162a0dd12639b6', '[\"*\"]', NULL, NULL, '2024-02-15 10:19:51', '2024-02-15 10:19:51');

-- --------------------------------------------------------

--
-- Table structure for table `private_request`
--

CREATE TABLE `private_request` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `from` time NOT NULL,
  `to` time NOT NULL,
  `teacher_id` bigint(20) UNSIGNED NOT NULL,
  `status` enum('Confirm','Pendding','Rejected') NOT NULL DEFAULT 'Pendding',
  `rejected_reason` text DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `private_request`
--

INSERT INTO `private_request` (`id`, `user_id`, `date`, `from`, `to`, `teacher_id`, `status`, `rejected_reason`, `created_at`, `updated_at`) VALUES
(1, 5, '2023-11-08', '10:44:21', '12:45:21', 44, 'Confirm', NULL, NULL, '2024-02-13');

-- --------------------------------------------------------

--
-- Table structure for table `promo_codes`
--

CREATE TABLE `promo_codes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `discount` float NOT NULL DEFAULT 0,
  `starts` date DEFAULT NULL,
  `ends` date DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `num_usage` int(11) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `promo_codes`
--

INSERT INTO `promo_codes` (`id`, `name`, `discount`, `starts`, `ends`, `code`, `num_usage`, `created_at`, `updated_at`) VALUES
(2, 'Promo 1', 2.5, '2024-01-02', '2024-01-30', 'cxz1', 16, NULL, '2024-01-27'),
(5, 'admin@gmail.com', 22, '2024-01-11', '2024-01-23', 'cxz1', 22, '2024-01-23', '2024-01-23');

-- --------------------------------------------------------

--
-- Table structure for table `promo_courses`
--

CREATE TABLE `promo_courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `promo_id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `promo_courses`
--

INSERT INTO `promo_courses` (`id`, `promo_id`, `course_id`, `created_at`, `updated_at`) VALUES
(6, 5, 4, '2024-01-23', '2024-01-23'),
(9, 2, 2, '2024-01-23', '2024-01-23');

-- --------------------------------------------------------

--
-- Table structure for table `promo_users`
--

CREATE TABLE `promo_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `promo_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lesson_id` bigint(20) UNSIGNED NOT NULL,
  `question` text DEFAULT NULL,
  `state` enum('0','1','2') NOT NULL,
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

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `lesson_id`, `question`, `state`, `q_url`, `q_code`, `q_type`, `month`, `q_num`, `year`, `section`, `difficulty`, `ans_type`, `updated_at`, `created_at`) VALUES
(1, 16, 'question 2', '0', NULL, '1234', 'Parallel', '3', '2', '2022', '2', 'A', 'Grid_in', '2024-02-13', '2024-01-29'),
(18, 4, NULL, '0', '2.png', '2', 'Parallel', '3', '21', '2022', '1', 'B', 'MCQ', '2024-02-05', NULL),
(19, 4, 'Question 2', '0', NULL, 'sad', 'Trail', '3', '4', '2022', '1', 'A', 'MCQ', '2024-01-29', NULL),
(20, 4, 'question 2', '0', NULL, '1234', 'Parallel', '3', '2', '2022', '2', 'A', 'Grid_in', '2024-01-29', '2024-01-29'),
(21, 4, 'question 2', '0', NULL, '1234', 'Parallel', '3', '2', '2022', '2', 'A', 'Grid_in', '2024-01-29', '2024-01-29');

-- --------------------------------------------------------

--
-- Table structure for table `quizzes`
--

CREATE TABLE `quizzes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL,
  `score` int(11) DEFAULT NULL,
  `pass_score` float DEFAULT NULL,
  `quizze_order` int(10) UNSIGNED NOT NULL,
  `lesson_id` bigint(20) UNSIGNED DEFAULT NULL,
  `state` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `quizzes`
--

INSERT INTO `quizzes` (`id`, `title`, `description`, `time`, `score`, `pass_score`, `quizze_order`, `lesson_id`, `state`, `created_at`, `updated_at`) VALUES
(6, 'Quizze 2', 'fggggg', '2hours25M', 100, 48, 0, 4, 1, '2024-01-18', '2024-02-14'),
(7, 'sa', 'ad', '1hours1M', 100, 48, 0, 4, 1, '2024-01-18', '2024-01-18'),
(8, 'sa', 'ad', '1hours1M', 100, 48, 0, 4, 1, '2024-01-18', '2024-01-18'),
(9, 'sa', 'ad', '1hours1M', 100, 48, 0, NULL, 1, '2024-01-18', '2024-01-18'),
(10, 'sad99', 'tyh', '1Hours 1 M', 100, 48, 0, 4, 1, '2024-01-18', '2024-02-03'),
(11, 'sa', 'ad', '1hours1M', 100, 48, 0, NULL, 1, '2024-01-18', '2024-01-18'),
(12, 'sa', 'ad', '1hours1M', 100, 48, 0, 4, 1, '2024-01-18', '2024-01-18'),
(13, 'dfe', 'edfw', '1hours1M', 100, 48, 0, 4, 0, '2024-01-18', '2024-01-18'),
(14, 'da', NULL, '3hours3M', 1, 8, 0, 4, 0, '2024-01-20', '2024-01-20'),
(15, NULL, NULL, 'hoursM', NULL, NULL, 0, NULL, 0, '2024-01-24', '2024-01-24'),
(18, 'assd', 'asdasdas sa', '1hours1M', 100, 48, 0, 4, 1, '2024-01-30', '2024-01-30'),
(19, 'sad', 'ds', '1hours1M', 100, 48, 0, 4, 0, '2024-01-30', '2024-01-30'),
(20, 'ffffff', 'ffff', '1hours1M', 100, 48, 0, 4, 0, '2024-01-31', '2024-01-31'),
(21, NULL, NULL, 'hoursM', NULL, NULL, 0, NULL, 0, '2024-02-12', '2024-02-12'),
(22, 'lala', 'sfggdf', '1hours1M', 100, 8, 4, 4, 1, '2024-02-14', '2024-02-14'),
(23, 'lala', 'df', '1hours1M', 100, 48, 5, 4, 1, '2024-02-14', '2024-02-14'),
(24, 'lala', 'df', '1hours1M', 100, 48, 5, 4, 1, '2024-02-14', '2024-02-14'),
(25, 'lala', 'df', '1hours1M', 100, 48, 5, 4, 1, '2024-02-14', '2024-02-14'),
(26, 'lala', 'df', '1hours1M', 100, 48, 5, 4, 1, '2024-02-14', '2024-02-14');

-- --------------------------------------------------------

--
-- Table structure for table `quizze_stu_ans`
--

CREATE TABLE `quizze_stu_ans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question_id` bigint(20) UNSIGNED NOT NULL,
  `quizze_id` bigint(20) UNSIGNED NOT NULL,
  `stu_id` bigint(20) UNSIGNED NOT NULL,
  `answer` varchar(255) NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quizze_stu_ans`
--

INSERT INTO `quizze_stu_ans` (`id`, `question_id`, `quizze_id`, `stu_id`, `answer`, `created_at`, `updated_at`) VALUES
(1, 18, 12, 8, 'answer 1', '2024-02-10', '2024-02-10'),
(2, 1, 12, 8, '2', '2024-02-10', '2024-02-10'),
(3, 18, 12, 8, 'answer 1', '2024-02-10', '2024-02-10'),
(4, 1, 12, 8, '2', '2024-02-10', '2024-02-10'),
(5, 18, 12, 8, 'answer 1', '2024-02-10', '2024-02-10'),
(6, 1, 12, 8, '2', '2024-02-10', '2024-02-10');

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
(1, '2023X12X24X11X56X40202301111020C5631746XA3DDX43F6XA634X158716ABFA8B.bmp', 'https://www.youtube.com/embed/zoPyeFrnX3k?si=CpLpiNS2wNDvuGH1', 1, '2023-12-24', '2023-12-24'),
(2, '2023X12X24X11X56X40202301111011mvf_light_logo.png', 'https://www.youtube.com/embed/zoPyeFrnX3k?si=CpLpiNS2wNDvuGH1', 8, '2023-12-24', '2023-12-24'),
(3, '2023X12X24X11X56X40202301111020C5631746XA3DDX43F6XA634X158716ABFA8B.jpeg', 'https://www.youtube.com/embed/zoPyeFrnX3k?si=CpLpiNS2wNDvuGH1', 8, '2023-12-24', '2023-12-24'),
(4, '2023X12X24X11X58X17202301101901SnapchatX2011979818.jpg', 'https://www.youtube.com/embed/zoPyeFrnX3k?si=CpLpiNS2wNDvuGH1', 9, '2023-12-24', '2023-12-24'),
(5, '2023X12X24X11X58X17202301100931mvf_light_logo.png', 'https://www.youtube.com/embed/zoPyeFrnX3k?si=CpLpiNS2wNDvuGH1', 9, '2023-12-24', '2023-12-24'),
(6, '2023X12X25X14X16X59202301111020C5631746XA3DDX43F6XA634X158716ABFA8B.jpeg', 'https://www.youtube.com/embed/zoPyeFrnX3k?si=CpLpiNS2wNDvuGH1', 10, '2023-12-25', '2023-12-25'),
(7, '2023X12X25X14X18X43202301111011mvf_light_logo.png', 'https://www.youtube.com/embed/zoPyeFrnX3k?si=CpLpiNS2wNDvuGH1', 11, '2023-12-25', '2023-12-25'),
(8, '2023X12X26X11X07X34202301100934C5631746XA3DDX43F6XA634X158716ABFA8B.jpeg', 'https://www.youtube.com/embed/zoPyeFrnX3k?si=CpLpiNS2wNDvuGH1', 14, '2023-12-26', '2023-12-26'),
(9, '2023X12X26X11X10X38202301100934C5631746XA3DDX43F6XA634X158716ABFA8B.jpeg', 'https://www.youtube.com/embed/zoPyeFrnX3k?si=CpLpiNS2wNDvuGH1', 16, '2023-12-26', '2023-12-26'),
(10, '2024X01X24X09X46X176.jpg', '2024X01X24X09X46X17', 20, '2024-01-24', '2024-01-24'),
(11, '2024X01X24X11X10X516.jpg', '2024X01X24X11X10X516.jpg', 21, '2024-01-24', '2024-01-24'),
(12, '2024X01X29X08X53X504.png', '2024X01X29X08X53X505.png', 18, '2024-01-29', '2024-01-29'),
(13, '2024X02X03X11X43X2412.jpg', '2024X02X03X11X43X2412.jpg', 18, '2024-02-03', '2024-02-03'),
(14, '2024X02X03X11X44X3110.jpg', '2024X02X03X11X44X3110.jpg', 18, '2024-02-03', '2024-02-03'),
(15, '2024X02X03X11X46X449.jpg', '2024X02X03X11X46X449.jpg', 18, '2024-02-03', '2024-02-03');

-- --------------------------------------------------------

--
-- Table structure for table `q_quizes`
--

CREATE TABLE `q_quizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quizze_id` bigint(20) UNSIGNED NOT NULL,
  `question_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `q_quizes`
--

INSERT INTO `q_quizes` (`id`, `quizze_id`, `question_id`, `created_at`, `updated_at`) VALUES
(7, 12, 18, '2024-01-18', '2024-01-18'),
(8, 13, 18, '2024-01-18', '2024-01-18'),
(11, 14, 18, '2024-01-20', '2024-01-20'),
(49, 18, 18, '2024-01-30', '2024-01-30'),
(51, 19, 18, '2024-01-30', '2024-01-30'),
(52, 19, 19, '2024-01-30', '2024-01-30'),
(55, 20, 18, '2024-01-31', '2024-01-31'),
(56, 20, 19, '2024-01-31', '2024-01-31'),
(57, 20, 20, '2024-01-31', '2024-01-31'),
(60, 12, 1, '2024-01-31', '2024-01-31'),
(62, 14, 21, '2024-01-31', '2024-01-31'),
(63, 14, 19, '2024-01-31', '2024-01-31'),
(64, 14, 18, '2024-01-31', '2024-01-31');

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
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `link` varchar(255) NOT NULL,
  `material_link` varchar(255) DEFAULT NULL,
  `from` time NOT NULL,
  `to` time NOT NULL,
  `lesson_id` bigint(20) UNSIGNED NOT NULL,
  `teacher_id` bigint(20) UNSIGNED NOT NULL,
  `group_id` bigint(20) UNSIGNED DEFAULT NULL,
  `type` enum('group','private','session') NOT NULL,
  `price` float DEFAULT NULL,
  `access_dayes` int(11) DEFAULT NULL,
  `repeat` enum('Once','Repeat') NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `name`, `date`, `link`, `material_link`, `from`, `to`, `lesson_id`, `teacher_id`, `group_id`, `type`, `price`, `access_dayes`, `repeat`, `created_at`, `updated_at`) VALUES
(4, 'sa', '2024-01-05', 'https//:-www.link.com', NULL, '14:12:00', '14:12:00', 4, 1, NULL, 'private', 222, 13, 'Repeat', '2024-01-15', '2024-01-24'),
(6, 'session', '2024-01-10', 'https//:-www.ahmed.com', NULL, '00:51:00', '00:51:00', 4, 1, NULL, 'private', 22, 13, 'Once', '2024-01-24', '2024-01-24'),
(7, 'sar', '2024-01-10', 'https//:-www.ahmed.com', NULL, '00:51:00', '00:51:00', 4, 10, NULL, 'session', 22, 13, 'Once', '2024-01-24', '2024-01-27'),
(8, 'dfg', '2024-01-05', 'wsd', NULL, '10:47:00', '10:48:00', 4, 1, NULL, 'session', 200, 13, 'Once', '2024-01-27', '2024-01-27'),
(9, 'wee', '2024-01-05', 'wsd', NULL, '10:47:00', '10:48:00', 5, 1, NULL, 'session', 200, 13, 'Repeat', '2024-01-27', '2024-01-27'),
(10, 'ewr', '2024-01-05', 'https//:-www.link.com1', NULL, '10:00:00', '10:01:00', 4, 1, NULL, 'session', 22, 13, 'Once', '2024-01-27', '2024-01-27'),
(11, 'mohamed yasen', '2024-02-01', 'https//:-www.link.com1', 'sdss', '16:06:00', '16:06:00', 4, 1, 1, 'group', NULL, NULL, 'Once', '2024-02-04', '2024-02-04'),
(12, 'admin@gmail.com', '2024-02-06', 'https//:-www.link.com1', 'sdss', '09:31:00', '11:32:00', 4, 1, 1, 'group', NULL, NULL, 'Once', '2024-02-05', '2024-02-05'),
(13, 'vd1', '2024-02-22', 'https//:-www.link.com1', 'sdss', '10:43:00', '10:43:00', 4, 1, 1, 'group', NULL, NULL, 'Once', '2024-02-05', '2024-02-05'),
(14, 'rtr', '2024-02-23', 'https//:-www.link.com1', NULL, '10:53:00', '10:52:00', 4, 1, 1, 'group', NULL, NULL, 'Once', '2024-02-05', '2024-02-05'),
(15, 'rtr', '2024-02-23', 'https//:-www.link.com1', NULL, '10:53:00', '10:52:00', 4, 1, 1, 'group', NULL, NULL, 'Once', '2024-02-05', '2024-02-05'),
(16, 'eee', '2024-02-02', 'https//:-www.link.com1', NULL, '02:02:00', '02:03:00', 4, 1, 3, 'private', NULL, NULL, 'Once', '2024-02-05', '2024-02-13');

-- --------------------------------------------------------

--
-- Table structure for table `session_days`
--

CREATE TABLE `session_days` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `session_id` bigint(20) UNSIGNED NOT NULL,
  `day` varchar(255) NOT NULL,
  `times` int(11) DEFAULT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `session_days`
--

INSERT INTO `session_days` (`id`, `session_id`, `day`, `times`, `created_at`, `updated_at`) VALUES
(1, 3, 'SaturDay', NULL, '2024-01-14', '2024-01-14'),
(2, 3, 'SunDay', NULL, '2024-01-14', '2024-01-14'),
(3, 3, 'MonDay', NULL, '2024-01-14', '2024-01-14'),
(4, 4, 'SaturDay', 6, '2024-01-15', '2024-01-15'),
(5, 4, 'SunDay', 6, '2024-01-15', '2024-01-15'),
(6, 4, 'MonDay', 6, '2024-01-15', '2024-01-15'),
(7, 5, 'SunDay', NULL, '2024-01-15', '2024-01-15'),
(8, 5, 'MonDay', NULL, '2024-01-15', '2024-01-15'),
(9, 5, 'TuesDay', NULL, '2024-01-15', '2024-01-15'),
(10, 9, 'SaturDay', 2, '2024-01-27', '2024-01-27'),
(11, 9, 'SunDay', 2, '2024-01-27', '2024-01-27');

-- --------------------------------------------------------

--
-- Table structure for table `session_groups`
--

CREATE TABLE `session_groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `teacher_id` bigint(20) UNSIGNED NOT NULL,
  `state` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `session_groups`
--

INSERT INTO `session_groups` (`id`, `name`, `teacher_id`, `state`, `created_at`, `updated_at`) VALUES
(1, 'group1', 1, 1, NULL, '2024-02-13'),
(3, 'admin@gmail.com', 46, 1, '2024-01-14', '2024-01-14'),
(5, 'mohamed yasen', 1, 1, '2024-01-27', '2024-01-27'),
(6, 'admin@gmail.com', 46, 1, '2024-02-04', '2024-02-04');

-- --------------------------------------------------------

--
-- Table structure for table `session_students`
--

CREATE TABLE `session_students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `session_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `session_students`
--

INSERT INTO `session_students` (`id`, `session_id`, `user_id`, `created_at`, `updated_at`) VALUES
(4, 16, 46, '2024-02-13', '2024-02-13');

-- --------------------------------------------------------

--
-- Table structure for table `student_quizzes`
--

CREATE TABLE `student_quizzes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `lesson_id` bigint(20) UNSIGNED NOT NULL,
  `quizze_id` bigint(20) UNSIGNED NOT NULL,
  `score` int(11) NOT NULL,
  `time` varchar(255) NOT NULL,
  `r_questions` int(11) NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_quizzes`
--

INSERT INTO `student_quizzes` (`id`, `date`, `student_id`, `lesson_id`, `quizze_id`, `score`, `time`, `r_questions`, `created_at`, `updated_at`) VALUES
(1, '2024-02-15', 8, 4, 12, 50, '$req->time', 50, '2024-02-15', '2024-02-15');

-- --------------------------------------------------------

--
-- Table structure for table `student_quizze_mistakes`
--

CREATE TABLE `student_quizze_mistakes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question_id` bigint(20) UNSIGNED NOT NULL,
  `student_quizze_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_quizze_mistakes`
--

INSERT INTO `student_quizze_mistakes` (`id`, `question_id`, `student_quizze_id`, `created_at`, `updated_at`) VALUES
(1, 1, 3, '2024-02-15', '2024-02-15'),
(2, 1, 4, '2024-02-15', '2024-02-15'),
(3, 1, 5, '2024-02-15', '2024-02-15'),
(4, 1, 6, '2024-02-15', '2024-02-15'),
(5, 1, 7, '2024-02-15', '2024-02-15'),
(6, 1, 8, '2024-02-15', '2024-02-15'),
(7, 1, 9, '2024-02-15', '2024-02-15'),
(8, 1, 10, '2024-02-15', '2024-02-15'),
(9, 1, 11, '2024-02-15', '2024-02-15'),
(10, 1, 12, '2024-02-15', '2024-02-15'),
(11, 1, 13, '2024-02-15', '2024-02-15'),
(12, 1, 14, '2024-02-15', '2024-02-15'),
(13, 1, 15, '2024-02-15', '2024-02-15'),
(14, 1, 16, '2024-02-15', '2024-02-15'),
(15, 1, 17, '2024-02-15', '2024-02-15'),
(16, 1, 18, '2024-02-15', '2024-02-15'),
(17, 1, 19, '2024-02-15', '2024-02-15'),
(18, 1, 20, '2024-02-15', '2024-02-15'),
(19, 1, 21, '2024-02-15', '2024-02-15'),
(20, 1, 22, '2024-02-15', '2024-02-15'),
(21, 1, 23, '2024-02-15', '2024-02-15'),
(22, 1, 24, '2024-02-15', '2024-02-15'),
(23, 1, 25, '2024-02-15', '2024-02-15'),
(24, 1, 26, '2024-02-15', '2024-02-15'),
(25, 1, 27, '2024-02-15', '2024-02-15'),
(26, 1, 28, '2024-02-15', '2024-02-15'),
(27, 1, 29, '2024-02-15', '2024-02-15'),
(28, 1, 30, '2024-02-15', '2024-02-15'),
(29, 1, 31, '2024-02-15', '2024-02-15'),
(30, 1, 32, '2024-02-15', '2024-02-15'),
(31, 1, 33, '2024-02-15', '2024-02-15'),
(32, 1, 34, '2024-02-15', '2024-02-15'),
(33, 18, 35, '2024-02-15', '2024-02-15'),
(34, 1, 35, '2024-02-15', '2024-02-15'),
(35, 18, 36, '2024-02-15', '2024-02-15'),
(36, 1, 36, '2024-02-15', '2024-02-15'),
(37, 18, 37, '2024-02-15', '2024-02-15'),
(38, 1, 37, '2024-02-15', '2024-02-15'),
(39, 18, 38, '2024-02-15', '2024-02-15'),
(40, 1, 38, '2024-02-15', '2024-02-15'),
(41, 1, 1, '2024-02-15', '2024-02-15');

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
-- Table structure for table `usage_promo`
--

CREATE TABLE `usage_promo` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `promo_id` bigint(20) UNSIGNED NOT NULL,
  `promo` varchar(255) NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usage_promo`
--

INSERT INTO `usage_promo` (`id`, `user_id`, `promo_id`, `promo`, `created_at`, `updated_at`) VALUES
(1, 8, 2, '', '2024-01-18', '2024-01-18'),
(2, 8, 2, '', '2024-01-27', '2024-01-27'),
(3, 8, 2, '', '2024-01-27', '2024-01-27'),
(4, 8, 2, '', '2024-01-27', '2024-01-27'),
(5, 8, 2, 'Promo 1', '2024-01-27', '2024-01-27');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `f_name` varchar(255) DEFAULT NULL,
  `l_name` varchar(255) DEFAULT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `profile_photo_path` varchar(2048) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `phone` varchar(191) NOT NULL,
  `parent_phone` varchar(191) DEFAULT NULL,
  `parent_email` varchar(191) DEFAULT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'default.png',
  `city_id` bigint(20) UNSIGNED DEFAULT NULL,
  `position` enum('super_admin','admin','student','teacher','affilate') NOT NULL,
  `grade` varchar(20) DEFAULT NULL,
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

INSERT INTO `users` (`id`, `f_name`, `l_name`, `name`, `email`, `profile_photo_path`, `email_verified_at`, `phone`, `parent_phone`, `parent_email`, `image`, `city_id`, `position`, `grade`, `course_id`, `category_id`, `password`, `state`, `avatar`, `remember_token`, `extra_email`, `created_at`, `updated_at`, `last_login_at`, `last_login_ip`) VALUES
(1, NULL, NULL, 'Ahmed', 'Ahmed@gmail.com', NULL, NULL, '0113443534', '012345346', 'Ali@gmail.com', '1972024X01X27X10X03X326.jpg', NULL, 'teacher', NULL, 2, 1, '$2y$10$O4pDFFvEQGAkfZ.mcGIhaOb0MQCocleYwEySm4OYgq9./pKT021de', 'Show', NULL, NULL, NULL, NULL, '2024-01-27 08:03:32', NULL, NULL),
(5, NULL, NULL, 'Teacher 1', 'admin3@gmail.com', NULL, NULL, '01099475854', NULL, NULL, '2023X12X18X11X42X459672202304300850download.png', NULL, 'super_admin', NULL, NULL, NULL, '$2y$10$abRantqLN7R8dKUzWPGSLebir7D.GcznzfflGYjquM59GZo9f5y3a', 'Show', NULL, NULL, NULL, '2023-12-18 09:42:45', '2023-12-18 09:42:45', NULL, NULL),
(7, NULL, NULL, 'Teacher 1', 'admin4@gmail.com', NULL, NULL, '01099475854', NULL, NULL, '2023X12X18X11X43X297615202304300850download.png', NULL, 'super_admin', NULL, NULL, NULL, '$2y$10$CWyZzMn0kdjZKf1f5z0ey.xXzyHVVwkvCFGwakJchI9dwNSyOEyQa', 'Show', NULL, NULL, NULL, '2023-12-18 09:43:29', '2023-12-18 09:43:29', NULL, NULL),
(8, NULL, NULL, 'Teacher 1', 'admin@gmail.com', NULL, NULL, '01099475851111111114', NULL, NULL, '1.png', NULL, 'student', NULL, NULL, NULL, '$2y$10$3cpQN4tIOFxAS2hQ6vKbl.ho1zHxGGWGziGNHR3.JZsjUYJRADNXq', 'Show', NULL, NULL, NULL, '2023-12-18 09:44:14', '2024-01-04 06:15:04', NULL, NULL),
(10, NULL, NULL, 'Teacher', 'teacher@gmail.com', NULL, NULL, '01099475854', NULL, NULL, '2023X12X18X11X50X119775202304090932egyptXflagXwaveXiconX32.png', NULL, 'teacher', NULL, NULL, NULL, '$2y$10$EFSKaqvOqy3o.ihNqVWi7uCPCrFtflwUJGqEBFP1woOuxlRaIqN5u', 'Show', NULL, NULL, NULL, '2023-12-18 09:50:11', '2024-01-27 08:02:15', NULL, NULL),
(11, NULL, NULL, 'Teacher12', 'teacher2@gmail.com', NULL, NULL, '01099475854', NULL, NULL, '2023X12X18X11X52X277966202304090932egyptXflagXwaveXiconX32.png', NULL, 'teacher', NULL, 1, 1, '$2y$10$Y4fg1B5EpujC8OVSCO6fNOyxdAj2lPJDZWibbtD8j55Jik6fU4Uq6', 'Show', NULL, NULL, NULL, '2023-12-18 09:52:27', '2024-02-05 10:45:46', NULL, NULL),
(44, NULL, NULL, 'admin@gmail.com', 'sad@gmail.com', NULL, NULL, '123', '123', NULL, 'default.png', NULL, 'admin', NULL, NULL, NULL, '$2y$10$RkeDuqhtAqMTRC7gfMFxG.Vl8pLtWGgj1jisi0ZkphX9LDVUQaZpO', 'Show', NULL, NULL, NULL, '2023-12-31 06:31:28', '2024-02-05 10:15:37', NULL, NULL),
(46, NULL, NULL, 'asd', 'asd12@gmail.com', NULL, NULL, '123', '123', NULL, 'default.png', NULL, 'student', '1', NULL, NULL, '$2y$10$fHxDlq7YyAFsRbhMc/GicuyEhWJZ2D7z75W/CDKEvcodtPdVstLVC', 'hidden', NULL, NULL, NULL, '2023-12-31 06:33:52', '2023-12-31 06:33:52', NULL, NULL),
(57, NULL, NULL, 'ahmed1', 'ahmedyahia@yahoo.com', NULL, NULL, '123456789', NULL, NULL, 'default.png', NULL, 'admin', NULL, NULL, NULL, '$2y$10$4CuUgVeM.E8K16Tbs5ZdJ.5SvzhdLRr08.J4gkehsTsGNl7g43eVu', 'hidden', NULL, NULL, NULL, '2024-01-01 09:54:47', '2024-01-28 05:55:03', NULL, NULL),
(59, 'as', 'as', 'as', 'admin2312@gmail.com', NULL, NULL, '213', NULL, NULL, 'default.png', NULL, 'student', '1', NULL, NULL, '$2y$10$UT7CEpaDZ6etgdvQDjN5huCPzvCM/xdiLbT02hZIZh.doXV6/SLRS', 'hidden', NULL, NULL, NULL, '2024-01-03 07:52:53', '2024-01-03 07:52:53', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_sessions`
--

CREATE TABLE `user_sessions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `session_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wallets`
--

CREATE TABLE `wallets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `wallet` int(11) NOT NULL,
  `date` date NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `wallets`
--

INSERT INTO `wallets` (`id`, `student_id`, `wallet`, `date`, `created_at`, `updated_at`) VALUES
(1, 46, 10, '2024-01-28', '2024-01-28', '2024-01-28'),
(2, 46, 4, '2024-01-28', '2024-01-28', '2024-01-28'),
(3, 46, 7, '2024-01-28', '2024-01-28', '2024-01-28'),
(4, 46, 4, '2024-01-28', '2024-01-28', '2024-01-28'),
(5, 46, 2, '2024-01-28', '2024-01-28', '2024-01-28'),
(6, 59, 2, '2024-01-28', '2024-01-28', '2024-01-28');

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
-- Indexes for table `cancel_session`
--
ALTER TABLE `cancel_session`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_Cancel_Session` (`session_id`),
  ADD KEY `FK_Cancel_Student` (`user_id`);

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
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_City_Country` (`country_id`);

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
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `courses_category_id_foreign` (`category_id`),
  ADD KEY `FK_Course_Teacher` (`teacher_id`);

--
-- Indexes for table `course_prices`
--
ALTER TABLE `course_prices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_Price_Course` (`course_id`);

--
-- Indexes for table `diagnostic_exams`
--
ALTER TABLE `diagnostic_exams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_Dia_Course` (`course_id`);

--
-- Indexes for table `dia_questions`
--
ALTER TABLE `dia_questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_DiaExam` (`daiExam_id`),
  ADD KEY `FK_Question` (`ques_id`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_Grid_Question` (`q_id`);

--
-- Indexes for table `group_days`
--
ALTER TABLE `group_days`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_GDays_Group` (`group_id`);

--
-- Indexes for table `group_students`
--
ALTER TABLE `group_students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_GStu_Group` (`group_id`),
  ADD KEY `FK_GStu_Student` (`stu_id`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_MCQ_Q` (`q_id`);

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
-- Indexes for table `payment_method`
--
ALTER TABLE `payment_method`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_orders`
--
ALTER TABLE `payment_orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_Order_Request` (`payment_request_id`),
  ADD KEY `FK_Order_Chapter` (`chapter_id`);

--
-- Indexes for table `payment_requests`
--
ALTER TABLE `payment_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_Pay_Method` (`payment_method_id`),
  ADD KEY `FK_Pay_User` (`user_id`);

--
-- Indexes for table `payouts`
--
ALTER TABLE `payouts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_Payout_Affilate` (`affilate_id`),
  ADD KEY `FK_Payment_Method` (`payment_method`);

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
-- Indexes for table `private_request`
--
ALTER TABLE `private_request`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_Private_Teacher` (`teacher_id`),
  ADD KEY `FK_Private_User` (`user_id`);

--
-- Indexes for table `promo_codes`
--
ALTER TABLE `promo_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `promo_courses`
--
ALTER TABLE `promo_courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_Promo` (`promo_id`),
  ADD KEY `FK_Course` (`course_id`);

--
-- Indexes for table `promo_users`
--
ALTER TABLE `promo_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_Users` (`user_id`),
  ADD KEY `FK_PromoC` (`promo_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_Q_Lesson` (`lesson_id`);

--
-- Indexes for table `quizzes`
--
ALTER TABLE `quizzes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_Quizze_Lesson` (`lesson_id`);

--
-- Indexes for table `quizze_stu_ans`
--
ALTER TABLE `quizze_stu_ans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `q_ans`
--
ALTER TABLE `q_ans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `q_quizes`
--
ALTER TABLE `q_quizes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_qq_Quizze` (`quizze_id`),
  ADD KEY `FK_qq_Question` (`question_id`);

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
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_Session_Lesson` (`lesson_id`),
  ADD KEY `FK_Session_Teacher` (`teacher_id`);

--
-- Indexes for table `session_days`
--
ALTER TABLE `session_days`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `session_groups`
--
ALTER TABLE `session_groups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_SessionG_Teacher` (`teacher_id`);

--
-- Indexes for table `session_students`
--
ALTER TABLE `session_students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_Session` (`session_id`),
  ADD KEY `FK_Stu` (`user_id`);

--
-- Indexes for table `student_quizzes`
--
ALTER TABLE `student_quizzes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_Stu_Lesson` (`lesson_id`),
  ADD KEY `FK_Stu_Quizze` (`quizze_id`),
  ADD KEY `FK_Stu_Stu` (`student_id`);

--
-- Indexes for table `student_quizze_mistakes`
--
ALTER TABLE `student_quizze_mistakes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher__courses`
--
ALTER TABLE `teacher__courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_tc_category` (`category_id`),
  ADD KEY `FK_tc_course` (`course_id`),
  ADD KEY `FK_tc_user` (`user_id`);

--
-- Indexes for table `usage_promo`
--
ALTER TABLE `usage_promo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_Promo_User` (`user_id`),
  ADD KEY `FK_Promo_Promo` (`promo_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `FK_Teacher_Categories` (`category_id`),
  ADD KEY `FK_Teacher_Course` (`course_id`);

--
-- Indexes for table `user_sessions`
--
ALTER TABLE `user_sessions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wallets`
--
ALTER TABLE `wallets`
  ADD PRIMARY KEY (`id`),
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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `affilate`
--
ALTER TABLE `affilate`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cancel_session`
--
ALTER TABLE `cancel_session`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `chapters`
--
ALTER TABLE `chapters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `chapter_prices`
--
ALTER TABLE `chapter_prices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=206;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `course_prices`
--
ALTER TABLE `course_prices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `diagnostic_exams`
--
ALTER TABLE `diagnostic_exams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `dia_questions`
--
ALTER TABLE `dia_questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `exam_codes`
--
ALTER TABLE `exam_codes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `grid_ans`
--
ALTER TABLE `grid_ans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `group_days`
--
ALTER TABLE `group_days`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `group_students`
--
ALTER TABLE `group_students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `idea_lessons`
--
ALTER TABLE `idea_lessons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `lessons`
--
ALTER TABLE `lessons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `marketings`
--
ALTER TABLE `marketings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `mcq_ans`
--
ALTER TABLE `mcq_ans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `payment_method`
--
ALTER TABLE `payment_method`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `payment_orders`
--
ALTER TABLE `payment_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payment_requests`
--
ALTER TABLE `payment_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `payouts`
--
ALTER TABLE `payouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=179;

--
-- AUTO_INCREMENT for table `private_request`
--
ALTER TABLE `private_request`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `promo_codes`
--
ALTER TABLE `promo_codes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `promo_courses`
--
ALTER TABLE `promo_courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `promo_users`
--
ALTER TABLE `promo_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `quizzes`
--
ALTER TABLE `quizzes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `quizze_stu_ans`
--
ALTER TABLE `quizze_stu_ans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `q_ans`
--
ALTER TABLE `q_ans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `q_quizes`
--
ALTER TABLE `q_quizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `session_days`
--
ALTER TABLE `session_days`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `session_groups`
--
ALTER TABLE `session_groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `session_students`
--
ALTER TABLE `session_students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `student_quizzes`
--
ALTER TABLE `student_quizzes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `student_quizze_mistakes`
--
ALTER TABLE `student_quizze_mistakes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `teacher__courses`
--
ALTER TABLE `teacher__courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usage_promo`
--
ALTER TABLE `usage_promo`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `user_sessions`
--
ALTER TABLE `user_sessions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wallets`
--
ALTER TABLE `wallets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin_roles`
--
ALTER TABLE `admin_roles`
  ADD CONSTRAINT `admin_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cancel_session`
--
ALTER TABLE `cancel_session`
  ADD CONSTRAINT `FK_Cancel_Session` FOREIGN KEY (`session_id`) REFERENCES `sessions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Cancel_Student` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Constraints for table `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `FK_City_Country` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `FK_Course_Teacher` FOREIGN KEY (`teacher_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `courses_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `course_prices`
--
ALTER TABLE `course_prices`
  ADD CONSTRAINT `FK_Price_Course` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `diagnostic_exams`
--
ALTER TABLE `diagnostic_exams`
  ADD CONSTRAINT `FK_Dia_Course` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `dia_questions`
--
ALTER TABLE `dia_questions`
  ADD CONSTRAINT `FK_DiaExam` FOREIGN KEY (`daiExam_id`) REFERENCES `diagnostic_exams` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Question` FOREIGN KEY (`ques_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `grid_ans`
--
ALTER TABLE `grid_ans`
  ADD CONSTRAINT `FK_Grid_Question` FOREIGN KEY (`q_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `group_days`
--
ALTER TABLE `group_days`
  ADD CONSTRAINT `FK_GDays_Group` FOREIGN KEY (`group_id`) REFERENCES `session_groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `group_students`
--
ALTER TABLE `group_students`
  ADD CONSTRAINT `FK_GStu_Group` FOREIGN KEY (`group_id`) REFERENCES `session_groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_GStu_Student` FOREIGN KEY (`stu_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Constraints for table `mcq_ans`
--
ALTER TABLE `mcq_ans`
  ADD CONSTRAINT `FK_MCQ_Q` FOREIGN KEY (`q_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Constraints for table `payment_orders`
--
ALTER TABLE `payment_orders`
  ADD CONSTRAINT `FK_Order_Chapter` FOREIGN KEY (`chapter_id`) REFERENCES `chapters` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Order_Request` FOREIGN KEY (`payment_request_id`) REFERENCES `payment_requests` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payment_requests`
--
ALTER TABLE `payment_requests`
  ADD CONSTRAINT `FK_Pay_Method` FOREIGN KEY (`payment_method_id`) REFERENCES `payment_method` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Pay_User` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payouts`
--
ALTER TABLE `payouts`
  ADD CONSTRAINT `FK_Payment_Method` FOREIGN KEY (`payment_method`) REFERENCES `payment_method` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Payout_Affilate` FOREIGN KEY (`affilate_id`) REFERENCES `affilate` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `private_request`
--
ALTER TABLE `private_request`
  ADD CONSTRAINT `FK_Private_Teacher` FOREIGN KEY (`teacher_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Private_User` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `promo_courses`
--
ALTER TABLE `promo_courses`
  ADD CONSTRAINT `FK_Course` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Promo` FOREIGN KEY (`promo_id`) REFERENCES `promo_codes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `promo_users`
--
ALTER TABLE `promo_users`
  ADD CONSTRAINT `FK_PromoC` FOREIGN KEY (`promo_id`) REFERENCES `promo_codes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `FK_Q_Lesson` FOREIGN KEY (`lesson_id`) REFERENCES `lessons` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `quizzes`
--
ALTER TABLE `quizzes`
  ADD CONSTRAINT `FK_Quizze_Lesson` FOREIGN KEY (`lesson_id`) REFERENCES `lessons` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `q_quizes`
--
ALTER TABLE `q_quizes`
  ADD CONSTRAINT `FK_qq_Question` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_qq_Quizze` FOREIGN KEY (`quizze_id`) REFERENCES `quizzes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sessions`
--
ALTER TABLE `sessions`
  ADD CONSTRAINT `FK_Session_Lesson` FOREIGN KEY (`lesson_id`) REFERENCES `lessons` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Session_Teacher` FOREIGN KEY (`teacher_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `session_groups`
--
ALTER TABLE `session_groups`
  ADD CONSTRAINT `FK_SessionG_Teacher` FOREIGN KEY (`teacher_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `session_students`
--
ALTER TABLE `session_students`
  ADD CONSTRAINT `FK_Session` FOREIGN KEY (`session_id`) REFERENCES `sessions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Stu` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_quizzes`
--
ALTER TABLE `student_quizzes`
  ADD CONSTRAINT `FK_Stu_Lesson` FOREIGN KEY (`lesson_id`) REFERENCES `lessons` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Stu_Quizze` FOREIGN KEY (`quizze_id`) REFERENCES `quizzes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Stu_Stu` FOREIGN KEY (`student_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `teacher__courses`
--
ALTER TABLE `teacher__courses`
  ADD CONSTRAINT `FK_tc_category` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_tc_course` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_tc_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `usage_promo`
--
ALTER TABLE `usage_promo`
  ADD CONSTRAINT `FK_Promo_Promo` FOREIGN KEY (`promo_id`) REFERENCES `promo_codes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Promo_User` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
