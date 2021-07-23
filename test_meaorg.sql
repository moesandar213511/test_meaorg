-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:4306
-- Generation Time: Jul 23, 2021 at 11:21 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test_meaorg`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `photo`, `name`, `content`, `created_at`, `updated_at`) VALUES
(9, '5ddb74c61b6a8_0914.jpg', 'xzdcfsdfdsfs1111', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum nihil veritatis officia culpa excepturi iure corporis saepe dolorem sint quo, ratione odio porro, autem quibusdam sequi itaque nesciunt doloribus quas.', '2019-11-24 23:05:10', '2019-11-26 02:08:53'),
(10, '5ddb74f57a72f_1017_Thinkin_Scene.jpg', 'sfsdfsdfsdfsd', 'sfdsfsdfsdfsdfsdfsdf', '2019-11-24 23:59:59', '2019-11-25 00:00:13'),
(11, '5de58c24b4acc_005.jpg', 'Test Blog', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit tenetur, pariatur qui, odit consequuntur recusandae quasi corrupti suscipit iusto voluptatem molestiae ex similique esse laborum provident aspernatur. Dolores, officiis quaerat.', '2019-12-02 15:41:48', '2019-12-02 15:41:48'),
(12, '03.jpg', 'mon blog', 'sdfsdfsdfsdf', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `logo`, `name`, `created_at`, `updated_at`) VALUES
(9, '5de453172d8c5_cat6.png', 'Hotel & Tourism', '2019-11-27 13:55:45', '2019-12-01 17:26:07'),
(10, '5de44f33a3f98_cat2.png', 'Education', '2019-11-27 13:56:47', '2019-12-01 17:09:31'),
(11, '5de44f2a44b5f_cat7.png', 'aaa', '2019-12-01 17:07:35', '2019-12-01 17:09:22'),
(12, '5de44f207ab5c_cat6.png', 'bbb', '2019-12-01 17:07:45', '2019-12-01 17:09:12'),
(13, '5de44f158b604_cat4.png', 'ccc', '2019-12-01 17:07:58', '2019-12-01 17:09:01'),
(14, '5de44f0c23e79_cat3.png', 'dddd', '2019-12-01 17:08:52', '2019-12-01 17:08:52');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `member_id` int(11) NOT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `web_url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fb_link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `what_we_do` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `why_join_us` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `vision` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `mission` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `about_us` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ad_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `member_id`, `logo`, `name`, `category_id`, `email`, `phone`, `address`, `web_url`, `fb_link`, `what_we_do`, `why_join_us`, `vision`, `mission`, `about_us`, `company_type`, `ad_date`, `created_at`, `updated_at`) VALUES
(11, 4, '5de3af78318c0_444.jpg', 'yamin software', 10, 'yaminsoftware@gmail.com', '09876678876', 'Thingangyun', 'http://greenhackersinstitute.com/', 'http://greenhackersinstitute.com/', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'normal', '2019-12-27', '2019-12-01 05:48:00', '2019-12-01 05:48:00'),
(12, 4, '5de3b04aa920b_566.jpg', 'Yamin Hotel Company', 10, 'yaminlay@gmail.com', '09876678876', 'Thingangyun', 'http://greenhackersinstitute.com/', 'http://greenhackersinstitute.com/', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'normal', '2019-12-28', '2019-12-01 05:51:30', '2019-12-02 16:21:44'),
(14, 3, '5de3c41a28fd2_013.jpg', 'Phyo Restaurant Company 111', 10, 'restaurant@gmail.com', '09876543345', 'Thar Kay Ta', 'http://greenhackersinstitute.com/', 'http://greenhackersinstitute.com/', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'normal', '2019-12-13', '2019-12-01 07:16:02', '2019-12-01 07:24:06');

-- --------------------------------------------------------

--
-- Table structure for table `company__galleries`
--

CREATE TABLE `company__galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `photos` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `company__galleries`
--

INSERT INTO `company__galleries` (`id`, `photos`, `company_id`, `created_at`, `updated_at`) VALUES
(46, '5de3af784c128_13.jpg', 11, '2019-12-01 05:48:00', '2019-12-01 05:48:00'),
(47, '5de3af785f055_0014.jpg', 11, '2019-12-01 05:48:00', '2019-12-01 05:48:00'),
(48, '5de3af78778f1_14.jpg', 11, '2019-12-01 05:48:00', '2019-12-01 05:48:00'),
(49, '5de3af788d421_0017.jpg', 11, '2019-12-01 05:48:00', '2019-12-01 05:48:00'),
(50, '5de3af789d4ca_17.jpg', 11, '2019-12-01 05:48:00', '2019-12-01 05:48:00'),
(51, '5de3b04bd7983_13.jpg', 12, '2019-12-01 05:51:31', '2019-12-01 05:51:31'),
(52, '5de3b04be0f55_0014.jpg', 12, '2019-12-01 05:51:31', '2019-12-01 05:51:31'),
(53, '5de3b04bea866_14.jpg', 12, '2019-12-01 05:51:31', '2019-12-01 05:51:31'),
(54, '5de3b04c0f047_0017.jpg', 12, '2019-12-01 05:51:32', '2019-12-01 05:51:32'),
(59, '5de3c53f28473_1088.jpg', 14, '2019-12-01 07:16:02', '2019-12-01 07:20:55'),
(60, '5de3c41a54002_20.jpg', 14, '2019-12-01 07:16:02', '2019-12-01 07:16:02'),
(61, '5de3c41a706f0_021.jpg', 14, '2019-12-01 07:16:02', '2019-12-01 07:16:02'),
(62, '5de3c41a9cc37_41.jpg', 14, '2019-12-01 07:16:02', '2019-12-01 07:16:02');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(3, 'moelay', 'moe@gmail.com', 'sdfsdf', 'sdfsfsdf', '2019-12-06 23:04:05', '2019-12-06 23:04:05'),
(5, 'phyo', 'phyo@gmail.com', 'hello', 'hello world', '2019-12-06 23:09:21', '2019-12-06 23:09:21'),
(6, 'moemoe', 'moemoe@gmail.com', 'hello world', 'mingalar par', '2019-12-06 23:12:40', '2019-12-06 23:12:40');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `timing` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `photo`, `title`, `date`, `location`, `timing`, `category`, `detail`, `created_at`, `updated_at`) VALUES
(8, '5dddbaf49d230_20.jpg', 'event', '2019-11-14', 'Sedona Hotel', '7am', 'academy', '<div style=\"line-height: 19px;\"><div style=\"color: rgb(248, 248, 242); font-family: Consolas, &quot;Courier New&quot;, monospace; font-size: 14px; white-space: pre; background-color: rgb(39, 40, 34);\"></div><div style=\"\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio hic amet aperiam perferendis excepturi unde vero quibusdam nesciunt ad impedit et magni, pariatur placeat voluptatibus numquam ipsa labore aliquid ullam?</div></div>', '2019-11-26 17:23:24', '2019-11-26 17:23:24'),
(9, '5dddf3e06dc2b_222.jpg', 'event 1', '2019-11-29', 'Hotel', '9am', 'other', '<div style=\"line-height: 19px;\"><div style=\"color: rgb(248, 248, 242); font-family: Consolas, &quot;Courier New&quot;, monospace; font-size: 14px; white-space: pre; background-color: rgb(39, 40, 34);\"></div><div style=\"\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima distinctio fugiat molestiae tempore est facilis ut asperiores quas doloribus sequi ad ea nobis error facere at expedita perspiciatis, unde aliquam?</div></div>', '2019-11-26 21:26:16', '2019-11-26 21:26:51'),
(10, '5dddf4667b3e9_787.jpg', 'event 2', '2019-11-21', 'Shwe Pyi Thar', '8am', 'academy', '<div style=\"line-height: 19px;\"><div style=\"color: rgb(248, 248, 242); font-family: Consolas, &quot;Courier New&quot;, monospace; font-size: 14px; white-space: pre; background-color: rgb(39, 40, 34);\"></div><div style=\"\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima distinctio fugiat molestiae tempore est facilis ut asperiores quas doloribus sequi ad ea nobis error facere at expedita perspiciatis, unde aliquam?</div></div>', '2019-11-26 21:27:52', '2019-11-26 21:28:30');

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
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `photo`, `name`, `created_at`, `updated_at`) VALUES
(4, '5dde07d4db7d8_150df948-244c-4682-909b-adc5cbba96a4_5.jpg', 'rerterte', '2019-11-26 22:51:24', '2019-11-26 22:51:24'),
(5, '5dde07ee9857e_41.jpg', 'erwrwererw', '2019-11-26 22:51:50', '2019-11-26 22:51:50'),
(6, '5de5ced486c20_333.jpg', 'mon site', '2019-12-02 20:26:20', '2019-12-02 20:26:20'),
(7, '5de5cee127408_0017.jpg', 'activities', '2019-12-02 20:26:33', '2019-12-02 20:26:33'),
(8, '5de5cefa41581_777.jpg', 'mingalar', '2019-12-02 20:26:58', '2019-12-02 20:26:58');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `education` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fb_link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tw_link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `in_link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `name`, `phone`, `position`, `address`, `education`, `detail`, `photo`, `fb_link`, `tw_link`, `in_link`, `created_at`, `updated_at`) VALUES
(3, 'Phyo Thazin', '09876543345', 'JavaScript Developer', 'sddfdsfd', 'B.E(iT)', 'sdfsdfsf', '5ddfef1e206c4_021.jpg', '#', '#', '#', '2019-11-28 09:30:30', '2019-12-01 02:19:09'),
(4, 'Ya Min', '09876678876098', 'JavaScript Developer', 'North Dagon', 'B.E(IT)', 'dsfsdf', '5de5a7a5a23f4_444.jpg', 'fsdf', 'sdfsd', 'dsfsd', '2019-12-01 02:18:34', '2019-12-02 17:39:09');

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_11_24_013409_create_blogs_table', 2),
(5, '2019_11_25_071944_create_events_table', 3),
(6, '2019_11_27_040811_create_galleries_table', 4),
(7, '2019_11_27_063145_create_categories_table', 5),
(8, '2019_11_27_225813_create_members_table', 6),
(9, '2019_11_30_070712_create_companies_table', 7),
(10, '2019_11_30_091505_create_company__galleries_table', 8),
(11, '2019_12_07_051332_create_contacts_table', 9),
(12, '2019_12_14_131226_create_products_table', 10);

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `member_id` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `email_verified_at`, `password`, `type`, `member_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin@gmail.com', NULL, '$2y$10$jcbLFg.JEYF9wFqVsKZbE.5sOP.sBVQQYs3gOPhqS5U9/FeXSrMyq', 'admin', 0, NULL, '2019-11-22 09:43:46', '2019-11-22 09:43:46'),
(5, 'phyo@gmail.com', NULL, '$2y$10$eNI1TZWmusinPXsPJmtl1.WLpmy/j6S1dKsifH.sCnNhH.6miqlua', 'member', 3, NULL, '2019-11-28 09:30:30', '2019-11-28 09:30:30'),
(6, 'yamin@gmail.com', NULL, '$2y$10$KVSjsNogvwYWjpSpro.4S.EBAyl7u2/OCNr0Rh0PIaTkl8oTuvAq6', 'member', 4, NULL, '2019-12-01 02:18:34', '2019-12-01 02:18:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company__galleries`
--
ALTER TABLE `company__galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
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
-- Indexes for table `products`
--
ALTER TABLE `products`
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
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `company__galleries`
--
ALTER TABLE `company__galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
