-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 22, 2024 at 12:10 PM
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
-- Database: `restaurant`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `total_amount` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `item_id`, `quantity`, `total_amount`) VALUES
(14, 3, 1, 2, 40000.00),
(15, 3, 2, 4, 40000.00),
(17, 3, 3, 3, 12000.00),
(18, 3, 4, 1, 2000.00);

-- --------------------------------------------------------

--
-- Stand-in structure for view `cart_view`
-- (See below for the actual view)
--
CREATE TABLE `cart_view` (
`user_id` int(11)
,`user_name` varchar(255)
,`user_email` varchar(255)
,`menu_id` int(11)
,`menu_name` varchar(255)
,`description` text
,`sale_price` decimal(10,2)
,`cart_id` int(11)
,`quantity` int(11)
,`total_amount` decimal(10,2)
);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `date`) VALUES
(1, 'Fast Food', '2024-07-20 04:23:29'),
(2, 'Drinks', '2024-07-21 07:11:58'),
(3, 'Soup', '2024-07-21 07:12:11'),
(4, 'Spicy', '2024-07-21 07:12:27'),
(5, 'Pizza', '2024-07-21 07:12:38'),
(6, 'Burger', '2024-07-21 07:12:50');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `callUs` varchar(50) NOT NULL,
  `emailUs` varchar(100) NOT NULL,
  `openingHours` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `name`, `quantity`, `category_id`, `description`, `price`, `image`, `date`) VALUES
(1, 'Noodle', 2, 1, 'Delicious', 10000.00, 'menu-item-2.png', '2024-07-20 09:53:29'),
(2, 'Fired Chicken', 15, 5, 'a classic favorite', 10000.00, 'pizza.jpg', '2024-07-21 11:43:15'),
(3, 'Spicy Noodle', 20, 1, 'Delicious', 4000.00, 'menu-item-5.png', '2024-07-21 06:43:42'),
(4, 'Avogado', 15, 2, 'sweet', 2000.00, 'avogado.jpg', '2024-07-21 07:14:42'),
(5, 'Chicken Burger', 10, 6, 'Delicious', 3000.00, 'burger.jpg', '2024-07-21 07:15:43'),
(6, 'Lemon', 14, 2, 'Fresh', 2000.00, 'lemon.jpg', '2024-07-21 07:16:33'),
(7, 'Pizza', 17, 5, 'Delicious', 7000.00, 'th (1).jpg', '2024-07-21 11:59:34'),
(8, 'Burger', 10, 6, 'ff', 4000.00, 'b111.jpg', '2024-07-21 07:21:55');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `status` enum('Pending','Completed','Cancelled') NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL,
  `is_confirmed` tinyint(1) DEFAULT 0,
  `is_active` tinyint(1) DEFAULT 1,
  `is_login` tinyint(1) DEFAULT 0,
  `token` varchar(255) DEFAULT NULL,
  `date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `profile_image`, `role`, `is_confirmed`, `is_active`, `is_login`, `token`, `date`) VALUES
(2, 'Kay Zin Khaing', 'kayzinkhaing133@gmail.com', 'S2F5emluMTIzIQ==', 'default_profile.jpg', '0', 0, 0, 0, '6ee66b5a973be4f429e4de87add4787351f0a3b4b34623e9f79ecba3b1238b9607425688b2e29fb1c7e0ce2603f5c60beaa9', '2024-07-21 13:10:23'),
(3, 'Kay Zin Khaing', 'kayzinkhaing1331@gmail.com', 'S2F5emluMTIzIQ==', 'default_profile.jpg', '0', 0, 0, 1, 'd77ff5b865d4c73fe0a70b61578021cb213e8e15606d5a95b06e216a070f448e128ce2f7e1c4c702fc8d43e80c49b9b189cc', '2024-07-21 18:47:56'),
(4, 'Mya Mya Htun', 'myamyahtun123@gmail.com', 'TXlhbXlhMTIzIQ==', 'default_profile.jpg', '0', 0, 0, 0, '12b853d74b472fdecc5369ff946c47655aa9fa9ff107e015c8548c89b25e741c842f9a0def41b32ab31be245b855afce048d', '2024-07-21 19:15:31'),
(5, 'Kay Zin Khaing', 'kayzinkhain317018@gmail.com', 'S2F5emluMTIzIQ==', 'default_profile.jpg', '0', 0, 0, 0, 'c64c2fb7a01c5065a937954f666ac4bd123e67eed5af2ecd20e05fa29cd27ddd78d3fe9e228090624337a1b193db2df0e767', '2024-07-21 19:16:47'),
(6, 'Kay Zin Khaing', 'kayzinkhaing31718@gmail.com', 'S2F5emluMTIzIQ==', 'default_profile.jpg', '1', 0, 0, 1, 'f534591b848a7d9e4c738f76cad055069e0b1a31a550468caadb9e5595d91444d50a78f88662a41064966aa64ee74b7cdf00', '2024-07-21 19:18:50');

-- --------------------------------------------------------

--
-- Stand-in structure for view `user_order`
-- (See below for the actual view)
--
CREATE TABLE `user_order` (
`Id` int(11)
,`Name` varchar(255)
,`Item Name` varchar(255)
,`Quantity` int(11)
,`Total Amount` decimal(10,2)
,`Status` enum('Pending','Completed','Cancelled')
,`Reg-Date` timestamp
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_menu`
-- (See below for the actual view)
--
CREATE TABLE `view_menu` (
`id` int(11)
,`name` varchar(255)
,`category_name` varchar(255)
,`description` text
,`price` decimal(10,2)
,`image` varchar(255)
);

-- --------------------------------------------------------

--
-- Structure for view `cart_view`
--
DROP TABLE IF EXISTS `cart_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `cart_view`  AS SELECT `users`.`id` AS `user_id`, `users`.`name` AS `user_name`, `users`.`email` AS `user_email`, `menu`.`id` AS `menu_id`, `menu`.`name` AS `menu_name`, `menu`.`description` AS `description`, `menu`.`price` AS `sale_price`, `cart`.`id` AS `cart_id`, `cart`.`quantity` AS `quantity`, `cart`.`total_amount` AS `total_amount` FROM ((`cart` join `users` on(`cart`.`user_id` = `users`.`id`)) join `menu` on(`cart`.`item_id` = `menu`.`id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `user_order`
--
DROP TABLE IF EXISTS `user_order`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `user_order`  AS SELECT `o`.`id` AS `Id`, `u`.`name` AS `Name`, `m`.`name` AS `Item Name`, `o`.`quantity` AS `Quantity`, `o`.`total_amount` AS `Total Amount`, `o`.`status` AS `Status`, `o`.`reg_date` AS `Reg-Date` FROM ((`order` `o` join `users` `u` on(`o`.`user_id` = `u`.`id`)) join `menu` `m` on(`o`.`item_id` = `m`.`id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `view_menu`
--
DROP TABLE IF EXISTS `view_menu`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_menu`  AS SELECT `m`.`id` AS `id`, `m`.`name` AS `name`, `c`.`name` AS `category_name`, `m`.`description` AS `description`, `m`.`price` AS `price`, `m`.`image` AS `image` FROM (`menu` `m` join `category` `c` on(`m`.`category_id` = `c`.`id`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `menu` (`id`);

--
-- Constraints for table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `order_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `menu` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
