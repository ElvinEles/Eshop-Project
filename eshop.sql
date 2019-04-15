-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2019 at 06:55 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eshop`
--

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
(1, '2019_03_12_113020_create_tbl_menu', 1),
(2, '2019_03_12_113257_create_tbl_category', 1),
(3, '2019_03_13_084619_create_tbl_menu', 2),
(4, '2019_03_13_084948_create_tbl_category', 3),
(5, '2019_03_13_085553_create_tbl_menu', 4),
(6, '2019_03_16_073241_create_tbl_product', 5),
(7, '2019_03_16_123014_create_tbl_product', 6),
(8, '2019_03_17_121247_create_tbl_newcollection', 7),
(9, '2019_03_20_094642_create_tbl_users', 8),
(10, '2019_03_21_061939_create_tbl_favorite', 9),
(11, '2019_03_25_074959_create_tbl_message', 10);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int(10) UNSIGNED NOT NULL,
  `category_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `menu_id` int(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`, `menu_id`, `created_at`, `updated_at`) VALUES
(9, 'HP', 1, NULL, NULL),
(10, 'Lenovo', 1, NULL, NULL),
(16, 'Apple', 2, NULL, NULL),
(17, 'Samsung', 2, NULL, NULL),
(18, 'HTC', 2, NULL, NULL),
(19, 'Huawei', 2, NULL, NULL),
(20, 'LG', 2, NULL, NULL),
(21, 'Nokia', 2, NULL, NULL),
(22, 'Panasonic', 2, NULL, NULL),
(23, 'Xiaomi', 2, NULL, NULL),
(24, 'Conan', 3, NULL, NULL),
(25, 'Epson', 3, NULL, NULL),
(26, 'Kompyuterlər Aksessuarlar', 4, NULL, NULL),
(27, 'Mobil Telefonlar Aksessuarlar', 4, NULL, NULL),
(28, 'Kameralar Aksessuarlar', 4, NULL, NULL),
(29, 'Digər Aksessuarlar', 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_favorite`
--

CREATE TABLE `tbl_favorite` (
  `favrite_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_favorite`
--

INSERT INTO `tbl_favorite` (`favrite_id`, `product_id`, `user_id`, `created_at`, `updated_at`) VALUES
(27, 5, 1, NULL, NULL),
(28, 7, 1, NULL, NULL),
(29, 4, 1, NULL, NULL),
(30, 5, 2, NULL, NULL),
(31, 4, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu`
--

CREATE TABLE `tbl_menu` (
  `menu_id` int(10) UNSIGNED NOT NULL,
  `menu_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_menu`
--

INSERT INTO `tbl_menu` (`menu_id`, `menu_name`, `created_at`, `updated_at`) VALUES
(1, 'Kompyuterlər', NULL, NULL),
(2, 'Mobil telefonlar', NULL, NULL),
(3, 'Kameralar', NULL, NULL),
(4, 'Aksessuarlar', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_message`
--

CREATE TABLE `tbl_message` (
  `message_id` bigint(20) UNSIGNED NOT NULL,
  `message_text` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message_show` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_message`
--

INSERT INTO `tbl_message` (`message_id`, `message_text`, `user_email`, `message_show`, `created_at`, `updated_at`) VALUES
(1, 'hjhh', 'Elvin@mado.az', 1, NULL, NULL),
(2, 'fgfg', 'Elvin@mado.az', 0, NULL, NULL),
(3, 'fgfgggngngnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnn', 'Elvin@mado.az', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_newcollection`
--

CREATE TABLE `tbl_newcollection` (
  `newcollection_id` bigint(20) UNSIGNED NOT NULL,
  `newcollection_product_id` int(20) UNSIGNED NOT NULL,
  `newcollection_day` bigint(20) NOT NULL,
  `newcollection_hour` bigint(20) NOT NULL,
  `newcollection_minute` bigint(20) NOT NULL,
  `newcollection_second` bigint(20) NOT NULL,
  `newcollection_tema` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `newcollection_sale` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_newcollection`
--

INSERT INTO `tbl_newcollection` (`newcollection_id`, `newcollection_product_id`, `newcollection_day`, `newcollection_hour`, `newcollection_minute`, `newcollection_second`, `newcollection_tema`, `newcollection_sale`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 4, 5, 6, 'fgfgf', 'endirimli', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` int(10) UNSIGNED NOT NULL,
  `product_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `product_photo` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `product_category` int(20) UNSIGNED NOT NULL,
  `product_price` double(8,2) NOT NULL,
  `product_old_price` double(8,2) NOT NULL,
  `product_active` bigint(20) NOT NULL,
  `product_sale` bigint(20) NOT NULL,
  `product_time` int(255) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `product_name`, `product_photo`, `product_category`, `product_price`, `product_old_price`, `product_active`, `product_sale`, `product_time`, `created_at`, `updated_at`) VALUES
(2, 'Galaxy S9', 'images/7528Galaxy_S9_Blue.png', 17, 800.00, 900.00, 1, 10, 0, '2019-03-18 07:17:02', '2019-03-18 07:17:02'),
(3, 'Galaxy S8', 'images/3458Galaxy-S8.jpg', 17, 600.00, 0.00, 0, 0, 0, '2019-03-18 07:17:51', '2019-03-18 07:17:51'),
(4, 'Samsung Grand', 'images/6343grand.jpg', 17, 800.00, 500.00, 0, 30, 1, '2019-03-18 07:18:51', '2019-03-18 07:18:51'),
(5, 'Samsung J2', 'images/9729j2.jpg', 17, 450.00, 600.00, 0, 10, 1, '2019-03-18 07:20:15', '2019-03-18 07:20:15'),
(6, 'Samsung Note 8', 'images/4541Note 8.jpg', 17, 700.00, 0.00, 0, 0, 0, '2019-03-18 07:21:25', '2019-03-18 07:21:25'),
(7, 'Alien', 'images/1413alien.jpg', 19, 900.00, 0.00, 0, 0, 1, '2019-03-18 07:35:38', '2019-03-18 07:35:38'),
(8, 'Dell I3567', 'images/1215dell i3567.jpg', 22, 1200.00, 0.00, 0, 0, 0, '2019-03-18 07:36:18', '2019-03-18 07:36:18'),
(9, 'Latitude', 'images/4002dell latitude.png', 10, 800.00, 880.00, 0, -10, 1, '2019-03-18 07:37:04', '2019-03-18 07:37:04'),
(10, 'ProBook 640', 'images/2185HP probook 640.png', 18, 1400.00, 0.00, 0, 0, 0, '2019-03-18 07:38:52', '2019-03-18 07:38:52'),
(11, 'Grand', 'images/6343grand.jpg', 19, 450.00, 600.00, 0, -20, 1, '2019-03-18 07:40:23', '2019-03-18 07:40:23'),
(12, 'Air 125', 'images/9403xi air 12.5.jpg', 23, 700.00, 1000.00, 0, 20, 1, '2019-03-18 07:47:17', '2019-03-18 07:47:17'),
(13, 'Canon 800', 'images/6032canon 800.jpg', 24, 600.00, 0.00, 0, 0, 1, '2019-03-18 07:51:53', '2019-03-18 07:51:53'),
(14, 'Canon EF', 'images/3315canon ef.jpg', 24, 300.00, 0.00, 0, 0, 0, '2019-03-18 07:52:43', '2019-03-18 07:52:43'),
(15, 'Canon EOS', 'images/6086canon-eos-750d.jpg', 24, 80.00, 0.00, 0, 0, 0, '2019-03-18 07:53:18', '2019-03-18 07:53:18'),
(16, 'Canon Zoom', 'images/7753canon ef 200.jpg', 28, 60.00, 0.00, 0, 0, 0, '2019-03-18 07:54:50', '2019-03-18 07:54:50'),
(17, 'Noutbuk Adapter', 'images/5599adapter.jpg', 29, 55.00, 0.00, 0, 0, 0, '2019-03-18 08:05:12', '2019-03-18 08:05:12'),
(18, 'Case', 'images/1302case notebook.jpg', 29, 89.00, 0.00, 0, 0, 0, '2019-03-18 08:05:50', '2019-03-18 08:05:50'),
(19, 'Kabro', 'images/2310kabro iphone.jpg', 27, 10.00, 0.00, 0, 0, 0, '2019-03-18 08:07:35', '2019-03-18 08:07:35');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_password` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `user_email`, `user_name`, `user_password`, `created_at`, `updated_at`) VALUES
(1, 'Elvin@mado.az', 'Elvin', 'fcea920f7412b5da7be0cf42b8c93759', '2019-03-20 08:08:52', '2019-03-20 08:08:52'),
(2, 'Elvinn@mado.az', 'Elvin', 'fcea920f7412b5da7be0cf42b8c93759', '2019-04-14 09:48:02', '2019-04-14 09:48:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`),
  ADD KEY `tbl_category_ibfk_1` (`menu_id`);

--
-- Indexes for table `tbl_favorite`
--
ALTER TABLE `tbl_favorite`
  ADD PRIMARY KEY (`favrite_id`);

--
-- Indexes for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `tbl_message`
--
ALTER TABLE `tbl_message`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `tbl_newcollection`
--
ALTER TABLE `tbl_newcollection`
  ADD PRIMARY KEY (`newcollection_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `tbl_product_ibfk_1` (`product_category`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tbl_favorite`
--
ALTER TABLE `tbl_favorite`
  MODIFY `favrite_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  MODIFY `menu_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_message`
--
ALTER TABLE `tbl_message`
  MODIFY `message_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_newcollection`
--
ALTER TABLE `tbl_newcollection`
  MODIFY `newcollection_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD CONSTRAINT `tbl_category_ibfk_1` FOREIGN KEY (`menu_id`) REFERENCES `tbl_menu` (`menu_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD CONSTRAINT `tbl_product_ibfk_1` FOREIGN KEY (`product_category`) REFERENCES `tbl_category` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
