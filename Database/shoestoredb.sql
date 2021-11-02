-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2021 at 02:50 AM
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
(1, 'Sneaker', NULL),
(2, 'Classic', NULL),
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
(2, 'Black', '#000000');

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
  `description` varchar(50) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL,
  `categoryId` int(11) DEFAULT NULL,
  `brandId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productId`, `name`, `price`, `description`, `image`, `createdAt`, `categoryId`, `brandId`) VALUES
(1, 'Air Force One', 2600000, NULL, 'air-force-1-07/air-force-1-07.jpg', '2021-11-01 00:00:00', 3, 2),
(2, 'Vans Old Skool', 1900000, NULL, 'vans-old-skool/vans-old-skool.jpg', '2021-11-01 00:00:00', 1, 3),
(3, 'Forum', 1500000, NULL, 'forum/forum.jpg', '2021-11-01 00:00:00', 1, 1),
(4, 'Stan Smith', 2500000, NULL, 'stan_smith/stan_smith.jpg', '2021-11-01 00:00:00', 3, 1),
(5, 'Nike Dunk Low 365', 3000000, NULL, 'nike-dunk-low-365/nike-dunk-low-365.jpg', '2021-11-01 00:00:00', 1, 2),
(6, 'Ultraboost 21 Tokyo', 3500000, NULL, 'ultraboost_21_tokyo/ultraboost_21_tokyo.jpg\r\n', '2021-11-02 02:38:07', 3, 1),
(7, 'Vans Authentic Leather Tapioca', 1100000, NULL, 'vans-authentic-leather-tapioca/vans-authentic-leather-tapioca.jpg', '2021-11-02 02:40:20', 3, 3),
(8, 'Vans Pig Authentic', 2200000, NULL, 'vans-pig-authentic/vans-pig-authentic.jpg', '2021-11-02 02:40:20', 3, 3),
(9, 'Vans-Sk8-Hi-Classic', 1800000, NULL, 'vans-sk8-hi-classic/vans-sk8-hi-classic.jpg', '2021-11-02 02:45:33', 3, 3),
(10, 'Vans Vault Authentic', 2100000, NULL, 'vans-vault-authentic/vans-vault-authentic.jpg', '2021-11-02 02:46:27', 1, 3),
(11, 'Zx 2k Boost', 3700000, NULL, 'zx_2k_boost/zx_2k_boost.jpg', '2021-11-02 02:48:05', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `productcolor`
--

CREATE TABLE `productcolor` (
  `productId` int(11) NOT NULL,
  `colorId` int(11) NOT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `productsize`
--

CREATE TABLE `productsize` (
  `productId` int(11) NOT NULL,
  `sizeId` int(11) NOT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(1, 30),
(2, 31),
(3, 32),
(4, 33),
(5, 34),
(6, 35),
(7, 36),
(8, 37),
(9, 38),
(10, 39),
(11, 40);

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
  ADD KEY `categoryId` (`categoryId`);

--
-- Indexes for table `productcolor`
--
ALTER TABLE `productcolor`
  ADD PRIMARY KEY (`productId`,`colorId`),
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
  MODIFY `colorId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `orderId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `size`
--
ALTER TABLE `size`
  MODIFY `sizeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

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
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`categoryId`) REFERENCES `category` (`categoryId`);

--
-- Constraints for table `productcolor`
--
ALTER TABLE `productcolor`
  ADD CONSTRAINT `productcolor_ibfk_1` FOREIGN KEY (`productId`) REFERENCES `product` (`productId`),
  ADD CONSTRAINT `productcolor_ibfk_2` FOREIGN KEY (`colorId`) REFERENCES `color` (`colorId`);

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
