-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2024 at 05:49 AM
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
(9, 'Fast Food', '2024-09-04 10:26:55'),
(10, 'Spicy', '2024-09-04 10:27:09'),
(11, 'Soup', '2024-09-04 10:30:47'),
(12, 'Dessert', '2024-09-04 10:33:21');

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
(4, 'Avogado', 3, NULL, 'sweet', 2000.00, 'avogado.jpg', '2024-08-05 07:49:55'),
(5, 'Chicken Burger', 2, NULL, 'Delicious', 3000.00, 'burger.jpg', '2024-08-03 03:15:13'),
(6, 'Lemon', 13, NULL, 'Fresh', 2500.00, 'lemon.jpg', '2024-08-14 06:14:43'),
(7, 'Pizza', 17, NULL, 'Delicious', 8000.00, 'th (1).jpg', '2024-08-14 11:18:16'),
(8, 'Burger', 24, NULL, 'ff', 4000.00, 'b111.jpg', '2024-08-14 06:14:55'),
(15, 'Food', 12, NULL, 'Delicious', 5000.00, 'menu-item-5.png', '2024-08-04 01:02:13'),
(17, 'Papaya', 12, NULL, 'spicy', 3000.00, 'menu-item-3.png', '2024-08-04 09:52:02'),
(18, 'Chocolate Cake', 13, 12, 'Nice', 3500.00, 'de1.jpg', '2024-09-04 10:34:27'),
(19, 'Chicken Spicy', 13, 9, 'Delicious', 5000.00, 'c.jpg', '2024-09-07 05:38:55'),
(22, 'Spring rolls', 20, 9, 'Delicious', 5000.00, 'menu-item-2.png', '2024-09-06 23:30:30'),
(23, 'Papaya Salad', 12, 10, 'Spicy', 13.00, 'menu-item-3.png', '2024-09-06 23:31:55'),
(25, 'Malar Shan kaw', 10, 9, 'Delicious', 15000.00, 'menu-item-1.png', '2024-09-06 23:34:26'),
(26, 'Burger', 11, 9, 'Delicious', 5000.00, 'b.jpg', '2024-09-06 23:35:39'),
(27, 'Avogado Jucie', 13, NULL, 'Fresh', 3000.00, 'avogado.jpg', '2024-09-06 23:36:21'),
(28, 'Pastel', 12, 12, 'Nice', 7000.00, 'Pastel.jpg', '2024-09-06 23:37:23'),
(29, 'Pizza', 14, 9, 'popular Italian dish', 9000.00, 'p1.png', '2024-09-07 04:36:58'),
(30, 'Cocktail', 15, NULL, 'Cool', 5000.00, 'd1.jpg', '2024-09-06 23:40:19'),
(31, 'Chicken Soup', 16, 11, 'Delicious', 4500.00, 'soup.jpg', '2024-09-06 23:42:24'),
(33, 'Cheese Cake', 12, 12, 'Delicious', 3000.00, 'Cheese Cake.jpg', '2024-09-06 23:50:59'),
(34, 'Strawberry Cake', 12, 12, 'Delicious', 5000.00, 'Strawberry Cake.jpg', '2024-09-06 23:51:40'),
(35, 'Cupcake', 11, 12, 'Delicious', 4500.00, 'Cupcake.jpg', '2024-09-06 23:52:40'),
(36, 'Shrimp Soup', 10, 11, 'Delicious', 5000.00, 'crab soup.jpg', '2024-09-07 00:02:23'),
(37, 'Veg Clear Soup', 13, 11, 'healthy and hearty dish', 5000.00, 'Veg Clear Soup.jpg', '2024-09-07 00:05:52'),
(38, 'Vegetable Soup', 13, 11, 'a warm, liquid dish', 4500.00, 'v soup.jpg', '2024-09-07 00:09:55'),
(39, 'Chicken Soup', 12, 11, 'Delicious', 4000.00, 'Chicken Soup.jpg', '2024-09-07 00:23:28'),
(40, 'Sweet Spicy Grilled Chicken', 15, 10, 'a variety of chili peppers and spices', 8000.00, 'Spicy.jpg', '2024-09-07 00:34:45'),
(41, 'Spicy Duck Neck Food', 11, 10, 'a flavorful dish duck meat', 9000.00, 'Spicy Duck Neck Food.jpg', '2024-09-07 05:39:18'),
(42, 'Avogado Jucie', 11, NULL, 'Fresh', 3000.00, 'avogado.jpg', '2024-09-07 00:44:39'),
(43, 'Bubble Milk Tea', 13, NULL, 'Cool', 6000.00, 'bubble milk tea.jpg', '2024-09-07 05:23:48'),
(44, 'Dining Spicy Noodle Pasta', 14, 10, 'Spicy', 3500.00, 'Dining Spicy Noodle Pasta.jpg', '2024-09-07 00:49:19'),
(45, 'Chocolate Cake', 14, 12, 'Cool', 3500.00, 'cake.jpg', '2024-09-07 05:22:15'),
(46, 'Summer Cocktail', 12, NULL, 'Fresh', 4000.00, 'Summer Cocktail.jpg', '2024-09-07 00:56:41');

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
(513, 163, 2, 10000.00, 1, 10000.00),
(514, 163, 4, 2000.00, 1, 2000.00),
(515, 163, 5, 3000.00, 1, 3000.00),
(516, 163, 6, 2000.00, 1, 2000.00),
(517, 163, 8, 4000.00, 1, 4000.00),
(518, 163, 7, 7000.00, 1, 7000.00),
(519, 164, 4, 2000.00, 1, 2000.00),
(520, 164, 5, 3000.00, 1, 3000.00),
(521, 164, 6, 2000.00, 1, 2000.00),
(522, 164, 8, 4000.00, 1, 4000.00),
(523, 165, 5, 3000.00, 1, 3000.00),
(524, 165, 6, 2000.00, 1, 2000.00),
(525, 165, 4, 2000.00, 1, 2000.00),
(526, 166, 8, 4000.00, 1, 4000.00),
(527, 166, 6, 2000.00, 2, 4000.00),
(528, 166, 7, 7000.00, 1, 7000.00),
(529, 167, 8, 4000.00, 1, 4000.00),
(530, 166, 16, 4000.00, 1, 4000.00),
(531, 167, 6, 2000.00, 2, 4000.00),
(532, 166, 15, 5000.00, 1, 5000.00),
(533, 167, 7, 7000.00, 1, 7000.00),
(534, 167, 16, 4000.00, 1, 4000.00),
(535, 167, 15, 5000.00, 1, 5000.00),
(536, 168, 8, 4000.00, 1, 4000.00),
(537, 168, 6, 2000.00, 2, 4000.00),
(538, 168, 7, 7000.00, 1, 7000.00),
(539, 168, 16, 4000.00, 1, 4000.00),
(540, 168, 15, 5000.00, 1, 5000.00),
(541, 169, 8, 4000.00, 3, 12000.00),
(542, 170, 6, 2500.00, 1, 2500.00),
(543, 170, 8, 4000.00, 6, 24000.00),
(544, 174, 17, 3000.00, 1, 3000.00),
(545, 174, 6, 2500.00, 1, 2500.00),
(546, 175, 5, 3000.00, 1, 3000.00),
(547, 176, 5, 3000.00, 1, 3000.00),
(548, 177, 18, 3500.00, 1, 3500.00),
(549, 178, 18, 3500.00, 1, 3500.00),
(550, 179, 36, 5000.00, 3, 15000.00),
(551, 180, 26, 5000.00, 1, 5000.00),
(552, 181, 33, 3000.00, 1, 3000.00),
(553, 182, 25, 15000.00, 1, 15000.00),
(554, 182, 22, 5000.00, 1, 5000.00),
(555, 183, 19, 5000.00, 1, 5000.00);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `totalQty` int(11) NOT NULL,
  `totalAmount` decimal(10,2) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `totalQty`, `totalAmount`, `date`) VALUES
(175, 14, 1, 3000.00, '2024-09-04 14:53:45'),
(176, 15, 1, 3000.00, '2024-09-04 14:56:05'),
(177, 14, 1, 3500.00, '2024-09-04 15:05:55'),
(178, 14, 1, 3500.00, '2024-09-07 03:38:28'),
(179, 14, 3, 15000.00, '2024-09-07 04:41:46'),
(180, 19, 1, 5000.00, '2024-09-07 05:32:25'),
(181, 16, 1, 3000.00, '2024-09-09 02:11:48'),
(182, 16, 2, 20000.00, '2024-09-09 04:50:54'),
(183, 16, 1, 5000.00, '2024-09-09 05:05:25');

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
,`order_date` timestamp
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
(16, 'Ei Nandar Aung', 'kayzinkhaing31718@gmail.com', 'S2F5emluMTIzIQ==', 'default_profile.jpg', '0', 0, 0, 1, 'd102a83af70b730e455971c0f572ea62f3ca7526525c491fa73ca256495e6be68eee16b6d112e5934d8435ea668a2c22bcd6', '2024-09-07 05:40:29'),
(18, 'Haymarn', 'haymarn123@gmail.com', 'S2F5emluMTIzQA==', 'default_profile.jpg', '0', 0, 0, 0, '3200198722511945348781fd99431c813cc34bfef5077b4374a29c1aea8c16aed586175f256506b566451dfc3b87fb3b7297', '2024-09-07 06:46:20'),
(20, 'Kay Zin Khaing', 'kayzinkhaing1331@gmail.com', 'S2F5emluMTIzIQ==', 'default_profile.jpg', '0', 0, 0, 0, '72d9a6bd3973ea0bad88981c09da7d73bd8c77d5f031d26a6ac840debbd59d749cda53d4fd90008563f3a93064866eca47df', '2024-09-09 06:53:47');

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

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `order_item`  AS SELECT `u`.`name` AS `user_name`, `m`.`name` AS `menu_name`, `oi`.`quantity` AS `quantity`, `oi`.`price` AS `price`, `oi`.`quantity`* `oi`.`price` AS `total_amount`, sum(`oi`.`quantity`) over ( partition by `u`.`id`) AS `total_quantity`, `o`.`date` AS `order_date`, `o`.`totalAmount` AS `order_total_amount` FROM (((`orders` `o` join `orderitem` `oi` on(`o`.`id` = `oi`.`order_id`)) join `menu` `m` on(`oi`.`menu_id` = `m`.`id`)) join `users` `u` on(`o`.`user_id` = `u`.`id`)) ;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=405;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `orderitem`
--
ALTER TABLE `orderitem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=556;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=184;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
