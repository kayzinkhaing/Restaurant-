-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2024 at 08:11 AM
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
,`image` varchar(255)
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
(2, 'Fired Chicken', 0, 5, 'a classic favorite', 10000.00, 'pizza.jpg', '2024-07-25 01:24:18'),
(4, 'Avogado', 0, 2, 'sweet', 2000.00, 'avogado.jpg', '2024-07-24 07:48:37'),
(5, 'Chicken Burger', 0, 2, 'Delicious', 3000.00, 'burger.jpg', '2024-07-24 07:49:14'),
(6, 'Lemon', 0, 2, 'Fresh', 2000.00, 'lemon.jpg', '2024-07-23 15:19:07'),
(7, 'Pizza', 5, 5, 'Delicious', 7000.00, 'th (1).jpg', '2024-07-21 11:59:34'),
(8, 'Burger', 0, 6, 'ff', 4000.00, 'b111.jpg', '2024-07-21 07:21:55');

-- --------------------------------------------------------

--
-- Table structure for table `orderitem`
--

CREATE TABLE `orderitem` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `TotalAmount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `orderitem`
--

INSERT INTO `orderitem` (`id`, `order_id`, `menu_id`, `price`, `quantity`, `TotalAmount`) VALUES
(436, 139, 2, 10000.00, 1, 10000.00),
(437, 139, 4, 2000.00, 1, 2000.00),
(438, 139, 5, 3000.00, 1, 3000.00),
(439, 139, 6, 2000.00, 1, 2000.00),
(440, 139, 7, 7000.00, 1, 7000.00),
(441, 139, 8, 4000.00, 1, 4000.00),
(442, 140, 4, 2000.00, 1, 2000.00),
(443, 140, 2, 10000.00, 1, 10000.00),
(444, 140, 5, 3000.00, 1, 3000.00),
(445, 140, 6, 2000.00, 1, 2000.00),
(446, 141, 2, 10000.00, 1, 10000.00),
(447, 141, 4, 2000.00, 1, 2000.00),
(448, 141, 8, 4000.00, 1, 4000.00),
(449, 141, 7, 7000.00, 1, 7000.00),
(450, 141, 5, 3000.00, 1, 3000.00),
(451, 141, 6, 2000.00, 1, 2000.00),
(452, 142, 4, 2000.00, 1, 2000.00),
(453, 142, 5, 3000.00, 1, 3000.00),
(454, 142, 6, 2000.00, 1, 2000.00),
(455, 142, 7, 7000.00, 1, 7000.00),
(456, 142, 8, 4000.00, 1, 4000.00),
(457, 143, 6, 2000.00, 1, 2000.00),
(458, 143, 4, 2000.00, 1, 2000.00),
(459, 143, 7, 7000.00, 1, 7000.00),
(460, 143, 8, 4000.00, 1, 4000.00),
(461, 143, 5, 3000.00, 1, 3000.00),
(462, 143, 2, 10000.00, 1, 10000.00),
(463, 144, 4, 2000.00, 1, 2000.00),
(464, 144, 5, 3000.00, 1, 3000.00),
(465, 144, 6, 2000.00, 1, 2000.00),
(466, 144, 7, 7000.00, 1, 7000.00),
(467, 144, 8, 4000.00, 1, 4000.00);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `totalQty` int(11) NOT NULL,
  `totalAmount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `totalQty`, `totalAmount`) VALUES
(138, 13, 6, 28000.00),
(139, 13, 6, 28000.00),
(140, 13, 4, 17000.00),
(141, 13, 6, 28000.00),
(142, 13, 5, 18000.00),
(143, 13, 6, 28000.00),
(144, 13, 5, 18000.00);

-- --------------------------------------------------------

--
-- Stand-in structure for view `order_item`
-- (See below for the actual view)
--
CREATE TABLE `order_item` (
`user_name` varchar(255)
,`menu_name` varchar(255)
,`quantity` int(11)
,`price` decimal(10,2)
,`total_amount` decimal(20,2)
,`total_quantity` decimal(32,0)
,`order_total_amount` decimal(10,2)
);

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
(12, 'Testing', 'kayzinkhain31718@gmail.com', 'S2F5emlua2hhaW4zMTcxOEA=', 'default_profile.jpg', '0', 0, 0, 0, '52a627feb7e106b09375195211dc83e693d010afe7d99d3eb6cf738ff910fd2b0df85dd107e1c1f600cbbab9b908f3399698', '2024-07-26 09:56:39'),
(13, 'Kay zin Khaing', 'kayzinkhaing1331@gmail.com', 'S2F5emlua2hhaW5nMTMzMUA=', 'default_profile.jpg', '1', 0, 0, 1, 'b829222f396e834992127c8f310b52e5c2a29c7502b0ff0173f9860311599e7f4bad6cc372339cf98ab051241a28dcca0750', '2024-07-26 10:11:35');

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_menu`
-- (See below for the actual view)
--
CREATE TABLE `view_menu` (
`id` int(11)
,`name` varchar(255)
,`quantity` int(11)
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

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `cart_view`  AS SELECT `users`.`id` AS `user_id`, `users`.`name` AS `user_name`, `users`.`email` AS `user_email`, `menu`.`id` AS `menu_id`, `menu`.`name` AS `menu_name`, `menu`.`image` AS `image`, `menu`.`description` AS `description`, `menu`.`price` AS `sale_price`, `cart`.`id` AS `cart_id`, `cart`.`quantity` AS `quantity`, `cart`.`total_amount` AS `total_amount` FROM ((`cart` join `users` on(`cart`.`user_id` = `users`.`id`)) join `menu` on(`cart`.`item_id` = `menu`.`id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `order_item`
--
DROP TABLE IF EXISTS `order_item`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `order_item`  AS SELECT `u`.`name` AS `user_name`, `m`.`name` AS `menu_name`, `oi`.`quantity` AS `quantity`, `oi`.`price` AS `price`, `oi`.`quantity`* `oi`.`price` AS `total_amount`, sum(`oi`.`quantity`) over ( partition by `u`.`id`) AS `total_quantity`, `o`.`totalAmount` AS `order_total_amount` FROM (((`orders` `o` join `orderitem` `oi` on(`o`.`id` = `oi`.`order_id`)) join `menu` `m` on(`oi`.`menu_id` = `m`.`id`)) join `users` `u` on(`o`.`user_id` = `u`.`id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `view_menu`
--
DROP TABLE IF EXISTS `view_menu`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_menu`  AS SELECT `m`.`id` AS `id`, `m`.`name` AS `name`, `m`.`quantity` AS `quantity`, `c`.`name` AS `category_name`, `m`.`description` AS `description`, `m`.`price` AS `price`, `m`.`image` AS `image` FROM (`menu` `m` join `category` `c` on(`m`.`category_id` = `c`.`id`)) ;

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
-- Indexes for table `orderitem`
--
ALTER TABLE `orderitem`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `menu_id` (`menu_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
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
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=300;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `orderitem`
--
ALTER TABLE `orderitem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=468;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `menu` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `orderitem`
--
ALTER TABLE `orderitem`
  ADD CONSTRAINT `orderitem_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `orderitem_ibfk_2` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
