-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 03, 2022 at 11:49 AM
-- Server version: 10.3.32-MariaDB-log-cll-lve
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hullolco_BitDashBoard`
--

-- --------------------------------------------------------

--
-- Table structure for table `attachments`
--

CREATE TABLE `attachments` (
  `id` int(10) UNSIGNED NOT NULL,
  `filenames` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `project_id` int(10) UNSIGNED DEFAULT NULL,
  `phase_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attachments`
--

INSERT INTO `attachments` (`id`, `filenames`, `name`, `title`, `project_id`, `phase_id`, `created_at`, `updated_at`) VALUES
(1, 'files/1615136964.docx', 'العرض الفني', NULL, 4, NULL, '2021-03-07 18:09:24', '2021-03-07 18:09:24'),
(2, 'files/1615137925.docx', 'العرض الفني', NULL, 6, NULL, '2021-03-07 18:25:25', '2021-03-07 18:25:25'),
(3, 'files/1615279045.docx', 'العرض الفني', NULL, 1, NULL, '2021-03-09 09:37:25', '2021-03-09 09:37:25'),
(4, 'files/1615311908.pdf', 'تقرير بالاخطاء', 'سرعه حل الاخطاء', NULL, 27, '2021-03-09 18:45:08', '2021-03-09 18:45:08'),
(5, 'files/1615399674.pdf', 'ملاحظات', NULL, NULL, 29, '2021-03-10 19:07:54', '2021-03-10 19:07:54');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phases_id` int(10) UNSIGNED DEFAULT NULL,
  `project_id` int(10) UNSIGNED DEFAULT NULL,
  `developers_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `comment`, `phases_id`, `project_id`, `developers_id`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, 1, 21, '2021-03-09 17:46:45', '2021-03-09 17:46:45');

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
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(10) UNSIGNED NOT NULL,
  `filenames` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(4, '2020_10_21_133833_create_permission_tables', 1),
(5, '2021_02_20_133909_create_projects_table', 1),
(6, '2021_02_20_134543_create_phases_table', 1),
(7, '2021_02_20_134933_create_teams_table', 1),
(8, '2021_02_20_135246_create_attachments_table', 1),
(9, '2021_02_20_135549_create_phase_projects_teams_table', 1),
(10, '2021_02_20_152652_create_comments_table', 1),
(11, '2021_02_21_164754_create_files_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `phases`
--

CREATE TABLE `phases` (
  `id` int(10) UNSIGNED NOT NULL,
  `title_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_id` int(11) NOT NULL,
  `notes` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `delivery_date` date DEFAULT NULL,
  `Number_of_hours` time NOT NULL,
  `important` enum('0','1') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phase_Delivery` enum('1','2','3','4','5','6','7','8','9','10','11','12') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `phases`
--

INSERT INTO `phases` (`id`, `title_ar`, `title_en`, `desc_ar`, `desc_en`, `status_id`, `notes`, `photo`, `start_date`, `end_date`, `delivery_date`, `Number_of_hours`, `important`, `phase_Delivery`, `created_at`, `updated_at`) VALUES
(1, 'انشاء الداتا بيز + عمل تصميم لوحه التحكم', 'Create Data Base + Create Design Dashboard', 'انشاء الداتا بيز + عمل تصميم لوحه التحكم', 'Create Data Base + Create Design Dashboard', 3, NULL, '1615130850.png', '2021-03-04', '2021-03-04', '2021-03-04', '00:00:08', NULL, '1', '2021-03-07 16:27:14', '2021-03-07 16:35:00'),
(2, 'الاعدادات + الاقسام', 'Setting + Department', 'الاعدادات + الاقسام', 'Setting + Department', 3, NULL, '1615131159.png', '2021-03-06', '2021-03-06', '2021-03-06', '00:00:08', NULL, '1', '2021-03-07 16:32:39', '2021-03-07 16:32:39'),
(3, 'المشاريع + من نحن + اتصل بنا', 'Project + About us + Contact us', 'المشاريع + من نحن + اتصل بنا', 'Project + About us + Contact us', 3, NULL, '1615131281.png', '2021-03-07', '2021-03-07', '2021-03-07', '00:00:08', NULL, '1', '2021-03-07 16:34:41', '2021-03-07 16:34:41'),
(4, 'الحالات الاجتماعيه + سلايدر + المستخدمين الموقع', 'Social statuses + slider + website users', 'الحالات الاجتماعيه + سلايدر + المستخدمين الموقع', 'Social statuses + slider + website users', 1, NULL, '1615131462.png', '2021-03-08', '2021-03-08', NULL, '00:00:08', NULL, '1', '2021-03-07 16:37:02', '2021-03-07 16:37:42'),
(5, 'الصلاحيات + المديرين', 'Admin + Role', 'الصلاحيات + المديرين', 'Admin + Role', 7, NULL, '1615131534.png', '2021-03-09', '2021-03-09', NULL, '00:00:05', NULL, '1', '2021-03-07 16:38:54', '2021-03-10 18:10:58'),
(6, 'عمل الواجه للموقع + الرئيسيه', 'Create Frontend + Home', 'عمل الواجه للموقع + الرئيسيه', 'Create Frontend + Home', 7, NULL, '1615131674.png', '2021-03-10', '2021-03-10', NULL, '00:00:08', NULL, '1', '2021-03-07 16:41:14', '2021-03-10 18:11:26'),
(7, 'عرض المشاريع + عرض تفاصيل المشروع', 'Project + Project Details', 'عرض المشاريع + عرض تفاصيل المشروع', 'Project + Project Details', 7, NULL, '1615132181.png', '2021-03-11', '2021-03-11', NULL, '00:00:05', NULL, '1', '2021-03-07 16:49:41', '2021-03-10 18:11:46'),
(8, 'من نحن + اتصل بنا + التبرعات', 'Who We Are + Contact Us + Donations', 'من نحن + اتصل بنا + التبرعات', 'Who We Are + Contact Us + Donations', 7, NULL, '1615132423.png', '2021-03-13', '2021-03-13', NULL, '00:00:05', NULL, '1', '2021-03-07 16:53:43', '2021-03-10 18:12:05'),
(9, 'الحالات الاجتماعيه + تسجيل دخول + تسجيل', 'Social status + login + registration', 'الحالات الاجتماعيه + تسجيل دخول + تسجيل', 'Social status + login + registration', 7, NULL, '1615132578.png', '2021-03-14', '2021-03-14', NULL, '00:00:05', NULL, '1', '2021-03-07 16:56:18', '2021-03-10 18:12:22'),
(10, 'حسابي + المفضله + تبرعاتي', 'My Account + Favorites + Donations', 'حسابي + المفضله + تبرعاتي', 'My Account + Favorites + Donations', 7, NULL, '1615132756.png', '2021-03-15', '2021-03-15', NULL, '00:00:05', NULL, '1', '2021-03-07 16:59:16', '2021-03-10 18:12:40'),
(11, 'التيست', 'Test', 'التيست', 'Test', 7, NULL, '1615133081.png', '2021-03-16', '2021-03-17', NULL, '00:00:05', NULL, '1', '2021-03-07 17:04:41', '2021-03-10 18:12:57'),
(12, 'انشاء الداتا بيز + عمل تصميم لوحه التحكم', 'Create Data Base + Create Design Dashboard', 'انشاء الداتا بيز + عمل تصميم لوحه التحكم', 'Create Data Base + Create Design Dashboard', 7, NULL, '1615133352.jpeg', '2021-03-06', '2021-03-06', '2021-03-06', '00:00:08', NULL, '1', '2021-03-07 17:09:12', '2021-03-10 18:13:34'),
(13, 'الاعدادات + من نحن + اتصل بنا', 'Settings + About us + Contact Us', 'الاعدادات + من نحن + اتصل بنا', 'Settings + About us + Contact Us', 7, NULL, '1615133493.jpeg', '2021-03-07', '2021-03-07', NULL, '00:00:08', NULL, '1', '2021-03-07 17:11:33', '2021-03-10 18:13:52'),
(14, 'سلايدر + الشروط والاحكام', 'Slider + terms and conditions', 'سلايدر + الشروط والاحكام', 'Slider + terms and conditions', 7, NULL, '1615133633.jpeg', '2021-03-08', '2021-03-08', NULL, '00:00:08', NULL, '1', '2021-03-07 17:13:53', '2021-03-10 18:14:13'),
(15, 'الاقسام', 'Department', 'الاقسام', 'Department', 1, NULL, '1615133754.jpeg', '2021-03-09', '2021-03-09', NULL, '00:00:08', NULL, '1', '2021-03-07 17:15:54', '2021-03-07 17:15:54'),
(16, 'الاعلانات التجارية', 'Commercial ads', 'الاعلانات التجارية', 'Commercial ads', 7, NULL, '1615133825.jpeg', '2021-03-10', '2021-03-10', NULL, '00:00:08', NULL, '1', '2021-03-07 17:17:05', '2021-03-10 18:15:18'),
(17, 'الاعلانات', 'Ads', 'الاعلانات', 'Ads', 7, NULL, '1615133864.jpeg', '2021-03-11', '2021-03-11', NULL, '00:00:08', NULL, '1', '2021-03-07 17:17:44', '2021-03-10 18:15:43'),
(18, 'الصلاحيات + المديرين', 'Admin + Role', 'الصلاحيات + المديرين', 'Admin + Role', 7, NULL, '1615133919.jpeg', '2021-03-13', '2021-03-13', NULL, '00:00:08', NULL, '1', '2021-03-07 17:18:39', '2021-03-10 18:16:05'),
(19, 'عمل الواجهه للموقع + الرئيسيه + من نحن + الشروط والاحكام', 'Create Frontend + Home + About us + Terms and Conditions', 'عمل الواجه للموقع + الرئيسيه + من نحن + الشروط والاحكام', 'Create Frontend + Home + About us + Terms and Conditions', 7, NULL, '1615134013.jpeg', '2021-03-14', '2021-03-14', NULL, '00:00:08', NULL, '1', '2021-03-07 17:20:13', '2021-03-10 18:16:26'),
(20, 'عرض الاعلانات + تفاصيل الاعلان + اتصل بنا', 'Display ads + ad details + Contact us', 'عرض الاعلانات + تفاصيل الاعلان + اتصل بنا', 'Display ads + ad details + Contact us', 7, NULL, '1615134210.jpeg', '2021-03-15', '2021-03-15', NULL, '00:00:08', NULL, '1', '2021-03-07 17:23:30', '2021-03-10 18:16:54'),
(21, 'تسجيل دخول + تسجيل + حسابي + المفضله + اعلاناتي', 'Login + Register + My Account + Favorites + My Ads', 'تسجيل دخول + تسجيل + حسابي + المفضله + اعلاناتي', 'Login + Register + My Account + Favorites + My Ads', 7, NULL, '1615134567.jpeg', '2021-03-16', '2021-03-16', NULL, '00:00:08', NULL, '1', '2021-03-07 17:29:27', '2021-03-10 18:17:15'),
(22, 'التيست', 'Test', 'التيست', 'Test', 7, NULL, '1615134624.jpeg', '2021-03-17', '2021-03-18', NULL, '00:00:08', NULL, '1', '2021-03-07 17:30:24', '2021-03-10 18:17:32'),
(23, 'اليوزر مانوال و العرض الفني', 'user manual & technical support', NULL, NULL, 4, NULL, '', '2021-03-08', '2021-03-08', '2021-03-09', '00:00:02', NULL, '1', '2021-03-08 09:02:07', '2021-03-08 19:31:34'),
(24, 'عمل مستخدم تظهر التقارير', 'Create user Report', 'عمل مستخدم تظهر التقارير', 'Create user Report', 7, 'لا يوجد', '1615228251.png', '2021-03-09', '2021-03-09', NULL, '00:00:02', NULL, '1', '2021-03-08 19:30:51', '2021-03-08 19:30:51'),
(25, 'عمل صفحه المهام لليوزر و الادمن', 'Create Task Page User & admin', 'عمل صفحه المهام لليوزر و الادمن', 'Create Task Page User & admin', 1, 'لا بوجد', '1615228548.png', '2021-03-09', '2021-03-09', NULL, '00:00:08', '0', '1', '2021-03-08 19:35:48', '2021-04-05 14:59:38'),
(26, 'تصميم اللوجو والبنرات و السبلاش سكرين', 'Logo Design + Banners + Splash screen', 'تصميم اللوجو والبنرات و السبلاش سكرين', 'Logo Design + Banners + Splash screen', 6, 'لا يوجد', '1615275441.png', '2021-03-09', '2021-03-09', NULL, '00:00:03', NULL, '1', '2021-03-09 08:37:21', '2021-03-09 08:37:21'),
(27, 'تقرير بالاخطاء', 'Error Report', 'تقرير بالاخطاء', 'Error Report', 7, NULL, '1615311839.png', '2021-03-10', '2021-03-10', NULL, '00:00:03', NULL, '1', '2021-03-09 18:43:59', '2021-03-09 18:43:59'),
(28, 'انشاء الداتا بيز + عمل تصميم لوحه التحكم', 'Create Data Base + Create Design Dashboard', 'انشاء الداتا بيز + عمل تصميم لوحه التحكم', 'Create Data Base + Create Design Dashboard', 5, NULL, '1615389369.png', '2021-03-11', '2021-03-11', NULL, '00:00:08', '1', '1', '2021-03-10 16:16:09', '2021-04-05 15:22:47'),
(29, 'تعديل الملاحظات', 'Edit Notes', 'تعديل الملاحظات', 'Edit Notes', 7, NULL, '1615395485.png', '2021-03-11', '2021-03-14', NULL, '00:00:09', NULL, '1', '2021-03-10 17:58:05', '2021-03-10 19:08:54'),
(30, 'تست', 'test', 'تست', 'test', 10, NULL, '', '2021-04-05', '2021-04-06', '2021-04-07', '00:00:16', '1', '1', '2021-04-05 14:47:25', '2021-04-05 14:47:25');

-- --------------------------------------------------------

--
-- Table structure for table `phases__request_extra_hours`
--

CREATE TABLE `phases__request_extra_hours` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `phase_id` int(10) UNSIGNED DEFAULT NULL,
  `The_number_of_hours` int(11) NOT NULL,
  `Reason_for_the_delay` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `phases__request_extra_hours`
--

INSERT INTO `phases__request_extra_hours` (`id`, `phase_id`, `The_number_of_hours`, `Reason_for_the_delay`, `created_at`, `updated_at`) VALUES
(1, 1, 6, 'سبب التأخير  سبب التأخير  سبب التأخير', '2021-04-26 11:31:37', '2021-04-26 11:31:37'),
(2, 1, 30, 'سبب التأخير سبب التأخير سبب التأخير سبب التأخير', '2021-04-26 11:32:59', '2021-04-26 11:32:59');

-- --------------------------------------------------------

--
-- Table structure for table `phase_projects_teams`
--

CREATE TABLE `phase_projects_teams` (
  `id` int(10) UNSIGNED NOT NULL,
  `phases_id` int(10) UNSIGNED NOT NULL,
  `project_id` int(10) UNSIGNED NOT NULL,
  `developers_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `phase_projects_teams`
--

INSERT INTO `phase_projects_teams` (`id`, `phases_id`, `project_id`, `developers_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 18, '2021-03-07 16:27:14', '2021-03-07 16:35:00'),
(2, 2, 1, 18, '2021-03-07 16:32:39', '2021-03-07 16:32:39'),
(3, 3, 1, 18, '2021-03-07 16:34:41', '2021-03-07 16:34:41'),
(4, 4, 1, 18, '2021-03-07 16:37:02', '2021-03-07 16:37:42'),
(5, 5, 1, 18, '2021-03-07 16:38:54', '2021-03-10 18:10:58'),
(6, 6, 1, 18, '2021-03-07 16:41:14', '2021-03-10 18:11:26'),
(7, 7, 1, 18, '2021-03-07 16:49:41', '2021-03-10 18:11:46'),
(8, 8, 1, 18, '2021-03-07 16:53:43', '2021-03-10 18:12:05'),
(9, 9, 1, 18, '2021-03-07 16:56:18', '2021-03-10 18:12:22'),
(10, 10, 1, 18, '2021-03-07 16:59:16', '2021-03-10 18:12:40'),
(11, 11, 1, 21, '2021-03-07 17:04:41', '2021-03-10 18:12:57'),
(12, 12, 2, 15, '2021-03-07 17:09:12', '2021-03-10 18:13:34'),
(13, 13, 2, 15, '2021-03-07 17:11:33', '2021-03-10 18:13:52'),
(14, 14, 2, 15, '2021-03-07 17:13:53', '2021-03-10 18:14:13'),
(15, 15, 2, 15, '2021-03-07 17:15:54', '2021-03-07 17:15:54'),
(16, 16, 2, 15, '2021-03-07 17:17:05', '2021-03-10 18:15:18'),
(17, 17, 2, 15, '2021-03-07 17:17:44', '2021-03-10 18:15:43'),
(18, 18, 2, 15, '2021-03-07 17:18:39', '2021-03-10 18:16:05'),
(19, 19, 2, 15, '2021-03-07 17:20:13', '2021-03-10 18:16:26'),
(20, 20, 2, 15, '2021-03-07 17:23:30', '2021-03-10 18:16:54'),
(21, 21, 2, 15, '2021-03-07 17:29:27', '2021-03-10 18:17:15'),
(22, 22, 2, 21, '2021-03-07 17:30:24', '2021-03-10 18:17:32'),
(23, 23, 10, 20, '2021-03-08 09:02:07', '2021-03-08 19:31:34'),
(24, 24, 10, 14, '2021-03-08 19:30:51', '2021-03-08 19:30:51'),
(25, 25, 14, 18, '2021-03-08 19:35:48', '2021-04-05 14:59:38'),
(26, 26, 2, 23, '2021-03-09 08:37:21', '2021-03-09 08:37:21'),
(27, 27, 10, 14, '2021-03-09 18:43:59', '2021-03-09 18:43:59'),
(28, 28, 4, 18, '2021-03-10 16:16:09', '2021-04-05 15:22:47'),
(29, 29, 14, 18, '2021-03-10 17:58:05', '2021-03-10 19:08:54'),
(30, 30, 16, 14, '2021-04-05 14:47:25', '2021-04-05 14:47:25');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(10) UNSIGNED NOT NULL,
  `Projectname_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Projectname_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc_ar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc_en` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `registration_date` date NOT NULL,
  `end_date` date NOT NULL,
  `delivery_date` date DEFAULT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `priority` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `Projectname_ar`, `Projectname_en`, `desc_ar`, `desc_en`, `status_id`, `start_date`, `registration_date`, `end_date`, `delivery_date`, `notes`, `photo`, `priority`, `created_at`, `updated_at`) VALUES
(1, 'موقع رحماء', 'Rohama Website', 'موقع خاص لجمعيه خيره ويمكن اضافه المشاريع الخاصه بها ويتم عمليه التبرع من خلال الموقع', 'A special site for the charity association, and special projects can be added to it, and the donation process is done through the site', 7, '2021-03-04', '2021-03-03', '2021-03-20', '2021-03-20', 'لا يوجد', '1614809494.png', 'high', '2021-03-03 23:11:34', '2021-03-08 15:01:03'),
(2, 'فورسيل', '4Sale', 'موقع لاضافه الاعلانات', 'Web To add your Ads', 7, '2021-03-04', '2021-03-04', '2021-03-20', '2021-03-20', 'لايوجد', '1615038677.jpeg', 'high', '2021-03-06 14:51:17', '2021-03-08 19:45:20'),
(3, 'في ايت', 'V8', 'حل مشاكل الموبيل', 'Solve mobile problems', 1, '2021-03-07', '2021-03-07', '2021-03-31', NULL, 'لا يوجد', '1615136641.png', 'midiom', '2021-03-07 18:04:01', '2021-03-07 18:04:01'),
(4, 'ماركاتوا', 'Markatoo', 'تحويل الموقع من ورد بريس ال PHP', 'Converting a site from WordPress to PHP', 1, '2021-03-07', '2021-03-07', '2021-03-31', NULL, 'لا يوجد', '1615136899.png', 'midiom', '2021-03-07 18:08:19', '2021-03-07 18:08:19'),
(5, 'الشات بوت', 'Chat bot', 'الشات بوت', 'Chat bot', 1, '2021-03-07', '2021-03-07', '2021-03-31', NULL, 'لا يوجد', '1615213066.png', 'low', '2021-03-07 18:12:27', '2021-03-08 18:49:25'),
(6, 'البث المباشر', 'live stream', 'البث المباشر', 'live stream', 4, '2021-03-07', '2021-03-07', '2021-03-31', NULL, 'لا يوجد', '1615137425.png', 'high', '2021-03-07 18:17:05', '2021-03-08 19:40:44'),
(7, 'الملابس', 'Fashion', 'الملابس', 'Fashion', 1, '2021-03-07', '2021-03-07', '2021-03-31', NULL, 'لا يوجد', '1615137652.png', 'low', '2021-03-07 18:20:52', '2021-03-08 18:51:05'),
(8, 'المزاد', 'The auction', 'المزاد', 'The auction', 1, '2021-03-07', '2021-03-07', '2021-03-31', NULL, 'لايوجد', '1615138189.png', 'low', '2021-03-07 18:29:49', '2021-03-08 18:51:43'),
(9, 'الوسيط', 'Al waset', 'الوسيط', 'Al waset', 1, '2021-03-07', '2021-03-07', '2021-03-31', NULL, 'لايوجد', '1615138270.png', 'low', '2021-03-07 18:31:10', '2021-03-08 18:51:52'),
(10, 'وزارة التربية ( أشرفكوا)', 'MOE -ASHRAFCO', 'سيستم أصدار تقارير', NULL, 7, '2021-03-08', '2021-03-08', '2021-03-11', NULL, 'بدون العرض الفني واعتماده من العميل لم يتم التسليم ولم يتم استلام اي مبالغ لان لم يتم التوقيع علي اي مواصفات فنيه', '1615213051.png', 'high', '2021-03-08 08:49:05', '2021-03-08 19:28:54'),
(11, 'موقع كوانتم', 'Quantam Website', 'موقع كوانتم', 'Quantam Website', 7, '2021-03-09', '2021-03-08', '2021-03-13', NULL, 'لايوجد', '1615226755.png', 'high', '2021-03-08 19:05:55', '2021-03-10 17:06:44'),
(12, 'العميري', 'Alimairi', 'العميري', 'Alimairi', 7, '2021-03-09', '2021-03-08', '2021-03-11', NULL, 'لا يوجد', '1615226908.png', 'high', '2021-03-08 19:08:28', '2021-03-10 17:07:10'),
(13, 'اي ريسيرف', 'I reserve', 'اي ريسيرف', 'I reserve', 8, '2021-03-09', '2021-03-08', '2021-03-11', NULL, 'لا يوجد', '1615227687.png', 'high', '2021-03-08 19:21:27', '2021-03-08 19:23:46'),
(14, 'الداش بورد', 'Dashboard', 'الداش بورد', 'Dashboard', 8, '2021-03-09', '2021-03-08', '2021-03-15', NULL, 'لا يوجد', '1615228406.png', 'high', '2021-03-08 19:33:26', '2021-03-10 17:57:18'),
(15, 'بوتيكات مصر', 'Egypt Boutiqaat', 'بوتيكات مصر', 'Egypt Boutiqaat', 1, '2021-03-13', '2021-03-13', '2021-04-30', NULL, NULL, '1615653304.png', 'midiom', '2021-03-13 17:35:04', '2021-03-13 17:35:04'),
(16, 'اى ريسيرف', 'I reserve', 'اى ريسيرف', 'I reserve', 2, '2021-02-01', '2021-01-01', '2021-04-08', '2021-04-11', NULL, '', 'high', '2021-04-05 14:33:51', '2021-04-05 14:33:51');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `title_ar` text COLLATE utf8_unicode_ci NOT NULL,
  `title_en` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `title_ar`, `title_en`, `created_at`, `updated_at`) VALUES
(1, 'قيد الانتظار', 'pending', '0000-00-00', '2021-04-05'),
(2, 'جاري التنفيذ', 'processing', '2021-02-27', '2021-03-03'),
(3, 'تم الانتهاء', 'Completed', '2021-02-27', '2021-03-03'),
(4, 'التحليل والعرض الفني', 'Analysis & Technical Proposal', '2021-03-07', '2021-03-07'),
(5, 'انشاء قواعد البيانات', 'Create Database', '2021-03-07', '2021-03-07'),
(6, 'التصميم', 'Design', '2021-03-07', '2021-03-07'),
(7, 'البرمجه والكود', 'Development &Coding', '2021-03-07', '2021-03-07'),
(8, 'تست كود', 'Code testing', '2021-03-07', '2021-03-07'),
(9, 'الرفع علي السيرفر', 'Deploy to server', '2021-03-07', '2021-03-07'),
(10, 'التست النهائي', 'Final Test', '2021-03-07', '2021-03-07'),
(11, 'التسليم', 'Delivery', '2021-03-07', '2021-03-07');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phonenumber` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `jobtitle_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jobtitle_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','unactive','available','notavailable') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `gender` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `api_token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phonenumber`, `type`, `jobtitle_ar`, `jobtitle_en`, `address`, `photo`, `password`, `status`, `gender`, `api_token`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'عمر رؤوف ', 'admin@admin.com', '01222164649', 'admin', 'مدير', 'Manager', 'الزقازيق', '1615124142.jpeg', '$2y$10$2G7YwOmlped9Js0XrTep9.NsgmH5ViDDhqNd5OInpliXh9v7Qf2pq', 'available', 'male', 'sdfsdfsdfsdfsdfsdf', NULL, NULL, '2021-03-07 14:47:38'),
(14, 'م/محمد ابراهيم', 'm.ebrahem@bit-kw.com', '01149880297', 'user', 'مبرمج', 'devloper', 'بلبيس', '1614808078.jpeg', '$2y$10$MhZXXgZipzVXZn/wiH7lW.eR/aJb1PyjMBDqLwFdldeUMkofB6iBG', 'available', 'male', '', NULL, '2021-02-28 11:50:05', '2021-03-07 15:36:19'),
(15, 'اسلام جمال', 'eslamgamal@bit-kw.com', '01023262138', 'user', 'مبرمج', 'Developer', 'المنصوره', '1614808664.jpeg', '$2y$10$nbTS/SfsXU7IjKwFZg8DG.xmiNiLyjBJ/Xi1UOMVQ6g0NG0h1LQAq', 'available', 'male', '', NULL, '2021-03-03 22:57:44', '2021-03-07 15:37:33'),
(18, 'م /الاء عثمان', 'alaaosman@bit-kw.com', '0000000000000', 'user', 'مبرمج', 'Developer', 'بلبيس', '1614870421.jpeg', '$2y$10$SXByJbdQ82v.gDwUadPxt.U695XVKmnD5p5iw66KHwRnY/JwXIZsS', 'available', 'female', '', NULL, '2021-03-04 16:07:01', '2021-03-07 15:37:01'),
(19, 'م/ ايمن سليم', 'ayman.selim278@gmail.com', '0096550295930', 'admin', 'رئيس مجلس الادارة', 'Chairman of Board of Directors', 'Kuwait', '', '$2y$10$xM17YZ5Qyw7K73KYH63l8OwXqsN.wgIBnHK6hL5XLcpwfsIBacaBO', 'available', 'male', '', NULL, '2021-03-07 09:38:45', '2021-03-07 09:38:45'),
(20, 'م/ محمد علاءالدين', 'M.alaa@bit-kw.com', '01095957575', 'admin', 'مبرمج', 'Developer', 'الزقازيق', '1615124273.jpeg', '$2y$10$VKY8o/nGMdSZqxC6WqIR4eGm8AOIuawT1efbdXIyWNq.ZljU6ZAai', 'available', 'male', '', NULL, '2021-03-07 14:37:53', '2021-03-08 15:03:34'),
(21, 'م/ احمد جمال', 'A.gamal@bit-kw.com', '1000089379', 'admin', 'تيستر', 'Tester', 'الزقازيق', '1615128101.jpeg', '$2y$10$bEiXc3YoptATh1CMAmY9H.Jk9kHPINOOpPjP2JFHTCLSJrEpTGKE6', 'available', 'male', '', NULL, '2021-03-07 15:41:42', '2021-04-07 09:04:47'),
(22, 'فاطمة باسم', 'fatmah.bassem@bit-kw.com', '01121598868', 'user', 'سوشيال ميديا + مساعد المدير', 'Social media + Assistant', 'الزقازيق', '', '$2y$10$6luoWQ3lPXtOUfp8.53fHuHNFi5nFiyqsYXG7wu8NluqJc7YMGKGW', 'available', 'female', '', NULL, '2021-03-09 08:02:05', '2021-04-07 09:04:22'),
(23, 'مصعب منير رمضان', 'mosab@bit-kw.com', '01032449535', 'user', 'مصمم جرافيك', 'Graphic Designer', 'كفر هربيط-ابوكبير-الشرقية', '', '$2y$10$MPEadk.xaFQoVND0v1x8Cuer98mENHHt7BnQMn32FNH/bG5xT5Q5a', 'available', 'male', '', NULL, '2021-03-09 08:06:56', '2021-03-09 08:06:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attachments`
--
ALTER TABLE `attachments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attachments_project_id_foreign` (`project_id`),
  ADD KEY `attachments_phase_id_foreign` (`phase_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_phases_id_foreign` (`phases_id`),
  ADD KEY `comments_project_id_foreign` (`project_id`),
  ADD KEY `comments_developers_id_foreign` (`developers_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
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
  ADD KEY `password_resets_email_index` (`email`(191));

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phases`
--
ALTER TABLE `phases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phases__request_extra_hours`
--
ALTER TABLE `phases__request_extra_hours`
  ADD PRIMARY KEY (`id`),
  ADD KEY `phases__request_extra_hours_phase_id_foreign` (`phase_id`);

--
-- Indexes for table `phase_projects_teams`
--
ALTER TABLE `phase_projects_teams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `phase_projects_teams_phases_id_foreign` (`phases_id`),
  ADD KEY `phase_projects_teams_project_id_foreign` (`project_id`),
  ADD KEY `phase_projects_teams_developers_id_foreign` (`developers_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
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
-- AUTO_INCREMENT for table `attachments`
--
ALTER TABLE `attachments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phases`
--
ALTER TABLE `phases`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `phases__request_extra_hours`
--
ALTER TABLE `phases__request_extra_hours`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `phase_projects_teams`
--
ALTER TABLE `phase_projects_teams`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `phases__request_extra_hours`
--
ALTER TABLE `phases__request_extra_hours`
  ADD CONSTRAINT `phases__request_extra_hours_phase_id_foreign` FOREIGN KEY (`phase_id`) REFERENCES `phases` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
