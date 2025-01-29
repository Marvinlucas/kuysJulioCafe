-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 14, 2024 at 04:21 PM
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
-- Database: `opd`
--

-- --------------------------------------------------------

--
-- Table structure for table `addon`
--

CREATE TABLE `addon` (
  `id` int(11) NOT NULL,
  `addonName` varchar(50) DEFAULT NULL,
  `addonPrice` decimal(10,2) DEFAULT NULL,
  `categoryId` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `addon`
--

INSERT INTO `addon` (`id`, `addonName`, `addonPrice`, `categoryId`) VALUES
(1, 'NONE', 0.00, 2),
(2, 'Chia Seeds', 10.00, 2),
(3, 'Nata De Coco', 20.00, 2),
(4, 'NONE', 0.00, 1),
(5, 'NATA DE COCO', 10.00, 1),
(6, 'CHIA SEEDS', 10.00, 1),
(7, 'NONE', 0.00, 3),
(8, 'ESPRESSO SHOT', 10.00, 3),
(9, 'NONE', 0.00, 4);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `categorieId` int(12) NOT NULL,
  `categorieName` varchar(255) NOT NULL,
  `categorieDesc` text NOT NULL,
  `categorieCreateDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categorieId`, `categorieName`, `categorieDesc`, `categorieCreateDate`) VALUES
(1, 'LEMONADE SERIES', 'Exciting news on our menu! Introducing our refreshing and healthy Lemonade Series! Choose from a variety of flavors including Classic Lemonade, Cucumber Lemonade, Yakult Lemonade, and Cucumber-Yakult Lemonade. Enhance your drink with organic chia seeds or nata add-ons. Prices start at just 59 pesos. Refresh your day with our zesty concoctions!', '2024-02-11 12:07:30'),
(2, 'FRUIT MILK SERIES', 'Introducing the newest addition to our menu! Calling all fruit lovers to try our Fruit Milk Series. Flavors include Strawberry, Mango, and Blueberry. Satisfy your sweet cravings with our delightful and mouthwatering fruity flavors blended with creamy milk. Available now for only 59 pesos each.', '2024-02-11 12:17:40'),
(3, 'HOT COFFEE', ' Get ready to warm up your day with our delightful selection of hot coffee! Choose from our flavorful options:', '2024-02-11 12:27:23'),
(4, 'ICE COFFEE', 'Cool down with our ice-cold coffee lineup! Choose from Americano, Latte, Mocha, Cappuccino, and Macchiato. Dive into your favorite caffeine fix today!', '2024-02-11 12:49:36');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `contactId` int(21) NOT NULL,
  `userId` int(21) NOT NULL,
  `email` varchar(35) NOT NULL,
  `phoneNo` bigint(21) NOT NULL,
  `orderId` int(21) NOT NULL DEFAULT 0 COMMENT 'If problem is not related to the order then order id = 0',
  `message` text NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`contactId`, `userId`, `email`, `phoneNo`, `orderId`, `message`, `time`) VALUES
(1, 2, 'llcdev89@gmail.com', 9289271965, 1, 'qqssssssssssssss', '2024-02-11 22:48:09'),
(2, 2, 'test@gmail.com', 9289271965, 1, 'hey dudes', '2024-02-14 21:01:22'),
(3, 2, 'llcdev89@gmail.com', 9289271965, 0, 'bbbbbbbb', '2024-02-14 21:02:16');

-- --------------------------------------------------------

--
-- Table structure for table `contactreply`
--

CREATE TABLE `contactreply` (
  `id` int(21) NOT NULL,
  `contactId` int(21) NOT NULL,
  `userId` int(23) NOT NULL,
  `message` text NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contactreply`
--

INSERT INTO `contactreply` (`id`, `contactId`, `userId`, `message`, `datetime`) VALUES
(1, 1, 2, 'ok nowwww', '2024-02-11 22:48:34'),
(2, 2, 2, 'aaaaaaaa', '2024-02-14 21:01:47');

-- --------------------------------------------------------

--
-- Table structure for table `deliverydetails`
--

CREATE TABLE `deliverydetails` (
  `id` int(21) NOT NULL,
  `orderId` int(21) NOT NULL,
  `deliveryBoyName` varchar(35) NOT NULL,
  `deliveryBoyPhoneNo` bigint(25) NOT NULL,
  `deliveryTime` int(200) NOT NULL COMMENT 'Time in minutes',
  `dateTime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `deliverydetails`
--

INSERT INTO `deliverydetails` (`id`, `orderId`, `deliveryBoyName`, `deliveryBoyPhoneNo`, `deliveryTime`, `dateTime`) VALUES
(1, 1, 'JML', 9289271965, 5, '2024-02-10 19:46:45'),
(2, 3, 'marvs2121', 9289271962, 2, '2024-02-11 00:49:09'),
(3, 2, 'marvin', 9289271962, 1, '2024-02-11 00:51:06'),
(4, 7, 'marvs2121', 9289271965, 3, '2024-02-12 17:15:27'),
(5, 10, 'marvs2121', 9289271965, 1, '2024-02-12 17:17:52'),
(6, 9, 'ICE COFFEE', 9289271965, 1, '2024-02-12 17:21:24');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `menuId` int(12) NOT NULL,
  `menuName` varchar(255) NOT NULL,
  `menuPrice` int(12) NOT NULL,
  `menuDesc` text NOT NULL,
  `menuCategorieId` int(12) NOT NULL,
  `menuPubDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`menuId`, `menuName`, `menuPrice`, `menuDesc`, `menuCategorieId`, `menuPubDate`) VALUES
(70, 'CLASSIC LEMONADE', 59, 'Experience the timeless refreshment of our Classic Lemonade. Savor the tangy zest of freshly squeezed lemons in every sip, perfectly balanced for a burst of citrusy goodness.', 1, '2024-02-11 13:15:31'),
(71, 'CUCUMBER LEMONADE', 59, 'Embrace the cool and crisp flavor of our Cucumber Lemonade. Infused with the essence of fresh cucumbers, this rejuvenating blend offers a refreshing twist on a classic favorite, leaving you feeling revitalized with every sip.', 1, '2024-02-11 13:16:00'),
(72, 'YAKULT LEMONADE', 59, 'Indulge in the creamy tanginess of our Yakult Lemonade. Blending the probiotic goodness of Yakult with the zesty notes of lemon, this unique concoction offers a delightful harmony of flavors that will tantalize your taste buds.', 1, '2024-02-11 13:16:57'),
(73, 'Cucumber-Yakult Lemonade', 59, 'Delight in the fusion of flavors with our Cucumber-Yakult Lemonade. Combining the refreshing taste of cucumber with the creamy richness of Yakult, this invigorating blend delivers a harmonious symphony of taste sensations, leaving you feeling refreshed and satisfied.', 1, '2024-02-11 13:17:44'),
(74, 'STRAWBERRY MIL', 59, 'Dive into the luscious sweetness of ripe strawberries, blended seamlessly with creamy milk. Each sip is a burst of fruity goodness, perfectly balanced for a delightful treat that will leave you craving for more.', 2, '2024-02-11 13:26:53'),
(75, 'MANGO MILK', 59, 'Experience the tropical paradise with our Mango flavor. Succulent mangoes are transformed into a creamy concoction, offering a harmonious blend of sweetness and richness that will transport your taste buds to sun-kissed orchards.', 2, '2024-02-11 13:27:22'),
(76, 'BLUEBERRY MILK', 59, 'Delight in the bold and tangy flavor of blueberries, harmoniously paired with creamy milk. Each sip is a symphony of sweet and tart notes, creating a refreshing and satisfying beverage that will invigorate your senses.', 2, '2024-02-11 13:27:57'),
(77, 'HOT COFFEE | AMERICANO', 49, '\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sit amet neque ac quam facilisis sagittis. Phasellus tincidunt.', 3, '2024-02-11 13:35:09'),
(78, 'HOT COFFEE | LATTE', 59, ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sit amet neque ac quam facilisis sagittis. Phasellus tincidunt.', 3, '2024-02-11 13:35:45'),
(79, 'HOT COFFEE | MOCHA', 59, ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sit amet neque ac quam facilisis sagittis. Phasellus tincidunt.', 3, '2024-02-11 13:36:20'),
(80, 'HOT COFFEE | CAPPUCCINO', 59, ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sit amet neque ac quam facilisis sagittis. Phasellus tincidunt.', 3, '2024-02-11 13:37:03'),
(81, 'HOT COFFEE | MACCHIATO', 59, ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sit amet neque ac quam facilisis sagittis. Phasellus tincidunt.', 3, '2024-02-11 13:37:31'),
(82, 'ICE COFFEE | AMERICANO', 39, ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sit amet neque ac quam facilisis sagittis. Phasellus tincidunt.', 4, '2024-02-11 13:41:03'),
(83, 'ICE COFFEE | LATTE', 39, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sit amet neque ac quam facilisis sagittis. Phasellus tincidunt.', 4, '2024-02-11 13:41:51'),
(84, 'ICE COFFEE | MOCHA', 39, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sit amet neque ac quam facilisis sagittis. Phasellus tincidunt.', 4, '2024-02-11 13:42:35'),
(85, 'ICE COFFEE | CAPPUCCINO', 39, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sit amet neque ac quam facilisis sagittis. Phasellus tincidunt.', 4, '2024-02-11 13:42:58'),
(86, 'ICE COFFEE | CARAMEL LATTE', 39, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sit amet neque ac quam facilisis sagittis. Phasellus tincidunt.', 4, '2024-02-11 13:43:28'),
(87, 'ICE COFFEE | CARAMEL MACCHIATO', 39, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sit amet neque ac quam facilisis sagittis. Phasellus tincidunt.', 4, '2024-02-11 13:44:06'),
(88, 'ICE COFFEE | WHITE MACCHIATO', 39, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sit amet neque ac quam facilisis sagittis. Phasellus tincidunt.', 4, '2024-02-11 13:44:30'),
(89, 'ICE COFFEE | SALTED CARAMEL', 39, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sit amet neque ac quam facilisis sagittis. Phasellus tincidunt.', 4, '2024-02-11 13:44:55'),
(90, 'ICE COFFEE | DIRTY MATCHA', 39, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sit amet neque ac quam facilisis sagittis. Phasellus tincidunt.', 4, '2024-02-11 13:45:37');

-- --------------------------------------------------------

--
-- Table structure for table `orderitems`
--

CREATE TABLE `orderitems` (
  `id` int(21) NOT NULL,
  `orderId` int(21) NOT NULL,
  `menuId` int(21) NOT NULL,
  `itemQuantity` int(100) NOT NULL,
  `size` varchar(20) NOT NULL,
  `addon` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orderitems`
--

INSERT INTO `orderitems` (`id`, `orderId`, `menuId`, `itemQuantity`, `size`, `addon`) VALUES
(1, 1, 1, 1, '', NULL),
(2, 1, 37, 1, '', NULL),
(3, 2, 36, 1, '', NULL),
(4, 2, 69, 1, '', NULL),
(5, 3, 69, 1, '', NULL),
(6, 3, 69, 1, '', NULL),
(7, 4, 69, 3, '', NULL),
(8, 5, 70, 1, '', NULL),
(9, 6, 76, 1, '', NULL),
(10, 7, 74, 1, '', NULL),
(11, 7, 74, 2, '', NULL),
(12, 8, 71, 1, '22oz', 'NATA DE COCO'),
(13, 9, 82, 1, '16oz', ''),
(14, 10, 70, 1, '22oz', 'NATA DE COCO'),
(15, 10, 70, 1, '22oz', 'CHIA SEEDS'),
(16, 10, 71, 1, '22oz', 'NATA DE COCO'),
(17, 10, 71, 1, '22oz', 'CHIA SEEDS'),
(18, 10, 72, 1, '22oz', 'NATA DE COCO'),
(19, 10, 72, 1, '22oz', 'CHIA SEEDS'),
(20, 10, 73, 1, '22oz', 'CHIA SEEDS'),
(21, 10, 74, 1, '22oz', 'Chia Seeds'),
(22, 10, 74, 1, '22oz', 'Nata De Coco'),
(23, 11, 77, 1, '12oz', 'Select AddOns'),
(24, 12, 70, 1, '22oz', 'NATA DE COCO'),
(25, 13, 75, 1, '22oz', 'Chia Seeds'),
(26, 14, 70, 1, '22oz', 'NATA DE COCO'),
(27, 15, 75, 1, '22oz', 'Chia Seeds'),
(28, 15, 70, 2, '22oz', 'NATA DE COCO'),
(29, 15, 74, 1, '22oz', 'Chia Seeds');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderId` int(21) NOT NULL,
  `userId` int(21) NOT NULL,
  `address` varchar(255) NOT NULL,
  `zipCode` int(21) NOT NULL,
  `phoneNo` bigint(21) NOT NULL,
  `amount` int(200) NOT NULL,
  `paymentMode` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0=cash on delivery, \r\n1=online ',
  `orderStatus` enum('0','1','2','3','4','5','6') NOT NULL DEFAULT '0' COMMENT '0=Order Placed.\r\n1=Order Confirmed.\r\n2=Preparing your Order.\r\n3=Your order is on the way!\r\n4=Order Delivered.\r\n5=Order Denied.\r\n6=Order Cancelled.',
  `orderDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderId`, `userId`, `address`, `zipCode`, `phoneNo`, `amount`, `paymentMode`, `orderStatus`, `orderDate`) VALUES
(7, 2, 'Purok 6 Cabubulaunan, Purok 6 Cabubulaunan', 12212, 9289271965, 197, '0', '2', '2024-02-12 15:49:50'),
(9, 2, 'rizal, Purok 6 Cabubulaunan', 121, 9289271965, 39, '0', '2', '2024-02-12 16:49:51'),
(10, 2, 'Purok 6 Cabubulaunan, baguio', 12313, 9289271965, 631, '0', '4', '2024-02-12 17:01:44'),
(11, 2, 'Purok 6 Cabubulaunan, baguio', 1234, 9289271965, 49, '0', '1', '2024-02-12 17:22:42'),
(12, 2, 'Purok 6 Cabubulaunan, Purok 1 Cabubulaunan', 24314, 9289271965, 69, '0', '4', '2024-02-14 09:35:32'),
(13, 2, 'rizal | ', 33453234, 9289271965, 69, '0', '4', '2024-02-14 09:44:07'),
(14, 2, 'Try Lang | To', 1213, 9289271965, 69, '0', '0', '2024-02-14 18:36:45'),
(15, 2, 'Purok 6 Cabubulaunan | Purok 6 Cabubulaunan', 45646456, 9289271965, 276, '0', '0', '2024-02-14 21:06:07');

-- --------------------------------------------------------

--
-- Table structure for table `sitedetail`
--

CREATE TABLE `sitedetail` (
  `tempId` int(11) NOT NULL,
  `systemName` varchar(21) NOT NULL,
  `email` varchar(35) NOT NULL,
  `contact1` bigint(21) NOT NULL,
  `contact2` bigint(21) DEFAULT NULL COMMENT 'Optional',
  `address` text NOT NULL,
  `dateTime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sitedetail`
--

INSERT INTO `sitedetail` (`tempId`, `systemName`, `email`, `contact1`, `contact2`, `address`, `dateTime`) VALUES
(1, 'Kuys Julio Cafe', 'kuys@gmail.com', 6312345678, 6312345678, 'Munoz<br> Nueva Ecija', '2021-03-23 19:56:25');

-- --------------------------------------------------------

--
-- Table structure for table `size`
--

CREATE TABLE `size` (
  `id` int(11) NOT NULL,
  `sizeName` varchar(50) DEFAULT NULL,
  `sizePrice` decimal(10,2) DEFAULT NULL,
  `categoryId` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `size`
--

INSERT INTO `size` (`id`, `sizeName`, `sizePrice`, `categoryId`) VALUES
(1, '12oz', 49.00, 3),
(2, '16oz', 39.00, 4),
(3, '22oz', 49.00, 4),
(4, '22oz', 59.00, 2),
(5, '22oz', 59.00, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(21) NOT NULL,
  `username` varchar(21) NOT NULL,
  `firstName` varchar(21) NOT NULL,
  `lastName` varchar(21) NOT NULL,
  `email` varchar(35) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `userType` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0=user\r\n1=admin',
  `password` varchar(255) NOT NULL,
  `joinDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `firstName`, `lastName`, `email`, `phone`, `userType`, `password`, `joinDate`) VALUES
(1, 'admin', 'admin', 'admin', 'admin@gmail.com', 1111111111, '1', '$2y$10$AAfxRFOYbl7FdN17rN3fgeiPu/xQrx6MnvRGzqjVHlGqHAM4d9T1i', '2021-04-11 11:40:58'),
(2, 'marvin', 'John Marvin', ' Lucas', 'llcdev89@gmail.com', 9289271965, '0', '$2y$10$oIDWvRkI673dtnVtvGs0m.p7A0pL.LvriUZKOvd7V4lij7k1S2GjO', '2024-02-10 19:35:43');

-- --------------------------------------------------------

--
-- Table structure for table `viewcart`
--

CREATE TABLE `viewcart` (
  `cartItemId` int(11) NOT NULL,
  `menuId` int(11) NOT NULL,
  `itemQuantity` int(100) NOT NULL,
  `size` varchar(20) NOT NULL,
  `sizePrices` decimal(10,0) DEFAULT NULL,
  `addon` varchar(50) DEFAULT NULL,
  `addonPrices` decimal(10,0) DEFAULT NULL,
  `userId` int(11) NOT NULL,
  `addedDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `viewcart`
--

INSERT INTO `viewcart` (`cartItemId`, `menuId`, `itemQuantity`, `size`, `sizePrices`, `addon`, `addonPrices`, `userId`, `addedDate`) VALUES
(60, 2, 1, '', 0, '', 0, 1, '2024-02-11 01:13:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addon`
--
ALTER TABLE `addon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categorieId`);
ALTER TABLE `categories` ADD FULLTEXT KEY `categorieName` (`categorieName`,`categorieDesc`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contactId`);

--
-- Indexes for table `contactreply`
--
ALTER TABLE `contactreply`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deliverydetails`
--
ALTER TABLE `deliverydetails`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `orderId` (`orderId`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`menuId`);
ALTER TABLE `menu` ADD FULLTEXT KEY `menuName` (`menuName`,`menuDesc`);

--
-- Indexes for table `orderitems`
--
ALTER TABLE `orderitems`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderId`);

--
-- Indexes for table `sitedetail`
--
ALTER TABLE `sitedetail`
  ADD PRIMARY KEY (`tempId`);

--
-- Indexes for table `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `viewcart`
--
ALTER TABLE `viewcart`
  ADD PRIMARY KEY (`cartItemId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addon`
--
ALTER TABLE `addon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `categorieId` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contactId` int(21) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contactreply`
--
ALTER TABLE `contactreply`
  MODIFY `id` int(21) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `deliverydetails`
--
ALTER TABLE `deliverydetails`
  MODIFY `id` int(21) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `menuId` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `orderitems`
--
ALTER TABLE `orderitems`
  MODIFY `id` int(21) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderId` int(21) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `sitedetail`
--
ALTER TABLE `sitedetail`
  MODIFY `tempId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `size`
--
ALTER TABLE `size`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(21) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `viewcart`
--
ALTER TABLE `viewcart`
  MODIFY `cartItemId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
