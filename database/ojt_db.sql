-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 25, 2024 at 04:26 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ojt_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `academic_years`
--

CREATE TABLE `academic_years` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `academic_year` varchar(255) NOT NULL,
  `semester` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `academic_years`
--

INSERT INTO `academic_years` (`id`, `academic_year`, `semester`, `created_at`, `updated_at`) VALUES
(1, '2024', '1', '2024-04-26 15:09:41', '2024-04-26 15:09:41');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `job_descriptions` text DEFAULT NULL,
  `qualifications` text DEFAULT NULL,
  `salary_s` varchar(255) DEFAULT NULL,
  `salary_e` varchar(255) DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `level` varchar(255) DEFAULT NULL,
  `experience_length` int(11) DEFAULT NULL,
  `education_per` int(11) DEFAULT NULL,
  `skill_per` int(11) DEFAULT NULL,
  `work_exp_per` int(11) DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `stat` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `user_id`, `title`, `position`, `location`, `job_descriptions`, `qualifications`, `salary_s`, `salary_e`, `remarks`, `level`, `experience_length`, `education_per`, `skill_per`, `work_exp_per`, `status`, `stat`, `created_at`, `updated_at`) VALUES
(1, 3, 'Mobile Application UI/UX Designer', 'OJT/Intern', 'Taguig City', '%3Cp%3E%3C%2Fp%3E%3Cul%3E%3Cli%3E%3Cspan+style%3D%22font-size%3A+1rem%3B%22%3EManagement+of+Company+Portfolio+Documents+and+related+Files+in+terms+of+UI%2FUX+Design%3C%2Fspan%3E%3C%2Fli%3E%3Cli%3E%3Cspan+style%3D%22font-size%3A+1rem%3B%22%3EResponsible+for+developing+Mobile+App+pages+transitions+and+work+closely+with+software+engineering+and+IT+Team%3C%2Fspan%3E%3C%2Fli%3E%3Cli%3E%3Cspan+style%3D%22font-size%3A+1rem%3B%22%3EMaintain+versions+of+developed+UI%2FUX+designs+made+on+Figma+for+prototype+and+Flutter+and+Android+Studio+files+for+source+codes%3C%2Fspan%3E%3C%2Fli%3E%3Cli%3E%3Cspan+style%3D%22font-size%3A+1rem%3B%22%3EMaintain+github+and+gitlab+files%3C%2Fspan%3E%3C%2Fli%3E%3Cli%3E%3Cspan+style%3D%22font-size%3A+1rem%3B%22%3ERevise+and+debug+source+codes+for+Android+Studio+%28Java+or+Kotlin%29+and+Flutter+files%3C%2Fspan%3E%3C%2Fli%3E%3Cli%3E%3Cspan+style%3D%22font-size%3A+1rem%3B%22%3ERedesign+changes+from+existing+mobile+application+UI%2FUX+design%3C%2Fspan%3E%3C%2Fli%3E%3Cli%3E%3Cspan+style%3D%22font-size%3A+1rem%3B%22%3ECollaborate+to+brainstorming+on+existing+and+new+projects+regarding+with+UI%2FUX+design+on+mobile+application%3C%2Fspan%3E%3C%2Fli%3E%3C%2Ful%3E%3Cp%3E%3C%2Fp%3E', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Active', '0', '2024-09-21 11:00:58', '2024-09-21 11:01:33');

-- --------------------------------------------------------

--
-- Table structure for table `job_educations`
--

CREATE TABLE `job_educations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `job_id` int(11) NOT NULL,
  `education` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_experiences`
--

CREATE TABLE `job_experiences` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `job_id` int(11) NOT NULL,
  `experience` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_skills`
--

CREATE TABLE `job_skills` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `job_id` int(11) NOT NULL,
  `skill` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_skills`
--

INSERT INTO `job_skills` (`id`, `job_id`, `skill`, `created_at`, `updated_at`) VALUES
(1, 1, 'Familiarity with Github', '2024-09-21 11:00:58', '2024-09-21 11:00:58'),
(2, 1, 'Familiarity with Gitlab', '2024-09-21 11:00:58', '2024-09-21 11:00:58'),
(3, 1, 'Can code in Android Studio (Kotlin or Java) and Flutter', '2024-09-21 11:00:58', '2024-09-21 11:00:58'),
(4, 1, 'Familiarity with Figma or other UI/UX Designing application', '2024-09-21 11:00:58', '2024-09-21 11:00:58'),
(5, 1, 'Can work individually or in a team', '2024-09-21 11:00:58', '2024-09-21 11:00:58'),
(6, 1, 'Able to create and redesign UI/UX design from Android Studio or Flutter', '2024-09-21 11:00:58', '2024-09-21 11:00:58'),
(7, 1, 'Good command communication skills', '2024-09-21 11:00:58', '2024-09-21 11:00:58'),
(8, 1, 'Can integrate ideas smooth in the team and can work, clarify and collaborate with the requirements of team', '2024-09-21 11:00:58', '2024-09-21 11:00:58'),
(9, 1, 'Can translate client\'s demand into something more creative and within the scope', '2024-09-21 11:00:58', '2024-09-21 11:00:58'),
(10, 1, 'Skills with Flutterflow, Adobe XD and Photoshop is not required but is a plus', '2024-09-21 11:00:58', '2024-09-21 11:00:58');

-- --------------------------------------------------------

--
-- Table structure for table `job_specializations`
--

CREATE TABLE `job_specializations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `job_id` int(11) NOT NULL,
  `specialization_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_specializations`
--

INSERT INTO `job_specializations` (`id`, `job_id`, `specialization_id`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '2024-09-21 11:00:58', '2024-09-21 11:00:58');

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
(4, '2023_01_24_084400_create_students_table', 1),
(5, '2023_01_24_084604_create_academic_years_table', 1),
(6, '2023_01_24_084813_create_student_ojts_table', 1),
(7, '2023_01_24_085056_create_roles_table', 1),
(8, '2023_01_24_085124_create_profiles_table', 1),
(9, '2023_01_29_110012_create_student_applications_table', 1),
(10, '2023_02_05_094746_create_student_skills_table', 1),
(11, '2023_02_05_095009_create_student_employments_table', 1),
(12, '2023_02_05_100543_create_schools_table', 1),
(13, '2023_02_15_022731_create_student_requirements_table', 1),
(14, '2023_03_18_103155_create_student_monitorings_table', 1),
(15, '2023_04_22_003708_create_signatories_table', 1),
(16, '2023_05_04_052345_create_student_evaluations_table', 1),
(17, '2023_05_25_103303_create_student_accomplishments_table', 1),
(18, '2024_04_26_232652_create_jobs_table', 1),
(19, '2024_04_26_232725_create_job_educations_table', 1),
(20, '2024_04_26_232733_create_job_experiences_table', 1),
(21, '2024_04_26_232742_create_job_skills_table', 1),
(22, '2024_04_26_232805_create_job_specializations_table', 1),
(23, '2024_04_26_233754_create_specializations', 1);

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
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `school_id` varchar(255) NOT NULL,
  `banner` varchar(255) DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `company_address` text DEFAULT NULL,
  `company_position` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `school_id`, `banner`, `company_name`, `company_address`, `company_position`, `last_name`, `first_name`, `middle_name`, `created_at`, `updated_at`) VALUES
(1, '2', '1726749906.jpg', NULL, NULL, NULL, 'Mister', 'Admin', NULL, '2024-05-24 14:55:04', '2024-09-19 12:45:07'),
(2, '1', NULL, NULL, NULL, NULL, 'LANADI', 'JEH', '', '2024-05-24 14:57:05', '2024-05-24 14:57:05'),
(3, '1', NULL, 'TORO CLOUD', 'CLARK CDC', 'HUMAR RESOURCE', 'DOE', 'JOHN', '', '2024-05-24 15:02:07', '2024-05-24 15:02:07');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Student', NULL, NULL),
(2, 'Coordinator', NULL, NULL),
(3, 'Partner Institution', NULL, NULL),
(4, 'Super Admin', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE `schools` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `school` varchar(255) NOT NULL,
  `internship_duration` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`id`, `school`, `internship_duration`, `status`, `created_at`, `updated_at`) VALUES
(1, 'SCHOOL OF COMPUTING', '486:00:00', 'Active', '2024-05-24 14:56:42', '2024-05-24 14:56:42');

-- --------------------------------------------------------

--
-- Table structure for table `signatories`
--

CREATE TABLE `signatories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `school_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `stat` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `specializations`
--

CREATE TABLE `specializations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `specialization` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `specializations`
--

INSERT INTO `specializations` (`id`, `specialization`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Medicine and Healthcare', 'Active', '2024-04-21 08:21:28', '2024-04-21 08:21:28'),
(2, 'Technology and Information Technology', 'Active', '2024-04-21 08:21:28', '2024-04-21 08:21:28'),
(3, 'Finance and Accounting', 'Active', '2024-04-21 08:21:28', '2024-04-21 08:21:28'),
(4, 'Engineering', 'Active', '2024-04-21 08:21:28', '2024-04-21 08:21:28'),
(5, 'Education', 'Active', '2024-04-21 08:21:28', '2024-04-21 08:21:28'),
(6, 'Business and Management', 'Active', '2024-04-21 08:21:28', '2024-04-21 08:21:28'),
(7, 'Arts and Entertainment', 'Active', '2024-04-21 08:21:28', '2024-04-21 08:21:28'),
(8, 'Legal', 'Active', '2024-04-21 08:21:28', '2024-04-21 08:21:28'),
(9, 'Science and Research', 'Active', '2024-04-21 08:21:28', '2024-04-21 08:21:28'),
(10, 'Marketing and Advertising', 'Active', '2024-04-21 08:21:28', '2024-04-21 08:21:28'),
(11, 'Social Work and Human Services', 'Active', '2024-04-21 08:21:28', '2024-04-21 08:21:28'),
(12, 'Hospitality and Tourism', 'Active', '2024-04-21 08:21:28', '2024-04-21 08:21:28'),
(13, 'Construction and Trades', 'Active', '2024-04-21 08:21:28', '2024-04-21 08:21:28'),
(14, 'Agriculture and Forestry', 'Active', '2024-04-21 08:21:28', '2024-04-21 08:21:28'),
(15, 'Sports and Fitness', 'Active', '2024-04-21 08:21:28', '2024-04-21 08:21:28');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `school_id` int(11) NOT NULL,
  `student_token` varchar(255) NOT NULL,
  `academic_year_id` int(11) NOT NULL,
  `student_number` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) DEFAULT NULL,
  `program` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  `parent_last_name` varchar(255) DEFAULT NULL,
  `parent_first_name` varchar(255) DEFAULT NULL,
  `parent_middle_name` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `stat` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `school_id`, `student_token`, `academic_year_id`, `student_number`, `image`, `last_name`, `first_name`, `middle_name`, `program`, `year`, `section`, `parent_last_name`, `parent_first_name`, `parent_middle_name`, `address`, `contact`, `status`, `stat`, `created_at`, `updated_at`) VALUES
(1, 1, 'D10000000J', 1, '10000000', NULL, 'DELA CRUZ', 'JOSE', 'A', 'BACHELOR OF SCIENCE IN INFORMATION TECHNOLOGY', '4', 'WD-402', NULL, NULL, NULL, NULL, NULL, 'Unregistered', '0', '2024-05-24 15:04:32', '2024-05-24 15:04:32'),
(2, 1, 'S20000000M', 1, '20000000', NULL, 'SANTOS', 'MARIA', 'B', 'BACHELOR OF SCIENCE IN INFORMATION TECHNOLOGY', '4', 'WD-402', NULL, NULL, NULL, NULL, NULL, 'Unregistered', '0', '2024-05-24 15:04:32', '2024-05-24 15:04:32'),
(3, 1, '', 1, '30000000', NULL, 'REYES', 'JUAN', 'C', 'BACHELOR OF SCIENCE IN INFORMATION TECHNOLOGY', '4', 'WD-402', 'parent', 'parent', 'parent', '24 sapangbato, san fernando, pampanga', '99190901112', 'Active', '0', '2024-05-24 15:04:32', '2024-09-23 15:26:32'),
(4, 1, '', 1, '40000000', NULL, 'BAUTISTA', 'ANA', 'D', 'BACHELOR OF SCIENCE IN INFORMATION TECHNOLOGY', '4', 'WD-402', 'name', 'Parent', 'guardian', '191 kakawati, san fernando, pampanga', '9919090111', 'Active', '0', '2024-05-24 15:04:32', '2024-09-23 12:40:48'),
(5, 1, '', 1, '50000000', NULL, 'OCAMPO', 'ANDRES', 'E', 'BACHELOR OF SCIENCE IN INFORMATION TECHNOLOGY', '4', 'WD-402', NULL, NULL, NULL, NULL, NULL, 'Active', '0', '2024-05-24 15:04:32', '2024-09-21 13:05:03'),
(6, 1, '', 1, '10000002', NULL, 'Salas', 'Ben', 'Rafael', '1', '4', 'WD-32', NULL, NULL, NULL, 'Russia', '991909111', 'Active', '0', '2024-09-24 13:37:02', '2024-09-25 02:25:25');

-- --------------------------------------------------------

--
-- Table structure for table `student_accomplishments`
--

CREATE TABLE `student_accomplishments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` int(11) NOT NULL,
  `date_start` varchar(255) NOT NULL,
  `date_end` varchar(255) NOT NULL,
  `accomplishment` varchar(255) NOT NULL,
  `hours_rendered` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `comment` varchar(225) NOT NULL,
  `grade` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_accomplishments`
--

INSERT INTO `student_accomplishments` (`id`, `student_id`, `date_start`, `date_end`, `accomplishment`, `hours_rendered`, `status`, `comment`, `grade`, `created_at`, `updated_at`) VALUES
(1, 3, '09-23-2024', '09-23-2024', '%3Cp%3EI+have+accomplished+a+UI%2FUX+design+for+Login+of+Toro+Cloud%3C%2Fp%3E', '00:00:00', 'Graded', 'magaling', 30, '2024-09-23 15:43:18', '2024-09-23 16:48:23'),
(2, 3, '09-24-2024', '09-24-2024', '%3Cp%3EI+have+created+flutter+and+react+native+function+integrated+with+firebase%3C%2Fp%3E', '00:00:00', 'Graded', 'kung may 32 lang yun na nilagay ko', 30, '2024-09-23 16:41:47', '2024-09-23 16:49:10');

-- --------------------------------------------------------

--
-- Table structure for table `student_applications`
--

CREATE TABLE `student_applications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  `stat` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_applications`
--

INSERT INTO `student_applications` (`id`, `student_id`, `job_id`, `status`, `stat`, `created_at`, `updated_at`) VALUES
(1, 4, 1, 'FOR COOR APPROVAL', 0, '2024-09-23 12:41:33', '2024-09-23 12:46:52'),
(2, 3, 1, 'Approved', 0, '2024-09-23 15:38:08', '2024-09-23 15:42:25');

-- --------------------------------------------------------

--
-- Table structure for table `student_employments`
--

CREATE TABLE `student_employments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` int(11) NOT NULL,
  `work_exp_company` varchar(255) NOT NULL,
  `work_exp_address` varchar(255) NOT NULL,
  `work_exp_position` varchar(255) NOT NULL,
  `work_exp_s_year` varchar(255) NOT NULL,
  `work_exp_e_year` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_evaluations`
--

CREATE TABLE `student_evaluations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` int(11) NOT NULL,
  `partner_id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `rating_1` int(11) NOT NULL,
  `rating_2` int(11) NOT NULL,
  `rating_3` int(11) NOT NULL,
  `rating_4` int(11) NOT NULL,
  `rating_5` int(11) NOT NULL,
  `rating_6` int(11) NOT NULL,
  `rating_7` int(11) NOT NULL,
  `rating_8` int(11) NOT NULL,
  `rating_9` int(11) NOT NULL,
  `rating_10` int(11) NOT NULL,
  `rating_11` int(11) NOT NULL,
  `rating_12` int(11) NOT NULL,
  `rating_13` int(11) NOT NULL,
  `rating_14` int(11) NOT NULL,
  `rating_15` int(11) NOT NULL,
  `rating_16` int(11) NOT NULL,
  `rating_17` int(11) NOT NULL,
  `rating_18` int(11) NOT NULL,
  `rating_19` int(11) NOT NULL,
  `rating_20` int(11) NOT NULL,
  `rating_21` int(11) NOT NULL,
  `rating_22` int(11) NOT NULL,
  `rating_23` int(11) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `date_eval` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `stat` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_evaluations`
--

INSERT INTO `student_evaluations` (`id`, `student_id`, `partner_id`, `job_id`, `rating_1`, `rating_2`, `rating_3`, `rating_4`, `rating_5`, `rating_6`, `rating_7`, `rating_8`, `rating_9`, `rating_10`, `rating_11`, `rating_12`, `rating_13`, `rating_14`, `rating_15`, `rating_16`, `rating_17`, `rating_18`, `rating_19`, `rating_20`, `rating_21`, `rating_22`, `rating_23`, `remarks`, `date_eval`, `status`, `stat`, `created_at`, `updated_at`) VALUES
(1, 3, 3, 1, 5, 4, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 4, 4, 4, 4, 4, 4, 5, 'magaling kumanta', '09-24-2024', 'Submitted', '0', '2024-09-23 19:55:13', '2024-09-23 19:55:13');

-- --------------------------------------------------------

--
-- Table structure for table `student_monitorings`
--

CREATE TABLE `student_monitorings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `partner_id` int(11) NOT NULL,
  `date_log` text DEFAULT NULL,
  `time_in` text DEFAULT NULL,
  `time_out` text DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_monitorings`
--

INSERT INTO `student_monitorings` (`id`, `student_id`, `job_id`, `partner_id`, `date_log`, `time_in`, `time_out`, `remarks`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 3, '09-23-2024', '9:00:00 AM', '3:00:00 PM', 'Approved: magaling', '2024-09-23 15:43:42', '2024-09-23 15:44:46');

-- --------------------------------------------------------

--
-- Table structure for table `student_ojts`
--

CREATE TABLE `student_ojts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` int(11) NOT NULL,
  `partner_id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `academic_year_id` int(11) NOT NULL,
  `evaluation` text DEFAULT NULL,
  `reflection` text DEFAULT NULL,
  `certificate` text DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_ojts`
--

INSERT INTO `student_ojts` (`id`, `student_id`, `partner_id`, `job_id`, `academic_year_id`, `evaluation`, `reflection`, `certificate`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, 3, 1, 1, 'COMPLETED', 'REYES JUAN REFLECTION.PDF', 'REYES JUAN CERTIFICATE OF COMPLETION.PDF', 'FOR COOR APPROVAL', '2024-09-23 15:42:25', '2024-09-24 12:58:36');

-- --------------------------------------------------------

--
-- Table structure for table `student_program`
--

CREATE TABLE `student_program` (
  `id` int(11) NOT NULL,
  `programe_name` varchar(225) NOT NULL,
  `school_id` int(11) NOT NULL,
  `date_time_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_requirements`
--

CREATE TABLE `student_requirements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `initial_req_1` varchar(255) DEFAULT NULL,
  `initial_req_2` varchar(255) DEFAULT NULL,
  `initial_req_3` varchar(255) DEFAULT NULL,
  `initial_req_4` varchar(255) DEFAULT NULL,
  `other_file_1` varchar(255) DEFAULT NULL,
  `other_file_2` varchar(255) DEFAULT NULL,
  `other_file_3` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_requirements`
--

INSERT INTO `student_requirements` (`id`, `student_id`, `job_id`, `initial_req_1`, `initial_req_2`, `initial_req_3`, `initial_req_4`, `other_file_1`, `other_file_2`, `other_file_3`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 'MOBILE APPLICATION UI/UX DESIGNER MACIE USER GUIDE.PDF', 'MOBILE APPLICATION UI/UX DESIGNER TEST.PDF', 'MOBILE APPLICATION UI/UX DESIGNER KEY PROMPT ENGINEERING STRATEGIES TO BALANCE COST, PERFORMANCE, AND ACCURACY.PDF', 'MOBILE APPLICATION UI/UX DESIGNER ANGULAR.PDF', NULL, NULL, NULL, '2024-09-23 15:40:20', '2024-09-23 15:40:20');

-- --------------------------------------------------------

--
-- Table structure for table `student_skills`
--

CREATE TABLE `student_skills` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` int(11) NOT NULL,
  `skill` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_skills`
--

INSERT INTO `student_skills` (`id`, `student_id`, `skill`, `created_at`, `updated_at`) VALUES
(1, 4, 'Programming', '2024-09-23 12:32:05', '2024-09-23 12:32:05'),
(2, 4, 'Multimedia Arts', '2024-09-23 12:32:15', '2024-09-23 12:32:15'),
(3, 3, 'UI/UX design on figma', '2024-09-23 15:25:57', '2024-09-23 15:25:57'),
(4, 3, 'familiarity and can code with flutter and react native', '2024-09-23 15:25:57', '2024-09-23 15:25:57');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `stat` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `profile_id`, `student_id`, `email`, `username`, `password`, `status`, `stat`, `created_at`, `updated_at`) VALUES
(1, 4, 1, 0, 'admin@email.com', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Active', '0', '2024-05-24 14:46:16', '2024-05-24 14:46:16'),
(2, 2, 2, 0, 'soc_coor@email.com', 'soc_coor', '58bad6b697dff48f4927941962f23e90', 'Active', '0', '2024-05-24 14:57:05', '2024-05-24 15:00:56'),
(3, 3, 3, 0, 'JOHNDOE@EMAIL.COM', 'partner_company', '58bad6b697dff48f4927941962f23e90', 'Active', '0', '2024-05-24 15:02:07', '2024-05-24 15:02:28'),
(4, 1, 0, 4, 'student_hau@email.com', 'student_hau', '58bad6b697dff48f4927941962f23e90', 'Active', '0', '2024-05-24 15:06:12', '2024-05-24 15:06:12'),
(5, 1, 0, 5, 'andresusername@gmail.co', 'andres_username', '1bbd886460827015e5d605ed44252251', 'Active', '0', '2024-09-21 13:05:03', '2024-09-21 13:05:03'),
(6, 1, 0, 3, 'juanreyes@gmail.com', 'juanreyes24', '58bad6b697dff48f4927941962f23e90', 'Active', '0', '2024-09-23 15:24:35', '2024-09-23 15:25:29'),
(7, 1, 0, 6, 'bensalas@gmail.com', 'bensalas@gmail.com', '58bad6b697dff48f4927941962f23e90', 'Active', '0', '2024-09-25 02:25:25', '2024-09-25 02:25:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academic_years`
--
ALTER TABLE `academic_years`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_educations`
--
ALTER TABLE `job_educations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_experiences`
--
ALTER TABLE `job_experiences`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_skills`
--
ALTER TABLE `job_skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_specializations`
--
ALTER TABLE `job_specializations`
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
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schools`
--
ALTER TABLE `schools`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `signatories`
--
ALTER TABLE `signatories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `specializations`
--
ALTER TABLE `specializations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_accomplishments`
--
ALTER TABLE `student_accomplishments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_applications`
--
ALTER TABLE `student_applications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_employments`
--
ALTER TABLE `student_employments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_evaluations`
--
ALTER TABLE `student_evaluations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_monitorings`
--
ALTER TABLE `student_monitorings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_ojts`
--
ALTER TABLE `student_ojts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_program`
--
ALTER TABLE `student_program`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_requirements`
--
ALTER TABLE `student_requirements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_skills`
--
ALTER TABLE `student_skills`
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
-- AUTO_INCREMENT for table `academic_years`
--
ALTER TABLE `academic_years`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `job_educations`
--
ALTER TABLE `job_educations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `job_experiences`
--
ALTER TABLE `job_experiences`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `job_skills`
--
ALTER TABLE `job_skills`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `job_specializations`
--
ALTER TABLE `job_specializations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `signatories`
--
ALTER TABLE `signatories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `specializations`
--
ALTER TABLE `specializations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `student_accomplishments`
--
ALTER TABLE `student_accomplishments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student_applications`
--
ALTER TABLE `student_applications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student_employments`
--
ALTER TABLE `student_employments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_evaluations`
--
ALTER TABLE `student_evaluations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `student_monitorings`
--
ALTER TABLE `student_monitorings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `student_ojts`
--
ALTER TABLE `student_ojts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `student_program`
--
ALTER TABLE `student_program`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_requirements`
--
ALTER TABLE `student_requirements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `student_skills`
--
ALTER TABLE `student_skills`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
