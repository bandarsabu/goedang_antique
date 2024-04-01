-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 10, 2023 at 10:26 AM
-- Server version: 5.7.33
-- PHP Version: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `goedang_antique`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `carts_id` int(11) NOT NULL,
  `users_id` int(25) NOT NULL,
  `products_id` int(25) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `categories_id` int(11) NOT NULL,
  `name_category` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `photo` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categories_id`, `name_category`, `slug`, `photo`) VALUES
(1, 'Kompas', 'kompas', '1934486181_compass.png'),
(3, 'Kamera', 'kamera', '1755449210_photo-camera.png'),
(4, 'Guci', 'guci', '1204343800_vase.png'),
(5, 'Batik Cap', 'batik-cap', '987492479_statue.png');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `products_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `categories_id` int(11) NOT NULL,
  `price` int(25) NOT NULL,
  `description` text NOT NULL,
  `weight` float NOT NULL,
  `stock` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`products_id`, `product_name`, `slug`, `categories_id`, `price`, `description`, `weight`, `stock`) VALUES
(1, 'Kompas Sestrei kuno Antik', 'kompas-sestrei-kuno-antik', 1, 200000, '<p>Kompas Sestrei kuno Antik adalah sebuah artefak yang mencuri perhatian dengan keindahan dan keunikan desainnya. Kompas ini memiliki sejarah panjang dan menjadi saksi bisu perjalanan laut di zaman dahulu.</p>\r\n', 0.3, 3),
(2, 'Kamera Twin Lens Reflex (TLR)', 'kamera-twin-lens-reflex-(tlr)', 3, 850000, '<p>TLR merupakan singkatan dari Twin Lens Reflex, Kamera TLR dikembangkan oleh Franked dan Heidecke Rolleiflex pada 1928. Kamera ini sempat bertahan selama beberapa dekade dan cukup populer kala itu, sebelum terciptanya kamera SLR</p>\r\n', 1, 5),
(3, ' Guci antik \"Victorian Splendor\"', '-guci-antik-\"victorian-splendor\"', 1, 700000, '<p>&quot;Victorian Splendor&quot; adalah Guci antik yang menawarkan keindahan dan kemewahan dari era Victoria. Dibuat dengan teliti menggunakan teknik dan bahan berkualitas tinggi, Guci ini adalah perwujudan sempurna dari keanggunan zaman dahulu.</p>\r\n', 2.2, 8),
(4, 'Patung Christopher Columbus', 'patung-christopher-columbus', 1, 1500000, '<p>Patung Christopher Columbus adalah patung yang menggambarkan tokoh sejarah terkenal, Christopher Columbus. Patung ini umumnya dibuat untuk menghormati penjelajah Genoa yang terkenal ini dan sebagai simbol peringatan penemuan Amerika oleh Columbus pada tahun 1492.</p>\r\n', 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `product_galleries`
--

CREATE TABLE `product_galleries` (
  `galleries_id` int(11) NOT NULL,
  `products_id` int(11) NOT NULL,
  `photos` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_galleries`
--

INSERT INTO `product_galleries` (`galleries_id`, `products_id`, `photos`) VALUES
(1, 1, '64ab77645effa-compass-1.jpg'),
(2, 1, '64ab7764611f1-compass-2.jpg'),
(3, 1, '64ab776462509-compass-3.jpg'),
(4, 1, '64ab776463ff2-compass-4.jpg'),
(5, 1, '64ab77646611a-compass-5.jpg'),
(6, 2, '64ab77e96a2d8-camera-1.jpg'),
(7, 2, '64ab77e971b71-camera-2.jpg'),
(8, 2, '64ab77e973454-camera-3.jpg'),
(9, 3, '64ab7825352ec-gucci-1.jpg'),
(10, 3, '64ab7825372a5-gucci-2.jpg'),
(11, 4, '64ab78763337f-statue-1.jpg'),
(12, 4, '64ab787636164-statue-2.jpg'),
(13, 4, '64ab7876376ce-statue-3.png');

-- --------------------------------------------------------

--
-- Table structure for table `provinces`
--

CREATE TABLE `provinces` (
  `provinces_id` int(11) NOT NULL,
  `provinces_name` varchar(50) NOT NULL,
  `shipping_cost` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `provinces`
--

INSERT INTO `provinces` (`provinces_id`, `provinces_name`, `shipping_cost`) VALUES
(1, 'Default', 0),
(2, 'DKI Jakarta', 45000),
(3, 'Jawa Barat', 52000),
(4, 'Banten', 51000),
(5, 'Jawa Tengah', 52000),
(6, 'Daerah Istimewa Yogyakarta', 59000),
(7, 'Jawa Timur', 46000),
(8, 'Bali', 46000),
(9, 'Nusa Tenggara Barat', 65000),
(10, 'Nusa Tenggara Timur', 76000),
(11, 'Sulawesi Utara', 65000),
(12, 'Sulawesi Barat', 17000),
(13, 'Sulawesi Tengah', 46000),
(14, 'Sulawesi Tenggara', 33000),
(15, 'Sulawesi Selatan', 10000),
(16, 'Gorontalo', 49000),
(17, 'Naggroe Aceh Darussalam', 91000),
(18, 'Sumatra Utara', 72000),
(19, 'Sumatera Barat', 65000),
(20, 'Riau', 63000),
(21, 'Kepulauan Riau,', 82000),
(22, 'Jambi', 51000),
(23, 'Bangka Belitung', 62000),
(24, 'Bengkulu', 64000),
(25, 'Lampung', 56000),
(26, 'Kalimantan Utara', 82000),
(27, 'Kalimantan Barat', 72000),
(28, 'Kalimantan Tengah', 62000),
(29, 'Kalimantan Selatan', 72000),
(30, 'Kalimantan Timur', 78000),
(31, 'Maluku', 72000),
(32, 'Maluku Utara', 103000),
(33, 'Papua Barat', 182000),
(34, 'Papua', 98000),
(35, 'Papua Selatan', 87000),
(36, 'Papua Tengah', 108000),
(37, 'Papua Pegunungan', 108000),
(38, 'Sumatra Selatan', 55000);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `transactions_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `date_transaction` datetime NOT NULL,
  `shipping_price` int(50) NOT NULL,
  `total_price` int(50) NOT NULL,
  `unique_code` int(3) NOT NULL,
  `transaction_status` enum('UNPAID','PROCESS','CANCELED','SHIPPING','RECEIVED','RETURN') NOT NULL,
  `resi` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`transactions_id`, `users_id`, `date_transaction`, `shipping_price`, `total_price`, `unique_code`, `transaction_status`, `resi`) VALUES
(1, 4, '2023-07-10 07:07:58', 112200, 4512983, 783, 'UNPAID', ''),
(2, 4, '2023-07-10 09:07:53', 37400, 2838065, 665, 'UNPAID', '');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_items`
--

CREATE TABLE `transaction_items` (
  `tran_details_id` int(11) NOT NULL,
  `products_id` int(11) NOT NULL,
  `transaction_id` int(11) NOT NULL,
  `price` int(25) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction_items`
--

INSERT INTO `transaction_items` (`tran_details_id`, `products_id`, `transaction_id`, `price`, `quantity`) VALUES
(1, 3, 1, 700000, 2),
(2, 4, 1, 1500000, 2),
(3, 3, 2, 700000, 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `users_id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `phone_number` varchar(12) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `email_verified_at` varchar(50) DEFAULT NULL,
  `password` text NOT NULL,
  `provinces_id` int(11) DEFAULT NULL,
  `address` text,
  `zip_code` varchar(11) DEFAULT NULL,
  `roles` enum('USER','ADMIN') NOT NULL DEFAULT 'USER'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`users_id`, `name`, `username`, `phone_number`, `email`, `email_verified_at`, `password`, `provinces_id`, `address`, `zip_code`, `roles`) VALUES
(1, 'admin', 'mhs', '08534199516', 'admin@gmail.com', NULL, '$2y$10$vwrEDatliszJD4xmAw7K3eGJI1pSaqkpW2g76QIxs50BVzZuOc2vi', 1, 'hh', '91353', 'ADMIN');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`carts_id`),
  ADD KEY `users_id` (`users_id`),
  ADD KEY `products_id` (`products_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categories_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`products_id`),
  ADD KEY `categories_id` (`categories_id`);

--
-- Indexes for table `product_galleries`
--
ALTER TABLE `product_galleries`
  ADD PRIMARY KEY (`galleries_id`),
  ADD KEY `products_id` (`products_id`);

--
-- Indexes for table `provinces`
--
ALTER TABLE `provinces`
  ADD PRIMARY KEY (`provinces_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`transactions_id`),
  ADD KEY `users_id` (`users_id`);

--
-- Indexes for table `transaction_items`
--
ALTER TABLE `transaction_items`
  ADD PRIMARY KEY (`tran_details_id`),
  ADD KEY `products_id` (`products_id`),
  ADD KEY `transaction_id` (`transaction_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`users_id`),
  ADD KEY `provinces_id` (`provinces_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `carts_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `categories_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `products_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product_galleries`
--
ALTER TABLE `product_galleries`
  MODIFY `galleries_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `provinces`
--
ALTER TABLE `provinces`
  MODIFY `provinces_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `transactions_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transaction_items`
--
ALTER TABLE `transaction_items`
  MODIFY `tran_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `users_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_ibfk_1` FOREIGN KEY (`products_id`) REFERENCES `products` (`products_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `carts_ibfk_2` FOREIGN KEY (`users_id`) REFERENCES `users` (`users_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`categories_id`) REFERENCES `categories` (`categories_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_galleries`
--
ALTER TABLE `product_galleries`
  ADD CONSTRAINT `product_galleries_ibfk_1` FOREIGN KEY (`products_id`) REFERENCES `products` (`products_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaction_items`
--
ALTER TABLE `transaction_items`
  ADD CONSTRAINT `transaction_items_ibfk_1` FOREIGN KEY (`transaction_id`) REFERENCES `transactions` (`transactions_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`provinces_id`) REFERENCES `provinces` (`provinces_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
