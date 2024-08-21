-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 21, 2024 at 05:08 AM
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
-- Database: `inventory_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(20, 'Automotive Accessories'),
(13, 'Beauty Products'),
(12, 'Books'),
(5, 'Cameras'),
(1, 'Electronics'),
(7, 'Fashion'),
(10, 'Footwear'),
(14, 'Furniture'),
(16, 'Groceries'),
(4, 'Headphones'),
(6, 'Home Appliances'),
(19, 'Jewelry'),
(3, 'Laptops'),
(8, 'Men’s Clothing'),
(2, 'Mobile Phones'),
(11, 'Sports Equipment'),
(17, 'Stationery'),
(15, 'Toys'),
(18, 'Watches'),
(9, 'Women’s Clothing');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` int UNSIGNED NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `file_name`, `file_type`) VALUES
(1, '64c240dc748515083d14f916-apple-iphone-14-pro-max-clear-case-with.jpg', 'image/jpeg'),
(2, '61yUiD1CVML._AC_SL1500_.jpg', 'image/jpeg'),
(3, '61IbLL4YJPL._AC_SL1500_.jpg', 'image/jpeg'),
(4, 'sony-ps5-gaming-console-1000039671-with-dualsense-controller.jpg', 'image/jpeg'),
(5, 'W+AIR+MAX+270.png', 'image/png'),
(6, 'id58791.jpg', 'image/jpeg'),
(7, 'de134b1b7dc3044c144e24e31933c153.jpg', 'image/jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `quantity` varchar(50) DEFAULT NULL,
  `buy_price` decimal(25,2) DEFAULT NULL,
  `sale_price` decimal(25,2) NOT NULL,
  `categorie_id` int UNSIGNED NOT NULL,
  `media_id` int DEFAULT '0',
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `quantity`, `buy_price`, `sale_price`, `categorie_id`, `media_id`, `date`) VALUES
(15, 'iPhone 14', '49', 799.99, 999.99, 1, 1, '2024-08-22 00:00:00'),
(16, 'Samsung Galaxy S23', '100', 599.99, 749.99, 1, 2, '2024-08-22 00:00:00'),
(17, 'Google Pixel 7', '75', 649.99, 799.99, 1, 3, '2024-08-22 00:00:00'),
(18, 'Sony PlayStation 5', '30', 400.00, 499.99, 1, 4, '2024-08-22 00:00:00'),
(19, 'Nike Air Max 270', '200', 80.00, 120.00, 2, 5, '2024-08-22 00:00:00'),
(20, 'Adidas Ultraboost', '149', 90.00, 140.00, 2, 6, '2024-08-22 00:00:00'),
(21, 'Puma Suede Classic', '180', 50.00, 75.00, 2, 7, '2024-08-22 00:00:00'),
(22, 'Levi’s 501 Jeans', '100', 40.00, 65.00, 2, 8, '2024-08-22 00:00:00'),
(23, 'Dyson Vacuum Cleaner', '50', 300.00, 499.99, 3, 9, '2024-08-22 00:00:00'),
(24, 'Instant Pot Pressure Cooker', '100', 75.00, 129.99, 3, 10, '2024-08-22 00:00:00'),
(25, 'Samsung Refrigerator', '30', 1200.00, 1499.99, 3, 11, '2024-08-22 00:00:00'),
(26, 'Philips Air Fryer', '75', 100.00, 149.99, 3, 12, '2024-08-22 00:00:00'),
(27, 'Wooden Dining Table', '10', 300.00, 499.99, 4, 13, '2024-08-22 00:00:00'),
(28, 'Leather Sofa', '15', 600.00, 899.99, 4, 14, '2024-08-22 00:00:00'),
(29, 'Office Chair', '50', 100.00, 159.99, 4, 15, '2024-08-22 00:00:00'),
(30, 'Bookshelf', '25', 120.00, 199.99, 4, 16, '2024-08-22 00:00:00'),
(31, 'LEGO City Police Station', '200', 60.00, 89.99, 5, 17, '2024-08-22 00:00:00'),
(32, 'Hot Wheels Track Set', '300', 25.00, 39.99, 5, 18, '2024-08-22 00:00:00'),
(33, 'Barbie Dreamhouse', '100', 150.00, 199.99, 5, 19, '2024-08-22 00:00:00'),
(34, 'NERF Blaster', '250', 30.00, 49.99, 5, 20, '2024-08-22 00:00:00'),
(35, 'L’Oreal Shampoo', '200', 8.00, 15.00, 6, 21, '2024-08-22 00:00:00'),
(36, 'Nivea Body Lotion', '180', 10.00, 20.00, 6, 22, '2024-08-22 00:00:00'),
(37, 'Maybelline Mascara', '150', 6.00, 12.00, 6, 23, '2024-08-22 00:00:00'),
(38, 'Colgate Toothpaste', '300', 2.00, 4.00, 6, 24, '2024-08-22 00:00:00'),
(39, 'Kellogg’s Cornflakes', '200', 4.00, 6.50, 7, 25, '2024-08-22 00:00:00'),
(40, 'Organic Honey', '100', 5.00, 8.00, 7, 26, '2024-08-22 00:00:00'),
(41, 'Peanut Butter', '150', 3.50, 6.00, 7, 27, '2024-08-22 00:00:00'),
(42, 'Pasta Sauce', '120', 2.50, 4.50, 7, 28, '2024-08-22 00:00:00'),
(43, 'Wilson Basketball', '50', 20.00, 35.00, 8, 29, '2024-08-22 00:00:00'),
(44, 'Nike Soccer Ball', '80', 25.00, 40.00, 8, 30, '2024-08-22 00:00:00'),
(45, 'Tennis Racket', '40', 50.00, 85.00, 8, 31, '2024-08-22 00:00:00'),
(46, 'Camping Tent', '30', 60.00, 100.00, 8, 32, '2024-08-22 00:00:00'),
(47, 'The Great Gatsby', '120', 5.00, 10.00, 9, 33, '2024-08-22 00:00:00'),
(48, 'To Kill a Mockingbird', '100', 4.50, 9.00, 9, 34, '2024-08-22 00:00:00'),
(49, '1984 by George Orwell', '150', 5.50, 11.00, 9, 35, '2024-08-22 00:00:00'),
(50, 'Moby Dick', '80', 6.00, 12.00, 9, 36, '2024-08-22 00:00:00'),
(51, 'Gold Necklace', '20', 400.00, 600.00, 10, 37, '2024-08-22 00:00:00'),
(52, 'Diamond Earrings', '10', 800.00, 1200.00, 10, 38, '2024-08-22 00:00:00'),
(53, 'Silver Bracelet', '30', 50.00, 80.00, 10, 39, '2024-08-22 00:00:00'),
(54, 'Pearl Pendant', '25', 100.00, 150.00, 10, 40, '2024-08-22 00:00:00'),
(55, 'Car Battery', '60', 70.00, 120.00, 11, 41, '2024-08-22 00:00:00'),
(56, 'Motor Oil', '100', 20.00, 35.00, 11, 42, '2024-08-22 00:00:00'),
(57, 'Tire Inflator', '80', 15.00, 25.00, 11, 43, '2024-08-22 00:00:00'),
(58, 'Car Wax Polish', '150', 8.00, 15.00, 11, 44, '2024-08-22 00:00:00'),
(59, 'Diapers (Pack of 100)', '120', 25.00, 40.00, 12, 45, '2024-08-22 00:00:00'),
(60, 'Baby Stroller', '40', 100.00, 150.00, 12, 46, '2024-08-22 00:00:00'),
(61, 'Baby Formula', '80', 15.00, 25.00, 12, 47, '2024-08-22 00:00:00'),
(62, 'Baby Crib', '30', 150.00, 250.00, 12, 48, '2024-08-22 00:00:00'),
(63, 'Yoga Mat', '200', 15.00, 30.00, 13, 49, '2024-08-22 00:00:00'),
(64, 'Dumbbell Set', '50', 40.00, 65.00, 13, 50, '2024-08-22 00:00:00'),
(65, 'Protein Powder', '100', 25.00, 45.00, 13, 51, '2024-08-22 00:00:00'),
(66, 'Resistance Bands', '120', 10.00, 20.00, 13, 52, '2024-08-22 00:00:00'),
(67, 'Dog Food (20lb Bag)', '60', 25.00, 40.00, 14, 53, '2024-08-22 00:00:00'),
(68, 'Cat Litter (10lb)', '100', 15.00, 25.00, 14, 54, '2024-08-22 00:00:00'),
(69, 'Pet Leash', '150', 8.00, 15.00, 14, 55, '2024-08-22 00:00:00'),
(70, 'Fish Tank', '40', 50.00, 80.00, 14, 56, '2024-08-22 00:00:00'),
(71, 'Printer Paper (500 Sheets)', '300', 5.00, 10.00, 15, 57, '2024-08-22 00:00:00'),
(72, 'Ballpoint Pens (Pack of 20)', '200', 3.00, 6.00, 15, 58, '2024-08-22 00:00:00'),
(73, 'Desk Organizer', '80', 12.00, 20.00, 15, 59, '2024-08-22 00:00:00'),
(74, 'Stapler', '100', 5.00, 9.00, 15, 60, '2024-08-22 00:00:00'),
(75, 'Lawn Mower', '30', 200.00, 350.00, 16, 61, '2024-08-22 00:00:00'),
(76, 'Garden Hose', '100', 25.00, 40.00, 16, 62, '2024-08-22 00:00:00'),
(77, 'Plant Pots (Set of 3)', '150', 10.00, 20.00, 16, 63, '2024-08-22 00:00:00'),
(78, 'Outdoor Grill', '50', 150.00, 250.00, 16, 64, '2024-08-22 00:00:00'),
(79, 'Acoustic Guitar', '40', 100.00, 180.00, 17, 65, '2024-08-22 00:00:00'),
(80, 'Piano Keyboard', '30', 200.00, 350.00, 17, 66, '2024-08-22 00:00:00'),
(81, 'Drum Set', '20', 300.00, 450.00, 17, 67, '2024-08-22 00:00:00'),
(82, 'Violin', '50', 100.00, 180.00, 17, 68, '2024-08-22 00:00:00'),
(83, 'Samsonite Suitcase', '60', 70.00, 120.00, 18, 69, '2024-08-22 00:00:00'),
(84, 'Backpack', '150', 30.00, 50.00, 18, 70, '2024-08-22 00:00:00'),
(85, 'Travel Pillow', '200', 10.00, 20.00, 18, 71, '2024-08-22 00:00:00'),
(86, 'Passport Holder', '100', 5.00, 10.00, 18, 72, '2024-08-22 00:00:00'),
(87, 'Fossil Watch', '40', 100.00, 150.00, 19, 73, '2024-08-22 00:00:00'),
(88, 'Ray-Ban Sunglasses', '60', 120.00, 180.00, 19, 74, '2024-08-22 00:00:00'),
(89, 'Leather Belt', '100', 25.00, 40.00, 19, 75, '2024-08-22 00:00:00'),
(90, 'Cufflinks', '80', 15.00, 30.00, 19, 76, '2024-08-22 00:00:00'),
(91, 'Coca-Cola (12 Pack)', '200', 5.00, 8.00, 20, 77, '2024-08-22 00:00:00'),
(92, 'Organic Olive Oil', '100', 10.00, 15.00, 20, 78, '2024-08-22 00:00:00'),
(93, 'Red Wine (Bottle)', '60', 15.00, 25.00, 20, 79, '2024-08-22 00:00:00'),
(94, 'Green Tea (Box of 50)', '150', 5.00, 10.00, 20, 80, '2024-08-22 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int UNSIGNED NOT NULL,
  `product_id` int UNSIGNED NOT NULL,
  `qty` int NOT NULL,
  `price` decimal(25,2) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `product_id`, `qty`, `price`, `date`) VALUES
(12, 15, 1, 999.99, '2024-08-21'),
(13, 20, 1, 140.00, '2024-08-21');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(60) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_level` int NOT NULL,
  `image` varchar(255) DEFAULT 'no_image.jpg',
  `status` int NOT NULL,
  `last_login` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `user_level`, `image`, `status`, `last_login`) VALUES
(1, 'Admin', 'Admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1, 'o94ld4om1.jpg', 1, '2024-08-21 05:04:47'),
(2, 'Rezzna Laxmi', 'Special', 'ba36b97a41e7faf742ab09bf88405ac04f99599a', 2, 'no_image.png', 1, '2024-08-21 00:31:18'),
(3, 'User', 'User', '12dea96fec20593566ab75692c9949596833adc9', 3, 'no_image.png', 1, '2024-08-21 00:31:57'),
(4, 'Kritisha Adhikari', 'Kritisha', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 3, 'no_image.png', 1, NULL),
(5, 'Suzan Ghimire', 'suzan', '1d7068e0ebba37d9b545245e781508987e0fc59a', 3, 'no_image.png', 1, '2021-04-04 19:54:29');

-- --------------------------------------------------------

--
-- Table structure for table `user_groups`
--

CREATE TABLE `user_groups` (
  `id` int NOT NULL,
  `group_name` varchar(150) NOT NULL,
  `group_level` int NOT NULL,
  `group_status` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_groups`
--

INSERT INTO `user_groups` (`id`, `group_name`, `group_level`, `group_status`) VALUES
(1, 'Admin', 1, 1),
(2, 'special', 2, 1),
(3, 'User', 3, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `categorie_id` (`categorie_id`),
  ADD KEY `media_id` (`media_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_level` (`user_level`);

--
-- Indexes for table `user_groups`
--
ALTER TABLE `user_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `group_level` (`group_level`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_groups`
--
ALTER TABLE `user_groups`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `FK_products` FOREIGN KEY (`categorie_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `SK` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `FK_user` FOREIGN KEY (`user_level`) REFERENCES `user_groups` (`group_level`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
