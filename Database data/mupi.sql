-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 05, 2023 at 05:35 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mupi`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` bigint UNSIGNED NOT NULL,
  `account_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `educational_qualification` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_designation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `account_name`, `account_phone_number`, `account_email`, `educational_qualification`, `account_designation`, `account_image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 're', '513', 'lapoci@mailinator.com', 'sojylobetu@mailinator.com', 'CraftInstructor', '1_1675577724oKyDON.jfif', '2023-02-05 06:03:33', '2023-02-05 06:15:24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_status` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `category_slug`, `category_image`, `category_description`, `category_status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'qalena', 'cylegocev-at-mailinatorcom', '1_1675173180.png', 'Voluptatibus esse ni', 'active', '2023-01-31 13:53:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint UNSIGNED NOT NULL,
  `contact_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contracts`
--

CREATE TABLE `contracts` (
  `id` bigint UNSIGNED NOT NULL,
  `contract_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contract_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `deparment_job`
--

CREATE TABLE `deparment_job` (
  `id` bigint UNSIGNED NOT NULL,
  `job_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `deparment_job`
--

INSERT INTO `deparment_job` (`id`, `job_id`, `department_id`, `created_at`, `updated_at`) VALUES
(1, '1', '2', '2023-03-01 06:00:22', '2023-03-01 06:00:22'),
(2, '2', '3', '2023-03-01 06:00:31', '2023-03-01 06:00:31');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint UNSIGNED NOT NULL,
  `department_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department_about` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `department_name`, `department_image`, `department_about`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'Computer', '1_1675661311.jfif', 'Accusantium nesciunt', '2023-02-06 05:28:31', NULL, NULL),
(3, 'Civil', '1_1675661386.jfif', 'Fugiat sint veritati', '2023-02-06 05:29:46', NULL, NULL),
(4, 'RAC', '1_1675661529.jfif', 'Mollit facilis et of', '2023-02-06 05:32:09', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `department_project`
--

CREATE TABLE `department_project` (
  `id` bigint UNSIGNED NOT NULL,
  `project_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `department_project`
--

INSERT INTO `department_project` (`id`, `project_id`, `department_id`, `created_at`, `updated_at`) VALUES
(2, '2', '3', '2023-02-03 16:07:23', '2023-02-03 16:07:23'),
(3, '3', '3', '2023-02-03 16:13:35', '2023-02-03 16:13:35');

-- --------------------------------------------------------

--
-- Table structure for table `department_result`
--

CREATE TABLE `department_result` (
  `id` bigint UNSIGNED NOT NULL,
  `department_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `result_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `department_result`
--

INSERT INTO `department_result` (`id`, `department_id`, `result_id`, `created_at`, `updated_at`) VALUES
(1, '3', '1', '2023-02-03 02:54:49', '2023-02-03 02:54:49'),
(2, '3', '2', '2023-02-03 03:13:31', '2023-02-03 03:13:31'),
(3, '1', '3', '2023-02-03 03:27:40', '2023-02-03 03:27:40'),
(4, '3', '4', '2023-02-03 04:38:07', '2023-02-03 04:38:07'),
(5, '3', '9', '2023-02-06 15:15:54', '2023-02-06 15:15:54'),
(6, '2', '10', '2023-02-06 15:16:02', '2023-02-06 15:16:02');

-- --------------------------------------------------------

--
-- Table structure for table `department_routine`
--

CREATE TABLE `department_routine` (
  `id` bigint UNSIGNED NOT NULL,
  `department_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `routine_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `department_routine`
--

INSERT INTO `department_routine` (`id`, `department_id`, `routine_id`, `created_at`, `updated_at`) VALUES
(1, '3', '1', '2023-02-03 04:36:45', '2023-02-03 04:36:45'),
(2, '1', '2', '2023-02-03 05:02:03', '2023-02-03 05:02:03'),
(3, '0', '3', '2023-02-03 05:07:09', '2023-02-03 05:07:09'),
(4, '1', '4', '2023-02-03 05:10:13', '2023-02-03 05:10:13'),
(7, '2', '7', '2023-02-03 05:14:19', '2023-02-03 05:14:19');

-- --------------------------------------------------------

--
-- Table structure for table `department_student`
--

CREATE TABLE `department_student` (
  `id` bigint UNSIGNED NOT NULL,
  `student_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `department_student`
--

INSERT INTO `department_student` (`id`, `student_id`, `department_id`, `created_at`, `updated_at`) VALUES
(1, '2', '3', '2023-02-02 13:44:18', '2023-02-02 13:44:18'),
(2, '3', '3', '2023-02-02 13:44:27', '2023-02-02 13:44:27'),
(3, '4', '3', '2023-02-02 14:11:49', '2023-02-02 14:11:49'),
(4, '5', '3', '2023-02-02 14:28:18', '2023-02-02 14:28:18'),
(6, '7', '3', '2023-02-02 14:30:49', '2023-02-02 14:30:49'),
(7, '8', '3', '2023-02-28 15:59:05', '2023-02-28 15:59:05'),
(8, '9', '3', '2023-02-28 15:59:11', '2023-02-28 15:59:11'),
(9, '10', '3', '2023-02-28 15:59:18', '2023-02-28 15:59:18'),
(10, '11', '3', '2023-02-28 15:59:25', '2023-02-28 15:59:25'),
(11, '12', '3', '2023-02-28 15:59:35', '2023-02-28 15:59:35'),
(12, '13', '3', '2023-02-28 15:59:41', '2023-02-28 15:59:41'),
(13, '14', '3', '2023-02-28 15:59:59', '2023-02-28 15:59:59'),
(14, '15', '3', '2023-02-28 16:00:18', '2023-02-28 16:00:18'),
(15, '16', '3', '2023-02-28 16:00:23', '2023-02-28 16:00:23'),
(16, '17', '3', '2023-02-28 16:00:39', '2023-02-28 16:00:39'),
(17, '18', '3', '2023-02-28 16:00:53', '2023-02-28 16:00:53');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `jober_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jober_phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jober_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `passing_year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jober_district` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jober_company` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jober_roll` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jober_department` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jober_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jober_address` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `jober_designation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jober_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `jober_name`, `jober_phone_number`, `jober_email`, `passing_year`, `jober_district`, `jober_company`, `jober_roll`, `jober_department`, `jober_status`, `jober_address`, `jober_designation`, `jober_image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Timon Tillman', '414', 'gasuxar@mailinator.com', '2013', 'Dolor vel aute assum', 'Dawson and Gonzalez Traders', 'tiricaze', '2', 'active', 'Culpa dolore repudia', 'Voluptates voluptati', '1_1677650422.png', '2023-03-01 06:00:22', NULL, NULL),
(2, 'Sawyer Carson', '512', 'madijuhoz@mailinator.com', '1984', 'Dolor reprehenderit', 'Sears and Mclean Co', 'hygedynu', '3', 'inactive', 'Quia autem culpa fu', 'Omnis et aut consect', '1_1677650430.png', '2023-03-01 06:00:30', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `libraries`
--

CREATE TABLE `libraries` (
  `id` bigint UNSIGNED NOT NULL,
  `librarian_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `librarian_phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `librarian_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `educational_qualification` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `librarian_designation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `librarian_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `libraries`
--

INSERT INTO `libraries` (`id`, `librarian_name`, `librarian_phone_number`, `librarian_email`, `educational_qualification`, `librarian_designation`, `librarian_image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(7, 'mavevyf', '20', 'wywevu@mailinator.com', 'jalybudo@mailinator.com', 'CashSarkar', '1_1675572652.jfif', '2023-02-05 04:50:52', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_12_13_225339_add_cols_to_users_table', 1),
(6, '2022_12_19_203758_create_categories_table', 1),
(7, '2022_12_20_101338_create_sub_categories_table', 1),
(8, '2023_01_03_190600_create_tags_table', 1),
(9, '2023_01_10_212003_create_post_tags_table', 1),
(10, '2023_01_13_223746_create_posts_table', 1),
(12, '2023_01_30_211600_create_photo_galleries_table', 2),
(16, '2023_02_01_100523_create_teachers_table', 5),
(18, '2023_02_01_113314_create_teacher_department_table', 6),
(20, '2023_02_02_184130_create_students_table', 7),
(21, '2023_02_02_191648_create_department_student_table', 7),
(22, '2023_02_02_213400_create_contracts_table', 8),
(23, '2023_02_03_082217_create_results_table', 9),
(24, '2023_02_03_084301_create_department_result_table', 10),
(25, '2023_02_03_093951_create_routines_table', 11),
(26, '2023_02_03_094059_create_department_routine_table', 11),
(29, '2023_02_03_205355_create_projects_table', 12),
(30, '2023_02_03_205456_create_department_project_table', 12),
(32, '2023_02_03_230725_create_principals_table', 13),
(33, '2023_02_04_211430_create_offices_table', 14),
(35, '2023_02_04_223427_create_registrars_table', 15),
(36, '2023_02_04_232226_create_libraries_table', 16),
(37, '2023_02_05_111412_create_stores_table', 17),
(38, '2023_02_05_115124_create_accounts_table', 18),
(39, '2023_02_05_122059_create_securities_table', 19),
(48, '2023_02_05_184535_create_jobs_table', 20),
(49, '2023_02_05_190021_create_deparment_job_table', 20),
(50, '2023_02_01_090432_create_departments_table', 21),
(51, '2023_02_27_225208_create_people_table', 22),
(52, '2023_01_31_212854_create_notices_table', 23),
(53, '2023_03_01_194647_create_contacts_table', 24);

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

CREATE TABLE `notices` (
  `id` bigint UNSIGNED NOT NULL,
  `notice_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notice_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notice_description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notices`
--

INSERT INTO `notices` (`id`, `notice_name`, `notice_image`, `notice_description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'kezip', '1_1677649130.jfif', 'Veniam nisi placeat', '2023-03-01 05:38:50', NULL, NULL),
(2, 'lezefanuse', '1_1677649316.jfif', 'Minim fugiat totam l', '2023-03-01 05:41:56', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `offices`
--

CREATE TABLE `offices` (
  `id` bigint UNSIGNED NOT NULL,
  `officer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `officer_phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `officer_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `educational_qualification` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `officer_designation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `officer_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `offices`
--

INSERT INTO `offices` (`id`, `officer_name`, `officer_phone_number`, `officer_email`, `educational_qualification`, `officer_designation`, `officer_image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 'quvunidyvo', '55', 'nubibogyhi@mailinator.com', 'rijyja@mailinator.com', 'HeadAssistant', '1_16755283286nAUjs.jfif', '2023-02-04 16:21:02', '2023-02-04 16:32:15', NULL);

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
-- Table structure for table `people`
--

CREATE TABLE `people` (
  `id` bigint UNSIGNED NOT NULL,
  `persone_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `persone_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `persone_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `people`
--

INSERT INTO `people` (`id`, `persone_name`, `persone_title`, `persone_image`, `created_at`, `updated_at`) VALUES
(5, 'ডা. দীপু মনি', 'মাননীয়_মন্ত্রী', '1_1677690368.jpg', '2023-03-01 17:06:08', NULL),
(6, 'মহিবুল হাসান চৌধুরী', 'মাননীয়_উপমন্ত্রী', '1_1677690393.png', '2023-03-01 17:06:33', NULL),
(7, 'জনাব মোঃ কামাল হোসেন', 'সচিব', '1_1677690418.png', '2023-03-01 17:06:58', NULL),
(8, 'ড. মোঃ ওমর ফারুক', 'মহাপরিচালক', '1_1677690438.png', '2023-03-01 17:07:18', NULL),
(9, 'ড. প্রকৌঃ সুশীল কুমার পাল', 'অধ্যক্ষ', '1_1677690458.png', '2023-03-01 17:07:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `photo_galleries`
--

CREATE TABLE `photo_galleries` (
  `id` bigint UNSIGNED NOT NULL,
  `program_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mupi_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `photo_galleries`
--

INSERT INTO `photo_galleries` (`id`, `program_name`, `mupi_image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 'huxolez', '1_1675101126.jfif', '2023-01-30 17:52:06', '2023-01-31 17:51:57', '2023-01-31 17:51:57'),
(4, 'jyseji', '1_1675101160.jfif', '2023-01-30 17:52:40', NULL, NULL),
(5, 'hyqez', '1_1675101187.jfif', '2023-01-30 17:53:07', NULL, NULL),
(7, 'gipede', '1_1677563381.jfif', '2023-02-28 05:49:41', NULL, NULL),
(8, 'womylilodu', '1_1677563386.jfif', '2023-02-28 05:49:46', NULL, NULL),
(9, 'dakofu', '1_1677563392.jfif', '2023-02-28 05:49:52', NULL, NULL),
(10, 'mehuverymi', '1_1677563436.jfif', '2023-02-28 05:50:36', NULL, NULL),
(11, 'bigizus', '1_1677563442.jfif', '2023-02-28 05:50:42', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint UNSIGNED NOT NULL,
  `writer` int NOT NULL,
  `post_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_thambnail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_parent_category` int NOT NULL,
  `post_sub_category` int DEFAULT NULL,
  `post_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_kind` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `writer`, `post_title`, `post_slug`, `post_thambnail`, `post_parent_category`, `post_sub_category`, `post_status`, `post_type`, `post_kind`, `post_description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 1, 'didequsul', 'safebomus-at-mailinatorcom', '1_1675176331.jfif', 1, 1, 'active', 'inactive', 'populer', '<?xml encoding=\"utf-8\" ?><p>Qui excepturi fugiat.<span style=\'color: rgba(0, 0, 0, 0.8); font-family: \"Source Sans Pro\", sans-serif; font-size: 12.15px; letter-spacing: -0.03645px; text-align: justify;\'>Lorem ipsum dolor sit amet consectetur adipiscing elit placerat pretium primis, luctus nullam parturient risus lacinia tortor blandit hendrerit nec sem nisl, fermentum eu morbi tristique quam suspendisse elementum urna felis. Vulputate pellentesque risus accumsan lobortis tincidunt nullam ultricies pharetra, nulla eget pretium platea scelerisque egestas rutrum, sem a posuere interdum conubia luctus phasellus.</span></p>\n', '2023-01-31 14:45:31', NULL, NULL),
(3, 1, 'cecuzyxe', 'sozo-at-mailinatorcom', '1_1675341438.jfif', 1, 1, 'active', 'inactive', 'populer', '<?xml encoding=\"utf-8\" ?><span style=\'color: rgba(0, 0, 0, 0.8); font-family: \"Source Sans Pro\", sans-serif; font-size: 12.15px; letter-spacing: -0.03645px; text-align: justify;\'>Lorem ipsum dolor sit amet consectetur adipiscing elit, placerat sed fermentum sapien lacus suscipit conubia dictumst, eu phasellus taciti scelerisque augue arcu. Risus aptent magnis bibendum dui tristique mauris congue netus, nascetur justo dignissim laoreet sollicitudin ante sem, convallis mi porta tempus leo lacus arcu. Tellus et eget vivamus litora non mi lacinia, lectus parturient mauris scelerisque fringilla justo pretium, facilisis curae tempus pellentesque magnis nostra. Fringilla orci dictum nam tempor sociosqu scelerisque sociis nunc lacinia posuere, netus penatibus diam vestibulum taciti et massa metus justo, malesuada at id mollis conubia aenean rhoncus rutrum sodales. Taciti a himenaeos aenean mattis mi fringilla tristique, ad tempor arcu dignissim turpis id, eros pretium felis habitasse malesuada lectus. Velit enim tempus suspendisse dignissim mi torquent viverra bibendum dapibus quam, interdum quis libero porttitor luctus convallis sollicitudin semper neque duis, lacinia odio mollis pulvinar nunc facilisis augue lobortis iaculis. Vehicula fusce quam cubilia aliquet tellus dignissim nam, erat orci mollis aenean taciti nulla, hendrerit placerat mus vivamus tempus facilisis.</span>\n', '2023-02-02 12:37:18', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `post_tags`
--

CREATE TABLE `post_tags` (
  `id` bigint UNSIGNED NOT NULL,
  `post_id` int NOT NULL,
  `tag_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `principals`
--

CREATE TABLE `principals` (
  `id` bigint UNSIGNED NOT NULL,
  `principal_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `principal_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `principal_message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `principal_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `institute_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `principals`
--

INSERT INTO `principals` (`id`, `principal_name`, `principal_image`, `principal_message`, `principal_title`, `institute_name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(4, 'ড. প্রকৌঃ সুশীল কুমার পাল', '1_1678036226.png', 'Munshiganj Polytechnic Institute started its journey on 22/07/2006. As the infrastructure work of the new building was not completed, it first started operations with 2 technology computers and electronics in Munshiganj Technical School and College.', 'Principal', 'Munshiganj Polytechnic Institute', '2023-03-05 17:10:26', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint UNSIGNED NOT NULL,
  `project_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_details` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `project_name`, `department`, `project_details`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'levyseg', '3', '<?xml encoding=\"utf-8\" ?><p><span style=\'color: rgba(0, 0, 0, 0.8); font-family: \"Source Sans Pro\", sans-serif; font-size: 12.15px; letter-spacing: -0.03645px; text-align: justify;\'>Lorem ipsum dolor sit amet consectetur adipiscing elit dictum, donec commodo phasellus cum interdum ac dignissim dui, rutrum suspendisse ante rhoncus netus cras laoreet. Quam neque est praesent conubia nam bibendum platea ullamcorper ridiculus condimentum integer suspendisse ligula aliquam, mollis morbi lobortis lacus felis commodo cubilia senectus ornare turpis pulvinar euismod. Cursus sed penatibus ad ante torquent placerat egestas fusce netus nibh laoreet, potenti nec interdum eros ridiculus et lacinia a felis cras. Ornare est fames semper maecenas turpis neque vel praesent, leo eu mattis nisi orci lectus venenatis a auctor, dictum aenean nulla luctus posuere ante malesuada.</span></p><p><img style=\"width: 225px;\" data-filename=\"brand2.png\" src=\"http://127.0.0.1:8000/uploads/project_details/1_1675440443rRKYW_2023.png\"><img style=\"width: 225px;\" data-filename=\"brand3.png\" src=\"http://127.0.0.1:8000/uploads/project_details/1_1675440443f7uKD_2023.png\"><span style=\'color: rgba(0, 0, 0, 0.8); font-family: \"Source Sans Pro\", sans-serif; font-size: 12.15px; letter-spacing: -0.03645px; text-align: justify;\'><br></span></p>\n', '2023-02-03 16:07:23', NULL, NULL),
(3, 'lujan', '3', '<?xml encoding=\"utf-8\" ?><p><span style=\'color: rgba(0, 0, 0, 0.8); font-family: \"Source Sans Pro\", sans-serif; font-size: 12.15px; letter-spacing: -0.03645px; text-align: justify;\'>Lorem ipsum dolor sit amet consectetur adipiscing elit vitae nulla dis augue, posuere scelerisque et aliquam semper lacus dictum maecenas dapibus. Sed massa dis faucibus tempor natoque facilisis libero netus congue metus volutpat, hac tellus penatibus aliquet lacus est blandit eget posuere ligula, ad lobortis consequat luctus at taciti nostra praesent curae odio. Euismod nam maecenas fringilla ullamcorper tempor nulla integer, potenti aliquet eros diam aenean ornare, tristique ut curabitur mus fermentum ligula. Tristique arcu neque felis conubia vel morbi quis integer, ridiculus litora etiam pharetra torquent sociosqu dis, nulla sagittis diam nisi vitae dictumst ac. Turpis id pellentesque varius sociosqu venenatis lectus curabitur urna, justo viverra ultrices mollis cum litora nostra nisl suspendisse, inceptos sed tellus tempus ligula ornare malesuada. Diam sapien auctor nascetur morbi eleifend vivamus neque porta ullamcorper senectus netus, facilisi cras sociis per proin suscipit taciti est ut etiam erat, dui laoreet eget conubia dictumst congue volutpat enim tincidunt blandit. Dui tincidunt vivamus viverra rutrum aptent convallis egestas, a cum nisi integer odio ac nibh, pretium ultricies consequat lectus hendrerit class.</span><img style=\"width: 103.984px;\" data-filename=\"p2.jpg\" src=\"http://127.0.0.1:8000/uploads/project_details/1_1675440815fqm29_2023.jpeg\"><img style=\"width: 942.227px;\" data-filename=\"profile pic.jpg\" src=\"http://127.0.0.1:8000/uploads/project_details/1_1675440815skgBM_2023.jpeg\"></p>\n', '2023-02-03 16:13:35', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `registrars`
--

CREATE TABLE `registrars` (
  `id` bigint UNSIGNED NOT NULL,
  `registrar_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `registrar_phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `registrar_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `educational_qualification` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `registrar_designation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `registrar_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `registrars`
--

INSERT INTO `registrars` (`id`, `registrar_name`, `registrar_phone_number`, `registrar_email`, `educational_qualification`, `registrar_designation`, `registrar_image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 'cyhyhica', '321', 'gupivocuva@mailinator.com', 'nobyf@mailinator.com', 'AsstLiberian', '1_1675573125.jfif', '2023-02-05 04:58:45', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `id` bigint UNSIGNED NOT NULL,
  `result_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `academic_year` int NOT NULL,
  `result_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `result_shift` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `result_seemester` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`id`, `result_title`, `academic_year`, `result_image`, `department`, `result_shift`, `result_seemester`, `created_at`, `updated_at`, `deleted_at`) VALUES
(10, 'Magni et provident', 2012, '1_1675696562.pdf', '2', '2nd', '7th', '2023-02-06 15:16:02', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `routines`
--

CREATE TABLE `routines` (
  `id` bigint UNSIGNED NOT NULL,
  `routine_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `routine_shift` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `routine_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `routine_seemester` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `routine_year` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `routines`
--

INSERT INTO `routines` (`id`, `routine_title`, `department`, `routine_shift`, `routine_image`, `routine_seemester`, `routine_year`, `created_at`, `updated_at`, `deleted_at`) VALUES
(7, 'ridwan rahman', '2', '2nd', '1_1675434738DQQ2z8.png', '2nd', 1976, '2023-02-03 05:14:19', '2023-02-03 14:32:19', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `securities`
--

CREATE TABLE `securities` (
  `id` bigint UNSIGNED NOT NULL,
  `security_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `security_phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `security_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `educational_qualification` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `security_designation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `security_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `securities`
--

INSERT INTO `securities` (`id`, `security_name`, `security_phone_number`, `security_email`, `educational_qualification`, `security_designation`, `security_image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'kemeq', '141', 'vugipa@mailinator.com', 'pamopoz@mailinator.com', 'Guard', '1_1677995608.jfif', '2023-03-05 05:53:28', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `stores`
--

CREATE TABLE `stores` (
  `id` bigint UNSIGNED NOT NULL,
  `store_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `store_phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `store_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `educational_qualification` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `store_designation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `store_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stores`
--

INSERT INTO `stores` (`id`, `store_name`, `store_phone_number`, `store_email`, `educational_qualification`, `store_designation`, `store_image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'mosokac', '238', 'jerekyva@mailinator.com', 'bypo@mailinator.com', 'StoreKeeper', '1_1677995354.jfif', '2023-03-05 05:49:14', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint UNSIGNED NOT NULL,
  `student_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_roll` int NOT NULL,
  `student_registretion` int NOT NULL,
  `student_phone_number` int NOT NULL,
  `student_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_about` text COLLATE utf8mb4_unicode_ci,
  `student_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_shift` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_seemester` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `student_name`, `student_roll`, `student_registretion`, `student_phone_number`, `student_email`, `student_about`, `student_image`, `department`, `student_shift`, `student_seemester`, `created_at`, `updated_at`, `deleted_at`) VALUES
(7, 'lyqytem', 24, 60, 111, 'pexecizu@mailinator.com', 'Nesciunt voluptas t', '1_1675348249.png', '3', '1st', '7th', '2023-02-02 14:30:49', '2023-02-02 15:29:49', NULL),
(8, 'hovejo', 55, 9, 411, 'tigikomybe@mailinator.com', 'Ducimus cupiditate', '1_1677599944.jfif', '3', '2nd', '7th', '2023-02-28 15:59:05', NULL, NULL),
(9, 'rugeky', 77, 15, 896, 'funygyma@mailinator.com', 'Quis magna proident', '1_1677599951.png', '3', '1st', '1st', '2023-02-28 15:59:11', NULL, NULL),
(10, 'qafyd', 46, 5, 614, 'cyhuwebyf@mailinator.com', 'Veniam consequat N', '1_1677599958.jfif', '3', '1st', '6th', '2023-02-28 15:59:18', NULL, NULL),
(11, 'jevutuc', 27, 90, 744, 'cuvoq@mailinator.com', 'Velit deleniti perfe', '1_1677599965.jfif', '3', '1st', '8th', '2023-02-28 15:59:25', NULL, NULL),
(12, 'myjuv', 67, 99, 95, 'danobe@mailinator.com', 'Quia et esse consequ', '1_1677599975.jfif', '3', '2nd', '6th', '2023-02-28 15:59:35', NULL, NULL),
(13, 'xotafar', 79, 76, 596, 'gofit@mailinator.com', 'Animi atque maxime', '1_1677599981.jfif', '3', '1st', '4th', '2023-02-28 15:59:41', NULL, NULL),
(14, 'buzoly', 90, 51, 122, 'kymagus@mailinator.com', 'Delectus aut possim', '1_1677599999.jfif', '3', '1st', '5th', '2023-02-28 15:59:59', NULL, NULL),
(15, 'mapico', 82, 66, 697, 'mikytihage@mailinator.com', 'Quos eum est do pos', '1_1677600018.png', '3', '2nd', '1st', '2023-02-28 16:00:18', NULL, NULL),
(16, 'jivenazy', 38, 12, 138, 'qyqed@mailinator.com', 'Cupidatat saepe quae', '1_1677600023.png', '3', '1st', '7th', '2023-02-28 16:00:23', NULL, NULL),
(17, 'gavubedyc', 66, 2, 620, 'fucafigom@mailinator.com', 'Qui a adipisicing ni', '1_1677600039.png', '3', '1st', '7th', '2023-02-28 16:00:39', NULL, NULL),
(18, 'syqawanik', 87, 56, 958, 'cakupe@mailinator.com', 'Sit dolor sint ull', '1_1677600053.png', '3', '1st', '1st', '2023-02-28 16:00:53', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `parent_id` int NOT NULL,
  `subcategory_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subcategory_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subcategory_image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `subcategory_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `subcategory_status` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `parent_id`, `subcategory_name`, `subcategory_slug`, `subcategory_image`, `subcategory_description`, `subcategory_status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'kyjihovi', 'zafokyqa-at-mailinatorcom', '1_1675176310.png', 'Officia veritatis la', 'inactive', '2023-01-31 14:45:10', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint UNSIGNED NOT NULL,
  `tag_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` bigint UNSIGNED NOT NULL,
  `teacher_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `teacher_phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `teacher_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `teacher_about` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `teacher_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `teacher_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `teacher_name`, `teacher_phone_number`, `teacher_email`, `teacher_about`, `teacher_image`, `department`, `teacher_title`, `created_at`, `updated_at`, `deleted_at`) VALUES
(45, 'hupyjeli', '385', 'culetotazi@mailinator.com', 'Culpa quia a obcaeca', '1_1677558063.jpg', '3', 'CI', '2023-02-28 04:21:04', NULL, NULL),
(46, 'vezuwo', '552', 'xanawyvej@mailinator.com', 'Ipsa occaecat cumqu', '1_1677559004.jfif', '4', 'instractor', '2023-02-28 04:36:44', NULL, NULL),
(47, 'pububeqy', '721', 'qywewyfo@mailinator.com', 'Fuga Magni sunt mol', '1_1677559013.jfif', '4', 'instractor', '2023-02-28 04:36:53', NULL, NULL),
(48, 'lywat', '786', 'huwerakipe@mailinator.com', 'Dolor quia ipsum qua', '1_1677559021.jfif', '2', 'juniorinstractor', '2023-02-28 04:37:01', NULL, NULL),
(49, 'hitawajoc', '336', 'tilezejin@mailinator.com', 'Amet culpa qui aut', '1_1677559028.png', '3', 'instractor', '2023-02-28 04:37:08', NULL, NULL),
(50, 'nowamaba', '155', 'kivitukyn@mailinator.com', 'Ad in repellendus Q', '1_1677559036.jfif', '2', 'instractor', '2023-02-28 04:37:16', NULL, NULL),
(51, 'sofuholaf', '305', 'qemiju@mailinator.com', 'Eum aut et obcaecati', '1_1677559498.jfif', '2', 'instractor', '2023-02-28 04:44:58', NULL, NULL),
(52, 'nuwypymu', '985', 'sojaz@mailinator.com', 'Et facilis pariatur', '1_1677559506.jfif', '4', 'juniorinstractor', '2023-02-28 04:45:06', NULL, NULL),
(53, 'vycurycum', '121', 'wagywavy@mailinator.com', 'Est autem nulla eve', '1_1677559512.jfif', '2', 'CI', '2023-02-28 04:45:12', NULL, NULL),
(54, 'tejamitu', '982', 'faqihucony@mailinator.com', 'Nulla et nesciunt v', '1_1677559519.png', '4', 'instractor', '2023-02-28 04:45:19', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `teacher_department`
--

CREATE TABLE `teacher_department` (
  `id` bigint UNSIGNED NOT NULL,
  `teacher_id` int NOT NULL,
  `department_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teacher_department`
--

INSERT INTO `teacher_department` (`id`, `teacher_id`, `department_id`, `created_at`, `updated_at`) VALUES
(7, 43, 0, '2023-02-02 15:20:25', '2023-02-02 15:20:25'),
(8, 44, 1, '2023-02-02 15:20:39', '2023-02-02 15:20:39'),
(9, 45, 3, '2023-02-28 04:21:04', '2023-02-28 04:21:04'),
(10, 46, 4, '2023-02-28 04:36:44', '2023-02-28 04:36:44'),
(11, 47, 4, '2023-02-28 04:36:53', '2023-02-28 04:36:53'),
(12, 48, 2, '2023-02-28 04:37:01', '2023-02-28 04:37:01'),
(13, 49, 3, '2023-02-28 04:37:08', '2023-02-28 04:37:08'),
(14, 50, 2, '2023-02-28 04:37:16', '2023-02-28 04:37:16'),
(15, 51, 2, '2023-02-28 04:44:58', '2023-02-28 04:44:58'),
(16, 52, 4, '2023-02-28 04:45:06', '2023-02-28 04:45:06'),
(17, 53, 3, '2023-02-28 04:45:12', '2023-02-28 04:45:12'),
(18, 54, 4, '2023-02-28 04:45:19', '2023-02-28 04:45:19');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'subscriber',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cover_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `role`, `created_at`, `updated_at`, `address`, `phone_number`, `gender`, `profile_image`, `cover_image`) VALUES
(1, 'bajuvo', 'myxejexyje@mailinator.com', NULL, '$2y$10$Xmga8kUAWQk9el6r3SO6c.T91dyro6TnWs318JeUuHkTfPFV0a2n.', '1Mi6KK5XqlAD7Y1IfDbOyfegYhCtUffSgjS74ocEkWPvhq85pVEhyNpdmWvX', 'subscriber', '2023-01-30 14:15:57', '2023-02-07 16:13:32', NULL, NULL, 'female', NULL, '1.jpg');

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_category_name_unique` (`category_name`),
  ADD UNIQUE KEY `categories_category_slug_unique` (`category_slug`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contracts`
--
ALTER TABLE `contracts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deparment_job`
--
ALTER TABLE `deparment_job`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department_project`
--
ALTER TABLE `department_project`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department_result`
--
ALTER TABLE `department_result`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department_routine`
--
ALTER TABLE `department_routine`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department_student`
--
ALTER TABLE `department_student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `libraries`
--
ALTER TABLE `libraries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notices`
--
ALTER TABLE `notices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offices`
--
ALTER TABLE `offices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `people`
--
ALTER TABLE `people`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `photo_galleries`
--
ALTER TABLE `photo_galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_post_title_unique` (`post_title`),
  ADD UNIQUE KEY `posts_post_slug_unique` (`post_slug`);

--
-- Indexes for table `post_tags`
--
ALTER TABLE `post_tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `principals`
--
ALTER TABLE `principals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registrars`
--
ALTER TABLE `registrars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `routines`
--
ALTER TABLE `routines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `securities`
--
ALTER TABLE `securities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stores`
--
ALTER TABLE `stores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sub_categories_subcategory_name_unique` (`subcategory_name`),
  ADD UNIQUE KEY `sub_categories_subcategory_slug_unique` (`subcategory_slug`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher_department`
--
ALTER TABLE `teacher_department`
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
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contracts`
--
ALTER TABLE `contracts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `deparment_job`
--
ALTER TABLE `deparment_job`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `department_project`
--
ALTER TABLE `department_project`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `department_result`
--
ALTER TABLE `department_result`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `department_routine`
--
ALTER TABLE `department_routine`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `department_student`
--
ALTER TABLE `department_student`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `libraries`
--
ALTER TABLE `libraries`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `notices`
--
ALTER TABLE `notices`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `offices`
--
ALTER TABLE `offices`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `people`
--
ALTER TABLE `people`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `photo_galleries`
--
ALTER TABLE `photo_galleries`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `post_tags`
--
ALTER TABLE `post_tags`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `principals`
--
ALTER TABLE `principals`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `registrars`
--
ALTER TABLE `registrars`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `routines`
--
ALTER TABLE `routines`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `securities`
--
ALTER TABLE `securities`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `stores`
--
ALTER TABLE `stores`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `teacher_department`
--
ALTER TABLE `teacher_department`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
