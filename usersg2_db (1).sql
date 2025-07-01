-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2025 at 11:18 AM
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
-- Database: `usersg2_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` varchar(255) NOT NULL,
  `userID` int(255) NOT NULL,
  `cartItems` varchar(255) NOT NULL,
  `total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `userID`, `cartItems`, `total`) VALUES
('CART_685bcbacb95cc6.65778975', 21, '[]', 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Clothing and Shoes'),
(2, 'Tools'),
(3, 'Electronics'),
(4, 'Books'),
(5, 'Services');

-- --------------------------------------------------------

--
-- Table structure for table `item_bundle`
--

CREATE TABLE `item_bundle` (
  `id` int(255) NOT NULL,
  `cartID` varchar(255) NOT NULL,
  `itemID` int(255) NOT NULL,
  `quantity` int(10) NOT NULL,
  `bundlePrice` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(255) NOT NULL,
  `userID` int(255) NOT NULL,
  `orderStatus` text NOT NULL,
  `date` datetime NOT NULL,
  `items` varchar(255) NOT NULL,
  `total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `userID`, `orderStatus`, `date`, `items`, `total`) VALUES
(1, 21, 'Completed', '0000-00-00 00:00:00', '[21,24,26]', 23098.98),
(2, 21, 'Completed', '0000-00-00 00:00:00', '{\"1\":28}', 17999.90);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `created` datetime NOT NULL,
  `images` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `category_id`, `created`, `images`) VALUES
(19, 'New Balance Men&#39;s 550 White/Grey Sneaker', 'The original 550 debuted in 1989 and made its mark on basketball courts from coast to coast. After its initial run, the 550 was filed away in the archives, before being reintroduced in limited-edition releases in late 2020, and returned to the full-time lineup in 2021, quickly becoming a global fashion favorite. The 550’s low top, streamlined silhouette offers a clean take on the heavy-duty designs of the late ‘80s, while the dependable leather upper construction is a classic look in any era.', 2800.00, 1, '0000-00-00 00:00:00', '[\"img/68545b368cef57.53263542.png\",\"img/68545b368d1445.55684602.png\",\"img/68545b368d3240.88294460.png\",\"img/68545b368d4ed7.61624216.png\"]'),
(20, 'Nike Men&#39;s Air Max 90 Black/Blue Sneaker', 'The Air Max 90 stays true to its running roots with the iconic Waffle sole. Stitched overlays and textured accents create the &#39;90s look you love. Finished with easy-to-style colours, its visible Max Air cushioning adds comfort to your journey.', 3200.00, 1, '0000-00-00 00:00:00', '[\"img/685460754d2051.46424723.png\",\"img/685460754d4523.78176934.png\",\"img/685460754d5ad7.03603209.png\",\"img/685460754d6f94.76432770.png\"]'),
(21, 'Nike Dunk Low Retro', 'You can always count on a classic. The Dunk Low pairs its iconic colour-blocking with premium materials and plush padding for game-changing comfort that lasts. The possibilities are endless—how will you wear your Dunks?', 2300.00, 1, '0000-00-00 00:00:00', '[\"img/68546bd01b30a0.79906729.jpg\",\"img/68546bd01b4e44.15510268.jpg\",\"img/68546bd01b68b8.06014592.jpg\",\"img/68546bd01cfb07.75099228.jpg\"]'),
(23, 'Cordless Impact Drill 20V | Incl 2Ah battery and charger', 'Get right to work on your project with the VONROC 20V battery-powered impact drill set! This comprehensive kit includes a 20V cordless drill with impact function, a 2.0Ah battery, a quick charger, 2 screwdriver bits, and a convenient toolbag. The powerful drill can handle a variety of tasks, from drilling in wood and metal to securing screws. With its impact function, you can even tackle brickwork, tiles, and masonry.', 1099.00, 2, '0000-00-00 00:00:00', '[\"img/68546e095b2c99.08973405.jpg\",\"img/68546e095b4953.25761095.jpg\",\"img/68546e095b63e2.45021470.jpg\",\"img/68546e095d8f67.90968316.jpg\"]'),
(24, 'Apple iPhone 13 128GB', 'Features  - Our most advanced dual?camera system ever. - Durability that&#39;s front and centre. And edge to edge. - A lightning-fast chip that leaves the competition behind. - Ceramic Shield, tougher than any smartphone glass - Super Retina XDR display - Cinematic mode shoots in Dolby Vision HDR - A15 Bionic and the TrueDepth camera also power Face ID, the most secure facial authentication in a smartphone - No one does 5G like iPhone', 9999.99, 3, '0000-00-00 00:00:00', '[\"img/68547c303cf886.78833281.jpg\",\"img/68547c303d15f1.64797777.jpg\",\"img/68547c303d32d6.38881674.jpg\",\"img/68547c303d4c88.04127466.jpg\"]'),
(25, 'Atomic Habits: Tiny Changes, Remarkable Results', 'THE PHENOMENAL INTERNATIONAL BESTSELLER: OVER 20 MILLION COPIES SOLD WORLDWIDE  Transform your life with tiny changes in behaviour, starting now.  People think that when you want to change your life, you need to think big. But world-renowned habits expert James Clear has discovered another way. He knows that real change comes from the compound effect of hundreds of small decisions: doing two push-ups a day, waking up five minutes early, or holding a single short phone call.', 275.00, 4, '0000-00-00 00:00:00', '[\"img/68547d5148c691.45138806.jpg\",\"img/68547d5148eb94.87803876.jpg\",\"img/68547d514908c3.51020769.jpg\",\"img/68547d514b4472.58892650.jpg\"]'),
(26, 'Baseus Bass 35 Max Wireless Headphones', 'Immerse yourself in music with Baseus Bass 35 Max Wireless Headphones. Enjoy up to 50 hours of playback time and powerful bass thanks to AI technology. With Bluetooth 5.3 and dual-mic ENC for clear calls, these headphones are perfect for all-day use. Comfortable earcups and foldable design make them ideal for on-the-go listening. Say hello to your new favorite headphones.', 799.00, 3, '0000-00-00 00:00:00', '[\"img/68603a600af273.38259118.png\",\"img/68603a600b2f82.66079299.png\",\"img/68603a600b6086.34561254.png\",\"img/68603a600b8890.60806326.png\"]'),
(27, 'Garmin Venu 3S Slate stainless steel bezel with pebble grey case and silicone band', 'Purpose-built with advanced health and fitness features and the ability to make calls and send texts, Venu 3 is more than just a smartwatch — it’s your personal on-wrist coach there to support your every goal.', 10499.95, 3, '0000-00-00 00:00:00', '[\"img/68603b0f081135.91046893.jpg\",\"img/68603b0f085a71.62188352.jpg\",\"img/68603b0f089107.95508658.jpg\",\"img/68603b0f08ca90.71105453.jpg\"]'),
(28, 'Xbox Series S 512GB Game', 'Introducing the Xbox Series S, the smallest, sleekest Xbox ever. Get started with an instant library of 100+ high quality games, including all new Xbox Game Studios titles like Halo Infinite the day they release, when you add Xbox Game Pass Ultimate (membership sold separately). Seamlessly move between multiple games in a flash with Quick Resume. At the heart of Series S is the Xbox Velocity Architecture, which pairs a custom-SSD with integrated software for faster, streamlined gameplay with significantly reduced load times.', 8999.95, 3, '0000-00-00 00:00:00', '[\"img/68603c4a6f85a3.95271567.jpeg\",\"img/68603c4a71d943.87497250.jpeg\",\"img/68603c4a721796.94488981.jpeg\",\"img/68603c4a723f14.80939499.jpeg\"]');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `surname` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `isAdmin` tinyint(1) NOT NULL DEFAULT 0,
  `phoneNumber` int(10) NOT NULL,
  `password` char(255) NOT NULL,
  `regDate` date NOT NULL,
  `cartID` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `email`, `isAdmin`, `phoneNumber`, `password`, `regDate`, `cartID`) VALUES
(21, 'user', 'name', 'username@email.com', 0, 2147483647, '$2y$10$RvgLGNxh11Qyq7Oo9Te/duXzqCVHpPiaRDVSsXIKwUlAlcCuN11q.', '0000-00-00', 'CART_685bcbacb95cc6.65778975'),
(24, 'ayden', 'kiewiets', 'aydenkiewiets22@gmail.com', 0, 68154167, '$2y$10$bJi380uNvQhePB6tBt6Fs.chBOA6v.9UIw9PM1O/yNt6zMO.K13t2', '0000-00-00', NULL),
(25, 'admin', 'admin', 'admin@email.com', 1, 123547980, '$2y$10$.IDAAg80TW9Hv7lwoHg6TOuwaNdJlyruJC4ahZrJs1wSN0XfSCAWy', '0000-00-00', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_bundle`
--
ALTER TABLE `item_bundle`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

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
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phoneNumber` (`phoneNumber`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `item_bundle`
--
ALTER TABLE `item_bundle`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
