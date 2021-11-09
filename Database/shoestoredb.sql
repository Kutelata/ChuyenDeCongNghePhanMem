-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2021 at 01:16 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shoestoredb`
--

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `brandId` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `description` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brandId`, `name`, `description`) VALUES
(1, 'Adidas', ''),
(2, 'Nike', ''),
(3, 'Vans', '');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `categoryId` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `description` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryId`, `name`, `description`) VALUES
(1, 'All Shoes', 'root'),
(2, 'Training', NULL),
(3, 'Lifestyle', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `color`
--

CREATE TABLE `color` (
  `colorId` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `code` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `color`
--

INSERT INTO `color` (`colorId`, `name`, `code`) VALUES
(1, 'White', '#FFFFFF'),
(2, 'Black', '#000000'),
(3, 'Gray', '#7C7C7C'),
(4, 'Red', '#F70109'),
(5, 'Blue', '#0033F7');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `orderId` int(11) NOT NULL,
  `total` float DEFAULT NULL,
  `orderDate` datetime DEFAULT NULL,
  `userId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orderdetail`
--

CREATE TABLE `orderdetail` (
  `orderId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(50) DEFAULT NULL,
  `productPrice` float DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productId` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `salePrice` float DEFAULT NULL,
  `description` varchar(50) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL,
  `categoryId` int(11) DEFAULT NULL,
  `brandId` int(11) DEFAULT NULL,
  `colorId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productId`, `name`, `price`, `salePrice`, `description`, `image`, `createdAt`, `categoryId`, `brandId`, `colorId`) VALUES
(1, 'Air Force One', 114.4, 0.35, NULL, 'air-force-1-07/air-force-1-07', '2021-11-02 00:00:00', 3, 2, 1),
(2, 'Forum', 66, 0.3, NULL, 'forum/forum', '2021-11-02 00:00:00', 2, 1, 1),
(3, 'Stan Smith', 110, NULL, NULL, 'stan_smith/stan_smith', '2021-11-01 00:00:00', 3, 1, 1),
(4, 'Alphabounce', 70.4, NULL, NULL, 'alphabounce/alphabounce', '2021-10-31 00:00:00', 2, 1, 1),
(5, 'Ultraboost 21 Tokyo', 154, 0.2, NULL, 'ultraboost_21_tokyo/ultraboost_21_tokyo\r\n', '2021-10-30 02:38:07', 3, 1, 1),
(6, 'Zx 2k Boost', 162.8, NULL, NULL, 'zx_2k_boost/zx_2k_boost', '2021-10-25 02:48:05', 3, 1, 3),
(7, 'Alphamagma', 132, NULL, NULL, 'alphamagma/alphamagma', '2021-11-07 16:32:54', 3, 1, 1),
(8, 'Alphatorsion', 57.2, NULL, NULL, 'alphatorsion/alphatorsion', '2021-11-07 16:37:58', 2, 1, 3),
(9, 'Speedflow', 66, NULL, NULL, 'speedflow/speedflow', '2021-11-07 16:41:36', 3, 1, 4),
(10, 'EQ 21', 57.2, NULL, NULL, 'eq21/eq21', '2021-11-08 05:11:26', 3, 1, 3),
(11, 'X Ghosted 3', 39.6, NULL, NULL, 'x_ghosted_3/x_ghosted_3', '2021-11-08 05:15:55', 2, 2, 4),
(12, 'Ozelia', 88, NULL, NULL, 'ozelia/ozelia', '2021-11-08 05:32:20', 2, 2, 3),
(13, 'Superstar', 100, NULL, NULL, 'superstar/superstar', '2021-11-08 05:34:44', 3, 3, 1),
(14, 'Adizero Ubersonic 4', 140.8, NULL, NULL, 'adizero_ubersonic_4/adizero_ubersonic_4', '2021-11-08 11:01:07', 3, 1, 5),
(15, 'Pure Boost', 79.2, NULL, NULL, 'pureboost/pureboost', '2021-11-08 11:18:38', 2, 2, 2),
(16, 'Solematch Bounce', 132, NULL, NULL, 'solematch_bounce/solematch_bounce', '2021-11-08 11:20:42', 3, 3, 2),
(17, 'Supernova', 123.2, NULL, NULL, 'supernova/supernova', '2021-11-08 12:25:39', 2, 1, 5),
(18, 'Ultraboost 4.0 DNA', 96.8, NULL, NULL, 'ultraboost_4.0_dna/ultraboost_4.0_dna', '2021-11-08 12:27:03', 3, 2, 2),
(19, 'Ultraboost 21 A', 154, NULL, NULL, 'ultraboost_21_a/ultraboost_21_a', '2021-11-08 12:29:59', 2, 3, 5),
(20, 'Ultraboost 21 B', 154, NULL, NULL, 'ultraboost_21_b/ultraboost_21_b', '2021-11-08 12:32:23', 3, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `productsize`
--

CREATE TABLE `productsize` (
  `productId` int(11) NOT NULL,
  `sizeId` int(11) NOT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `productsize`
--

INSERT INTO `productsize` (`productId`, `sizeId`, `quantity`) VALUES
(1, 1, 10),
(1, 2, 20),
(1, 3, 15),
(1, 4, 25),
(2, 2, 10),
(2, 3, 20),
(2, 4, 15),
(2, 5, 25),
(3, 3, 10),
(3, 4, 20),
(3, 5, 15),
(3, 6, 25),
(4, 1, 10),
(4, 2, 20),
(4, 3, 15),
(4, 4, 25),
(5, 2, 10),
(5, 3, 20),
(5, 4, 15),
(5, 5, 25),
(6, 3, 10),
(6, 4, 20),
(6, 5, 15),
(6, 6, 25),
(7, 1, 10),
(7, 2, 20),
(7, 3, 15),
(7, 4, 25),
(8, 2, 10),
(8, 3, 20),
(8, 4, 15),
(8, 5, 25),
(9, 3, 10),
(9, 4, 20),
(9, 5, 15),
(9, 6, 25),
(10, 1, 10),
(10, 2, 20),
(10, 3, 15),
(10, 4, 25),
(11, 2, 10),
(11, 3, 20),
(11, 4, 15),
(11, 5, 25),
(12, 3, 10),
(12, 4, 20),
(12, 5, 15),
(12, 6, 25),
(13, 1, 10),
(13, 2, 20),
(13, 3, 15),
(13, 4, 25),
(14, 2, 10),
(14, 3, 20),
(14, 4, 15),
(14, 5, 25),
(15, 3, 10),
(15, 4, 20),
(15, 5, 15),
(15, 6, 25),
(16, 1, 10),
(16, 2, 20),
(16, 3, 15),
(16, 4, 25),
(17, 2, 10),
(17, 3, 20),
(17, 4, 15),
(17, 5, 25),
(18, 3, 10),
(18, 4, 20),
(18, 5, 15),
(18, 6, 25),
(19, 1, 10),
(19, 2, 20),
(19, 3, 15),
(19, 4, 25),
(20, 2, 10),
(20, 3, 20),
(20, 4, 15),
(20, 5, 25);

-- --------------------------------------------------------

--
-- Table structure for table `size`
--

CREATE TABLE `size` (
  `sizeId` int(11) NOT NULL,
  `number` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `size`
--

INSERT INTO `size` (`sizeId`, `number`) VALUES
(1, 39),
(2, 40),
(3, 41),
(4, 42),
(5, 43),
(6, 44);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userId` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `gender` tinyint(1) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `birthday` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userId`, `name`, `phone`, `gender`, `email`, `password`, `birthday`) VALUES
(1, 'long', '0832536199', 1, 'long@gmail.com', '1234', '2000-11-23 18:50:50'),
(2, 'thanh', '0822536189', 1, 'thanh@gmail.com', '1234', '2000-11-22 18:50:50'),
(3, 'hoang anh', '0836456199', 1, 'hoanganh@gmail.com', '1234', '2000-10-10 18:15:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`brandId`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryId`);

--
-- Indexes for table `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`colorId`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`orderId`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD PRIMARY KEY (`orderId`,`productId`),
  ADD KEY `productId` (`productId`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productId`),
  ADD KEY `brandId` (`brandId`),
  ADD KEY `categoryId` (`categoryId`),
  ADD KEY `colorId` (`colorId`);

--
-- Indexes for table `productsize`
--
ALTER TABLE `productsize`
  ADD PRIMARY KEY (`productId`,`sizeId`),
  ADD KEY `sizeId` (`sizeId`);

--
-- Indexes for table `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`sizeId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `brandId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `categoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `color`
--
ALTER TABLE `color`
  MODIFY `colorId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `orderId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `size`
--
ALTER TABLE `size`
  MODIFY `sizeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `user` (`userId`);

--
-- Constraints for table `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD CONSTRAINT `orderdetail_ibfk_1` FOREIGN KEY (`productId`) REFERENCES `product` (`productId`),
  ADD CONSTRAINT `orderdetail_ibfk_2` FOREIGN KEY (`orderId`) REFERENCES `order` (`orderId`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`brandId`) REFERENCES `brand` (`brandId`),
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`categoryId`) REFERENCES `category` (`categoryId`),
  ADD CONSTRAINT `product_ibfk_3` FOREIGN KEY (`colorId`) REFERENCES `color` (`colorId`);

--
-- Constraints for table `productsize`
--
ALTER TABLE `productsize`
  ADD CONSTRAINT `productsize_ibfk_1` FOREIGN KEY (`productId`) REFERENCES `product` (`productId`),
  ADD CONSTRAINT `productsize_ibfk_2` FOREIGN KEY (`sizeId`) REFERENCES `size` (`sizeId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
