-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2024 at 05:21 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `main_header` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `main_body` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `background` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ourstory` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `project` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `support` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employee` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `main_header`, `main_body`, `background`, `ourstory`, `image1`, `client`, `project`, `support`, `employee`, `about`, `image2`, `created_at`, `updated_at`) VALUES
(1, 'Karya Energi Indonesia', 'Your Best, Trusted and Professional Bussiness Partner', 'about-image/dwMmFDWdhQmys6hQqBSdjqQUiy4hTNBNbvjfEZ0H.jpg', '<div>PT. Karya Energi Indonesia (KEI) is a privately-owned company and was established in 2008 in Surabaya, Indonesia. Initial business was as Oil and Gas and Industrial general supply and trading company and throughout the time KEI evolved into major supplier, agent and distributor of few of leading brands and market leader of its lines.</div><div><br></div><div>Prided with extensive on-site inventory of consumable, safety, project items, wide network with our other principals/suppliers, outstanding fast response of our sales team, integrated supply chain to our own logistics and transportation department, we have been acknowledged and awarded from few of our Oil and Gas customers as their outstanding supplier to their project and plant operation and maintenance needs.</div>', 'about-image/3kjOI42Q7T9F8NsOMGwRExdUydpXZu5G2gBAVlRe.jpg', '300', '400', '50000', '100', 'We are fully committed to fulfilling every demand in the industry and client’s needs. By adopting innovative technical approaches, the one-stop solution company has its product strengths that are unique and exclusive both in performance and sustainability for a wide array of replicacopys industries, namely Oil and Gas, Power Plant, Petrochemical, Cement, Mining, Pulp and Paper, Palm Oil Refinery, Food and Beverage, Water Supply and Irrigation, Waste Water and Sewage Treatment Disposal, Agriculture, Electronics, Processing and Packaging, Marine and Shipbuilding.', 'about-image/LxPqtBV40507DlxGQCstM8y2eYCdwXf8SeeKwvrv.jpg', NULL, '2024-10-13 23:46:00');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Web', 'web', '2024-09-20 18:42:24', '2024-10-06 00:43:09'),
(2, 'Web Design', 'web-design', '2024-09-20 18:42:24', '2024-09-20 18:42:24'),
(3, 'Personal', 'personal', '2024-09-20 18:42:24', '2024-09-20 18:42:24'),
(5, 'helmykurniawan', 'test', '2024-10-02 21:05:58', '2024-10-02 21:05:58');

-- --------------------------------------------------------

--
-- Table structure for table `cats`
--

CREATE TABLE `cats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cats`
--

INSERT INTO `cats` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(3, 'helmy', 'a', '2024-10-02 21:55:59', '2024-10-02 21:55:59'),
(4, 'kurniawan', 'ku', '2024-10-02 21:56:05', '2024-10-02 21:56:05'),
(5, 'vv', 'v', '2024-10-06 09:13:46', '2024-10-06 09:15:21');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `client_logo`, `created_at`, `updated_at`) VALUES
(12, 'PJB', 'client-images/Z6H319PJn20Vwwvwcd812kzASqX6e1PCAbDWGj8F.png', '2024-10-06 19:42:49', '2024-10-06 19:42:49'),
(15, 'Jawa Power', 'client-images/qBoVI1ug7frnFY6J0NplCiAFUcW3v5aBoxGRWEq0.png', '2024-10-06 19:51:12', '2024-10-06 19:51:12'),
(16, 'TJB', 'client-images/WQ70NxXSrL8mnCT5JssLw9bEtZX0T3ZpYXgK5wFl.png', '2024-10-06 19:53:23', '2024-10-06 19:53:23'),
(17, 'KPJB', 'client-images/6DseXrSozpT0m5yvPjXjVK7kpFhif4GH54tAxHvq.png', '2024-10-06 20:06:29', '2024-10-06 20:06:29'),
(18, 'Indonesia Power', 'client-images/RMhaYHzMF7O4lnnzOPM6mvZTUQM96q5ey8KqnXT4.png', '2024-10-06 20:09:05', '2024-10-06 20:09:05'),
(19, 'Internasional Power', 'client-images/coKc1i3xpqKhRDy02vFkusRKFVBCIBtxOFckzPJJ.png', '2024-10-06 20:11:46', '2024-10-06 20:11:46'),
(20, 'The Linde Group', 'client-images/7mP6gGXptqNmcOn0TKyBQwuAxfFkckbP6mEsJVge.png', '2024-10-06 20:16:38', '2024-10-06 20:16:38'),
(21, 'Kangean Energy', 'client-images/0Lpyh6gHmneb8SPah5tBP3ZIMrTjSYtsNTDph02f.png', '2024-10-06 20:19:46', '2024-10-06 20:19:46'),
(22, 'PetroChina', 'client-images/xm3ZUDQw7tzDa0IGhy3GgNfdTLOWv9ISyIUOIaSs.png', '2024-10-06 20:22:17', '2024-10-06 20:23:13'),
(23, 'BP', 'client-images/uv6KaWjysNjAompltlmFAHXNT9vvbGYjKdDX3pBr.png', '2024-10-06 20:25:37', '2024-10-06 20:25:37'),
(24, 'Chevron', 'client-images/OYKPCC6n5ZE6SWyvExKEfdLmJiqF5FjvOCDlRiLc.png', '2024-10-06 20:27:29', '2024-10-06 20:27:29'),
(25, 'Santos', 'client-images/dnD6Z9mPt41pO8p7PkjSvj7YKtBw84wR2HmZJfl1.png', '2024-10-06 20:29:13', '2024-10-06 20:29:13'),
(26, 'Pertamina', 'client-images/szBfL2Pq5fZiarkjWGETYjlP7HIqml2ftrjCf4k1.png', '2024-10-06 20:31:38', '2024-10-06 20:31:38'),
(27, 'Premier Oil', 'client-images/lLXzKyu1VD3gwIKbz6bX7VqXjnUK5eb5lza82tUF.png', '2024-10-06 20:33:42', '2024-10-06 20:33:42'),
(28, 'HCML', 'client-images/yloVrljIuPwruaZLKVYZ3BADqH5j0izpIZryYKRr.png', '2024-10-06 20:36:39', '2024-10-06 20:36:39'),
(29, 'Petronas', 'client-images/GnBvUjRUoxrn63Z4QoqfoESr5sEqSdASQcX0oQoj.png', '2024-10-06 20:38:13', '2024-10-06 20:38:13'),
(30, 'Apexindo', 'client-images/MtAfQhopA3Gqy3tN2Xe2xbF95xLEXdfx1ahWiKcB.png', '2024-10-06 20:40:06', '2024-10-06 20:40:06'),
(31, 'Total', 'client-images/oJvXJpdA3Amex38tmVZeTkHNOGSVMDwXDsdDGNYF.png', '2024-10-06 20:41:41', '2024-10-06 20:41:41'),
(32, 'exxon', 'client-images/BHLEIM1Z7BiApCSUc8bvyBLUQ6oy7zcGK9f8fqio.png', '2024-10-06 20:42:52', '2024-10-06 20:42:52'),
(33, 'pgn', 'client-images/Lf5OmJGcuF4lGHB1xFffeEqS7U26ZJ3GYMZT9sgS.png', '2024-10-06 20:45:50', '2024-10-06 20:45:50'),
(34, 'cosl', 'client-images/vIPebtmnqL7AZ2WKhPe62LcXrkp3XXqOxSvFIFWA.png', '2024-10-06 20:48:30', '2024-10-06 20:48:30'),
(35, 'Transocean', 'client-images/VO64qb1iAs3ytcvH5GPByntYCnNQRumzrjdbLmTZ.png', '2024-10-06 20:49:36', '2024-10-06 20:49:36'),
(36, 'Petrokimia Gresik', 'client-images/5bEQAHAJkBo0aCsrcN6VoX75MqVtGrgQjKrDX44R.png', '2024-10-06 20:51:59', '2024-10-06 20:51:59'),
(37, 'Semen Indonesia', 'client-images/yXO4GL0PrAf5FGLtVFxYWnEXRcmnTmuS7JGR8K0A.png', '2024-10-06 20:53:45', '2024-10-06 20:53:45'),
(38, 'Holcim', 'client-images/aEGJV7Fp2ef27on57MWpGxaEuIN86Yth9RveVIM6.png', '2024-10-06 20:55:32', '2024-10-06 20:55:32'),
(39, 'alstom', 'client-images/qT1nyG6dFfYQbKTcozFEAGs4VZMgClJhip5Ky8Kz.png', '2024-10-06 20:56:30', '2024-10-06 20:56:30');

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
-- Table structure for table `gambar`
--

CREATE TABLE `gambar` (
  `id` int(10) UNSIGNED NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gambar`
--

INSERT INTO `gambar` (`id`, `file`, `keterangan`, `created_at`, `updated_at`) VALUES
(3, '1727159717_try.PNG', 'a', '2024-09-23 23:35:17', '2024-09-23 23:35:17'),
(4, '1727160447_CETOK SEMEN PERSEGI 7 INCH.jpg', 'ss', '2024-09-23 23:47:27', '2024-09-23 23:47:27'),
(5, '1727232905_3M 7447 SCOTCH-BRITE HAND PAD 6IN X 9IN 20 EAPACK.jpg', 'v', '2024-09-24 19:55:05', '2024-09-24 19:55:05'),
(6, '1727232956_3M 7447 SCOTCH-BRITE HAND PAD 6IN X 9IN 20 EAPACK.jpg', 'X', '2024-09-24 19:55:56', '2024-09-24 19:55:56'),
(7, '1727233075_3M 7447 SCOTCH-BRITE HAND PAD 6IN X 9IN, 20 EAPACK.jpg', 'X', '2024-09-24 19:57:55', '2024-09-24 19:57:55'),
(8, '1727233148_3M 7447 SCOTCH-BRITE HAND PAD 6IN X 9IN 20 EAPACK.jpg', 'c', '2024-09-24 19:59:08', '2024-09-24 19:59:08');

-- --------------------------------------------------------

--
-- Table structure for table `main_images`
--

CREATE TABLE `main_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `main_images`
--

INSERT INTO `main_images` (`id`, `file`, `keterangan`, `created_at`, `updated_at`) VALUES
(4, '1727767478_hero-carousel-1.jpg', '1', '2024-10-01 00:24:38', '2024-10-01 00:24:38'),
(5, '1727767491_hero-carousel-2.jpg', '2', '2024-10-01 00:24:51', '2024-10-01 00:24:51'),
(6, '1727767496_hero-carousel-3.jpg', '3', '2024-10-01 00:24:56', '2024-10-01 00:24:56'),
(7, '1727767501_hero-carousel-4.jpg', '4', '2024-10-01 00:25:01', '2024-10-01 00:25:01');

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
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_08_03_112903_create_posts_table', 1),
(6, '2021_08_04_085452_create_categories_table', 1),
(7, '2021_10_04_041104_add_is_admin_to_users_table', 1),
(8, '2024_09_23_034202_create_profiles_table', 2),
(9, '2024_09_24_042427_create_main_images_table', 3),
(10, '2024_09_24_044355_create_gambars_table', 4),
(11, '2024_09_25_064423_create_abouts_table', 5),
(12, '2024_09_30_030540_create_products_table', 6),
(13, '2024_10_01_021659_create_services_table', 7),
(14, '2024_10_02_035943_create_clients_table', 8),
(15, '2024_10_03_033622_create_projects_table', 9),
(16, '2024_10_03_033811_create_cats_table', 9),
(17, '2024_10_03_044727_create_projects_table', 10);

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `publish_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `category_id`, `user_id`, `title`, `excerpt`, `slug`, `image`, `body`, `publish_at`, `created_at`, `updated_at`) VALUES
(203, 3, 6, 'cc', 'ccccc', 'cc', 'post-images/jo9ncEZ76oPV4wVhTUI6TeusdDxjVVJK8vn9UZLy.jpg', 'ccccc', NULL, '2024-09-20 20:17:17', '2024-10-11 01:53:06');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `image`, `body`, `link`, `created_at`, `updated_at`) VALUES
(1, 'IMI CCI', 'product-images/pbMkjRcVX3Lc5J1DxQnb87IJAZPa4NIixJ2RTe4J.png', 'IMI CCI is a world leader in the design, manufacture and service of control and isolation valves for the severe service applications of the power industries.', 'www.imi-critical.com', '2024-09-29 20:59:25', '2024-10-06 21:17:05'),
(3, 'GESOTEC', 'product-images/mOo2ZhN7SLdPcOctSLNqpLrQN8IbNeIPemVS02bA.png', 'GESOTEC® products are distributed worldwide through various well-known OEM-clients under their individual brand mark. Through these channels (1983-1987), hundreds of one of the first GESOTEC® products, a low cost microprocessor based image processing system for measuring Infrared Cameras (“Thermographs”)', 'https://www.gesotec.de/', '2024-09-30 00:51:13', '2024-10-06 21:16:07'),
(4, 'ECOM', 'product-images/gN8F1PlsqRPytUszPEtLRvmTmjCNrhExgXKeoqJX.png', '1985 we had a vision. At that time climate goals were still a long way off. We were dreaming of measuring the CO2 exhaust in every single house and being able to determine the efficiency of a combustion plant with measuring instruments. We started in a small garage in Iserlohn-Oestrich.', 'https://www.ecom.de/', '2024-09-30 00:56:37', '2024-10-06 21:19:08'),
(7, 'Panametrics', 'product-images/W5dtT4WZW6VQMu3OkHGQcz8I8ZrMBH6tVKRQPo7Y.png', '<span style=\"color: rgb(82, 82, 82); font-family: Georgia; font-size: 12px; background-color: rgb(246, 246, 246);\">PT Karya Energi Indonesia (KEI) is channel partner for Baker Hughes, a GE Company – Measurement &amp; Sensing (M&amp;S) product lines in Indonesia. Baker Hughes is a combination of Baker Hughes and GE OIL &amp; GAS – world’s first and only Fullstream Oil and Gas company</span>', 'https://www.bakerhughes.com/', '2024-10-06 21:46:46', '2024-10-06 21:46:46'),
(8, 'Druck', 'product-images/KcJvRX1rXiEZHgxrej40qvxi2Ml9aVuSfQITJDsM.png', '<span style=\"color: rgb(82, 82, 82); font-family: Georgia; font-size: 12px; background-color: rgb(246, 246, 246);\">PT Karya Energi Indonesia (KEI) is channel partner for Baker Hughes, a GE Company – Measurement &amp; Sensing (M&amp;S) product lines in Indonesia. Baker Hughes is a combination of Baker Hughes and GE OIL &amp; GAS – world’s first and only Fullstream Oil and Gas company</span>', 'https://www.bakerhughes.com/', '2024-10-06 21:48:06', '2024-10-06 21:48:06'),
(9, 'Honeywell', 'product-images/Odsu21koT0iXlNynssl9tYVEJjWE4jtgZI5gZfNC.png', '<span style=\"color: rgb(82, 82, 82); font-family: Georgia; font-size: 12px; background-color: rgb(246, 246, 246);\">In Environmental and Combustion Control, our goal isn’t just to outperform the competition; we want to help our customers outperform the competition.&nbsp; Our customers routinely tell us: We’re more than a supplier, we’re a true partner.&nbsp; We collaborate and rub shoulders on the shop floor as we design and deliver the highest quality products and services.</span>', 'https://process.honeywell.com/us/en/hts', '2024-10-06 21:49:31', '2024-10-06 21:49:31'),
(10, 'Jeongwoo', 'product-images/FDc0FlQrMU3KbnhdorGSR5MylCONjveWd2g17yOj.png', '<span style=\"color: rgb(109, 110, 110); font-family: Georgia; font-size: 12px; background-color: rgb(241, 241, 241);\">Pure the Earth, Cure the Life.</span><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 5px 0px 0px; border: 0px; outline-style: initial; outline-width: 0px; font-size: 12px; vertical-align: baseline; background: transparent; color: rgb(109, 110, 110); font-family: Georgia;\"></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 5px 0px 0px; border: 0px; outline-style: initial; outline-width: 0px; font-size: 12px; vertical-align: baseline; background: transparent; color: rgb(109, 110, 110); font-family: Georgia;\">Jeongwoo Industrial Machine Co., Ltd is an Energy Plant-Specializing Company which highly regards customers value.</p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 5px 0px 0px; border: 0px; outline-style: initial; outline-width: 0px; font-size: 12px; vertical-align: baseline; background: transparent; color: rgb(109, 110, 110); font-family: Georgia;\">We have continuous growth as an Energy Plant-Specializing Company in the field of Plant, Gas, and Oil Refinery with dreams, passion and challenging spirit for bright future. Our products range cover Industrial Machines and Piping Support.</p>', 'http://www.jimc.co.kr/en/main/main.asp', '2024-10-06 21:51:22', '2024-10-06 21:51:22'),
(11, 'DOW', 'product-images/autVbVNxkUQHKUYtL5gOTT0drxwOlpYe7nY2D5LP.png', '<p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 5px 0px 0px; border: 0px; outline-style: initial; outline-width: 0px; font-size: 12px; vertical-align: baseline; background: transparent; color: rgb(109, 110, 110); font-family: Georgia;\">For more than 120 years, Dow has strived to create value through its diversified, market-driven portfolio of specialty chemicals, advanced materials, agrosciences and plastics businesses.</p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 5px 0px 0px; border: 0px; outline-style: initial; outline-width: 0px; font-size: 12px; vertical-align: baseline; background: transparent; color: rgb(109, 110, 110); font-family: Georgia;\">Dow is committed to advancing science and innovation in response to the world’s most pressing challenges – enhancing the quality of life for current and future generations, while creating long-term sustainable value for the Company, its customers and its shareholders.</p>', 'https://www.dow.com/en-us', '2024-10-06 21:53:44', '2024-10-06 21:53:44'),
(12, 'NORGREN', 'product-images/8KH1mAvGF142uGwz513wsx2OzS1iCOXBQzg2w0ft.png', '<span style=\"color: rgb(109, 110, 110); font-family: Georgia; font-size: 12px; background-color: rgb(241, 241, 241);\">We represent a world-class product portfolio in fluid and motion control includes&nbsp;</span><span style=\"margin: 0px; padding: 0px; border: 0px; outline-style: initial; outline-width: 0px; font-size: 12px; vertical-align: baseline; background: rgb(241, 241, 241); font-family: Georgia; color: rgb(128, 0, 0);\"><strong style=\"margin: 0px; padding: 0px; border: 0px; outline-style: initial; outline-width: 0px; vertical-align: baseline; background: transparent; font-weight: bold; color: rgb(0, 0, 0);\">IMI Norgren</strong>,&nbsp;<strong style=\"margin: 0px; padding: 0px; border: 0px; outline-style: initial; outline-width: 0px; vertical-align: baseline; background: transparent; font-weight: bold; color: rgb(0, 0, 0);\">IMI Buschjost</strong>,&nbsp;<strong style=\"margin: 0px; padding: 0px; border: 0px; outline-style: initial; outline-width: 0px; vertical-align: baseline; background: transparent; font-weight: bold; color: rgb(0, 0, 0);\">IMI FAS</strong>,&nbsp;<strong style=\"margin: 0px; padding: 0px; border: 0px; outline-style: initial; outline-width: 0px; vertical-align: baseline; background: transparent; font-weight: bold; color: rgb(0, 0, 0);\">IMI Herion</strong>,&nbsp;<strong style=\"margin: 0px; padding: 0px; border: 0px; outline-style: initial; outline-width: 0px; vertical-align: baseline; background: transparent; font-weight: bold; color: rgb(0, 0, 0);\">IMI Maxseal</strong>&nbsp;and&nbsp;<strong style=\"margin: 0px; padding: 0px; border: 0px; outline-style: initial; outline-width: 0px; vertical-align: baseline; background: transparent; font-weight: bold; color: rgb(0, 0, 0);\">Thompson Valves</strong>.</span><span style=\"color: rgb(109, 110, 110); font-family: Georgia; font-size: 12px; background-color: rgb(241, 241, 241);\">&nbsp;Having proven their value over the years, they stand amongst the most trusted names in Oil&amp;Gas, Chemical, Power and other Industries. Because of this we’re able to help help our customers solve the world’s greatest engineering challenges – reliably, safely and efficiently.</span>', 'https://www.norgren.com/', '2024-10-06 21:55:36', '2024-10-06 21:55:36'),
(13, 'BARTEC', 'product-images/J1yqSYSzWMTrVAifiN2ZPeT4PmB23EXPLeDSAgIL.png', '<p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 5px 0px 0px; border: 0px; outline-style: initial; outline-width: 0px; font-size: 12px; vertical-align: baseline; background: transparent; color: rgb(109, 110, 110); font-family: Georgia;\">Bartec self-regulating trace heating system are used for hazardous locations using the following self-regulating trace heaters:</p><ul style=\"margin: 10px 0px 10px 20px; padding: 0px; border: 0px; outline-style: initial; outline-width: 0px; font-size: 12px; vertical-align: baseline; background: transparent; list-style-position: initial; list-style-image: initial; color: rgb(109, 110, 110); font-family: Georgia;\"><li style=\"margin: 0px; padding: 0px; border: 0px; outline-style: initial; outline-width: 0px; vertical-align: baseline; background: transparent;\">BARTEC PSB</li><li style=\"margin: 0px; padding: 0px; border: 0px; outline-style: initial; outline-width: 0px; vertical-align: baseline; background: transparent;\">BARTEC HSB</li></ul><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 5px 0px 0px; border: 0px; outline-style: initial; outline-width: 0px; font-size: 12px; vertical-align: baseline; background: transparent; color: rgb(109, 110, 110); font-family: Georgia;\">The self-regulating trace heater features a temperature-dependent resistive element between two parallel copper conductors that regulates and limits the heat output of the trace heater according to the ambient temperature.</p>', 'https://bartec.com/', '2024-10-06 21:57:22', '2024-10-06 21:57:22');

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `whatsapp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `company_name`, `company_logo`, `address`, `email_1`, `email_2`, `telp`, `whatsapp`, `created_at`, `updated_at`) VALUES
(1, 'PT KARYA ENERGI INDONESIA', 'profile-image/Jccx7eUqx56dGZMZkW6amp4RgVWwniRIrQAeMFSV.png', '<p>Jalan Semarang No. 104 / A23, Bubutan</p><p>Surabaya, East Java, 60172</p>', 'helmy.it@karya-energi.com', NULL, '(031) 5458550', NULL, NULL, '2024-10-13 20:14:11');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cat_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `publish_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `cat_id`, `user_id`, `title`, `excerpt`, `slug`, `image1`, `image2`, `image3`, `body`, `publish_at`, `created_at`, `updated_at`) VALUES
(5, 4, 6, 'a', 'av', 'a', 'project-images/K1aHUmP1P9WyHaLQ335kn12vSHRKmPTx5C6Pt6Ey.png', 'project-images/pDHw14VhmBQAWq4O1XK7NQxFau31NtXsoILyZbGG.png', 'project-images/4ZQkZOKEHFZ1PbasSlXuJoCU48Feg2Tkc8c08Gnl.png', 'av', NULL, '2024-10-03 01:06:03', '2024-10-07 00:29:16'),
(6, 4, 6, 'v', 'vvv', 'v', 'project-images/eTVKmkLzn98MDeWeMUXMJy8v6OPSUArDXZhpSurt.jpg', 'project-images/GhPnsFBgO7NEpfvVYOcJegsUvpsxgGvPpZpnyzrV.jpg', 'project-images/bGhtgIofU67HNC9LrFSysbcScoKhZTV3AapE61Em.jpg', 'vvv', NULL, '2024-10-03 01:18:56', '2024-10-06 18:44:23'),
(7, 3, 6, 'bb', 'bbbb', 'bb', 'project-images/W0x3p2pgP9IAfiG08Fb79I5yfAAAayMF6bT35puf.jpg', 'project-images/xYZWaItq9KvqwcVeeGUREpPrtENHUMAHk7oRl9zk.jpg', 'project-images/5LsdwdIjgv4LYwB23fuXuASEaI8wfLpQhKIxFgg3.jpg', 'bbbb', NULL, '2024-10-06 08:00:53', '2024-10-06 08:00:53'),
(8, 3, 6, 'nn', 'nnn', 'nn', 'project-images/GkpYSWerZEQ3puR9kQr7nKsrMDYrPp8u4HW1lhyx.jpg', 'project-images/uLjMQlJO6ng49F5MdCpKIR3e7P5RrhIpLXVLCs9W.jpg', 'project-images/iCqzOfc5zFuLz1yUp0be6MgG0IpiHkEexhKB5ZTo.jpg', 'nnn', NULL, '2024-10-06 08:10:24', '2024-10-06 08:10:24'),
(9, 3, 6, 'vv', 'vv', 'vv', 'project-images/Vxr2l0AHpeqJtFVNu4KzpJEb3UjGsoAuI5hKYF8Y.jpg', 'project-images/otzKrWAn3edz5CLYe6MyZxc9LeAeCTRcfh59DgCV.jpg', 'project-images/6X7hAj7I6GZrUrkyR2tH8za0bxaTtqbq1WYgGO4D.jpg', 'vv', NULL, '2024-10-06 08:17:26', '2024-10-06 08:17:26'),
(10, 3, 6, 'zxvvv', 'x', 'vvvvv', 'project-images/QGJtBl4MOtPSmmO2yYwRJwBOpdz0uykebZXCgq2c.jpg', 'project-images/RNzkwGnwlGoS15NzT9aYC3esnVl62wYHyhX9kQhJ.jpg', 'project-images/PPBykrDDLVfoUhdXagTRz39DgzFisT0IE2MKrF0k.jpg', 'x', NULL, '2024-10-06 08:17:45', '2024-10-06 08:44:34');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body2` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `image1`, `image2`, `image3`, `body`, `body2`, `created_at`, `updated_at`) VALUES
(9, 'Valve Repair', 'service-images/KIqPVdejUocBb1FMTcLVX6wRnv3Ah9efmKBnf4w3.png', NULL, NULL, '<p class=\"lm-text\" style=\"border: 0px; font-family: Arial, Helvetica, &quot;Sans Serif&quot;; font-size: 15px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; vertical-align: baseline; line-height: 1.5; color: rgb(34, 34, 34);\">Valve repair machines are used for servicing valves. They repair numerous imperfections caused by corrosion or wear and tear. The devices perform tasks such as valve seat repair, machining, and precision finishing of sealing faces as well as valve grinding and lapping operations. The machines cover all types of components including gate, parallel slide, check, globe, and safety valves.</p><p class=\"lm-text\" style=\"border: 0px; font-family: Arial, Helvetica, &quot;Sans Serif&quot;; font-size: 15px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; vertical-align: baseline; line-height: 1.5; color: rgb(34, 34, 34);\">&nbsp;</p><p class=\"lm-text\" style=\"border: 0px; font-family: Arial, Helvetica, &quot;Sans Serif&quot;; font-size: 15px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; vertical-align: baseline; line-height: 1.5; color: rgb(34, 34, 34);\">This technology is employed in service trucks as well as repair shops. It is installed in combination with inspection sets for examining valve parts that are hard to reach. Inspection sets include mirrors, holding tools, and lights as well as digital camera versions featuring flexible camera fixtures. Some mechanisms are integrated with brushing sets powered by air driven hand tools to remove rust and seal residues.</p><p class=\"lm-text\" style=\"border: 0px; font-family: Arial, Helvetica, &quot;Sans Serif&quot;; font-size: 15px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; vertical-align: baseline; line-height: 1.5; color: rgb(34, 34, 34);\">&nbsp;</p><p class=\"lm-text\" style=\"border: 0px; font-family: Arial, Helvetica, &quot;Sans Serif&quot;; font-size: 15px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; vertical-align: baseline; line-height: 1.5; color: rgb(34, 34, 34);\">These tools support any industry employing valve equipment, including applications such as mining, refineries, shipyards, sugar plants, breweries, and boiler houses, to name a few.</p>', NULL, '2024-10-06 22:02:03', '2024-10-07 00:34:25'),
(10, 'Installation and Upgrade to Motorized Valve', 'service-images/wE0ADL3kkKUiqpi2Fv6MlalRLilhIsxL416L7bfS.png', NULL, NULL, '-', NULL, '2024-10-06 23:10:45', '2024-10-06 23:10:45'),
(11, 'Maxon Burner', 'service-images/m6sRTCcyatXs7vG4UAhUgRohrLhaHTSdGbVxAGkT.png', NULL, NULL, '-', NULL, '2024-10-06 23:11:35', '2024-10-06 23:11:35'),
(12, 'Metering Job', 'service-images/9VsVsk4IHs8B5KasTtAUXuJf8eYCQPLQPYR4wUAe.png', NULL, NULL, '-', NULL, '2024-10-06 23:12:24', '2024-10-06 23:12:24'),
(13, 'Installation and Pop Up Test Safety Valve', 'service-images/xiXt0YPZO2yyNUwhbH6J7W62fqWIhVdaB2GxGRsL.png', NULL, NULL, '-', NULL, '2024-10-06 23:13:44', '2024-10-06 23:13:44');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `is_admin`) VALUES
(2, 'Devi Andriani', 'maras.nugroho', 'fathonah01@example.org', '2024-09-20 18:42:24', '$2y$10$Y4laxln/kRFQkwgZ0PT7kujSerWrim/5rObxJ0d8hvVUEhiKXZAbK', 'OKnwwejuhC', '2024-09-20 18:42:24', '2024-09-20 18:42:24', 0),
(3, 'Viktor Maulana', 'jmaryati', 'charyanto@example.com', '2024-09-20 18:42:24', '$2y$10$D7aMb16U/134dMsTfNblJ.9bUxHkAOBgazy7830KY4YeHKCnuhuGi', 'dGTgoXJBmz', '2024-09-20 18:42:24', '2024-09-20 18:42:24', 0),
(4, 'Anastasia Padmasari', 'fwidodo', 'diana.wulandari@example.com', '2024-09-20 18:42:24', '$2y$10$Duv9Bitu/ONBcSoXN4eHv.nTwUjGeqbOe5eCOL2q5xHhBivDhzyeW', 'utDSh6JhsO', '2024-09-20 18:42:24', '2024-09-20 18:42:24', 0),
(5, 'Tirtayasa Januar', 'mramadan', 'jaeman.kusmawati@example.com', '2024-09-20 18:42:24', '$2y$10$oNTJzZ/OQ//XEMARYw8sveyLR5Q3EPeyqwYo66Wp60ZmuvuN9K./e', 'Hn8DSurRgp', '2024-09-20 18:42:24', '2024-09-20 18:42:24', 0),
(6, 'helmy', 'admin', 'helmykurniawan.kei@gmail.com', NULL, '$2y$10$S.jLQCDEWjKgGr4sZIg25uChbGgE5dbhd6Fk5T9o7qhlWorZHe7SC', NULL, '2024-09-20 18:43:46', '2024-10-14 01:07:56', 1),
(8, 'helmykurniawan1313', 'helmy', 'helmykurniawan1313@gmail.com', NULL, '$2y$10$S.jLQCDEWjKgGr4sZIg25uChbGgE5dbhd6Fk5T9o7qhlWorZHe7SC', NULL, '2024-10-13 20:08:25', '2024-10-13 20:08:25', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Indexes for table `cats`
--
ALTER TABLE `cats`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cats_name_unique` (`name`),
  ADD UNIQUE KEY `cats_slug_unique` (`slug`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `gambar`
--
ALTER TABLE `gambar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `main_images`
--
ALTER TABLE `main_images`
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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `projects_slug_unique` (`slug`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `cats`
--
ALTER TABLE `cats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gambar`
--
ALTER TABLE `gambar`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `main_images`
--
ALTER TABLE `main_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=207;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
