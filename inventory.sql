-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 17, 2020 at 06:10 PM
-- Server version: 10.2.30-MariaDB
-- PHP Version: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u637876709_firstDB`
--

-- --------------------------------------------------------

--
-- Stand-in structure for view `currentInventory`
-- (See below for the actual view)
--
CREATE TABLE `currentInventory` (
`productCode` int(11)
,`productName` varchar(255)
,`currentCount` int(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customerId` int(11) NOT NULL,
  `customerName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customerContact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customerId`, `customerName`, `customerContact`) VALUES
(1, 'Anonymous', 'N/A'),
(2, 'Queen Elsa', '222-2222 / Arendelle'),
(3, 'Moana', '532 / Motunui');

-- --------------------------------------------------------

--
-- Table structure for table `goodsIssueDetails`
--

CREATE TABLE `goodsIssueDetails` (
  `lineNumber` int(11) NOT NULL,
  `goodsIssueNumber` int(11) NOT NULL,
  `productCode` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `goodsIssueHeader`
--

CREATE TABLE `goodsIssueHeader` (
  `goodsIssueNumber` int(11) NOT NULL,
  `customerId` int(11) NOT NULL,
  `goodsIssueDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `goodsReceiptDetails`
--

CREATE TABLE `goodsReceiptDetails` (
  `lineNumber` int(11) NOT NULL,
  `goodsReceiptNumber` int(11) NOT NULL,
  `productCode` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `goodsReceiptHeader`
--

CREATE TABLE `goodsReceiptHeader` (
  `goodsReceiptNumber` int(11) NOT NULL,
  `supplierId` int(11) NOT NULL,
  `goodsReceiptDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `itemList`
--

CREATE TABLE `itemList` (
  `productCode` int(11) NOT NULL,
  `productName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reorderPoint` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `itemList`
--

INSERT INTO `itemList` (`productCode`, `productName`, `reorderPoint`) VALUES
(11111111, 'Favorite Feeds', 10),
(12341234, 'Vitamin Seeds', 0),
(987654321, 'Fertilizer Spray Bottles', 0);

-- --------------------------------------------------------

--
-- Table structure for table `mainInventory`
--

CREATE TABLE `mainInventory` (
  `productCode` int(11) NOT NULL,
  `currentCount` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Current Inventory';

--
-- Dumping data for table `mainInventory`
--

INSERT INTO `mainInventory` (`productCode`, `currentCount`) VALUES
(11111111, 100),
(12341234, 250),
(987654321, 374);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supplierId` int(11) NOT NULL,
  `supplierName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplierContact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplierId`, `supplierName`, `supplierContact`) VALUES
(1, 'Anonymous', 'N/A'),
(2, 'Feed Supplier A', '1234-5678 / Los Baños');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(500) NOT NULL,
  `user_email` varchar(25) NOT NULL,
  `user_type` varchar(25) NOT NULL,
  `user_status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `user_email`, `user_type`, `user_status`) VALUES
(3, 'tessa', '$2y$10$SYyonvcK1A8dQeYxIrsfLuSn7qo36qmKra09lEamqWq/Gie4TYwZe', 'mlumanta@1234', 'user', 'Active'),
(8, 'admin', '202cb962ac59075b964b07152d234b70', 'tessamadjus@gmail.com', 'user', 'active'),
(9, 'tes', 'e10adc3949ba59abbe56e057f20f883e', 'mlumanta@1234', 'user', 'active'),
(10, 'lee_madjus', '$2y$10$4h177uGQHf9uHkrIX0rRmOEn.a/9gydJ4Rf2au/1KEkm1Z9fWKSl.', 'mlumanta@1234', 'user', 'active'),
(11, 'tes', 'e10adc3949ba59abbe56e057f20f883e', 'mlumanta@yahoo.com', 'user', 'active');

-- --------------------------------------------------------

--
-- Structure for view `currentInventory`
--
DROP TABLE IF EXISTS `currentInventory`;

CREATE ALGORITHM=UNDEFINED DEFINER=`u637876709_earlroyce`@`127.0.0.1` SQL SECURITY DEFINER VIEW `currentInventory`  AS  select `itemList`.`productCode` AS `productCode`,`itemList`.`productName` AS `productName`,`mainInventory`.`currentCount` AS `currentCount` from (`itemList` join `mainInventory` on(`itemList`.`productCode` = `mainInventory`.`productCode`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customerId`);

--
-- Indexes for table `goodsIssueDetails`
--
ALTER TABLE `goodsIssueDetails`
  ADD PRIMARY KEY (`lineNumber`,`goodsIssueNumber`),
  ADD KEY `goodsIssueNumber` (`goodsIssueNumber`),
  ADD KEY `productCode` (`productCode`);

--
-- Indexes for table `goodsIssueHeader`
--
ALTER TABLE `goodsIssueHeader`
  ADD PRIMARY KEY (`goodsIssueNumber`),
  ADD KEY `customerId` (`customerId`);

--
-- Indexes for table `goodsReceiptDetails`
--
ALTER TABLE `goodsReceiptDetails`
  ADD PRIMARY KEY (`lineNumber`,`goodsReceiptNumber`),
  ADD KEY `goodsReceiptNumber` (`goodsReceiptNumber`),
  ADD KEY `productCode` (`productCode`);

--
-- Indexes for table `goodsReceiptHeader`
--
ALTER TABLE `goodsReceiptHeader`
  ADD PRIMARY KEY (`goodsReceiptNumber`),
  ADD KEY `supplierId` (`supplierId`);

--
-- Indexes for table `itemList`
--
ALTER TABLE `itemList`
  ADD PRIMARY KEY (`productCode`);

--
-- Indexes for table `mainInventory`
--
ALTER TABLE `mainInventory`
  ADD PRIMARY KEY (`productCode`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplierId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `goodsIssueDetails`
--
ALTER TABLE `goodsIssueDetails`
  MODIFY `lineNumber` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `goodsIssueHeader`
--
ALTER TABLE `goodsIssueHeader`
  MODIFY `goodsIssueNumber` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `goodsReceiptDetails`
--
ALTER TABLE `goodsReceiptDetails`
  MODIFY `lineNumber` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `goodsReceiptHeader`
--
ALTER TABLE `goodsReceiptHeader`
  MODIFY `goodsReceiptNumber` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplierId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `goodsIssueDetails`
--
ALTER TABLE `goodsIssueDetails`
  ADD CONSTRAINT `goodsIssueDetails_ibfk_1` FOREIGN KEY (`goodsIssueNumber`) REFERENCES `goodsIssueHeader` (`goodsIssueNumber`),
  ADD CONSTRAINT `goodsIssueDetails_ibfk_2` FOREIGN KEY (`productCode`) REFERENCES `itemList` (`productCode`);

--
-- Constraints for table `goodsIssueHeader`
--
ALTER TABLE `goodsIssueHeader`
  ADD CONSTRAINT `goodsIssueHeader_ibfk_1` FOREIGN KEY (`customerId`) REFERENCES `customer` (`customerId`);

--
-- Constraints for table `goodsReceiptDetails`
--
ALTER TABLE `goodsReceiptDetails`
  ADD CONSTRAINT `goodsReceiptDetails_ibfk_1` FOREIGN KEY (`goodsReceiptNumber`) REFERENCES `goodsReceiptHeader` (`goodsReceiptNumber`),
  ADD CONSTRAINT `goodsReceiptDetails_ibfk_2` FOREIGN KEY (`productCode`) REFERENCES `itemList` (`productCode`);

--
-- Constraints for table `goodsReceiptHeader`
--
ALTER TABLE `goodsReceiptHeader`
  ADD CONSTRAINT `goodsReceiptHeader_ibfk_1` FOREIGN KEY (`supplierId`) REFERENCES `supplier` (`supplierId`);

--
-- Constraints for table `mainInventory`
--
ALTER TABLE `mainInventory`
  ADD CONSTRAINT `mainInventory_ibfk_1` FOREIGN KEY (`productCode`) REFERENCES `itemList` (`productCode`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
